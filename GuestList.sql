USE test;

DROP DATABASE IF EXISTS guest_list;

CREATE DATABASE guest_list;

USE guest_list;

CREATE TABLE g_list (
	g_id int(32) NOT NULL AUTO_INCREMENT,
    g_fname varchar(32) NOT NULL,
    g_lname varchar(32) NOT NULL,
    g_phone varchar(32),
    g_association varchar(128),
    PRIMARY KEY (g_id)
    );

INSERT INTO g_list ( g_fname, g_lname, g_association ) 
VALUES 
( 'Hugh', 'Morris', 'Chaplain - First Woodburn Church' ),
( 'Flint', 'Sparks', 'Director & Embalmer - Woodburn Funeral Home' ),
( 'Gail', 'Force', 'Receptionist - Woodburn Funeral Home' ),
( 'Ohpelia', 'Payne', 'Assistant - Woodburn Funeral Home' ),
( 'Rusty', 'Pipes', 'Musician - Woodburn Funeral Home' ),
( 'Les', 'Payne', 'Family Counselor - Woodburn Funeral Home' ),
( 'Marsha', 'Mellow', 'Family Counselor - Woodburn Funeral Home' ),
( 'Mark', 'Post', 'Pallbearer & Grounds Technician - Eternal Wrest Cemetery' ),
( 'Phil', 'Graves', 'Pallbearer & Grounds Technician - Eternal Wrest Cemetery' );

UPDATE g_list 
SET g_phone = '541-555-0303';

UPDATE g_list
SET g_phone = '541-555-2364'
WHERE g_id = 1;

-- WARNING: You will need to uncomment the following lines if this is a new DB
-- CREATE USER 'diggerPHP'@'Localhost' IDENTIFIED BY 'Craddle2theGrave';
-- GRANT SELECT, INSERT, UPDATE ON guest_list.* TO 'diggerPHP'@'Localhost';

UPDATE `guest_list`.`g_list` SET `g_phone`='graves.philippe@eternalwrest.biz' WHERE `g_id`='9';
UPDATE `guest_list`.`g_list` SET `g_phone`='post.mark@eternalwrest.biz' WHERE `g_id`='8';


SELECT * FROM g_list;