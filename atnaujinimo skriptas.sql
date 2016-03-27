INSERT INTO `Books` (authorId, title, year)
VALUES (1, "title one", 2002), (2, "title two", 2005), (3, "title three", 2010);

UPDATE Books
SET authorId=4
WHERE authorId = 7;

DELETE FROM Books
WHERE authorId IS NULL;

ALTER TABLE `books`
ADD COLUMN `genre`  varchar(255) NULL AFTER `year`;

CREATE TABLE `authors_and_books` (
    `authorId`  int NOT NULL ,
    `bookId`  int NOT NULL ,
    PRIMARY KEY (`authorId`, `bookId`)
);

UPDATE `Books` SET genre = "knowledge" WHERE bookId < 6;
UPDATE `Books` SET genre = "detective" WHERE bookId >= 6;

INSERT INTO `authors_and_books` (authorId, bookId)
SELECT authorId, bookId
FROM books;

INSERT INTO `authors_and_books` (authorId, bookId)
VALUES (5,2), (1,3), (5,3);

ALTER TABLE `books`
DROP COLUMN `authorId`;

ALTER TABLE `books`
ADD COLUMN `original_title`  varchar(255) CHARACTER SET utf8 NULL AFTER `genre`;

UPDATE `books` SET `original_title`='programavimas f#' WHERE `bookId`=1;
UPDATE `books` SET `original_title`='reguliarių išsireiškimų knyga' WHERE `bookId`=2;