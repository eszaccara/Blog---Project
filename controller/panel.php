<?php
require_once('../vendor/autoload.php');
require_once('login.php');

session_start();
if (!isset($_SESSION["MOD"])) {
    header("Location: /blog");
    exit();
}
if (isset($_GET["sair"])) {
    session_destroy();
    header("Location: /blog");
    exit();
}

$loader = new \Twig\Loader\FilesystemLoader('../view');
$twig = new \Twig\Environment($loader);

echo $twig->render('panel.twig');
?>
