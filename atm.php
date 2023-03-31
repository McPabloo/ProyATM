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

<style>
    .usuario{
        align-content: center;
        background-color: white;
        text-align: center;
        height: 100px;
        width: 200px;
        margin: 0 auto;
        border: 5px solid;
    }
</style>

<body>

<br>
<div class="usuario">
<?php 
      echo "Hola de nuevo: $name1"; 
      echo "<br/>";
      echo "Saldo Actual: $montof" ;
?>
</div>

<div class="center">
<div class="container text-center">
  <div class="row">

  <div class="col">
    <h1>TRANSFERIR</h1>
    <br>
        <form action="atmclass.php" method="POST">
            <div class="container text-center p-3">
                <div class="form-floating mb-3 element">
                    <input type="number" name="transferenciar" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Monto a Transferir</label>
                               
                    <input type="hidden" name="Key" value="<?=$name1 ?>" />
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="usuariot" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Beneficiario</label>
                </div>
                <button type="submit" name="transferenciat" value="transferenciat">Enviar</button>
            </div>
        </form>
    </div>

    <div class="col">
    <h1>DEPOSITAR</h1>
    <br>
        <form action="atmclass.php" method="POST">
            <div class="container text-center p-3">
                <div class="form-floating mb-3 element">
                    <input type="number" name="deposito" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Monto a Depositar</label>
                    <input type="hidden" name="Key" value="<?=$name1 ?>" />
                </div>
                <button type="submit" name="depositart" value="depositart">Enviar</button>
            </div>
        </form>
    </div>

    <div class="col">
    <h1>RETIRAR</h1>
    <br>
        <form action="atmclass.php" method="POST">
            <div class="container text-center p-3 element">
                <div class="form-floating mb-3">
                    <input type="number" name="retiro" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Monto a Retirar</label>
                    <input type="hidden" name="Key" value="<?=$name1 ?>" />
                </div>
                <button type="submit" name="retirot" value="retirot">Enviar</button>
            </div>
        </form>
    </div>

  </div>
</div>
</div>


</body>
</html>