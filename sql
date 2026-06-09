CREATE DATABASE IF NOT EXISTS velocimetro;
USE velocimetro;

CREATE TABLE IF NOT EXISTS dados_telemetria (
    id INT PRIMARY KEY AUTO_INCREMENT,
    velocidade DECIMAL(5, 2) NOT NULL,
    rpm INT NOT NULL,
    data_envio TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

SELECT * FROM dados_telemetria;
