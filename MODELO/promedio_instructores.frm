TYPE=VIEW
query=select `i`.`id_instructor` AS `ID_Instructor`,concat(`p`.`nombre`,\' \',`p`.`apellido`) AS `Nombre_Instructor`,avg(case when `v`.`respuesta` = \'Bien\' then 1 else 0 end) AS `Promedio_Percepcion` from (((((((`senaquest2`.`instructor` `i` join `senaquest2`.`persona` `p` on(`i`.`id_instructor` = `p`.`id_persona`)) join `senaquest2`.`ficha_instructor` `fi` on(`i`.`id_instructor` = `fi`.`id_instructor`)) join `senaquest2`.`ficha` `f` on(`fi`.`id_ficha` = `f`.`id_ficha`)) join `senaquest2`.`componente` `c` on(`f`.`codPrograma` = `c`.`codPrograma`)) join `senaquest2`.`encuesta` `e` on(`c`.`codComponente` = `e`.`codComponente`)) join `senaquest2`.`pregunta` `pr` on(`e`.`id_encuesta` = `pr`.`id_encuesta`)) join `senaquest2`.`valoracion` `v` on(`pr`.`id_pregunta` = `v`.`id_pregunta`)) group by `i`.`id_instructor`,concat(`p`.`nombre`,\' \',`p`.`apellido`) order by avg(case when `v`.`respuesta` = \'Bien\' then 1 else 0 end) desc
md5=d7d49849dcea0a8f16e39d5bba115f86
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=0001733191247011546
create-version=2
source=SELECT i.id_instructor AS ID_Instructor,\n    CONCAT(nombre, \' \', apellido) AS Nombre_Instructor,\n    AVG(CASE  WHEN v.respuesta = \'Bien\' THEN 1\n            ELSE 0 \n        END) AS Promedio_Percepcion\nFROM   instructor i\nINNER JOIN   persona p ON i.id_instructor = p.id_persona  \nINNER JOIN  ficha_instructor fi ON i.id_instructor = fi.id_instructor  \nINNER JOIN  ficha f ON fi.id_ficha = f.id_ficha  \nINNER JOIN  componente c ON f.codPrograma = c.codPrograma  \nINNER JOIN  encuesta e ON c.codComponente = e.codComponente  \nINNER JOIN  pregunta pr ON e.id_encuesta = pr.id_encuesta  \nINNER JOIN  valoracion v ON pr.id_pregunta = v.id_pregunta  \nGROUP BY  i.id_instructor, Nombre_Instructor\nORDER BY \n    Promedio_Percepcion desc
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select `i`.`id_instructor` AS `ID_Instructor`,concat(`p`.`nombre`,\' \',`p`.`apellido`) AS `Nombre_Instructor`,avg(case when `v`.`respuesta` = \'Bien\' then 1 else 0 end) AS `Promedio_Percepcion` from (((((((`senaquest2`.`instructor` `i` join `senaquest2`.`persona` `p` on(`i`.`id_instructor` = `p`.`id_persona`)) join `senaquest2`.`ficha_instructor` `fi` on(`i`.`id_instructor` = `fi`.`id_instructor`)) join `senaquest2`.`ficha` `f` on(`fi`.`id_ficha` = `f`.`id_ficha`)) join `senaquest2`.`componente` `c` on(`f`.`codPrograma` = `c`.`codPrograma`)) join `senaquest2`.`encuesta` `e` on(`c`.`codComponente` = `e`.`codComponente`)) join `senaquest2`.`pregunta` `pr` on(`e`.`id_encuesta` = `pr`.`id_encuesta`)) join `senaquest2`.`valoracion` `v` on(`pr`.`id_pregunta` = `v`.`id_pregunta`)) group by `i`.`id_instructor`,concat(`p`.`nombre`,\' \',`p`.`apellido`) order by avg(case when `v`.`respuesta` = \'Bien\' then 1 else 0 end) desc
mariadb-version=100432
