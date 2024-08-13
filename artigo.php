<?php
require_once('vendor/autoload.php');
include('controller/config.php');

if (isset($_GET['article_id'])) {
    $article_id = $_GET['article_id'];
    $stmt = $pdo->query("SELECT * FROM Articles WHERE article_id = $article_id");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

//var_dump($row);

$dados = [
    'row' => $row,
];

$loader = new \Twig\Loader\FilesystemLoader('view');
$twig = new \Twig\Environment($loader);

echo $twig->render('artigo.twig', $dados);