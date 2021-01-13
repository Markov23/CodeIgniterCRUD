<?php
  
  $id = $datos[0]['id'];
  $mote = $datos[0]['mote'];
  $nivel = $datos[0]['nivel'];
  $entrenador = $datos[0]['entrenador'];

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/CodeIgniterCRUD/styles/actualizar.css">

  <title>Actualizar registro!</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="nav">
      <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Pokebola-pokeball-png-0.png" width="30" height="30"
        alt="">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <a class="nav-link">
            <?php echo session('usuario')?>
          </a>
        </ul>

        <a href="<?php echo base_url('/salir')?>"><button class="btn btn-danger btn-sm">Salir</button></a>

      </div>
    </div>
  </nav>
  <div class="container">
    <h1>Actualizar Pokemon</h1>
    <div class="row">
      <div class="col-sm-12">
        <form method="POST" action="<?php echo base_url().'/actualizar' ?>">

          <input type="text" id="id" name="id" hidden="" value="<?php echo $id ?>">

          <label for="mote">Mote</label>
          <input type="text" name="mote" id="mote" class="form-control" required="" value="<?php echo $mote ?>">
          <br>
          <br>
          <label for="nivel">Nivel</label>
          <input type="number" name="nivel" id="nivel" class="form-control" required="" value="<?php echo $nivel ?>">

          <br>
          <button class="btn btn-warning">Guardar</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>