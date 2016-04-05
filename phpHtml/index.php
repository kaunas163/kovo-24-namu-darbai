<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Knygos</title>
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
                            JOIN `books` ON `authors_and_books`.bookId = `books`.bookId
                            GROUP BY
                                `books`.title";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><a href=\"book.php?id=" . $row["bookId"] . "\"> " . $row["knyga"] . " </a> </td>";
                            echo "<td>".$row["autoriai"]."</td>";
                            echo "<td>".$row["year"]."</td>";
                            echo "<td>".$row["genre"]."</td>";
                            echo "<td>".$row["original_title"]."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan=\"4\">0 rezultatų</td></tr>";
                    }

                ?>
            </tbody>
        </table>
    </div>
</body>
</html>