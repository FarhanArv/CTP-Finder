<?php
  session_start();
  
  if( !isset($_SESSION["login"]) ) {
    header("Location: ../../../../login.php") ;
    exit;
  }
  
  // Simpan dua pilihan nama menu pada variabel sesi
  $_SESSION['menu_option_1'] = 'Wash It Yourself';
  $_SESSION['menu_option_2'] = 'Dry It Yourself';

  // Periksa apakah form telah dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Periksa apakah pilihan menu dipilih
      if (isset($_POST['selected_menu'])) {
          $selectedMenu = $_POST['selected_menu'];

          // Simpan pilihan menu ke sesi
          $_SESSION['selected_menu'] = $selectedMenu;

          // Alihkan ke halaman selanjutnya
          header('Location: form-ss.php');
          exit;
      }
  }

  $ds = DIRECTORY_SEPARATOR;  
  $base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . ".." ). $ds;
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
?>


    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Reservasi Self Service</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="./reservasi.php">Reservasi</a></li>
            <li class="breadcrumb-item active">Self Service</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section">
        <div class="row align-items-top">
          <div class="col-lg-6">
             <!-- Card Wash It Yourself -->
             <div class="card">
                <!-- <form action="../../../../backend/reservasi.php" method="post"> -->
                <!-- <form action="form-ss.php" method="post"> -->
                <img src="./img/menu1-ss.jpg" class="card-img-top" alt="" />
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $_SESSION['menu_option_1']; ?></h5>
                    <p class="card-text">Nyuci Sendiri Selama 30 Menit hanya 10 Ribu</p>
                    <p class="card-text">
                      <!-- <a href="./form-ss.php" class="btn btn-primary">Pesan</a> -->
                        <a class="btn btn-primary" name="selected_menu" href="form-ss-wash">Pesan</a>
                      <?php
          
                          // if(isset($_POST['submit'])) {
                          //   $_SESSION['wiy'] = 'Wash It Yourself';
                          // }

                          // echo $_SESSION['menu_option_1'];
                      
                      ?>
                       

                        
                      
                    </p>
                  <!-- </form> -->
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card">
            <!-- <form action="form-ss.php" method="post"> -->
              <img src="./img/menu2-ss.jpg" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title"><?php echo $_SESSION['menu_option_2']; ?></h5>
                  <p class="card-text">Mengeringkan Sendiri Selama 30 Menit hanya 15 Ribu</p>
                    <p class="card-text">
                    <a class="btn btn-primary" name="selected_menu" href="form-ss-dry">Pesan</a>
                      <?php

                        // if(isset($_POST['submit'])) {
                        //   $_SESSION['wiy'] = 'Dry It Yourself';
                        // }
                            
                        // echo $_SESSION['menu_option_2'];

                      ?>
                    </p>
                </div>
              <!-- </form> -->
            </div>
          </div> 

        </div>
      </section>
    </main>
    <!-- End #main -->

<?php
  require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>
