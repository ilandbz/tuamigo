CREATE TABLE `personal` (
  `dni` CHAR(8) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` VARCHAR(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sueldobasico` DECIMAL(10,0) DEFAULT NULL,
  `fechainicio` DATE DEFAULT NULL,
  `estado` VARCHAR(30) COLLATE utf8_spanish_ci DEFAULT 'ACTIVO',
  `tipo` VARCHAR(40) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'directo o indirecto'
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


SELECT
  `personal`.`cargo`        AS `cargo`,
  `personal`.`dni`          AS `dni`,
  `personal`.`estado`       AS `estado`,
  `personal`.`fechainicio`  AS `fechainicio`,
  `personal`.`sueldobasico` AS `sueldobasico`,
  `personal`.`tipo`         AS `tipo`,
  `vistapersona`.`apenom`   AS `apenom`,
  `usuario`.`agencia`       AS `agencia`
FROM ((`personal`
    JOIN `vistapersona`
      ON (`personal`.`dni` = `vistapersona`.`dni`))
   JOIN `usuario`
     ON (`personal`.`dni` = `usuario`.`dni`))
WHERE `usuario`.`estado` = 'ACTIVO'
DROP VIEW vistapersonalhhhh
CREATE VIEW vistapersonalhhhh AS
SELECT personal.dni, cargo, sueldobasico, fechainicio, estado, personal.tipo, apenom, celular, usuario.agencia
FROM personal JOIN vistapersona ON personal.dni=vistapersona.dni
LEFT JOIN usuario ON personal.dni=usuario.dni
GROUP BY personal.dni


SELECT * FROM personal LEFT JOIN usuario ON personal.dni=usuario.dni GROUP BY personal.dni