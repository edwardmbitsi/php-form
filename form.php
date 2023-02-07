<?php
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $relation = $_POST['relation'];
        $other = $_POST['other'];
        

    // database details
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "exceptio_test";

   // Database connection
	$conn = new mysqli($host,$username,$password,$dbname);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, surname, email, number, relation, other) values(?, ?, ?, ?, ?,?)");
		$stmt->bind_param("sssiss", $name, $surname, $email, $number, $relation, $other);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

?>
