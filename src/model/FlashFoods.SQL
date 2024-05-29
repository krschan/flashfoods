-- Create the database and use it
CREATE DATABASE IF NOT EXISTS FlashFood;
USE FlashFood;

-- Procedures for creating tables, inserting data, and dropping tables
DELIMITER //

CREATE PROCEDURE CreateTables()
BEGIN
    -- Create the 'city' table
    CREATE TABLE IF NOT EXISTS city (
        id_city INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50)
    );

    -- Create the 'user' table
    CREATE TABLE IF NOT EXISTS user (
        id_user INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        username VARCHAR(50) UNIQUE,
        password VARCHAR(255) NOT NULL,
        mail VARCHAR(100),
        birth_date DATE,
        phone_number VARCHAR(15),
        id_city INT,
        image VARCHAR(255),
        admin BOOLEAN,
        FOREIGN KEY (id_city) REFERENCES city (id_city)
    );

    -- Create the 'affiliation' table
    CREATE TABLE IF NOT EXISTS affiliation (
        id_affiliation INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50),
        phone_number VARCHAR(15),
        mail VARCHAR(100),
        description TEXT,
        image VARCHAR(255),
        id_user INT,
        FOREIGN KEY (id_user) REFERENCES user (id_user)
    );

    -- Create the 'membership' table
    CREATE TABLE IF NOT EXISTS membership (
        id_membership INT AUTO_INCREMENT PRIMARY KEY,
        type ENUM('free plan', 'premium plan', 'business plan'),
        id_user INT,
        id_affiliation INT,
        FOREIGN KEY (id_user) REFERENCES user (id_user),
        FOREIGN KEY (id_affiliation) REFERENCES affiliation (id_affiliation)
    );

    -- Create the 'discount' table
    CREATE TABLE IF NOT EXISTS discount (
        id_discount INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50),
        id_affiliation INT,
        FOREIGN KEY (id_affiliation) REFERENCES affiliation (id_affiliation)
    );

    -- Create the 'discount_x_city' relation table
    CREATE TABLE IF NOT EXISTS discount_x_city (
        id_discount INT,
        id_city INT,
        name VARCHAR(50),
        id_promo INT AUTO_INCREMENT PRIMARY KEY,
        FOREIGN KEY (id_discount) REFERENCES discount (id_discount),
        FOREIGN KEY (id_city) REFERENCES city (id_city)
    );

    -- Create the 'discount_x_membership' relation table
    CREATE TABLE IF NOT EXISTS discount_x_membership (
        id_discount INT,
        id_membership INT,
        PRIMARY KEY (id_discount, id_membership),
        FOREIGN KEY (id_discount) REFERENCES discount (id_discount),
        FOREIGN KEY (id_membership) REFERENCES membership (id_membership)
    );

    -- Create the 'user_x_discounts' relation table
    CREATE TABLE IF NOT EXISTS user_x_discounts (
        id_user INT,
        id_discount INT,
        PRIMARY KEY (id_user, id_discount),
        FOREIGN KEY (id_user) REFERENCES user (id_user),
        FOREIGN KEY (id_discount) REFERENCES discount (id_discount)
    );

    -- Create the 'affiliation_x_discounts' relation table
    CREATE TABLE IF NOT EXISTS affiliation_x_discounts (
        id_affiliation INT,
        id_discount INT,
        PRIMARY KEY (id_affiliation, id_discount),
        FOREIGN KEY (id_affiliation) REFERENCES affiliation (id_affiliation),
        FOREIGN KEY (id_discount) REFERENCES discount (id_discount)
    );
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE InsertData()
BEGIN
    -- Insert data into 'city' table
    INSERT INTO city (name) VALUES
    ('Madrid'),
    ('Barcelona'),
    ('Sevilla'),
    ('Valencia'),
    ('Bilbao'),
    ('Málaga'),
    ('Zaragoza'),
    ('Palma de Mallorca'),
    ('Granada'),
    ('Alicante');

END //

DELIMITER ;

DELIMITER //	

CREATE PROCEDURE DropTables()
BEGIN
    -- Drop all tables in the correct order to avoid foreign key constraints
    DROP TABLE IF EXISTS user_x_discounts;
    DROP TABLE IF EXISTS discount_x_membership;
    DROP TABLE IF EXISTS discount_x_city;
    DROP TABLE IF EXISTS affiliation_x_discounts;
    DROP TABLE IF EXISTS membership;
    DROP TABLE IF EXISTS discount;
    DROP TABLE IF EXISTS affiliation;
    DROP TABLE IF EXISTS user;
    DROP TABLE IF EXISTS city;
END //

DELIMITER ;

-- Call the procedures
CALL CreateTables();
CALL InsertData();

-- To drop all tables, call the DropTables procedure
-- CALL DropTables();

-- Useful queries
SELECT * FROM user;
SELECT * FROM affiliation;
DELETE FROM affiliation WHERE phone_number = 0000000;
;

