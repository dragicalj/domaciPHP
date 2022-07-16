<?php



require "../dbBroker.php";
require "../model/prijava.php";

if (
    isset($_POST['kozmetickisalon']) && isset($_POST['mesto'])
    && isset($_POST['datum']) && isset($_POST['kozmeticar'])
) {
    $prijava = new Prijava($_POST['id'], $_POST['kozmetickisalon'], $_POST['mesto'], $_POST['datum'], $_POST['kozmeticar']);
    $status = Prijava::update($prijava, $conn);

    if ($status) {
        echo "Success";
    } else {
        echo $status;
        echo "Failed";
    }
}
