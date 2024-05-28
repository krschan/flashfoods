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

    -- Insert data into 'user' table
    INSERT INTO user (name, username, password, mail, birth_date, phone_number, id_city, image, admin) VALUES
    ('Juan', 'juanperez', 'password123', 'juan@example.com', '1990-01-15', '123-456-7890', 1, null, 0), 
    ('Ana', 'anagomez', 'password456', 'ana@example.com', '1985-03-22', '987-654-3210', 2, null, 0), 
    ('Carlos', 'carloshdz', 'pass789', 'carlos@example.com', '1992-07-10', '555-123-4567', 3, null, 0), 
    ('Laura', 'lauramtz', 'pass789', 'laura@example.com', '1988-05-18', '888-777-5555', 4, null, 0),
    ('Pedro', 'pedrosan', 'pass789', 'pedro@example.com', '1991-11-28', '111-222-3333', 5, null, 0);

    -- Insert data into 'affiliation' table
    INSERT INTO affiliation (name, phone_number, mail, description) VALUES
    ('McDonalds', '123-456-7890', 'mcdonalds@example.com', 'Famous burger chain with fast food options.'),
    ('BurgerKing', '987-654-3210', 'burgerking@example.com', 'International burger chain and fast food products.'),
    ('KFC', '555-123-4567', 'kfc@example.com', 'World-famous fried chicken restaurant.'),
    ('TheGoodBurger', '888-777-5555', 'thegoodburger@example.com', 'Spanish gourmet burger and fast food chain.'),
    ('FosterHollywood', '111-222-3333', 'fosterhollywood@example.com', 'American-themed restaurant with a variety of dishes.'),
    ('DominosPizza', '444-333-2222', 'dominospizza@example.com', 'International pizza chain with home delivery.'),
    ('TacoBell', '666-999-8888', 'tacobell@example.com', 'American fast food chain specializing in tacos.'),
    ('Viena', '777-888-9999', 'viena@example.com', 'Restaurant chain with emphasis on fast food and varied options.'),
    ('100Montaditos', '222-444-6666', '100montaditos@example.com', 'Spanish chain known for its varied and affordable montaditos.'),
    ('Pans&Company', '333-555-7777', 'pansandcompany@example.com', 'Restaurant chain specializing in sandwiches and varied breads.');

    -- Insert data into 'discount' table
    INSERT INTO discount (name, id_affiliation) VALUES
    ('Descuento McDonalds', 1),
    ('Oferta BurgerKing', 2),
    ('Promoción KFC', 3),
    ('Descuento TheGoodBurger', 4),
    ('Oferta FosterHollywood', 5),
    ('Cupón DominosPizza', 6),
    ('Descuento TacoBell', 7),
    ('Oferta Viena', 8),
    ('Promoción 100Montaditos', 9),
    ('Cupón Pans&Company', 10);
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

--  Useful queries
SELECT * FROM user;
