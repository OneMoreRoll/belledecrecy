<nav id="admin_nav">
    <ul class="main_ul" id="main_nav">
        <li>
            <a href="<?= DIR_ADMIN ?>">Admin</a>
        </li>
        <li>
            <a href="<?= DIR_ADMIN ?>apropos/">A propos</a>
        </li>
        <li>
            <a href="<?= DIR_ADMIN ?>point-de-vente/">Point de vente</a>
        </li>
        <li>
            <a href="<?= DIR_ADMIN ?>users/">Utilisateurs</a>
        </li>
        <li>
            <a href="<?= HOST ?>logout">Déconnexion</a>
        </li>
    </ul>

    <hr>

    <ul class="main_ul" id="secondary_nav">
        <?php
        if ($page == "admin") {
        ?>
            <li>
                <a class="secondary_link" href="#collections">Collection</a>
            </li>

            <li>
                <a class="secondary_link" href="#colors">Couleurs</a>
            </li>

            <li>
                <a class="secondary_link" href="#lingeries">Lingerie</a>
            </li>

            <li>
                <a class="secondary_link" href="#popups">Pop-Ups</a>
            </li>
        <?php
        } else if ($page == "ap_admin") {
        ?>
            <li>
                <a class="secondary_link" href="#ap_admin">Modifier la page À Propos</a>
            </li>

            <li>
                <a class="secondary_link" href="#emails">Liste des emails</a>
            </li>
        <?php
        } else if ($page == "res_admin") {
        ?>
            <li>
                <a class="secondary_link" href="#res_admin">Modifier la page de vente</a>
            </li>

            <li>
                <a class="secondary_link" href="#reservations">Liste des réservations</a>
            </li>
        <?php
        } else if ($page == "users") {
        ?>
            <li>
                <a class="secondary_link" href="#users">Liste des utilisateurs</a>
            </li>

            <li>
                <a class="secondary_link" href="<?= HOST ?>create_account/">Créer un compte</a>
            </li>
        <?php
        }
        ?>
    </ul>
</nav>