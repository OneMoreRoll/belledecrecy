<?php
class APAdminModel
{
    public $id;

    public function __construct($db)
    {
        $this->db = $db;
        if (!empty($_POST)) {
            $this->left_title = trim(strip_tags($_POST['left_title']));
            $this->left_subtitle = trim(strip_tags($_POST['left_subtitle']));
            $this->left_description = trim(strip_tags($_POST['left_description']));
            $this->right_title = trim(strip_tags($_POST['right_title']));
            $this->right_subtitle = trim(strip_tags($_POST['right_subtitle']));
            $this->right_description = trim(strip_tags($_POST['right_description']));
            $this->email = trim(strip_tags($_POST['email']));
            $this->phone = trim(strip_tags($_POST['phone']));
        }

        if (isset($_GET["id"])) {
            $this->id = trim(strip_tags($_GET["id"]));
        }
    }
}
