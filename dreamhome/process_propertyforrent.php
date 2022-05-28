<?php
	$servername = "localhost"; // сервер комьютерийн хаяг буюу нэр
	$username = "root";     // MySQL-ийн бааз руу хандах хэрэглэгчийн нэр
	$password = ""; // MySQL-ийн бааз руу хандах нууц үг
	$database = "dreamhome"; // Баазын нэр

	// Өгөгдлийн сантай холбох объект үүсгэх
	$conn = new mysqli($servername, $username, $password, $database);

	// Ямар үйлдэл хийх гэж байгааг GET хүсэлтээр хүлээж авна
	$action = isset($_GET['action']) ? $_GET['action'] : '';
	
	// Хүснэгтийн primarykey-г id-аар дамжуулна
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	
	if($action == "propertyforrentadd"){
		if($id == ''){
			$qry = "
				insert into propertyforrent(propertyNo, street, city, postcode, type, rooms, rent, ownerNo, staffNo, branchNo)
                values ('{$_POST['propertyNo']}', '{$_POST['street']}', '{$_POST['city']}', '{$_POST['postcode']}', 
                '{$_POST['type']}','{$_POST['rooms']}','{$_POST['rent']}','{$_POST['ownerNo']}', 
                '{$_POST['staffNo']}','{$_POST['branchNo']}')
				";
		}else{
			$qry = "
				update propertyforrent set
				propertyNo = '{$_POST['propertyNo']}',
				street = '{$_POST['street']}',
				city = '{$_POST['city']}',
                postcode = '{$_POST['postcode']}',
                type = '{$_POST['type']}',
                rooms = '{$_POST['rooms']}',
                rent = '{$_POST['rent']}',
                ownerNo = '{$_POST['ownerNo']}',
                staffNo = '{$_POST['staffNo']}',
                branchNo = '{$_POST['branchNo']}'
				where propertyNo = '{$id}'
			";
		}
		if ($conn->query($qry) === true) {
			header('location: propertyforrent.php');
		}else{
			echo $conn->error;
		}
	}
	if($action == "propertyforrentdel"){
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		$qry = "delete from propertyforrent where propertyNo = '{$id}'";
		if ($conn->query($qry) === true) {
			header('location: propertyforrent.php');
		}else{
			echo $conn->error;
		}
	}
	
?>