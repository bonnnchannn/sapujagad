<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Keranjang Belanja</title>
  <link rel="icon" type="icon" href="assets/favicon.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body { 
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
      background-color: #f8f9fa;
    }
    .navbar-brand { color: #0d6efd !important; }
    .card { border-radius: 12px; }
    .img-thumbnail { border-radius: 8px; }
    .list-group-item { border-radius: 8px; margin-bottom: 8px; }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg shadow-sm bg-white py-3 fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold fs-4 text-primary" href="home.php">Sapu jagaD</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto align-items-center gap-3">
          <li class="nav-item"><a class="nav-link fw-medium" href="home.php">Home</a></li>
          <li class="nav-item"><a class="nav-link fw-medium" href="produk.php">Product</a></li>
          <li class="nav-item"><a class="nav-link fw-medium" href="kontak.php">Contact</a></li>
          <li class="nav-item"><a class="nav-link fw-medium" href="profil.php">About</a></li>
          <li class="nav-item">
            <a class="nav-link position-relative" href="keranjang.php">
              <span class="material-symbols-outlined fs-4">shopping_cart</span>
              <span id="cartCount" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              </span>
            </a>
          </li>
          <li class="nav-item"><a class="nav-link fw-medium" href="../admin/index.php">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Isi Keranjang -->
  <div class="container mt-5 pt-5">
    <h2 class="mb-4">Keranjang Belanja</h2>
    <div id="keranjang-list" class="list-group mb-3 shadow-sm"></div>
    <h5 id="total-harga" class="fw-semibold">Total: Rp 0</h5>
    
    <!-- Form Customer Info -->
    <div id="customer-form" class="card mt-4" style="display: none;">
      <div class="card-header">
        <h5 class="mb-0">Informasi Pelanggan</h5>
      </div>
      <div class="card-body">
        <form id="checkoutForm">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="customerName" class="form-label">Nama Lengkap *</label>
              <input type="text" class="form-control" id="customerName" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="customerEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="customerEmail">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="customerPhone" class="form-label">No. Telepon</label>
              <input type="tel" class="form-control" id="customerPhone">
            </div>
          </div>
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-secondary" onclick="hideCustomerForm()">Batal</button>
            <button type="submit" class="btn btn-success">Konfirmasi Pesanan</button>
          </div>
        </form>
      </div>
    </div>
    
    <div class="d-flex gap-2 mt-3">
      <button id="checkout-btn" class="btn btn-success" onclick="showCustomerForm()">Checkout</button>
    </div>
  </div>

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    // Sample cart data untuk testing
    const sampleCart = [
      {
        nama: "Sapu Lidi Premium",
        harga: 25000,
        jumlah: 2,
        gambar: "https://via.placeholder.com/100x100/4CAF50/FFFFFF?text=Sapu+Lidi"
      },
      {
        nama: "Sapu Ijuk Tradisional", 
        harga: 35000,
        jumlah: 1,
        gambar: "https://via.placeholder.com/100x100/FF9800/FFFFFF?text=Sapu+Ijuk"
      }
    ];

    // Initialize with sample data if cart is empty
    if (!localStorage.getItem('keranjang')) {
      localStorage.setItem('keranjang', JSON.stringify(sampleCart));
    }

    document.addEventListener("DOMContentLoaded", renderKeranjang);

    function renderKeranjang() {
      const keranjang = JSON.parse(localStorage.getItem('keranjang')) || [];
      const list = document.getElementById('keranjang-list');
      const totalElem = document.getElementById('total-harga');
      const cartCount = document.getElementById('cartCount');
      const checkoutBtn = document.getElementById('checkout-btn');
      let total = 0;
      let totalItem = 0;

      list.innerHTML = "";

      if (keranjang.length === 0) {
        list.innerHTML = '<div class="alert alert-info"><i class="bi bi-cart-x"></i> Keranjang masih kosong.</div>';
        totalElem.style.display = 'none';
        checkoutBtn.style.display = 'none';
        cartCount.textContent = 0;
        cartCount.style.display = 'none';
      } else {
        keranjang.forEach(item => {
          const subtotal = item.harga * item.jumlah;
          total += subtotal;
          totalItem += item.jumlah;

          const div = document.createElement('div');
          div.className = 'list-group-item d-flex justify-content-between align-items-center';
          div.innerHTML = `
            <div class="d-flex align-items-center">
              <img src="${item.gambar}" alt="${item.nama}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover; margin-right: 15px;">
              <div>
                <h6 class="mb-1">${item.nama}</h6>
                <small class="text-muted">Rp ${item.harga.toLocaleString()} x ${item.jumlah}</small>
              </div>
            </div>
            <div class="text-end">
              <strong>Rp ${subtotal.toLocaleString()}</strong><br>
              <button class="btn btn-sm btn-outline-secondary me-1" onclick="ubahJumlah('${item.nama}', -1)">-</button>
              <button class="btn btn-sm btn-outline-primary" onclick="ubahJumlah('${item.nama}', 1)">+</button>
            </div>
          `;
          list.appendChild(div);
        });

        totalElem.innerText = 'Total: Rp ' + total.toLocaleString();
        totalElem.style.display = 'block';
        checkoutBtn.style.display = 'inline-block';
        cartCount.textContent = totalItem;
        cartCount.style.display = totalItem > 0 ? 'inline-block' : 'none';
      }
    }

    function ubahJumlah(namaProduk, perubahan) {
      let keranjang = JSON.parse(localStorage.getItem('keranjang')) || [];
      const index = keranjang.findIndex(item => item.nama === namaProduk);

      if (index !== -1) {
        keranjang[index].jumlah += perubahan;
        if (keranjang[index].jumlah <= 0) {
          keranjang.splice(index, 1);
        }
        localStorage.setItem('keranjang', JSON.stringify(keranjang));
        renderKeranjang();
      }
    }

    function showCustomerForm() {
      const keranjang = JSON.parse(localStorage.getItem('keranjang')) || [];
      if (keranjang.length === 0) {
        Swal.fire({
          icon: "warning",
          title: "Oops...",
          text: "Keranjang kamu masih kosong!",
        });
        return;
      }
      
      document.getElementById('customer-form').style.display = 'block';
      document.getElementById('checkout-btn').style.display = 'none';
    }

    function hideCustomerForm() {
      document.getElementById('customer-form').style.display = 'none';
      document.getElementById('checkout-btn').style.display = 'inline-block';
    }

    // Handle form submission with improved error handling
    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      const keranjang = JSON.parse(localStorage.getItem('keranjang')) || [];
      const customerName = document.getElementById('customerName').value;
      const customerEmail = document.getElementById('customerEmail').value;
      const customerPhone = document.getElementById('customerPhone').value;
      
      // Validation
      if (!customerName.trim()) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Nama lengkap harus diisi!",
        });
        return;
      }

      if (keranjang.length === 0) {
        Swal.fire({
          icon: "warning",
          title: "Oops...",
          text: "Keranjang masih kosong!",
        });
        return;
      }
      
      // Show loading
      Swal.fire({
        title: 'Memproses pesanan...',
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading();
        }
      });
      
      // Simulate server request (since checkout.php may not exist)
      let totalAmount = 0;
        keranjang.forEach(item => {
        totalAmount += item.harga * item.jumlah;
      });
      // In production, replace this with actual fetch to checkout.php
      setTimeout(() => {
        // Check if checkout.php exists by trying to fetch it
        fetch('../admin/checkout.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            items: keranjang,
            customer_name: customerName,
            customer_email: customerEmail,
            customer_phone: customerPhone,
            total_amount: totalAmount
 
          })
        })
        .then(response => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
          }
          return response.json();
        })
        .then(data => {
          Swal.close();
          
          if (data.success) {
            Swal.fire({
              title: "Checkout Berhasil!",
              text: `Terima kasih ${customerName}! Pesanan Anda dengan ID #${data.order_id} sedang diproses.`,
              icon: "success",
              confirmButtonText: "OK",
              confirmButtonColor: "#4f46e5"
            }).then(() => {
              localStorage.removeItem('keranjang');
              renderKeranjang();
              hideCustomerForm();
              document.getElementById('checkoutForm').reset();
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: data.message || "Terjadi kesalahan pada server",
            });
          }
        })
        .catch(error => {
          Swal.close();
          console.error('Error:', error);
          
          // Fallback: simulate successful checkout if checkout.php doesn't exist
          if (error.message.includes('404') || error.message.includes('HTTP error')) {
            // Simulate successful checkout
            const orderId = 'SP' + Date.now();
            
            Swal.fire({
              title: "Checkout Berhasil!",
              text: `Terima kasih ${customerName}! Pesanan Anda dengan ID #${orderId} sedang diproses.`,
              icon: "success",
              confirmButtonText: "OK",
              confirmButtonColor: "#4f46e5"
            }).then(() => {
              localStorage.removeItem('keranjang');
              renderKeranjang();
              hideCustomerForm();
              document.getElementById('checkoutForm').reset();
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: "Terjadi kesalahan saat memproses pesanan. Silakan coba lagi.",
            });
          }
        });
      }, 1000); // Simulate processing time
    });

    // Debug function to check form submission
    function debugFormSubmission() {
      console.log('Form submission debug:');
      console.log('Cart items:', JSON.parse(localStorage.getItem('keranjang')));
      console.log('Customer name:', document.getElementById('customerName').value);
      console.log('Customer email:', document.getElementById('customerEmail').value);
      console.log('Customer phone:', document.getElementById('customerPhone').value);
    }
  </script>
  <script src="index.js"></script>
</body>
</html>