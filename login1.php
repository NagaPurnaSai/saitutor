<?php
/*#######################****connection to database****###############*/
require("config.php");
/*######################****session login***##################*/
if( $_GET['submit'] == "logout" ){
  unset( $_SESSION['login'] );
  header("Location: login.php?");
  exit;
}
/*####################****select data from database****################*/
if (isset($_POST['submit']) ) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = "select * from datatable where 
  username = '".mysqli_escape_string($con,$username)."' 
  and password = '".mysqli_escape_string($con,$password)."' ";
  $res = mysqli_query($con, $query);
   if( mysqli_error($con) ){
      echo json_encode([
        "status"=>"error",
        "error"=>mysqli_error($con)
      ]); 
      exit;
    }
    /*####################****check rows in data in database****################*/
  if (mysqli_num_rows($res) > 0) {
    $valid = true;
  } else {
    $valid = false;
  }
  if ($valid) {
    $row = mysqli_fetch_assoc($res);
    $_SESSION['login'] = "yes";
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $row['id'];
    header('Location: home.php');
    exit;
  } else {
    echo "<script>
    alert('login failed. Incorrect username or password.')
    </script>";
  }
}
?>
<!-- /*####################****login form table****################*/ -->
<html>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <h1 style="text-align: center;">Sai Tutorial</h1>
  </head>
<div class="container d-flex justify-content-center align-items-center" style="height:80vh;">
  <div class="card" style="width:340px; height: 280px;">
    <div  class="card-header text-center">
      datatable
    </div>
    <div class="card-body" style="background: lightgrey;">
              <form action="login.php" method="post">
          <div>
            <label for="username" >Username:</label>
            <input type="text" id="username" name="username">
          </div>
          <br>
          <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
          </div>
          <br>
          <button class="button" name="submit" onclick="submit" type="submit">Login</button> 
          &nbsp 
          <p class="newuser" style="text-align: right;"><a href="register.php"> New user </a></p>
          <p type="submit" class="forgotpassword" style="text-align: right;"><a href="forget.php"> Forgot password? </a></p>
        </form>
    </div>
  </div>
</div>
<style>
  body {
  background-color: white;
}
.card {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 5px 5px 10px #aaa;
}
.card-header {
  background-color: #007bff;
  color: #fff;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}
.button {
  background-color: blue;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
}
.button:hover {
  background-color: green;
}
</style>
</html>


