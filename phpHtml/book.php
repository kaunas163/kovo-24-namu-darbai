<?php include("db.php"); ?>

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
            
            $sql = "SELECT
                        GROUP_CONCAT(`authors`. NAME) AS autoriai,
                        `books`.title AS knyga,
                        `books`.`year`,
                        `books`.`genre`,
                        `books`.`original_title`,
                        `books`.`bookId`
                    FROM
                        `authors`
                    JOIN `authors_and_books` ON `authors`.authorId = `authors_and_books`.authorId
                    JOIN `books` ON `authors_and_books`.bookId = `books`.bookId ";

            if($bookId)
                    $sql.="WHERE `books`.`bookId`=$bookId ";
            $sql.="GROUP BY `books`.`title`";  
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<h2>".$row["knyga"]."</h2>";
                    echo "<p>Autoriai: ".$row["autoriai"]."</p>";
                    echo "<p>Metai: ".$row["year"]."</p>";
                    echo "<p>Žanras: ".$row["genre"]."</p>";
                    echo "<p>Originalus pavadinimas: ".$row["original_title"]."</p>";
                }
            } else {
                echo "Knygos rasti nepavyko";
            }
        
        ?>
                
    </div>
</body>
</html>