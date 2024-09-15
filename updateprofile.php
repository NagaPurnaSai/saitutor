<?php
require("config.php");
if( $_SESSION['login'] != "yes" ){
  header("Location: login.php?SessionExpired");
  exit;
}

if( $_GET['submit'] == "logout" ){
  unset( $_SESSION['login'] );
  exit;
}

if (isset($_POST['submit'])) {

    $username=mysqli_escape_string($con,$_POST['username']);
    $email=mysqli_escape_string($con,$_POST['email']);
    $phonenumber=mysqli_escape_string($con,$_POST['phonenumber']);
    $date=mysqli_escape_string($con,$_POST['date']);
    $address=mysqli_escape_string($con,$_POST['address']);
    $education=mysqli_escape_string($con,$_POST['education']);
    $user_id= $_SESSION['id'];

    $sql = "update datatable set 
    username = '".$username."',
    email = '".$email."',
    phonenumber = '".$phonenumber."',
    date = '".$date."',
    address = '".$address."',
    education = '".$education."'
    where id= ".$user_id  ;
    mysqli_query($con, $sql);
    if( mysqli_error($con) ){
      echo mysqli_error($con);
      exit;
    }
    header("Location: home.php");
    exit;
}
 
  $user_id = $_SESSION['id'];

  $sql = "select * from datatable where id = " .$user_id;
  $res = mysqli_query($con, $sql);

  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $username = $row['username'];
    $email = $row['email'];
    $phonenumber = $row['phonenumber'];
    $date = $row['date'];
    $address = $row['address'];
    $education = $row['education'];
  }
?>
<html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </head>
<body>
<form action="updateprofile.php" method="post" style="width: 40%; border:solid 1px black; margin: 10px;">
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
  </div>
  
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
  </div>
  
  <div class="form-group">
    <label for="phonenumber">Phone Number:</label>
    <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="<?php echo $phonenumber; ?>">
  </div>
  
  <div class="form-group">
    <label for="date">Date of Birth:</label>
    <input type="date" class="form-control" id="date" name="date" value="<?php echo $date; ?>">
  </div>
  
  <div class="form-group">
    <label for="address">Address:</label>
    <textarea class="form-control" id="address" name="address"><?php echo $address; ?></textarea>
  </div>
  
  <div class="form-group">
    <label for="education">Education:</label>
    <input type="text" class="form-control" id="education" name="education" value="<?php echo $education; ?>">
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit">Update Profile</button>
</form>
</body>
</html>



