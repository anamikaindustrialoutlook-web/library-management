<?php

include "../includes/config.php";

$id = $_GET['id'];

$sql = "DELETE FROM books WHERE id='$id'";

$result = mysqli_query($conn,$sql);

if($result){

    header("Location: ../books.php");
    exit;

}else{

    echo mysqli_error($conn);

}

?>