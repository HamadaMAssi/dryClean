<?php

$servername="localhost";
$username="root";
$password="";
$dbname="dryclean";

function test_input($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}else{
	
	$ClientName=test_input($_POST['fname']);
$ClientAdress=test_input($_POST['adress']);
$ClientPhone=test_input($_POST['phone']);
$Type=test_input($_POST['payload']);
$NumberPieces=test_input($_POST['number-of-pieces']);
$Date=test_input($_POST['datemin']);
$Time=test_input($_POST['time']);

	$sql="INSERT INTO orders(client_name, client_adress, client_phone, type, number_pieces, date, time) 
	VALUES ($ClientName, $ClientAdress, $ClientPhone, $Type, $NumberPieces, $Date, $Time)";
	
	if($conn->query($sql)==TRUE){
		echo "New record created successfully";
	}else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
}


// close MySQL Object-Oriented
$conn->close();
?>

