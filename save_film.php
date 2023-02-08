<?php

include('db.php');

if (isset($_POST['save_film'])) {
  $name = $_POST['name'];
  $time_duration = $_POST['time_duration'];
  $expire_date = $_POST['expire_date'];
  $release_date = $_POST['release_date'];
  $category = $_POST['category'];
  
  $query = "INSERT INTO films(name, time_duration, expire_date, release_date, category) VALUES ('$name', '$time_duration', '$expire_date', '$release_date' ,'$category')";
  $result = mysqli_query($con, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
