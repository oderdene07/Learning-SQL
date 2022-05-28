SELECT city, COUNT(branchNo) AS branchNo FROM branch 
GROUP BY city

SELECT sex, COUNT(sex), AVG(salary), MAX(salary) FROM staff 
GROUP BY sex

SELECT POSITION, sex, COUNT(sex), COUNT(POSITION) FROM staff
GROUP BY sex, POSITION
ORDER BY COUNT(POSITION) DESC

SELECT POSITION, SUM(salary)/2 FROM staff
GROUP BY POSITION
ORDER BY COUNT(POSITION) DESC

SELECT branchNo, COUNT(branchNo), SUM(salary) FROM staff
GROUP BY branchNo
HAVING COUNT(branchNo) > 1

SELECT city, branchNo, COUNT(propertyNo) FROM propertyforrent
GROUP BY city
HAVING COUNT(city) > 2

SELECT staffNo, fName, lName, DOB FROM staff
WHERE branchNo IN (SELECT branchNo FROM branch WHERE city="London")

SELECT fName, lName, POSITION, salary, salary-(SELECT AVG(salary) FROM staff) AS "Tsalingiin zuruu" FROM staff
WHERE salary > (SELECT AVG(salary) FROM staff)

SELECT * FROM propertyforrent
WHERE branchNo IN (SELECT branchNo FROM branch WHERE city="Glasgow")

SELECT * FROM propertyforrent
WHERE rent > ALL(SELECT rent
FROM propertyforrent
WHERE ownerNo =
(SELECT ownerNo
FROM privateowner
WHERE fName = "Carol"))

SELECT * FROM propertyforrent
WHERE rent > ALL(SELECT rent
FROM propertyforrent
WHERE ownerNo IN
(SELECT ownerNo
FROM privateowner
WHERE fName = "Tony"))

SELECT * FROM CLIENT WHERE maxRent IN 
(SELECT rent FROM propertyforrent)

SELECT * FROM propertyforrent WHERE TYPE IN 
(SELECT prefType FROM CLIENT)

SELECT * FROM staff WHERE branchNo IN
(SELECT branchNo FROM branch WHERE street = "16 Argyll St")

SELECT fName, lName, POSITION, DOB FROM staff WHERE branchNo IN 
(SELECT branchNo FROM branch WHERE city="London" OR city="Glasgow")
ORDER BY DOB ASC

SELECT fName, lName, POSITION, sex, branchNo FROM staff WHERE branchNo IN 
(SELECT branchNo FROM propertyforrent WHERE rooms=3) AND sex="F"
ORDER BY POSITION DESC
