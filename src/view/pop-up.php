<?php
class PopUpView
{
    public function __construct(PopUpController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "pop-up.php";
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
        $detailPage = "Ajouter un pop-up";

        if (!empty($_POST)) {
            if (isset($_FILES["main_image"]) && $_FILES["main_image"]["error"] === UPLOAD_ERR_OK) {
                if (!$this->controller->uploadImage($_FILES["main_image"])) {
                    $errors["message"] = "Le type du fichier est incorrect (.jpg ou .png requis)";
                }
            }

            if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] === UPLOAD_ERR_OK) {
                if (!$this->controller->uploadLogo($_FILES["logo"])) {
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
                // Suppression d'un pop-up
                $res = $this->controller->delete();
                if (is_bool($res) && $res) {
                    header("Location: " . DIR_ADMIN);
                } else {
                    $message = "Erreur de base de données : " . implode(", ", $res);
                }
            } else {
                // Modification d'un pop-up
                $detailPage = "Modifier un pop-up";
                $data = $this->controller->get();
            }
        }

        $message = "<div class=\"alert alert-danger\">{$message}</div>";

        $collections = $this->controller->getAllCollections();

        require($this->template);
    }
}
