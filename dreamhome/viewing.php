<?php
	$servername = "localhost"; // сервер комьютерийн хаяг буюу нэр
	$username = "root";     // MySQL-ийн бааз руу хандах хэрэглэгчийн нэр
	$password = ""; // MySQL-ийн бааз руу хандах нууц үг
	$database = "dreamhome"; // Баазын нэр

	// Өгөгдлийн сантай холбох объект үүсгэх
	$conn = new mysqli($servername, $username, $password, $database);

	$qry = "select * from viewing";
	$result = $conn->query($qry);
?>
<a href="viewingadd.php">Өгөгдөл нэмэх</a>
<br>
<table border="1">
	<?php while($row = $result->fetch_assoc()){?>
		<tr>
			<td><?php echo $row['clientNo'];?></td>
			<td><?php echo $row['propertyNo'];?></td>
			<td><?php echo $row['viewDate'];?></td>
			<td><?php echo $row['comment'];?></td>
			<td><a href="viewingadd.php?id=<?php echo $row['clientNo'];?>">Засах</a></td>
			<td><a href="process_viewing.php?action=viewingdel&id=<?php echo $row['clientNo'];?>">Устгах</a></td>
		</tr>
	<?php }?>
</table>
<br>
<a href="index.php">Буцах</a>