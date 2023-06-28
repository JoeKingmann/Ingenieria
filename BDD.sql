DROP TABLE JefeTrabajador;
DROP TABLE Solicitudes;
DROP TABLE Liquidaciones;
DROP TABLE Licencias;
DROP TABLE Usuario;

CREATE TABLE
    Usuario (
        Rut INT NOT NULL PRIMARY KEY,
        Nombre CHAR(50) NOT NULL,
        Mail CHAR(30) NOT NULL,
        Sueldo INT NOT NULL,
        Horarios CHAR(100) NOT NULL,
        Permisos CHAR(20) NOT NULL,
        Password CHAR(20) NOT NULL,
        rut_superior INT
    );


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


CREATE TABLE
    Liquidaciones (
        id_liquidaciones int NOT NULL PRIMARY KEY,
        Rut int NOT NULL,
        monto int NOT NULL,
        Fecha date NOT NULL,
        FOREIGN KEY (Rut) REFERENCES Usuario(Rut)
    );


CREATE TABLE
    Licencias (
        id_licencia int NOT NULL PRIMARY KEY,
        Periodo char(20) NOT NULL,
        Rut_aprobante int NOT NULL,
        Motivo char(50) NOT NULL,
        FOREIGN KEY (Rut_aprobante) REFERENCES Usuario(Rut)
    );
    
INSERT INTO Usuario (Rut, Nombre, Mail, Sueldo, Horarios, Permisos, Password, rut_superior) VALUES
(4, 'Yo manejo todo', 'verdadero@admin.com', 7800, 'Lunes a Sábado de 11AM a 2PM', 'BackOffice', '4',''),
(1, 'Alfa y Omega', 'alfa@jefe.com', 1000000000, 'Soy el jefe puto', 'Admin', '1', '4'),
(0, 'Humilde trabajador', 'triste@obrero.com', 3000, 'Lunes a Domingo de 6AM a 9PM', 'Usuario', '0','4'),
(2, 'Contador experto', 'counter@iva.com', 5600, 'Lunes a Jueves de 10AM a 7PM', 'Contador', '2','4'),
(3, 'Tu jefecito', 'jefe@area.com', 3200, 'Lunes a Viernes de 9AM a 6PM', 'JefeArea', '3','4');

