<?php
	$servername = "localhost"; // сервер комьютерийн хаяг буюу нэр
	$username = "root";     // MySQL-ийн бааз руу хандах хэрэглэгчийн нэр
	$password = ""; // MySQL-ийн бааз руу хандах нууц үг
	$database = "dreamhome"; // Баазын нэр

	// Өгөгдлийн сантай холбох объект үүсгэх
	$conn = new mysqli($servername, $username, $password, $database);

	$qry = "select * from propertyforrent";
	$result = $conn->query($qry);
?>
<a href="propertyforrentadd.php">Өгөгдөл нэмэх</a>
<br>
<table border="1">
	<?php while($row = $result->fetch_assoc()){?>
		<tr>
			<td><?php echo $row['propertyNo'];?></td>
			<td><?php echo $row['street'];?></td>
			<td><?php echo $row['city'];?></td>
			<td><?php echo $row['postcode'];?></td>
			<td><?php echo $row['type'];?></td>
			<td><?php echo $row['rooms'];?></td>
			<td><?php echo $row['rent'];?></td>
			<td><?php echo $row['ownerNo'];?></td>
            <td><?php echo $row['staffNo'];?></td>
            <td><?php echo $row['branchNo'];?></td>
			<td><a href="propertyforrentadd.php?id=<?php echo $row['propertyNo'];?>">Засах</a></td>
			<td><a href="process_propertyforrent.php?action=propertyforrentdel&id=<?php echo $row['propertyNo'];?>">Устгах</a></td>
		</tr>
	<?php }?>
</table>
<br>
<a href="index.php">Буцах</a>