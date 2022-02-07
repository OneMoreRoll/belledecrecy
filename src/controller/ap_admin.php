<?php
class APAdminController
{
    private $model;

    public function __construct(APAdminModel $model)
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
            "right_description" => $this->model->right_description,
            "email" => $this->model->email,
            "phone" => $this->model->phone
        );
    }


    public function validateForm()
    {
        if ((empty($this->model->left_title)) || (empty($this->model->left_subtitle)) || (empty($this->model->left_description)) || (empty($this->model->right_title)) || (empty($this->model->right_subtitle)) || (empty($this->model->right_description)) || (empty($this->model->email)) || (empty($this->model->phone))) {
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
            WHERE page LIKE 'a_propos'");
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
            SET left_title=:left_title, left_subtitle=:left_subtitle, left_description=:left_description, right_title=:right_title, right_subtitle=:right_subtitle, right_description=:right_description, email=:email, phone=:phone
            WHERE page LIKE 'a_propos'");
        $query->bindParam(":left_title", $this->model->left_title);
        $query->bindParam(":left_subtitle", $this->model->left_subtitle);
        $query->bindParam(":left_description", $this->model->left_description);
        $query->bindParam(":right_title", $this->model->right_title);
        $query->bindParam(":right_subtitle", $this->model->right_subtitle);
        $query->bindParam(":right_description", $this->model->right_description);
        $query->bindParam(":email", $this->model->email);
        $query->bindParam(":phone", $this->model->phone);

        if ($query->execute()) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }

    public function getEmails()
    {
        $query = $this->model->db->prepare("SELECT * 
            FROM email_list
            ORDER BY time");
        $query->execute();
        $res = $query->fetchAll();

        return $res;
    }

    /**
     * Suppression d'un email
     */
    public function deleteEmail()
    {
        $query = $this->model->db->prepare("DELETE FROM email_list
            WHERE id=:id");
        $query->bindParam(":id", $this->model->id);

        if ($query->execute()) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }
}
