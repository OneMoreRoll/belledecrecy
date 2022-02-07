<?php
include("header.php");
?>

<main>
    <?php
    include("admin_nav.php");
    ?>

    <section id="color">
        <h1><?= $detailPage ?></h1>

        <hr>

        <?= (empty($_POST)) ? "" : $message ?>

        <form action="" method="post">
            <div class="form_wrapper">
                <label for="input_name">Couleur</label>
                <input type="text" name="name" id="input_name" value="<?= isset($data["name"]) ? $data["name"] : "" ?>" required />
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