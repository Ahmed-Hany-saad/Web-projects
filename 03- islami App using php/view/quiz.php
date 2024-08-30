<?php include_once "../db_conn.php" ?>
<?php
$err_msg = '';
if (isset($_POST["submit"])) {
    if (!empty($_POST["question"]) && !empty($_POST["answer"]) && !empty($_POST["opt1"]) && !empty($_POST["opt2"]) && !empty($_POST["opt3"]) && !empty($_POST["opt4"])) {
        $query = mysqli_query($conn, "insert  into quiz (quest_num,question,answer,opt1,opt2,opt3,opt4)
    values('','$_POST[question]','$_POST[answer]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]') ");
        // echo $query;
        echo '<div class="alert alert-success" id="alert">
        <strong>Success!</strong> Indicates a successful or positive action.
        </div>';
    } else {
        if (empty($_POST["question"])) {
            echo '<div class="alert alert-danger" id="alert">
        <strong>Failed</strong> question field  is Empty
        </div>';
        }
        if (empty($_POST["answer"])) {
            echo '<div class="alert alert-danger" id="alert">
        <strong>Failed</strong> answer field  is Empty
        </div>';
        }
        if (empty($_POST["opt1"])) {
            echo '<div class="alert alert-danger" id="alert">
        <strong>Failed</strong> option1 field  is Empty
        </div>';
        }
        if (empty($_POST["opt2"])) {
            echo '<div class="alert alert-danger" id="alert">
        <strong>Failed</strong> option2 field  is Empty
        </div>';
        }
        if (empty($_POST["opt3"])) {
            echo '<div class="alert alert-danger" id="alert">
        <strong>Failed</strong> option3 field  is Empty
        </div>';
        }
        if (empty($_POST["opt4"])) {
            echo '<div class="alert alert-danger" id="alert">
        <strong>Failed</strong> option4 field  is Empty
        </div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login 04</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <section class="ftco-section">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url(../images/as.jpg)"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Quiz Mangement</h3>
                            </div>

                        </div>
                        <!-- <div class="form-group mb-3">
                            <label class="label" for="password">Add questNo</label>
                            <input type="number" class="form-control" placeholder="Password" required />
                        </div> -->
                        <form action="" class="signin-form" method="post">
                            <div class="form-group mb-3">
                                <label>Add Question</label>
                                <input type="text" name="question" class=" form-control" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="answer">Add answer</label>
                                <input type="text" class="form-control" placeholder="answer" name="answer" />
                            </div>
                            <div class=" form-group mb-3">
                                <label class="label" for="option1">Add option1</label>
                                <input type="text" class="form-control" placeholder="option1" name="opt1" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="option2">Add option2</label>
                                <input type="text" class="form-control" placeholder="option2" name="opt2" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="option3">Add option3</label>
                                <input type="text" class="form-control" placeholder="option3" name="opt3" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="option4">Add option4</label>
                                <input type="text" class="form-control" placeholder="option4" name="opt4" />
                            </div>
                            <div class="form-group">
                                <input name="submit" type="submit" class="form-control btn btn-primary rounded submit px-3" value="add">
                                <?php
                                // $err_msg = '';
                                // if(isset($_POST["submit"]))
                                // {
                                //     if(!empty($_POST["question"])&&!empty($_POST["answer"])&&!empty($_POST["opt1"])&&!empty($_POST["opt2"])&&!empty($_POST["opt3"])&&!empty($_POST["opt4"]))
                                // {
                                //     $query = mysqli_query($link , "insert  into quiz (quest_num,question,answer,opt1,opt2,opt3,opt4)
                                //     values('','$_POST[question]','$_POST[answer]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]') ");
                                //     // echo $query;
                                //     echo '<div class="alert alert-success" id="alert">
                                //         <strong>Success!</strong> Indicates a successful or positive action.
                                //         </div>';
                                // }
                                // else
                                // {
                                //     if(empty($_POST["question"]))
                                //     {
                                //         $x = '<div class="alert alert-danger" id="alert">
                                //         <strong>Failed</strong> question field  is Empty
                                //         </div>';
                                //     }
                                //     if(empty($_POST["answer"]))
                                //     {
                                //         echo '<div class="alert alert-danger" id="alert">
                                //         <strong>Failed</strong> answer field  is Empty
                                //         </div>';
                                //     }
                                //     if(empty($_POST["opt1"]))
                                //     {
                                //         echo '<div class="alert alert-danger" id="alert">
                                //         <strong>Failed</strong> option1 field  is Empty
                                //         </div>';
                                //     }
                                //     if(empty($_POST["opt2"]))
                                //     {
                                //         echo '<div class="alert alert-danger" id="alert">
                                //         <strong>Failed</strong> option2 field  is Empty
                                //         </div>';
                                //     }
                                //     if(empty($_POST["opt3"]))
                                //     {
                                //         echo '<div class="alert alert-danger" id="alert">
                                //         <strong>Failed</strong> option3 field  is Empty
                                //         </div>';
                                //     }
                                //     if(empty($_POST["opt4"]))
                                //     {
                                //         echo '<div class="alert alert-danger" id="alert">
                                //         <strong>Failed</strong> option4 field  is Empty
                                //         </div>';
                                //     }
                                // }
                                // }
                                ?>
                            </div>
                            <?php


                            ?>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>



    <script src="../js/jquery-3.6.3.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>