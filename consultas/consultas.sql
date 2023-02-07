UPDATE usuario SET clave=SUBSTR(SHA1('123456'),1,21) WHERE codusuario='KESPIRITU'


SELECT vistasolicitdesembolsados.iddesembolso, vistasolicitdesembolsados.idsolicitud AS idsolicitud, vistasolicitdesembolsados.direccion_dom AS direccion_dom, 
vistasolicitdesembolsados.dni AS dni, vistasolicitdesembolsados.apenom AS apenom,  vistasolicitdesembolsados.plazo AS cantplazo, 
vistasolicitdesembolsados.estado AS estado, vistasolicitdesembolsados.unidplazo AS unidplazo, vistasolicitdesembolsados.interes AS tasa, 
vistasolicitdesembolsados.monto AS capital,vistasolicitdesembolsados.total, k.totalpagado, p.moradias AS mora, 
(SELECT SUM(pagomora.diasmora) FROM pagomora WHERE ((pagomora.iddesembolso = vistasolicitdesembolsados.iddesembolso) AND (pagomora.estado = 'SI'))) AS pagomora, 
vistasolicitdesembolsados.total-vistasolicitdesembolsados.monto AS interes, (vistasolicitdesembolsados.monto / vistasolicitdesembolsados.plazo) AS cuotacapital, 
(vistasolicitdesembolsados.total / vistasolicitdesembolsados.plazo) AS cuotareal,
((vistasolicitdesembolsados.total - vistasolicitdesembolsados.monto) / vistasolicitdesembolsados.plazo) AS cuotainteres, 
(k.totalpagado / (vistasolicitdesembolsados.total / vistasolicitdesembolsados.plazo)) AS cantcuotaspagados, 
((vistasolicitdesembolsados.monto / vistasolicitdesembolsados.plazo) * (k.totalpagado / (vistasolicitdesembolsados.total / vistasolicitdesembolsados.plazo))) AS capitalpagado, 
(((vistasolicitdesembolsados.total - vistasolicitdesembolsados.monto) / vistasolicitdesembolsados.plazo) * (k.totalpagado / (vistasolicitdesembolsados.total / vistasolicitdesembolsados.plazo))) AS interespagado, 
(vistasolicitdesembolsados.monto - COALESCE(((vistasolicitdesembolsados.monto / vistasolicitdesembolsados.plazo) * (k.totalpagado / (vistasolicitdesembolsados.total / vistasolicitdesembolsados.plazo))),0)) AS saldocapital, 
((vistasolicitdesembolsados.total - vistasolicitdesembolsados.monto) - COALESCE((((vistasolicitdesembolsados.total - vistasolicitdesembolsados.monto) / vistasolicitdesembolsados.plazo) * (k.totalpagado / (vistasolicitdesembolsados.total / vistasolicitdesembolsados.plazo))),0)) AS saldointeres, 
(SELECT mora.costodiario FROM mora WHERE ((mora.montoinicial <= vistasolicitdesembolsados.monto) AND (mora.montofinal >= vistasolicitdesembolsados.monto)) LIMIT 1) AS costomora,  
vistasolicitdesembolsados.fecha_hora AS fecha_hora, vistasolicitdesembolsados.idasesor AS idasesor 
FROM vistasolicitdesembolsados 
LEFT JOIN 
(SELECT iddesembolso, SUM(moradias) moradias FROM pago  WHERE pago.fecha_reg >= '2019-05-01 00:00:00' AND pago.fecha_reg<='2019-05-31 23:59:59' GROUP BY iddesembolso) AS p 
ON vistasolicitdesembolsados.iddesembolso=p.iddesembolso 
JOIN 
(SELECT kardex.iddesembolso, SUM(kardex.montopagado) totalpagado FROM kardex WHERE kardex.fecha_hora_reg >= '2019-05-01 00:00:00' AND kardex.fecha_hora_reg<='2019-05-31 23:59:59' GROUP BY kardex.iddesembolso) AS k 
ON 
vistasolicitdesembolsados.iddesembolso=k.iddesembolso 
WHERE vistasolicitdesembolsados.estado LIKE '%' AND vistasolicitdesembolsados.idasesor LIKE '%' 
ORDER BY vistasolicitdesembolsados.apenom ASC


SELECT iddesembolso, SUM(moradias) moradias FROM pago  WHERE iddesembolso='Sa003016'
SELECT SUM(pagomora.diasmora) FROM pagomora WHERE ((pagomora.iddesembolso = 'Sa003016') AND (pagomora.estado = 'SI'))


