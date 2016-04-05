<?php include("Repository.php"); ?>

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
        <h1>Visos knygos</h1>
    </div>

    <?php

        $rep = new Repository();
        $books = $rep->getAllBooks();

        print_r($books);

        foreach ($books as $book)
        {
            echo $book->getTitle() . "<br>";
            echo $book->getAuthors() . "<br>";
            echo $book->getGenre() . "<br>";
            echo $book->getOriginalTitle() . "<br>";
            echo $book->getYear() . "<br>";
        }

        echo "hi?";

    ?>

</div>
</body>
</html>