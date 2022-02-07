<?php
class AProposController
{
    public function __construct(AProposModel $model)
    {
        $this->model = $model;
    }

    public function validateForm()
    {
        if (empty($this->model->email)) {
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

    public function addEmail()
    {
        $query = $this->model->db->prepare("INSERT INTO email_list (email, time) 
            VALUES(:email, :time)");
        $query->bindParam(":email", $this->model->email);
        $query->bindParam(":time", time());

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
            WHERE page LIKE 'a_propos'");
        $query->execute();
        $res = $query->fetch();

        return $res;
    }
}
