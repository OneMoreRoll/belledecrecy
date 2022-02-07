<?php
class CreateAccountController
{
    public function __construct(CreateAccountModel $model)
    {
        $this->model = $model;
    }

    public function create_account($firstname, $email, $password)
    {
        $query = $this->model->db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $query->bindParam(":name", $firstname);
        $query->bindParam(":email", $email);
        $query->bindParam(":password", $password);

        return $query->execute();
    }
}
