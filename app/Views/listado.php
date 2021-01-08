<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>CRUD Pokemon!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Pokebola-pokeball-png-0.png" width="30" height="30" alt="">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <a class="nav-link"><?php echo session('usuario')?></a>
            </ul>

            <a href="<?php echo base_url('/salir')?>"><button class="btn btn-outline-danger my-2 my-sm-0">Salir</button></a>

        </div>
    </nav>

    <div class="container">
        <h1>CRUD Pokemon</h1>
        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="<?php echo base_url().'/crear' ?>">
                    <label for="mote">Mote</label>
                    <input type="text" name="mote" id="mote" class="form-control" required="">
                    <label for="nivel">Nivel</label>
                    <input type="number" name="nivel" id="nivel" class="form-control" required="">
                    <br>
                    <button class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
        <hr>
        <h2>Listado de pokemones</h2>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Mote</th>
                            <th>Nivel</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        <?php foreach($datos as $key): ?>
                            <tr>
                                <td><?php echo $key->id ?></td>
                                <td><?php echo $key->mote ?></td>
                                <td><?php echo $key->nivel ?></td>
                                <td>
                                    <a href="<?php echo base_url().'/obtenerPokemon/'.$key->id ?>" class="btn btn-warning btn-sm">Editar</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/eliminar/'.$key->id ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';

        if(mensaje == '1')
        {
            swal(':D','Agregado con exito','success');
        }
        else if(mensaje == '0')
        {
            swal(':P','Error al agregar','error');
        }
        else if(mensaje == '2')
        {
            swal(':D','Actualizado con exito','success');
        }
        else if(mensaje == '3')
        {
            swal(':P','Error al actualizar','error');
        }
        else if(mensaje == '4')
        {
            swal(':D','Eliminado con exito','success');
        }
        else if(mensaje == '5')
        {
            swal(':P','Error al eliminar','error');
        }
    </script>
  </body>
</html>