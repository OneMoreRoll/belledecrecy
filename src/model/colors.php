<?php
class ColorModel
{
    public $id;

    public function __construct($db)
    {
        $this->db = $db;
        if (!empty($_POST)) {
            $this->color = trim(strip_tags($_POST['name']));
        }
        if (isset($_GET["id"])) {
            $this->id = trim(strip_tags($_GET["id"]));
        }
    }
}
