<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Editar contraseña</title>
  </head>
  <body>
    <div class="container">
    <div class="row"> 
        <!-- <div class="col-2">&nbsp;</div> -->
        <div class="col-12" align="center"><h1>Para su seguridad cambie la contraseña</h1>
         </div>
         <!-- <div class="col-2">&nbsp;</div> -->
     </div>
      <br>
      <br>
      <br>
      <pre>
      <?php print_r($datos); ?>
      </pre>
      <!------ Inicio de sesión ------->
      
       <div class="row" >
        <!-- <div class="col-3">&nbsp;</div> -->
      
        
          <!------ Inicio de formulario ------->
          <div class="col-12" align="center" >
              <form method="post" action="">
                  <div class="col-md-4">
                    <label for="pass_actual" class="form-label">Contraseña actual: </label>
                    <input type="password" class="form-control" name="pass_actual">
                  </div>
                  <div class="col-md-4">
                    <label for="pass" class="form-label">Nueva contraseña: </label>
                    <input type="password" class="form-control" name="pass">
                  </div>
                  <div class="col-md-4">
                    <label for="pass_confirma" class="form-label">Confirme la nueva contraseña: </label>
                    <input type="password" class="form-control" name="pass_confirma">
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary">Guardar contraseña</button>
              </form>
          </div>
          
          <!-- <div class="col-3">&nbsp;</div> -->
       </div>
      <br>
       
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>