<?php
session_start();

// Développement d'une page index.php générant n'importe quelle page du site
// La page d'accueil est générée s'il n'y a pas de paramètre
$page = "home";
if (isset($_GET["page"])) {
    $page = $_GET["page"];
}

// Import du fichier contenant les constantes pour la base de données et les chemins du site
require("../config/index.php");

// Connexion à la base de données "heptagone"
$dsn = "mysql:host=localhost;dbname=belledecrecy";
$db = new PDO($dsn, DB_USERNAME, DB_PASSWORD);

// Tableau qui contient les différentes pages du site
$data = array(
    "home" => array(
        "model" => "HomeModel",
        "view" => "HomeView",
        "controller" => "HomeController"
    ),
    "carousel" => array(
        "model" => "CarouselModel",
        "view" => "CarouselView",
        "controller" => "CarouselController"
    ),
    "apropos" => array(
        "model" => "AProposModel",
        "view" => "AProposView",
        "controller" => "AProposController"
    ),
    "reservation" => array(
        "model" => "ReservationModel",
        "view" => "ReservationView",
        "controller" => "ReservationController"
    ),
    "create_account" => array(
        "model" => "CreateAccountModel",
        "view" => "CreateAccountView",
        "controller" => "CreateAccountController",
    ),
    "login" => array(
        "model" => "LoginModel",
        "view" => "LoginView",
        "controller" => "LoginController",
    ),
    "admin" => array(
        "model" => "AdminModel",
        "view" => "AdminView",
        "controller" => "AdminController",
    ),
    "ap_admin" => array(
        "model" => "APAdminModel",
        "view" => "APAdminView",
        "controller" => "APAdminController"
    ),
    "res_admin" => array(
        "model" => "ResAdminModel",
        "view" => "ResAdminView",
        "controller" => "ResAdminController"
    ),
    "users" => array(
        "model" => "UserModel",
        "view" => "UserView",
        "controller" => "UserController"
    ),
    "collections" => array(
        "model" => "CollectionModel",
        "view" => "CollectionView",
        "controller" => "CollectionController"
    ),
    "colors" => array(
        "model" => "ColorModel",
        "view" => "ColorView",
        "controller" => "ColorController",
    ),
    "lingeries" => array(
        "model" => "LingerieModel",
        "view" => "LingerieView",
        "controller" => "LingerieController",
    ),
    "pop-up" => array(
        "model" => "PopUpModel",
        "view" => "PopUpView",
        "controller" => "PopUpController"
    )
);

// Parcours du tableau pour vérifier si la page existe réellement
$find = false;
foreach ($data as $key => $value) {
    if ($page === $key) {
        // Page trouvée
        $find = true;

        $model = $value["model"];
        $view = $value["view"];
        $controller = $value["controller"];
    }
}

if ($find) {
    // Import des différentes classes (ex: HomeModel, HomeController et HomeView)
    require(DIR_MODEL . $page . ".php");
    require(DIR_CONTROLLER . $page . ".php");
    require(DIR_VIEW . $page . ".php");

    // Instance des classes importées
    $pageModel = new $model($db);
    $pageController = new $controller($pageModel);
    $pageView = new $view($pageController);

    // Appel à la méthode render() pour faire le rendu de la vue
    $pageView->render();
}
