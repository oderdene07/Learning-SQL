/*1*/
SELECT s.*,b.*
FROM staff s, branch b
WHERE s.branchNo = b.branchNo AND city = "London" OR city="Aberdeen"
ORDER BY salary ASC;

/*2*/			
SELECT * FROM viewing v 
WHERE EXISTS (SELECT clientNo, fName 
FROM CLIENT c
WHERE v.clientNo = c.cLientNo AND fName = "Aline");

/*3*/
SELECT * FROM staff s 
WHERE sex = "M"
AND EXISTS (SELECT staffNo 
FROM propertyforrent p
WHERE p.staffNo = s.staffNo AND rooms = 4)
ORDER BY branchNo ASC;
			
/*4*/			
SELECT *,MAX(rent), MIN(rent)
FROM propertyforrent
GROUP BY TYPE;

/*5*/
SELECT s.*,b.*
FROM staff s, branch b
WHERE s.branchNo = b.branchNo
ORDER BY DOB DESC
LIMIT 1;

/*6*/
SELECT *, salary-(SELECT MIN(salary) FROM staff)
FROM staff
WHERE salary>(SELECT MIN(salary) FROM staff)

/*7*/
SELECT *
FROM propertyforrent 
WHERE branchNo IN (SELECT branchNo 
FROM branch 
WHERE street="16 Argyll St")

/*8*/
SELECT*
FROM staff
WHERE salary>ALL( SELECT salary
                   FROM staff
                   WHERE branchNo="B003");
                   
/*9*/
SELECT p.type, AVG(c.maxRent)
FROM  propertyforrent p , CLIENT c 
WHERE c.preftype = p.type 
AND p.propertyNo = (SELECT propertyNo
                  FROM viewing
                  GROUP BY propertyNo
                  ORDER BY propertyNo DESC
                  LIMIT 1);   
		       
              
/*10*/
SELECT o.*, r.*
FROM privateowner o, propertyforrent r
WHERE o.ownerNo = r.ownerNo

/*11*/
SELECT propertyNo, COUNT(propertyNo) AS "Uzsen" 
FROM viewing
GROUP BY propertyNo
ORDER BY Uzsen DESC
LIMIT 2;

/*12*/
SELECT r.*,c.*
FROM registration r, CLIENT c
WHERE r.clientNo = c.clientNo
ORDER BY dateJoined DESC
LIMIT 2;

/*13*/
SELECT COUNT(staffNo), sex
FROM staff
WHERE  fname LIKE "J%"
GROUP BY POSITION
ORDER BY sex;

/*14*/
SELECT o.ownerNo, o.fName, p.propertyNo, p.rent, p.type, p.rooms
FROM privateowner o, propertyforrent p
WHERE p.ownerNo = o.ownerNo
AND rent > (SELECT rent
                 FROM propertyforrent
                 WHERE ownerNo = (SELECT ownerNo
				FROM privateowner
				WHERE telNo="0141-357-7419"));
                                
                                
/*15*/
SELECT c.*, p.city, p.rent, p.rooms 
FROM CLIENT c, propertyforrent p 
WHERE clientNo = (SELECT clientNo FROM viewing WHERE COMMENT="too small")
AND propertyNo = (SELECT propertyNo FROM viewing WHERE COMMENT="too small")

/*16*/
SELECT s.*,p.*
FROM registration r, CLIENT c, staff s, propertyforrent p 
WHERE c.fName="Mike" 
AND r.clientNo=c.clientNo 
AND r.staffNo=s.staffNo 
AND s.staffNo=p.staffNo;

/*17*/
SELECT s.staffNo, s.fName, s.DOB, s.branchNo, b.street 
FROM branch b, staff s 
WHERE b.branchNo= s.branchNo 
AND staffNo=(SELECT staffNo FROM registration WHERE dateJoined="2014-03-07")

