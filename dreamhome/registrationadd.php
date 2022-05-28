<?php
	$servername = "localhost"; // сервер комьютерийн хаяг буюу нэр
	$username = "root";     // MySQL-ийн бааз руу хандах хэрэглэгчийн нэр
	$password = ""; // MySQL-ийн бааз руу хандах нууц үг
	$database = "dreamhome"; // Баазын нэр

	// Өгөгдлийн сантай холбох объект үүсгэх
	$conn = new mysqli($servername, $username, $password, $database);

	$id = isset($_GET['id']) ? $_GET['id'] : '';
	
	$qry = "select * from registration where clientNo = '{$id}'";
	$result = $conn->query($qry);
	if($row = $result->fetch_assoc()){
		$clientNo = $row['clientNo'];
		$branchNo = $row['branchNo'];
		$staffNo = $row['staffNo'];
        $dateJoined = $row['dateJoined'];
	}else{
		$clientNo = "";
		$branchNo = "";
		$staffNo = "";
        $dateJoined = "";
	}
?>
<a href="registrationadd.php">Өгөгдөл нэмэх</a>
<br>
<form action="process_registration.php?action=registrationadd" method="post">
	<input type="hidden" name="id" value="<?php echo $id;?>">
	<br>
	client No : <input type="text" name="clientNo" value="<?php echo $clientNo;?>">
	<br>
	branchNo : <input type="text" name="branchNo" value="<?php echo $branchNo;?>">
	<br>
	staffNo : <input type="text" name="staffNo" value="<?php echo $staffNo;?>">
	<br>
	dateJoined : <input type="text" name="dateJoined" value="<?php echo $dateJoined;?>">
    <br>
	<button type="submit">Хадгалах</button>
</form>
<br>
<a href="registration.php">Буцах</a>