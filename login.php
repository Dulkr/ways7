<?php
include('db.php');
$Error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $sql= "select * from users where email='{$email}' and password='{$password}'";
  $statement = $connect->query($sql);
  if ($statement->rowCount() > 0) {
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      header("location: index.html");
    }
    $Error = "please check email and password.";
  }
}
?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ways Wireless</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="bg-light">
  <div class="container " style="padding-top: 100px;">
    <div class="w-50 bg-white mx-auto p-5  shadow p-3 mb-5 ">
      <h3 class="mb-3">Login Page</h3>
      <p class="text-danger small"> <?= $Error ?> </p>
      <form action="" method="POST">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input name="email" type="email" class="form-control" placeholder="Email">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input name="password" type="password" class="form-control" placeholder="Password">
          <div class="form-group">
        <label for="user-type">User Type:</label>
        <select id="user-type" name="user-type">
          <option value="admin">Admin</option>
          <option value="guest">Guest</option>
        </select>
      </div>
        </div>
        <button type="submit" class="btn btn-dark rounded-pill">Login</button>
        <a href="index.html" class="btn btn-dark rounded-pill">Cancel</a>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>