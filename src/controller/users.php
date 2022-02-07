<?php
class UserController
{
    public function __construct(UserModel $model)
    {
        $this->model = $model;
    }

    public function getAllUsers()
    {
        $query = $this->model->db->prepare("SELECT * 
            FROM users
            ORDER BY name ASC");
        $query->execute();
        $users = $query->fetchAll();

        return $users;
    }
}
