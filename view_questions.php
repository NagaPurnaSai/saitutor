<!DOCTYPE html>
<html>
<head>
  <title>Submit Answer</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
      border-radius: 5px;
    }
    h1, h3 {
      margin-top: 0;
      color: #333;
    }
    form {
      margin-bottom: 20px;
    }
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
    .btn {
      background-color: #f44336;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
    }
    .btn:hover {
      background-color: #cc2b1d;
    }
    hr {
      border: none;
      border-top: 1px solid #ccc;
      margin: 20px 0;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
      require('config.php');
      if( $_SESSION['login2'] != "yes" ){
        header("Location: login2.php?SessionExpired");
        exit;
      }
      if (isset($_POST['submit'])){
        $question_id = $_POST["question_id"];
        $answer = $_POST["answer"];
        if($question_id="" || $answer=""){
          echo "<script>
                alert('Please Mention all details');
                </script>";
        }else{
          $question_id1 = mysqli_escape_string($con,$question_id);
          $answer1 = mysqli_escape_string($con,$answer);
          $sql = " insert into answers set
          question_id='".$question_id1."',
          answer='".$answer1."'";
          if (mysqli_query($con,$sql) == TRUE) {
            echo "<p>Answers submitted successfully</p>";
            echo "<a href=home2.php class='btn'>Back</a>";
               exit;
            }else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
      }
      $sql = "select * from questions where id = " . $_GET['id'];
      $res = mysqli_query($con, $sql);
      if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
          echo "<h3>" . $row["title"] . "</h3>";
          echo "<p><b>Question:</b>" . $row["description"] . "</p>";
    echo "<p style='color:rgba(0,0,0,0.5)'>Asked by " . $row["name"]  ."(". $row["email"] .")". "</p>";
    echo "<form action='submit_answer.php' method='post'>";
    echo "<input type='hidden' name='question_id' value='" . $row["id"] . "'>";
    echo "<label for='answer'>Your Answer:</label>";
    echo "<textarea id='answer' name='answer'></textarea><br>";
    echo "<input type='submit' name='submit' value='Submit Answer'>";
    echo "</form>";
    echo "<hr>";
  }?>
  <html>
  <body>
  <button class="btn btn-sm btn-outline-danger " onclick="window.location.href='home2.php?submit=logout'">Back</button>
</body>
  </html>
  <?php

} else {
  echo "No questions found";
}
$con->close();
?>
