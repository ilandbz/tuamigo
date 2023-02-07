
DELIMITER $$
CREATE FUNCTION calcularedad(fecha_nac DATE) RETURNS INT
BEGIN
    RETURN TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE());
END$$

