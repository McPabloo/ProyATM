<?php
    
    if(isset($_POST['name1']) && isset($_POST['pin1'])){

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

        $name1 = $_POST['name1'];
        $pin1 = $_POST['pin1'];

        //Mostrar las facturas filtradas
      $sql1 = "SELECT nombre FROM InvoiceDao where nombre = '$name1' and pin = '$pin1'";
      $monto = "SELECT * FROM InvoiceDao where nombre = '$name1' and pin = '$pin1'";
      
      $result = $conn->query($sql1);
      $monto1 = $conn->query($monto);
    
      if ($monto1->num_rows > 0) {
        //output data of each row
        while($row = $monto1->fetch_assoc()) {
          $montof = $row["monto"];
        }
      }

      if ($result->num_rows > 0) {
        /* output data of each row
        while($row = $result->fetch_assoc()) {
          //echo "<br> id: ". $row["id"]. " - Nombre: ". $row["nombre"]. " " . $row["monto"] . "<br>";
        return 1;
        }¨*/
        include 'atm.php';
      }

    }
    
     
?>