<?php
header("Content-Type: application/json; charset=utf-8");

require_once "conexao.php";

$sql = "SELECT KM, RPM, ID FROM dados ORDER BY ID DESC LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        "KM" => (float) $row["KM"],
        "RPM" => (float) $row["RPM"],
        "ID" => (int) $row["ID"]
    ]);
} else {
    echo json_encode([
        "KM" => 0,
        "RPM" => 0,
        "ID" => null
    ]);
}

$conn->close();
?>
