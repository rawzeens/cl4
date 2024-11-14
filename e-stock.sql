CREATE TABLE stock (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL,
    img VARCHAR(255),
    created_date DATE,
    created_time TIME
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    stock_id INT,
    name VARCHAR(255) NOT NULL,
    nama VARCHAR(255) NOT NULL,
    unit VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    status INT NOT NULL DEFAULT 0,
    confirm INT NOT NULL DEFAULT 0,
    quantity INT NOT NULL,
    created_date DATE,
    created_time TIME
);


INSERT INTO stock (name, price, quantity) VALUES
    ('Item 1', 10.99, 20),
    ('Item 2', 5.99, 15),
    ('Item 3', 7.49, 30);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES
    ('admin', 'admin123');
