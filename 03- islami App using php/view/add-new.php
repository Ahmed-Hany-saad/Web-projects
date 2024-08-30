<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
   PHP Complete CRUD Application
</nav>

<div class="container">
   <div class="text-center mb-4">
      <h3>Add New User</h3>
      <p class="text-muted">Complete the form below to add a new user</p>
   </div>

   <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">

         <div class="col">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Ahmed Salah">

         </div>

         <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" placeholder="name@example.com">
         </div>
         <div class="col">
            <label class="form-label">Password:</label>
            <input type="password" class="form-control" name="password">
         </div>
         <div class="form-group mb-3">
            <label>role:</label>
            &nbsp;
            <input type="radio" class="form-check-input" name="role" id="user" value="user">
            <label for="user" class="form-input-label">User</label>
            &nbsp;
            <input type="radio" class="form-check-input" name="role" id="admin" value="admin">
            <label for="admin" class="form-input-label">Admin</label>
         </div>

         <div>
            <button type="submit" class="btn btn-success" name="submit">Save</button>
            <a href="index.php" class="btn btn-danger">Cancel</a>
         </div>
      </form>

   </div>
</div>
<?php
if (isset($_POST['submit'])) {
   require_once "../controller/adminController.php";
   $controller = new AdminController();
   $controller->addPerson();
}
?>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>