<?php 
    // api
    $server = "localhost";
    $login = "root";
    $password = "";
    $dbName = "peret";

    try{
	$db_connect = new PDO("mysql:host=$server;db=$dbName",$login,$password);
	echo "connected";
	}catch(PDOExecption $e){
		echo $e->getMessage();	
	}


    $json = file_get_contents("php://input");
    $obj = json_decode($json,true);

    $name = $obj['name'];
    $email = $obj['email'];
    $tel = $obj['tel'];
    $pass = $obj['password'];

    $sql = "INSERT INTO inscription(name,email,tel,passwordU) VALUES ('$name','$email','$tel','$pass')";

    $result = $db_connect->prepare($sql);
    $result->execute();

    

?>