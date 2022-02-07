<?php
class AProposModel
{
    public function __construct($db)
    {
        $this->db = $db;
        if (!empty($_POST)) {
            $this->email = trim(strip_tags($_POST['email']));
        }
    }
}
