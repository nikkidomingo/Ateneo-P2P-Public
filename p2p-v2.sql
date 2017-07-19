DROP DATABASE IF EXISTS p2p;
CREATE DATABASE p2p;
USE p2p;

DROP TABLE IF EXISTS users;
CREATE TABLE users(
	id INT PRIMARY KEY AUTO_INCREMENT,
	last_name VARCHAR(255) NOT NULL,
	first_name VARCHAR(255) NOT NULL,
	middle_initial VARCHAR(255),
	mobile_number VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	is_admin BOOLEAN DEFAULT 0,
	email VARCHAR(255),
	user_type INT,
	remember_token VARCHAR(100),
	created_at timestamp NULL,
	updated_at timestamp NULL
);

DROP TABLE IF EXISTS loyolaschools;
CREATE TABLE loyolaschools(
	id INT PRIMARY KEY AUTO_INCREMENT,
	ls_id_number VARCHAR(255) NOT NULL,
	obf_email VARCHAR(255) NOT NULL
);

INSERT INTO loyolaschools (ls_id_number, obf_email)
VALUES 
	('141369', 'jan.domingo@obf.ateneo.edu'),
	('141370', 'jc.andan@obf.ateneo.edu'),
	('141371', 'carlo.natividad@obf.ateneo.edu'),
	('141372', 'anton.suba@obf.ateneo.edu');

DROP TABLE IF EXISTS staffs;
CREATE TABLE staffs(
	id INT PRIMARY KEY AUTO_INCREMENT,
	staff_id_number VARCHAR(255) NOT NULL,
	ateneo_email VARCHAR(255) NOT NULL,
	unit VARCHAR(255),
	department VARCHAR(255)
);

INSERT INTO staffs (staff_id_number, ateneo_email)
VALUES
	('1234', 'impuerto@ateneo.edu'),
	('1245', 'salumbides@ateneo.edu');

DROP TABLE IF EXISTS highschools;
CREATE TABLE highschools(
	id INT PRIMARY KEY AUTO_INCREMENT,
	hs_id_number VARCHAR(255) NOT NULL,
	grade_level VARCHAR(255) NOT NULL,
	section VARCHAR(255) NOT NULL,
	guardian_name VARCHAR(255),
	guardian_email VARCHAR(255),
	guardian_mobile_number VARCHAR(255)
);

INSERT INTO highschools(hs_id_number, grade_level,section)
VALUES
	('00123', '12', 'A'),
	('00124', '11', 'B');

DROP TABLE IF EXISTS locations;
CREATE TABLE locations(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL
);

INSERT INTO locations(name)
VALUES
	('AJHS / ASHS'),
	('SM Markina'),
	('Temple Drive'),
	('UP TechnoHub'),
	('LS / Employees');

DROP TABLE IF EXISTS timeslots;
CREATE TABLE timeslots(
	id INT PRIMARY KEY AUTO_INCREMENT,
	time_slot TIME NOT NULL
);

INSERT INTO timeslots(time_slot)
VALUES
	('06:15:00'),
	('06:45:00'),
	('07:15:00'),
	('05:15:00'),
	('05:45:00');

DROP TABLE IF EXISTS slots;
CREATE TABLE slots(
	id INT PRIMARY KEY AUTO_INCREMENT,
	date_slots DATETIME,
	location_id INT,	
	is_pickup BOOLEAN,
	is_dropoff BOOLEAN,
	timeslot_id INT,
	num_of_seats INT NOT NULL,
	status VARCHAR(255),
	FOREIGN KEY (location_id) REFERENCES locations(id),
	FOREIGN KEY (timeslot_id) REFERENCES timeslots(id)
);

INSERT INTO slots (location_id,is_pickup,is_dropoff, timeslot_id,num_of_seats)
VALUES
	(1, TRUE, FALSE, 1, 50),
	(2, FALSE, TRUE, 2, 40),
	(3, TRUE, FALSE, 1, 30);

DROP TABLE IF EXISTS reservations;
CREATE TABLE reservations(
	id INT PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	slot_id INT NOT NULL,
	comment VARCHAR(255),
	num_of_passengers INT,
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (slot_id) REFERENCES slots(id)
);

-- INSERT INTO reservations(user_id, slot_id, comment, num_of_passengers)
-- VALUES
-- 	(2,1,"Mars' Reservation #1", 1),
-- 	(2,2,"Mars' Reservations #2", 1),
-- 	(3,2,"Katkat's Reservation #1", 2);

DROP TABLE IF EXISTS announcements;
CREATE TABLE announcements( 
	id INT PRIMARY KEY AUTO_INCREMENT,
	created_at timestamp NULL,
	title VARCHAR(255),
	content TEXT
);

INSERT INTO announcements(title, content)
VALUES
	("Reminders on Trip Reservation", "Please text us not later than 3:00 PM. Beyond 
		that, you may go to your desired trip as a chance passenger. (Note: There is 
		no separate list for chance passengers so no need to text). Thank you!"),
	("Changes in Schedule", "lease be advised that effective Wednesday, September 
		21, 2016, the 5:15 pm Westbound (UP TechnoHub bus stop -Trinoma) and 
		Southbound (Temple Drive - Shell Julia Vargas - Market!Market!) trips will 
		have a new schedule of 5:30 PM. Thank you!");

DROP TABLE IF EXISTS contacts;
CREATE TABLE contacts(
	id INT PRIMARY KEY AUTO_INCREMENT,
	location_id INT,
	contact_number VARCHAR(255),
	FOREIGN KEY (location_id) REFERENCES locations(id)
);

INSERT INTO contacts(location_id, contact_number)
VALUES
	(1, '+63 928 8235 801'),
	(2, '+63 928 8235 816'),
	(2, '+63 928 8235 827'),
	(3, '+63 928 8235 830'),
	(3, '+63 928 8235 838'),
	(4, '+63 928 8235 865'),
	(4, '+63 928 8235 846'),
	(5, '+63 920 9491 284'),
	(5, '+63 917 7190 915');

