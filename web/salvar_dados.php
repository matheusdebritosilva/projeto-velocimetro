<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "velocimetro_db";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se os dados corretos vieram via POST da ESP32
if (isset($_POST['velocidade']) && isset($_POST['rpm'])) {
    $vel = floatval($_POST['velocidade']);
    $rpm = floatval($_POST['rpm']);

    // Insere no banco de dados
    $stmt = $conn->prepare("INSERT INTO telemetria (velocidade, rpm) VALUES (?, ?)");
    $stmt->bind_param("dd", $vel, $rpm);
    
    if ($stmt->execute()) {
        echo "Dados salvos com sucesso!";
    } else {
        echo "Erro ao salvar: " . $conn->error;
    }
    $stmt->close();
} else {
    echo "Dados incompletos ou requisição inválida.";
}

$conn->close();
?>