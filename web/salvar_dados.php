<?php
header("Content-Type: text/plain; charset=utf-8");

require_once "conexao.php";

$velocidade = $_POST["velocidade"] ?? null;
$rpm = $_POST["rpm"] ?? null;

if ($velocidade === null || $rpm === null) {
    http_response_code(400);
    echo "Erro: envie velocidade e rpm.";
    $conn->close();
    exit;
}

if (!is_numeric($velocidade) || !is_numeric($rpm)) {
    http_response_code(400);
    echo "Erro: velocidade e rpm precisam ser numeros.";
    $conn->close();
    exit;
}

$stmt = $conn->prepare("INSERT INTO dados_telemetria (velocidade, rpm) VALUES (?, ?)");
$stmt->bind_param("dd", $velocidade, $rpm);

if ($stmt->execute()) {
    echo "Dados salvos com sucesso.";
} else {
    http_response_code(500);
    echo "Erro ao salvar dados: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
