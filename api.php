<?php
	// echo 'Nurul Islam';
	header('content-type: application/json');
	$request = $_SERVER['REQUEST_METHOD'];

	switch ($request) {
		case 'GET':
			getMethod();
			break;
		case 'PUT':
			$data = json_decode(file_get_contents('php://input'),true);
			putMethod($data);
			break;
		case 'POST':
			$data = json_decode(file_get_contents('php://input'),true);
			postMethod($data);
			break;
		case 'DELETE':
			$data = json_decode(file_get_contents('php://input'),true);
			deleteMethod($data);
			break;
		
		default:
			# code...
			break;
	}

	function getMethod(){
		include  "db.php";
		$sql = "SELECT * FROM first_api";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) > 0 ) {
			$rows = array();
			while ($r = mysqli_fetch_assoc($result)) {
				$rows['result'][] = $r;
			}
			echo json_encode($rows);
		}
		else {
			echo "data not found!";
		}

	}
	function postMethod($data) {
		include  "db.php";
		$name = $data["name"];
		$email = $data["email"];

		$sql = "INSERT INTO first_api(name, email, created_at) VALUES ('$name', '$email', NOW())";
		if(mysqli_query($conn, $sql)){
			echo '{"result": "Data inserted!"}';
		}	
		else{
			echo '{"result": "Data inserted Faild!"}';
		}
	}
	function putMethod($data) {
		include  "db.php";
		$id = $data["id"];
		$name = $data["name"];
		$email = $data["email"];

		$sql = "UPDATE first_api SET name='$name', email='$email', created_at=NOW() WHERE id = '$id' ";
		if(mysqli_query($conn, $sql)){
			echo '{"result": "Data Updated!"}';
		}	
		else{
			echo '{"result": "Data update Faild!"}';
		}
	}

	function deleteMethod($data) {
		include  "db.php";
		$id = $data["id"];
		
		$sql = "DELETE FROM first_api WHERE id = '$id' ";
		if(mysqli_query($conn, $sql)){
			echo '{"result": "Data Delete Succsess!"}';
		}	
		else{
			echo '{"result": "Data Delete Faild!"}';
		}
	}
?>