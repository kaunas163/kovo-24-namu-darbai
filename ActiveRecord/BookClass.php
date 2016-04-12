<?php

include ('db.php');

class Book
{
    protected $bookId;

    protected $title;

    protected $year;

    protected $genre;

    protected $authors;

    protected $original_title;

    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * @param mixed $bookId
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @return mixed
     */
    public function getOriginalTitle()
    {
        return $this->original_title;
    }

    /**
     * @param mixed $original_title
     */
    public function setOriginalTitle($original_title)
    {
        $this->original_title = $original_title;
    }

    public function Load($objectNumber)
    {
        $sql = "SELECT
                    GROUP_CONCAT(`authors`. NAME) AS autoriai,
                    `books`.title AS knyga,
                    `books`.`year`,
                    `books`.`genre`,
                    `books`.`bookId`
                FROM
                    `authors`
                JOIN `authors_and_books` ON `authors`.authorId = `authors_and_books`.authorId
                JOIN `books` ON `authors_and_books`.bookId = `books`.bookId ";

        if($objectNumber)
            $sql.="WHERE `books`.`bookId`=$objectNumber ";
        $sql.="GROUP BY `books`.`title`";

        $database = new MyDatabase();
        $result = $database->DoQuery($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->setBookId($row["bookId"]);
                $this->setTitle($row["knyga"]);
                $this->setYear($row["year"]);
                $this->setGenre($row["genre"]);
                $this->setAuthors($row["autoriai"]);
                $this->setOriginalTitle($row["original_title"]);
            }
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * @param mixed $authors
     */
    public function setAuthors($authors)
    {
        $this->authors = $authors;
    }
};
