<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/../lib/Database.php');
include_once ($filepath . '/../helpers/Format.php');

class Exam {

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function addQuestion($data) {
        $quesno = mysqli_real_escape_string($this->db->link, $data['quesno']);
        $cat= mysqli_real_escape_string($this->db->link, $data['cat']);
        $ques = mysqli_real_escape_string($this->db->link, $data['ques']);
        $ans = array();
        $ans[1] = $data['ans1'];
        $ans[2] = $data['ans2'];
        $ans[3] = $data['ans3'];
        $ans[4] = $data['ans4'];
        $rightans = mysqli_real_escape_string($this->db->link, $data['rightans']);
        $query = "INSERT INTO tbl_ques(quesno, Q_cat, ques) VALUES('$quesno', '$cat', '$ques')";
        $insert_row = $this->db->insert($query);
        if ($insert_row) {
            foreach ($ans as $key => $ansName) {
                if ($ansName !== '') {
                    if ($rightans == $key) {
                        $query = "INSERT INTO tbl_ans(quesno, rightans, ans) "
                                . "VALUES('$quesno','1','$ansName')";
                    } else {
                        $query = "INSERT INTO tbl_ans(quesno,rightans,ans) "
                                . "VALUES('$quesno', '0', '$ansName')";
                    }
                    $insertrow = $this->db->insert($query);
                    if ($insertrow) {
                        continue;
                    } else {
                        die('Error...');
                    }
                }
            }
            $msg = "<span class='success'>Quesion Added Succesfully.</span>";
            return $msg;
        }
    }

    public function getQuestionByOrder($q) {
        $query = "SELECT * FROM tbl_ques WHERE Q_cat = '$q' ORDER BY quesno ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function deleteQuestion($quesno) {
        $tables = array("tbl_ques", "tbl_ans");
        foreach ($tables as $table) {
            $delquery = "DELETE FROM $table WHERE quesno = '$quesno'";
            $deldata = $this->db->delete($delquery);
        }
        if ($deldata) {
            $msg = "<span class='success'>Data Deleted Succesfully.</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Data Not Deleted Succesfully !</span>";
            return $msg;
        }
    }

    public function getTotalRows($que) {
        $query = "SELECT * FROM tbl_ques WHERE Q_cat = '$que'";
        $getResult = $this->db->select($query);
        $total = $getResult->num_rows;
        return $total;
    }
    public function getTotalRowsForAdmin() {
        $query = "SELECT * FROM tbl_ques";
        $getResult = $this->db->select($query);
        $total = $getResult->num_rows;
        return $total;
    }

    public function getQuestion() {
        $query = "SELECT * FROM tbl_ques ORDER BY 'quesno' ASC";
        $getdata = $this->db->select($query);
        $result = $getdata->fetch_assoc();
        return $result;
    }
    public function getQuestionAdminView($number) {
        $query = "SELECT * FROM tbl_ques WHERE quesno = '$number'";
        $getdata = $this->db->select($query);
        $result = $getdata->fetch_assoc();
        return $result;
    }
    public function getQuestionByCat($cat) {
        $query = "SELECT * FROM tbl_ques WHERE Q_cat = '$cat' Order By quesno ASC";
        $getdata = $this->db->select($query);
        $result = $getdata->fetch_assoc();
        return $result;
    }
    public function getQuestionByNumber($que) {
        $query = "SELECT * FROM tbl_ques WHERE quesno = '$que' Order By quesno ASC";
        $getdata = $this->db->select($query);
        $result = $getdata->fetch_assoc();
        return $result;
    }

    public function getAnswer($qnumber) {
        $query = "SELECT * FROM  tbl_ans WHERE quesno = '$qnumber'";
        $getdata = $this->db->select($query);
        return $getdata;
    }

    public function updateQuestion($number, $data) {
        $ques = mysqli_real_escape_string($this->db->link, $data['ques']);
        $ans = array();
        $ans[1] = $data['ans1'];
        $ans[2] = $data['ans2'];
        $ans[3] = $data['ans3'];
        $ans[4] = $data['ans4'];
        $rightans = mysqli_real_escape_string($this->db->link, $data['rightans']);
        $query = "UPDATE tbl_ques SET ques = '$ques' WHERE quesno = '$number'";
        $update_row = $this->db->update($query);
        if ($update_row) {
            $i=0;
            foreach ($ans as $key => $ansName) {
                if ($ansName !== '') {
                    $aid = $this->AnswerId($number);
                    if ($rightans == $key) {
                        $query = "UPDATE tbl_ans SET rightans = '1', ans = '$ansName' WHERE id = '$aid[$i]'";
                        $i++;
                    } else {
                        $query = "UPDATE tbl_ans SET rightans = '0', ans = '$ansName' WHERE id = '$aid[$i]'";
                        $i++;
                    }
                    $updaterow = $this->db->update($query);
                    if ($updaterow) {
                        continue;
                    } else {
                        die('Error...');
                    }
                }
            }
            $msg = "<span class='success'>Quesion Updated Succesfully.</span>";
            return $msg;
        }
    }

    private function AnswerId($number) {
        $query = "SELECT * FROM  tbl_ans WHERE quesno = '$number'";
        $getdata = $this->db->select($query);
        $i=0;
        while ($result = $getdata->fetch_assoc()) {
            $next[$i] = $result['id'];
            $i++;
        }
        $aid = array("$next[0]","$next[1]","$next[2]","$next[3]");
        return $aid;
    }    

}

?>
