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
	
	if($action == "branchadd"){
		if($id == ''){
			$qry = "
				insert into branch(branchNo, street, city, postcode)
				values ('{$_POST['branchNo']}','{$_POST['street']}','{$_POST['city']}','{$_POST['postcode']}')
				";
		}else{
			$qry = "
				update branch set
				branchNo = '{$_POST['branchNo']}',
				street = '{$_POST['street']}',
				city = '{$_POST['city']}',
				postcode = '{$_POST['postcode']}'
				where branchNo = '{$id}'
			";
		}
		if ($conn->query($qry) === true) {
			header('location: branch.php');
		}else{
			echo $conn->error;
		}
	}
	if($action == "branchdel"){
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		$qry = "delete from branch where branchNo = '{$id}'";
		if ($conn->query($qry) === true) {
			header('location: branch.php');
		}else{
			echo $conn->error;
		}
	}
	
?>