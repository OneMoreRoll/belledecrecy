<?php
include("header.php");
?>

<main>
    <?php
    include("admin_nav.php");
    ?>

    <section id="users">
        <h1>Liste des utilisateurs</h1>

        <hr>

        <div id="user_wrapper">
            <table id="user_table">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (empty($users)) {
                    ?>
                        <tr class="user">
                            <td class="user_number">N/A</td>
                            <td class="user_name">N/A</td>
                            <td class="user_email">N/A</td>
                            <td class="user_options disabled">
                                <a href="<?= DIR_ADMIN ?>supprimer_user/<?= $user["id"] ?>">Supprimer</a>
                            </td>
                        </tr>
                        <?php
                    } else {
                        $user_number = 1;

                        foreach ($users as $user) {
                        ?>
                            <tr class="user">
                                <td class="user_number"><?= $user_number ?></td>
                                <td class="user_name"><?= $user["name"] ?></td>
                                <td class="user_email"><?= $user["email"] ?></td>
                                <td class="user_options">
                                    <?php
                                    if ($user["deletable"] == 1) {
                                    ?>
                                        <a href="<?= DIR_ADMIN ?>supprimer_user/<?= $user["id"] ?>">Supprimer</a>
                                    <?php
                                    } else {
                                    ?>
                                        N/A
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                    <?php
                            $user_number++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<script src="<?= DIR_ASSETS ?>js/mobile_button_admin.js"></script>
</body>

</html>