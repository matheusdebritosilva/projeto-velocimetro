<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "velocimetro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["erro" => "Falha na conexão"]);
    exit();
}

// Busca estritamente o último registro inserido
$sql = "SELECT velocidade, rpm FROM dados_telemetria ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        "velocidade" => floatval($row["velocidade"]),
        "rpm" => floatval($row["rpm"])
    ]);
} else {
    // Caso o banco ainda esteja vazio
    echo json_encode([
        "velocidade" => 0,
        "rpm" => 0
    ]);
}

$conn->close();
?>