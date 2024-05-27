-- Crear la base de datos
CREATE DATABASE FlashFood;
USE FlashFood;

-- Crear la tabla 'city'
CREATE TABLE city (
    id_city INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50)
);

-- Crear la tabla 'user'
CREATE TABLE user (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(50) NOT NULL,
    mail VARCHAR(100),
    birth_date DATE,
    phone_number VARCHAR(15),
    id_city INT,
    image VARCHAR(255),
    admin BOOLEAN,
    FOREIGN KEY (id_city)
        REFERENCES city (id_city)
);

-- Crear la tabla 'affiliation'
CREATE TABLE affiliation (
    id_affiliation INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    phone_number VARCHAR(15),
    mail VARCHAR(100),
    description TEXT,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES user (id_user)
);

-- Crear la tabla 'membership'
CREATE TABLE membership (
    id_membership INT AUTO_INCREMENT PRIMARY KEY,
    type ENUM('free plan', 'premium plan', 'business plan'),
    id_user INT,
    id_affiliation INT,
    FOREIGN KEY (id_user)
        REFERENCES user (id_user),
    FOREIGN KEY (id_affiliation)
        REFERENCES affiliation (id_affiliation)
);

-- Crear la tabla 'discount'
CREATE TABLE discount (
    id_discount INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    id_affiliation INT,
    FOREIGN KEY (id_affiliation)
        REFERENCES affiliation (id_affiliation)
);

-- Crear la tabla de relación 'discount_x_city' con restricciones de clave externa ajustadas
CREATE TABLE discount_x_city (
    id_discount INT,
    id_city INT,
    name VARCHAR(50),
    id_promo INT AUTO_INCREMENT PRIMARY KEY,
    FOREIGN KEY (id_discount)
        REFERENCES discount (id_discount),
    FOREIGN KEY (id_city)
        REFERENCES city (id_city)
);

-- Crear la tabla de relación muchos a muchos entre 'discount' y 'membership'
CREATE TABLE discount_x_membership (
    id_discount INT,
    id_membership INT,
    PRIMARY KEY (id_discount, id_membership),
    FOREIGN KEY (id_discount)
        REFERENCES discount (id_discount),
    FOREIGN KEY (id_membership)
        REFERENCES membership (id_membership)
);

-- Crear la tabla de relación muchos a muchos entre 'user' y 'discount'
CREATE TABLE user_x_discounts (
    id_user INT,
    id_discount INT,
    PRIMARY KEY (id_user, id_discount),
    FOREIGN KEY (id_user) REFERENCES user (id_user),
    FOREIGN KEY (id_discount) REFERENCES discount (id_discount)
);

-- Crear la tabla de relación muchos a muchos entre 'affiliation' y 'discount'
CREATE TABLE affiliation_x_discounts (
    id_affiliation INT,
    id_discount INT,
    PRIMARY KEY (id_affiliation, id_discount),
    FOREIGN KEY (id_affiliation) REFERENCES affiliation (id_affiliation),
    FOREIGN KEY (id_discount) REFERENCES discount (id_discount)
);

-- Insertar 10 locales de comida rápida en la tabla 'affiliation' (España)
INSERT INTO affiliation (name, phone_number, mail, description) VALUES
('McDonalds', '123-456-7890', 'mcdonalds@example.com', 'Famosa cadena de hamburguesas con opciones de comida rápida.'),
('BurgerKing', '987-654-3210', 'burgerking@example.com', 'Cadena internacional de hamburguesas y productos de comida rápida.'),
('KFC', '555-123-4567', 'kfc@example.com', 'Restaurante de pollo frito conocido mundialmente.'),
('TheGoodBurger', '888-777-5555', 'thegoodburger@example.com', 'Cadena española de hamburguesas gourmet y comida rápida.'),
('FosterHollywood', '111-222-3333', 'fosterhollywood@example.com', 'Restaurante temático estadounidense con énfasis en platos variados.'),
('DominosPizza', '444-333-2222', 'dominospizza@example.com', 'Cadena internacional de pizzerías con entrega a domicilio.'),
('TacoBell', '666-999-8888', 'tacobell@example.com', 'Cadena estadounidense de comida rápida especializada en tacos.'),
('Viena', '777-888-9999', 'viena@example.com', 'Cadena de restaurantes con énfasis en comida rápida y opciones variadas.'),
('100Montaditos', '222-444-6666', '100montaditos@example.com', 'Cadena española conocida por sus montaditos variados y económicos.'),
('Pans&Company', '333-555-7777', 'pansandcompany@example.com', 'Cadena de restaurantes especializada en bocadillos y panes variados.');

