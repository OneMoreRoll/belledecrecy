<?php
include("header.php");
?>

<body>
    <section id="carousel">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div id="full_carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel_inner">
                            <?php
                            $count = 0;
                            foreach ($data as $item) {
                            ?>
                                <div class="carousel-item<?= $count == 0 ? " active" : "" ?>" id="carousel-item" data-interval="5000000">
                                    <div class="carousel_flex">
                                        <div class="content_wrapper image_wrapper">
                                            <a href="https://shop.belledecrecy.com/products/<?= str_replace(' ', '-', strtolower($item["link_name"])) ?>">
                                                <img src="<?= DIR_ASSETS ?>img/products/left_images/<?= $item["left_image"] ?>" alt="">
                                            </a>
                                        </div>

                                        <div class="content_wrapper central_wrapper content_mobile">
                                            <div id="product_infos">
                                                <div id="top_wrapper">
                                                    <h1>Collection <?= $item["collection_name"] ?></h1>
                                                    <h2>Look <?= sprintf("%02d", $count + 1) ?>/<?= count($data) ?></h2>
                                                </div>

                                                <div id="bottom_wrapper">
                                                    <h1><?= $item["lingerie_name"] ?></h1>
                                                    <p><?= $item["description"] ?></p>
                                                </div>
                                            </div>

                                            <button class="details_button" id="details_button" value="Bouton-<?= $count ?>">Détails du produit</button>

                                            <div class="product_details" id="product_details_<?= $count ?>">
                                                <h1><?= $item["price"] ?> euros</h1>

                                                <div id="color_wrapper">
                                                    <p>Coloris disponible</p>
                                                    <h2><?= $item["color_names"] ?></h2>
                                                </div>

                                                <div id="buying_wrapper">
                                                    <h2>
                                                        <a href="https://shop.belledecrecy.com/products/<?= str_replace(' ', '-', strtolower($item["link_name"])) ?>">Commander le produit</a>
                                                    </h2>
                                                    <h2>
                                                        <a href="<?= HOST ?>point-de-vente/">Réserver votre essayage</a>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="content_mobile_only">
                                            <h1 class="lingerie_name_mobile"><?= $item["lingerie_name"] ?></h1>

                                            <div class="button_wrapper">
                                                <button class="details_button_mobile" id="details_button_mobile" value="Bouton-<?= $count ?>">Détails du produit</button>
                                            </div>
                                        </div>

                                        <div class="modal_mobile">
                                            <div class="close" id="close">
                                                <button type="button" class="btn-close">
                                                    <span class="icon-cross"></span>
                                                    <span class="visually-hidden">Fermer</span>
                                                </button>
                                            </div>

                                            <div id="top_wrapper_mobile">
                                                <h1><?= $item["lingerie_name"] ?></h1>
                                                <p><?= $item["description"] ?></p>
                                            </div>

                                            <div id="image_wrapper_mobile">
                                                <a href="https://shop.belledecrecy.com/products/<?= str_replace(' ', '-', strtolower($item["link_name"])) ?>">
                                                    <img src=" <?= DIR_ASSETS ?>img/products/left_images/<?= $item["left_image"] ?>" alt="">
                                                </a>
                                                <a href="https://shop.belledecrecy.com/products/<?= str_replace(' ', '-', strtolower($item["link_name"])) ?>">
                                                    <img src=" <?= DIR_ASSETS ?>img/products/right_images/<?= $item["right_image"] ?>" alt="">
                                                </a>
                                            </div>

                                            <div id="bottom_wrapper_mobile">
                                                <h1><?= $item["price"] ?> euros</h1>

                                                <div id="color_wrapper_mobile">
                                                    <p>Coloris disponible</p>
                                                    <h2><?= $item["color_names"] ?></h2>
                                                </div>

                                                <div id="buying_wrapper_mobile">
                                                    <h2>
                                                        <a href="https://shop.belledecrecy.com/products/<?= str_replace(' ', '-', strtolower($item["link_name"])) ?>">Commander le produit</a>
                                                    </h2>
                                                    <h2>
                                                        <a href="<?= HOST ?>point-de-vente/">Réserver votre essayage</a>
                                                    </h2>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="content_wrapper image_wrapper image_mobile">
                                            <a href="https://shop.belledecrecy.com/products/<?= str_replace(' ', '-', strtolower($item["link_name"])) ?>">
                                                <img src=" <?= DIR_ASSETS ?>img/products/right_images/<?= $item["right_image"] ?>" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $count++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include("footer.php");
    ?>