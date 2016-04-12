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
        <h1>Knygų sąrašas</h1>
    </div>

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Knygos pavadinimas</th>
            <th>Autoriai</th>
            <th>Metai</th>
            <th>Žanras</th>
            <th>Originalus pavadinimas</th>
        </tr>
        </thead>

        <tbody>

            <?php

                $rep = new Repository();
                $books = $rep->getAllBooks();

                foreach ($books as $book)
                {
                    echo "<tr>".
                        "<td><a href=\"BookPage.php?id=".$book->getBookId()."\">".$book->getTitle()."</a></td>".
                        "<td>".$book->getAuthors()."</td>".
                        "<td>".$book->getGenre()."</td>".
                        "<td>".$book->getOriginalTitle()."</td>".
                        "<td>".$book->getYear()."</td>".
                        "</tr>";
                }

            ?>

        </tbody>
    </table>

</div>
</body>
</html>