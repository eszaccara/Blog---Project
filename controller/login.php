<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['accessPassword'];

    $query = "SELECT * FROM Account";
    $stmt = $pdo->query($query);

    if ($stmt) {
        $found = false;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $row['pass'])) {
                $found = true;
                session_start();
                $_SESSION["MOD"] = $row['pass'];
                header("Location: panel.php");
                break;
            } else {
                header("Location: ../");
            }
        }
    } else {
        echo "Erro na consulta: " . $pdo->errorInfo()[2];
    }
}
?>