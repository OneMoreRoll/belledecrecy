<?php
include("header.php");
?>

<main>
    <?php
    include("admin_nav.php");
    ?>

    <section id="ap_admin">
        <h1>Modifier la page À Propos</h1>

        <hr>

        <?= (empty($_POST)) ? "" : $message ?>

        <form action="" method="post">
            <div id="content">
                <div id="left_content">
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
                </div>

                <div id="right_content">
                    <div class="form_wrapper">
                        <label for="input_right_title">Titre de droite</label>
                        <input type="text" name="right_title" id="input_right_title" value="<?= isset($data["right_title"]) ? $data["right_title"] : "" ?>" required />
                    </div>

                    <div class="form_wrapper">
                        <label for="input_right_subtitle">Sous-titre de droite</label>
                        <input type="text" name="right_subtitle" id="input_right_subtitle" value="<?= isset($data["right_subtitle"]) ? $data["right_subtitle"] : "" ?>" required />
                    </div>

                    <div class="form_wrapper">
                        <label for="input_right_description">Description de droite</label>
                        <textarea name="right_description" id="input_right_description" cols="30" rows="8"><?= isset($data["right_description"]) ? $data["right_description"] : "" ?></textarea>
                    </div>
                </div>
            </div>

            <div class="form_wrapper">
                <label for="input_email">Email</label>
                <input type="email" name="email" id="input_email" value="<?= isset($data["email"]) ? $data["email"] : "" ?>" required />
            </div>

            <div class="form_wrapper">
                <label for="input_phone">Numéro de téléphone</label>
                <input type="text" name="phone" id="input_phone" value="<?= isset($data["phone"]) ? $data["phone"] : "" ?>" required />
            </div>

            <div>
                <input type="submit" />
            </div>
        </form>
    </section>

    <section id="emails">
        <h1>Liste des emails</h1>

        <hr>

        <table id="email_table">
            <thead>
                <tr>
                    <th class="email_number">N°</th>
                    <th class="email_name">Email</th>
                    <th class="email_time">Date</th>
                    <th class="email_option">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($emails)) {
                ?>
                    <tr class="email">
                        <td class="email_number">N/A</td>
                        <td class="email_name">N/A</td>
                        <td class="email_time">N/A</td>
                        <td class="email_option disabled">
                            <a href="<?= DIR_ADMIN ?>apropos/<?= $email["id"] ?>">Supprimer</a>
                        </td>
                    </tr>
                    <?php
                } else {
                    $email_number = 1;

                    foreach ($emails as $email) {
                    ?>
                        <tr class="email">
                            <td class="email_number"><?= $email_number ?></td>
                            <td class="email_name"><?= $email["email"] ?></td>
                            <td class="email_time"><?= date('d-m-Y H:i:s', $email["time"]) ?></td>
                            <td class="email_option">
                                <a href="<?= DIR_ADMIN ?>apropos/<?= $email["id"] ?>">Supprimer</a>
                            </td>
                        </tr>
                <?php
                        $email_number++;
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