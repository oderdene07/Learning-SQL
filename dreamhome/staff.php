<?php
	$servername = "localhost"; // сервер комьютерийн хаяг буюу нэр
	$username = "root";     // MySQL-ийн бааз руу хандах хэрэглэгчийн нэр
	$password = ""; // MySQL-ийн бааз руу хандах нууц үг
	$database = "dreamhome"; // Баазын нэр

	// Өгөгдлийн сантай холбох объект үүсгэх
	$conn = new mysqli($servername, $username, $password, $database);

	$qry = "select * from staff";
	$result = $conn->query($qry);
?>
<a href="staffadd.php">Өгөгдөл нэмэх</a>
<br>
<table border="1">
	<?php while($row = $result->fetch_assoc()){?>
		<tr>
			<td><?php echo $row['staffNo'];?></td>
			<td><?php echo $row['fName'];?></td>
			<td><?php echo $row['lName'];?></td>
			<td><?php echo $row['position'];?></td>
			<td><?php echo $row['sex'];?></td>
			<td><?php echo $row['DOB'];?></td>
			<td><?php echo $row['salary'];?></td>
			<td><?php echo $row['branchNo'];?></td>
			<td><a href="staffadd.php?id=<?php echo $row['staffNo'];?>">Засах</a></td>
			<td><a href="process_staff.php?action=staffdel&id=<?php echo $row['staffNo'];?>">Устгах</a></td>
		</tr>
	<?php }?>
</table>
<br>
<a href="index.php">Буцах</a>