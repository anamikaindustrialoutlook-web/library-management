<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

include "includes/config.php";
include "includes/header.php";

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Password check
    if($password != $confirm_password){

        echo "Passwords do not match.";

    }else{

        // Email check
        $check = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $check);

        if(mysqli_num_rows($result) > 0){

            echo "Email already exists.";

        }else{

            // Insert data
            $sql = "INSERT INTO users(name,email,password)
                    VALUES('$name','$email','$password')";

            $insert = mysqli_query($conn, $sql);

            if($insert){
                echo "Registration Successful!";
            }else{
                echo mysqli_error($conn);
            }
        }
    }
} 

?>

<section class="register-section">

    <div class="register-box">

        <h2>Create Account</h2>

        <form action="" method="post">

            <label>Full Name</label><br>
            <input type="text" name="name" placeholder="Enter your full name" required><br><br>

            <label>Email Address</label><br>
            <input type="email" name="email" placeholder="Enter your email" required><br><br>

            <label>Password</label><br>
            <input type="password" name="password" placeholder="Enter password" required><br><br>

            <label>Confirm Password</label><br>
            <input type="password" name="confirm_password" placeholder="Confirm password" required><br><br>

            <input type="submit" name="register" value="Register" class="register-btn">

        </form>

        <p class="login-link">
            Already have an account?
            <a href="login.php">Login</a>
        </p>

    </div>

</section>

<?php include "includes/footer.php"; ?>
</body>
</html>