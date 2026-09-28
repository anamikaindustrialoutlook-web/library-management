<?php

session_start();

if(!isset($_SESSION['user_email'])){
    header("Location: login.php");
    exit;
}

include "includes/header.php";
?>

<section class="dashboard">

    <div class="dashboard-box">

        <h1>Welcome,
            <?php echo $_SESSION['user_name']; ?>
        </h1>

        <p>You have successfully logged in.</p>

        <div class="dashboard-links">

            <a href="books.php">Browse Books</a>

            <a href="logout.php">Logout</a>

        </div>

    </div>

</section>

<?php include "includes/footer.php"; ?>