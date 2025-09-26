<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Lawyer</title>
</head>

<body>
  <?php
  include "header.php";
  ?>

  <div class="container pt-5">
    <form action="save-lawyer.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nameInput" class="form-label">Lawyer Name</label>
        <input type="text" name="name" class="form-control" id="name">
      </div>
      <div class="mb-3">
        <label for="emailInput" class="form-label">Lawyer Email</label>
        <input type="email" name="email" class="form-control" id="emailInput">
      </div>
      <div class="mb-3">
        <label for="phoneInput" class="form-label">Lawyer Phone</label>
        <input type="text" name="phone" class="form-control" id="phoneInput">
      </div>
      <div class="mb-3">
        <label for="passwordInput" class="form-label">Lawyer Password</label>
        <input type="password" name="password" class="form-control" id="passwordInput">
      </div>
      <div class="row">
        <div class="col-md-6">
          <select class="form-select mb-3" name="city" aria-label="Default select example">
            <?php
            include("../database/connection.php");
            $city_sql = "SELECT * FROM city";
            $city_query = mysqli_query($conn, $city_sql);
            $city_chk_query = mysqli_num_rows($city_query);
            if ($city_chk_query > 0) {
              echo " <option required selected>Select City</option>";
              while ($city_row = mysqli_fetch_assoc($city_query)) {
                echo "<option  value = '" . $city_row['city_id'] . "'>  " . $city_row['city'] . " </option>";
              }
            }
            ?>
          </select>
        </div>
        <div class="col-md-6">
          <select class="form-select mb-3" name="specialty" aria-label="Default select example">
            <?php
            include("../database/connection.php");
            $specialty_sql = "SELECT * FROM specialty";
            $specialty_query = mysqli_query($conn, $specialty_sql);
            $specialty_chk_query = mysqli_num_rows($specialty_query);
            if ($specialty_chk_query > 0) {
              echo " <option required selected>Select Specialty</option>";
              while ($specialty_row = mysqli_fetch_assoc($specialty_query)) {
                echo "<option  value = '" . $specialty_row['specialty_id'] . "'>  " . $specialty_row['specialty'] . " </option>";
              }
            }
            ?>
          </select>
        </div>
      </div>
      <div class="mb-3">
        <label for="imageInput" class="form-label">Lawyer Image</label>
        <input type="file" name="fileToUpload" class="form-control" id="imageInput">
      </div>
      <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
  </div>
  </div>
</body>

</html>