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
          <a class="nav-link" href="settings.php">Настройки</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<form action = "course_to_db.php" method="post" class="row g-3 needs-validation" novalidate>
  <div class="col-md-7">
    <label for="validationName" class="form-label">Название факультета</label>
    <input type="text" class="form-control" id="validationName" name="fac" required>
    <div class="valid-feedback">
    </div>
    <div class="invalid-feedback">
      Введите корректные данные
    </div>
  </div>
<div class="d-grid gap-2 col-6 mx-auto">
  <button onclick="addInput()" class="btn btn-primary" type="button"><i class="bi bi-plus"></i>Добавить предмет</button>
  <button onclick="addCol()" class="btn btn-primary" type="button"><i class="bi bi-plus"></i>Добавить активность</button>
</div>



<table class="table">
  <thead>
    <tr id="table_n">
      <th scope="col"></th>
      <th scope="col">Название предмета</th>
    </tr>
  </thead>
  <tbody id="sub_table">

  </tbody>
</table>
  <button type="submit" class="btn btn-primary btn-lg" style="width:10%;">Сохранить</button>
</form>
<script>
var count=1;
var colc=1;
var strc=1;
function addInput(){
  var f = String(count);
  var x = String(colc);
  var y =  String(strc);
  var st = document.getElementById("sub_table");
  var newTr = document.createElement("tr");
  newTr.id = "el" + f;
  newTr.innerHTML = "<td> <button onclick='deleteInput(" + f + ")' type='button col' class='btn btn-danger'>Удалить <i class='bi bi-trash'></i></button> </td>  <td> <div class='col'> <input name='subject" + f + "' id = 'subject" + f + "' type='text' class='form-control'></div> </td>";
  st.appendChild(newTr);
  var ela="el"+f;
  var tr=document.getElementById(ela);
  for(var i=1; i<colc;i++){
      var str = String(i);
      var sq = document.createElement("td"); 
      sq.innerHTML = "<div class='col'> <input name='act" + f + "col"+str+"' id = 'act" + f + "col" + str +"' type='text' class='form-control'></div>";
      tr.appendChild(sq);
    }
  count++;
}



function addCol(){
    var newTh = document.createElement("th");
    var x = String(colc);
    var f = String(count);
    var tn = document.getElementById("table_n");
    newTh.scope = "col";
    newTh.innerHTML = "<input name='col"+ x +"' id = 'col"+ x + "' type='text' class='form-control'>";
    tn.appendChild(newTh);
    
    for(var i=1; i<count;i++){
      var str = String(i);
      var tr=document.getElementById("el" + str);
      if(tr!=null){
          var sq = document.createElement("td"); 
          sq.innerHTML = "<div class='col'> <input name='act" + str + "col"+ x +"' id = 'act" + str + "col"+ x +"' type='text' class='form-control'></div>";
          tr.appendChild(sq);
      }
      
    }
    colc++;
}



function deleteInput(a){
    var b = document.getElementById("el" + a);
    b.remove();
}
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
</body>
</html>