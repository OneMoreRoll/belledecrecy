<?php
class CarouselView
{
    public function __construct(CarouselController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "carousel.php";
    }

    public function render()
    {
        $_SESSION['animation_done'] = 1;

        $page = "collection";

        $data = $this->controller->getFullCarousel();
        require($this->template);
    }
}
