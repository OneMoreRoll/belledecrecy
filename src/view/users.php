<?php
class UserView
{
    public function __construct(UserController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "users.php";
    }

    public function render()
    {
        $_SESSION['animation_done'] = 1;

        if (!isset($_SESSION["user"]) || ($_SESSION["user_ip"] != $_SERVER["REMOTE_ADDR"])) {
            session_destroy();
            header("Location: " . HOST . "login/");
        }

        $page = "users";

        $users = $this->controller->getAllUsers();

        require($this->template);
    }
}
