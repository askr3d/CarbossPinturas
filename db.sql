CREATE TABLE productos (
            id_producto INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(30) UNIQUE,
            descripcion VARCHAR(50),
            precio DECIMAL(10,2) NOT NULL,
            existencia INT NOT NULL
        );