SELECT SUM(total) FROM pagomora WHERE fechahora_reg >= '2019-05-01 00:00:00' AND fechahora_reg<='2019-05-31 23:59:59'
SELECT * FROM pagomora WHERE fechahora_reg >= '2019-05-01 00:00:00' AND fechahora_reg<='2019-05-31 23:59:59'
SELECT SUM(pagomora.diasmora) FROM pagomora WHERE ((pagomora.iddesembolso = 'Mo003207') AND (pagomora.estado = 'SI'))


SELECT * FROM vistasolicitdesembolsados WHERE iddesembolso='Mo003207'

SELECT * FROM vistasolicitdesembolsados WHERE vistasolicitdesembolsados.estado LIKE '%' AND vistasolicitdesembolsados.idasesor LIKE '%' AND iddesembolso = 'Mo003162'



/*CONSULTA PARA MOSTRAR INGRESOS POR PAGOS TOTAL */
SELECT * FROM pago WHERE fecha_reg >= '2019-05-01' AND fecha_reg<='2019-05-31'
SELECT SUM(montopagado) FROM pago WHERE fecha_reg >= '2019-05-01' AND fecha_reg<='2019-05-31'
SELECT * FROM kardex WHERE fecha_hora_reg >= '2019-05-01 00:00:00' AND fecha_hora_reg<='2019-05-31 23:59:59'
SELECT SUM(montopagado) FROM kardex WHERE fecha_hora_reg >= '2019-05-01 00:00:00' AND fecha_hora_reg<='2019-05-31 23:59:59'
SELECT iddesembolso,SUM(montopagado) FROM kardex WHERE fecha_hora_reg >= '2019-05-01 00:00:00' AND fecha_hora_reg<='2019-05-31 23:59:59'
GROUP BY iddesembolso


/*consulta para mostrar mora total*/

SELECT kardex.iddesembolso,SUM(montopagado), vistasolicitdesembolsados.apenom, p.moradias,
(SELECT mora.costodiario FROM mora WHERE ((mora.montoinicial <= vistasolicitdesembolsados.monto) AND (mora.montofinal >= vistasolicitdesembolsados.monto)) LIMIT 1) AS costomora FROM kardex 
JOIN vistasolicitdesembolsados ON kardex.`iddesembolso`=vistasolicitdesembolsados.`iddesembolso`
LEFT JOIN (SELECT iddesembolso, SUM(moradias) AS moradias FROM pago WHERE fecha_reg >= '2019-05-01' AND fecha_reg<='2019-05-31' GROUP BY iddesembolso) p ON kardex.`iddesembolso`=p.iddesembolso
WHERE fecha_hora_reg >= '2019-05-01 00:00:00' AND fecha_hora_reg<='2019-05-31 23:59:59'
GROUP BY kardex.iddesembolso


SELECT iddesembolso, SUM(montopagado) FROM kardex WHERE fecha_hora_reg >= '2019-05-01 00:00:00' AND fecha_hora_reg<='2019-05-31 23:59:59' GROUP BY iddesembolso 
SELECT iddesembolso, SUM(moradias) FROM pago WHERE fecha_hora_reg >= '2019-05-01 00:00:00' AND fecha_hora_reg<='2019-05-31 23:59:59' GROUP BY iddesembolso 

SELECT pago.iddesembolso, SUM(pago.moradias), vistasolicitdesembolsados.`apenom`, vistasolicitdesembolsados.`moradias`, vistasolicitdesembolsados.`monto` FROM pago RIGHT JOIN vistasolicitdesembolsados ON pago.`iddesembolso`= vistasolicitdesembolsados.`iddesembolso`
WHERE pago.fecha_reg >= '2019-05-01' AND pago.fecha_reg<='2019-05-31' GROUP BY iddesembolso
SELECT * FROM vistapagos WHERE fecha_prog >= '2019-05-01' AND fecha_prog<='2019-05-31'


SELECT iddesembolso, SUM(moradias) FROM vistapagos 
WHERE fecha_prog >= '2019-05-01' AND fecha_prog<='2019-05-31' AND fechapagado >= '2019-05-01 00:00:00' AND fechapagado<='2019-05-31 23:59:59'
GROUP BY iddesembolso

SELECT vistapagos.iddesembolso, SUM(vistapagos.moradias) FROM vistapagos 
RIGHT JOIN kardex ON vistapagos.`iddesembolso`=kardex.`iddesembolso`
WHERE vistapagos.fecha_prog >= '2019-05-01' AND vistapagos.fecha_prog<='2019-05-31'
AND kardex.fecha_hora_reg >= '2019-05-01 00:00:00' AND kardex.fecha_hora_reg<='2019-05-31 23:59:59'
GROUP BY vistapagos.iddesembolso

