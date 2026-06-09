<?php
include 'conexao.php';


$KM= $_POST['velocidade'] ?? '';
$RPM= $_POST['rpm'] ?? '';


$sql = "INSERT into dados (KM, RPM) values ('$KM', '$RPM')";


if($conn ->query($sql) === TRUE){
    echo "New Record created successfuly";

} else{
    echo "Erro" . $sql . "<br>" . $conn->error;
} 

$conn->close();
?>
