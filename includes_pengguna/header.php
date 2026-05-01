<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../gambar/logoBTH.png" rel="icon">
  <title>Dashboard pengguna</title>
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/ruang-admin.css" rel="stylesheet">
  <link href="../assets/css/admin.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="../gambar/logoBTH.png" width="50">
        </div>
        <div class="sidebar-brand-text mx-8 text-dark">Universitas BTH</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link active" collapsed href="index.php">
          <i class="fas fa-fw fa-tachometer-alt" style="color: white;"></i>
          <span class="text-white">Dashboard  Pengguna</span></a>
      </li>
      <hr class="sidebar-divider">  
      <div class="sidebar-heading text-white">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link active collapsed" href="peralatan.php">
          <i class="fas fa-fw fa-file" style="color: white;"></i>
          <span class="text-white" href="peralatan.php">Daftar Peralatan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms" style="color: white;"></i>
          <span class="text-white">Kelola Peminjaman</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="jadwal.php">Jadwal Peminjaman</a>
            <a class="collapse-item" href="ajukan.php">Ajukan Peminjaman</a>
          </div>
        </div>
      </li>
    
      <li class="nav-item">
        <a class="nav-link active collapsed" href="riwayat.php">
          <i class="fas fa-fw fa-chart-area" style="color: white;"></i>
          <span class="text-white" href="riwayat.php">Riwayat Peminjaman</span>
        </a>
      </li>
      <hr class="sidebar-divider">
   
      <li class="nav-item">
      <div class="custom-header d-flex align-items-center">

      <!-- LOGO KIRI -->
        <div class="sidebar-bottom">
            <div class="menu"></div>
                <div class="logo-bawah">
                  <img src="../gambar/burung.png" class="bird">
                </div>
            </div>
        </div>
      </li>
     </ul>


    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notifikasi
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Maret 12, 2026</div>
                    <span class="font-weight-bold">pengajuan telah di acc admin</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Februari 7, 2026</div>
                    pengajuan ditolak
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Januari 2, 2027</div>
                    masih dalam pengecekan
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">selengkapnya</a>
              </div>
            </li>
            
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="../gambar/syifa.jpeg" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">Dede Syifa Maspupah</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="setting.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="../dashboard_admin/logout.php" class="dropdown-item">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->