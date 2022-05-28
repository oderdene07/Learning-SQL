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
	
	if($action == "staffadd"){
		if($id == ''){
			$qry = "
				insert into staff(staffNo, fName, lName, position, sex, DOB, salary, branchNo)
				values ('{$_POST['staffNo']}', '{$_POST['fName']}', '{$_POST['lName']}', 
				'{$_POST['position']}', '{$_POST['sex']}', '{$_POST['DOB']}', '{$_POST['salary']}', 
				'{$_POST['branchNo']}')
				";
		}else{
			$qry = "
				update staff set
				staffNo = '{$_POST['staffNo']}',
				fName = '{$_POST['fName']}',
				lName = '{$_POST['lName']}',
				position = '{$_POST['position']}',
				sex = '{$_POST['sex']}',
				DOB = '{$_POST['DOB']}',
				salary = '{$_POST['salary']}',
				branchNo = '{$_POST['branchNo']}'
				where staffNo = '{$id}'
			";
		}
		if ($conn->query($qry) === true) {
			header('location: staff.php');
		}else{
			echo $conn->error;
		}
	}
	if($action == "staffdel"){
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		$qry = "delete from staff where staffNo = '{$id}'";
		if ($conn->query($qry) === true) {
			header('location: staff.php');
		}else{
			echo $conn->error;
		}
	}
	
?>