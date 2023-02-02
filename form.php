<?php
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $relation = $_POST['relation'];
        
    }

    // database details
    $host = "localhost";
    $username = "exceptio";
    $password = "Ln*-QLoyf5H808";
    $dbname = "testing";

   // Database connection
	$conn = new mysqli('localhost','root','','testing');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstname, surname, email, number, relation) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstname, $surname, $email, $number, $relation);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

?>
