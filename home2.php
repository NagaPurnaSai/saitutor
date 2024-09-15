<?php

require('config.php');

if ($_SESSION['login2'] != "yes") {
    header("Location: login2.php?SessionExpired");
    exit;
}
echo "<div class='logout'>";
echo "<button class='btn btn-sm btn-outline-danger ' onclick=\"window.location.href='login2.php?submit=logout'\">Logout</button>";
echo "</div>";

echo "</div>";

echo "<div class='container'>";
echo "<h1 class='mt-5 text-center' style='color:red'>Welcome, " . $_SESSION["username"] . "!</h1>";

$sql = "select * from questions where id not in (select question_id from answers) order by id";

$res = mysqli_query($con, $sql);

if (mysqli_num_rows($res) > 0) {
    echo "<h2 class='my-4'>Unanswered Questions:</h2>";
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<div class='card my-3'>";
        echo "<div class='card-body'>";
        echo "<h3 class='card-title'>" . $row["title"] . "</h3>";
        echo "<p class='card-text'>" . $row["description"] . "</p>";
        echo "<a href='view_questions.php?id=" . $row["id"] . "' class='btn btn-primary'>View Question</a>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p>No unanswered questions.</p>";
}

$con->close();
?>
<html>

<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

</html>
<style>
    .logout {
        text-align: right;
    }
</style>
