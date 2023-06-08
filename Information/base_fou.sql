CREATE TABLE genre (
    id_genre SERIAL PRIMARY KEY,
    genre    VARCHAR(10) NOT NULL
);

CREATE TABLE users (
	id_user SERIAL PRIMARY KEY,
	name VARCHAR(35) NOT NULL,
	email VARCHAR(35) NOT NULL,
	dtn DATE NOT NULL,
	id_genre INT,
	mdp VARCHAR(35) NOT NULL,
	FOREIGN KEY (id_genre) REFERENCES genre(id_genre)
);

CREATE TABLE reservation (
	id_reservation SERIAL PRIMARY KEY,
	id_terrain INTEGER NOT NULL,
	id_user INTEGER NOT NULL,
	dateheure_reservation TIMESTAMP NOT NULL,
	etat INTEGER DEFAULT 0 NOT NULL,
	duree INTEGER DEFAULT 1 NOT NULL,
	FOREIGN KEY (id_user) REFERENCES users(id_user)
);

INSERT INTO users VALUES
	(DEFAULT, 'Eric', 'Eric@gmail.com', '2007-11-29'),
	(DEFAULT, 'Tiavina', 'tiavina@gmail.com', '2005-10-29')
;

-- donnees de test info sur le terrain
INSERT INTO coordinate VALUES
	(DEFAULT, 'centre', -18.908911976391014, 47.52769755340264)
;

INSERT INTO hourly_rate VALUES
	(DEFAULT, '08:00:00', '16:00:00', 60000, 10)
;

INSERT INTO terrain_parameter VALUES
	(DEFAULT, 'Analakely statium', 'foot', 'synthétique', 1, 'terrain.png', 1)
;

INSERT INTO identity_card VALUES
	(DEFAULT, 'card.png', 12345)
;

INSERT INTO customer VALUES
	(DEFAULT, 'Eric', 1, 'profil.png', 'Lot IIM Besarety', '0326080301', 'Eric@gmail.com')
;

INSERT INTO terrain VALUES
	(DEFAULT, 1, 1, 8, 40)
;

-- view --
-- info terrai --
CREATE OR REPLACE VIEW v_info_terrain AS 
	SELECT terrain_parameter.terrain_name, terrain_parameter.category, terrain_parameter.terrain_type, terrain.ratings, hourly_rate.price_per_hour,
	terrain.reservation_percentage, coordinate.longitude, coordinate.latitude, hourly_rate.start_time, hourly_rate.end_Time
	FROM terrain JOIN terrain_parameter ON terrain.id_parameter = terrain_parameter.id_parameter
	JOIN coordinate ON terrain_parameter.location = coordinate.id_coordinate 
	JOIN hourly_rate ON terrain_parameter.id_hourly_rate = hourly_rate.id_hourly_rate 
;
