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