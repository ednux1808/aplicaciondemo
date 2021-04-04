CREATE DATABASE aplicacion_demostracion;

CREATE TABLE usuarios (
                          id_user serial not null primary key ,
                          correo varchar unique,
                          name text,
                          password text,
                          dia_registro date
);

create function addUsuario (correo varchar, nombre text, contrasena text, dia_registro date) returns integer
    language plpgsql
as
$$
BEGIN
INSERT INTO usuarios (email, name, password, register_day) values (correo,nombre,contrasena,dia_registro);
IF EXISTS(SELECT email
              FROM  usuarios
              WHERE email = correo)
    THEN
        RETURN 1;
ELSE
        RETURN 0;
END IF;
END;
$$;



select addUsuario('esdu1808@gmail.com','Eduardo Zamora','hola1808','2021-04-03');


create function userExist (correo_c varchar) returns integer
    language plpgsql
as
$$
BEGIN
    IF EXISTS(SELECT email
              FROM  usuarios
              WHERE email = correo_c)
    THEN
        RETURN 1;
ELSE
        RETURN 0;
END IF;
END;
$$;

SELECT userExist('esdu28@gmail.com');