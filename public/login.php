<?php
session_start();
require_once "../config/cfg.php";
require_once "../src/classes/Model.php";
require_once "../src/classes/View.php";
require_once "../src/classes/Controller.php";

$view = new View();
$model = new Model($config, $view);
$controller = new Controller($model);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $hash = $model->getHash($_POST['user']);
    if (password_verify($_POST['pw'], $hash)) {
        // echo "You are good to go! consider yourself logged in ";
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['id'] = $model->getId($_POST['user']);
        header('Location: /');
    } else {
        //we could consider adding a specific message about login status
        header('Location: /?badlogin=true');
    }
    //select name and hash from DB
    //password_verify user entry against the hash
}