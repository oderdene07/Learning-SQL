<?php
	$servername = "localhost"; // сервер комьютерийн хаяг буюу нэр
	$username = "root";     // MySQL-ийн бааз руу хандах хэрэглэгчийн нэр
	$password = ""; // MySQL-ийн бааз руу хандах нууц үг
	$database = "dreamhome"; // Баазын нэр

	// Өгөгдлийн сантай холбох объект үүсгэх
	$conn = new mysqli($servername, $username, $password, $database);

	$id = isset($_GET['id']) ? $_GET['id'] : '';
	
	$qry = "select * from viewing where clientNo = '{$id}'";
	$result = $conn->query($qry);
	if($row = $result->fetch_assoc()){
		$clientNo = $row['clientNo'];
		$propertyNo = $row['propertyNo'];
		$viewDate = $row['viewDate'];
        $comment = $row['comment'];
	}else{
		$clientNo = "";
		$propertyNo = "";
		$viewDate = "";
        $comment = "";
	}
?>
<a href="viewingadd.php">Өгөгдөл нэмэх</a>
<br>
<form action="process_viewing.php?action=viewingadd" method="post">
	<input type="hidden" name="id" value="<?php echo $id;?>">
	<br>
	client No : <input type="text" name="clientNo" value="<?php echo $clientNo;?>">
	<br>
	propertyNo : <input type="text" name="propertyNo" value="<?php echo $propertyNo;?>">
	<br>
	viewDate : <input type="text" name="viewDate" value="<?php echo $viewDate;?>">
	<br>
	comment : <input type="text" name="comment" value="<?php echo $comment;?>">
    <br>
	<button type="submit">Хадгалах</button>
</form>
<br>
<a href="viewing.php">Буцах</a>