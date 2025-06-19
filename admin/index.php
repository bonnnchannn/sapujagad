<?php
session_start();
ob_start();

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Gunakan koneksi dari file terpisah
require_once 'koneksi.php';

// QUERY UTAMA
// try {
//     // Hitung total user
//     $stmt_users = $pdo->query("SELECT COUNT(*) as total_users FROM users");
//     $total_users = $stmt_users->fetch(PDO::FETCH_ASSOC)['total_users'] ?? 0;

//     // Hitung user baru bulan ini (jika kolom created_at ada)
//     $columns = $pdo->query("DESCRIBE users")->fetchAll(PDO::FETCH_COLUMN);
//     if (in_array('created_at', $columns)) {
//         $stmt_new = $pdo->query("SELECT COUNT(*) as new_users FROM users WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE())");
//         $new_users = $stmt_new->fetch(PDO::FETCH_ASSOC)['new_users'] ?? 0;
//     } else {
//         $new_users = 0;
//     }

//     // Hitung order hari ini
//     $stmt_orders = $pdo->query("SELECT COUNT(*) as total_orders FROM orders WHERE DATE(created_at) = CURDATE()");
//     $total_orders = $stmt_orders->fetch(PDO::FETCH_ASSOC)['total_orders'] ?? 0;

//     // Hitung total produk
//     $stmt_produk = $pdo->query("SELECT COUNT(*) as total_products FROM produk");
//     $total_products = $stmt_produk->fetch(PDO::FETCH_ASSOC)['total_products'] ?? 0;

// } catch (PDOException $e) {
//     $total_users = $new_users = $total_orders = $total_products = 0;
//     error_log("Database error: " . $e->getMessage());
// }
?>


<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sapu jagaD | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
    
    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
    
    <!-- AdminLTE -->
    <link rel="stylesheet" href="css/adminlte.css" />
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        <!-- Header -->
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
                </ul>
                
                <ul class="navbar-nav ms-auto">
                    <!-- User Info -->
                    <li class="nav-item">
                        <span class="navbar-text me-3">
                            Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>
                        </span>
                    </li>
                    
                    <!-- Fullscreen Toggle -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                        </a>
                    </li>
                    
                    <!-- User Menu -->
                    <li class="nav-item dropdown user-menu">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                            <i class="bi bi-person-circle"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <li class="user-footer">
                                <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                                <a href="./Logout.php" class="btn btn-default btn-flat float-end" 
                                   onclick="return confirm('Apakah Anda yakin ingin logout?')">Sign out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Sidebar -->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <a href="/home.php" class="brand-link">
                    <img src="../user/assets/favicon.png" alt="" class="brand-image opacity-75 shadow" />
                    <span class="brand-text fw-light">Sapu jagaD</span>
                </a>
            </div>
            
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon bi bi-speedometer"></i>
                                <p>Dashboard <i class="nav-arrow bi bi-chevron-right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./user.php" class="nav-link active">
                                        <i class="nav-icon bi bi-person"></i>
                                        <p>User</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="product.php" class="nav-link">
                                <i class="nav-icon bi bi-box-seam-fill"></i>
                                <p>Produk</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="app-main">
            <!-- Content Header -->
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="app-content">
                <div class="container-fluid">
                    <!-- Debug Info -->
                    
                    <!-- Stats Row -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box text-bg-primary">
                                <div class="inner">
                                   <?php
                                    // Query untuk menghitung jumlah produk
                                    $sql = "SELECT COUNT(*) as total_products FROM produk";
                                    $result = $koneksi->query($sql);
                                    $row = $result->fetch_assoc();
                                    ?>
                                    <h3><?php echo $row['total_products']; ?></h3>
                                    <p>New Orders</p>
                                </div>
                                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"></path>
                                </svg>
                                <a href="#" class="small-box-footer link-light">More info <i class="bi bi-link-45deg"></i></a>
                            </div>
                            <div class="small-box text-bg-primary">
                                <div class="inner">
                                   <?php
                                    // Query untuk menghitung jumlah produk
                                    $sql = "SELECT COUNT(*) as total_users FROM users";
                                    $result = $koneksi->query($sql);
                                    $row = $result->fetch_assoc();
                                    ?>
                                    <h3><?php echo $row['total_users']; ?></h3>
                                    <p>Total users</p>
                                </div>
                                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"></path>
                                </svg>
                                <a href="#" class="small-box-footer link-light">More info <i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="app-footer">
            <div class="float-end d-none d-sm-inline">Sapu jagaD Admin</div>
            <strong>Copyright &copy; 2024 <a href="" class="text-decoration-none">Sapu jagaD</a>.</strong>
            All rights reserved.
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="js/adminlte.js"></script>

    <script>
        // OverlayScrollbars Configuration
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };
        
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });

        // Prevent back button after logout
        window.history.replaceState(null, null, window.location.href);
        window.onpopstate = function(event) {
            window.history.go(1);
        };
    </script>
</body>
</html>