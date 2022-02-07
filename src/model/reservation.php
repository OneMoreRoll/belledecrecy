<?php
class ReservationModel
{
    public function __construct($db)
    {
        $this->db = $db;
        if (!empty($_POST)) {
            $this->date = strtotime(trim(strip_tags($_POST["day"]))) + (trim(strip_tags($_POST["hour"])) * 3600);
            $this->firstname = trim(strip_tags($_POST['firstname']));
            $this->lastname = trim(strip_tags($_POST['lastname']));
            $this->phone = trim(strip_tags($_POST['phone']));
            $this->email = trim(strip_tags($_POST['email']));
        }
    }
}
