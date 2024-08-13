<?php
require_once 'config.php';

$directory = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'media' . DIRECTORY_SEPARATOR;
if (!file_exists($directory)) {
    mkdir($directory, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_FILES['img']) && is_array($_FILES['img']['name'])) {
        $imageNames = array();
        $totalFiles = count($_FILES['img']['name']);

        for ($i = 0; $i < $totalFiles; $i++) {
            $image = $_FILES['img']['name'][$i];
            $extensao = pathinfo($image, PATHINFO_EXTENSION);
            if ($extensao == 'png' || $extensao == 'jpg' || $extensao == 'jpeg') {
                $imageName = uniqid() . '.' . $extensao;
                $directoryImage = $directory . $imageName;
                array_push($imageNames, $imageName);
                if (move_uploaded_file($_FILES['img']['tmp_name'][$i], $directoryImage)) {
                } else {
                    echo 'Erro ao salvar alguns das imagens.';
                }
            }
        }

        $articleImg1 = $imageNames[0];
        $articleImg2 = $imageNames[1];
        $articleImg3 = $imageNames[2];
        $articleImg4 = $imageNames[3];
        $articleImg5 = $imageNames[4];

        $articleData = addslashes($_POST['article_data']);
        $articleTitle = addslashes($_POST['article_title']);
        $articleText1 = addslashes($_POST['article_text1']);
        $articleText2 = addslashes($_POST['article_text2']);
        $articleText3 = addslashes($_POST['article_text3']);
        $articleText4 = addslashes($_POST['article_text4']);
        $articleText5 = addslashes($_POST['article_text5']);
        $articleAuthor = addslashes($_POST['article_author']);
        $articleReferences = addslashes($_POST['article_references']);
        $articleState = addslashes($_POST['article_state']);

        $sql = "INSERT INTO Articles (article_data, article_title, article_img1, article_text1, article_img2, article_text2, article_img3, article_text3, article_img4, article_text4, article_img5, article_text5, article_author, article_references, state_id) 
                    VALUES (:articleData, :articleTitle, :articleImg1, :articleText1, :articleImg2, :articleText2, :articleImg3, :articleText3, :articleImg4, :articleText4, :articleImg5, :articleText5, :articleAuthor, :articleReferences, :articleState)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':articleData', $articleData);
        $stmt->bindParam(':articleTitle', $articleTitle);
        $stmt->bindParam(':articleImg1', $articleImg1);
        $stmt->bindParam(':articleText1', $articleText1);
        $stmt->bindParam(':articleImg2', $articleImg2);
        $stmt->bindParam(':articleText2', $articleText2);
        $stmt->bindParam(':articleImg3', $articleImg3);
        $stmt->bindParam(':articleText3', $articleText3);
        $stmt->bindParam(':articleImg4', $articleImg4);
        $stmt->bindParam(':articleText4', $articleText4);
        $stmt->bindParam(':articleImg5', $articleImg5);
        $stmt->bindParam(':articleText5', $articleText5);
        $stmt->bindParam(':articleAuthor', $articleAuthor);
        $stmt->bindParam(':articleReferences', $articleReferences);
        $stmt->bindParam(':articleState', $articleState);

        if ($stmt->execute()) {
            echo 'Published article!';
        } else {
            echo 'Erro na execução do SQL.';
            echo '<br>';
            echo 'SQL execution error.';
        }
    }
}
?>