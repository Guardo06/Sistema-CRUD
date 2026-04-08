CREATE DATABASE gimnasio;

USE gimnasio;

CREATE TABLE clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    usuario VARCHAR(100),
    telefono VARCHAR(20),
    email VARCHAR(100),
    fecha_registro DATE
);