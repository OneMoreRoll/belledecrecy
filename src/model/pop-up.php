<?php
class PopUpModel
{
    public $id;
    public $main_image;
    public $logo;

    public function __construct($db)
    {
        $this->db = $db;
        if (!empty($_POST)) {
            $this->name = trim(strip_tags($_POST['name']));
            if (isset($_POST["collection"])) {
                $this->collection = $_POST['collection'];
            } else {
                $this->collection = null;
            }
            $this->date = trim(strip_tags($_POST['date']));
            $this->title = trim(strip_tags($_POST['title']));
            $this->content = trim(strip_tags($_POST['content']));
            $this->link = trim(strip_tags($_POST['link']));
            $this->link_url = trim(strip_tags($_POST['link_url']));
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
