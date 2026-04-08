CREATE DATABASE gimnasio;

USE gimnasio;

CREATE TABLE miembros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    edad INT,
    peso DECIMAL(5,2),
    tipo_membresia VARCHAR(50),
    estado VARCHAR(50)
);