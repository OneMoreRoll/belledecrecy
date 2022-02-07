<?php
class ResAdminView
{
    public function __construct(ResAdminController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "res_admin.php";
    }

    public function render()
    {
        $_SESSION['animation_done'] = 1;

        if (!isset($_SESSION["user"]) || ($_SESSION["user_ip"] != $_SERVER["REMOTE_ADDR"])) {
            session_destroy();
            header("Location: " . HOST);
        }

        $page = "res_admin";

        $message = "";

        if (!empty($_POST)) {
            $data = $this->controller->getDataForm();

            if (!$this->controller->validateForm()) {
                $errors["message"] = "Un champ n'a pas été renseigné";
            }

            if (empty($errors)) {
                $res = $this->controller->updateContent();
                if (is_bool($res) && $res) {
                    header("Location: " . DIR_ADMIN . "point-de-vente/");
                } else {
                    $message = "Erreur de base de données : " . implode(", ", $res);
                }
            } else {
                // Message d'erreur
                $message = $errors["message"];
            }
        }

        if (isset($_GET["id"])) {
            if (isset($_GET["operation"]) && $_GET["operation"] == "delete") {
                // Suppression d'une réservation
                $res = $this->controller->deleteReservation();
                if (is_bool($res) && $res) {
                    header("Location: " . DIR_ADMIN . "point-de-vente/");
                } else {
                    $message = "Erreur de base de données : " . implode(", ", $res);
                }
            }
        }

        $reservations = $this->controller->getReservations();
        $data = $this->controller->getContent();

        $message = "<div class=\"alert alert-danger\">{$message}</div>";

        require($this->template);
    }
}
