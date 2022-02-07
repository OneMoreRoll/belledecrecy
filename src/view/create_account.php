<?php
class CreateAccountView
{
    public function __construct(CreateAccountController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "create_account.php";
    }

    public function render()
    {
        $_SESSION['animation_done'] = 1;

        if (!isset($_SESSION["user"]) || ($_SESSION["user_ip"] != $_SERVER["REMOTE_ADDR"])) {
            session_destroy();
            header("Location: " . HOST);
        }

        $page = "create_account";

        $detailPage = "Création d'un compte";

        if (!empty($_POST)) {
            $errors = [];
            $name = trim(strip_tags($_POST["name"]));
            $email = trim(strip_tags($_POST["email"]));
            $password = trim(strip_tags($_POST["password"]));
            $retypePassword = trim(strip_tags($_POST["retype_password"]));

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors["email"] = "L'email n'est pas valide";
            }

            if ($password != $retypePassword) {
                $errors["retypePassword"] = "Les deux mots de passe ne correspondent pas";
            }

            $uppercase = preg_match("/[A-Z]/", $password);
            $lowercase = preg_match("/[a-z]/", $password);
            $number = preg_match("/[0-9]/", $password);

            if (!$uppercase || !$lowercase || !$number || strlen($password) < 6) {
                $errors["password"] = "Le mot de passe doit contenir 6 caractères minimum, une lettre majuscule, une lettre minuscule et un chiffre";
            }

            if (empty($errors)) {
                $password = password_hash($password, PASSWORD_DEFAULT);

                if ($this->controller->create_account($name, $email, $password)) {
                    header("Location: login");
                } else {
                    //Si l'execute ne c'est pas bien déroulée
                    $errors["execute"] = "Un problème est survenu lors de la création du compte, veuillez réessayer !";
                }
            }
        }
        require($this->template);
    }
}
