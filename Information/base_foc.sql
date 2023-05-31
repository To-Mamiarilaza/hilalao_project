--- Photo de profil
CREATE TABLE profile_pictures (
	id_profile_picture SERIAL PRIMARY KEY,
	value VARCHAR(30)
);

--- Le client 
CREATE TABLE customer (
	id_customer SERIAL PRIMARY KEY,
	customers_name VARCHAR(100) NOT NULL,
	number_card VARCHAR(12),								--- Numero du carte d'identite (utile pour les verifications)
	profile_picture INT,					--- Photo de profil
	adress VARCHAR(50) NOT NULL,
	phone_numbers VARCHAR(13) NOT NULL,
	email VARCHAR(50) NOT NULL,
	password VARCHAR(20) NOT NULL,
	Foreign Key (profile_picture) REFERENCES profile_pictures(id_profile_picture)
);

--- coordonnee du terrain pour localiser le terrain dans une carte maps
CREATE TABLE coordinate (
	id_coordinate SERIAL PRIMARY KEY,
	longitude DOUBLE PRECISION,			
	latitude DOUBLE PRECISION					
);

--- Jour hebdomadaire
CREATE TABLE weekly_day (
	id_day SERIAL PRIMARY KEY,
	the_day VARCHAR(20)										--- Jour L,Ma,Me,J,V,S,D
);

--- Tarif horaire du terrain (en fonction du temps et du jour)
CREATE TABLE hourly_rate (
	id_hourly_rate SERIAL PRIMARY KEY,
	a_day INT,												--- Foreign Key weekly_day
	start_time TIME,
	end_Time TIME,
	total_price DOUBLE PRECISION,							--- Prix horaire du tarif
	discount DOUBLE PRECISION,								--- Remise
	Foreign Key (a_day) REFERENCES weekly_day(id_day)
);

--- categoriries du terrain 
CREATE TABLE category_terrain (
	id_category_terrain SERIAL PRIMARY KEY,
	value VARCHAR(20)
);

--- types du terrain
CREATE TABLE type_terrain (
	id_type_terrain SERIAL PRIMARY KEY,
	value VARCHAR(20)
);

---communes o`u se localise le terrain
CREATE TABLE municipalities (
	id_municipalities SERIAL PRIMARY KEY,
	value VARCHAR(20)
);

--- Le terrain
CREATE TABLE terrain (
	id_terrain SERIAL PRIMARY KEY,
	id_customer INT NOT NULL,					--- Propriétaire du terrain
	ratings DOUBLE PRECISION,					--- Moyenne d'evaluation par les Users
	reservation_percentage DOUBLE PRECISION,
	FOREIGN KEY (id_customer) REFERENCES customer(id_customer)
);

--- Parametre du terrain
CREATE TABLE terrain_parameter (
	terrain_name VARCHAR(30),
	id_category_terrain INT,					--- foot, basket, volley, rugby, tennis, ...
	id_type_terrain INT,						--- synthétique, goudron, salle, couvert, ...
	terrain_location INT,						--- localisation du terrain
	id_municipalities INT,						--- Commune du terrian 
	id_hourly_rate INT,							--- Horaire du terrain
	id_terrain INT,
	FOREIGN KEY (terrain_location) REFERENCES coordinate(id_coordinate),
	FOREIGN KEY (id_hourly_rate) REFERENCES hourly_rate(id_hourly_rate),
	FOREIGN KEY (id_category_terrain) REFERENCES category_terrain(id_category_terrain),
	FOREIGN KEY (id_type_terrain) REFERENCES type_terrain(id_type_terrain),
	FOREIGN KEY (id_municipalities) REFERENCES municipalities(id_municipalities),
	Foreign Key (id_terrain) REFERENCES terrain(id_terrain)
);

CREATE TABLE terrain_pictures (
	id_pictures SERIAL PRIMARY KEY,
	value VARCHAR(60),
	terrain INT,
	Foreign Key (terrain) REFERENCES terrain(id_terrain)
);

--- Disponibilite du terrain(id_terrain) a ce jour(id_day) a partir de tel heure(star_time) jusqu'a tel heure(end_time)
CREATE TABLE availability (
	id_availability SERIAL PRIMARY KEY,
	id_day INT,
	id_terrain INT,
	start_time TIME,
	end_time TIME,
	FOREIGN KEY (id_day) REFERENCES weekly_day(id_day),
	FOREIGN KEY (id_terrain) REFERENCES terrain(id_terrain)
);

--- Etat des reservations(en attente, annuler, confirmer, en retard...)
CREATE TABLE reservation_status (
	id_reservation_status SERIAL PRIMARY KEY,
	value VARCHAR(10)
);

--- Type reservation (physique, non physique...) (presentiel, a distance)
CREATE TABLE reservation_type (
	id_reservation_type SERIAL PRIMARY KEY,
	value VARCHAR(10)
);

--- Pour reserver
CREATE TABLE reservation (
	id_reservation SERIAL PRIMARY KEY,
	id_terrain INT,
	id_user INT,
	id_reservation_status INT,					--- Etat de reservation
	reservation_type VARCHAR(30),				--- Type de reservation
	start_time TIMESTAMP,						--- Heure debut du reservation
	end_time TIMESTAMP,							--- Heure fin du reservation
	FOREIGN KEY (id_terrain) REFERENCES terrain(id_terrain),
	FOREIGN KEY (id_reservation_status) REFERENCES reservation_status(id_reservation_status)
);

---Mathode du payement
CREATE TABLE payment_method (
	id_payment_method SERIAL PRIMARY KEY,
	value VARCHAR(20)
);

---Payment
CREATE TABLE payment (
	id_payment SERIAL PRIMARY KEY,
	id_payment_method INT,							--- Methode du payment
	id_subscription INT,							--- Aboonement
	amount DOUBLE PRECISION,						--- Montant
	payment_date_time TIMESTAMP,					--- Date du payment
	FOREIGN KEY (id_payment_method) REFERENCES payment_method(id_payment_method),
	FOREIGN KEY (id_subscription) REFERENCES subscription(id_subscription)
);

-----Ireto olona ireto irery ihany no afaka manova anireo table ireo : Chalman, fy, Vioart
-----Izay olona hafa te hanova anireo dia tsy maintsy miteny aminay alou (ireo ambony ireo ny anaranay)
-----Fa ny vue aminy alalan'ireo table ireo ihany no afaka foroninareo aminy zay tokony ilaivanareo azy any