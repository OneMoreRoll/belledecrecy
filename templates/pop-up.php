<?php
include("header.php");
?>

<main>
    <?php
    include("admin_nav.php");
    ?>

    <section id="popup">
        <nav>
            <ul>
                <li>
                    <a href="<?= DIR_ADMIN ?>">Retour</a>
                </li>
            </ul>
        </nav>

        <h1><?= $detailPage ?></h1>

        <hr>

        <?= (empty($_POST)) ? "" : $message ?>

        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="form_wrapper">
                <label for="input_name">Nom du pop-up</label>
                <input type="text" name="name" id="input_name" value="<?= isset($data["name"]) ? $data["name"] : "" ?>" />
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
                <label for="input_date">Date</label>
                <input type="text" name="date" id="input_date" value="<?= isset($data["date"]) ? $data["date"] : "" ?>" />
            </div>

            <div class="form_wrapper">
                <label for="input_title">Titre</label>
                <input type="text" name="title" id="input_title" value="<?= isset($data["title"]) ? $data["title"] : "" ?>" />
            </div>

            <div class="form_wrapper">
                <label for="input_content">Contenu</label>
                <textarea name="content" id="input_content" cols="30" rows="3"><?= isset($data["content"]) ? $data["content"] : "" ?></textarea>
            </div>

            <div class="form_wrapper">
                <label for="input_link">Nom du lien</label>
                <input type="text" name="link" id="input_link" value="<?= isset($data["link"]) ? $data["link"] : "" ?>" />
            </div>

            <div class="form_wrapper">
                <label for="input_link_url">URL du lien</label>
                <input type="text" name="link_url" id="input_link_url" value="<?= isset($data["link_url"]) ? $data["link_url"] : "" ?>" />
            </div>

            <div class="form_wrapper">
                <h2>Images</h2>

                <div id="images_wrapper">
                    <div class="image_wrapper" id="main_image_container">
                        <div class="image_preview" id="main_image_preview">
                            <?php
                            if (!empty($_GET["id"]) && !empty($data["main_image"])) {
                            ?>
                                <img id="main_image" src="<?= DIR_ASSETS ?>img/popup/main_images/<?= $data["main_image"] ?>" alt="">
                            <?php
                            }
                            ?>
                        </div>

                        <input type="file" name="main_image" id="input_main_image">
                    </div>

                    <div class="image_wrapper" id="logo_container">
                        <div class="image_preview<?= (!empty($_GET["id"]) && !empty($data["logo"])) ? " logo_preview" : "" ?>" id="logo_preview">
                            <?php
                            if (!empty($_GET["id"]) && !empty($data["logo"])) {
                            ?>
                                <img id="logo" src="<?= DIR_ASSETS ?>img/popup/logos/<?= $data["logo"] ?>" alt="">
                            <?php
                            }
                            ?>
                        </div>
                        <input type="file" name="logo" id="input_logo">
                    </div>
                </div>
            </div>

            <div class="form_wrapper">
                <h2>Pièce visible ?</h2>
                <label class="switch">
                    <input type="checkbox" name="active" id="input_active" value="1" <?= isset($data["active"]) && $data["active"] == 1 ? "checked" : "" ?>>
                    <span class="slider round"></span>
                </label>
            </div>

            <div>
                <input type="submit" />
            </div>
        </form>
    </section>
</main>

<script src="<?= DIR_ASSETS ?>js/popup.js"></script>
<script src="<?= DIR_ASSETS ?>js/admin.js"></script>
<script src="<?= DIR_ASSETS ?>js/mobile_button_admin.js"></script>
</body>

</html>