<?php
class LingerieController
{
    private $model;

    public function __construct(LingerieModel $model)
    {
        $this->model = $model;
    }

    public function getDataForm()
    {
        return array(
            "id" => $this->model->id,
            "name" => $this->model->name,
            "link_name" => $this->model->collection,
            "collection" => $this->model->link_name,
            "description" => $this->model->description,
            "colors" => $this->model->colors,
            "price" => $this->model->price,
            "active" => $this->model->active,
            "left_image" => $this->model->left_image,
            "right_image" => $this->model->right_image
        );
    }

    /**
     * Upload de l'image de gauche dans le dossier assets/img/products/left_images/
     */
    public function uploadLeftImage($file)
    {
        $fileTmpPath = $file["tmp_name"];
        $fileName = $file["name"];
        $fileType = $file["type"];

        $fileNameArray = explode(".", $fileName);
        $fileExtension = end($fileNameArray);
        $newFileName = md5(time() . $fileName) . "." . $fileExtension;
        $fileDestPath = "./assets/img/products/left_images/{$newFileName}";

        $allowedTypes = array("image/jpeg", "image/png");
        if (in_array($fileType, $allowedTypes)) {
            // Le type de fichier est bien valide, ajout du fichier au serveur
            move_uploaded_file($fileTmpPath, $fileDestPath);

            $this->model->left_image = $newFileName;
        } else {
            // Le type du fichier est incorrect
            return false;
        }

        return true;
    }

    /**
     * Upload de l'image de droite dans le dossier assets/img/products/right_images/
     */
    public function uploadRightImage($file)
    {
        $fileTmpPath = $file["tmp_name"];
        $fileName = $file["name"];
        $fileType = $file["type"];

        $fileNameArray = explode(".", $fileName);
        $fileExtension = end($fileNameArray);
        $newFileName = md5(time() . $fileName) . "." . $fileExtension;
        $fileDestPath = "./assets/img/products/right_images/{$newFileName}";

        $allowedTypes = array("image/jpeg", "image/png");
        if (in_array($fileType, $allowedTypes)) {
            // Le type de fichier est bien valide, ajout du fichier au serveur
            move_uploaded_file($fileTmpPath, $fileDestPath);

            $this->model->right_image = $newFileName;
        } else {
            // Le type du fichier est incorrect
            return false;
        }

        return true;
    }

    public function validateForm()
    {
        if (empty($this->model->name) || empty($this->model->link_name) || empty($this->model->collection) || empty($this->model->description) || empty($this->model->price) || empty($this->model->colors)) {
            return false;
        }

        return true;
    }

    /**
     * Récupération d'un produit
     */
    public function get()
    {
        $query = $this->model->db->prepare("SELECT collections.name as collection_name,
        lingeries.id AS lingerie_id, lingeries.name AS lingerie_name, lingeries.link_name, lingeries.collection, lingeries.description, lingeries.price, lingeries.left_image, lingeries.right_image, lingeries.active AS lingerie_active,
        group_concat(colors.name) AS color_names 
            FROM collections
            INNER JOIN lingeries
            ON collections.id = lingeries.collection 
            LEFT JOIN lingerie_colors
            ON lingeries.id = lingerie_colors.lingerie_id
            INNER JOIN colors
            ON lingerie_colors.color_id = colors.id
            WHERE lingeries.id = :id
            GROUP BY lingeries.id");
        $query->bindParam(":id", $this->model->id);
        $query->execute();
        $res = $query->fetch();

        return $res;
    }

    /**
     * Insertion du produit en base de données
     */
    public function add()
    {
        $query = $this->model->db->prepare("INSERT INTO lingeries (name, link_name, collection, description, price, left_image, right_image, active) 
            VALUES(:name, :link_name, :collection, :description, :price, :left_image, :right_image, :active)");
        $query->bindParam(":name", $this->model->name);
        $query->bindParam(":link_name", $this->model->link_name);
        $query->bindParam(":collection", $this->model->collection);
        $query->bindParam(":description", $this->model->description);
        $query->bindParam(":price", $this->model->price);
        $query->bindParam(":left_image", $this->model->left_image);
        $query->bindParam(":right_image", $this->model->right_image);
        $query->bindParam(":active", $this->model->active);

        if (!empty($this->model->colors)) {
            $query->execute();

            foreach ($this->model->colors as $color) {
                $query = $this->model->db->prepare("INSERT IGNORE INTO lingerie_colors (lingerie_id, color_id)
                    VALUES (LAST_INSERT_ID(), :color_id)");
                $query->bindParam(":color_id", $color);

                $query->execute();
            };
        }

        if ($query->execute()) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }

    /**
     * Mise à jour du produit en base de données
     */
    public function edit()
    {
        // Vérification de l'image de gauche en base de données si elle n'est pas renseignée dans le formulaire
        if (empty($this->model->left_image)) {
            $product = $this->get();
            if (isset($product["left_image"])) {
                $this->model->left_image = $product["left_image"];
            }
        }

        // Vérification de l'image de droite en base de données si elle n'est pas renseignée dans le formulaire
        if (empty($this->model->right_image)) {
            $product = $this->get();
            if (isset($product["right_image"])) {
                $this->model->right_image = $product["right_image"];
            }
        }

        $query = $this->model->db->prepare("UPDATE lingeries 
            SET name=:name, link_name=:link_name, collection=:collection, description=:description, price=:price, left_image=:left_image, right_image=:right_image, active=:active
            WHERE id=:id");
        $query->bindParam(":name", $this->model->name);
        $query->bindParam(":link_name", $this->model->link_name);
        $query->bindParam(":collection", $this->model->collection);
        $query->bindParam(":description", $this->model->description);
        $query->bindParam(":price", $this->model->price);
        $query->bindParam(":left_image", $this->model->left_image);
        $query->bindParam(":right_image", $this->model->right_image);
        $query->bindParam(":active", $this->model->active);
        $query->bindParam(":id", $this->model->id);

        if (!empty($this->model->colors)) {
            $query->execute();

            $query = $this->model->db->prepare("DELETE FROM lingerie_colors 
                WHERE lingerie_id=:id");
            $query->bindParam(":id", $this->model->id);

            $query->execute();

            foreach ($this->model->colors as $color) {
                $query = $this->model->db->prepare("INSERT IGNORE INTO lingerie_colors (lingerie_id, color_id)
                    VALUES (:lingerie_id, :color_id)");
                $query->bindParam(":lingerie_id", $this->model->id);
                $query->bindParam(":color_id", $color);

                $query->execute();
            };
        }

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
        $query = $this->model->db->prepare("DELETE FROM lingerie_colors 
            WHERE lingerie_id=:id");
        $query->bindParam(":id", $this->model->id);
        $query->execute();

        $query = $this->model->db->prepare("DELETE FROM lingeries 
            WHERE id=:id");
        $query->bindParam(":id", $this->model->id);

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

    public function getAllColors()
    {
        $query = $this->model->db->prepare("SELECT * 
            FROM colors
            ORDER BY name ASC");
        $query->execute();
        $colors = $query->fetchAll();

        return $colors;
    }
}
