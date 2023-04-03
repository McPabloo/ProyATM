<?php

if(array_key_exists('retirot', $_POST)) { 
    retirar(); 
} 

if(array_key_exists('depositart', $_POST)) { 
    depositar(); 
} 

if(array_key_exists('transferenciat', $_POST)) { 
    transferenciar(); 
} 
    
    function depositar(){

    $servername = "db4free.net";
    $username = "pablo1";
    $password = "Nsuns4xd";
    $dbname = "sisop2";

  
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

        if(isset($_POST['deposito'])){
            $name11 = $_POST['deposito'];
            $name1 = $_POST['Key'];

            //Obtiene el monto total del atm
            $monto2 = "SELECT * FROM atm";
            $monto22 = $conn->query($monto2);
            if ($monto22->num_rows > 0) {
                //output data of each row
                while($row = $monto22->fetch_assoc()) {
                $montof2 = $row["total"];
                }
            }

            //Obtiene el monto del usuario logeado
            $monto = "SELECT * FROM InvoiceDao where nombre = '$name1'";
            $monto1 = $conn->query($monto);
            if ($monto1->num_rows > 0) {
                //output data of each row
                while($row = $monto1->fetch_assoc()) {
                $montof = $row["monto"];
                }
            }

            if ($name11 > 0){
                $montof2 = $montof2 + $name11;
                $montof = $montof + $name11;
                $queryUp = "UPDATE InvoiceDao set monto = '$montof' where nombre = '$name1'";
                $updateMonto = $conn->query($queryUp);
                $queryUp2 = "UPDATE atm set total = '$montof2' where id = '1' ";
                $updateMonto2 = $conn->query($queryUp2);
                //echo "Retiro Exitoso! Puedes tomar tu tarjeta";
                include 'atm.php';
            }else{
                echo "La cantidad ingresada debe ser mayor a 0";
                include 'atm.php';
            }
        }
    }

    function transferenciar(){

        $servername = "db4free.net";
        $username = "pablo1";
        $password = "Nsuns4xd";
        $dbname = "sisop2";
    
      
          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
    
            if(isset($_POST['transferenciar'])){
                $name11 = $_POST['transferenciar'];
                $usuario = $_POST['usuariot'];
                $name1 = $_POST['Key'];
    
                //Obtiene el monto del usuario logeado
                $monto = "SELECT * FROM InvoiceDao where nombre = '$name1'";
                $monto1 = $conn->query($monto);
                //obtiene el monto del usuario de transferencia
                $montot = "SELECT * FROM InvoiceDao where nombre = '$usuario'";
                $montot1 = $conn->query($montot);
                if ($monto1->num_rows > 0) {
                    //output data of each row
                    while($row = $monto1->fetch_assoc()) {
                    $montof = $row["monto"];
                    }
                }
                if ($montot1->num_rows > 0) {
                    //output data of each row
                    while($row = $montot1->fetch_assoc()) {
                    $montof1 = $row["monto"];
                    }
                }
    
                if ($name11 > 0){
                    $montof = $montof - $name11;
                    $queryUp = "UPDATE InvoiceDao set monto = '$montof' where nombre = '$name1'";
                    $updateMonto = $conn->query($queryUp);
                    $montof1 = $montof1 + $name11;
                    $queryUp1 = "UPDATE InvoiceDao set monto = '$montof1' where nombre = '$usuario'";
                    $updateMonto = $conn->query($queryUp1);
                    //echo "Retiro Exitoso! Puedes tomar tu tarjeta";
                    include 'atm.php';
                }else{
                    echo "La cantidad ingresada debe ser mayor a 0";
                    include 'atm.php';
                }
            }
        }

    function retirar(){

        $servername = "db4free.net";
        $username = "pablo1";
        $password = "Nsuns4xd";
        $dbname = "sisop2";
    
      
          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
    
            if(isset($_POST['retiro'])){
                $name11 = $_POST['retiro'];
                $name1 = $_POST['Key'];
    
                //Obtiene el monto total del atm
                $monto2 = "SELECT * FROM atm";
                $monto22 = $conn->query($monto2);
                if ($monto22->num_rows > 0) {
                    //output data of each row
                    while($row = $monto22->fetch_assoc()) {
                    $montof2 = $row["total"];
                    }
                }

                //Obtiene el monto del usuario logeado
                $monto = "SELECT * FROM InvoiceDao where nombre = '$name1'";
                $monto1 = $conn->query($monto);
                if ($monto1->num_rows > 0) {
                    //output data of each row
                    while($row = $monto1->fetch_assoc()) {
                    $montof = $row["monto"];
                    }
                }
    
                if ($montof2 > 0){
                    
                    if ($name11 % 100 == 0){
                        if ($name11 <= $montof && $name11 <= $montof2){
                            $montof2 = $montof2 - $name11;
                            $montof = $montof - $name11;
                            $queryUp = "UPDATE InvoiceDao set monto = '$montof' where nombre = '$name1'";
                            $queryUp2 = "UPDATE atm set total = '$montof2' where  id = '1'";
                            $updateMonto = $conn->query($queryUp);
                            $updateMonto2 = $conn->query($queryUp2);
                            //echo "Retiro Exitoso! Puedes tomar tu tarjeta";
                            echo $name1;
                            include 'atm.php';
                        }else{
                            echo "La cantidad ingresada supera los fondos del atm";
                            include 'atm.php';
                        }
                    }else{
                        echo "La cantidad ingresada no es multiplo de 100";
                        include 'atm.php';
                    }
                }else{
                    echo "Lo sentimos, el cajero no dispone de fondos en este momento";
                    include 'atm.php';
                }
            }
        }
     
?>