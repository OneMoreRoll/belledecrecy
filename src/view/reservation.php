<?php
class ReservationView
{
    public function __construct(ReservationController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "reservation.php";
    }

    public function render()
    {
        $_SESSION['animation_done'] = 1;

        $page = "reservation";

        $message = "";
        $thank_message = "";

        if (!empty($_POST)) {
            if (!$this->controller->validateForm()) {
                $errors["message"] = "Le champ n'a pas été renseigné";
                $message = "Le champ n'a pas été renseigné";
            }

            if (!$this->controller->validateEmail()) {
                $errors["message"] = "L'email n'est pas valide";
                $message = "L'email n'est pas valide";
            }

            if (!$this->controller->validateEmail()) {
                $errors["message"] = "La date n'est pas valide";
                $message = "La date n'est pas valide";
            }

            if (empty($errors)) {
                $res = $this->controller->addReservation();

                if (is_bool($res) && $res) {
                    header("Location: " . HOST . "point-de-vente/");
                } else {
                    $message = "Erreur de base de données : " . implode(", ", $res);
                }
            }
        }

        $message = "<div class=\"alert alert-danger\">{$message}</div>";

        $data = $this->controller->getContent();

        require($this->template);
    }
}
