<?php
class Prijava{
    public $id;   
    public $usluga;   
    public $datum;   
    public $mesto;   
    public $kozmeticar;
    
    public function __construct($id=null, $usluga=null, $datum=null, $mesto=null, $kozmeticar=null)
    {
        $this->id = $id;
        $this->usluga = $usluga;
        $this->datum = $datum;
        $this->mesto = $mesto;
        $this->kozmeticar = $kozmeticar;
    }


    

?>