<?php
require("config.php");
/*######################****session login***##################*/
if( $_GET['submit'] == "logout" ){
  unset( $_SESSION['login'] );
  header("Location: login.php?");
  exit;
}

if (isset($_POST['submitq'])) {
$title = $_POST["title"];
$description = $_POST["description"];
$name = $_POST["name"];
$email = $_POST["email"];



if($title == "" || $description == ""){
  echo "<script>
        alert('Please Mention all details');
        </script>"; 
    }else{

$sql = "insert into questions set 
          title = '".mysqli_escape_string($con,$title)."',
          description = '".mysqli_escape_string($con,$description)."',
          name = '".mysqli_escape_string($con,$name)."',
          email = '".mysqli_escape_string($con,$email)."'
          ";
         if (mysqli_query($con,$sql) == TRUE) {
            echo '<div class="alert alert-success" role="alert">Submitted question successfully</div>';
            echo '<a href="?" class="btn btn-primary">Back</a>';
            exit;
        } else {
            echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . "<br>" . $con->error . '</div>';
        }
    }
}

$user_id = $_SESSION['id'];

$sql = "select * from datatable where id = " .$user_id;
$res = mysqli_query($con, $sql);

if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $username = $row['username'];
    $email = $row['email'];
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
    <div class="bg bg-opacity-75" style="min-height: 200vh;">
    <nav class="navbar navbar-expand-lg bg-body-secondary fixed-top">
      <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="https://th.bing.com/th/id/OIP.FJ_Lnwns5vGimrdrSYATywHaGd?w=181&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" width="100px" height="80px" class="p-2">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="active">
                    <a class="nav-link active" aria-current="page" href="home.php"><i class="far fa-home"></i>Home</a>
                </li>
                <li class="categories">
                  <a class="nav-link" href="#">categories</a>
                  <ul class="sub-menu">
                    <li class="nav-item"><a class="nav-link" href="studentscorner.php">students-corner</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">teachers-corner</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">achievements</a></li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link "  href="updateprofile.php">Update Profile</a>
                </li>
            </ul> 
              <form class="d-flex justify-content-center ps-5" role="search">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="margin-left: 18vw; width: 300px;
        height: 40px;">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
              <div class="logout">
                  <button class="btn btn-sm btn-outline-danger " onclick="window.location.href='login.php?submit=logout'">Logout</button>
                </div>
          </div>
      </div>
    </nav>
    <!-- @@@@@@@@@@@@@@@post_Q@@@@@@@@ -->
  
  <body>
    <div class="d-flex" style="background-image: url('bq-question5.jpg'); background-repeat: no-repeat; background-size: cover;">
  <div class="studentsdata">
    <button class="btn btn-outline-success"  style="width: 300px;
        height: 50px;" onclick="window.location.href='examsportal.php'">Exams Portal</button>
    <button class="btn btn-outline-success"style="width: 300px;
        height: 50px;">Books</button>
    <button class="btn btn-outline-success" style="width: 300px;
        height: 50px;">Video lessons</button>
    <button class="btn btn-outline-success" style="width: 300px;
        height: 50px;">Chat</button>
    <button class="btn btn-outline-success" style="width: 300px;
        height: 50px;" onclick="window.location.href='submit_question.php'">Post a Question?</button>
    <button class="btn btn-outline-success" style="width: 300px;
        height: 50px;" onclick="window.location.href='history.php'">History</button>        
  </div>
  <div>
    
<body>
  <form action="submit_question.php" method="post" style=" border:solid 2px black; background-color: lightgray;
          width: 100%;
          margin-top: 140px;
          margin-bottom: 0px;
          margin-right: 150px;
          margin-left: 200px;">
    <div class="form-group" style="border:solid 1px black; margin: 10px;">
        <label for="title"><b>Question Title</b></label>
        <select name="title" id="title" class="form-control" style="color: darkred; border:solid 1px green;">
            <option>Physics</option>
            <option>Chemistry</option>
            <option>Mathematics</option>
            <option>English</option>
        </select>
    </div>
    <div class="form-group" style="border:solid 1px black; margin: 10px;">
        <label for="description"><b>Question Description</b></label>
        <textarea id="description" name="description" class="form-control"></textarea>
    </div>
    <div class="form-group" style="border:solid 1px black; margin: 10px;">
        <div for="name"><b>Your Name</b></div>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo $username; ?>" readonly>
    </div>
    <div class="form-group" style="border:solid 1px black; margin: 10px;">
        <div for="email"><b>Your Email</b></div>
        <input type="text" id="email" name="email" class="form-control" value="<?php echo $email; ?>" readonly>
    </div>
    <div class="text-center m-2">
      <button type="submit" name="submitq" class="btn btn-primary">Submit</button>
      <a href="studentscorner.php" class="btn btn-secondary">Back</a>
    </div>
</form>
</body>
</div>
</div>
</body>
    <style>
      .container {
        margin-top: 20vh;
        text-align: right;
      }
    .logout {
        width: 40px;
        height: 58px;
        margin-left: 5vw;
        padding-bottom: 5px;
        padding-top: 5px;
      }
      .categories:hover .sub-menu {
        display: block;
      }
      .sub-menu {
        position: absolute;
        left: 0;
        list-style-type: none;
        background-color: green;
        padding: 0;
          margin-top: 0px;
          margin-bottom: 100px;
          margin-right: 150px;
          margin-left: 180px;
        border: 1px solid #ccc;
        display: none;
      }
      .sub-menu li {
        display: block;
      }
      .sub-menu li a {
        display: block;
        padding: 10px;
        color: #000;
        text-decoration: none;
      }
      .sub-menu li a:hover {
        background-color: #f2f2f2;
      }

      .container-fluid{
        height: 50px;
      }
       .studentsdata {
        margin-top: 65px;
        width: 300px;
        height: 700px;
        background-color: lightgray;
        border: 1px solid black;
        list-style-type: none;
        
      }
  </style>

   </div> 

  </body>
  </html>
