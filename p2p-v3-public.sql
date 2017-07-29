DROP DATABASE IF EXISTS heroku_381873c510155b2;
CREATE DATABASE heroku_381873c510155b2;
USE heroku_381873c510155b2;

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

DROP TABLE IF EXISTS staffs;
CREATE TABLE staffs(
	id INT PRIMARY KEY AUTO_INCREMENT,
	staff_id_number VARCHAR(255) NOT NULL,
	ateneo_email VARCHAR(255) NOT NULL,
	unit VARCHAR(255),
	department VARCHAR(255)
);

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

DROP TABLE IF EXISTS locations;
CREATE TABLE locations(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	trip_type BOOLEAN
);

DROP TABLE IF EXISTS timeslots;
CREATE TABLE timeslots(
	id INT PRIMARY KEY AUTO_INCREMENT,
	time_slot TIME NOT NULL
);

DROP TABLE IF EXISTS schedules;
CREATE TABLE schedules(
	id INT PRIMARY KEY AUTO_INCREMENT,
	timeslot_id INT,
	location_id INT,
	FOREIGN KEY (location_id) REFERENCES locations(id),
	FOREIGN KEY (timeslot_id) REFERENCES timeslots(id)
);

DROP TABLE IF EXISTS slots;
CREATE TABLE slots(
	id INT PRIMARY KEY AUTO_INCREMENT,
	schedule_id INT,
	date_slots DATE,
	num_of_seats INT NOT NULL,
	status VARCHAR(255),
	FOREIGN KEY (schedule_id) REFERENCES schedules(id)
);

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

DROP TABLE IF EXISTS announcements;
CREATE TABLE announcements( 
	id INT PRIMARY KEY AUTO_INCREMENT,
	created_at DATETIME NULL,
	updated_at DATETIME NULL,
	title VARCHAR(255),
	content TEXT
);

DROP TABLE IF EXISTS contacts;
CREATE TABLE contacts(
	id INT PRIMARY KEY AUTO_INCREMENT,
	contact_faculty VARCHAR(255),
	contact_number VARCHAR(255)
);

-- DUMMY DATA ------------------------------------------------

INSERT INTO loyolaschools (ls_id_number, obf_email)
VALUES 
	('141369', 'jan.domingo@obf.ateneo.edu'),
	('141370', 'jc.andan@obf.ateneo.edu'),
	('141371', 'carlo.natividad@obf.ateneo.edu'),
	('143812', 'anton.suba@obf.ateneo.edu');

INSERT INTO staffs (staff_id_number, ateneo_email)
VALUES
	('1234', 'impuerto@ateneo.edu'),
	('1245', 'salumbides@ateneo.edu');

INSERT INTO highschools(hs_id_number, grade_level,section)
VALUES
	('00123', '12', 'A'),
	('00124', '11', 'B');

INSERT INTO locations(trip_type, name)
VALUES
	(0, 'SM Markina'),
	(0, 'Temple Drive'),
	(0, 'UP TechnoHub'),
	(0, 'UP Town Center'),
	(1, 'Northbound'),
	(1, 'Southbound');

INSERT INTO timeslots(time_slot)
VALUES
	('06:15:00'),
	('06:45:00'),
	('07:15:00'),
	('05:15:00'),
	('05:45:00');

INSERT INTO schedules(timeslot_id, location_id)
VALUES
	(2, 2),
	(12, 2),
	(22, 2),
	(2, 12),
	(12, 12),
	(22, 12),
	(2, 22),
	(12, 22),
	(22, 32),
	(32, 42),
	(42, 42),
	(32, 52),
	(42, 52);

INSERT INTO slots(schedule_id, num_of_seats)
VALUES
	(2, 50),
	(12, 50),
	(102, 50);

-- INSERT INTO reservations(user_id, slot_id)
-- VALUES
-- 	(1,4),
-- 	(1,5),
-- 	(1,6),
-- 	(2,7),
-- 	(2,8),
-- 	(2,9);


INSERT INTO announcements(title, content)
VALUES
	("Reminders on Trip Reservation", "Please text us not later than 3:00 PM. Beyond 
		that, you may go to your desired trip as a chance passenger. (Note: There is 
		no separate list for chance passengers so no need to text). Thank you!"),
	("Changes in Schedule", "lease be advised that effective Wednesday, September 
		21, 2016, the 5:15 pm Westbound (UP TechnoHub bus stop -Trinoma) and 
		Southbound (Temple Drive - Shell Julia Vargas - Market!Market!) trips will 
		have a new schedule of 5:30 PM. Thank you!");

INSERT INTO contacts(contact_faculty, contact_number)
VALUES
	("AJHS/ASHS", '+63 928 8235 801'),
	("LS/Employees/University Affiliates", '+63 928 8235 816'),
	("LS/Employees/University Affiliates", '+63 928 8235 827');

-- SOURCE C:/Users/Nikki Domingo/Documents/Projects/ateneo-p2p-public/p2p-v3.sql;
-- UPDATE users SET is_admin=1 WHERE id=2;
-- mysql -u b4435099d5e20d -p -h us-cdbr-iron-east-03.cleardb.net
-- dded3c4c