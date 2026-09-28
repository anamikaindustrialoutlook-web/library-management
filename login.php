<?php

session_start();l

include "includes/config.php";
include "includes/header.php";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Email check
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){

        // User data fetch
        $row = mysqli_fetch_assoc($result);

        // Password check
        if($password == $row['password']){

            // Session create
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];

            // Redirect
            header("Location: dashboard.php");
            exit;

        }else{

            echo "<p style='color:red;'>Wrong Password.</p>";

        }

    }else{

        echo "<p style='color:red;'>Email not found.</p>";

    }

}

?>

<section class="login-section">

    <div class="login-box">

        <h2>Login</h2>

        <form action="" method="post">

            <label>Email</label><br>
            <input type="email" name="email" placeholder="Enter your email" required><br><br>

            <label>Password</label><br>
            <input type="password" name="password" placeholder="Enter your password" required><br><br>

            <input type="submit" name="login" value="Login" class="login-btn">

        </form>

        <p>
            Don't have an account?
            <a href="register.php">Register</a>
        </p>

    </div>

</section>

<?php include "includes/footer.php"; ?>