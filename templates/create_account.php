<?php
include("header.php");
?>

<main>
    <section id="create_account">
        <h1><?= $detailPage ?></h1>

        <hr>

        <?php
        if (isset($errors["execute"])) {
        ?>
            <p class="alert alert-danger"><?= $errors["execute"] ?></p>
        <?php
        }
        if (isset($errors["email"])) {
        ?>
            <p class="alert alert-danger"><?= $errors["email"] ?></p>
        <?php
        } else if (isset($errors["password"])) {
        ?>
            <p class="alert alert-danger"><?= $errors["password"] ?></p>
        <?php
        } else if (isset($errors["retypePassword"])) {
        ?>
            <p class="alert alert-danger"><?= $errors["retypePassword"] ?></p>
        <?php
        }
        ?>

        <form action="" method="post">
            <div class="form_wrapper">
                <label for="input_name">Nom</label>
                <input type="text" id="input_name" name="name" value="<?= isset($name) ? $name : "" ?>" required />
            </div>

            <div class="form_wrapper">
                <label for="input_email">Email</label>
                <input type="email" id="input_email" name="email" value="<?= isset($email) ? $email : "" ?>" required>
            </div>

            <div class="form_wrapper">
                <label for="input_password">Mot de passe</label>
                <input type="password" id="input_password" name="password" value="<?= isset($password) ? $password : "" ?>" required>
            </div>

            <div class="form_wrapper">
                <label for="input_retype_password">Confirmation du mot de passe</label>
                <input type="password" id="input_retype_password" name="retype_password" value="<?= isset($retype_password) ? $retype_password : "" ?>" required>
            </div>

            <div>
                <input type="submit" />
            </div>
        </form>
    </section>
</main>
</body>

</html>