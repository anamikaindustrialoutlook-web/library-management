<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
</head>
<body>

<?php

include "../includes/config.php";


if(isset($_POST['submit'])){

       $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO books(title, author, category, quantity)
            VALUES('$title', '$author', '$category', '$quantity')";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Book Added Successfully!";
    }else{
        echo "Error: " . mysqli_error($conn);
    }

}

?>
    <h1>Add New Book</h1>
    <form action="" method="post">
        <label>Book Title</label><br>
         <input type="text" name="title"><br><br>
         <label>Author Name</label><br>
        <input type="text" name="author"><br><br>

        <label>Category</label><br>
        <input type="text" name="category"><br><br>

        <label>Quantity</label><br>
        <input type="number" name="quantity"><br><br>

        <input type="submit" name="submit" value="Add Book">



    </form>
</body>
</html>