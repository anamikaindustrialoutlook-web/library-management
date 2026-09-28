<?php

include "includes/config.php";
include "includes/header.php";


if(isset($_GET['search']) && $_GET['search'] != ""){

    $search = $_GET['search'];

    $sql = "SELECT * FROM books
            WHERE title LIKE '%$search%'
            OR author LIKE '%$search%'
            ORDER BY id DESC";

}else{

    $sql = "SELECT * FROM books
            ORDER BY id DESC";

}

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
    
</head>
<body>

<h1>Books List</h1>

<form action="" method="GET" class="search-form">

    <input
        type="text"
        name="search"
        placeholder="Search by Title or Author..."
        value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">

    <input type="submit" value="Search" class="search-btn">

</form>

<div  class="table-container">



<table border="1" cellpadding="10">

<tr>

    <th>ID</th>

    <th>Title</th>

    <th>Author</th>

    <th>Category</th>

    <th>Quantity</th>

</tr>

<tbody>

<?php

if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)){

?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['title']; ?></td>

    <td><?php echo $row['author']; ?></td>

    <td><?php echo $row['category']; ?></td>

    <td><?php echo $row['quantity']; ?></td>

    <td>

        <a href="book-details.php?id=<?php echo $row['id']; ?>" class="view-btn">
            View
        </a>

        <a href="admin/edit-book.php?id=<?php echo $row['id']; ?>" class="edit-btn">
            Edit
        </a>

        <a href="admin/delete-book.php?id=<?php echo $row['id']; ?>"
           class="delete-btn"
           onclick="return confirm('Are you sure you want to delete this book?')">
            Delete
        </a>

    </td>

</tr>

<?php

    }

}else{

?>

<tr>

    <td colspan="6">No Books Found.</td>

</tr>

<?php

}

?>

</tbody>

</table>
</div>
</body>
</html>