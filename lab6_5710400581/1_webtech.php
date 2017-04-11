<?php
$servername = "localhost";
$username = "sirasith";
$password = "1234";
$dbname = "webtech";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `webtech`.`customers` (`customerID`, `citizenID`, `fname`, `lname`) VALUES ('57104005812', '5649649', 'Sirasith', 'K.')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>