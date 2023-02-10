<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<aside class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Free Movies</a>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a href="logout.php" class="btn btn-danger  me-md-2">Log Out</a>
    </div>
</aside>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD FILM FORM -->
      <div class="card card-body">
            <form action="save_film.php" method="POST">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Film Title" autofocus>
            </div>
            <div class="form-group">
            <label for="start">Time Duration:</label>
            <input type="number" name="time_duration" class="form-control" autofocus>
            </div>
            <div class="form-group">
            <label for="start">Expire Date:</label>
            <input type="date" name="expire_date" class="form-control" autofocus>
            </div>
            <div class="form-group">
            <label for="start">Release Date:</label>
            <input type="date" name="release_date" class="form-control" autofocus>
            </div>
            <div class="form-group">
                <input type="text" name="category" class="form-control" placeholder="Category" autofocus>
            </div>
            <input type="submit" name="save_film" class="btn btn-success btn-block" value="Save">
            </form>
        </div>
    </div>
    <div class="col-md-8">
      <table class="table table-striped bg-dark text-white">
        <thead>
          <tr>
            <th>Name</th>
            <th>Duration Time</th>
            <th>Expire Date</th>
            <th>Release Date</th>
            <th>Category</th>
            <th>      </th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM films";
          $result_tasks = mysqli_query($con, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['time_duration']; ?></td>
            <td><?php echo $row['expire_date']; ?></td>
            <td><?php echo $row['release_date']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id_films'];?>&name=<?php echo $row['name'];?>&time_duration=<?php echo $row['time_duration'];?>&expire_date=<?php echo $row['expire_date'];?>&release_date=<?php echo $row['release_date'];?>&category=<?php echo $row['category'];?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_film.php?id=<?php echo $row['id_films'];?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<footer class="bg-light text-center text-white">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #3b5998;"
        href="#!"
        role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #55acee;"
        href="#!"
        role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #dd4b39;"
        href="#!"
        role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #ac2bac;"
        href="#!"
        role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #0082ca;"
        href="#!"
        role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>
      <!-- Github -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #333333;"
        href="#!"
        role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright:
    <a class="text-white" href="https://http://localhost/movie-manager">freemovie.com</a>
  </div>
  <!-- Copyright -->
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
