DELIMITER $$

USE `tuamigo_db`$$

DROP VIEW IF EXISTS `vistapersona`$$

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistapersona` AS 
SELECT
  `persona`.`dni`             AS `dni`,
  CONCAT(persona.`apellidos`, ' ', persona.`apellidos2`, ', ', nombres) AS apenom,
  `persona`.`apellidos`       AS `apellidos`,
  `persona`.`apellidos2`      AS `apellidos2`,
  `persona`.`nombres`         AS `nombres`,
  `persona`.`fecha_nac`       AS `fecha_nac`,
  `persona`.`distrito_nac`    AS `distrito_nac`,
  calcularedad(persona.`fecha_nac`) AS edad,
  `vd1`.`distrito`            AS `distritonombre_nac`,
  `vd1`.`idprovincia`         AS `idprovincia_nac`,
  `vd1`.`provincia`           AS `provincianombre_nac`,
  `vd1`.`iddepartamento`      AS `iddepartamento_nac`,
  `vd1`.`departamento`        AS `departamentonombre_nac`,
  `persona`.`celular`         AS `celular`,
  `persona`.`sexo`            AS `sexo`,
  `persona`.`email`           AS `email`,
  `persona`.`ruc`             AS `ruc`,
  `persona`.`estadocivil`     AS `estadocivil`,
  `persona`.`distrito_domic`  AS `distrito_domic`,
  `vd2`.`distrito`            AS `distritonombre_domic`,
  `vd2`.`idprovincia`         AS `idprovincia_domic`,
  `vd2`.`provincia`           AS `provincianombre_domic`,
  `vd2`.`iddepartamento`      AS `iddepartamento_domic`,
  `vd2`.`departamento`        AS `departamentonombre_domic`,
  `persona`.`grado_instr`     AS `grado_instr`,
  `persona`.`profesion`       AS `profesion`,
  `persona`.`nacionalidad`    AS `nacionalidad`,
  `persona`.`tipovia`         AS `tipovia`,
  `persona`.`nombrevia`       AS `nombrevia`,
  `persona`.`Nro`             AS `Nro`,
  `persona`.`interior`        AS `interior`,
  `persona`.`mz`              AS `mz`,
  `persona`.`lote`            AS `lote`,
  `persona`.`tipozona`        AS `tipozona`,
  `persona`.`nombrezona`      AS `nombrezona`,
  `persona`.`referencia`      AS `referencia`,
  `persona`.`tipotrabajador`  AS `tipotrabajador`,
  `persona`.`ocupacion`       AS `ocupacion`,
  `persona`.`institucion_lab` AS `institucion_lab`,
  `persona`.`tipovivienda`    AS `tipovivienda`
FROM ((`persona`
    JOIN `vist_distprovdep` `vd1`
      ON ((`persona`.`distrito_nac` = `vd1`.`iddistrito`)))
   JOIN `vist_distprovdep` `vd2`
     ON ((`persona`.`distrito_domic` = `vd2`.`iddistrito`)))$$

DELIMITER ;




DROP VIEW IF EXISTS `vistapersona`;

CREATE VIEW `vistapersona` AS 
SELECT
  `persona`.`dni`             AS `dni`,
  CONCAT(`persona`.`apellidos`,' ',`persona`.`apellidos2`,', ',`persona`.`nombres`) AS `apenom`,
  `persona`.`apellidos`       AS `apellidos`,
  `persona`.`apellidos2`      AS `apellidos2`,
  `persona`.`nombres`         AS `nombres`,
  `persona`.`fecha_nac`       AS `fecha_nac`,
  `persona`.`distrito_nac`    AS `distrito_nac`,
  `calcularedad`(`persona`.`fecha_nac`)  AS `edad`,
  `vd1`.`distrito`            AS `distritonombre_nac`,
  `vd1`.`idprovincia`         AS `idprovincia_nac`,
  `vd1`.`provincia`           AS `provincianombre_nac`,
  `vd1`.`iddepartamento`      AS `iddepartamento_nac`,
  `vd1`.`departamento`        AS `departamentonombre_nac`,
  `persona`.`celular`         AS `celular`,
  `persona`.`sexo`            AS `sexo`,
  `persona`.`email`           AS `email`,
  `persona`.`ruc`             AS `ruc`,
  `persona`.`estadocivil`     AS `estadocivil`,
  `persona`.`distrito_domic`  AS `distrito_domic`,
  `vd2`.`distrito`            AS `distritonombre_domic`,
  `vd2`.`idprovincia`         AS `idprovincia_domic`,
  `vd2`.`provincia`           AS `provincianombre_domic`,
  `vd2`.`iddepartamento`      AS `iddepartamento_domic`,
  `vd2`.`departamento`        AS `departamentonombre_domic`,
  `persona`.`grado_instr`     AS `grado_instr`,
  `persona`.`profesion`       AS `profesion`,
  `persona`.`nacionalidad`    AS `nacionalidad`,
  `persona`.`tipovia`         AS `tipovia`,
  `persona`.`nombrevia`       AS `nombrevia`,
  `persona`.`Nro`             AS `Nro`,
  `persona`.`interior`        AS `interior`,
  `persona`.`mz`              AS `mz`,
  `persona`.`lote`            AS `lote`,
  `persona`.`tipozona`        AS `tipozona`,
  `persona`.`nombrezona`      AS `nombrezona`,
  `persona`.`referencia`      AS `referencia`,
  `persona`.`tipotrabajador`  AS `tipotrabajador`,
  `persona`.`ocupacion`       AS `ocupacion`,
  `persona`.`institucion_lab` AS `institucion_lab`,
  `persona`.`tipovivienda`    AS `tipovivienda`,
   conyugue.dniconyugue AS dniconyugue
FROM `persona`
   JOIN `vist_distprovdep` `vd1` ON `persona`.`distrito_nac` = `vd1`.`iddistrito`
   JOIN `vist_distprovdep` `vd2` ON `persona`.`distrito_domic` = `vd2`.`iddistrito`
   LEFT JOIN conyugue ON persona.dni=conyugue.dni
   


SELECT * FROM vistapersona WHERE dni='45532962'


DROP VIEW IF EXISTS `clientes`;
CREATE VIEW `clientes` AS 
SELECT
  `cliente`.`codcliente`      AS `codcliente`,
  `cliente`.`dni`             AS `dni`,
  CONCAT(`vistapersona`.`apellidos`,' ',`vistapersona`.`apellidos2`,' ',`vistapersona`.`nombres`) AS `apenom`,
  `vistapersona`.`apellidos`       AS `apellidos`,
  `vistapersona`.`apellidos2`      AS `apellidos2`,
  `vistapersona`.`nombres`         AS `nombres`,
  `vistapersona`.`ruc`             AS `ruc`,
  `vistapersona`.`fecha_nac`       AS `fecha_nac`,
  `vistapersona`.`sexo`            AS `sexo`,
  `vistapersona`.`estadocivil`     AS `estadocivil`,
  `vistapersona`.`grado_instr`     AS `grado_instr`,
  `vistapersona`.`nacionalidad`    AS `nacionalidad`,
  `vistapersona`.`distrito_nac`    AS `distrito_nac`,
  `vistapersona`.`distrito_domic`  AS `distrito_domic`,
  `vistapersona`.`tipotrabajador`  AS `tipotrabajador`,
  `vistapersona`.`ocupacion`       AS `ocupacion`,
  `vistapersona`.`institucion_lab` AS `institucion_lab`,
  `vistapersona`.`email`           AS `email`,
  `vistapersona`.`tipovia`         AS `tipovia`,
  `vistapersona`.`nombrevia`       AS `nombrevia`,
  `vistapersona`.`Nro`             AS `nro`,
  `vistapersona`.`interior`        AS `interior`,
  `vistapersona`.`celular`         AS `celular`,
  `vistapersona`.`mz`              AS `mz`,
  `vistapersona`.`lote`            AS `lote`,
  `vistapersona`.`tipozona`        AS `tipozona`,
  `vistapersona`.`nombrezona`      AS `nombrezona`,
  `vistapersona`.`referencia`      AS `referencia`,
  `cliente`.`estado`          AS `estado`,
  `cliente`.`fecha_registro`  AS `fecha_registro`,
  `vistapersona`.`tipovivienda`    AS `tipovivienda`,
  `cliente`.`idusuario`       AS `idusuario`,
  `vistapersona`.`edad`  	AS `edad`,
  vistapersona.distritonombre_nac AS distritonombre_nac,
  vistapersona.provincianombre_nac AS provincianombre_nac,
  vistapersona.`departamentonombre_nac` AS departamentonombre_nac,
  vistapersona.`departamentonombre_domic` AS departamentonombre_domic,
  vistapersona.`provincianombre_domic` AS provincianombre_domic,
  vistapersona.`distritonombre_domic` AS distritonombre_domic,
  COUNT(negocio.idnegocio) AS negocios,
  aval.dniaval AS dniaval,
  vistapersona.dniconyugue AS dniconyugue
FROM `cliente`
   JOIN `vistapersona` ON `cliente`.`dni` = `vistapersona`.`dni`
   LEFT JOIN aval ON cliente.codcliente = aval.codcliente
   LEFT JOIN negocio ON cliente.codcliente = negocio.codcliente
GROUP BY cliente.codcliente



INSERT IGNORE INTO conyugue SELECT dniconyugue, dni FROM conyugue

SELECT * FROM persona WHERE estadocivil='CASADO'
UPDATE persona SET estadocivil='Casado' WHERE estadocivil='CASADO'


SELECT * FROM vistapersona WHERE dniconyugue IS NULL AND (estadocivil='CASADO' OR estadocivil='CONVIVIENTE') 

SELECT * FROM persona WHERE dni = '10651396'

SELECT * FROM persona WHERE apellidos2 IS NULL OR apellidos2 = ''