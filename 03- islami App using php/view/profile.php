<?php include_once "header.php" ?>
<?php if (!isset($_SESSION['person'])) {
    header('Location: login.php');
} ?>

<?php
session_start();
require_once "../db_conn.php";

if (isset($_SESSION['person'])) {
    if ($_SESSION['person']->role == 'user') {
        echo '<form method="POST">
            <div class="p-3 shadow">Name: </div><input class="form-control" type="text" name="name" value="' . $_SESSION['person']->name . '" required>
            <div class="p-3 shadow">Old Password: </div><input class="form-control" type="password" name="oldpassword" required>
            <div class="p-3 shadow">New Password: </div><input class="form-control" type="password" name="password">
            <button class="w-100 btn btn-warning mt-1" type="submit" name="update" value="' . $_SESSION['person']->id . '">Update</button>
            <a class="w-100 btn btn-light mt-1" href="index.php">Back to home</a>
        </form>';

        if (isset($_POST['update'])) {
            $userID = $_POST['update'];
            $oldPassword = $_POST['oldpassword'];
            $newName = $_POST['name'];
            $newPassword = sha1($_POST['password']);

            $selectUserData = $conn->prepare("SELECT * FROM users WHERE id = ?");
            $selectUserData->bind_param("i", $userID);
            $selectUserData->execute();
            $passwordUser = $selectUserData->get_result()->fetch_assoc();
            $selectUserData->close();
            $password = (empty($_POST['password'])) ? $passwordUser['password'] : $newPassword;
            if ($passwordUser['password'] == sha1($oldPassword)) {
                $updateUserData = $conn->prepare("UPDATE users SET name = ?, password = ? WHERE id = ?");
                $updateUserData->bind_param("ssi", $newName, $password, $userID);

                if ($updateUserData->execute()) {
                    echo '<div class="alert alert-success mt-3">Data updated successfully</div>';
                    $user = $conn->prepare("SELECT * FROM users WHERE id = ?");
                    $user->bind_param("i", $userID);
                    $user->execute();
                    $_SESSION['person'] = $user->get_result()->fetch_object();
                    $user->close();
                    header('Refresh: 2; URL=index.php');
                } else {
                    echo '<div class="alert alert-alert mt-3">Failed to update Data</div>';
                }
                $updateUserData->close();
            } else {
                echo '<div class="alert alert-danger mt-3">Old password is incorrect</div>';
            }
        }
    } else {
        echo '<div class="alert alert-alert mt-3">You are not authorized to access this page</div>';
        session_unset();
        session_destroy();
        header('Location: login.php');
    }
} else {
    session_unset();
    session_destroy();
    header('Location: login.php');
}
?>

<?php include_once "footer.php" ?>


<script src="../js/jquery-3.6.3.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/main.js"></script>