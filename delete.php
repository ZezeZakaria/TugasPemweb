<?php
    require './config/db.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        mysqli_query($db_connect, "DELETE FROM products WHERE id=$id");
        header("Location: show.php");
    }
?>
