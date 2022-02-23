<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/../lib/Session.php');
//Session::init();
include_once ($filepath . '/../lib/Database.php');
include_once ($filepath . '/../helpers/Format.php');

class Process {

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function processData($data) {
        $selectedAns = $this->fm->validation($data['ans']);
        $number = $this->fm->validation($data['number']);
        $qn = $this->fm->validation($data['qn']);
        $selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
        $number = mysqli_real_escape_string($this->db->link, $number);
        $qn = mysqli_real_escape_string($this->db->link, $qn);
        $next = $number + 1;
        $ct = $_SESSION['cat'];

        if (!isset($_SESSION['score'])) {
            $_SESSION['score'] = '0';
        }
        $total = $this->getTotal($ct);
        $right = $this->rightAnswer($number);

        if ($right == $selectedAns) {
            $_SESSION['score'] ++;
        }
        if ($total == $qn) {
            header("Location:final.php");
        } else {

            $qn = $qn + 1;
            header("Location:test.php?qn=$qn && q=$next");
        }
    }

    private function getTotal($ct) {
        $query = "SELECT * FROM tbl_ques WHERE Q_cat = '$ct'";
        $getResult = $this->db->select($query);
        $total = $getResult->num_rows;
        return $total;
    }

    private function rightAnswer($number) {
        $query = "SELECT * FROM  tbl_ans WHERE quesno = '$number' AND rightans='1'";
        $getdata = $this->db->select($query)->fetch_assoc();
        $result = $getdata['id'];
        return $result;
    }

    public function insertOrUpdateResult($data) {
        $userid = $this->fm->validation($data['userid']);
        $score = $this->fm->validation($data['score']);
        $cat = $this->fm->validation($data['cat']);
        $userid = mysqli_real_escape_string($this->db->link, $userid);
        $score = mysqli_real_escape_string($this->db->link, $score);
        $cat = mysqli_real_escape_string($this->db->link, $cat);

        $checkQuery = "SELECT * FROM  tbl_result WHERE userid='$userid'";
        $checkid = $this->db->select($checkQuery);
        if ($checkid == TRUE) {
            if ($cat == 1) {
                $query = "UPDATE tbl_result SET p1 = '$score' WHERE userid = '$userid'";
                $updated_row = $this->db->update($query);
            } else if ($cat == 2) {
                $query = "UPDATE tbl_result SET j2 = '$score' WHERE userid = '$userid'";
                $updated_row = $this->db->update($query);
            } else if ($cat == 3) {
                $query = "UPDATE tbl_result SET c3 = '$score' WHERE userid = '$userid'";
                $updated_row = $this->db->update($query);
            } else if ($cat == 4) {
                $query = "UPDATE tbl_result SET p4 = '$score' WHERE userid = '$userid'";
                $updated_row = $this->db->update($query);
            } else if ($cat == 5) {
                $query = "UPDATE tbl_result SET o5 = '$score' WHERE userid = '$userid'";
                $updated_row = $this->db->update($query);
            }
            $msg = "<span class='success'>Score Updated Successfully.</span>";
            return $msg;
        } else {
            if ($cat == 1) {
                $insert = "INSERT INTO  tbl_result(userid,p1) VALUES('$userid',$score)";
                $insertid = $this->db->insert($insert);
            } else if ($cat == 2) {
                $insert = "INSERT INTO  tbl_result(userid,j2) VALUES('$userid',$score)";
                $insertid = $this->db->insert($insert);
            } else if ($cat == 3) {
                $insert = "INSERT INTO  tbl_result(userid,c3) VALUES('$userid',$score)";
                $insertid = $this->db->insert($insert);
            } else if ($cat == 4) {
                $insert = "INSERT INTO  tbl_result(userid,p4) VALUES('$userid',$score)";
                $insertid = $this->db->insert($insert);
            } else if ($cat == 5) {
                $insert = "INSERT INTO  tbl_result(userid,o5) VALUES('$userid',$score)";
                $insertid = $this->db->insert($insert);
            }
        }
    }

}

?>
