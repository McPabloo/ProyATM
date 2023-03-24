<?php

use PHPUnit\Framework\TestCase;
require 'clases\classATM.php';
use ClassATM;

class test extends TestCase{
    private $op;
    public function setUp():void{
        $this -> op = new Factura();
    }

    public function testm(){
        $i1 = 1;
        $this -> assertEquals(1,$this->op->guardar(1234,"Karla",5000));
    }

    public function testb(){
        $i1 = 1;
        $this -> assertEquals(1,$this->op->guardar(1234,"Karla",5000));
    }

    public function testfiltro(){
        $i1 = 1;
        $this -> assertEquals(1,$this->op->mostrar());
    }
    
}

?>