<?php
class Prijava{
    public $id;
    public $kozmetickisalon;
    public $mesto;
    public $datum;
    public $kozmeticar;
    public $user;

    public function __construct($id = null, $kozmetickisalon = null, $mesto = null, $datum = null, $kozmeticar = null, $user = null)
    {
        $this->id = $id;
        $this->kozmetickisalon = $kozmetickisalon;
        $this->mesto = $mesto;
        $this->datum = $datum;
        $this->kozmeticar = $kozmeticar;
        $this->user = $user;
    }


    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM prijave";
        return $conn->query($query);
    }




    public static function getById($id, mysqli $conn)
    {
        $query = "SELECT * FROM prijave WHERE id=$id";

        $myObj = array();
        if ($msqlObj = $conn->query($query)) {
            while ($red = $msqlObj->fetch_array(1)) {
                $myObj[] = $red;
            }
        }

        return $myObj;
    }



    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM prijave WHERE id=$this->id";
        return $conn->query($query);
    }


    public static function update(Prijava $prijava, mysqli $conn)
    {
        $query = "UPDATE prijave set kozmetickisalon = '$prijava->kozmetickisalon', mesto = '$prijava->mesto', datum = '$prijava->datum', kozmeticar = '$prijava->kozmeticar' WHERE id='$prijava->id'";
        return $conn->query($query);
    }


    public static function add(Prijava $prijava, mysqli $conn)
    {
        $query = "INSERT INTO prijave(kozmetickisalon, mesto, datum, kozmeticar, user) VALUES('$prijava->kozmetickisalon','$prijava->mesto','$prijava->datum','$prijava->kozmeticar','$prijava->user')";
        return $conn->query($query);
    }

}

?>