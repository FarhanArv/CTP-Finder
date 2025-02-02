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
        <h1>Reservasi Drop Off </h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="./reservasi.php">Reservasi</a></li>
            <li class="breadcrumb-item active">Drop Off</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section">
        <div class="row align-items-top">
          <div class="col-lg-3">
             <!-- Card Cuci Kering -->
             <div class="card">
              <img src="./img/menu1-do.jpg" class="card-img-top" alt="" />
              <div class="card-body">
                <h5 class="card-title">QuickDry & Press</h5>
                <p class="card-text">
                  Cuci Kering dan Setrika sampai dengan 2 Kg
                </p>
                <p class="card-text">
                  <a href="./form-do.php" class="btn btn-primary">Pesan</a>
                </p>
              </div>
            </div>
            <!-- End Card Cuci Kering -->
          </div>

          <div class="col-lg-3">
            <!-- Card Cuci Kering + Setrika up to 3 Kg -->
            <div class="card">
              <img src="./img/menu2-do.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">QuickDry & Press 3</h5>
                <p class="card-text">
                  Cuci Kering dan Setrika sampai dengan 3 Kg
                </p>
                <p class="card-text">
                  <a href="./form-do.php" class="btn btn-primary">Pesan</a>
                </p>
              </div>
            </div>
            <!-- End Card Cuci Kering + Setrika up to 3 Kg -->
          </div>
          
          <div class="col-lg-3">
            <!-- Card Cuci Kering + Setrika up to 5 Kg -->
            <div class="card">
              <img src="./img/menu3-do.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">QuickDry & Press 5</h5>
                <p class="card-text">
                  Cuci Kering dan Setrika sampai dengan 5 Kg
                </p>
                <p class="card-text">
                  <a href="./form-do.php" class="btn btn-primary">Pesan</a>
                </p>
              </div>
            </div>
            <!-- End Card Cuci Kering + Setrika up to 5 Kg -->
          </div>
        
          <div class="col-lg-3">
            <!-- Card Cuci Kering + Setrika up to 7 Kg -->
            <div class="card">
                  <img src="./img/menu4-do.jpg" class="card-img-top" alt="..." />
                  <div class="card-body">
                    <h5 class="card-title">QuickDry & Press 7</h5>
                    <p class="card-text">
                      Cuci Kering dan Setrika sampai dengan 7 Kg
                    </p>
                    <p class="card-text">
                      <a href="./form-do.php" class="btn btn-primary">Pesan</a>
                    </p>
                  </div>
            </div>
                <!-- End Card Cuci Kering + Setrika up to 7 Kg -->
          </div>

          
          
          
        </div>
      </section>
    </main>
    <!-- End #main -->

<?php
  require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>
