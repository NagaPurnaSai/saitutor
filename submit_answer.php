<?php
require('config.php');

if( $_SESSION['login2'] != "yes" ){
  header("Location: login2.php?SessionExpired");
  exit;
}
if ($_POST['submit']){


if($_POST["question_id"]=="" || $_POST["answer"]==""){
  echo "<script>
        alert('Please Mention all details');
        </script>";

}else{
$question_id = mysqli_escape_string($con,$_POST["question_id"]);
$answer = mysqli_escape_string($con,$_POST["answer"]);


$sql = " insert into answers set
question_id='".$question_id."',
answer='".$answer."'";

if (mysqli_query($con,$sql) == TRUE ) {
            echo "  answers submitted successfully";
            echo " <a href=home2.php>Back</a>";
               exit;

  }else {
  echo "Error: " . $sql . "<br>" . $con->error;
}
}
}
$con->close();
?>
