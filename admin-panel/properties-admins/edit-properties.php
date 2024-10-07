<?php require "../layouts/header.php"; ?>  
<?php require "../../config/config.php"; ?> 

<?php

    if(!isset($_SESSION['adminname'])) {
        echo "<script>window.location.href='login-admins.php' </script>";
    }

    if(isset($_GET['id'])) {

        $id = $_GET['id'];

        $prop = $conn->query("SELECT * FROM props WHERE id='$id'");
        $prop->execute();

        $fetch_prop = $prop->fetch(PDO::FETCH_OBJ);

    }   

    if(isset($_POST['update'])) {

        $name = $_POST['name'];
        $price = $_POST['price'];
        $type = $_POST['type'];
        $description = $_POST['description'];
        $id = $_POST['id'];

        $update_prop = $conn->query("UPDATE props SET name='$name', price='$price', home_type='$type', description='$description' WHERE id='$id'");

        if($update_prop) {
            echo "<script>window.location.href='show-properties.php' </script>";
        } else {
            echo "Something went wrong";
        }
    }

?>