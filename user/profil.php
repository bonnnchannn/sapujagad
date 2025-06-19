<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="icon" type="icon" href="assets/favicon.png" />
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=shopping_cart" />
</head>
<body>
   <!-- navbar -->
   <nav class="navbar navbar-expand-lg shadow-sm bg-white py-3 fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold fs-4 text-primary" href="home.php">Sapu jagaD</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto align-items-center gap-3">
          <li class="nav-item">
            <a class="nav-link fw-medium" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="produk.php">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="kontak.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="profil.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link position-relative" href="keranjang.php">
              <span class="material-symbols-outlined fs-4">shopping_cart</span>
              <span id="cartCount" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                0
              </span>
            </a>
          </li>
          <li class="nav-item"><a class="nav-link fw-medium" href="../admin/index.php">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>
  

    <!-- profil perusahaan -->
     <div style="padding-top: 3rem;">
      <div class="card-custom" id="PROFILE">
        <h1 class="section-title">Profile</h1>
        <div class="card-content">
          <div class="card-img">
            <img src="/assets/ikea.jpg" alt="BMW">
          </div>
          <div class="card-text">
            <h2 class="card-title">Sapu jagaD</h2>
            <p class="card-description">
              Sapu jagaD adalah perusahaan yang memproduksi alat-alat kebersihan rumah tangga (manufacture cleaning equipment) meliputi sapu, sikat, mop pel, lobby duster, pengki, keset dan produk turunan lainnya.

              Berkompetensi dalam menciptakan dan memproduksi berbagai macam dan bentuk alat kebersihan tumah tangga yang didesain dengan mengacu pada trend dan model saat ini.
            </p>
            <p class="card-footer"><small>Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
     </div>
    
      
      <!-- visi dan misi -->
      <div class="vm-card" id="Visidanmisi">
        <h1 class="vm-section-title">Visi & Misi</h1>
        <div class="vm-card-content">
          <div class="vm-card-img">
            <img src="/assets/p.jpg" alt="Visi dan Misi">
          </div>
          <div class="vm-card-text">
            <h2 class="vm-card-title">Visi</h2>
            <p class="vm-card-description">
              Menjadi perusahaan penyedia alat kebersihan terbaik di dunia.
            </p>
      
            <h2 class="vm-card-title">Misi</h2>
            <ul class="vm-card-description">
              <li>Mengembangkan teknologi alat kebersihan.</li>
              <li>Menyediakan produk dan layanan berkualitas tinggi untuk pelanggan di seluruh dunia.</li>
              <li>Menumbuhkan budaya kebersihan yang inklusif dan progresif.</li>
              <li>Mendukung solusi kebersihan yang berkelanjutan.</li>
            </ul>
      
            <p class="vm-card-footer"><small>Updated April 2025</small></p>
          </div>
        </div>
      </div>

      
      

      <!-- footer -->
<footer class="bg-light text-dark pt-4 mt-5">
  <div class="container text-center text-md-start">
    <div class="row">
      <!-- Company Info -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
        <h6 class="text-uppercase fw-bold">SapujagaD</h6>
        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #000; height: 2px"/>
        <p>
          Penyedia layanan dan produk kebersihan terpercaya yang selalu mengutamakan kualitas dan kepuasan pelanggan.
        </p>
      </div>

      <!-- Navigation Links -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
        <h6 class="text-uppercase fw-bold">Social Media</h6>
        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #000; height: 2px"/>
        <p>
          <a href="#" class="text-dark text-decoration-none">
            <i class="bi bi-instagram me-2"></i>Instagram
          </a>
        </p>
        <p>
          <a href="#" class="text-dark text-decoration-none">
            <i class="bi bi-facebook me-2"></i>Facebook
          </a>
        </p>
        <p>
          <a href="#" class="text-dark text-decoration-none">
            <i class="bi bi-twitter me-2"></i>Twitter
          </a>
        </p>
        <p>
          <a href="#" class="text-dark text-decoration-none">
            <i class="bi bi-youtube me-2"></i>YouTube
          </a>
        </p>
      </div>

      <!-- Contact Info -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
        <h6 class="text-uppercase fw-bold">Contact</h6>
        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #000; height: 2px"/>
        <p><i class="bi bi-house-door-fill me-2"></i> Jl. Merdeka No.123, Jakarta</p>
        <p><i class="bi bi-envelope-fill me-2"></i> info@sapujagad.com</p>
        <p><i class="bi bi-phone-fill me-2"></i> +62 812 3456 7890</p>
      </div>
    </div>
  </div>

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0,0,0,0.05);">
    © 2025 Sapu jagaD. All Rights Reserved.
  </div>
</footer>

      <script src="index.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>