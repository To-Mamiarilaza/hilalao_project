CREATE DATABASE hilalao;
\c hilalao;


-- front office client

CREATE TABLE identity_card (
	id_card SERIAL PRIMARY KEY,
	card_picture VARCHAR(30) NOT NULL,
	card_number VARCHAR(20) NOT NULL
);

CREATE TABLE customer (
	id_customer SERIAL PRIMARY KEY,
	name VARCHAR(100) NOT NULL,
	profile_picture VARCHAR(30) NOT NULL,
	address VARCHAR(50) NOT NULL,
	phone_numbers VARCHAR(13) NOT NULL,
	email VARCHAR(50) NOT NULL,
	password VARCHAR(20) NOT NULL
);

CREATE TABLE coordinate (
	id_coordinate SERIAL PRIMARY KEY,
	municipality VARCHAR(30),					-- Commune
	longitude DOUBLE PRECISION,				-- Longitude
	latitude DOUBLE PRECISION					-- Latitude
);

CREATE TABLE hourly_rate (
	id_hourly_rate SERIAL PRIMARY KEY,
	start_time TIME,
	end_Time TIME,
	price_per_hour DOUBLE PRECISION,
	discount DOUBLE PRECISION					-- Remise
);

CREATE TABLE terrain_parameter (
	id_parameter SERIAL PRIMARY KEY,
	terrain_name VARCHAR(30),
	category VARCHAR(30),						-- foot, basket, volley, rugby, tennis, ...
	terrain_type VARCHAR(30),					-- synthétique, goudron, salle, couvert, ...
	location INT,								-- localisation du terrain
	pictures VARCHAR(30),
	id_hourly_rate INT,
	FOREIGN KEY (Location) REFERENCES coordinate(id_coordinate),
	FOREIGN KEY (id_hourly_rate) REFERENCES hourly_rate(id_hourly_rate)
);

CREATE TABLE terrain (
	id_terrain SERIAL PRIMARY KEY,
	id_customer INT NOT NULL,						-- Propriétaire du terrain
	id_parameter INT,
	ratings INT,
	reservation_percentage DOUBLE PRECISION,
	FOREIGN KEY (id_customer) REFERENCES customer(id_customer),
	FOREIGN KEY (id_parameter) REFERENCES terrain_parameter(id_parameter)
);

CREATE TABLE day (
	id_day SERIAL PRIMARY KEY,
	the_day DATE
);

CREATE TABLE availability (
	id_availability SERIAL PRIMARY KEY,
	id_day INT,
	id_terrain INT,
	start_time TIMESTAMP,
	end_time TIMESTAMP,
	Status BOOLEAN DEFAULT FALSE,
	FOREIGN KEY (id_day) REFERENCES day(id_day),
	FOREIGN KEY (id_terrain) REFERENCES terrain(id_terrain)
);

CREATE TABLE reservation_status (
	id_reservation_status SERIAL PRIMARY KEY,
	wording VARCHAR(10)
);

CREATE TABLE reservation (
	id_reservation SERIAL PRIMARY KEY,
	id_terrain INT,
	id_user INT,
	id_status INT,
	start_time TIMESTAMP,
	end_time TIMESTAMP,
	reservation_type VARCHAR(30),
	FOREIGN KEY (id_terrain) REFERENCES terrain(id_terrain),
	FOREIGN KEY (id_status) REFERENCES reservation_status(id_reservation_status)
);

CREATE TABLE payment_method (
	id_payment_method SERIAL PRIMARY KEY,
	wording VARCHAR(20)
);

CREATE TABLE payment (
	id_payment SERIAL PRIMARY KEY,
	id_payment_method INT,
	id_subscribe INT,
	amount DOUBLE PRECISION,					-- Montant
	payment_date_time TIMESTAMP,
	FOREIGN KEY (id_payment_method) REFERENCES payment_method(id_payment_method),
	FOREIGN KEY (id_subscribe) REFERENCES subscribe(id_subscribe)
);

CREATE OR REPLACE VIEW v_terrain_lists AS SELECT * FROM terrain;
CREATE OR REPLACE VIEW v_reservation_lists AS SELECT * FROM reservation;


-- Front office utilisateur
CREATE TABLE users (
	id_user SERIAL PRIMARY KEY,
	name VARCHAR(35) NOT NULL,
	email VARCHAR(35) NOT NULL,
	dtn DATE NOT NULL,
	genre VARCHAR(1) NOT NULL,
	mdp VARCHAR(35) NOT NULL
);

-- Back office
CREATE TABLE state (
	id_state SERIAL PRIMARY KEY,
	state_name VARCHAR(30)
);

CREATE TABLE subscribe (
	id_subscribe SERIAL PRIMARY KEY,
	id_terrain INT,
	id_state INT,
	payment_date DATE,
	start_subscribe DATE,
	end_of_subscribe DATE,
	price DOUBLE PRECISION,
	FOREIGN KEY (id_terrain) REFERENCES terrain(id_terrain),
	FOREIGN KEY (id_state) REFERENCES state(id_state)
);

CREATE OR REPLACE VIEW v_list_users AS
SELECT u.id_user, u.name, u.email, u.dtn, u.mdp, g.genre, g.id_genre, u.contact
FROM users u
JOIN genre g ON u.id_genre=g.id_genre
