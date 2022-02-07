<?php
class ColorController
{
    private $model;

    public function __construct(ColorModel $model)
    {
        $this->model = $model;
    }

    public function getDataForm()
    {
        return array(
            "id" => $this->model->id,
            "color" => $this->model->color,
        );
    }


    public function validateForm()
    {
        if (empty($this->model->color)) {
            return false;
        }

        return true;
    }

    /**
     * Récupération d'une couleur
     */
    public function get()
    {
        $query = $this->model->db->prepare("SELECT name 
            FROM colors
            WHERE id=:id");
        $query->bindParam(":id", $this->model->id);
        $query->execute();
        $res = $query->fetch();

        return $res;
    }

    /**
     * Insertion de la couleur en base de données
     */
    public function add()
    {
        $query = $this->model->db->prepare("INSERT INTO colors (name) 
            VALUES(:name)");
        $query->bindParam(":name", $this->model->color);

        if ($query->execute()) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }

    /**
     * Mise à jour de la couleur en base de données
     */
    public function edit()
    {
        $query = $this->model->db->prepare("UPDATE colors 
            SET name=:name
            WHERE id=:id");
        $query->bindParam(":name", $this->model->color);
        $query->bindParam(":id", $this->model->id);

        if ($query->execute()) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }

    /**
     * Suppression d'une couleur
     */
    public function delete()
    {
        $query = $this->model->db->prepare("DELETE FROM colors 
            WHERE id=:id");
        $query->bindParam(":id", $this->model->id);

        if ($query->execute()) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }
}
