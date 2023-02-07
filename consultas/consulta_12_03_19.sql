CREATE VIEW vistacuotapagoahorros AS 
SELECT codigocuenta, nrocuota, cuotaahorros.monto AS cuota, fechaprog, nombredia, fechareg, idusuario, pagocuotaahorros.monto AS montopagado
FROM cuotaahorros LEFT JOIN pagocuotaahorros ON cuotaahorros.codigocuenta=pagocuotaahorros.codigo

