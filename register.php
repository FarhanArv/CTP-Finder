<?php 

  require 'config/db.php';
  require 'backend/register.php';

  $register = new Register("Localhost", "root", "", "db_laundry");
  $connect = $register->connect();

  if (isset($_POST['submit'])) {
    if ( $register->registerAccount($_POST, $connect) > 0 ) {
      echo "
              <script type='text/javascript'>
                  document.addEventListener('DOMContentLoaded', () => {
                      Swal.fire({
                          icon: 'success',
                          title: 'Berhasil', 
                          html: '<p class=\"p-popup\">Registrasi berhasil!</p>',
                          showConfirmButton: false,
                          timer: 2000
                      }).then(() => {
                          // Redirect ke halaman login.php setelah popup ditutup
                          window.location.href = 'login.php';
                      });
                  })
              </script>
          ";
        

        // header("Location: dashboard/pages/content/dashboard/Dashboard.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Swipe Clean</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/logosc.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="assets/css/variables.css" rel="stylesheet" />
    <!-- <link href="assets/css/variables-blue.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-green.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-orange.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet" />

    <!-- =======================================================
* Template Name: HeroBiz
* Updated: Sep 18 2023 with Bootstrap v5.3.2
* Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
======================================================== -->
  </head>

  <body>
    <main>
      <div class="container">
        <section
          class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4"
        >
          <div class="container">
            <div class="row justify-content-center">
              <div
                class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center"
              >
                <div class="d-flex justify-content-center py-4">
                  <a
                    href="index.html"
                    class="logo d-flex align-items-center w-auto"
                  >
                    <img src="assets/img/logonew.png" alt="" />
                  </a>
                </div>
                <!-- End Logo -->

                <div class="card mb-3">
                  <div class="card-body">
                    <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">
                        Buat Akun Baru
                      </h5>
                      <p class="text-center small">
                        Isi data diri untuk membuat akun
                      </p>
                    </div>

                    <form class="row g-3 needs-validation" action="" method="post" novalidate>
                      <div class="col-12">
                        <label for="yourName" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" id="yourName" required/>
                        <div class="invalid-feedback">
                          Tolong, masukkan nama Anda!
                        </div>
                      </div>


                      <div class="col-12">
                        <label for="yourName" class="form-label">Nomor Telepon</label>
                        <input type="number" name="no_whatsapp" class="form-control" id="yourTelephone" required/>
                        <div class="invalid-feedback">
                          Please, enter your name!
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="yourEmail" class="form-label">Email</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend">@</span>
                          <input type="email" name="email" class="form-control" id="yourEmail" required/>
                          <div class="invalid-feedback">
                            Please enter a valid Email adddress!
                          </div>
                        </div>
                      </div>
                      

                      <!-- <div class="col-12">
                        <label for="yourUsername" class="form-label" >Username</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend">@</span>
                          <input type="text" name="username" class="form-control" id="yourUsername" required/>
                          <div class="invalid-feedback">
                            Please choose a username.
                          </div>
                        </div>
                      </div> -->

                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <div class="input-group has-validation">
                          <input type="password" name="password" class="form-control" id="yourPassword" required/>
                          <div class="invalid-feedback">
                            Please enter your password!
                          </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Konfirmasi Password</label>
                        <div class="input-group has-validation">
                          <input type="password" name="confirm" class="form-control" id="yourPassword" required/>
                          <div class="invalid-feedback">
                            Please enter your password!
                          </div>
                        </div>
                      </div>

                      <!-- <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required/>
                          <label class="form-check-label" for="acceptTerms">I agree and accept the
                            <a href="#">terms and conditions</a></label>
                          <div class="invalid-feedback">
                            You must agree before submitting.
                          </div>
                        </div>
                      </div> -->

                      <div class="col-12">
                        <div class="">
                        </div>
                      </div>

                      <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit" value="login" name="submit">
                          Buat Akun
                        </button>
                      </div>
                      <div class="col-12">
                        <p class="small mb-0">
                          Sudah mempunyai akun?
                          <a href="login.php">Log in</a>
                        </p>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
    <!-- End #main -->

    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>
