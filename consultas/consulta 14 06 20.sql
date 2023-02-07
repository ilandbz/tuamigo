SELECT * FROM vistacuentaahorros
SELECT SUM(saldo) FROM vistasolicitdesembolsados 
WHERE estado = 'APROBADO' AND agencia = 'HUANUCO'

SELECT SUM(saldo) FROM vistasolicitdesembolsados 
WHERE agencia = 'HUANUCO'

SELECT * AS interes FROM vistasolicitdesembolsados WHERE estado='FINALIZADO' AND saldo>0



SELECT *, (total-monto) AS interesgral FROM vistasolicitdesembolsados WHERE fuenterecursos = 'RECAUDADO'

UPDATE solicitud SET fuenterecursos = 'RECAUDADO' WHERE idsolicitud IN (SELECT idsolicitud FROM vistasolicitdesembolsados WHERE interes IN (5,6,7))


