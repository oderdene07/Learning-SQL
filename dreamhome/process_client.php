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
	
	if($action == "clientadd"){
		if($id == ''){
			$qry = "
				insert into client(clientNo, fName, lName, telNo, prefType, maxRent)
                values ('{$_POST['clientNo']}', '{$_POST['fName']}', '{$_POST['lName']}', '{$_POST['telNo']}', 
                '{$_POST['prefType']}', '{$_POST['maxRent']}')
				";
		}else{
			$qry = "
				update client set
				clientNo = '{$_POST['clientNo']}',
				fName = '{$_POST['fName']}',
				lName = '{$_POST['lName']}',
				telNo = '{$_POST['telNo']}',
				prefType = '{$_POST['prefType']}',
				maxRent = '{$_POST['maxRent']}'
				where clientNo = '{$id}'
			";
		}
		if ($conn->query($qry) === true) {
			header('location: client.php');
		}else{
			echo $conn->error;
		}
	}
	if($action == "clientdel"){
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		$qry = "delete from client where clientNo = '{$id}'";
		if ($conn->query($qry) === true) {
			header('location: client.php');
		}else{
			echo $conn->error;
		}
	}
	
?>