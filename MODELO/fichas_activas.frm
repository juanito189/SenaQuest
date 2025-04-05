TYPE=VIEW
query=select `pr`.`nombre_programa` AS `nombre_programa`,count(`f`.`id_ficha`) AS `total_fichas_activas` from (`senaquest2`.`programa` `pr` join `senaquest2`.`ficha` `f` on(`pr`.`codPrograma` = `f`.`codPrograma`)) where `f`.`estado` = \'Activa\' group by `pr`.`nombre_programa` order by count(`f`.`id_ficha`) desc
md5=ca6b24de00f266a5c389726139bc00a1
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=0001733191530249597
create-version=2
source=SELECT pr.nombre_programa, COUNT(f.id_ficha) AS total_fichas_activas\nFROM programa pr\nINNER JOIN ficha f ON pr.codPrograma = f.codPrograma\nWHERE f.estado = \'Activa\'\nGROUP BY pr.nombre_programa\nORDER BY total_fichas_activas DESC
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select `pr`.`nombre_programa` AS `nombre_programa`,count(`f`.`id_ficha`) AS `total_fichas_activas` from (`senaquest2`.`programa` `pr` join `senaquest2`.`ficha` `f` on(`pr`.`codPrograma` = `f`.`codPrograma`)) where `f`.`estado` = \'Activa\' group by `pr`.`nombre_programa` order by count(`f`.`id_ficha`) desc
mariadb-version=100432
