<?php
class CollectionView
{
    public function __construct(CollectionController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "collections.php";
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
        $detailPage = "Ajouter une collection";

        if (!empty($_POST)) {
            $data = $this->controller->getDataForm();

            if (!$this->controller->validateForm()) {
                $errors["message"] = "Le champ n'a pas été renseigné";
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
                // Suppression d'une collection
                $res = $this->controller->delete();
                if (is_bool($res) && $res) {
                    header("Location: " . DIR_ADMIN);
                } else {
                    $message = "Erreur de base de données : " . implode(", ", $res);
                }
            } else {
                // Modification d'une collection
                $detailPage = "Modifier une collection";
                $data = $this->controller->get();
            }
        }

        $message = "<div class=\"alert alert-danger\">{$message}</div>";

        require($this->template);
    }
}
