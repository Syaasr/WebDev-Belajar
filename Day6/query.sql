CREATE DATABASE ecommerce_db;

USE ecommerce_db;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(255) NOT NULL,
    harga INT NOT NULL,
    deskripsi TEXT,
    stok INT NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT,
    total INT,
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (product_id) REFERENCES products (id)
);

INSERT INTO
    products (
        nama_produk,
        harga,
        deskripsi,
        stok
    )
VALUES (
        'Laptop Gaming Asus',
        15000000,
        'Laptop spek tinggi untuk game berat',
        10
    );

INSERT INTO
    products (
        nama_produk,
        harga,
        deskripsi,
        stok
    )
VALUES (
        'Mouse Wireless',
        150000,
        'Mouse tanpa kabel hemat baterai',
        50
    );

INSERT INTO
    users (nama, email, password)
VALUES (
        'John Doe',
        'john@example.com',
        'password123'
    );

INSERT INTO
    users (nama, email, password)
VALUES (
        'Jane Smith',
        'jane@example.com',
        'password456'
    );

INSERT INTO
    orders (
        user_id,
        product_id,
        quantity,
        total
    )
VALUES (1, 1, 2, 30000000);

INSERT INTO
    orders (
        user_id,
        product_id,
        quantity,
        total
    )
VALUES (2, 2, 1, 150000);

SELECT * FROM products;

SELECT * FROM users;

SELECT * FROM orders;

UPDATE products SET stok = 15 WHERE id = 1;

UPDATE users SET nama = 'Joko' WHERE id = 1;

UPDATE orders SET quantity = 2 WHERE order_id = 1;

DELETE FROM products WHERE id = 1;

DELETE FROM users WHERE id = 1;

DELETE FROM orders WHERE order_id = 1;