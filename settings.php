<!DOCTYPE html>
<html lang="ru">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>StudScore</title>
    
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">StudScore</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="table-rating.php">Рейтинг</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Справочник</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="d-grid gap-2 col-6 mx-auto">
  <a href="course_add.php" class="btn btn-primary" type="button"><i class="bi bi-plus"></i>Добавить факультет</a>
</div>

<div class="list-group">
    <?php
    $mysqli = new mysqli("StudScore", "root", "root", "facs");
    $query = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'facs'";
    $result = $mysqli->query($query);
    while ($row = $result->fetch_assoc()) {
        echo "<form action='course_edit.php' class='list-group-item' aria-current='true'><input class='visually-hidden' type='radio' name='".$row["TABLE_NAME"]."' value='".$row["TABLE_NAME"]."'>".$row["TABLE_NAME"]." <button type='submit' class='btn btn-dark'><i class='bi bi-pencil-square'></i></button></form>";
    }
    $result->close();
    $mysqli->close();
  ?>
 </div>


  


</body>
</html>