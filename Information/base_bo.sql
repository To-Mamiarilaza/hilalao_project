-- Abonnements
CREATE TABLE state (
	id_state SERIAL PRIMARY KEY,
	state_name VARCHAR(30)
);

CREATE TABLE subscription (
	id_subscription SERIAL PRIMARY KEY,
	id_terrain INT,
	id_state INT,
	payment_date DATE,
	start_subscription DATE,
	end_of_subscription DATE,
	price DOUBLE PRECISION,
	FOREIGN KEY (id_terrain) REFERENCES terrain(id_terrain),
	FOREIGN KEY (id_state) REFERENCES state(id_state)
);

-- Person Back Office
CREATE TABLE account_back_office (
	id_account SERIAL PRIMARY KEY,
	mail  VARCHAR(50),
	password  VARCHAR(50),
	firstname VARCHAR(50),
	name VARCHAR(30),
	telephone_number numeric(10,0)
);
-- Insertion de données dans la table person_back
INSERT INTO account_back_office (mail, password, firstname, name, telephone_number)
VALUES
    ('john@example.com', 'password123', 'John', 'Doe', 1234567890),
    ('jane@example.com', 'password456', 'Jane', 'Smith', 9876543210),
    ('bob@example.com', 'password789', 'Bob', 'Johnson', 5555555555);