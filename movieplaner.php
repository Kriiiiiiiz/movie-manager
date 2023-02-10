<?php
session_start();

// Comrpobar logueo
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
} else if ($_SESSION["role"] === "admin") {
  header("location: admin.php");
  exit;
}
?>

<!DOCTYPE html>
<html ng-app="myApp">

<head lang="en">
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="styles.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Free Movies</title>
</head>

<a href="logout.php" class="btn btn-danger ml-3">Log Out</a>

<body class='body' ng-controller="MyController">

  <div class="containerfull">
    <label>Search </label>
    <input type="text" ng-model="inpTitle" placeholder="title" required id="searchInput" />
    <button type="submit" id="btnGo">GO!</button>

    <hr />

    <table class="table table-bordered table-striped">
      <thead>
        <tr class='trTable'>
          <th>#</th>
          <th>Title</th>
          <th>Trailer</th>
        </tr>
      </thead>
      <tbody id="tableMovie">
      </tbody>
    </table>
  </div>

  <script src='./src/search.js'></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js%22%3E"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js%22%3E"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>