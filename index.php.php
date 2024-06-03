<?php
include 'connection.php';
if(isset($_POST['submit'])){
  $name = $_POST['usname'];
  $pw = $_POST['pass'];

  $check = mysqli_query($con, "SELECT * FROM users WHERE UserName = '$name'");
  if(mysqli_num_rows($check) > 0){
    echo "<script>
    alert('Sorry! User Already Exists');
    </script>";
  } else {
    $qry = mysqli_query($con,"INSERT INTO users VALUES (null,'$name','$pw')");
    if($qry){
      echo "
      <script>
      alert('User Signed Up Succcessfully!');
      window.location.replace('login.php');
      </script>";
    }
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign UP</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="formpage">
    <form action="" method="POST">
      <h3>Sign Up Form</h3>
      <label for="uname">Username:</label>
      <input type="text" placeholder="Enter Your Username Here" name="usname" id="uname" required>
      <label for="psw">Password:</label>
      <input type="password" placeholder="Enter Your Password Here" name="pass" id="psw" required>
      <span class="acc"><p>Have an account ?<a href="login.php">Login Here</a></p></span>
      <button name="submit">SIGN UP</button>
    </form>
  </div>
</body>
</html>