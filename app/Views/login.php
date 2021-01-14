<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="http://localhost/CodeIgniterCRUD/styles/login.css">

  <title>Login</title>
</head>

<body>
  <div class="container">
  
        <div class="card text-left justify-content-md-center">
          <div class="row">
            <div class="col"></div>
            <div class="col-9">
              <h1>Login Pokemon</h1>
              <p></p>
              <form action="<?php echo base_url('/login') ?>" method="POST">
                <label for="usuario">Correo</label>
                <input type="text" name="usuario" required="" class="form-control">
                <label for="password">Password</label>
                <input type="password" name="password" required="" class="form-control">
                <br>
                <button class="btn btn-primary">Iniciar sesión</button>
                
              </form>
              <div style="padding-top:10px;">
                <a href="<?php echo base_url().'/registro' ?>" class="btn btn-warning">Registrarse</a>
              </div>
              <div style="padding-top:10px;">
                <a href="<?php echo base_url().'/recuperar' ?>">¿Olvidaste tu contraseña?</a>
              </div>
              
                
            </div>
            <div class="col"></div>
          </div>
        </div>
      
    
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>