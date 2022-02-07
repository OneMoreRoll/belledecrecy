<?php
include("header.php");
?>

<main>
    <section id="home">
        <?php
        if (!$popup === false) {
        ?>
            <div id="popup_container">
                <div class="popup_wrapper">
                    <img src="<?= DIR_ASSETS . "img/popup/main_images/" . $popup["main_image"] ?>" alt="">
                    <div class="popup_informations">
                        <h5>Collection <?= ucfirst($popup["collection_name"]) ?></h5>
                        <h5><?= $popup["date"] ?></h5>
                    </div>
                    <p><?= $popup["content"] ?></p>
                    <img class="popup_logo" src="<?= DIR_ASSETS . "img/popup/logos/" . $popup["logo"] ?>" alt="">
                </div>
                <div id="close">
                    <button type="button" class="btn-close">
                        <span class="icon-cross"></span>
                        <span class="visually-hidden">Fermer</span>
                    </button>
                </div>
            </div>
        <?php
        }
        ?>

        <div class="links">
            <a href="<?= HOST ?>collection/">Notre univers</a>
            <a href="https://shop.belledecrecy.com/">Boutique en ligne</a>
        </div>
    </section>
</main>

<?php
if (!$popup === false) {
?>
    <script src="<?= DIR_ASSETS ?>js/home.js"></script>
<?php
}
?>
</body>

</html>