SELECT kardex.iddesembolso, SUM(kardex.montopagado), SUM(vistapagos.moradias) FROM kardex 
JOIN vistapagos ON kardex.`iddesembolso`=vistapagos.`iddesembolso`
WHERE kardex.fecha_hora_reg >= '2019-05-01 00:00:00' AND kardex.fecha_hora_reg<='2019-05-31 23:59:59' 
GROUP BY kardex.iddesembolso 

SELECT kardex.iddesembolso, SUM(kardex.montopagado) FROM kardex 
WHERE kardex.fecha_hora_reg >= '2019-05-01 00:00:00' AND kardex.fecha_hora_reg<='2019-05-31 23:59:59' 
GROUP BY kardex.iddesembolso ;


SELECT iddesembolso, SUM(vistapagos.moradias) FROM vistapagos 
WHERE vistapagos.fecha_prog >= '2019-05-01' AND vistapagos.fecha_prog<='2019-05-31'
GROUP BY vistapagos.`iddesembolso`;

SELECT * FROM vistapagos WHERE iddesembolso = 'Tu003694' AND fecha_prog <='2019-06-08 23:59:59'
ORDER BY nrocuota DESC
LIMIT 1		
SELECT * FROM pago WHERE iddesembolso='Fr003071'
93.9

SELECT * FROM vistapagos WHERE iddesembolso = 'Tu003694'
SELECT * FROM solicitud WHERE idsolicitud='003443'
SELECT * FROM desembolso WHERE idsolicitud='003443'

SELECT * FROM pagomora WHERE iddesembolso='Tu003443'
SELECT * FROM caja WHERE fecha_hora LIKE '2019-06-08%'

SELECT * FROM vistapagos WHERE iddesembolso='A4120911' ORDER BY nrocuota DESC


SELECT * FROM pagomora WHERE iddesembolso='N3060912'



--------------------------------14 08 19--------------------------



DELIMITER $$

USE `tuamigo_db`$$

DROP VIEW IF EXISTS `vistasolicitdesembolsados`$$

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistasolicitdesembolsados` AS 
SELECT
  `vistasolicitud`.`idsolicitud`          AS `idsolicitud`,
  `vistasolicitud`.`codcliente`           AS `codcliente`,
  `vistasolicitud`.`fecha`                AS `fecha`,
  `vistasolicitud`.`idasesor`             AS `idasesor`,
  `vistasolicitud`.`estado`               AS `estado`,
  `vistasolicitud`.`dni`                  AS `dni`,
  `vistasolicitud`.`apenom`               AS `apenom`,
  `vistasolicitud`.`apellidos`            AS `apellidos`,
  `vistasolicitud`.`apellidos2`           AS `apellidos2`,
  `vistasolicitud`.`nombres`              AS `nombres`,
  `vistasolicitud`.`tipo`                 AS `tipo`,
  `vistasolicitud`.`tipoplazo`            AS `tipoplazo`,
  `desembolso`.`iddesembolso`             AS `iddesembolso`,
  `desembolso`.`fecha_hora`               AS `fecha_hora`,
  `desembolso`.`monto`                    AS `monto`,
  `desembolso`.`interes`                  AS `interes`,
  `desembolso`.`plazo`                    AS `plazo`,
  `desembolso`.`unidplazo`                AS `unidplazo`,
  `desembolso`.`direccion_dom`            AS `direccion_dom`,
  `desembolso`.`direccion_neg`            AS `direccion_neg`,
  `desembolso`.`total`                    AS `total`,
  `vistapagospordesembolso`.`totalpagado` AS `totalpagado`,
  (SELECT
     MAX(`pago`.`fecha_reg`)
   FROM `pago`
   WHERE (`pago`.`iddesembolso` = `desembolso`.`iddesembolso`)) AS `ultimafechapago`,
  (SELECT
     SUM(`pago`.`moradias`)
   FROM `pago`
   WHERE (`pago`.`iddesembolso` = `desembolso`.`iddesembolso`)) AS `moradias`,
  (SELECT
     IFNULL(SUM(`pagomora`.`diasmora`),0)
   FROM `pagomora`
   WHERE ((`pagomora`.`iddesembolso` = `desembolso`.`iddesembolso`)
          AND (`pagomora`.`estado` = 'SI'))) AS `pagomora`,
  ((SELECT SUM(`pago`.`moradias`) FROM `pago` WHERE (`pago`.`iddesembolso` = `desembolso`.`iddesembolso`)) / `desembolso`.`plazo`) AS `porc`
FROM ((`vistasolicitud`
    JOIN `desembolso`
      ON ((`vistasolicitud`.`idsolicitud` = `desembolso`.`idsolicitud`)))
   LEFT JOIN `vistapagospordesembolso`
     ON ((`desembolso`.`iddesembolso` = `vistapagospordesembolso`.`iddesembolso`)))$$

DELIMITER ;




