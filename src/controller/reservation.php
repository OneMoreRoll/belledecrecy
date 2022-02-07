<?php
class ReservationController
{
    public function __construct(ReservationModel $model)
    {
        $this->model = $model;
    }

    public function validateForm()
    {
        if ((empty($this->model->date)) || (empty($this->model->firstname)) || (empty($this->model->lastname)) || (empty($this->model->phone)) || (empty($this->model->email))) {
            return false;
        }

        return true;
    }

    public function validateDate()
    {
        if ($this->model->date > (date('Y-m-d', strtotime("+3 months", strtotime(date('Y-m-d'))))) && $this->model->date < date('Y-m-d')) {
            return false;
        }

        return true;
    }

    public function validateEmail()
    {
        if (!filter_var($this->model->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    public function addReservation()
    {
        $query = $this->model->db->prepare("INSERT INTO reservation (time, date, firstname, lastname, phone, email) 
            VALUES(:time, :date, :firstname, :lastname, :phone, :email)");
        $query->bindParam(":time", time());
        $query->bindParam(":date", $this->model->date);
        $query->bindParam(":firstname", $this->model->firstname);
        $query->bindParam(":lastname", $this->model->lastname);
        $query->bindParam(":phone", $this->model->phone);
        $query->bindParam(":email", $this->model->email);

        if ($query->execute()) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }

    public function getContent()
    {
        $query = $this->model->db->prepare("SELECT * 
            FROM content
            WHERE page LIKE 'reservation'");
        $query->execute();
        $res = $query->fetch();

        return $res;
    }
}
