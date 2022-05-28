<?php
	$servername = "localhost"; // сервер комьютерийн хаяг буюу нэр
	$username = "root";     // MySQL-ийн бааз руу хандах хэрэглэгчийн нэр
	$password = ""; // MySQL-ийн бааз руу хандах нууц үг
	$database = "dreamhome"; // Баазын нэр

	// Өгөгдлийн сантай холбох объект үүсгэх
	$conn = new mysqli($servername, $username, $password, $database);

	$qry = "select * from registration";
	$result = $conn->query($qry);
?>
<a href="registrationadd.php">Өгөгдөл нэмэх</a>
<br>
<table border="1">
	<?php while($row = $result->fetch_assoc()){?>
		<tr>
			<td><?php echo $row['clientNo'];?></td>
			<td><?php echo $row['branchNo'];?></td>
			<td><?php echo $row['staffNo'];?></td>
			<td><?php echo $row['dateJoined'];?></td>
			<td><a href="registrationadd.php?id=<?php echo $row['clientNo'];?>">Засах</a></td>
			<td><a href="process_registration.php?action=registrationdel&id=<?php echo $row['clientNo'];?>">Устгах</a></td>
		</tr>
	<?php }?>
</table>
<br>
<a href="index.php">Буцах</a>