<?php
class LingerieModel
{
    public $id;
    public $left_image;
    public $right_image;

    public function __construct($db)
    {
        $this->db = $db;
        if (!empty($_POST)) {
            $this->name = trim(strip_tags($_POST['name']));
            $this->link_name = trim(strip_tags($_POST['link_name']));
            if (isset($_POST["collection"])) {
                $this->collection = $_POST['collection'];
            } else {
                $this->collection = null;
            }
            $this->description = trim(strip_tags($_POST['description']));
            if (!empty($_POST["colors"])) {
                $this->colors = $_POST['colors'];
            } else {
                $this->colors = null;
            }
            $this->price = trim(strip_tags($_POST['price']));
            if (isset($_POST["active"])) {
                $this->active = trim(strip_tags($_POST["active"]));
            } else {
                $this->active = 0;
            }
        }
        if (isset($_GET["id"])) {
            $this->id = trim(strip_tags($_GET["id"]));
        }
    }
}
