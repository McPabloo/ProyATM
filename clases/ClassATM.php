<?php
class Factura {

  // Properties
  public $id;
  public $name;
  public $monto;
  public $pin;

  function __construct(){

  }


  // Methods
  function set_id() {
    $this->id = $id;
  }

  function get_id() {
    return $this->id;
  }

  function set_pin() {
    $this->pin = $pin;
  }

  function get_pin() {
    return $this->pin;
  }

  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }

  function set_monto($monto) {
    $this->name = $name;
  }
  function get_monto() {
    return $this->name;
  }

  public function guardar($pin,$nom,$monto){
    //alta de factura
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

      $i1 = $pin;
      $i2 = $nom;
      $i3 = $monto;

      //echo $nom;
      //echo $i2;

      $sql = "insert into InvoiceDao (pin, nombre, monto) values ($i1,'$i2',$i3)";
      //ESTE ESTÁ MAL

      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        return true;
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
      }
       $conn -> close();
    }

    public function ValidarPin($pin,$nombre){
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

        $name1 = $nombre;
        $pin1 = $pin;

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
        return true;
      }
      $conn->close();
      return false;
    }

    public function depositar($nom, $mont){
      $servername = "db4free.net";
      $username = "pablo1";
      $password = "Nsuns4xd";
      $dbname = "sisop2";

      $i1 = $nom;
      $i2 = $mont;

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      //monto del cajero
      $monto2 = "SELECT * FROM atm";
      $monto22 = $conn->query($monto2);
      if ($monto22->num_rows > 0) {
          //output data of each row
          while($row = $monto22->fetch_assoc()) {
          $montof2 = $row["total"];
          }
      }

      //monto del usuario
      $monto = "SELECT * FROM InvoiceDao where nombre = '$i1'";
              $monto1 = $conn->query($monto);
              if ($monto1->num_rows > 0) {
                  //output data of each row
                  while($row = $monto1->fetch_assoc()) {
                  $montof = $row["monto"];
                  }
              }

      //probar si cumple
      if ($i2 > 0){
        $montof = $montof + $i2;
        $montof2 = $montof2 + $i2;
        $queryUp = "UPDATE InvoiceDao set monto = '$montof' where nombre = '$i1'";
        $queryUp2 = "UPDATE atm set total = '$montof2' where  id = '1'";
        $updateMonto = $conn->query($queryUp);
        $updateMonto2 = $conn->query($queryUp2);
        return true;
      }else{
        return false;
      }

      $conn -> close();

    }

    public function retiro($nom, $mont){
        $servername = "db4free.net";
        $username = "pablo1";
        $password = "Nsuns4xd";
        $dbname = "sisop2";

        $i1 = $nom;
        $i2 = $mont;

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        //monto del cajero
        $monto2 = "SELECT * FROM atm";
        $monto22 = $conn->query($monto2);
        if ($monto22->num_rows > 0) {
            //output data of each row
            while($row = $monto22->fetch_assoc()) {
            $montof2 = $row["total"];
            }
        }

        //monto del usuario
        $monto = "SELECT * FROM InvoiceDao where nombre = '$i1'";
                $monto1 = $conn->query($monto);
                if ($monto1->num_rows > 0) {
                    //output data of each row
                    while($row = $monto1->fetch_assoc()) {
                    $montof = $row["monto"];
                    }
                }

        //probar si cumple
        if ($i2 > 0 && $i2 <= $montof2 && $i2 <= $montof){
          $montof = $montof - $i2;
          $montof2 = $montof2 - $i2;
          $queryUp = "UPDATE InvoiceDao set monto = '$montof' where nombre = '$i1'";
          $queryUp2 = "UPDATE atm set total = '$montof2' where  id = '1'";
          $updateMonto = $conn->query($queryUp);
          $updateMonto2 = $conn->query($queryUp2);
          return true;
        }else{
          return false;
        }

        $conn -> close();

    }

    public function transferenciar($nom,$cant,$usu){
        $servername = "db4free.net";
        $username = "pablo1";
        $password = "Nsuns4xd";
        $dbname = "sisop2";

        $i1 = $cant;
        $i2 = $nom;
        $i3 = $usu;
      
          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
    
          //if(validarPin($pin,$nombre)){
            //Obtiene el monto del usuario logeado
            $monto = "SELECT * FROM InvoiceDao where nombre = '$i2'";
            $monto1 = $conn->query($monto);
            //obtiene el monto del usuario de transferencia
            $montot = "SELECT * FROM InvoiceDao where nombre = '$i3'";
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

            if ($i1 > 0){
                $montof = $montof - $i1;
                $queryUp = "UPDATE InvoiceDao set monto = '$montof' where nombre = '$i2'";
                $updateMonto = $conn->query($queryUp);
                $montof1 = $montof1 + $i1;
                $queryUp1 = "UPDATE InvoiceDao set monto = '$montof1' where nombre = '$i3'";
                $updateMonto = $conn->query($queryUp1);
                //echo "Retiro Exitoso! Puedes tomar tu tarjeta";
                return true;
                //include 'Login.php';
            }else{
                //echo "La cantidad ingresada debe ser mayor a 0";
                //include 'atm.php';
                return false;
            }
        $conn -> close();
        return false;
         // }
         // return false;
    }

    public function mostrar(){
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
      //Mostrar las facturas filtradas
      $sql1 = "SELECT * FROM InvoiceDao where monto <= 100";
      $result = $conn->query($sql1);
  
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          //echo "<br> id: ". $row["id"]. " - Nombre: ". $row["nombre"]. " " . $row["monto"] . "<br>";
        return 1;
        }
      } else {
      //echo "0 results";
        return 0;
      }
    }

}

?>