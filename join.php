DB: ankeborg

TABLE: people
-------------------------------------
id			name
1			Kalle Anka
2			Musse Pigg
3			Janne Långben
4			Klasse Häst
5			Farmor Anka
6			Kajsa Anka

TABLE: cars
-------------------------------------
id			name			person_id
1			BMW				1
2			Volvo			2
3			Audi			4
4			Saab			5
5			Jeep			0


* LEFT JOIN (samma som LEFT OUTER JOIN)
// Väljer alla personer och skriver ut vad dessa har för bilar (även om det är NULL)
'SELECT people.name, cars.name FROM people LEFT JOIN cars ON people.id = cars.person_id'

name					name
-------------------------------------
Kalle Anka				BMW
Musse Pigg				Volvo
Janne Långben			NULL
Klasse Häst				Audi
Farmor Anka				Saab
Kajsa Anka				NULL

////////////////////////////////////////////////////////////////////////////////////////////////

* RIGHT JOIN (samma som RIGHT OUTER JOIN)
// Väljer alla bilar och skriver ut vilka personer som har dessa
'SELECT people.name, cars.name FROM people RIGHT JOIN cars ON people.id = cars.person_id'

name					name
-------------------------------------
Kalle Anka				BMW
Musse Pigg				Volvo
Klasse Häst				Audi
Farmor Anka				Saab
NULL					Jeep

////////////////////////////////////////////////////////////////////////////////////////////////

* JOIN (samma som INNER JOIN)
// Väljer alla personer som har bilar
'SELECT people.name, cars.name FROM people JOIN cars ON people.id = cars.person_id'

name					name
-------------------------------------
Kalle Anka				BMW
Musse Pigg				Volvo
Klasse Häst				Audi
Farmor Anka				Saab