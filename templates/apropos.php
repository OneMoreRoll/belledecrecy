<?php
include("header.php");
?>

<section id="apropos">
    <div class="content_wrapper" id="left_content_wrapper">
        <h1><?= $data["left_title"] ?></h1>
        <h2><?= $data["left_subtitle"] ?></h2>

        <div class="text_body">
            <p><?= nl2br($data["left_description"]) ?></p>

            <a href="points-de-vente">Réservez votre essayage</a>
        </div>
    </div>

    <hr>

    <div class="content_wrapper" id="right_content_wrapper">
        <h1><?= $data["right_title"] ?></h1>
        <h2><?= $data["right_subtitle"] ?></h2>

        <p><?= nl2br($data["right_description"]) ?></p>

        <div class="link_wrapper">
            <a href="mailto:<?= $data["email"] ?>"><?= $data["email"] ?></a>
        </div>
        <p class="phone_number"><?= $data["phone"] ?></p>

        <form action="" method="post">
            <?= (empty($_POST)) ? "" : $message ?>

            <input type="email" id="input_email" name="email" title="Votre adresse mail" placeholder="Votre email" required>

            <div class="button_wrapper">
                <button type="submit">ok</button>
            </div>
        </form>
    </div>
</section>

<?php
include("footer.php");
?>