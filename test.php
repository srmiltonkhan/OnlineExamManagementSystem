<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body style="background: #A9A9A9;">
        <?php include 'inc/header.php'; ?>
        <?php
        Session::checkSession();
        if (isset($_GET['q'])&&isset($_GET['qn'])) {
            $que = (int) $_GET['q'];
            $n = (int) $_GET['qn'];
            $question = $exm->getQuestionByNumber($que);
        } else {
            if (isset($_SESSION['cat'])) {
                $cat = $_SESSION['cat'];
            }
            $question = $exm->getQuestionByCat($cat);
            $n = 1;
        }
        $total = $exm->getTotalRows($_SESSION['cat']);
        $number = $question['quesno'];
        ?>
        <div class="container-fluid">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $process = $pro->processData($_POST);
            }
            ?>
            <div class="container" style="min-height: 400px;background: #F8F9FB;">
                <h4 class="well" style="text-align: center;margin-top:3px;background: #9d9d9d;"> Question <?php echo "$n" . ' Of ' . $total; ?></h4>
                <div class="col-sm-2" style="height: 350px;margin-top:-18px;"></div>
                <div class="col-lg-8 well" style="height: 350px;margin-top:-18px;">
                    <div class="question"> Ques <?php echo "$n"; ?>. <?php echo $question['ques'] ?> </div><hr>
                    <form action="" method="POST">
                        <?php
                        $answer = $exm->getAnswer($number);
                        if ($answer) {
                            while ($result = $answer->fetch_assoc()) {
                                ?>
                                <div class="radio choice_ans">
                                    <label><input type="radio" name="ans" value="<?php echo $result['id']; ?>"><?php echo $result['ans']; ?></label>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <input type="hidden" name="number" value="<?php echo $number; ?>">
                        <input type="hidden" name="qn" value="<?php echo $n; ?>">

                        <h3 style="padding-left: 80px;margin-top: 30px;">
                            <a><button class="btn  btn-default navbar-btn" style="font-size: 16px; width: 220px;color: green;"> Next Question </button></a>
                        </h3>
                    </form>
                </div>
                <div class="col-sm-2" style="height: 350px;margin-top:-18px;"></div>
            </div>
        </div>
        <div style="margin-top: -20px;"><?php include 'inc/footer.php'; ?></div>
    </body>
</html>