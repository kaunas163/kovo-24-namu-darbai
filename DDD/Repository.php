<?php
/**
 * Created by PhpStorm.
 * User: ieva
 * Date: 16.4.5
 * Time: 17.53
 */

include("Database.php");
include("BookClass.php");

class Repository
{
    public function getAllBooks()
    {
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
                GROUP BY `books`.`title`";

        $connection = new MyDatabase();
        $booksData = $connection->DoQuery($sql);
        $booksData = $booksData->fetch_all();

        foreach ($booksData as $data) {
            $book = new Book();
            $book->setBookId($data[5]);
            $book->setTitle($data[1]);
            $book->setYear($data[2]);
            $book->setGenre($data[4]);
            $book->setAuthors($data[0]);
            $book->setOriginalTitle($data[3]);
            $books[] = $book;
        }

        return $books;
    }

    public function getById($id)
    {
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

        if($id)
            $sql.="WHERE `books`.`bookId`=$id ";
        $sql.="GROUP BY `books`.`title`";

        $connection = new MyDatabase();
        $result = $connection->DoQuery($sql);

        $book = new Book();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $book->setBookId($row["bookId"]);
                $book->setTitle($row["knyga"]);
                $book->setYear($row["year"]);
                $book->setGenre($row["genre"]);
                $book->setAuthors($row["autoriai"]);
                $book->setOriginalTitle($row["original_title"]);
            }
        }

        return $book;
    }
};