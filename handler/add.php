<?php

require "../dbBroker.php";
require "../model/prijava.php";

session_start();

if (
    isset($_POST['kozmetickisalon']) && isset($_POST['mesto'])
    && isset($_POST['datum']) && isset($_POST['kozmeticar'])
) {
    $prijava = new Prijava(null, $_POST['kozmetickisalon'], $_POST['mesto'], $_POST['datum'], $_POST['kozmeticar'], $_SESSION['user_id']);
    $status = Prijava::add($prijava, $conn);

    if ($status) {
        echo "Success";
    } else {
        echo $status;
        echo "Failed";
    }
}


?>


