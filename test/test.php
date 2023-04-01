<?php

use PHPUnit\Framework\TestCase;
require 'clases\classATM.php';
use ClassATM;

class test extends TestCase{
    private $op;
    public function setUp():void{
        $this -> op = new Factura();
    }

    //test guardar
    public function testGuardar(){
        $i1 = true;
        $this -> assertEquals(true,$this->op->guardar(16,"Yessica",5200));
    }

    //test Deposito
    public function testDeposito(){
        $i1 = true;
        $this -> assertEquals(true,$this->op->depositar("Pablo",500));
    }

    //test retiro
    public function testRetiro(){
        $i1 = true;
        $this -> assertEquals(true,$this->op->retiro("Brayan",300));
    }

    //test transferencia
    public function testTransferencia(){
        $esperado = true;
    
        $this->assertEquals(true,$this->op->transferenciar("Pablo",100,"Brayan"));
    }


    //mock Deposito
    public function testMockDeposito(){
        $data = $this->getMockBuilder(Factura::class)->getMock();
        $data->method('ValidarPin')->will($this->returnValue(true));

        $this->assertEquals(true, $data->depositar("Brayan", 200));
    }
    //mock retiro
    public function testMockRetiro(){
        $data = $this->getMockBuilder(Factura::class)->getMock();
        $data->method('ValidarPin')->will($this->returnValue(true));

        $this->assertEquals(true, $data->retiro("Brayan", 200));
    }

    //mock transferencia
    public function testMockTransferencia(){
        $data = $this->getMockBuilder(Factura::class)->getMock();
        $data->method('ValidarPin')->will($this->returnValue(true));
    
        $this->assertEquals(true,$data->transferenciar("Pablo",1000,"Brayan"));
    }

    // mock guardar
    public function testMockGuardar(){
        $data = $this->getMockBuilder(Factura::class)->getMock();
    
        $this->assertEquals(true,$data->guardar(123123,"Prueba",1000));
    }

    public function testfiltro(){
        $i1 = 1;
        $this -> assertEquals(1,$this->op->mostrar());
    }
    
}

?>