<?php
	$servername = "localhost"; // сервер комьютерийн хаяг буюу нэр
	$username = "root";     // MySQL-ийн бааз руу хандах хэрэглэгчийн нэр
	$password = ""; // MySQL-ийн бааз руу хандах нууц үг
	$database = "dreamhome"; // Баазын нэр

	// Өгөгдлийн сантай холбох объект үүсгэх
	$conn = new mysqli($servername, $username, $password, $database);

	$qry = "select * from client";
	$result = $conn->query($qry);
?>
<a href="clientadd.php">Өгөгдөл нэмэх</a>
<br>
<table border="1">
	<?php while($row = $result->fetch_assoc()){?>
		<tr>
			<td><?php echo $row['clientNo'];?></td>
			<td><?php echo $row['fName'];?></td>
			<td><?php echo $row['lName'];?></td>
			<td><?php echo $row['telNo'];?></td>
			<td><?php echo $row['prefType'];?></td>
			<td><?php echo $row['maxRent'];?></td>
			<td><a href="clientadd.php?id=<?php echo $row['clientNo'];?>">Засах</a></td>
			<td><a href="process_client.php?action=clientdel&id=<?php echo $row['clientNo'];?>">Устгах</a></td>
		</tr>
	<?php }?>
</table>
<br>
<a href="index.php">Буцах</a>