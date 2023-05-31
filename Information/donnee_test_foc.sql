

--- DONNEE DE TESTE

INSERT INTO profile_pictures VALUES
	(DEFAULT, 'manjaka.jpg'),
	(DEFAULT, 'fanantenana.png');

INSERT INTO customer VALUES
	(DEFAULT,'Manjaka RASAMOELINA', '101211538773', '2H11DB', '0341576430', 'manjakaRas@yahoo.fr', 'man-JK04-ras'),
	(DEFAULT,'Fanantenana ANDRIARO', '101661239741', '7A32bis', '03800121344', 'fanaandriaro@gmail.com', 'fafa-hiho@db4k');

INSERT INTO coordinate VALUES
	(DEFAULT, 16, 54),
	(DEFAULT, 22,23);

INSERT INTO weekly_day VALUES
	(DEFAULT, 'Lundi'),
	(DEFAULT, 'Mardi'),
	(DEFAULT, 'Mercredi'),
	(DEFAULT, 'Jeudi'),
	(DEFAULT, 'Vendredi'),
	(DEFAULT, 'Samedi'),
	(DEFAULT, 'Dimanche');

INSERT INTO hourly_rate VALUES
	(DEFAULT, 2, '08:01:03', '17:30:00', 15000, 10),
	(DEFAULT, 3,'10:15:00', '15:45:00', 21000, 20);

INSERT INTO category_terrain VALUES
	(DEFAULT, 'foot'),
	(DEFAULT, 'basket'),
	(DEFAULT, 'volley'),
	(DEFAULT, 'rugby'),
	(DEFAULT, 'tennis');

INSERT INTO type_terrain VALUES
	(DEFAULT, 'synthetique'),
	(DEFAULT, 'goudron'),
	(DEFAULT, 'salle'),
	(DEFAULT, 'couvert');

INSERT INTO municipalities VALUES
	(DEFAULT, 'Tana III'),
	(DEFAULT, 'Alasora');

INSERT INTO terrain VALUES
	(DEFAULT, 1, 3, 45),
	(DEFAULT, 2, 3, 22);

INSERT INTO terrain_parameter VALUES
	('Tana Shooters', 2, 2, 1, 1, 1, 1),
	('Fana-foot', 1, 1, 2, 2, 2, 2);

INSERT INTO terrain_pictures VALUES
	(DEFAULT, 'photo1.jpg', 1),
	(DEFAULT, 'photo2.jpg', 2);

INSERT INTO availability VALUES
	(DEFAULT, 1, 1, '06:00:00', '18:00:00'),
	(DEFAULT, 2, 2, '05:30:00', '20:00:00');

INSERT INTO reservation_status VALUES
	(DEFAULT, 'en attente'),
	(DEFAULT, 'confirmer'),
	(DEFAULT, 'en retard'),
	(DEFAULT, 'annuler');

