<?php

include "includes/config.php";
include "includes/header.php";

// Check if ID is passed
if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "SELECT * FROM books WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

    }else{

        echo "<h2 style='text-align:center; color:red;'>Book Not Found!</h2>";
        include "includes/footer.php";
        exit;
    }

}else{

    echo "<h2 style='text-align:center; color:red;'>Invalid Request!</h2>";
    include "includes/footer.php";
    exit;
}

?>

<section class="book-details">

    <div class="details-card">

        <img src="Assets/book.png" alt="Book Image">

        <h2><?php echo $row['title']; ?></h2>

        <p>
            <strong>Author :</strong>
            <?php echo $row['author']; ?>
        </p>

        <p>
            <strong>Category :</strong>
            <?php echo $row['category']; ?>
        </p>

        <p>
            <strong>Available Quantity :</strong>
            <?php echo $row['quantity']; ?>
        </p>

        <a href="books.php" class="back-btn">
            ← Back To Books
        </a>

    </div>

</section>

<?php include "includes/footer.php"; ?>