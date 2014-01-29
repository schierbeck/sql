<?php

Wildcards
"WHERE username LIKE '%oha%'"

Inlogg Query * GÖR EJ!
FEL! Här kan man logga in antingen med lösenorder och epost, eller om man bara kan användarnamnet
"SELECT * FROM users WHERE password='$password' AND email='$email' OR username='$username'"

Inlogg Query
RÄTT!! Sätt inom paranteser
"SELECT * FROM users WHERE password='$password' AND ( email='$email' OR username='$username' )"

Sök Query
( $sok är en sökterm, t.ex. en $_POST(‘’) )
"SELECT * FROM users WHERE name LIKE '%$sok%'' ORDER BY name DESC LIMIT 10, 20"

LIMIT med komma
(här plockar den ut rad 11-30, LIMIT index, antal rader)
"SELECT * FROM products LIMIT 10, 20"

BETWEEN
(Plockar ut något mellan två värden)
"SELECT * FROM products WHERE price BETWEEN 100 AND 200"

DISTINCT
(Plockar bara ut ett värde, tex. för att plocka ut ett namn och inte få dubbletter)
"SELECT DISTINCT name FROM..."

COUNT
(Räknar raderna från users)
"SELECT COUNT (*) FROM users"

AS
(Sätter ett alias)
"SELECT COUNT (*) AS countusers FROM users"

MAX()
(Hämtar maxvärdet från kolumnen price i tabelen products
"SELECT MAX(price) FROM products"

AS * ANVÄND GÄRNA INTE
(Detta är typ en standard som är vanlig, men vidrigt att läsa)
"SELECT u.*, p.id, c.* FROM users AS u, posts AS p, comments AS c"

AS
(Bättre användning av AS)
"SELECT * FROM posts_has_categories AS postcat"

SUM()
(Hämtar den totalla summan från kolumnen price i tabellen products)
"SELECT SUM(price) FROM products"

FIRST() / LAST()
(Hämtar det senaste/första raden som lagts in i databasen)
"SELECT LAST(price) FROM products"

GROUP BY
(Tar ut namnet på tag, samt hur många gånger den finns)
"SELECT tag, COUNT(tag) FROM tags GROUP BY tag"
Exempel: http://www.w3schools.com/sql/sql_groupby.asp

Bakåtfnuttar
(escapar om strängen har samma namn som ett SQL kommando)
"SELECT * FROM from WHERE name=´where´"

VALUES * GÖR EJ!
(Dumt, då man måste ange alaa värden som ska in i tabellen)
"INSERT INTO users VALUES('', 'Banan', '', 'Kaka')"

VALUES
(Bättre då man anger vilka kolumner man vill pusha in i)
"INSERT INTO users (name, password) VALUES('Arne', 'gOdJul')"

VALUES
(Samma som ovan fast pusha in multipla rader)
"INSERT INTO users (name, password) VALUES('Arne', 'gOdJul'), ('Bosse', '1234')"

NOW()
(Fixar den aktuella tiden oavsett om kolumnen är datetime, timestamp osv.)
"INSERT INTO users (name, password, created_on) VALUES('Arne', 'gOdJul', NOW())"

UPDATE
(Sätt namn och password där name är 'Bosse')
"UPDATE users SET name='Lennart', password='1337'  WHERE name='Bosse'"

DELETE
(Tar bort rad där name är 'Bosse')
"DELETE FROM users WHERE name='Bosse'"

IN
(Fungerar som en array, denna väljer alla rader där name är 'Bosse' och 'Lennart')
"SELECT * FROM users WHERE name IN ('Bosse', 'Lennart')"

Subquery
(Den kör först det inom paranteser, dvs. först plockar den ut alla rader med id över 50, i andra steget hämtar den alla namn från dessa)
"SELECT * FROM users WHERE name IN (SELECT * FROM users WHERE id > 50)"

Subquery
"SELECT * FROM users WHERE name IN(SELECT name FROM users WHERE id IN(SELECT id FROM users_got_post)"

JOIN
Joinar cars med people där people.id är cars.person_id, hämtar här people.name och cars.name om personen har en nu har en bil
"SELECT people.name, cars.name FROM people LEFT JOIN cars ON people.id=cars.person_id"

JOIN
Samma som ovan men här hämtas bara personer som har en bil
"SELECT people.name, cars.name FROM people INNER JOIN cars ON people.id=cars.person_id"

GROUP_CONCAT
Ger kommasepararade värden (CSV) av cars.name, resultatet skulle kunna bli något som ‘volvo’, ‘saab’, ‘jeep’
Grupperar ihop efter people.name och sedan tex.

Bosse volvo
Gunilla saab, jeep
Lennart volvo, jeep

"SELECT people.name, GROUP_CONCAT(cars.name) FROM people INNER JOIN cars ON people.id=cars.person_id GROUP BY people.name"

HAVING
Samma som ovan men plockar bara ut personer som har fler än 1 bil. HAVING är ett villkor.
"SELECT people.name GROUP_CONCAT(cars.name) FROM people INNER JOIN cars ON people.id=cars.person_id GROUP BY people.name HAVING COUNT(cars.name) > 1"

UNION
Slår ihop två resultatsatser. Det är viktigt att tabellerna har samma kolumner som är formaterade på samma sätt. Dvs, en merge.
"SELECT * FROM users UNION SELECT * FROM people"

Samma som ovan men hr väljer man ut specifika kolumer ur olika tabeller, men... måste vara exakt samma namn och datatyp
"SELECT name FROM users UNION SELECT name FROM people"