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
        if (isset($_GET['q'])) {
            $que = (int) $_GET['q'];
            if (!isset($_SESSION['cat'])) {
                $_SESSION['cat'] = $que;
            }
        } else {
            header("Location:exam.php");
        }
        $question = $exm->getQuestion();
        $total = $exm->getTotalRows($que);
        ?>
        <div class="container-fluid">
            <div class="container" style="min-height: 400px;background: #F8F9FB;">
                <h4 class="well" style="text-align: center;margin-top:3px;background: #9d9d9d;">Welcome to Online Exam </h4>
                <div class="col-sm-2"></div>
                <div class="col-sm-8 starttest">
                    <h2>Test Your Knowledge </h2>
                    <p style="text-align: center;">This is multiple choice quiz to test your knowledge</p>
                    <div class="starttest_title"style="margin-top: 5px;">
                        <strong>Number of Questions </strong> : <?php echo $total; ?> 
                    </div>
                    <div class="starttest_title" style="margin-top: 5px;">
                        <strong>Question Type </strong> : Multiple Choice
                    </div>
                    <a href="test.php" style="margin-top: 10px;">Test</a>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
    <?php include 'inc/footer.php'; ?>
</body>
</html>
