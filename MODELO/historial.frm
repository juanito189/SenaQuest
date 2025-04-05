TYPE=VIEW
query=select `i`.`id_instructor` AS `ID_Instructor`,concat(`p`.`nombre`,\' \',`p`.`apellido`) AS `Nombre_Instructor`,`e`.`titulo` AS `Titulo_Encuesta`,`v`.`respuesta` AS `Respuesta_Evaluacion`,`e`.`fecha_creacion` AS `Fecha_Encuesta` from ((((`senaquest2`.`encuesta` `e` join `senaquest2`.`componente` `c` on(`e`.`codComponente` = `c`.`codComponente`)) join `senaquest2`.`instructor` `i` on(`c`.`id_instructor` = `i`.`id_instructor`)) join `senaquest2`.`valoracion` `v` on(`e`.`id_encuesta` = `v`.`id_pregunta`)) join `senaquest2`.`persona` `p` on(`i`.`id_instructor` = `p`.`id_persona`)) order by `e`.`fecha_creacion` desc
md5=0ba3ffb76995a272029312775d26b59e
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=0001733195915866041
create-version=2
source=SELECT \n        i.id_instructor AS ID_Instructor,\n        CONCAT(nombre, \' \', apellido) AS Nombre_Instructor,\n        e.titulo AS Titulo_Encuesta,\n        v.respuesta AS Respuesta_Evaluacion,\n        e.fecha_creacion AS Fecha_Encuesta\n    FROM \n        encuesta e\n    INNER JOIN \n        componente c ON e.codComponente = c.codComponente\n    INNER JOIN \n        instructor i ON c.id_instructor = i.id_instructor\n    INNER JOIN \n        valoracion v ON e.id_encuesta = v.id_pregunta\n    INNER JOIN \n        persona p ON i.id_instructor = p.id_persona\n    ORDER BY \n        e.fecha_creacion DESC
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select `i`.`id_instructor` AS `ID_Instructor`,concat(`p`.`nombre`,\' \',`p`.`apellido`) AS `Nombre_Instructor`,`e`.`titulo` AS `Titulo_Encuesta`,`v`.`respuesta` AS `Respuesta_Evaluacion`,`e`.`fecha_creacion` AS `Fecha_Encuesta` from ((((`senaquest2`.`encuesta` `e` join `senaquest2`.`componente` `c` on(`e`.`codComponente` = `c`.`codComponente`)) join `senaquest2`.`instructor` `i` on(`c`.`id_instructor` = `i`.`id_instructor`)) join `senaquest2`.`valoracion` `v` on(`e`.`id_encuesta` = `v`.`id_pregunta`)) join `senaquest2`.`persona` `p` on(`i`.`id_instructor` = `p`.`id_persona`)) order by `e`.`fecha_creacion` desc
mariadb-version=100432
