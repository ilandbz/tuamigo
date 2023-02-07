SELECT * FROM vistasolicitdesembolsados WHERE codigo = 13001081


SELECT COUNT(*) AS `numrows` FROM `vistasolicitdesembolsados`

SELECT * FROM reportegeneral WHERE estado = 'APROBADO' AND idasesor = 'JRAMOS'
SELECT SUM(saldocapital) FROM reportegeneral WHERE estado = 'APROBADO' AND idasesor = 'JRAMOS'

SELECT SUM(saldocapital) FROM reportegeneral WHERE estado = 'APROBADO' AND idasesor = 'DLARA10'




SELECT SUM(saldocapital) AS saldocapital, COUNT(idsolicitud) AS solicitudes 
FROM reportegeneral WHERE estado = 'APROBADO' AND idasesor = 'DLARA10'


SELECT SUM(saldocapital) AS saldocapital, COUNT(idsolicitud) AS solicitudes 
FROM reportegeneral WHERE estado = 'APROBADO' AND idasesor = 'JENSASE'




desembolsos desde el primero de cada mes

SELECT * FROM vistasolicitdesembolsados WHERE idasesor = 'DLARA10' AND fecha_hora > '2020-10-01 00:00:00'
SELECT SUM(monto) FROM vistasolicitdesembolsados WHERE idasesor = 'DLARA10' AND fecha_hora > '2020-10-01 00:00:00'
SELECT SUM(monto) FROM vistasolicitdesembolsados WHERE idasesor = 'JENSASE' AND fecha_hora > '2020-10-01 00:00:00'


clientes nuevos


SELECT * FROM vistasolicitdesembolsados WHERE idasesor = 'DLARA10' AND fecha_hora > '2020-10-01 00:00:00' AND tipo='NUEVO'
SELECT * FROM vistasolicitdesembolsados WHERE idasesor = 'JENSASE' AND fecha_hora > '2020-10-01 00:00:00' AND tipo='NUEVO'
SELECT COUNT(idsolicitud) FROM vistasolicitdesembolsados WHERE idasesor = 'JENSASE' AND fecha_hora > '2020-10-01 00:00:00' AND tipo='NUEVO'

mora

SELECT * FROM vistasolicitdesembolsados WHERE idasesor = 'DLARA10' AND moradias >8

SELECT * FROM vistasolicitdesembolsados WHERE idasesor = 'JENSASE' AND estado = 'APROBADO' AND (moradias-pagomora) >=8
SELECT SUM(saldo) FROM vistasolicitdesembolsados WHERE idasesor = 'JENSASE' AND estado = 'APROBADO' AND (moradias-pagomora) >=8









