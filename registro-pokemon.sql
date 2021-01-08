CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nombre VARCHAR(100) NOT NULL, 
    region VARCHAR(100) NOT NULL, 
    correo VARCHAR(100) NOT NULL, 
    contrasena VARCHAR(100) NOT NULL
);

CREATE TABLE pokemon(
    id INT AUTO_INCREMENT PRIMARY KEY,
    mote VARCHAR(100) NOT NULL,
    nivel INT NOT NULL,
    entrenador INT
);

ALTER TABLE pokemon
ADD FOREIGN KEY (entrenador) REFERENCES usuarios(id);