CREATE DATABASE ventapos;
USE ventapos;

CREATE TABLE categoria(
c_id INT NOT NULL AUTO_INCREMENT,
c_categoria VARCHAR (255) NOT NULL,
PRIMARY KEY (c_id)
);

CREATE TABLE producto(
p_id BIGINT NOT NULL AUTO_INCREMENT,
p_codigo VARCHAR (100) NOT NULL,
p_categoriaFK INT NOT NULL,
p_nombre VARCHAR (255) NOT NULL,
p_descripcion TEXT NOT NULL,
p_precio INT NOT NULL,
p_cantidad INT NOT NULL,
p_imagen VARCHAR (500) NOT NULL,
FOREIGN KEY (p_categoriaFK) REFERENCES categoria (c_id),
PRIMARY KEY (p_id)
);

CREATE TABLE cliente(
c_id BIGINT NOT NULL AUTO_INCREMENT,
c_identificacion BIGINT NOT NULL,
c_nombres VARCHAR (255) NOT NULL,
c_apellidos VARCHAR (255) NOT NULL,
c_celular INT NOT NULL,
c_correo VARCHAR (255) NOT NULL,
c_contrasena VARCHAR (255) NOT NULL,
c_rol INT NOT NULL, -- ADMINIS y CLIEN
PRIMARY KEY (c_id)
);

INSERT INTO cliente (c_id, c_identificacion, c_nombres, c_apellidos, c_celular, c_correo, c_contrasena, c_rol) VALUES
(1, 123456789, 'TIENDA', 'ELECTROMEZA', '123456789', 'electromeza@gmail.com', '12345', 1);

CREATE TABLE venta(
v_id BIGINT NOT NULL AUTO_INCREMENT,
v_clienteFK BIGINT NOT NULL,
v_productoFK BIGINT NOT NULL,
v_cantidad INT NOT NULL,
v_precio INT NOT NULL,
v_total INT NOT NULL,
v_estado INT NOT NULL,
v_factura VARCHAR (255) NOT NULL,
v_fecha DATE NOT NULL,
v_hora TIME NOT NUlL,
FOREIGN KEY (v_clienteFK) REFERENCES cliente (c_id),
FOREIGN KEY (v_productoFK) REFERENCES producto (p_id),
PRIMARY KEY (v_id)
)
