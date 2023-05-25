-- Active: 1684786649544@@127.0.0.1@3307@ing

CREATE TABLE Usuario (
  Rut INT NOT NULL PRIMARY KEY,
  Nombre CHAR(50) NOT NULL,
  Mail CHAR(30) NOT NULL,
  Sueldo INT NOT NULL,
  Horarios CHAR(100) NOT NULL,
  Permisos CHAR(20) NOT NULL,
  Password CHAR(20) NOT NULL
);
Drop table Usuario;

CREATE TABLE Solicitudes (
  id_solicitud int NOT NULL PRIMARY KEY,
  Rut_aprobante int NOT NULL,
  Aprobación char(20) NOT NULL,
  Rut_solicitante int NOT NULL,
  Fecha date NOT NULL,
  FOREIGN KEY (Rut_aprobante) REFERENCES Usuario(Rut),
  FOREIGN KEY (Rut_solicitante) REFERENCES Usuario(Rut)
);

DROP TABLE `Solicitudes`;

CREATE TABLE Liquidaciones (
  id_liquidaciones int NOT NULL PRIMARY KEY,
  Rut int NOT NULL,
  monto int NOT NULL,
  Fecha date NOT NULL,
  FOREIGN KEY (Rut) REFERENCES Usuario(Rut)
);
DROP TABLE `Liquidaciones`;

CREATE TABLE Licencias (
  id_licencia int NOT NULL PRIMARY KEY,
  Periodo char(20) NOT NULL,
  Rut_aprobante int NOT NULL,
  Motivo char(50) NOT NULL,
  FOREIGN KEY (Rut_aprobante) REFERENCES Usuario(Rut)
);

drop table `Licencias`;


INSERT INTO Usuario (Rut, Nombre, Mail, Sueldo, Horarios, Permisos, Password) VALUES
(12345678, 'Juan Pérez', 'juan@example.com', 2500, 'Lunes a Viernes de 9AM a 6PM', 'Admin', 'pass123'),
(87654321, 'María Gómez', 'maria@example.com', 3000, 'Lunes a Viernes de 8AM a 5PM', 'Usuario', 'pass456'),
(23456789, 'Luis Rodríguez', 'luis@example.com', 2800, 'Lunes a Jueves de 10AM a 7PM', 'Usuario', 'pass789'),
(98765432, 'Ana Sánchez', 'ana@example.com', 3200, 'Lunes a Viernes de 9AM a 6PM', 'Admin', 'passabc'),
(34567890, 'Pedro López', 'pedro@example.com', 2700, 'Lunes a Jueves de 8AM a 5PM', 'Usuario', 'passdef'),
(67890123, 'Laura Torres', 'laura@example.com', 2900, 'Lunes a Viernes de 10AM a 7PM', 'Usuario', 'passghi'),
(45678901, 'Carlos Ramírez', 'carlos@example.com', 3100, 'Lunes a Jueves de 9AM a 6PM', 'Admin', 'passjkl'),
(78901234, 'Sofía Martínez', 'sofia@example.com', 3000, 'Lunes a Viernes de 8AM a 5PM', 'Usuario', 'passmno'),
(56789012, 'Jorge Castro', 'jorge@example.com', 2600, 'Lunes a Jueves de 10AM a 7PM', 'Usuario', 'passpqr'),
(90123456, 'Lucía Herrera', 'lucia@example.com', 3300, 'Lunes a Viernes de 9AM a 6PM', 'Admin', 'passstu');