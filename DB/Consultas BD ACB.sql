use acb;
/*1- Visualiza todos los equipos con el nombre de la ciudad a la que pertenecen al lado*/
select e.nombre as nombre_equipo, c.nombre as nombre_ciudad from equipo e inner join ciudad c on (e.idciudad = c.id);

/*2 - Hazlo de forma que en las cabeceras de las tablas ponga “Equipo” y “Ciudad”.*/
select e.nombre as Equipo, c.nombre as Ciudad from equipo e inner join ciudad c on (e.idciudad = c.id);

/*3 – Saca la misma lista pero ordenada en creciente por nombre de equipo.*/
select e.nombre as Equipo, c.nombre as Ciudad from equipo e inner join ciudad c on (e.idciudad = c.id) order by equipo asc;

/*4 – Saca los equipos pertenecientes a la ciudad de Madrid.*/
select e.* from equipo e inner join ciudad c on (c.id = e.idciudad) where c.nombre="Madrid";

/*5 – Saca todas las ciudades indicando cuántos equipos tiene cada una.*/
select c.nombre as nombre_ciudad, count(e.id) as num_equipos from ciudad c inner join equipo e on (e.idciudad = c.id) group by c.nombre;

/*6 – Saca todas las ciudades indicando cuántos equipos tiene cada una, pero saca sólo aquellas que tengan más de uno.*/
select c.nombre as nombre_ciudad, count(e.id) as num_equipos from ciudad c inner join equipo e on (e.idciudad = c.id) group by c.nombre having count(e.id)>1;

/*7 – Haz la misma búsqueda de antes pero sin sacar el número de equipos*/
select c.nombre as nombre_ciudad from ciudad c where (select  count(id) as num_equipos from equipo) >=1 group by c.nombre;

/*8 – Visualiza todas las ciudades cuyo nombre empieza por B*/
select * from ciudad where nombre like 'B%';

/*9 – Visualiza todos los jugadores del equipo Estudiantes*/ 
select j.nombre as nombre_jugador, e.nombre as nombre_equipo from jugador j inner join equipo e on(e.id = j.idequipo) where e.nombre = "Estudiantes";

/*10 – Visualiza los jugadores que superan los 2 metros de altura y el equipo en que juegan*/
select j.nombre as nombre_jugador, e.nombre as nombre_equipo from jugador j inner join equipo e on(e.id = j.idequipo) where j.altura > 2;

/*11 – Visualiza la altura media de los jugadores*/
select avg(altura) as altura_media from jugador;

/*12 – Visualiza los jugadores que superan la media de altura y el equipo en que juegan*/
select j.nombre as nombre_jugador, j.apellidos as apellido_jugador, e.nombre as nombre_equipo from jugador j inner join equipo e on(e.id = j.idequipo) where altura > (select avg(altura) as altura_media from jugador);

/*13 – Visualiza los jugadores que son más altos que Germán Gabriel y la ciudad donde juegan mediante Joins y después calcúlalo mediante subquerys*/
select j.nombre as nombre_jugador, e.nombre as nombre_equipo from jugador j inner join equipo e on(e.id = j.idequipo) where altura > (select altura as altura_media from jugador where nombre ='German'and apellidos='Gabriel');

/*14 – Visualiza la altura media del Bilbao Basket*/
select avg(j.altura)as altura_media from jugador j inner join equipo e on (e.id = j.idequipo) where e.nombre like '%Bilbao Basket%';

/*15 – Visualiza cada equipo con su altura media al lado*/
select e.nombre as nombre_equipo, avg(j.altura)as altura_media from jugador j inner join equipo e on (e.id = j.idequipo) group by e.id;

/*16 – Visualiza, para el Bilbao Basket, su número de jugadores, su altura media y la suma de sus pesos.*/
select count(j.id) as num_jugadores, round(avg(j.altura),2) as altura_media, sum(j.peso) as suma_pesos from jugador j inner join equipo e on (e.id = j.idequipo) where e.nombre like '%Bilbao Basket%';

/*17 – Visualiza la información anterior para todos los equipos, con el nombre del equipo.*/
select e.nombre as nombre_equipo, count(j.id) as num_jugadores, avg(j.altura)as altura_media, sum(j.peso) as suma_pesos from jugador j inner join equipo e on (e.id = j.idequipo) group by e.id;

/*18 – Visualiza el número de jugadores que tiene el Bilbao Basket menores de 27 años.*/
select e.nombre as nombre_equipo, count(j.id) as num_jugadores from jugador j inner join equipo e on (e.id = j.idequipo) where j.edad< 27 and e.nombre like '%Bilbao Basket%' group by e.id;

/*19 – Visualiza el número de jugadores menores de 25 años que tiene cada equipo.*/
select e.nombre as nombre_equipo, count(j.id) as num_jugadores from jugador j inner join equipo e on (e.id = j.idequipo) where j.edad< 25 group by e.id;

/*20 – Visualiza la altura media y la media de peso de los jugadores menores de 25 años de cada equipo.*/
select e.nombre as nombre_equipo, avg(j.altura)as altura_media, avg(j.peso) as media_pesos from jugador j inner join equipo e on (e.id = j.idequipo) where j.edad< 25 group by e.id;

