<?php
	$servername = "localhost"; // сервер комьютерийн хаяг буюу нэр
	$username = "root";     // MySQL-ийн бааз руу хандах хэрэглэгчийн нэр
	$password = ""; // MySQL-ийн бааз руу хандах нууц үг
	$database = "dreamhome"; // Баазын нэр

	// Өгөгдлийн сантай холбох объект үүсгэх
	$conn = new mysqli($servername, $username, $password, $database);

	$id = isset($_GET['id']) ? $_GET['id'] : '';
	
	$qry = "select * from privateowner where ownerNo = '{$id}'";
	$result = $conn->query($qry);
	if($row = $result->fetch_assoc()){
		$ownerNo = $row['ownerNo'];
		$fName = $row['fName'];
        $lName = $row['lName'];
        $address = $row['address'];
        $telNo = $row['telNo'];
	}else{
		$ownerNo = "";
		$fName = "";
        $lName = "";
        $address = "";
        $telNo = "";
	}
?>
<a href="privateowneradd.php">Өгөгдөл нэмэх</a>
<br>
<form action="process_privateowner.php?action=privateowneradd" method="post">
	<input type="hidden" name="id" value="<?php echo $id;?>">
	<br>
	owner No : <input type="text" name="ownerNo" value="<?php echo $ownerNo;?>">
	<br>
	fName : <input type="text" name="fName" value="<?php echo $fName;?>">
	<br>
	lName : <input type="text" name="lName" value="<?php echo $lName;?>">
	<br>
    address : <input type="text" name="address" value="<?php echo $address;?>">
    <br>
	telNo : <input type="text" name="telNo" value="<?php echo $telNo;?>">
    <br>
	<button type="submit">Хадгалах</button>
</form>
<br>
<a href="privateowner.php">Буцах</a>