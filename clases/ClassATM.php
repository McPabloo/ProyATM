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
        return 1;
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return 0;
      }
       $conn -> close();
    }

    public function guardar1(){
        guardar($pin,$nom,$monto);
        return 1;
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