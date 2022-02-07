<?php
class AdminView
{
    public function __construct(AdminController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "admin.php";
    }

    public function render()
    {
        $_SESSION['animation_done'] = 1;

        if (!isset($_SESSION["user"]) || ($_SESSION["user_ip"] != $_SERVER["REMOTE_ADDR"])) {
            session_destroy();
            header("Location: " . HOST . "login/");
        }

        $page = "admin";

        $collections = $this->controller->getAllCollections();
        $colors = $this->controller->getAllColors();
        $lingeries = $this->controller->getAllLingeries();
        $popups = $this->controller->getAllPopUps();

        require($this->template);
    }
}
