insert into jugador (nombre, 	apellidos, 		altura,	peso,	edad, 	idequipo)values
					('Sergio', 	'Llull', 		1.90, 	90, 	26,		(select id from equipo where nombre like 'Real Madrid')),
					('Rudy', 	'Fernández', 	1.96, 	91, 	28,		(select id from equipo where nombre like 'Real Madrid')),
					('Felipe',	'Reyes',	 	2.04, 	105, 	34,		(select id from equipo where nombre like 'Real Madrid')),
					('Nikola', 	'Mirotic', 		2.08, 	110, 	23,		(select id from equipo where nombre like 'Real Madrid')),
					('Sergio', 	'Rodríguez', 	1.91, 	82, 	27,		(select id from equipo where nombre like 'Real Madrid')),
					('Jaycee', 	'Carroll', 		1.88, 	82, 	30,		(select id from equipo where nombre like 'Real Madrid')),
					('Tremmell','Darden', 		1.94, 	92, 	32,		(select id from equipo where nombre like 'Real Madrid')),
					('Ioannis', 'Bourousis', 	2.10, 	115, 	30,		(select id from equipo where nombre like 'Real Madrid')),
					('Marcus', 	'Slaughter', 	2.04, 	94, 	29,		(select id from equipo where nombre like 'Real Madrid')),
					('Salah', 	'Mejri', 		2.17, 	120, 	27,		(select id from equipo where nombre like 'Real Madrid'))