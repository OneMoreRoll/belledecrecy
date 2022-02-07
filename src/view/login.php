<?php
class LoginView
{
    public function __construct(LoginController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "login.php";
    }

    public function render()
    {
        $_SESSION['animation_done'] = 1;

        $page = "login";
        $message = "";
        $detailPage = "Connexion";

        if (!empty($_POST)) {
            $email = trim(strip_tags($_POST["email"]));
            $password = trim(strip_tags($_POST["password"]));

            $result = $this->controller->login($email);

            if (!empty($result) && password_verify($password, $result["password"])) {
                $_SESSION["user"] = $result["name"];
                $_SESSION["user_id"] = $result["id"];

                $_SESSION["user_ip"] = $_SERVER["REMOTE_ADDR"];

                header("Location: " . DIR_ADMIN);
            } else {
                $message = "<p class=\"error\"> Impossible de se connecter avec les informations saisies, veuillez réessayer </p>";
            };
        }

        require($this->template);
    }
}
