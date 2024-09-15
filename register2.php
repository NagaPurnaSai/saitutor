<?php
/*#######################****connection to database****###############*/
require("config.php");
/*######################****session login***##################*/
if( $_GET['submit'] == "logout" ){
  unset( $_SESSION['login2'] );
  exit;
}
/*#####################****notify empty fields****#################*/
if (isset($_POST['submit'])) {
if($_POST['username'] == "" || $_POST['password'] == "" ||  $_POST['email'] == "" ||  $_POST['phonenumber'] == "" ||  $_POST['date'] == "" ||  $_POST['address'] == "" ||  $_POST['qualification'] == ""){
  echo "<script>
        alert('Please Mention all details');
        </script>"; 
  }else{
/*####################****insert data to database****################*/
 $sql = "insert into experts set 
          username = '".mysqli_escape_string($con,$_POST['username'])."',
          password = '".mysqli_escape_string($con,$_POST['password'])."',
          email = '".mysqli_escape_string($con,$_POST['email'])."',
          phonenumber = '".mysqli_escape_string($con,$_POST['phonenumber'])."',
          gender = '".mysqli_escape_string($con,$_POST['select'])."',
          date = '".mysqli_escape_string($con,$_POST['date'])."',
          address = '".mysqli_escape_string($con,$_POST['address'])."',
          qualification = '".mysqli_escape_string($con, $_POST['qualification'])."',
          security_question = '".mysqli_escape_string($con, $_POST['security_question'])."',
          security_answer = '".mysqli_escape_string($con, $_POST['security_answer'])."'
          ";
      	if (mysqli_query($con,$sql) == TRUE) {
      	    echo 'registered successfully';
            echo "<a href=login2.php>   Back</a>";
               exit;
      	} else {
      	    echo "Error: " . $sql . "<br>" . $con->error;
      	}
    }
}
?>
<!-- /*###################****registration form table****#################*/ -->
<html>
	<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  </head>
<body>
<div class="registration-form">
  <form action="register2.php" method="post">
    <a href="login2.php" >
          <span class="glyphicon glyphicon-arrow-left"></span> Back
        </a>
  <input type="text" name="username" placeholder="Username">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="confirm_password" placeholder="Confirm Password">
    <input type="text" name="phonenumber" placeholder="phonenumber">
    <div>Gender:  
                  <br><input class="ms-4" type="radio" id="male" name="select" value="Male" v-model="new_register['gender']">
                  <label class="pe-3" for="male">Male</label>
                  <input type="radio" id="female" name="select" value="Female" v-model="new_register['gender']">
                  <label class="pe-3" for="female">Female</label>
                  <input type="radio" id="others" name="select" value="Others" v-model="new_register['gender']">
                  <label for="others">Others</label>
    </div><br>
    <input type="date" name="date" placeholder="D.O.B"> <br>
    <input type="text" name="address" placeholder="Address">
    <input type="text" name="qualification" placeholder="qualification">
    security_question:-
      <select  name="security_question" placeholder="security_question">
      <option hidden>Select</option>
      <option>what is your nick name?</option>
      <option>what is your mother name?</option>
    </select>
    <input type="text" name="security_answer" placeholder="security_answer"></input>
     <div><input type="checkbox" name="terms">  Terms of Agreement</div>
    <input type="submit" name="submit" onclick="submit" value="Register">
  </form>
</div>
<style>
.registration-form {
  display: flex;
  flex-direction: column;
  align-items: center;
}
form {
  display: flex;
  flex-direction: column;
  padding: 20px;
  background-color: #f2f2f2;
  border-radius: 10px;
  box-shadow: 0px 0px 10px #ccc;
}
input[type="text"],
input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  font-size: 16px;
  border-radius: 5px;
  border: none;
}
input[type="submit"] {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  background-color: green;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
</style>
</body>
</html>