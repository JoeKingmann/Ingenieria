-- Active: 1684786649544@@127.0.0.1@3307@ing

CREATE TABLE
    Usuario (
        Rut INT NOT NULL PRIMARY KEY,
        Nombre CHAR(50) NOT NULL,
        Mail CHAR(30) NOT NULL,
        Sueldo INT NOT NULL,
        Horarios CHAR(100) NOT NULL,
        Permisos CHAR(20) NOT NULL,
        Password CHAR(20) NOT NULL
    );

Drop table Usuario;

CREATE TABLE
    JefeTrabajador (
        id_solicitud int NOT NULL PRIMARY KEY,
        Rut_aprobante int NOT NULL,
        Aprobación char(20) NOT NULL,
        Rut_solicitante int NOT NULL,
        Fecha date NOT NULL,
        FOREIGN KEY (Rut_aprobante) REFERENCES Usuario(Rut),
        FOREIGN KEY (Rut_solicitante) REFERENCES Usuario(Rut)
    );

CREATE TABLE
    Solicitudes (
        id_solicitud int NOT NULL PRIMARY KEY,
        Rut_aprobante int NOT NULL,
        Aprobación char(20) NOT NULL,
        Rut_solicitante int NOT NULL,
        Fecha date NOT NULL,
        FOREIGN KEY (Rut_aprobante) REFERENCES Usuario(Rut),
        FOREIGN KEY (Rut_solicitante) REFERENCES Usuario(Rut)
    );

DROP TABLE `Solicitudes`;

CREATE TABLE
    Liquidaciones (
        id_liquidaciones int NOT NULL PRIMARY KEY,
        Rut int NOT NULL,
        monto int NOT NULL,
        Fecha date NOT NULL,
        FOREIGN KEY (Rut) REFERENCES Usuario(Rut)
    );

DROP TABLE `Liquidaciones`;

CREATE TABLE
    Licencias (
        id_licencia int NOT NULL PRIMARY KEY,
        Periodo char(20) NOT NULL,
        Rut_aprobante int NOT NULL,
        Motivo char(50) NOT NULL,
        FOREIGN KEY (Rut_aprobante) REFERENCES Usuario(Rut)
    );

drop table `Licencias`;

INSERT INTO
    Usuario (
        Rut,
        Nombre,
        Mail,
        Sueldo,
        Horarios,
        Permisos,
        Password
    )
VALUES (
        12345678,
        'Juan Pérez',
        'juan@example.com',
        2500,
        'Lunes a Viernes de 9AM a 6PM',
        'Admin',
        'pass123'
    ), (
        87654321,
        'María Gómez',
        'maria@example.com',
        3000,
        'Lunes a Viernes de 8AM a 5PM',
        'Usuario',
        'pass456'
    ), (
        23456789,
        'Luis Rodríguez',
        'luis@example.com',
        2800,
        'Lunes a Jueves de 10AM a 7PM',
        'Usuario',
        'pass789'
    ), (
        98765432,
        'Ana Sánchez',
        'ana@example.com',
        3200,
        'Lunes a Viernes de 9AM a 6PM',
        'Admin',
        'passabc'
    ), (
        34567890,
        'Pedro López',
        'pedro@example.com',
        2700,
        'Lunes a Jueves de 8AM a 5PM',
        'Usuario',
        'passdef'
    ), (
        67890123,
        'Laura Torres',
        'laura@example.com',
        2900,
        'Lunes a Viernes de 10AM a 7PM',
        'Usuario',
        'passghi'
    ), (
        45678901,
        'Carlos Ramírez',
        'carlos@example.com',
        3100,
        'Lunes a Jueves de 9AM a 6PM',
        'Admin',
        'passjkl'
    ), (
        78901234,
        'Sofía Martínez',
        'sofia@example.com',
        3000,
        'Lunes a Viernes de 8AM a 5PM',
        'Usuario',
        'passmno'
    ), (
        56789012,
        'Jorge Castro',
        'jorge@example.com',
        2600,
        'Lunes a Jueves de 10AM a 7PM',
        'Usuario',
        'passpqr'
    ), (
        90123456,
        'Lucía Herrera',
        'lucia@example.com',
        3300,
        'Lunes a Viernes de 9AM a 6PM',
        'Admin',
        'passstu'
    );

INSERT INTO
    Usuario (
        Rut,
        Nombre,
        Mail,
        Sueldo,
        Horarios,
        Permisos,
        Password
    )
VALUES (
        1,
        'Alfa y Omega',
        'alfa@jefe.com',
        1000000000,
        'Soy el jefe puto',
        'Admin',
        '1'
    ), (
        0,
        'Humilde trabajador',
        'triste@obrero.com',
        3000,
        'Lunes a Domingo de 6AM a 9PM',
        'Usuario',
        '0'
    ), (
        2,
        'Contador experto',
        'counter@iva.com',
        5600,
        'Lunes a Jueves de 10AM a 7PM',
        'Contador',
        '2'
    ), (
        3,
        'Tu jefecito',
        'jefe@area.com',
        3200,
        'Lunes a Viernes de 9AM a 6PM',
        'JefeArea',
        '3'
    ), (
        4,
        'Yo manejo todo',
        'verdadero@admin.com',
        7800,
        'Lunes a Sábado de 11AM a 2PM',
        'BackOffice',
        '4'
    );

INSERT INTO
    Usuario (
        Rut,
        Nombre,
        Mail,
        Sueldo,
        Horarios,
        Permisos,
        Password
    )
VALUES (
        4,
        'Yo manejo todo',
        'verdadero@admin.com',
        7800,
        'Lunes a Sábado de 11AM a 2PM',
        'BackOffice',
        '4'
    );

INSERT INTO
    Usuario (
        Rut,
        Nombre,
        Mail,
        Sueldo,
        Horarios,
        Permisos,
        Password
    )
SELECT
    FLOOR(RAND() * (99999999 -10000000 + 1)) + 10000000,
    CONCAT(
        'Usuario',
        FLOOR(RAND() * (9999 -1000 + 1)) + 1000
    ),
    CONCAT(
        'usuario',
        FLOOR(RAND() * (9999 -1000 + 1)) + 1000,
        '@example.com'
    ),
    FLOOR(RAND() * (5000 -2000 + 1)) + 2000,
    'Lunes a Viernes de 9AM a 6PM',
    CASE
        WHEN RAND() < 0.9 THEN 'Usuario'
        ELSE 'JefeArea'
    END,
    CONCAT(
        'pass',
        FLOOR(RAND() * (999 -100 + 1)) + 100
    )
FROM Usuario
LIMIT 100;

UPDATE Usuario SET Nombre = 'Usu' WHERE Rut = 0;