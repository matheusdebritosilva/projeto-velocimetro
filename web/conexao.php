<?php
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "velocimetro";

$conn= mysqli_connect($servername, $username,  $password, $dbname);

if(!$conn){
    die("error" . mysqli_connect_error());
} else {
    echo "Connect successfuly";
}

$KM= $_POST['velocidade'] ?? '';
$RPM= $_POST['rpm'] ?? '';



$sql= "INSERT into dados (KM, RPM) values ('$KM', '$RPM')";

if($conn->query($sql) === TRUE){
    echo "New Record created successfuly";
} else {
    echo "Error" . $sql . "<br>" . $conn->error;
}

$conn->close();
?>