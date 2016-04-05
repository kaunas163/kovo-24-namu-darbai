<?php include("repository.php"); ?>

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
            
            $rep = new Repository();
            $book = $rep->getById($bookId);
            echo $book->getTitle() . "<br>";
            echo $book->getAuthors() . "<br>";
            echo $book->getGenre() . "<br>";
            echo $book->getOriginalTitle() . "<br>";
            echo $book->getYear() . "<br>";

        ?>
                
    </div>
</body>
</html>