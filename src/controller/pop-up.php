<?php
class PopUpController
{
    private $model;

    public function __construct(PopUpModel $model)
    {
        $this->model = $model;
    }

    public function getDataForm()
    {
        return array(
            "id" => $this->model->id,
            "name" => $this->model->name,
            "collection" => $this->model->collection,
            "date" => $this->model->date,
            "title" => $this->model->title,
            "content" => $this->model->content,
            "link_name" => $this->model->collection,
            "link_url" => $this->model->link_url,
            "logo" => $this->model->logo,
            "main_image" => $this->model->main_image,
            "active" => $this->model->active
        );
    }

    /**
     * Upload de l'image dans le dossier assets/img/pop-up/main_images/
     */
    public function uploadImage($file)
    {
        $fileTmpPath = $file["tmp_name"];
        $fileName = $file["name"];
        $fileType = $file["type"];

        $fileNameArray = explode(".", $fileName);
        $fileExtension = end($fileNameArray);
        $newFileName = md5(time() . $fileName) . "." . $fileExtension;
        $fileDestPath = "./assets/img/popup/main_images/{$newFileName}";

        $allowedTypes = array("image/jpeg", "image/png");
        if (in_array($fileType, $allowedTypes)) {
            // Le type de fichier est bien valide, ajout du fichier au serveur
            move_uploaded_file($fileTmpPath, $fileDestPath);

            $this->model->main_image = $newFileName;
        } else {
            // Le type du fichier est incorrect
            return false;
        }

        return true;
    }

    /**
     * Upload de l'image dans le dossier assets/img/pop-up/logos/
     */
    public function uploadLogo($file)
    {
        $fileTmpPath = $file["tmp_name"];
        $fileName = $file["name"];
        $fileType = $file["type"];

        $fileNameArray = explode(".", $fileName);
        $fileExtension = end($fileNameArray);
        $newFileName = md5(time() . $fileName) . "." . $fileExtension;
        $fileDestPath = "./assets/img/popup/logos/{$newFileName}";

        $allowedTypes = array("image/jpeg", "image/png");
        if (in_array($fileType, $allowedTypes)) {
            // Le type de fichier est bien valide, ajout du fichier au serveur
            move_uploaded_file($fileTmpPath, $fileDestPath);

            $this->model->logo = $newFileName;
        } else {
            // Le type du fichier est incorrect
            return false;
        }

        return true;
    }

    public function validateForm()
    {
        if (empty($this->model->name)) {
            return false;
        }

        return true;
    }

    /**
     * Récupération d'un pop-up
     */
    public function get()
    {
        $query = $this->model->db->prepare("SELECT collections.name as collection_name,
        popup.id, popup.name, popup.collection, popup.date, popup.title, popup.content, popup.link, popup.link_url, popup.logo, popup.main_image, popup.active
            FROM collections
            INNER JOIN popup
            ON collections.id = popup.collection
            WHERE popup.id = :id");
        $query->bindParam(":id", $this->model->id);
        $query->execute();
        $res = $query->fetch();

        return $res;
    }

    /**
     * Insertion du pop-up en base de données
     */
    public function add()
    {
        $query = $this->model->db->prepare("INSERT INTO popup (name, collection, date, title, content, link, link_url, logo, main_image, active) 
            VALUES(:name, :collection, :date, :title, :content, :link, :link_url, :logo, :main_image, :active)");
        $query->bindParam(":name", $this->model->name);
        $query->bindParam(":collection", $this->model->collection);
        $query->bindParam(":date", $this->model->date);
        $query->bindParam(":title", $this->model->title);
        $query->bindParam(":content", $this->model->content);
        $query->bindParam(":link", $this->model->link);
        $query->bindParam(":link_url", $this->model->link_url);
        $query->bindParam(":logo", $this->model->logo);
        $query->bindParam(":main_image", $this->model->main_image);
        $query->bindParam(":active", $this->model->active);

        if ($query->execute()) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }

    /**
     * Mise à jour du pop-up en base de données
     */
    public function edit()
    {
        // Vérification de l'image en base de données si elle n'est pas renseignée dans le formulaire
        if (empty($this->model->main_image)) {
            $popup = $this->get();
            if (isset($popup["main_image"])) {
                $this->model->main_image = $popup["main_image"];
            }
        }

        $query = $this->model->db->prepare("UPDATE popup 
            SET name=:name, collection=:collection, date=:date, title=:title, content=:content, link=:link, link_url=:link_url, logo=:logo, main_image=:main_image, active=:active
            WHERE id=:id");
        $query->bindParam(":name", $this->model->name);
        $query->bindParam(":collection", $this->model->collection);
        $query->bindParam(":date", $this->model->date);
        $query->bindParam(":title", $this->model->title);
        $query->bindParam(":content", $this->model->content);
        $query->bindParam(":link", $this->model->link);
        $query->bindParam(":link_url", $this->model->link_url);
        $query->bindParam(":logo", $this->model->logo);
        $query->bindParam(":main_image", $this->model->main_image);
        $query->bindParam(":active", $this->model->active);
        $query->bindParam(":id", $this->model->id);

        if ($query->execute()) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }

    /**
     * Suppression d'un produit
     */
    public function delete()
    {
        $query = $this->model->db->prepare("DELETE FROM popup 
            WHERE id=:id");
        $query->bindParam(":id", $this->model->id);
        $query->execute();

        if ($query->execute()) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }

    public function getAllCollections()
    {
        $query = $this->model->db->prepare("SELECT * 
            FROM collections
            ORDER BY name ASC");
        $query->execute();
        $collections = $query->fetchAll();

        return $collections;
    }
}
