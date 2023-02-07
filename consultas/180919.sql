SELECT SUM(pagomora) FROM vistasolicitdesembolsados

27066



SELECT * FROM vistapagos WHERE montopagado=cuota AND iddesembolso='Sa004651'
SELECT * FROM vistapagos WHERE iddesembolso='Sa004651'
SELECT MAX(fechapagado) FROM vistapagos WHERE montopagado=cuota AND iddesembolso='Sa004651'





SELECT * FROM vistasolicitdesembolsados WHERE iddesembolso='Sa004651'

SELECT MAX(fechapagado, IF(montopagado=cuota) FROM vistapagos WHERE montopagado=cuota AND iddesembolso=`desembolso`.`iddesembolso`

SELECT IF(montopagado=cuota, MAX(fechapagado), "NO");

SELECT iddesembolso,MAX(fechapagado), MAX(IF(resta>0, NULL, fechapagado)) AS fechapagadocompleto FROM vistapagos
GROUP BY iddesembolso












SELECT * FROM vistapagospordesembolso

  (SELECT MAX(fechapagado) FROM vistapagos WHERE montopagado=cuota AND iddesembolso=`desembolso`.`iddesembolso`) AS fechapagadocompleto,








DELIMITER $$

USE `tuamigo_db`$$

DROP VIEW IF EXISTS `vistapagospordesembolso`$$

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistapagospordesembolso` AS 
SELECT
  `vistapagos`.`iddesembolso` AS `iddesembolso`,
  `desembolso`.`idsolicitud`  AS `idsolicitud`,
  `desembolso`.`total`        AS `total`,
  SUM(`vistapagos`.`montopagado`) AS `totalpagado`,
  MAX(`vistapagos`.`fechapagado`) AS `ultimafechapago`,
MAX(IF(resta>0, NULL, fechapagado)) AS fechapagadocompleto,
  (`desembolso`.`total` - SUM(`vistapagos`.`montopagado`)) AS `saldo`,
  IFNULL(SUM(`vistapagos`.`moradias`),0) AS `moradias`,
  MAX(`vistapagos`.`fecha_prog`) AS `ultimafechadecuota`,
  (SELECT
     SUM(`pagomora`.`diasmora`)
   FROM `pagomora`
   WHERE (`pagomora`.`iddesembolso` = `desembolso`.`iddesembolso`)) AS `diasmorapagado`
FROM (`vistapagos`
   JOIN `desembolso`
     ON ((`vistapagos`.`iddesembolso` = `desembolso`.`iddesembolso`)))
GROUP BY `vistapagos`.`iddesembolso`$$

DELIMITER ;









DELIMITER $$

USE `tuamigo_db`$$

DROP VIEW IF EXISTS `vistasolicitdesembolsados`$$

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistasolicitdesembolsados` AS 
SELECT
  `vistasolicitud`.`idsolicitud`                 AS `idsolicitud`,
  `vistasolicitud`.`codcliente`                  AS `codcliente`,
  `vistasolicitud`.`fecha`                       AS `fecha`,
  `vistasolicitud`.`idasesor`                    AS `idasesor`,
  `vistasolicitud`.`estado`                      AS `estado`,
  `vistasolicitud`.`dni`                         AS `dni`,
  `vistasolicitud`.`apenom`                      AS `apenom`,
  `vistasolicitud`.`apellidos`                   AS `apellidos`,
  `vistasolicitud`.`apellidos2`                  AS `apellidos2`,
  `vistasolicitud`.`nombres`                     AS `nombres`,
  `vistasolicitud`.`tipo`                        AS `tipo`,
  `vistasolicitud`.`tipoplazo`                   AS `tipoplazo`,
  `vistasolicitud`.`dondepagara`                 AS `dondepagara`,
  `desembolso`.`iddesembolso`                    AS `iddesembolso`,
  `desembolso`.`fecha_hora`                      AS `fecha_hora`,
  `desembolso`.`monto`                           AS `monto`,
  `desembolso`.`interes`                         AS `interes`,
  `desembolso`.`plazo`                           AS `plazo`,
  `desembolso`.`unidplazo`                       AS `unidplazo`,
  `desembolso`.`direccion_dom`                   AS `direccion_dom`,
  `desembolso`.`direccion_neg`                   AS `direccion_neg`,
  `desembolso`.`total`                           AS `total`,
  `desembolso`.`costomora`                       AS `costomora`,
  IFNULL(`vistapagospordesembolso`.`totalpagado`,0) AS `totalpagado`,
  IFNULL((`desembolso`.`total` - `vistapagospordesembolso`.`totalpagado`),0) AS `saldo`,
  `vistapagospordesembolso`.`ultimafechapago`    AS `ultimafechapago`,
  `vistapagospordesembolso`.`fechapagadocompleto`    AS `fechapagadocompleto`,  
  `vistapagospordesembolso`.`ultimafechadecuota` AS `ultimafechadecuota`,
  `vistapagospordesembolso`.`moradias`           AS `moradias`,
  IFNULL(`vistapagospordesembolso`.`diasmorapagado`, 0)     AS `pagomora`, 
  (SELECT
     `vistapagos`.`fecha_prog`
   FROM `vistapagos`
   WHERE ((`vistapagos`.`iddesembolso` = `desembolso`.`iddesembolso`)
          AND (ISNULL(`vistapagos`.`montopagado`)
                OR (`vistapagos`.`montopagado` < `vistapagos`.`cuota`)))
   ORDER BY `vistapagos`.`nrocuota`
   LIMIT 1) AS `fechacuotadebe`

FROM ((`vistasolicitud`
    JOIN `desembolso`
      ON ((`vistasolicitud`.`idsolicitud` = `desembolso`.`idsolicitud`)))
   LEFT JOIN `vistapagospordesembolso`
     ON ((`desembolso`.`iddesembolso` = `vistapagospordesembolso`.`iddesembolso`)))$$

DELIMITER ;
















