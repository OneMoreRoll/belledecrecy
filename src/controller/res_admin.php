<?php
class ResAdminController
{
    private $model;

    public function __construct(ResAdminModel $model)
    {
        $this->model = $model;
    }

    public function getDataForm()
    {
        return array(
            "id" => $this->model->id,
            "left_title" => $this->model->left_title,
            "left_subtitle" => $this->model->left_subtitle,
            "left_description" => $this->model->left_description,
            "right_title" => $this->model->right_title,
            "right_subtitle" => $this->model->right_subtitle,
            "thank_message" => $this->model->thank_message
        );
    }


    public function validateForm()
    {
        if ((empty($this->model->left_title)) || (empty($this->model->left_subtitle)) || (empty($this->model->left_description)) || (empty($this->model->right_title)) || (empty($this->model->right_subtitle)) || (empty($this->model->thank_message))) {
            return false;
        }

        return true;
    }

    /**
     * Récupération du contenu
     */
    public function getContent()
    {
        $query = $this->model->db->prepare("SELECT * 
            FROM content
            WHERE page LIKE 'reservation'");
        $query->execute();
        $res = $query->fetch();

        return $res;
    }

    /**
     * Mise à jour du contenu en base de données
     */
    public function updateContent()
    {
        $query = $this->model->db->prepare("UPDATE content
            SET left_title=:left_title, left_subtitle=:left_subtitle, left_description=:left_description, right_title=:right_title, right_subtitle=:right_subtitle, right_description=:thank_message
            WHERE page LIKE 'reservation'");
        $query->bindParam(":left_title", $this->model->left_title);
        $query->bindParam(":left_subtitle", $this->model->left_subtitle);
        $query->bindParam(":left_description", $this->model->left_description);
        $query->bindParam(":right_title", $this->model->right_title);
        $query->bindParam(":right_subtitle", $this->model->right_subtitle);
        $query->bindParam(":thank_message", $this->model->thank_message);

        if ($query->execute()) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }

    public function getReservations()
    {
        $query = $this->model->db->prepare("SELECT * 
            FROM reservation
            ORDER BY date");
        $query->execute();
        $res = $query->fetchAll();

        return $res;
    }

    /**
     * Suppression d'une réservation
     */
    public function deleteReservation()
    {
        $query = $this->model->db->prepare("DELETE FROM reservation
            WHERE id=:id");
        $query->bindParam(":id", $this->model->id);

        if ($query->execute()) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }
}
