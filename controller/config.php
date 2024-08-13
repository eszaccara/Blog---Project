<?php

$serverName = "ZACCARA";
$databaseName = "BD_EZNordeste";
$username = "sa";
$password = "123";

$connectionString = "sqlsrv:Server=$serverName;Database=$databaseName";

$errorMessageBr = "Isto é um projeto complementar acadêmico, esse é um erro de conexão, provavelmente você não incluiu o banco de dados no sql, caso contrário,
é apenas um erro no logon da conexão ou erro nos drivers de conexão sql -> pdo";
$errorMessageUsa = "This is a supplementary academic project. This is a connection error, most likely due to not including the database in SQL, otherwise, 
it's just a login error of the connection or an error in SQL connection drivers -> PDO.";

try {
    $pdo = new PDO($connectionString, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo $errorMessageBr;
    echo '<br>';
    echo '<br>';
    echo $errorMessageUsa;
    echo '<br>';
    echo '<br>';
    echo $e->getMessage();
}