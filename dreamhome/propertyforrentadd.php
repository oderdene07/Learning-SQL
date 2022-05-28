<?php
	$servername = "localhost"; // сервер комьютерийн хаяг буюу нэр
	$username = "root";     // MySQL-ийн бааз руу хандах хэрэглэгчийн нэр
	$password = ""; // MySQL-ийн бааз руу хандах нууц үг
	$database = "dreamhome"; // Баазын нэр

	// Өгөгдлийн сантай холбох объект үүсгэх
	$conn = new mysqli($servername, $username, $password, $database);

	$id = isset($_GET['id']) ? $_GET['id'] : '';
	
	$qry = "select * from propertyforrent where propertyNo = '{$id}'";
	$result = $conn->query($qry);
	if($row = $result->fetch_assoc()){
		$propertyNo = $row['propertyNo'];
		$street = $row['street'];
		$city = $row['city'];
        $postcode = $row['postcode'];
        $type = $row['type'];
        $rooms = $row['rooms'];
        $rent = $row['rent'];
        $ownerNo = $row['ownerNo'];
        $staffNo = $row['staffNo'];
        $branchNo = $row['branchNo'];
	}else{
		$propertyNo = "";
		$street = "";
		$city = "";
        $postcode = "";
        $type = "";
        $rooms = "";
        $rent = "";
        $ownerNo = "";
        $staffNo = "";
        $branchNo = "";
	}
?>
<a href="propertyforrentadd.php">Өгөгдөл нэмэх</a>
<br>
<form action="process_propertyforrent.php?action=propertyforrentadd" method="post">
	<input type="hidden" name="id" value="<?php echo $id;?>">
	<br>
	property No : <input type="text" name="propertyNo" value="<?php echo $propertyNo;?>">
    <br>
	street : <input type="text" name="street" value="<?php echo $street;?>">
	<br>
	city : <input type="text" name="city" value="<?php echo $city;?>">
	<br>
	postcode : <input type="text" name="postcode" value="<?php echo $postcode;?>">
	<br>
    type : <input type="text" name="type" value="<?php echo $type;?>">
    <br>
	rooms : <input type="text" name="rooms" value="<?php echo $rooms;?>">
	<br>
	rent : <input type="text" name="rent" value="<?php echo $rent;?>">
	<br>
	owner No : <input type="text" name="ownerNo" value="<?php echo $ownerNo;?>">
	<br>
    staff No : <input type="text" name="staffNo" value="<?php echo $staffNo;?>">
	<br>
	branch No : <input type="text" name="branchNo" value="<?php echo $branchNo;?>">
	<br>
	<button type="submit">Хадгалах</button>
</form>
<br>
<a href="propertyforrent.php">Буцах</a>