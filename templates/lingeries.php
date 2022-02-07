<?php
include("header.php");
?>

<main>
    <?php
    include("admin_nav.php");
    ?>

    <section id="lingerie">
        <h1><?= $detailPage ?></h1>

        <hr>

        <?= (empty($_POST)) ? "" : $message ?>

        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="form_wrapper">
                <label for="input_name">Nom du produit</label>
                <input type="text" name="name" id="input_name" value="<?= isset($data["lingerie_name"]) ? $data["lingerie_name"] : "" ?>" />
            </div>

            <div class="form_wrapper">
                <label for="input_link_name">Nom du lien</label>
                <input type="text" name="link_name" id="input_link_name" value="<?= isset($data["link_name"]) ? $data["link_name"] : "" ?>" />
            </div>

            <div class="form_wrapper">
                <label for="input_collection">Collection</label>
                <select name="collection" id="input_collection">
                    <option value="" disabled selected hidden>Sélectionner une collection</option>
                    <?php

                    foreach ($collections as $collection) {
                    ?>
                        <option value="<?= $collection["id"] ?>" <?= (isset($data["collection"]) && ($data["collection"] == $collection["id"])) ? "selected" : "" ?>>
                            <?= ucfirst($collection["name"]) ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form_wrapper">
                <label for="input_description">Description</label>
                <textarea name="description" id="input_description" cols="30" rows="3"><?= isset($data["description"]) ? $data["description"] : "" ?></textarea>
            </div>

            <div class="form_wrapper">
                <label for="input_price">Prix</label>
                <div id="price_container">
                    <input type="number" name="price" id="input_price" min="0" value="<?= isset($data["price"]) ? $data["price"] : 0 ?>" />
                    <span id="unit">€</span>
                </div>
            </div>

            <div class="form_wrapper">
                <h2>Produit visible ?</h2>
                <label class="switch">
                    <input type="checkbox" name="active" id="input_active" value="1" <?= isset($data["active"]) && $data["active"] == 1 ? "checked" : "" ?>>
                    <span class="slider round"></span>
                </label>
            </div>

            <div class="form_wrapper" id="colors_wrapper">
                <label for="input_colors">Couleur(s)</label>
                <select name="colors[]" class="custom_scrollbar" id="input_colors" multiple>
                    <option value="" disabled selected hidden>Sélectionner une couleur</option>
                    <?php
                    foreach ($colors as $color) {
                    ?>
                        <option value="<?= $color["id"] ?>" <?= (isset($data["color_names"]) && (str_contains($data["color_names"], $color["name"]))) ? "selected" : "" ?>>
                            <?= ucfirst($color["name"]) ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form_wrapper">
                <h2>Images</h2>

                <div id="images_wrapper">
                    <div class="image_wrapper" id="left_image_container">
                        <div class="image_preview" id="left_image_preview">
                            <?php
                            if (!empty($_GET["id"]) && !empty($data["left_image"])) {
                            ?>
                                <img id="left_image" src="<?= DIR_ASSETS ?>img/products/left_images/<?= $data["left_image"] ?>" alt="">
                            <?php
                            }
                            ?>
                        </div>

                        <input type="file" name="left_image" id="input_left_image">
                    </div>

                    <div class="image_wrapper <?= empty($data["right_image"]) ? "hidden" : "" ?>" id="right_image_container">
                        <div class="image_preview" id="right_image_preview">
                            <?php
                            if (!empty($_GET["id"]) && !empty($data["right_image"])) {
                            ?>
                                <img id="right_image" src="<?= DIR_ASSETS ?>img/products/right_images/<?= $data["right_image"] ?>" alt="">
                            <?php
                            }
                            ?>
                        </div>
                        <input type="file" name="right_image" id="input_right_image">
                    </div>
                </div>
            </div>

            <div>
                <input type="submit" />
            </div>
        </form>
    </section>
</main>

<script src="<?= DIR_ASSETS ?>js/lingeries.js"></script>
<script src="<?= DIR_ASSETS ?>js/admin.js"></script>
<script src="<?= DIR_ASSETS ?>js/mobile_button_admin.js"></script>
</body>

</html>