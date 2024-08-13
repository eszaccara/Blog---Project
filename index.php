<?php
require 'vendor/autoload.php';
require 'controller/routes.php';
require 'controller/pullArticles.php';

$loader = new \Twig\Loader\FilesystemLoader('view');
$twig = new \Twig\Environment($loader);


$articles = getAllArticles();

$dados = [
    'titleheader' => 'EZ - Nordeste',
    'articles' => $articles,
];

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = str_replace('/blog', '', $url);

$template = route($url);

echo $twig->render($template, $dados);
?>
