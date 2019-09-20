<?php

$servername="db";
$username="root";
$password="root";
$db="mydb";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$firstname=$_POST['firstname'];
$midname=$_POST['midname'];
$lastname=$_POST['lastname'];
$name = $firstname." ".$midname." ".$lastname;

$gender = $_POST['gender'];
if($gender =="male"){
    $gender = "male";
}
else{
    $gender = "female";
}

$lane = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$pcode = $_POST['postalcode'];
$address = $lane." ".$city." ".$state." ".$country." ".$pcode

$contact=$_POST['contact'];
$email=$_POST['email'];
$pass=$_POST['password'];



$sql = "INSERT INTO userdetails VALUES ('$name', '$gender', '$address', '$contact', '$email', '$pass');";

if ($conn->query($sql) === TRUE) {
    echo "<br><p align='center'>Sign Up Successfull!!! <a href='index.html'>Click here</a> to login</p><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>