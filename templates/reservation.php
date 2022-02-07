<?php
include("header.php");
?>

<section id="reservation">
    <div class="content_wrapper" id="left_content_wrapper">
        <h1><?= $data["left_title"] ?></h1>
        <h2><?= $data["left_subtitle"] ?></h2>

        <div class="text_body">
            <p><?= nl2br($data["left_description"]) ?></p>
        </div>
    </div>

    <hr>

    <div class="content_wrapper" id="right_content_wrapper">
        <div>
            <h1><?= $data["right_title"] ?></h1>
            <h2><?= $data["right_subtitle"] ?></h2>
        </div>

        <?php
        if (isset($_POST['submit'])) {
            $_SESSION['text'] = $data["right_description"];
        } else {
            if (isset($_SESSION['text'])) {
                $thank_message = $_SESSION['text'];
                unset($_SESSION['text']);
            }
        }

        if (!empty($thank_message)) {
        ?>
            <h1 class="thank_message"><?= $thank_message ?></h1>
        <?php
        } else {
        ?>
            <form action="" method="post">
                <?= !empty($_POST) ? $message : "" ?>

                <div id="date_wrapper">
                    <span>Le</span>

                    <input type="date" title="Jour" name="day" id="input_day" value="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d', strtotime("+3 months", strtotime(date('Y-m-d')))) ?>">

                    <span>à</span>

                    <input type="number" title="Heure" name="hour" id="input_hour" min="10" max="18" value="10">

                    <span>heures.</span>
                </div>

                <div id="contact_wrapper">
                    <div class="form_wrapper">
                        <label for="input_firstname">Prénom</label>
                        <input type="text" name="firstname" id="input_firstname">
                    </div>

                    <div class="form_wrapper">
                        <label for="input_lastname">Nom</label>
                        <input type="text" name="lastname" id="input_lastname">
                    </div>

                    <div class="form_wrapper">
                        <label for="input_phone">Téléphone</label>
                        <input type="text" name="phone" id="input_phone">
                    </div>

                    <div class="form_wrapper">
                        <label for="input_email">Email</label>
                        <input type="email" name="email" id="input_email">
                    </div>
                </div>

                <div class="button_wrapper">
                    <button type="submit" name="submit">Envoyer</button>
                </div>
            </form>
        <?php
        }
        ?>
    </div>
</section>

<?php
include("footer.php");
?>