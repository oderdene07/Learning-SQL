/*1*/
SELECT h.hotelName, h.city, r.price, r.roomNo
FROM hotel h, rooms r
WHERE h.hotelNo=r.hotelNo
ORDER BY r.price ASC

/*2*/
SELECT h.hotelName, h.city, r.price, r.roomNo
FROM hotel h, rooms r
WHERE h.hotelNo=r.hotelNo
AND r.price BETWEEN 400 AND 600


/*3*/
SELECT h.hotelName, h.city, COUNT(r.hotelNo) AS Hotel_roomNo
FROM hotel h, rooms r
WHERE h.hotelNo = r.hotelNo
GROUP BY h.hotelName
ORDER BY Hotel_roomNo DESC
LIMIT 1;

/*4*/
SELECT h.hotelName, h.city, COUNT(r.hotelNo), MAX(r.price), MIN(r.price), AVG(r.price)
FROM hotel h, rooms r
WHERE h.hotelNo = r.hotelNo
GROUP BY h.hotelName


/*5*/
SELECT h.hotelName, h.city, r.roomNo, r.type, r.price
FROM hotel h, rooms r, guest g, booking b
WHERE g.guestName="Michael Jordan"
AND b.guestNo=g.guestNo
AND r.roomNo = b.roomNo
AND r.hotelNo= b.hotelNo
AND h.hotelNo= b.hotelNo

/*6*/
SELECT r.*, b.dateFrom
FROM rooms r, booking b
WHERE b.roomNo=r.roomNo
AND b.hotelNo=r.hotelNo
AND NOW() BETWEEN b.dateFrom AND b.dateTo 

/*7*/
SELECT r.*, b.dateFrom, b.dateTo, DATEDIFF(dateTo, NOW()) AS remainingDay
FROM rooms r, booking b
WHERE b.roomNo=r.roomNo
AND b.hotelNo=r.hotelNo
AND NOW() BETWEEN dateFrom AND dateTo


/*8*/
SELECT r.*, COUNT(r.hotelNo) AS customerNo
FROM rooms r, booking b
WHERE r.hotelNo = b.hotelNo
AND r.roomNo = b.roomNo
GROUP BY b.hotelNo
ORDER BY customerNo DESC
LIMIT 1

/*9*/
SELECT *
FROM rooms
WHERE price<300
UNION
SELECT r.*
FROM rooms r, booking b
WHERE r.price<300
AND b.roomNo=r.roomNo
AND b.hotelNo=r.hotelNo
AND NOW() NOT BETWEEN NOW() AND b.dateTo

/*10*/
SELECT g.*, h.*, r.*, MAX(DATEDIFF(dateTo, dateFrom)) AS dayStayed
FROM guest g, hotel h, rooms r, booking b
WHERE h.hotelNo=r.hotelNo
AND h.hotelNo=b.hotelNo
AND r.roomNo=b.roomNo
AND b.guestNo=g.guestNo
