CREATE TABLE users (
	id_user SERIAL PRIMARY KEY,
	name VARCHAR(35) NOT NULL,
	email VARCHAR(35) NOT NULL,
	dtn DATE NOT NULL,
	id_genre INT,
	mdp VARCHAR(35) NOT NULL,
	FOREIGN KEY (id_genre) REFERENCES genre(id_genre)
);

CREATE TABLE genre (
    id_genre SERIAL PRIMARY KEY,
    genre    VARCHAR(10) NOT NULL
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

	(DEFAULT, 'Eric', 'Eric@gmail.com', '2007-11-29')
	(DEFAULT, 'Tiavina', 'tiavina@gmail.com', '2005-10-29')
;

