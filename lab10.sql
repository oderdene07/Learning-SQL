CREATE DATABASE oyutan;
USE oyutan;

CREATE TABLE Professional(
	professionalNo INTEGER,
	professionalName VARCHAR(20)
);
CREATE TABLE Student (
	studentNo INTEGER,
	professionalNo INTEGER,
	lName VARCHAR(20),
	fName VARCHAR(20),
	sex VARCHAR(20),
	birthDate DATE,
	YEAR VARCHAR(20)
);
CREATE TABLE Lesson (
	lessonNo INTEGER,
	lessonName VARCHAR(50)
);
CREATE TABLE LessonRelation (
	professionalNo INTEGER,
	lessonNo INTEGER
);
CREATE TABLE ChosenLesson(
	studentNo INTEGER,
	lessonNo INTEGER,
	YEAR VARCHAR(20),
	choosenSeason VARCHAR(20),
	firstResult INTEGER,
	secondResult INTEGER
);
		
INSERT INTO Professional (professionalNo, professionalName)
VALUES
	(1001, 'Computer Science'),
	(1002, 'Medeelliin Technolog'),
	(1003, 'Medeelliin System'),
	(1004, 'Program Hangamj');

INSERT INTO Student (studentNo, professionalNo, lName, fName, sex, birthDate, YEAR)
VALUES 
	(0873, 1002, 'Natsagdorj', 'Od-Erdene', 'M', '2000-05-26', '2018'),
	(0792, 1003, 'Tamir', 'Arigun', 'M', '2001-03-01', '2018'),
	(1626, 1001, 'Ganbold', 'Gunbold', 'M', '2001-03-21', '2015'),
	(1587, 1001, 'Munkhtulga', 'Chinguun', 'M', '2000-10-21', '2018'),
	(0564, 1004, 'Batbaatar', 'Namuun', 'F', '1999-04-16', '2017'),
	(1142, 1002, 'Boldsaihan', 'Gerel', 'F', '1998-01-20', '2016'),
	(0651, 1003, 'Batbold', 'Anar', 'F', '2002-06-13', '2019');
	
INSERT INTO Lesson (lessonNo, lessonName)
VALUES 
	(504, 'Algorithmiin undes'),
	(501, 'Programchlaliin C hel'),
	(503, 'Programchlaliin arga zui'),
	(604, 'Internet tehnologiin undes'),
	(610, 'Ugugdliin san'),
	(511, 'Injeneriin math'),
	(607, 'Injeneriin fizik');
	
INSERT INTO LessonRelation (professionalNo, lessonNo)
VALUES 
	(1002, 504),
	(1002, 501),
	(1004, 503),
	(1003, 604),
	(1003, 610),
	(1001, 511),
	(1001, 607);
	
INSERT INTO ChosenLesson (studentNo, lessonNo, YEAR, choosenSeason, firstResult, secondResult)
VALUES 
	(0873, 504, '2019', 'Havar', 15, 30),
	(0792, 604, '2019', 'Namar', 17, 26),
	(1626, 511, '2020', 'Namar', 15, 20),
	(1587, 607, '2019', 'Havar', 14, 29),
	(0564, 503, '2018', 'Namar', 10, 27),
	(1142, 501, '2018', 'Havar', 18, 17),
	(0651, 610, '2019', 'Havar', 13, 21);
	
	
	
/*1*/
SELECT p.professionalName, COUNT(r.lessonNo) AS hutulbur
FROM professional p, lessonrelation r
WHERE p.professionalNo=r.professionalNo
GROUP BY r.professionalNo;

/*2*/
SELECT p.professionalName, s.Year, COUNT(s.professionalNo)
FROM professional p, student s
WHERE p.professionalNo=s.professionalNo
GROUP BY s.Year, p.professionalName
ORDER BY p.professionalName;

/*3*/
SELECT l.*
FROM lesson l, student s, lessonrelation r
WHERE s.fName = 'Gunbold'
AND s.professionalNo= r.professionalNo
AND r.lessonNo=l.lessonNo;

/*4*/
SELECT c.*
FROM student s, chosenlesson c
WHERE s.fName = 'Gunbold'
AND s.studentNo=c.studentNo;

/*5*/
SELECT c.*, SUM((c.firstResult+c.secondResult)/2) AS Dundaj
FROM student s, chosenlesson c
WHERE s.fName = 'Arigun'
AND s.studentNo=c.studentNo
AND c.choosenSeason='Namar'
AND c.Year=2019;


/*6*/
SELECT s.fName, c.*, COUNT(c.lessonNo), SUM((c.firstResult+c.secondResult)/2) AS Dundaj
FROM student s, chosenlesson c
WHERE s.studentNo=c.studentNo
GROUP BY c.studentNo;

/*7*/
SELECT s.professionalNo, c.lessonNo, MAX(c.firstResult+c.secondResult) AS MAX, MIN(c.firstResult+c.secondResult) AS MIN, AVG(c.firstResult+c.secondResult) AS AVG
FROM student s, chosenlesson c
WHERE s.studentNo=c.studentNo
AND c.Year="2019"
AND c.choosenSeason="Havar"
GROUP BY s.professionalNo;


/*8*/
SELECT s.professionalNo, s.fName, c.lessonNo, c.firstResult, c.secondResult
FROM student s, chosenlesson c
WHERE s.studentNo=c.studentNo
AND c.firstResult+c.secondResult<40
AND c.Year="2019"
AND c.choosenSeason="Havar";

/*9*/
SELECT *
FROM chosenlesson
WHERE choosenSeason="Havar"
AND YEAR=2019
ORDER BY firstResult+secondResult DESC
LIMIT 1;

/*10*/
DELETE 
FROM chosenlesson 
WHERE firstResult IS NULL
AND secondResult IS NULL
AND YEAR<2019;

/*11*/
SELECT lessonNo, COUNT(lessonNo) AS songosonToo
FROM chosenlesson
GROUP BY lessonNo
ORDER BY songosonToo DESC
LIMIT 1;
