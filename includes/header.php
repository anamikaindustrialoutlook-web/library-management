<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>

    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>Library Management System</h1>
    <header>
       <div class="logo">
          <h2>LibraryMS</h2>
          
       </div>
         <div>
         <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="books.php">Books</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
         </nav>  
             </div> 
       <div class="auto-buttons">

<?php

if(isset($_SESSION['user_email'])){

?>

<a href="dashboard.php">Dashboard</a>

<a href="logout.php">Logout</a>

<?php

}else{

?>

<a href="login.php">Login</a>

<a href="register.php">Register</a>

<?php

}

?>

</div>
    </header>
    
</body>
</html>