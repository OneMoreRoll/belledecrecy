<?php
class LoginController
{
    public function __construct(LoginModel $model)
    {
        $this->model = $model;
    }

    public function login($email)
    {
        $query = $this->model->db->prepare("SELECT id, name, email, password FROM users WHERE email LIKE :email");
        $query->bindParam(":email", $email);
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
}
