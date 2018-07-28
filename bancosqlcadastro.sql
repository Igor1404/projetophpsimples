
CREATE DEFINER=`root`@`localhost` PROCEDURE sp_usuario_insert(

pusuario VARCHAR(100),
psenha VARCHAR(100)

)

BEGIN

	INSERT INTO login(usuario, senha) VALUES(pusuario, pesenha);
    SELECT * FROM login WHERE idusuario = LAST_INSERT_ID();
    
END