 ALTER TABLE `tuamigo_db`.`cliente` ADD COLUMN `tipo` VARCHAR(8) DEFAULT 'CREDITO' NOT NULL COMMENT 'CREDITO, AHORROS' AFTER `idusuario`; 
 
 
DELIMITER $$

DROP VIEW IF EXISTS `clientes`$$

CREATE VIEW `clientes` AS 
SELECT
  `cliente`.`codcliente`                    AS `codcliente`,
  `cliente`.`dni`                           AS `dni`,
  CONCAT(`vistapersona`.`apellidos`,' ',`vistapersona`.`apellidos2`,' ',`vistapersona`.`nombres`) AS `apenom`,
  `vistapersona`.`apellidos`                AS `apellidos`,
  `vistapersona`.`apellidos2`               AS `apellidos2`,
  `vistapersona`.`nombres`                  AS `nombres`,
  `vistapersona`.`ruc`                      AS `ruc`,
  `vistapersona`.`fecha_nac`                AS `fecha_nac`,
  `vistapersona`.`sexo`                     AS `sexo`,
  `vistapersona`.`estadocivil`              AS `estadocivil`,
  `vistapersona`.`grado_instr`              AS `grado_instr`,
  `vistapersona`.`nacionalidad`             AS `nacionalidad`,
  `vistapersona`.`distrito_nac`             AS `distrito_nac`,
  `vistapersona`.`distrito_domic`           AS `distrito_domic`,
  `vistapersona`.`tipotrabajador`           AS `tipotrabajador`,
  `vistapersona`.`ocupacion`                AS `ocupacion`,
  `vistapersona`.`institucion_lab`          AS `institucion_lab`,
  `vistapersona`.`email`                    AS `email`,
  `vistapersona`.`tipovia`                  AS `tipovia`,
  `vistapersona`.`nombrevia`                AS `nombrevia`,
  `vistapersona`.`Nro`                      AS `nro`,
  `vistapersona`.`interior`                 AS `interior`,
  `vistapersona`.`celular`                  AS `celular`,
  `vistapersona`.`mz`                       AS `mz`,
  `vistapersona`.`lote`                     AS `lote`,
  `vistapersona`.`tipozona`                 AS `tipozona`,
  `vistapersona`.`nombrezona`               AS `nombrezona`,
  `vistapersona`.`referencia`               AS `referencia`,
  `cliente`.`estado`                        AS `estado`,
  `cliente`.`fecha_registro`                AS `fecha_registro`,
  `vistapersona`.`tipovivienda`             AS `tipovivienda`,
  `cliente`.`idusuario`                     AS `idusuario`,
  `vistapersona`.`edad`                     AS `edad`,
  `vistapersona`.`distritonombre_nac`       AS `distritonombre_nac`,
  `vistapersona`.`provincianombre_nac`      AS `provincianombre_nac`,
  `vistapersona`.`departamentonombre_nac`   AS `departamentonombre_nac`,
  `vistapersona`.`departamentonombre_domic` AS `departamentonombre_domic`,
  `vistapersona`.`provincianombre_domic`    AS `provincianombre_domic`,
  `vistapersona`.`distritonombre_domic`     AS `distritonombre_domic`,
  COUNT(`negocio`.`idnegocio`)              AS `negocios`,
  `aval`.`dniaval`                          AS `dniaval`,
  `vistapersona`.`dniconyugue`              AS `dniconyugue`,
  `usuario`.`agencia`                       AS `agencia`,
  cliente.`tipo` AS tipo
FROM ((((`cliente`
      JOIN `vistapersona`
        ON (`cliente`.`dni` = `vistapersona`.`dni`))
     LEFT JOIN `aval`
       ON (`cliente`.`codcliente` = `aval`.`codcliente`))
    LEFT JOIN `negocio`
      ON (`cliente`.`codcliente` = `negocio`.`codcliente`))
   JOIN `usuario`
     ON (`cliente`.`idusuario` = `usuario`.`codusuario`))
GROUP BY `cliente`.`codcliente`$$

DELIMITER ;