
DELIMITER $$
drop procedure if exists getVehicles;

CREATE PROCEDURE getVehicles()
BEGIN

SELECT * FROM unsold;
END $$
DELIMITER ;