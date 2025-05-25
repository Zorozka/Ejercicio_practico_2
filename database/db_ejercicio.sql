-- Crear tabla DEPARTAMENTOS
CREATE TABLE departamentos (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    ubicacion VARCHAR(150) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear tabla EMPLEADOS
CREATE TABLE empleados (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    dni VARCHAR(20) UNIQUE NOT NULL,
    departamento_id INTEGER NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_departamento
        FOREIGN KEY(departamento_id)
            REFERENCES departamentos(id)
            ON DELETE CASCADE


INSERT INTO departamentos (nombre, ubicacion) VALUES
('Recursos Humanos', 'Edificio A'),
('Tecnología', 'Edificio B'),
('Marketing', 'Edificio C'),
('Finanzas', 'Edificio D');


INSERT INTO empleados (nombre, email, dni, departamento_id) VALUES
('Laura Fernández', 'laura.fernandez@example.com', '12345678A', 1),
('Carlos Gómez', 'carlos.gomez@example.com', '23456789B', 2),
('María López', 'maria.lopez@example.com', '34567890C', 2),
('Pedro Sánchez', 'pedro.sanchez@example.com', '45678901D', 3),
('Ana Martínez', 'ana.martinez@example.com', '56789012E', 4);
