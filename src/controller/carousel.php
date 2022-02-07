<?php
class CarouselController
{
    public function __construct(CarouselModel $model)
    {
        $this->model = $model;
    }

    public function getFullCarousel()
    {
        $query = $this->model->db->prepare("SELECT collections.name AS collection_name, collections.active AS collection_active,
        lingeries.id AS lingerie_id, lingeries.name AS lingerie_name, lingeries.link_name, lingeries.description, lingeries.price, lingeries.left_image, lingeries.right_image, lingeries.active AS lingerie_active,
        group_concat(colors.name SEPARATOR ' - ') AS color_names 
            FROM collections
            RIGHT JOIN lingeries
            ON collections.id = lingeries.collection 
            LEFT JOIN lingerie_colors
            ON lingeries.id = lingerie_colors.lingerie_id
            LEFT JOIN colors
            ON lingerie_colors.color_id = colors.id
            WHERE lingeries.active = 1 AND collections.active = 1
            GROUP BY lingeries.id");
        $query->execute();
        $carousel = $query->fetchAll();

        return $carousel;
    }
}
