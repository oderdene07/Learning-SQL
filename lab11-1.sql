/*1*/
SELECT CONCAT
(g.guestName ," ",
 h.hotelName ," ","zochid buudliin ",
 r.price ," ", "unetei ",
 r.type, " uruund ",
 b.dateFrom, "-nd buudallajee.") AS medeelel
FROM guest g, hotel h, rooms r, booking b
WHERE g.guestNo=b.guestNo
AND b.hotelNo=h.hotelNo
AND b.hotelNo=r.hotelNo
AND r.roomNo=b.roomNo


/*2*/
SELECT CONCAT(h.hotelName,", ", h.city,", ", r.roomNo,", ", r.type,", ", MIN(r.price)) AS medeelel
FROM rooms r, hotel h, booking b
WHERE r.hotelNo=h.hotelNo
AND NOW() NOT BETWEEN b.dateFrom AND b.dateTo 
GROUP BY r.hotelNo


/*3*/
SELECT  r.hotelNo, r.roomNo, r.type, r.price, COUNT(b.roomNo) AS COUNT
FROM booking b, rooms r
WHERE b.roomNo=r.roomNo
AND b.hotelNo=r.hotelNo
GROUP BY b.hotelNo, b.roomNo
HAVING COUNT<=ALL(SELECT COUNT(roomNo)
			FROM booking
			GROUP BY hotelNo, roomNo)
ORDER BY r.price ASC


/*4*/
SELECT g.*
FROM guest g, booking b
WHERE b.guestNo = g.guestNo
AND dateFrom > DATE_ADD(NOW(), INTERVAL -3 MONTH)
AND dateTo < NOW()


/*5*/
SELECT  b.hotelNo, g.guestNo, g.guestName, g.guestAddress, COUNT(g.guestNo) AS COUNT
FROM booking b, guest g
WHERE g.guestNo=b.guestNo
GROUP BY b.hotelNo, g.guestNo
HAVING COUNT>SOME(SELECT COUNT(guestNo)
			FROM booking
			GROUP BY hotelNo, guestNo)


/*6*/
CREATE TABLE hotel_nuuts AS 
SELECT h.hotelNo, h.hotelName, h.city, r.roomNo, r.type, r.price
FROM hotel h, rooms r
WHERE h.hotelNo=r.hotelNo


/*7*/
CREATE TABLE HotelInformation AS 
SELECT h.hotelNo, h.hotelName, COUNT(r.roomNo) AS roomCount, MAX(r.price) AS maxPrice, MIN(r.price) AS minPrice, AVG(r.price) AS avgPrice, h.city
FROM hotel h, rooms r
WHERE h.hotelNo=r.hotelNo
GROUP BY h.hotelNo


/*8*/
UPDATE rooms r, hotel h
SET r.price=r.price*1.2
WHERE r.hotelNo=h.hotelNo
AND h.hotelName="Hyatt"











