<?php
  session_start();
  
  if( !isset($_SESSION["login"]) ) {
    header("Location: ../../../../login.php") ;
    exit;
  }
  $ds = DIRECTORY_SEPARATOR;  
  $base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . ".." ). $ds;
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
  include '../../../../config/db.php';

?>


    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Reservasi</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="../reservasi/reservasi.php">Reservasi</a></li>
            <li class="breadcrumb-item active">Nota</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section dashboard">
        <div class="row align-items-top">
          <div class="row justify-content-center">
            <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Nota Laundry Self Service</h5>
                <hr>
                <p></p>
                <!-- Nota -->
                              
                <div class="row">
                  <div class="col-md-5">
                    <label class="form-label">No Pesanan</label>
                  </div>

                  <div class="col-md-2">
                    <label class="form-label">:</label>
                  </div>

                  <div class="col-md-5">
                    <label class="form-label">  
                    <?php 
                      $iduser = $_SESSION['id'];
                      $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_ss` WHERE id_user = '$iduser' AND jenis_layanan = 'Dry It Yourself' ORDER BY id_tbl_r DESC LIMIT 1");
                      while ($row = mysqli_fetch_assoc($sql)) {
                          echo "<div>" . $row['id_tbl_r'] . "</div>";
                      }
                    ?>

                    </label>
                  </div>

                  <div class="col-md-5">
                    <label class="form-label">Tanggal Pemesanan</label>
                  </div>

                  <div class="col-md-2">
                    <label class="form-label">:</label>
                  </div>

                  <div class="col-md-5">
                    <label class="form-label ">
                        <?php 
                          $iduser = $_SESSION['id'];
                          $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_ss` WHERE id_user = '$iduser' AND jenis_layanan = 'Dry It Yourself' ORDER BY id_tbl_r DESC LIMIT 1");
                          while ($row = mysqli_fetch_assoc($sql)) {
                            $tanggalPesanan = date('d-m-Y', strtotime($row['tanggal_pesanan'])); // Ambil hanya tanggal
                            echo "<div>" . $tanggalPesanan . "</div>";
                        }
                        ?>
                    </label>
                  </div>

                  <div class="col-md-5">
                    <label class="form-label">Jenis Layanan</label>
                  </div>

                  <div class="col-md-2">
                    <label class="form-label">:</label>
                  </div>

                  <div class="col-md-5">
                    <label class="form-label">
                        <?php 
                          $iduser = $_SESSION['id'];
                          $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_ss` WHERE id_user = '$iduser' AND jenis_layanan = 'Dry It Yourself' ORDER BY id_tbl_r DESC LIMIT 1");
                          while ($row = mysqli_fetch_assoc($sql)) {
                            echo "<div>" . $row['jenis_layanan'] . "</div>";
                        }
                        ?>
                    </label>
                  </div>

                  <div class="col-md-5">
                    <label class="form-label">Nomor Mesin</label>
                  </div>

                  <div class="col-md-2">
                    <label class="form-label">:</label>
                  </div>

                  <div class="col-md-5">
                    <label class="form-label">
                        <?php 
                          $iduser = $_SESSION['id'];
                          $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_ss` WHERE id_user = '$iduser' AND jenis_layanan = 'Dry It Yourself' ORDER BY id_tbl_r DESC LIMIT 1");
                          while ($row = mysqli_fetch_assoc($sql)) {
                            echo "<div>" . $row['nomor_antrian'] . "</div>";
                        }
                        ?>
                    </label>
                  </div>

                  <div class="col-md-5">
                    <label class="form-label">Jam Reservasi</label>
                  </div>

                  <div class="col-md-2">
                    <label class="form-label">:</label>
                  </div>

                  <div class="col-md-5">
                    <label class="form-label">
                        <?php 
                          $iduser = $_SESSION['id'];
                          $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_ss` WHERE id_user = '$iduser' AND jenis_layanan = 'Dry It Yourself' ORDER BY id_tbl_r DESC LIMIT 1");
                          while ($row = mysqli_fetch_assoc($sql)) {
                            echo "<div>" . $row['jam'] . "</div>";
                        }
                        ?>
                    </label>
                  </div>


                  <div class="col-md-5">
                    <label class="form-label">Nama Pelanggan</label>
                  </div>

                  <div class="col-md-2">
                    <label class="form-label">:</label>
                  </div>



                  <div class="col-md-5">
                      <?php 
                          $iduser = $_SESSION['id'];
                          $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_users` WHERE id_user = '$iduser'");
                          while ($row = mysqli_fetch_assoc($sql)) {
                              echo "<div class='form-label'>" . $row['name'] . "</div>";
                          }
                      ?>
                  </div>

                  <div class="col-md-5">
                    <label class="form-label">No Whatsapp</label>
                  </div>

                  <div class="col-md-2">
                    <label class="form-label">:</label>
                  </div>

                  <div class="col-md-5">
                    <label class="form-label">
                      <?php 
                          $iduser = $_SESSION['id'];
                          $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_users` WHERE id_user = '$iduser'");
                          while ($row = mysqli_fetch_assoc($sql)) {
                              echo "<div class='form-label'>" . $row['no_whatsapp'] . "</div>";
                          }
                      ?>
                    </label>
                  </div>
                  <br>
                  <br>
                  <br>
                  <div class="col-lg-12 text-center">
                    <a class="btn btn-primary" href="../reservasi/form-ss-dry.php" role="button">Kembali</a>
                  </div>
                </div>
              </div>
            </div>
            </div> 
          </div> 
        </div> 
      </section>
  </main>
    <!-- End #main -->

<?php
  require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>
