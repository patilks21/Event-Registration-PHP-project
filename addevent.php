<?php

$servername="db";
$username="root";
$password="root";
$db="mydb";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$oname=$_POST['organisername'];
$eventname=$_POST['eventname'];
$date=$_POST['date'];

$lane = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$pcode = $_POST['postalcode'];
$address = $lane." ".$city." ".$state." ".$country." ".$pcode

$contact=$_POST['contact'];
$email=$_POST['email'];


$sql = "INSERT INTO eventdetails VALUES ('$oname', '$eventname', '$date', '$address', '$contact', '$email');";

if ($conn->query($sql) === TRUE) {
    echo "<br><p align='center'> ENTRY SUCCESSFULL !!! <a href='index.html'>Click here</a> to login</p><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>