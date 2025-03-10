<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Swipe Clean</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="../../../assets/img/logosc.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="../../../assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="../../../assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="../../../assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="../../../assets/vendor/simple-datatables/style.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="../../../assets/css/style.css" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
        <a href="../dashboard/dashboard.php" class="logo d-flex align-items-center">
          <img src="../../../assets/img/ctpfinder.png" alt="" />
          <span class="d-none d-lg-block"></span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div>
      <!-- End Logo -->

      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <!-- Modifikasi elemen dropdown menjadi ikon saja -->
        <li class="nav-item">
            <a class="nav-link nav-icon" href="#" id="whatsappIcon">
                <i class="bi bi-headset"></i>
                <span class="badge bg-success badge-number"></span>
            </a>
        </li>

        <!-- Tambahkan script JavaScript -->
        <script>
            // Tangkap elemen ikon
            const whatsappIcon = document.getElementById('whatsappIcon');

            // Tambahkan event listener untuk ikon
            whatsappIcon.addEventListener('click', function() {
                // Tampilkan SweetAlert konfirmasi
                Swal.fire({
                    title: 'Layanan Administrasi',
                    text: 'Hubungi admin kami melalui WhatsApp.',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Hubungi',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    // Jika pengguna menekan tombol "Ya"
                    if (result.isConfirmed) {
                        // Redirect ke URL WhatsApp
                        window.location.href = 'https://wa.me/081398000000';
                    }
                });
            });
        </script>
          <li class="nav-item dropdown pe-3">
            <a
              class="nav-link nav-profile d-flex align-items-center pe-0"
              href="#"
              data-bs-toggle="dropdown"
            >
              <!-- <img
                src="../../../assets/img/profile-img.jpg"
                alt="Profile"
                class="rounded-circle"
              /> -->
              <span class="d-none d-md-block dropdown-toggle ps-2"
                > <?php echo $_SESSION['name'];?></span
              > </a
            ><!-- End Profile Iamge Icon -->

            <ul
              class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile"
            >
              <li class="dropdown-header">
                <h6><?php echo $_SESSION['name'];?></h6>
                <span>Administrator</span>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>

              <li>
                <a
                  class="dropdown-item d-flex align-items-center"
                  href="users-profile.html"
                >
                  <i class="bi bi-person"></i>
                  <span>My Profile</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>

              <li>
                <a
                  class="dropdown-item d-flex align-items-center"
                  href="../../../../backend/logout.php"
                >
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Sign Out</span>
                </a>
              </li>
            </ul>
            <!-- End Profile Dropdown Items -->
          </li>
          <!-- End Profile Nav -->
        </ul>
      </nav>
      <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <?php include 'sidebar.php';?>