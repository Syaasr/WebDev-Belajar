const dataProduk = [
    {
        id: 1,
        nama: "Laptop Gaming",
        harga: 15000000,
        kategori: "elektronik",
        gambar: "https://via.placeholder.com/300x200?text=Laptop",
        deskripsi: "Laptop kencang untuk main game berat."
    },
    {
        id: 2,
        nama: "Kaos Polos",
        harga: 50000,
        kategori: "fashion",
        gambar: "https://via.placeholder.com/300x200?text=Kaos",
        deskripsi: "Bahan katun nyaman dipakai sehari-hari."
    },
    {
        id: 3,
        nama: "Burger Spesial",
        harga: 35000,
        kategori: "makanan",
        gambar: "https://via.placeholder.com/300x200?text=Burger",
        deskripsi: "Daging sapi asli dengan keju melimpah."
    },
    {
        id: 4,
        nama: "Headphone Bluetooth",
        harga: 250000,
        kategori: "elektronik",
        gambar: "https://via.placeholder.com/300x200?text=Headphone",
        deskripsi: "Suara jernih tanpa kabel."
    },
    {
        id: 5,
        nama: "Jaket Hoodie",
        harga: 120000,
        kategori: "fashion",
        gambar: "https://via.placeholder.com/300x200?text=Jaket",
        deskripsi: "Hangat dan stylish untuk nongkrong."
    },
    {
        id: 6,
        nama: "Baju Pria",
        harga: 150000,
        kategori: "fashion",
        gambar: "https://via.placeholder.com/300x200?text=Baju",
        deskripsi: "Baju pria modern dan stylish."
    },
    {
        id: 7,
        nama: "Baju Wanita",
        harga: 200000,
        kategori: "fashion",
        gambar: "https://via.placeholder.com/300x200?text=Baju",
        deskripsi: "Baju wanita modern dan stylish."
    },
    {
        id: 8,
        nama: "Mouse Wireless",
        harga: 150000,
        kategori: "elektronik",
        gambar: "https://via.placeholder.com/300x200?text=Mouse",
        deskripsi: "Mouse ergonomis tanpa kabel."
    },
    {
        id: 9,
        nama: "Pizza Margherita",
        harga: 85000,
        kategori: "makanan",
        gambar: "https://via.placeholder.com/300x200?text=Pizza",
        deskripsi: "Pizza klasik dengan saus tomat dan mozzarella."
    },
    {
        id: 10,
        nama: "Sepatu Sneakers",
        harga: 450000,
        kategori: "fashion",
        gambar: "https://via.placeholder.com/300x200?text=Sepatu",
        deskripsi: "Nyaman dipakai untuk jalan-jalan."
    },
    {
        id: 11,
        nama: "Keyboard Mechanical",
        harga: 600000,
        kategori: "elektronik",
        gambar: "https://via.placeholder.com/300x200?text=Keyboard",
        deskripsi: "Switch biru dengan lampu RGB."
    },
    {
        id: 12,
        nama: "Kopi Susu",
        harga: 20000,
        kategori: "makanan",
        gambar: "https://via.placeholder.com/300x200?text=Kopi",
        deskripsi: "Perpaduan kopi robusta dan susu kental manis."
    },
    {
        id: 13,
        nama: "Jam Tangan",
        harga: 350000,
        kategori: "fashion",
        gambar: "https://via.placeholder.com/300x200?text=Jam",
        deskripsi: "Elegan dan tahan air."
    },
    {
        id: 14,
        nama: "Powerbank 10000mAh",
        harga: 180000,
        kategori: "elektronik",
        gambar: "https://via.placeholder.com/300x200?text=Powerbank",
        deskripsi: "Pengisian cepat untuk smartphone Anda."
    },
    {
        id: 15,
        nama: "Nasi Goreng",
        harga: 25000,
        kategori: "makanan",
        gambar: "https://via.placeholder.com/300x200?text=Nasi+Goreng",
        deskripsi: "Nasi goreng spesial dengan telur dan ayam."
    },
    {
        id: 16,
        nama: "Tas Ransel",
        harga: 220000,
        kategori: "fashion",
        gambar: "https://via.placeholder.com/300x200?text=Tas",
        deskripsi: "Kapasitas besar untuk laptop dan buku."
    },
    {
        id: 17,
        nama: "Smartwatch",
        harga: 550000,
        kategori: "elektronik",
        gambar: "https://via.placeholder.com/300x200?text=Smartwatch",
        deskripsi: "Pantau kesehatan dan notifikasi Anda."
    },
    {
        id: 18,
        nama: "Jus Alpukat",
        harga: 15000,
        kategori: "makanan",
        gambar: "https://via.placeholder.com/300x200?text=Jus",
        deskripsi: "Segar dan sehat dari buah asli."
    },
    {
        id: 19,
        nama: "Celana Jeans",
        harga: 280000,
        kategori: "fashion",
        gambar: "https://via.placeholder.com/300x200?text=Celana",
        deskripsi: "Bahan denim berkualitas tinggi."
    },
    {
        id: 20,
        nama: "Monitor Gaming",
        harga: 2500000,
        kategori: "elektronik",
        gambar: "https://via.placeholder.com/300x200?text=Monitor",
        deskripsi: "Refresh rate 144Hz untuk pengalaman gaming maksimal."
    }
];

function tampilkanProduk(produk) {
    const wadahProduk = document.getElementById("wadah-produk");

    wadahProduk.innerHTML = "";

    produk.forEach((produk) => {
        const card = document.createElement("div");
        card.classList.add("col-md-4", "mb-4");
        card.innerHTML = `
            <div class="card">
                <img src="${produk.gambar}" class="card-img-top" alt="${produk.nama}">
                <div class="card-body">
                    <h5 class="card-title">${produk.nama}</h5>
                    <p class="card-text">${produk.deskripsi}</p>
                    <p class="card-text">Rp. ${produk.harga.toLocaleString()}</p>
                    <a href="#" class="btn btn-primary">Beli</a>
                </div>
            </div>
        `;
        wadahProduk.appendChild(card);
    });
}

function filterProduk(kategori) {
    if (kategori == 'semua') {
        tampilkanProduk(dataProduk);
    } else {
        const produkFilter = dataProduk.filter((produk) => produk.kategori === kategori);
        tampilkanProduk(produkFilter);
    }
}

tampilkanProduk(dataProduk);