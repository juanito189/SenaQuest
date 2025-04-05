TYPE=VIEW
query=select `i`.`id_instructor` AS `id_instructor`,concat(`p`.`nombre`,\' \',`p`.`apellido`) AS `instructor_nombre`,count(case when `v`.`respuesta` = \'Mal\' then 1 end) * 100.0 / count(`v`.`id_valoracion`) AS `porcentaje_mal` from (((((`senaquest2`.`instructor` `i` join `senaquest2`.`persona` `p` on(`i`.`id_instructor` = `p`.`id_persona`)) join `senaquest2`.`componente` `c` on(`i`.`id_instructor` = `c`.`id_instructor`)) join `senaquest2`.`encuesta` `e` on(`c`.`codComponente` = `e`.`codComponente`)) join `senaquest2`.`pregunta` `q` on(`e`.`id_encuesta` = `q`.`id_encuesta`)) join `senaquest2`.`valoracion` `v` on(`q`.`id_pregunta` = `v`.`id_pregunta`)) group by `i`.`id_instructor`,concat(`p`.`nombre`,\' \',`p`.`apellido`) having `porcentaje_mal` > 20 order by count(case when `v`.`respuesta` = \'Mal\' then 1 end) * 100.0 / count(`v`.`id_valoracion`) desc
md5=34b6af1951dd2c2a9b6e841937c433d3
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=0001733191657988675
create-version=2
source=SELECT i.id_instructor, CONCAT(nombre, \' \', apellido) AS instructor_nombre, \n       (COUNT(CASE WHEN v.respuesta = \'Mal\' THEN 1 END) * 100.0 / COUNT(v.id_valoracion)) AS porcentaje_mal\nFROM instructor i\nINNER JOIN persona p ON i.id_instructor = p.id_persona\nINNER JOIN componente c ON i.id_instructor = c.id_instructor\nINNER JOIN encuesta e ON c.codComponente = e.codComponente\nINNER JOIN pregunta q ON e.id_encuesta = q.id_encuesta\nINNER JOIN valoracion v ON q.id_pregunta = v.id_pregunta\nGROUP BY i.id_instructor, instructor_nombre\nHAVING porcentaje_mal > 20\nORDER BY porcentaje_mal DESC
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select `i`.`id_instructor` AS `id_instructor`,concat(`p`.`nombre`,\' \',`p`.`apellido`) AS `instructor_nombre`,count(case when `v`.`respuesta` = \'Mal\' then 1 end) * 100.0 / count(`v`.`id_valoracion`) AS `porcentaje_mal` from (((((`senaquest2`.`instructor` `i` join `senaquest2`.`persona` `p` on(`i`.`id_instructor` = `p`.`id_persona`)) join `senaquest2`.`componente` `c` on(`i`.`id_instructor` = `c`.`id_instructor`)) join `senaquest2`.`encuesta` `e` on(`c`.`codComponente` = `e`.`codComponente`)) join `senaquest2`.`pregunta` `q` on(`e`.`id_encuesta` = `q`.`id_encuesta`)) join `senaquest2`.`valoracion` `v` on(`q`.`id_pregunta` = `v`.`id_pregunta`)) group by `i`.`id_instructor`,concat(`p`.`nombre`,\' \',`p`.`apellido`) having `porcentaje_mal` > 20 order by count(case when `v`.`respuesta` = \'Mal\' then 1 end) * 100.0 / count(`v`.`id_valoracion`) desc
mariadb-version=100432
