<?php
	$servername = "localhost"; // сервер комьютерийн хаяг буюу нэр
	$username = "root";     // MySQL-ийн бааз руу хандах хэрэглэгчийн нэр
	$password = ""; // MySQL-ийн бааз руу хандах нууц үг
	$database = "dreamhome"; // Баазын нэр

	// Өгөгдлийн сантай холбох объект үүсгэх
	$conn = new mysqli($servername, $username, $password, $database);

	$qry = "select * from branch";
	$result = $conn->query($qry);
?>
<a href="branchadd.php">Өгөгдөл нэмэх</a>
<br>
<table border="1">
	<?php while($row = $result->fetch_assoc()){?>
		<tr>
			<td><?php echo $row['branchNo'];?></td>
			<td><?php echo $row['street'];?></td>
			<td><?php echo $row['city'];?></td>
			<td><?php echo $row['postcode'];?></td>
			<td><a href="branchadd.php?id=<?php echo $row['branchNo'];?>">Засах</a></td>
			<td><a href="process.php?action=branchdel&id=<?php echo $row['branchNo'];?>">Устгах</a></td>
		</tr>
	<?php }?>
</table>
<br>
<a href="index.php">Буцах</a>