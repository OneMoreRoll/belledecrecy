<?php
class LingerieView
{
    public function __construct(LingerieController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "lingeries.php";
    }

    public function render()
    {
        $_SESSION['animation_done'] = 1;

        if (!isset($_SESSION["user"]) || ($_SESSION["user_ip"] != $_SERVER["REMOTE_ADDR"])) {
            session_destroy();
            header("Location: " . HOST);
        }

        $page = "admin_submenu";

        $message = "";
        $detailPage = "Ajouter un produit";

        if (!empty($_POST)) {
            if (isset($_FILES["left_image"]) && $_FILES["left_image"]["error"] === UPLOAD_ERR_OK) {
                if (!$this->controller->uploadLeftImage($_FILES["left_image"])) {
                    $errors["message"] = "Le type du fichier est incorrect (.jpg ou .png requis)";
                }
            }

            if (isset($_FILES["right_image"]) && $_FILES["right_image"]["error"] === UPLOAD_ERR_OK) {
                if (!$this->controller->uploadRightImage($_FILES["right_image"])) {
                    $errors["message"] = "Le type du fichier est incorrect (.jpg ou .png requis)";
                }
            }

            $data = $this->controller->getDataForm();

            if (!$this->controller->validateForm()) {
                $errors["message"] = "Un champ n'a pas été renseigné";
            }

            if (empty($errors)) {
                if (isset($_GET["id"])) {
                    $res = $this->controller->edit();
                    if (is_bool($res) && $res) {
                        header("Location: " . DIR_ADMIN);
                    } else {
                        $message = "Erreur de base de données : " . implode(", ", $res);
                    }
                } else {
                    $res = $this->controller->add();
                    if (is_bool($res) && $res) {
                        header("Location: " . DIR_ADMIN);
                    } else {
                        $message = "Erreur de base de données : " . implode(", ", $res);
                    }
                }
            } else {
                // Message d'erreur
                $message = $errors["message"];
            }
        } else if (isset($_GET["id"])) {
            if (isset($_GET["operation"]) && $_GET["operation"] == "delete") {
                // Suppression d'un produit
                $res = $this->controller->delete();
                if (is_bool($res) && $res) {
                    header("Location: " . DIR_ADMIN);
                } else {
                    $message = "Erreur de base de données : " . implode(", ", $res);
                }
            } else {
                // Modification d'un produit
                $detailPage = "Modifier un produit";
                $data = $this->controller->get();
            }
        }

        $message = "<div class=\"alert alert-danger\">{$message}</div>";

        $collections = $this->controller->getAllCollections();
        $colors = $this->controller->getAllColors();

        require($this->template);
    }
}
