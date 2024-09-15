<?php
require('config.php');

if( $_SESSION['login'] != "yes" ){
  header("Location: login.php?SessionExpired");
  exit;
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
    <nav class="navbar navbar-expand-lg bg-body-secondary">
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
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="categories">
                  <a class="nav-link" href="#">categories</a>
                  <ul class="sub-menu">
                <li><a href="studentscorner.php">students corner</a><li>
                <li><a href="#">teachers corner</a></li>
                <li><a href="#">achievements</a></li>
              </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="password.php">Change Password</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link "  href="edit_profile.php">Update Profile</a>
                </li>
            </ul> 
              <form class="d-flex justify-content-center ps-5" role="search">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="margin-left: 13vw; width: 300px; height: 40px;">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
              <div class="logout">
                  <button class="btn btn-sm btn-outline-danger " onclick="window.location.href='login.php?submit=logout'">Logout</button>
                </div>
          </div>
      </div>
    </nav>
  <body >
    <div class="d-flex">
  <div class="studentsdata">
    <button class="btn btn-outline-success"  style="width: 300px;
        height: 50px;" onclick="window.location.href='examsportal.php'" >Exams Portal</button>
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
  <div class="examsportal">
    <div class="container1">
      <div class="d-flex">
            <div class="mocktest" >
            <button class="btn btn-outline-info"   style="width: 585px;height: 320px;" > 
             <img src="mocktest.jfif" height="300px" width="560px"> 
            </button>
             </div>
            <div class="pq">
            <button class="btn btn-outline-info"  style="width: 585px;
            height: 320px;" > 
          <img src="previousq.jpg" height="300px" width="560px"></button>
            </div>
      </div>
      <div class="d-flex">
        <div class="notes">
        <button class="btn btn-outline-info"  style="width: 585px;
        height: 320px;" > 
        <img src="notes.png" height="300px" width="560px">
      </button>
        </div>
        <div class="jagad">
        <button class="btn btn-outline-success"  style="width: 585px;
        height: 320px;" >
        <!-- <img src="jagadeeshwari.jpeg" height="300px" width="560px">  -->
      </button>
        </div>
      </div>
    </div>
    
  </div>
</body>
  <style>
    .logout {
        width: 40px;
        height: 58px;
        margin-left: 7vw;
        padding-bottom: 5px;
        padding-top: 5px;
      }
      .categories:hover .sub-menu {
        display: block;
      }
      .sub-menu {
        position: absolute;
        color: red;
        top: 65%;
        left: 180px;
        list-style-type: none;
        display: none;
        background-color: lightblue;
      }
       .studentsdata {
        width: 300px;
        height: 640px;
        background-color: lightgray;
        border: 1px solid black;
        list-style-type: none;
        
      }
      .examsportal {
        width: 1170px;
        height: 640px;
        background-color: white;
        border: 1px solid black;
        list-style-type: none;
        
      }
      /*.mocktest {
        background-image: url(mocktest.jfif);
        background-repeat: no-repeat
      }
      .pq {
        background-image: url(previousq.jpg);
        background-repeat: no-repeat;
      }
      .notes {
        background-image: url(notes.png);
        background-repeat: no-repeat
      }*/
  </style>

   </div> 

  </body>
  </html>
