<?php
	$servername = "localhost"; // сервер комьютерийн хаяг буюу нэр
	$username = "root";     // MySQL-ийн бааз руу хандах хэрэглэгчийн нэр
	$password = ""; // MySQL-ийн бааз руу хандах нууц үг
	$database = "dreamhome"; // Баазын нэр

	// Өгөгдлийн сантай холбох объект үүсгэх
	$conn = new mysqli($servername, $username, $password, $database);

	$id = isset($_GET['id']) ? $_GET['id'] : '';
	
	$qry = "select * from client where clientNo = '{$id}'";
	$result = $conn->query($qry);
	if($row = $result->fetch_assoc()){
		$clientNo = $row['clientNo'];
		$fName = $row['fName'];
		$lName = $row['lName'];
        $telNo = $row['telNo'];
        $prefType = $row['prefType'];
		$maxRent = $row['maxRent'];
	}else{
		$clientNo = "";
		$fName = "";
		$lName = "";
        $telNo = "";
        $prefType = "";
		$maxRent = "";
	}
?>
<a href="clientadd.php">Өгөгдөл нэмэх</a>
<br>
<form action="process_client.php?action=clientadd" method="post">
	<input type="hidden" name="id" value="<?php echo $id;?>">
	<br>
	client No : <input type="text" name="clientNo" value="<?php echo $clientNo;?>">
	<br>
	fName : <input type="text" name="fName" value="<?php echo $fName;?>">
	<br>
	lName : <input type="text" name="lName" value="<?php echo $lName;?>">
	<br>
	telNo : <input type="text" name="telNo" value="<?php echo $telNo;?>">
    <br>
	prefType : <input type="text" name="prefType" value="<?php echo $prefType;?>">
    <br>
	maxRent : <input type="text" name="maxRent" value="<?php echo $maxRent;?>">
    <br>
	<button type="submit">Хадгалах</button>
</form>
<br>
<a href="client.php">Буцах</a>