<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "velocimetro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    http_response_code(500);
    die("Erro de conexao: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
