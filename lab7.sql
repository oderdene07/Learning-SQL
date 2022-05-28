/*1*/
SELECT b.*, 
s.staffNo, s.POSITION, s.fName AS "Staff fName", s.lName AS "Staff lName", 
c.fName AS "Client fName", c.lName AS "client lName", c.telNo, c.prefType, r.clientNo
FROM branch b, staff s, CLIENT c, registration r
WHERE b.branchNo = s.branchNo 
AND s.staffNo = r.staffNo
AND r.clientNo = c. clientNo;


/*2*/
SELECT r.dateJoined, b.*, s.staffNo
FROM registration r, staff s, branch b
WHERE s.branchNo=b.branchNo
AND r.staffNo= s.staffNo
AND r.dateJoined= "2014-04-13";


/*3*/
SELECT v.clientNo, v.viewDate, c.*
FROM viewing v, CLIENT c
WHERE v.clientNo= c.clientNo
AND v.viewDate BETWEEN "2015-04-01" AND "2015-04-30";


/*4*/
SELECT fName, lName
FROM staff
UNION
SELECT fName, lName
FROM CLIENT
UNION 
SELECT fName, lName
FROM privateowner
ORDER BY fName ASC;


/*5*/
SELECT telNo, fName, lName
FROM CLIENT
WHERE telNo LIKE "%22%"
UNION
SELECT telNo, fName, lName
FROM privateowner
WHERE telNo LIKE "%22%";


/*6*/
SELECT p.city AS "property city", b.city AS "branch city"
FROM propertyforrent p, branch b
WHERE p.city=b.city;


/*7*/
SELECT r.city, b.city, o.*, s.*
FROM branch b, propertyforrent r, privateowner o, staff s
WHERE r.city = b.city
AND o.ownerNo=r.ownerNo
AND s.branchNo=b.branchNo;


/*8*/
SELECT o.*, s.fName, s.lName, s.staffNo, s.position, b.city
FROM propertyforrent r, privateowner o, staff s, branch b
WHERE s.staffNo=r.staffNo
AND b.branchNo=s.branchNo
AND r.ownerNo=o.ownerNo
AND r.rooms=3
AND r.type ="Flat";


/*9*/
CREATE TABLE propertyforrent_nuuts AS
SELECT *
FROM propertyforrent;


/*10*/
CREATE TABLE StaffPropCount
	AS (SELECT p.staffNo, s.fName, s.lName, COUNT(p.staffNo) AS "propCount"
	FROM staff s, propertyforrent p
	WHERE p.staffNo = s.staffNo
	GROUP BY p.staffNo);


/*11*/
CREATE TABLE BranchInf 
	AS (SELECT s.branchNo, b.city, COUNT(s.branchNo) AS staffcount
	FROM staff s, branch b
	WHERE s.branchNo=b.branchNo
	GROUP BY s.branchNo)


/*12*/
SELECT s.*,b.*
FROM privateowner o, propertyforrent p, staff s, branch b
WHERE b.branchNo=p.branchNo
AND o.ownerNo=p.ownerNo
AND p.staffNo=s.staffNo
AND o.fName LIKE "C%";


/*13*/
SELECT s.staffNo, s.branchNo, COUNT(p.staffNo)
FROM propertyforrent p, staff s
WHERE s.branchNo="B003"
AND p.staffNo=s.staffNo
GROUP BY s.staffNo;


/*14*/
SELECT v.clientNo, c.*, p.city, p.rent, p.rooms
FROM viewing v, CLIENT c, propertyforrent p
WHERE v.propertyNo = p.propertyNo
AND v.clientNo=c.clientNo 
AND COMMENT="too small";


/*15*/
SELECT b.city, b.branchNo, s.position, COUNT(s.position)
FROM branch b, staff s
WHERE s.branchNo= b.branchNo
GROUP BY b.branchNo, s.position;


/*16*/
UPDATE staff
SET POSITION="Manager", salary="25000"
WHERE branchNo="B007" AND sex="F";




