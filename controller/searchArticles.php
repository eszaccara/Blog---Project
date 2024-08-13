<?php

require_once 'config.php';
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$stmt = $pdo->query("SELECT * FROM Articles ORDER BY article_id DESC OFFSET $offset ROWS FETCH NEXT 6 ROWS ONLY");
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($articles);
?>
