<?php
class HomeController
{
    public function __construct(HomeModel $model)
    {
        $this->model = $model;
    }

    public function getActivePopUp()
    {
        $query = $this->model->db->prepare("SELECT collections.name as collection_name,
        popup.id, popup.name, popup.collection, popup.date, popup.title, popup.content, popup.link, popup.link_url, popup.logo, popup.main_image, popup.active
            FROM collections
            RIGHT JOIN popup
            ON collections.id = popup.collection
            WHERE popup.active = 1");
        $query->execute();
        $res = $query->fetch();

        return $res;
    }
}
