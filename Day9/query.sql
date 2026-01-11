USE ecommerce_db;

ALTER TABLE products ADD COLUMN gambar VARCHAR(255);

ALTER TABLE orders DROP FOREIGN KEY orders_ibfk_2;

ALTER TABLE orders
ADD CONSTRAINT orders_ibfk_2 FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE CASCADE;