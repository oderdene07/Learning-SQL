<?php
	$servername = "localhost"; // сервер комьютерийн хаяг буюу нэр
	$username = "root";     // MySQL-ийн бааз руу хандах хэрэглэгчийн нэр
	$password = ""; // MySQL-ийн бааз руу хандах нууц үг
	$database = "dreamhome"; // Баазын нэр

	// Өгөгдлийн сантай холбох объект үүсгэх
	$conn = new mysqli($servername, $username, $password, $database);

	$id = isset($_GET['id']) ? $_GET['id'] : '';
	
	$qry = "select * from branch where branchNo = '{$id}'";
	$result = $conn->query($qry);
	if($row = $result->fetch_assoc()){
		$branchno = $row['branchNo'];
		$street = $row['street'];
		$city = $row['city'];
		$postcode = $row['postcode'];
	}else{
		$branchno = "";
		$street = "";
		$city = "";
		$postcode = "";
	}
?>
<a href="branchadd.php">Өгөгдөл нэмэх</a>
<br>
<form action="process.php?action=branchadd" method="post">
	<input type="hidden" name="id" value="<?php echo $id;?>">
	<br>
	Branch No : <input type="text" name="branchNo" value="<?php echo $branchno;?>">
	<br>
	Street : <input type="text" name="street" value="<?php echo $street;?>">
	<br>
	City : <input type="text" name="city" value="<?php echo $city;?>">
	<br>
	Postcode : <input type="text" name="postcode" value="<?php echo $postcode;?>">
	<br>
	<button type="submit">Хадгалах</button>
</form>
<br>
<a href="branch.php">Буцах</a>