<?php
class CollectionModel
{
    public $id;

    public function __construct($db)
    {
        $this->db = $db;
        if (!empty($_POST)) {
            $this->collection = trim(strip_tags($_POST['name']));
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
