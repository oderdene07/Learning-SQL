<?php
	$servername = "localhost"; // сервер комьютерийн хаяг буюу нэр
	$username = "root";     // MySQL-ийн бааз руу хандах хэрэглэгчийн нэр
	$password = ""; // MySQL-ийн бааз руу хандах нууц үг
	$database = "dreamhome"; // Баазын нэр

	// Өгөгдлийн сантай холбох объект үүсгэх
	$conn = new mysqli($servername, $username, $password, $database);

	$qry = "select * from privateowner";
	$result = $conn->query($qry);
?>
<a href="privateowneradd.php">Өгөгдөл нэмэх</a>
<br>
<table border="1">
	<?php while($row = $result->fetch_assoc()){?>
		<tr>
			<td><?php echo $row['ownerNo'];?></td>
			<td><?php echo $row['fName'];?></td>
			<td><?php echo $row['lName'];?></td>
            <td><?php echo $row['address'];?></td>
			<td><?php echo $row['telNo'];?></td>
			<td><a href="privateowneradd.php?id=<?php echo $row['ownerNo'];?>">Засах</a></td>
			<td><a href="process_privateowner.php?action=privateownerdel&id=<?php echo $row['ownerNo'];?>">Устгах</a></td>
		</tr>
	<?php }?>
</table>
<br>
<a href="index.php">Буцах</a>