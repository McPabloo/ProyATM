<?php

use PHPUnit\Framework\TestCase;
require 'clases\classATM.php';
use ClassATM;

class test extends TestCase{
    private $op;
    public function setUp():void{
        $this -> op = new Factura();
    }

    public function testMockDeposito(){
        $data = $this->getMockBuilder(Factura::class)->getMock();
    
        $this->assertEquals(true,$data->guardar(123123,"Prueba",1000));
    }

    public function testDeposito(){
        $i1 = true;
        $this -> assertEquals(true,$this->op->guardar(16,"Yessica",5200));
    }

    public function testMockTransferencia(){
        $data = $this->getMockBuilder(Factura::class)->getMock();
        $data->method('ValidarPin')->will($this->returnValue(true));
    
        $this->assertEquals(true,$data->transferenciar("Pablo",1000,"Brayan"));
    }

    public function testTransferencia(){
        $esperado = true;
    
        $this->assertEquals(true,$this->op->transferenciar("Pablo",100,"Brayan"));
    }

    public function testfiltro(){
        $i1 = 1;
        $this -> assertEquals(1,$this->op->mostrar());
    }
    
}

?>