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
	
	if($action == "registrationadd"){
		if($id == ''){
			$qry = "
				insert into registration(clientNo, branchNo, staffNo, dateJoined)
				values ('{$_POST['clientNo']}',	'{$_POST['branchNo']}',	'{$_POST['staffNo']}',	'{$_POST['dateJoined']}')
				";
		}else{
			$qry = "
				update registration set
				clientNo = '{$_POST['clientNo']}',
                branchNo = '{$_POST['branchNo']}',
                staffNo = '{$_POST['staffNo']}',
                dateJoined = '{$_POST['dateJoined']}'
				where clientNo = '{$id}'
			";
		}
		if ($conn->query($qry) === true) {
			header('location: registration.php');
		}else{
			echo $conn->error;
		}
	}
	if($action == "registrationdel"){
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		$qry = "delete from registration where clientNo = '{$id}'";
		if ($conn->query($qry) === true) {
			header('location: registration.php');
		}else{
			echo $conn->error;
		}
	}
	
?>