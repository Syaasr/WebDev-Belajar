document.addEventListener('DOMContentLoaded', () => {

    const products = [
        {
            id: 1,
            name: 'Laptop MacBook Pro M3',
            price: 25999000,
            description: 'Laptop bertenaga dengan chip M3 untuk performa profesional yang luar biasa.',
            imageUrl: 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/mbp14-spaceblack-select-202310?wid=904&hei=840&fmt=jpeg&qlt=90&.v=1697230830200',
            category: 'Elektronik'
        },
        {
            id: 2,
            name: 'Sony Alpha a6400',
            price: 13500000,
            description: 'Kamera mirrorless ringkas dengan autofokus super cepat dan kualitas gambar profesional.',
            imageUrl: 'https://www.sony.co.id/image/5d023b6b23363595632f3014c47898c5?fmt=pjpeg&wid=330&bgcolor=FFFFFF&bgc=FFFFFF',
            category: 'Elektronik'
        },
        {
            id: 3,
            name: 'Apple Watch Series 9',
            price: 7999000,
            description: 'Smartwatch canggih untuk memantau kesehatan, kebugaran, dan tetap terhubung.',
            imageUrl: 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/ML2W3_VW_34FR+watch-45-alum-midnight-nc-9s_VW_34FR_WF_CO?wid=752&hei=720&bgc=fafafa&trim=1&fmt=p-jpg&qlt=80&.v=1694503723380',
            category: 'Elektronik'
        },
        {
            id: 4,
            name: 'Sony WH-1000XM5 Headphone',
            price: 4999000,
            description: 'Headphone nirkabel dengan peredam bising terbaik di kelasnya untuk pengalaman audio imersif.',
            imageUrl: 'https://www.sony.co.id/image/5d02da484ac3b177d24772c4146c3725?fmt=pjpeg&wid=330&bgcolor=FFFFFF&bgc=FFFFFF',
            category: 'Elektronik'
        },
        {
            id: 5,
            name: 'Samsung Galaxy S24 Ultra',
            price: 21999000,
            description: 'Smartphone flagship dengan kamera revolusioner, S Pen, dan performa tak tertandingi.',
            imageUrl: 'https://images.samsung.com/is/image/samsung/p6pim/id/2401/gallery/id-galaxy-s24-ultra-s928-sm-s928bztgxid-539313220?$650_519_PNG$',
            category: 'Elektronik'
        },
        {
            id: 6,
            name: 'Kaos Polos Cotton Combed',
            price: 99000,
            description: 'Kaos basic yang nyaman dan adem, terbuat dari 100% katun combed 30s.',
            imageUrl: 'https://images.tokopedia.net/img/cache/700/VqbcmM/2021/4/2/40449553-6202-4518-9c4c-9745d7a5996b.jpg',
            category: 'Pakaian'
        },
        {
            id: 7,
            name: 'Celana Jeans Slim Fit',
            price: 399000,
            description: 'Celana jeans pria model slim fit dengan bahan stretch yang nyaman untuk bergerak.',
            imageUrl: 'https://cdn.shopify.com/s/files/1/0553/3855/5241/products/LSJ-121-BIRU-TUA-1.jpg?v=1679466336',
            category: 'Pakaian'
        },
        {
            id: 8,
            name: 'Kemeja Flanel Kotak',
            price: 250000,
            description: 'Kemeja flanel lengan panjang dengan motif kotak klasik, cocok untuk gaya kasual.',
            imageUrl: 'https://images.tokopedia.net/img/cache/700/hDjmkQ/2023/1/13/284132ef-e5b1-4179-9e01-d81b3f7f13b1.jpg',
            category: 'Pakaian'
        },
        {
            id: 9,
            name: 'Hoodie Jumper Polos',
            price: 299000,
            description: 'Hoodie tebal dengan bahan fleece lembut yang hangat dan nyaman dipakai.',
            imageUrl: 'https://images.tokopedia.net/img/cache/700/VqbcmM/2022/10/26/d8a4a532-68a8-4443-bf6b-9c8699c864ad.jpg',
            category: 'Pakaian'
        },
        {
            id: 10,
            name: 'Sepatu Sneakers Putih',
            price: 550000,
            description: 'Sepatu sneakers kasual berwarna putih yang serbaguna dan mudah dipadukan.',
            imageUrl: 'https://images.tokopedia.net/img/cache/700/VqbcmM/2021/11/25/e06b723f-d45a-470b-9304-455b62b21c44.jpg',
            category: 'Pakaian'
        },
        {
            id: 11,
            name: 'Atomic Habits - James Clear',
            price: 108000,
            description: 'Buku pengembangan diri terlaris tentang cara membangun kebiasaan baik dan menghilangkan kebiasaan buruk.',
            imageUrl: 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1655988385l/40121378.jpg',
            category: 'Buku'
        },
        {
            id: 12,
            name: 'Eloquent JavaScript',
            price: 250000,
            description: 'Panduan modern untuk pemrograman JavaScript, dari dasar hingga topik lanjutan.',
            imageUrl: 'https://eloquentjavascript.net/img/cover.jpg',
            category: 'Buku'
        },
        {
            id: 13,
            name: 'Sapiens: Riwayat Singkat Umat Manusia',
            price: 125000,
            description: 'Buku karya Yuval Noah Harari yang menjelajahi sejarah umat manusia dari Zaman Batu hingga kini.',
            imageUrl: 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1420585954l/23692271.jpg',
            category: 'Buku'
        },
        {
            id: 14,
            name: 'Komik One Piece Vol. 100',
            price: 45000,
            description: 'Volume ke-100 dari seri manga petualangan bajak laut terpopuler di dunia.',
            imageUrl: 'https://dwgkfo5b3odmw.cloudfront.net/manga/vol/100003/1598372605-1811239845.jpg',
            category: 'Buku'
        },
        {
            id: 15,
            name: 'Filosofi Teras - Henry Manampiring',
            price: 98000,
            description: 'Pengenalan filsafat Stoa kuno yang relevan untuk mengatasi kekhawatiran di era modern.',
            imageUrl: 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1545899275l/43322199.jpg',
            category: 'Buku'
        }
    ];

    const productContainer = document.getElementById('product-list');
    const filterButtons = document.querySelectorAll('.filter-btn');

    const displayProducts = (productsToDisplay) => {
        productContainer.innerHTML = '';

        productsToDisplay.forEach(product => {
            const formattedPrice = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(product.price);

            const productCard = document.createElement('div');
            productCard.className = 'col'; 
            productCard.innerHTML = `
                <div class="card h-100">
                    <img src="${product.imageUrl}" class="card-img-top" alt="${product.name}">
                    <div class="card-body">
                        <h5 class="card-title">${product.name}</h5>
                        <p class="card-text">${product.description}</p>
                        <p class="card-text fs-5 fw-bold">${formattedPrice}</p>
                    </div>
                    <div class="card-footer">
                         <button class="btn btn-primary w-100">Tambah ke Keranjang</button>
                    </div>
                </div>
            `;
            productContainer.appendChild(productCard);
        });
    };

    filterButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const category = e.target.dataset.category;
            
            let filteredProducts;
            if (category === 'semua') {
                filteredProducts = products;
            } else {
                filteredProducts = products.filter(product => product.category === category);
            }
            
            displayProducts(filteredProducts);
        });
    });

    displayProducts(products);
});