-- Insertar ciudades en la tabla 'city'
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

-- Insertar usuarios en la tabla 'user'
INSERT INTO user (name, surname, username, password, mail, birth_date, phone_number, id_city, image, admin) VALUES
('Juan', 'Pérez', 'juanperez', 'password123', 'juan@example.com', '1990-01-15', '123-456-7890', 1, 'C:/Users/draig/Desktop/Stucom/M4_LlenguatgeMarques/ProyectoFlashFood/src/assets/img/burgers/burger-1.png', 0), 
('Ana', 'Gómez', 'anagomez', 'password456', 'ana@example.com', '1985-03-22', '987-654-3210', 2, 'C:/Users/draig/Desktop/Stucom/M4_LlenguatgeMarques/ProyectoFlashFood/src/assets/img/burgers/burger-1.png', 0), 
('Carlos', 'Hernández', 'carloshdz', 'pass789', 'carlos@example.com', '1992-07-10', '555-123-4567', 3, 'C:/Users/draig/Desktop/Stucom/M4_LlenguatgeMarques/ProyectoFlashFood/src/assets/img/burgers/burger-1.png', 0), 
('Laura', 'Martínez', 'lauramtz', 'pass789', 'laura@example.com', '1988-05-18', '888-777-5555', 4, 'C:/Users/draig/Desktop/Stucom/M4_LlenguatgeMarques/ProyectoFlashFood/src/assets/img/burgers/burger-1.png', 0), 
('Pedro', 'Sánchez', 'pedrosan', 'pass789', 'pedro@example.com', '1991-11-28', '111-222-3333', 5, 'C:/Users/draig/Desktop/Stucom/M4_LlenguatgeMarques/ProyectoFlashFood/src/assets/img/burgers/burger-1.png', 0), 
('María', 'López', 'marialpz', 'pass789', 'maria@example.com', '1987-09-05', '444-333-2222', 6, 'C:/Users/draig/Desktop/Stucom/M4_LlenguatgeMarques/ProyectoFlashFood/src/assets/img/burgers/burger-1.png', 0), 
('Lucía', 'Fernández', 'luciafer', 'pass789', 'lucia@example.com', '1993-02-20', '666-999-8888', 7, 'C:/Users/draig/Desktop/Stucom/M4_LlenguatgeMarques/ProyectoFlashFood/src/assets/img/burgers/burger-1.png', 0), 
('Javier', 'García', 'javierg', 'pass789', 'javier@example.com', '1989-08-14', '777-888-9999', 8, 'C:/Users/draig/Desktop/Stucom/M4_LlenguatgeMarques/ProyectoFlashFood/src/assets/img/burgers/burger-1.png', 0), 
('Elena', 'Ruiz', 'elenar', 'pass789', 'elena@example.com', '1994-04-03', '222-444-6666', 9, 'C:/Users/draig/Desktop/Stucom/M4_LlenguatgeMarques/ProyectoFlashFood/src/assets/img/burgers/burger-1.png', 0), 
('Antonio', 'Fernández', 'antoniof', 'pass789', 'antonio@example.com', '1986-12-10', '333-555-7777', 10, 'C:\Users\draig\Desktop\Stucom\M4_LlenguatgeMarques\ProyectoFlashFood\src\assets\img\burgers\burger-1.png', 0); 


-- Insertar datos en la tabla 'discount'
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
