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
	
	if($action == "privateowneradd"){
		if($id == ''){
			$qry = "
				insert into privateowner(ownerNo, fName, lName, address, telNo)
                values ('{$_POST['ownerNo']}', '{$_POST['fName']}', '{$_POST['lName']}', 
                '{$_POST['address']}', '{$_POST['telNo']}' )
				";
		}else{
			$qry = "
				update privateowner set
				ownerNo = '{$_POST['ownerNo']}',
				fName = '{$_POST['fName']}',
                lName = '{$_POST['lName']}',
                address = '{$_POST['address']}',
				telNo = '{$_POST['telNo']}'
				where ownerNo = '{$id}'
			";
		}
		if ($conn->query($qry) === true) {
			header('location: privateowner.php');
		}else{
			echo $conn->error;
		}
	}
	if($action == "privateownerdel"){
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		$qry = "delete from privateowner where ownerNo = '{$id}'";
		if ($conn->query($qry) === true) {
			header('location: privateowner.php');
		}else{
			echo $conn->error;
		}
	}
	
?>