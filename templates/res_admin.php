<?php
include("header.php");
?>

<main>
    <?php
    include("admin_nav.php");
    ?>

    <section id="res_admin">
        <h1>Modifier la page Point de vente</h1>

        <hr>

        <?= (empty($_POST)) ? "" : $message ?>

        <form action="" method="post">
            <div class="form_wrapper">
                <label for="input_left_title">Titre de gauche</label>
                <input type="text" name="left_title" id="input_name" value="<?= isset($data["left_title"]) ? $data["left_title"] : "" ?>" required />
            </div>

            <div class="form_wrapper">
                <label for="input_left_subtitle">Sous-titre de gauche</label>
                <input type="text" name="left_subtitle" id="input_left_subtitle" value="<?= isset($data["left_subtitle"]) ? $data["left_subtitle"] : "" ?>" required />
            </div>

            <div class="form_wrapper">
                <label for="input_left_description">Description de gauche</label>
                <textarea name="left_description" id="input_left_description" cols="30" rows="8"><?= isset($data["left_description"]) ? $data["left_description"] : "" ?></textarea>
            </div>
            <div class="form_wrapper">
                <label for="input_right_title">Titre de droite</label>
                <input type="text" name="right_title" id="input_right_title" value="<?= isset($data["right_title"]) ? $data["right_title"] : "" ?>" required />
            </div>

            <div class="form_wrapper">
                <label for="input_right_subtitle">Sous-titre de droite</label>
                <input type="text" name="right_subtitle" id="input_right_subtitle" value="<?= isset($data["right_subtitle"]) ? $data["right_subtitle"] : "" ?>" required />
            </div>

            <div class="form_wrapper">
                <label for="input_thank_message">Message de remerciement</label>
                <input type="text" name="thank_message" id="input_thank_message" value="<?= isset($data["right_description"]) ? $data["right_description"] : "" ?>" required />
            </div>

            <div>
                <input type="submit" />
            </div>
        </form>
    </section>

    <section id="reservations">
        <h1>Liste des réservations</h1>

        <hr>

        <table id="reservation_table">
            <thead>
                <tr class="reservation">
                    <th class="reservation_number">N°</th>
                    <th class="reservation_time">Date d'ajout</th>
                    <th class="reservation_date">Rendez-vous</th>
                    <th class="reservation_name">Nom du client</th>
                    <th class="reservation_phone">Téléphone</th>
                    <th class="reservation_email">Email</th>
                    <th class="reservation_option">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($reservations)) {
                ?>
                    <tr class="reservation">
                        <td class="reservation_number">N/A</td>
                        <td class="reservation_time">N/A</td>
                        <td class="reservation_date">N/A</td>
                        <td class="reservation_name">N/A</td>
                        <td class="reservation_phone">N/A</td>
                        <td class="reservation_email">N/A</td>
                        <td class="reservation_option disabled">
                            <a href="<?= DIR_ADMIN ?>point-de-vente/<?= $reservations["id"] ?>">Supprimer</a>
                        </td>
                    </tr>
                    <?php
                } else {
                    $reservation_number = 1;

                    foreach ($reservations as $reservation) {
                    ?>
                        <tr class="reservation">
                            <td class="reservation_number"><?= $reservation_number ?></td>
                            <td class="reservation_time"><?= date('d-m-Y H:i', $reservation["time"]) ?></td>
                            <td class="reservation_date"><?= date('d-m-Y H:i', $reservation["date"]) ?></td>
                            <td class="reservation_name"><?= $reservation["firstname"] . " " . $reservation["lastname"] ?></td>
                            <td class="reservation_phone"><?= $reservation["phone"] ?></td>
                            <td class="reservation_email"><?= $reservation["email"] ?></td>
                            <td class="reservation_option">
                                <a href="<?= DIR_ADMIN ?>point-de-vente/<?= $reservation["id"] ?>">Supprimer</a>
                            </td>
                        </tr>
                <?php
                        $reservation_number++;
                    }
                }
                ?>
            </tbody>
        </table>
    </section>
</main>

<script src="<?= DIR_ASSETS ?>js/admin.js"></script>
<script src="<?= DIR_ASSETS ?>js/mobile_button_admin.js"></script>
</body>

</html>