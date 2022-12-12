<?php
require_once('Entity.php');

$filename = "entity.csv.php";

if (isset($_POST['entityName']) && isset($_POST['entityValue'])) {
  Entity::createEntity($filename, $_POST['entityName'], $_POST['entityValue']);
}

if (isset($_POST['modifyEntityName']) && isset($_POST['modifyEntityValue']) && isset($_POST['entityID'])) {
  Entity::updateEntity($filename, $_POST['modifyEntityName'], $_POST['modifyEntityValue'], $_POST['entityID']);
}

if (isset($_POST['index'])) {
  Entity::deleteEntity($filename, $_POST['index']);
}

$entites_array = Entity::readEntity($filename);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="entity.css">
</head>

<body>
  <h1 class="top-header">Entities</h1>

  <div class="home-page-link">
    <a class="homeLink" href="index.php">
      <img src="assets/home.svg" alt="">
    </a>
  </div>

  <h2 class="sub-header">Create Entity</h2>
  <form method="POST">
    <div class="form-group" style="width: 18rem;">
      <label for="exampleFormControlInput1">Entity Name</label>
      <input type="text" name="entityName" class="form-control" id="exampleFormControlInput1" placeholder="Name" required>
    </div>

    <div class="form-group" style="width: 18rem;">
      <label for="exampleFormControlSelect1">Entity Value</label>
      <select name="entityValue" class="form-control" id="exampleFormControlSelect1">
        <option value="ASE">ASE</option>
        <option value="CSC">CSC</option>
        <option value="DSC">DSC</option>
        <option value="CIT">CIT</option>
      </select>
    </div>
    <div>
      <button type="submit" class="btn btn-success">Create Entity</button>
    </div>
  </form>

  <h2 class="sub-header">Modify Entity</h2>
  <form method="POST">
    <div class="form-group" style="width: 18rem;">
      <label for="exampleFormControlInput1">Entity ID</label>
      <input type="text" name="entityID" class="form-control" id="exampleFormControlInput1" placeholder="0" required>
    </div>

    <div class="form-group" style="width: 18rem;">
      <label for="exampleFormControlInput1">Entity Name</label>
      <input type="text" name="modifyEntityName" class="form-control" id="exampleFormControlInput1" placeholder="Name" required>
    </div>

    <div class="form-group" style="width: 18rem;">
      <label for="exampleFormControlSelect1">Entity Value</label>
      <select name="modifyEntityValue" class="form-control" id="exampleFormControlSelect1">
        <option value="ASE">ASE</option>
        <option value="CSC">CSC</option>
        <option value="DSC">DSC</option>
        <option value="CIT">CIT</option>
      </select>
    </div>
    <div>
      <button type="submit" class="btn btn-warning">Modify Entity</button>
    </div>
  </form>

  <h2 class="sub-header">Delete Entity</h2>
  <form method="POST">
    <div class="form-group" style="width: 18rem;">
      <label for="exampleFormControlInput1">Entity Index</label>
      <input type="text" name="index" class="form-control" id="exampleFormControlInput1" placeholder="0" required>
    </div>

    <div>
      <button type="submit" class="btn btn-danger">Delete Entity</button>
    </div>
  </form>

  <h2 class="sub-header">Display Entities</h2>
  <div>
    <?= Entity::displayEntities($entites_array); ?>
  </div>

  <script script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>