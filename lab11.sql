/*1*/
SELECT CONCAT
(SUBSTRING(s.lName, 1, 1),".", s.fName ," ", 
MONTH(r.dateJoined),"-r sariin" ," ",
DAY(r.dateJoined),"-nd"," ",b.city ,"-n salbart ",
SUBSTRING(c.lName, 1, 1),".", c.fName,"-tai ajillajee.") AS hen_hentei_ajillasan
FROM staff s, branch b, CLIENT c, registration r
WHERE b.branchNo=s.branchNo
AND r.clientNo=c.clientNo
AND r.staffNo=s.staffNo
ORDER BY SUBSTRING(s.lName, 1, 1) DESC;


/*2*/
CREATE TABLE People AS
	SELECT fName, lName 
	FROM staff
	UNION
	SELECT fName, lName
	FROM CLIENT
	UNION
	SELECT fName, lName
	FROM privateowner;

/*3*/
CREATE TABLE Staff_Info AS
	SELECT s.staffNo, 
	CONCAT(s.fName," ",s.lName) AS fullName,
	s.position,
	CONCAT(b.street," ", b.city," ", b.postcode) AS branchAddress,
	COUNT(p.propertyNo) AS propCount,
	COUNT(r.clientNo) AS clientCount
	FROM staff s, branch b, propertyforrent p, registration r
	WHERE s.branchNo=b.branchNo
	AND p.staffNo=s.staffNo
	AND r.staffNo=s.staffNo
	GROUP BY s.staffNo;
	
	
/*4*/
UPDATE propertyforrent
SET rent=rent*1.15


/*5*/
UPDATE propertyforrent
SET rent=rent*1.15
WHERE branchNo="B003"

/*6*/
UPDATE propertyforrent p, privateowner o
SET rent=400, rooms=4
WHERE o.fName="Tina"
AND o.lName="Murphy"
AND o.ownerNo=p.ownerNo


/*7*/
UPDATE registration 
SET dateJoined=DATE_ADD(dateJoined, INTERVAL 1 MONTH)
WHERE dateJoined LIKE "%-04-%"


/*8*/
DELETE FROM propertyforrent_nuuts
WHERE staffNo IS NULL

	
/*9*/
DELETE FROM propertyforrent_nuuts
WHERE ownerNo=(SELECT ownerNo
	       FROM privateowner
	       WHERE fName="Carol")

    
/*10*/
DELETE FROM propertyforrent_nuuts
WHERE branchNo="B003"
AND rooms=4
