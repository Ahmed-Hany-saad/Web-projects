<?php
require_once "../controller/adminController.php";
if (isset($_POST['submit'])) {
  $controller = new AdminController();
  $controller->updatePerson();
}
require_once "../model/admin.php";
$model = new AdminModel();
$student = $model->getPersonById($_GET['id']);
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>PHP CRUD Application</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    PHP Complete CRUD Application
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>



    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $student['name'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" value="<?php echo $student['email'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Password:</label>
          <input type="text" class="form-control" name="password" value="<?php echo $student['password'] ?>">
        </div>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="activated" id="flexRadioDefault3" value=1 <?php echo ($student["activated"] == 1) ? "checked" : ""; ?>>
          <label class="form-check-label" for="flexRadioDefault3">
            Activated
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="activated" id="flexRadioDefault4" value=0 <?php echo ($student["activated"] == 0) ? "checked" : ""; ?>>
          <label class="form-check-label" for="flexRadioDefault4">
            not Activated
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="admin" <?php echo ($student["role"] == 'admin') ? "checked" : ""; ?>>
          <label class="form-check-label" for="flexRadioDefault1">
            Admin
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value="user" <?php echo ($student["role"] == 'user') ? "checked" : ""; ?>>
          <label class="form-check-label" for="flexRadioDefault2">
            User
          </label>
        </div>
        

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="userList.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>