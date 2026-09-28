<?php

include "../includes/config.php";

$id = $_GET['id'];

$sql = "SELECT * FROM books WHERE id='$id'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE books
            SET
            title='$title',
            author='$author',
            category='$category',
            quantity='$quantity'
            WHERE id='$id'";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Book Updated Successfully!";
    }else{
        echo "Error: " . mysqli_error($conn);
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>

<h1>Edit Book</h1>

<form action="" method="POST">

    <label>Title</label><br>
    <input type="text" name="title" value="<?php echo $row['title']; ?>"><br><br>

    <label>Author</label><br>
    <input type="text" name="author" value="<?php echo $row['author']; ?>"><br><br>

    <label>Category</label><br>
    <input type="text" name="category" value="<?php echo $row['category']; ?>"><br><br>

    <label>Quantity</label><br>
    <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>"><br><br>

    <input type="submit" name="update" value="Update Book">

</form>

</body>
</html>