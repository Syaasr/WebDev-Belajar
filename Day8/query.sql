USE ecommerce_db;

ALTER TABLE products ADD COLUMN kategori VARCHAR(50);

INSERT INTO
    products (
        nama_produk,
        harga,
        deskripsi,
        stok,
        kategori
    )
VALUES (
        'Laptop Asus',
        12000000,
        'Laptop kerja kencang',
        5,
        'elektronik'
    ),
    (
        'iPhone 13',
        15000000,
        'HP kamera bagus',
        3,
        'elektronik'
    ),
    (
        'Kemeja Flannel',
        150000,
        'Bahan adem',
        20,
        'pakaian'
    ),
    (
        'Celana Jeans',
        300000,
        'Model slim fit',
        15,
        'pakaian'
    ),
    (
        'Sepatu Running',
        500000,
        'Enak buat lari pagi',
        10,
        'olahraga'
    );