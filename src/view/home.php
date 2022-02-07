<?php
class HomeView
{
    public function __construct(HomeController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "home.php";
    }

    public function render()
    {
        $page = "home";

        $popup = $this->controller->getActivePopUp();

        require($this->template);
    }
}
