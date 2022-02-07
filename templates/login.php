<?php
include("header.php");
?>

<main>
    <section id="login">
        <h1><?= $detailPage ?></h1>

        <hr>

        <?= $message ?>

        <form action="" method="post">
            <div class="form_wrapper">
                <label for="input_email">Email</label>
                <input type="email" name="email" id="input_email">
            </div>

            <div class="form_wrapper">
                <label for="input_password">Mot de passe</label>
                <input type="password" name="password" id="input_password">
            </div>

            <div>
                <input type="submit" value="Se connecter">
            </div>
        </form>
    </section>
</main>
</body>

</html>