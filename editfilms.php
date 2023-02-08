<?php
include("db.php");
if (isset($_GET['update'])) {
    $id = $_GET['id_films'];
    $name= $_GET['name'];
    $time_duration = $_GET['time_duration'];
    $expire_date= $_GET['expire_date'];
    $release_date = $_GET['release_date'];
    $category= $_GET['category'];

    $query = "UPDATE films set name = '$name', time_duration = '$time_duration', expire_date = '$expire_date' , release_date = '$release_date', category = '$category' WHERE id_films=$id";
    mysqli_query($con, $query);
    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    header('Location: admin.php');
    }
