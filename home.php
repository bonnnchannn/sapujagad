<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sapu jagaD</title>
    <link rel="icon" type="icon" href="assets/favicon.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=shopping_cart" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="style.css">

    <style>
        /* Penataan untuk Carousel agar gambar di tengah */
        .carousel-item .carousel-image-container {
            /* 1. Beri tinggi yang tetap dan responsif pada wadah gambar */
            /* 60vh berarti 60% dari tinggi layar. Anda bisa ganti ke pixel, misal: 450px */
            height: 60vh; 
            
            /* 2. Gunakan Flexbox untuk menengahkan gambar */
            display: flex;
            align-items: center;      /* Menengahkan secara vertikal */
            justify-content: center;  /* Menengahkan secara horizontal */
            background-color: #f8f9fa; /* Warna latar belakang jika gambar lebih kecil (opsional) */
        }

        .carousel-item .carousel-image-container img {
            /* 3. Batasi ukuran gambar agar tidak lebih besar dari wadahnya */
            max-width: 100%;
            max-height: 100%;
            
            /* 4. Pastikan gambar tidak diregangkan secara paksa */
            width: auto;
            height: auto;
            
            /* Opsional: Tambahkan sedikit bayangan agar lebih menonjol */
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg shadow-sm bg-white py-3 fixed-top">
      <div class="container">
        <a class="navbar-brand fw-bold fs-4 text-primary" href="home.php">Sapu jagaD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto align-items-center gap-3">
            <li class="nav-item">
              <a class="nav-link fw-medium" href="../public_html/home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-medium" href="./user/produk.php">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-medium" href="./user/kontak.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-medium" href="./user/profil.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link position-relative" href="./user/keranjang.php">
                <span class="material-symbols-outlined fs-4">shopping_cart</span>
                <span id="cartCount" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  0
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-medium" href="./admin/login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div id="carouselExample" class="carousel slide my-5 pt-5">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="carousel-image-container">
            <img src="./user/assets/IKEA Logo Animaton.jpeg" alt="IKEA Logo Animation">
          </div>
        </div>
        <div class="carousel-item">
          <div class="carousel-image-container">
            <img src="./user/assets/IKEA-flag.gif" alt="IKEA Flag">
          </div>
        </div>
        <div class="carousel-item">
          <div class="carousel-image-container">
            <img src="./user/assets/ikea.jpg" alt="IKEA">
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
      
    <footer class="bg-light text-dark pt-4 mt-5">
      <div class="container text-center text-md-start">
        <div class="row">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold">Sapu jagaD</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #000; height: 2px"/>
            <p>
              Penyedia layanan dan produk terpercaya perabotan rumah tangga yang selalu mengutamakan kualitas dan kepuasan pelanggan.
            </p>
          </div>

          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold">Social Media</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #000; height: 2px"/>
            <p>
              <a href="https://www.instagram.com" class="text-dark text-decoration-none">
                <i class="bi bi-instagram me-2"></i>Instagram
              </a>
            </p>
            <p>
              <a href="https://www.facebook.com" class="text-dark text-decoration-none">
                <i class="bi bi-facebook me-2"></i>Facebook
              </a>
            </p>
            <p>
              <a href="https://twitter.com" class="text-dark text-decoration-none">
                <i class="bi bi-twitter me-2"></i>Twitter
              </a>
            </p>
            <p>
              <a href="https://youtube.com/" class="text-dark text-decoration-none">
                <i class="bi bi-youtube me-2"></i>YouTube
              </a>
            </p>
          </div>

          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <h6 class="text-uppercase fw-bold">Contact</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #000; height: 2px"/>
            <p><i class="bi bi-house-door-fill me-2"></i> Jl. Merdeka No.123, Jakarta</p>
            <p><i class="bi bi-envelope-fill me-2"></i> info@sapujagad.com</p>
            <p><i class="bi bi-phone-fill me-2"></i> +62 812 3456 7890</p>
          </div>
        </div>
      </div>

      <div class="text-center p-3" style="background-color: rgba(0,0,0,0.05);">
        © 2025 Sapu jagaD. All Rights Reserved.
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
</body>
</html>