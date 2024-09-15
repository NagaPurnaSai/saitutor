<?php
require('config.php');

if( $_SESSION['login'] != "yes" ){
  header("Location: login.php?SessionExpired");
  exit;
}

$name = $_SESSION['username'];


$query="select q.description, a.answer from questions as q left join answers as a on q.id = a.question_id where q.name = '" . $name ."' ";

$result = mysqli_query($con, $query);
if(mysqli_error($con)){
  echo mysqli_error ($con);
  echo "<div>".$query."</div>";
}

// Display the questions and answers in a table

mysqli_close($con);
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
                  <a class="nav-link" href="?">categories</a>
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
  
  <body>
    <div class="d-flex">
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
        <div><?php
        echo "<div class='container mt-5' style='padding-left:0px; padding-top: 19px'>";
        echo "<a href='studentscorner.php' class='btn btn-outline-danger mb-3'> Back  </a>";
        echo "<table class='table table-bordered table-hover table-striped' style='width:248%'>";
        echo "<thead class='thead-dark' style='background-color:green'><tr><th>Question</th><th>Answer</th></tr></thead><tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["description"] . "</td><td>" . $row["answer"] . "</td></tr>";
        }
        echo "</tbody></table>";
        echo "</div>";        
  ?></div>
</div>
</body>
  <style>
    <style>
      .container {
        margin-top: 40vh;
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
        margin-top: 67px;
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
