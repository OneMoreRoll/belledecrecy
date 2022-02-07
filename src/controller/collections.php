<?php
class CollectionController
{
    private $model;

    public function __construct(CollectionModel $model)
    {
        $this->model = $model;
    }

    public function getDataForm()
    {
        return array(
            "id" => $this->model->id,
            "collection" => $this->model->collection,
            "active" => $this->model->active
        );
    }


    public function validateForm()
    {
        if (empty($this->model->collection)) {
            return false;
        }

        return true;
    }

    /**
     * Récupération d'une collection
     */
    public function get()
    {
        $query = $this->model->db->prepare("SELECT name, active 
            FROM collections
            WHERE id=:id");
        $query->bindParam(":id", $this->model->id);
        $query->execute();
        $res = $query->fetch();

        return $res;
    }

    /**
     * Insertion de la collection en base de données
     */
    public function add()
    {
        $query = $this->model->db->prepare("INSERT INTO collections (name, active) 
            VALUES(:name, :active)");
        $query->bindParam(":name", $this->model->collection);
        $query->bindParam(":active", $this->model->active);

        if ($query->execute()) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }

    /**
     * Mise à jour de la collection en base de données
     */
    public function edit()
    {
        $query = $this->model->db->prepare("UPDATE collections 
            SET name=:name, active=:active
            WHERE id=:id");
        $query->bindParam(":name", $this->model->collection);
        $query->bindParam(":active", $this->model->active);
        $query->bindParam(":id", $this->model->id);

        if ($query->execute()) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }

    /**
     * Suppression d'une collection
     */
    public function delete()
    {
        $query = $this->model->db->prepare("UPDATE lingeries
            SET collection = null
            WHERE collection=:id");
        $query->bindParam(":id", $this->model->id);
        $query->execute();

        $query = $this->model->db->prepare("DELETE FROM collections 
            WHERE id=:id");
        $query->bindParam(":id", $this->model->id);

        if ($query->execute()) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }
}
