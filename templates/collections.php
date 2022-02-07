<?php
include("header.php");
?>

<main>
    <?php
    include("admin_nav.php");
    ?>

    <section id="collection">
        <h1><?= $detailPage ?></h1>

        <hr>

        <?= (empty($_POST)) ? "" : $message ?>

        <form action="" method="post">
            <div class="form_wrapper">
                <label for="input_name">Nom de la collection</label>
                <input type="text" name="name" id="input_name" value="<?= isset($data["name"]) ? $data["name"] : "" ?>" required />
            </div>

            <div class="form_wrapper">
                <h2>Collection visible ?</h2>
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

<script src="<?= DIR_ASSETS ?>js/admin.js"></script>
<script src="<?= DIR_ASSETS ?>js/mobile_button_admin.js"></script>
</body>

</html>