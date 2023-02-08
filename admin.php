<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

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
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Duration Time</th>
            <th>Expire Date</th>
            <th>Release Date</th>
            <th>Category</th>
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

<?php include('includes/footer.php'); ?>
