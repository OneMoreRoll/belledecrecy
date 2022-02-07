<?php
include("header.php");
?>

<main>
    <?php
    include("admin_nav.php");
    ?>

    <section id="collections">
        <h1>Collections</h1>

        <hr>

        <nav>
            <ul>
                <li>
                    <a href="<?= DIR_ADMIN ?>ajouter_collection/">Ajouter</a>
                </li>
            </ul>
        </nav>

        <div id="collection_wrapper">
            <table id="collection_table">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Actif</th>
                        <th colspan="2">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (empty($collections)) {
                    ?>
                        <tr class="collection">
                            <td class="collection_number">N/A</td>
                            <td class="collection_name">N/A</td>
                            <td class="collection_active">N/A</td>
                            <td class="collection_options disabled">
                                <a href="<?= DIR_ADMIN ?>editer_collection/<?= $collection["id"] ?>">Editer</a>
                                <a href="<?= DIR_ADMIN ?>supprimer_collection/<?= $collection["id"] ?>">Supprimer</a>
                            </td>
                        </tr>
                        <?php
                    } else {
                        $collection_number = 1;

                        foreach ($collections as $collection) {
                        ?>
                            <tr class="collection">
                                <td class="collection_number"><?= $collection_number ?></td>
                                <td class="collection_name"><?= $collection["name"] ?></td>
                                <td class="collection_active"><?= ($collection["active"]) == 1 ? "Activée" : "Désactivée" ?></td>
                                <td class="collection_options">
                                    <a href="<?= DIR_ADMIN ?>editer_collection/<?= $collection["id"] ?>">Editer</a>
                                    <a href="<?= DIR_ADMIN ?>supprimer_collection/<?= $collection["id"] ?>">Supprimer</a>
                                </td>
                            </tr>
                    <?php
                            $collection_number++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <section id="colors">
        <h1>Couleurs</h1>

        <hr>

        <nav>
            <ul>
                <li>
                    <a href="<?= DIR_ADMIN ?>ajouter_couleur/">Ajouter</a>
                </li>
            </ul>
        </nav>

        <div id="color_wrapper">
            <table id="color_table">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nom</th>
                        <th colspan="2">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (empty($colors)) {
                    ?>
                        <tr class="color">
                            <td class="color_number">N/A</td>
                            <td class="color_name">N/A</td>
                            <td class="color_options disabled">
                                <a href="<?= DIR_ADMIN ?>editer_couleur/<?= $color["id"] ?>">Editer</a>
                                <a href="<?= DIR_ADMIN ?>supprimer_couleur/<?= $color["id"] ?>">Supprimer</a>
                            </td>
                        </tr>
                        <?php
                    } else {
                        $color_number = 1;

                        foreach ($colors as $color) {
                        ?>
                            <tr class="color">
                                <td class="color_number"><?= $color_number ?></td>
                                <td class="color_name"><?= $color["name"] ?></td>
                                <td class="color_options">
                                    <a href="<?= DIR_ADMIN ?>editer_couleur/<?= $color["id"] ?>">Editer</a>
                                    <a href="<?= DIR_ADMIN ?>supprimer_couleur/<?= $color["id"] ?>">Supprimer</a>
                                </td>
                            </tr>
                    <?php
                            $color_number++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <section id="lingeries">
        <h1>Lingerie</h1>

        <hr>

        <nav>
            <ul>
                <li>
                    <a href="<?= DIR_ADMIN ?>ajouter_lingerie/">Ajouter</a>
                </li>
            </ul>
        </nav>

        <div id="lingerie_wrapper">
            <table id="lingerie_table">
                <thead>
                    <tr>
                        <th class="lingerie_number">N°</th>
                        <th>Nom</th>
                        <th>Lien</th>
                        <th>Collection</th>
                        <th>Description</th>
                        <th>Couleurs</th>
                        <th>Prix</th>
                        <th>Image(s)</th>
                        <th>Actif</th>
                        <th colspan="2">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (empty($lingeries)) {
                    ?>
                        <tr class="lingerie">
                            <td class="lingerie_number">N/A</td>
                            <td class="lingerie_name">N/A</td>
                            <td class="lingerie_link">N/A</td>
                            <td class="lingerie_collection">N/A</td>
                            <td class="lingerie_description">N/A</td>
                            <td class="lingerie_colors">N/A</td>
                            <td class="lingerie_price">N/A</td>
                            <td class="lingerie_images">N/A</td>
                            <td class="lingerie_active">N/A</td>
                            <td class="lingerie_options disabled">
                                <a href="<?= DIR_ADMIN ?>editer_lingerie/<?= $lingerie["id"] ?>">Editer</a>
                                <a href="<?= DIR_ADMIN ?>supprimer_lingerie/<?= $lingerie["id"] ?>">Supprimer</a>
                            </td>
                        </tr>
                        <?php
                    } else {
                        $lingerie_number = 1;

                        foreach ($lingeries as $lingerie) {
                        ?>
                            <tr class="lingerie">
                                <td class="lingerie_number"><?= $lingerie_number ?></td>
                                <td class="lingerie_name"><?= $lingerie["lingerie_name"] ?></td>
                                <td class="lingerie_link"><?= $lingerie["link_name"] ?></td>
                                <td class="lingerie_collection"><?= $lingerie["collection_name"] ?></td>
                                <td class="lingerie_description"><?= $lingerie["description"] ?></td>
                                <td class="lingerie_colors"><?= $lingerie["color_names"] ?></td>
                                <td class="lingerie_price"><?= $lingerie["price"] ?>€</td>
                                <td class="lingerie_images">
                                    <img src="<?= DIR_ASSETS ?>img/products/left_images/<?= $lingerie["left_image"] ?>" alt="">
                                    <img src="<?= DIR_ASSETS ?>img/products/right_images/<?= $lingerie["right_image"] ?>" alt="">
                                </td>
                                <td class="lingerie_active"><?= ($lingerie["lingerie_active"]) == 1 ? "Activée" : "Désactivée" ?></td>
                                <td class="lingerie_options">
                                    <a href="<?= DIR_ADMIN ?>editer_lingerie/<?= $lingerie["lingerie_id"] ?>">Editer</a>
                                    <a href="<?= DIR_ADMIN ?>supprimer_lingerie/<?= $lingerie["lingerie_id"] ?>">Supprimer</a>
                                </td>
                            </tr>
                    <?php
                            $lingerie_number++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <section id="popups">
        <h1>Pop-up (beta)</h1>

        <hr>

        <nav>
            <ul>
                <li>
                    <a href="<?= DIR_ADMIN ?>ajouter_pop-up/">Ajouter</a>
                </li>
            </ul>
        </nav>
        <div id="popups_wrapper">
            <?php foreach ($popups as $popup) {
            ?>
                <div class="popup_wrapper">
                    <img src="<?= DIR_ASSETS . "img/popup/main_images/" . $popup["main_image"] ?>" alt="">
                    <div class="popup_informations">
                        <h5>Collection <?= ucfirst($popup["collection_name"]) ?></h5>
                        <h5><?= $popup["date"] ?></h5>
                    </div>
                    <p><?= $popup["content"] ?></p>
                    <img class="popup_logo" src="<?= DIR_ASSETS . "img/popup/logos/" . $popup["logo"] ?>" alt="">
                </div>

                <div class="popup_options">
                    <p><?= ($popup["active"]) == 1 ? "Activé" : "Désactivé" ?></p>
                    <a href="<?= DIR_ADMIN ?>editer_pop-up/<?= $popup["id"] ?>">Editer</a>
                    <a href="<?= DIR_ADMIN ?>supprimer_pop-up/<?= $popup["id"] ?>">Supprimer</a>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
</main>

<script src="<?= DIR_ASSETS ?>js/admin.js"></script>
<script src="<?= DIR_ASSETS ?>js/mobile_button_admin.js"></script>
</body>

</html>