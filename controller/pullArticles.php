<?php

function getAllArticles()
{
    require_once 'config.php';

    $stmt = $pdo->query("SELECT TOP 6 * FROM Articles ORDER BY article_id DESC");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $rows; // Retorna a matriz de artigos
}
