<?php
session_start();


  $con = mysqli_connect(
    'localhost',
    'root',
    '',
    'movie-manager'
  ) or die(mysqli_error($mysqli));

?>
