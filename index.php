<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php
include "includes/config.php";
include "includes/header.php"; 
?>

    <section class="hero">
        <div class="hero-content">
            <h1>Library Management System</h1>
             <p>
                 Manage books, students and issue records easily using
                 HTML, CSS, JavaScript, PHP and MySQL.
             </p>

             <a href="books.php" class="btn">Explore Books</a>
             <a href="login.php" class="button-secondary">Student Login</a>

        </div>
</section>
  <section class="featured-books">

<h2>Featured Books</h2>

<div class="book-container">

<?php

$sql = "SELECT * FROM books ORDER BY id DESC LIMIT 3";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){

?>

<div class="book-card">

<img src="Assets/book.png" alt="Book">

<h3><?php echo $row['title']; ?></h3>

<p>  

<strong>Author :</strong>

<?php echo $row['author']; ?>

</p>

<p>

<strong>Category :</strong>

<?php echo $row['category']; ?>

</p>

<a href="book-details.php?id=<?php echo $row['id']; ?>">

View Details

</a>

</div>

<?php

}

?>

</div>

</section>

<?php include "includes/footer.php"; ?>
</body>
</html>