<?php
	$servername = "localhost"; // сервер комьютерийн хаяг буюу нэр
	$username = "root";     // MySQL-ийн бааз руу хандах хэрэглэгчийн нэр
	$password = ""; // MySQL-ийн бааз руу хандах нууц үг
	$database = "dreamhome"; // Баазын нэр

	// Өгөгдлийн сантай холбох объект үүсгэх
	$conn = new mysqli($servername, $username, $password, $database);

	$id = isset($_GET['id']) ? $_GET['id'] : '';
	
	$qry = "select * from staff where staffNo = '{$id}'";
	$result = $conn->query($qry);
	if($row = $result->fetch_assoc()){
		$staffno = $row['staffNo'];
		$fName = $row['fName'];
		$lName = $row['lName'];
		$position = $row['position'];
		$sex = $row['sex'];
		$DOB = $row['DOB'];
		$salary = $row['salary'];
		$branchNo = $row['branchNo'];
	}else{
		$staffno = "";
		$fName = "";
		$lName = "";
		$position = "";
		$sex = "";
		$DOB = "";
		$salary = "";
		$branchNo = "";
	}
?>
<a href="staffadd.php">Өгөгдөл нэмэх</a>
<br>
<form action="process_staff.php?action=staffadd" method="post">
	<input type="hidden" name="id" value="<?php echo $id;?>">
	<br>
	staff No : <input type="text" name="staffNo" value="<?php echo $staffno;?>">
	<br>
	fName : <input type="text" name="fName" value="<?php echo $fName;?>">
	<br>
	lName : <input type="text" name="lName" value="<?php echo $lName;?>">
	<br>
	position : <input type="text" name="position" value="<?php echo $position;?>">
	<br>
	sex : <input type="text" name="sex" value="<?php echo $sex;?>">
	<br>
	DOB : <input type="text" name="DOB" value="<?php echo $DOB;?>">
	<br>
	salary : <input type="text" name="salary" value="<?php echo $salary;?>">
	<br>
	branchNo : <input type="text" name="branchNo" value="<?php echo $branchNo;?>">
	<br>
	<button type="submit">Хадгалах</button>
</form>
<br>
<a href="staff.php">Буцах</a>