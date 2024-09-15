<?php
require('config.php');
if( $_SESSION['login'] != "yes" ){
  header("Location: login.php?SessionExpired");
  exit;
}
$image_id = $_POST['image_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$sql = "INSERT INTO orders (image_id, name, email) VALUES ('$image_id', '$name', '$email')";
mysqli_query($con, $sql);
mysqli_close($con);
/*header('Location: studentscorner.php');*/
?>
<html>
<body>
<button id="booksBtn">Books</button>
<div id="booksImages"></div>
<div id="orderForm"></div>
<script>
const bookImages = [
  'book1.jfif',
  'book2.jpg',
  'book3.jfif',
];
const booksBtn = document.getElementById('booksBtn');
const booksImages = document.getElementById('booksImages');
booksBtn.addEventListener('click', () => {
  booksImages.innerHTML = '';
  for (let i = 0; i < bookImages.length; i++) {
    const imageUrl = bookImages[i];
    const imageElement = document.createElement('img');
    imageElement.src = imageUrl;
    imageElement.addEventListener('click', () => {
      // Open the order form
      const orderForm = document.getElementById('orderForm');
      orderForm.innerHTML = `
        <form method="post" action="save_orders.php">
          <input type="hidden" name="image_id" value="${i}">
          <label for="name">Name:</label>
          <input type="text" name="name" id="name">
          <label for="email">Email:</label>
          <input type="email" name="email" id="email">
          <button type="submit">Submit</button>
        </form>
      `;
    });
    booksImages.appendChild(imageElement);
  }
});
</script>
</body>
</html>