/*21 – Visualiza el mejor anotador del partido.*/
select j.nombre, j.apellidos, max(jp.puntos) as puntos from jugador_partido jp inner join jugador j on (j.id = jp.idjugador) inner join partido p on (p.id = jp.idpartido);

/*22 – Visualiza los tres mejores anotadores del partido.*/
select j.nombre, j.apellidos, jp.puntos as puntos from jugador_partido jp inner join jugador j on (j.id = jp.idjugador) order by puntos desc limit 3;

/*23 – Visualiza los jugadores del Estudiantes que han cogido más rebotes que la media de rebotes por partido.*/
select j.nombre, j.apellidos, jp.rebotes as rebotes from jugador_partido jp inner join jugador j on (j.id = jp.idjugador) inner join equipo e on (e.id = j.idequipo) where (select avg(rebotes) from jugador_partido) < jp.rebotes  order by rebotes;

/*24 – Calcula el resultado del partido con identificador 1.*/
select equipo.nombre, sum(jugador_partido.puntos) as puntuacion from jugador, equipo, jugador_partido where jugador.idequipo = equipo.id and jugador.id = jugador_partido.idjugador and jugador_partido.idpartido =1 group by equipo.id;

/*25 – Visualiza la anotación de los 3 jugadores más jóvenes de estudiantes.*/
select nombre, apellidos, puntos from jugador inner join jugador_partido on jugador_partido.idjugador = jugador.id where idequipo =(select id from equipo where nombre like 'Estudiantes') order by edad limit 3;

/*26 – Entendiendo la valoración como el resultado de sumar los puntos y los rebotes y restar las faltas, calcula la valoración de cada jugador.*/
select jugador.nombre, jugador.apellidos, equipo.nombre, ((puntos + rebotes)-faltas) as valoracion from jugador inner join equipo on equipo.id = jugador.idequipo inner join jugador_partido on jugador_partido.idjugador = jugador.id;

/*27 – Saca una comparativa que muestre la diferencia entre la actuación de Marko Banic y la de Nick Cardner-Medley en el partido 1. La comparativa la sacaremos restando a las estadísticas de Marco Banic las de Nick Cardner-Medley.*/
select j1.nombre, "us" us, j2.nombre, jp1.puntos as puntos, (jp1.puntos - jp2.puntos) as diferencia_puntos, jp1.faltas faltas ,(jp1.faltas - jp2.faltas) as diferencia_faltas from jugador j1, jugador j2, jugador_partido jp1, jugador_partido jp2 where j1.nombre = 'Marko' and j2.nombre = 'Nick' and j1.id = jp1.idjugador and jp1.idpartido = 1 and j2.id = jp2.idjugador and jp2.idpartido = 1;

/*28 – Visualiza la valoración total de cada equipo.*/
select equipo.nombre, (sum(puntos + rebotes)-sum(faltas)) as valoracion from jugador inner join equipo on equipo.id = jugador.idequipo inner join jugador_partido on jugador_partido.idjugador = jugador.id group by equipo.id;

/*29 – Averigua cuántos jugadores de cada equipo anotaron entre 10 y 20 puntos, y muestra cuánto sumaron los puntos que anotaron esos jugadores en cada equipo:.*/
select equipo.nombre, count(jugador.nombre)as jugadores, sum(jugador_partido.puntos) as puntos from jugador inner join equipo on equipo.id= jugador.idequipo inner join jugador_partido on jugador_partido.idjugador = jugador.id  where jugador_partido.puntos>=10 and jugador_partido.puntos<=20 group by equipo.id;

/*30 – Calcula quién es el jugador que más puntos anota por minuto jugado.*/
select jugador.nombre as nombre_jugador, jugador.apellidos as apellido_jugador,(jugador_partido.puntos/jugador_partido.minutos) as puntos_minuto from jugador inner join jugador_partido on jugador_partido.idjugador = jugador.id order by puntos_minuto desc limit 1;

/*31 – Calcula cuál es la media de rebotes por jugador, agrupado por equipos. Intenta realizar esta consulta sin usar la función AVG:.*/
select equipo.nombre, sum(jugador_partido.rebotes)/count(jugador.id) as media_rebotes from jugador_partido inner join jugador on jugador.id = jugador_partido.idjugador inner join equipo on equipo.id = jugador.idequipo group by equipo.id;

/*32 – Faltas cometidas por el jugador más alto de un equipo de Madrid.*/
select (jugador.nombre )as nombre_jugador, (jugador.apellidos) as apellido_jugador , jugador_partido.faltas  from equipo inner join jugador on equipo.id = jugador.idequipo inner join jugador_partido on jugador_partido.idjugador = jugador.id  where idciudad = (select id from ciudad where nombre = 'Madrid') order by jugador_partido.faltas desc limit 1;

/*33 - Media de minutos jugados por los jugadores que pesan más de 100 kilos.*/
select jugador.nombre as nombre_jugador, jugador.apellidos as apellido_jugador, round(avg(jugador_partido.minutos),2) as media_minutos  from jugador inner join jugador_partido on jugador_partido.idjugador=jugador.id where peso > 100;