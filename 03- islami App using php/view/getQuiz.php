<?php include_once "header.php" ?>
<div class="container" style="margin: 100px;">
    <h1>Quiz Form</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> ">

        <button type="submit" class="btn btn-primargy" style="background-color:#F25454">Start Quiz</button>
    </form>

    <?php
    include_once "../db_conn.php";
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get selected choice


        // Connect to database

        // Check connection


        // Get random questions from selected category
        $sql = "SELECT * FROM quiz  ORDER BY RAND() LIMIT 5";

        $result = mysqli_query($conn, $sql);

        // Display questions
        if ($result->num_rows > 0) {
            echo "<form method='post' action=''>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<div class='card-header'>" . $row["question"] . "</div>";
                echo "<div class='card-body'>";
                echo "<div class='form-group'>";
                echo "<label>:أختر الاجابة الصحيحة</label>";
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='q" . $row["quest_num"] . "' value='" . $row["opt1"] . "id='opt1'>";
                echo '<label for="opt1"></label>';
                echo "<label class='form-check-label'>" . $row["opt1"] . "</label>";
                echo "</div>";
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='q" . $row["quest_num"] . "' value='" . $row["opt2"] . "'>";
                echo "<label class='form-check-label'>" . $row["opt2"] . "</label>";
                echo "</div>";
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='q" . $row["quest_num"] . "' value='" . $row["opt3"] . "'>";
                echo "<label class='form-check-label'>" . $row["opt3"] . "</label>";
                echo "</div>";
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='q" . $row["quest_num"] . "' value='" . $row["opt4"] . "'>";
                echo "<label class='form-check-label'>" . $row["opt4"] . "</label>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            echo "<button type='submit' class='btn btn-primary'>Submit Quiz</button>";
            echo "</form>";
        } else {
            echo "No questions found.";
        }                // Calculate score
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $score = 0;
            foreach ($_POST as $key => $value) {
                if (substr($key, 0, 1) == "q") {
                    $qid = substr($key, 1);
                    $sql = "SELECT * FROM quiz WHERE quest_num = '$qid'";
                    $result = mysqli_query($conn, $sql);
                    $row = $result->fetch_assoc();
                    if ($value == $row["answer"]) {
                        $score++;
                    }
                }
            }
            echo "<h3>Your score is: " . $score . "/5</h3>";
        }

        // Close database connection
        $conn->close();
    }
    ?>

</div>
<?php include_once "footer.php" ?>

<script src="../js/jquery-3.6.3.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/main.js"></script>