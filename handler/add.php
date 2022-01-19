<?php

require "../dbBroker.php";
require "../model/prijava.php";

if(isset($_POST['usluga']) && isset($_POST['datum']) 
&& isset($_POST['mesto']) && isset($_POST['kozmeticar'])){
    $prijava = new Prijava(null,$_POST['usluga'],$_POST['datum'],$_POST['mesto'],$_POST['kozmeticar'] );
    $status = Prijava::add($prijava, $conn);

    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo 'Failed';
    }
}


?>
