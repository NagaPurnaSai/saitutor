<?php
require('config.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image_id = $_POST['image_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "INSERT INTO orders (image_id, name, email) VALUES ('$image_id', '$name', '$email')";
    if (mysqli_query($con, $sql)) {
        echo "Order saved successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
} else {
    header("HTTP/1.0 405 Method Not Allowed");
    echo "HTTP/1.0 405 Method Not Allowed";
}
?>
