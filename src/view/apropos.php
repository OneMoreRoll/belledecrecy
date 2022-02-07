<?php
class AProposView
{
    public function __construct(AProposController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "apropos.php";
    }

    public function render()
    {
        $_SESSION['animation_done'] = 1;

        $page = "apropos";

        $message = "";

        if (!empty($_POST)) {
            if (!$this->controller->validateForm()) {
                $errors["message"] = "Le champ n'a pas été renseigné";
                $message = "Le champ n'a pas été renseigné";
            }

            if (!$this->controller->validateEmail()) {
                $errors["message"] = "L'email n'est pas valide";
                $message = "L'email n'est pas valide";
            }

            if (empty($errors)) {
                $res = $this->controller->addEmail();
                if (is_bool($res) && $res) {
                    header("Location: " . HOST . "apropos/");
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
