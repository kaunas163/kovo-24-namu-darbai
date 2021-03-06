<?php include("BookClass.php"); ?>

<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Knygos</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Informacija apie knygą</h1>
        </div>
        
        <a href="index.php" class="btn btn-primary">Grįžti atgal į knygų sąrašą</a><br><br>
        
        <?php

            $bookId = null;
            if (isset($_GET['id']) && $_GET['id'] !== false) {
                $bookId = (int) $_GET['id'];
            }

            $book = new Book();
            $book->Load($bookId);
            echo $book->getBookId() . "<br>";
            echo $book->getTitle() . "<br>";
            echo $book->getAuthors() . "<br>";
            echo $book->getYear() . "<br>";
            echo $book->getGenre() . "<br>";
            echo $book->getOriginalTitle();

            ?>

    </div>
</body>
</html>