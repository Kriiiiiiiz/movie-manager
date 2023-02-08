<?php
include("db.php");

$name = "";
$time_duration = "";
$expire_date = "";
$release_date = "";
$category = "";


if  (isset($_POST['id'])) {
  $id = $_POST['id'];
  $query = "SELECT * FROM films WHERE id=$id";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    $name = $row['name'];
    $time_duration = $row['time_duration'];
    $expire_date = $row['expire_date'];
    $release_date = $row['release_date'];
    $category = $row['category'];

  }
}
  
  $myid = $_GET['id'];
?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editfilms.php" method="GET">
        <div class="form-group">
          <input name="name" type="text" class="form-control" value="<?php echo $_GET['name']; ?>" placeholder="Update Name">
        </div>
        <div class="form-group">
          <label for="start">Time Duration:</label>
          <input type="number" name="time_duration" class="form-control" value="<?php echo $_GET['time_duration']; ?>">
        </div>
        <div class="form-group">
          <label for="start">Expire Date:</label>
          <input type="date" name="expire_date" class="form-control" value="<?php echo $_GET['expire_date']; ?>">
        </div>
        <div class="form-group">
          <label for="start">Release Date:</label>
          <input type="date" name="release_date" class="form-control" value="<?php echo $_GET['release_date']; ?>">
        </div>
        <div class="form-group">
                <input type="text" name="category" class="form-control" value="<?php echo $_GET['category']; ?>" placeholder="Category" >
            </div>
        <button class="btn-success" name="update">
          Update
        </button>
      <input type="hidden" name="id_films" value="<?php echo $myid; ?>"/>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

