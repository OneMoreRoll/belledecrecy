<?php
class AdminController
{
    public function __construct(AdminModel $model)
    {
        $this->model = $model;
    }

    public function getAllCollections()
    {
        $query = $this->model->db->prepare("SELECT * 
            FROM collections
            ORDER BY name ASC");
        $query->execute();
        $collections = $query->fetchAll();

        return $collections;
    }

    public function getAllColors()
    {
        $query = $this->model->db->prepare("SELECT * 
            FROM colors
            ORDER BY name ASC");
        $query->execute();
        $colors = $query->fetchAll();

        return $colors;
    }

    public function getAllLingeries()
    {
        $query = $this->model->db->prepare("SELECT collections.name as collection_name,
        lingeries.id AS lingerie_id, lingeries.name AS lingerie_name, lingeries.link_name, lingeries.description, lingeries.price, lingeries.left_image, lingeries.right_image, lingeries.active AS lingerie_active,
        group_concat(colors.name SEPARATOR ' - ') AS color_names 
            FROM collections
            RIGHT JOIN lingeries
            ON collections.id = lingeries.collection 
            LEFT JOIN lingerie_colors
            ON lingeries.id = lingerie_colors.lingerie_id
            LEFT JOIN colors
            ON lingerie_colors.color_id = colors.id
            GROUP BY lingeries.id");
        $query->execute();
        $carousel = $query->fetchAll();

        return $carousel;
    }

    public function getAllPopUps()
    {
        $query = $this->model->db->prepare("SELECT collections.name as collection_name,
        popup.id, popup.name, popup.collection, popup.date, popup.title, popup.content, popup.link, popup.link_url, popup.logo, popup.main_image, popup.active
            FROM collections
            RIGHT JOIN popup
            ON collections.id = popup.collection");
        $query->execute();
        $res = $query->fetchAll();

        return $res;
    }
}
