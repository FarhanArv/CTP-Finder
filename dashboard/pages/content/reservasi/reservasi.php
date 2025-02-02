<?php
  session_start();
  
  if( !isset($_SESSION["login"]) ) {
    header("Location: ../../../../login.php") ;
    exit;
  }
  $ds = DIRECTORY_SEPARATOR;  
  $base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . ".." ). $ds;
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
?>


    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Reservasi</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Reservasi</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section">
        <div class="row align-items-top">
          <div class="col-lg-6">
             <!-- Card Drop Off -->
             <div class="card">
              <img src="./img/drop-off.jpg" class="card-img-top" alt="" />
              <div class="card-body">
                <h5 class="card-title">Drop Off</h5>
                <p class="card-text">
                  Antar Pakaianmu Sendiri ke Outlet
                </p>
                <p class="card-text">
                  <a href="./form-do.php" class="btn btn-primary">Pesan</a>
                </p>
              </div>
            </div>
            <!-- End Card Drop Off -->
          </div>

          <div class="col-lg-6">
            <!-- Card Self Service -->
            <div class="card">
              <img src="./img/self-service.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Self Service</h5>
                <p class="card-text">
                  lakukan kegiatan laundrymu sendiri
                </p>
                <p class="card-text">
                  <a href="./reservasi-ss.php" class="btn btn-primary">Pesan</a>
                </p>
              </div>
            </div>
            <!-- End Card with an image on top -->
          </div>
        </div>
      </section>
    </main>
    <!-- End #main -->

<?php
  require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>

