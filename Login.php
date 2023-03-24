
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="estilos.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    <form action="usuario.php" method="POST">
        <div class="container text-center p-3">
            
            <div class="row">
              <div class="col-4">
                <span class="input-group-text align-text-center mb-1" id="addon-wrapping">TU PIN</span>
              </div>
              <div class="col-8">
                <input type="password" class="form-control" name="pin1" placeholder="1234" aria-label="1234" aria-describedby="addon-wrapping">
              </div>
            </div>

            <div class="row">
              <div class="col-4">
                <span class="input-group-text mb-1" id="addon-wrapping">Nombre</span>
              </div>
              <div class="col-8">
                <input type="text" class="form-control" name ="name1" placeholder="Pablito Clavó un Clavito" aria-label="Nombre" aria-describedby="addon-wrapping">
              </div>
            </div>

            <button type="submit">Enviar</button>

            

          </div>
    </form>

</body>
</html>