<?php
// set up database connection

$conn = mysqli_connect('localhost', 'root', '', 'samplesai');

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// retrieve user input from HTML form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// prepare and execute SQL statement to insert user details into database
$sql = "INSERT INTO save-data (name, email, phone) VALUES ('$name', '$email', '$phone')";

if (mysqli_query($conn, $sql)) {
    echo "User details saved successfully<br><br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// retrieve all save_data from database
$sql = "SELECT * FROM save_data";
$result = mysqli_query($conn, $sql);

// display user details in a table
if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>Name</th><th>Email</th><th>Phone</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No user details found";
}

// close database connection
mysqli_close($conn);
?>
