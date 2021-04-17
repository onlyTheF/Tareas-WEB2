CREATE DATABASE example1;

USE example1;

CREATE TABLE product
(
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2),
    PRIMARY KEY(id)
)
ENGINE INNODB;

INSERT INTO product(name, description, price) VALUES ('Paper block', 'Something about paper', 30);
INSERT INTO product(name, description, price) VALUES ('Pencil set', 'A nice box of pencils', 10);
INSERT INTO product(name, description, price) VALUES ('Paper binder', 'A nice paper binder', 15);
INSERT INTO product(name, description, price) VALUES ('Pen box', 'A nice box of pens', 20);
INSERT INTO product(name, description, price) VALUES ('Eraser', 'A nice set of erasers', 15);
