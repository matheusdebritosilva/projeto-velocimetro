<?php
header("Content-Type: application/json; charset=utf-8");

require_once "conexao.php";

$sql = "SELECT velocidade, rpm, id FROM dados_telemetria ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        "velocidade" => (float) $row["velocidade"],
        "rpm" => (float) $row["rpm"],
        "id" => (int) $row["id"]
    ]);
} else {
    echo json_encode([
        "velocidade" => 0,
        "rpm" => 0,
        "id" => null
    ]);
}

$conn->close();
?>
