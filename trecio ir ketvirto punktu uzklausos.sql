-- 3.a. punktas

INSERT INTO `Authors` (name)
VALUES ("Name one"), ("Name two"), ("Name three"), ("Name four");

-- 3.b. punktas

INSERT INTO `Books` (authorId, title, year)
VALUES (1, "title one", 2002), (2, "title two", 2005), (3, "title three", 2010);

-- 3.c. punktas

SELECT title, name
FROM Books
LEFT JOIN Authors
ON Books.authorId = Authors.authorId;

-- 3.d. punktas

UPDATE Books
SET authorId=4
WHERE authorId = 7;

-- 3.e. punktas, itraukiant autorius be knygu

SELECT name, COUNT(Books.bookId) AS "knygu skaicius"
FROM Authors
LEFT JOIN Books
ON Authors.authorId=Books.authorId
GROUP BY name;

-- 3.e. punktas, neitraukiant autoriu be knygu

SELECT name, COUNT(Books.bookId) AS "knygu skaicius"
FROM Authors
INNER JOIN Books
ON Authors.authorId=Books.authorId
GROUP BY name;

-- 3.f. punktas

DELETE FROM Authors
WHERE authorId
IN (8,9,10,11);

-- 3.g. punktas

DELETE FROM Books
WHERE authorId IS NULL;

-- 4.a. punktas

ALTER TABLE `books`
ADD COLUMN `genre`  varchar(255) NULL AFTER `year`;

-- 4.b. punktas

CREATE TABLE `authors_and_books` (
    `authorId`  int NOT NULL ,
    `bookId`  int NOT NULL ,
    PRIMARY KEY (`authorId`, `bookId`)
);

-- 4.c. punktas

UPDATE `Books`
SET genre = "knowledge"
WHERE bookId < 6;

UPDATE `Books`
SET genre = "detective"
WHERE bookId >= 6;

INSERT INTO `authors_and_books` (authorId, bookId)
SELECT authorId, bookId
FROM books;

INSERT INTO `authors_and_books` (authorId, bookId)
VALUES (5,2), (1,3), (5,3);

ALTER TABLE `books`
DROP COLUMN `authorId`;

-- 4.d. punktas

SELECT
	GROUP_CONCAT(`authors`.name) AS autoriai,
	`books`.title AS knyga
FROM
	`authors`
JOIN `authors_and_books` ON `authors`.authorId = `authors_and_books`.authorId
JOIN `books` ON `authors_and_books`.bookId = `books`.bookId
GROUP BY
	`books`.title

-- 4.e. punktas

ALTER TABLE `books`
ADD COLUMN `original_title`  varchar(255) CHARACTER SET utf8 NULL AFTER `genre`;

UPDATE `books` SET `original_title`='programavimas f#' WHERE `bookId`=1;
UPDATE `books` SET `original_title`='reguliarių išsireiškimų knyga' WHERE `bookId`=2;
