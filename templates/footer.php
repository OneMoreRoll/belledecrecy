<footer id="footer">
    <nav>
        <ul class="nav_ul" id="nav_ul">
            <li>
                <a href="<?= HOST ?>collection/">Collection</a>
            </li>
            <li>
                <a href="<?= HOST ?>apropos/">À propos</a>
            </li>
            <li>
                <a href="<?= HOST ?>point-de-vente/">Points de vente</a>
            </li>
            <li>
                <a href="https://www.instagram.com/belle.de.crecy/">Instagram</a>
            </li>
            <li>
                <a href="https://shop.belledecrecy.com/">Boutique en ligne</a>
            </li>
            <?php
            if (isset($_SESSION["user"]) && ($_SESSION["user_ip"] == $_SERVER["REMOTE_ADDR"])) {
            ?>
                <li>
                    <a href="<?= DIR_ADMIN ?>">Admin</a>
                </li>
            <?php
            }
            ?>
    </nav>
</footer>

<?php
if (!empty($page) && ($page == "collection")) {
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script type="text/javascript" src="<?= DIR_ASSETS ?>js/bootstrap/bootstrap.min.js"></script>
    <script src="<?= DIR_ASSETS ?>js/carousel.js"></script>
<?php
}

if (!empty($page) && ($page == "collection" || $page == "apropos" || $page == "reservation")) {
?>
    <script src="<?= DIR_ASSETS ?>js/mobile_button.js"></script>
<?php
}
?>

</body>

</html>