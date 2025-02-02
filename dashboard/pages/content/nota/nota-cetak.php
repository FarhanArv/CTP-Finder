<?php
  session_start();
  
  if( !isset($_SESSION["login"]) ) {
    header("Location: ../../../../login.php") ;
    exit;
  }

  // $ds = DIRECTORY_SEPARATOR;  
  // $base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . ".." ). $ds;
  // require_once("{$base_dir}pages{$ds}core{$ds}header.php");

  include '../../../../config/db.php';
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

    <main id="main" class="main">
    
      <!-- End Page Title -->
      

      <section class="section dashboard">
        <div class="row align-items-top">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Nota Laundry</h5>
                  <hr>
                  <p></p>
                  <!-- Nota -->
                                
                  <div class="row">
                    <div class="col-md-5">
                      <label class="form-label">No Pesanan : <?php 
                            $iduser = $_SESSION['id'];
                            $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_do` WHERE id_user = '$iduser'  ORDER BY id_pesanan DESC LIMIT 1");
                            while ($row = mysqli_fetch_assoc($sql)) {
                              echo "<div>" . $row['id_pesanan'] . "</div>";
                          }
                        ?></label>
                    </div>
                    <div class="col-md-5">
                      <label class="form-label">Tanggal Pemesanan : <?php 
                            $iduser = $_SESSION['id'];
                            $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_do` WHERE id_user = '$iduser'  ORDER BY id_pesanan DESC LIMIT 1");
                            while ($row = mysqli_fetch_assoc($sql)) {
                              $tanggalPesanan = date('d-m-Y', strtotime($row['tanggal_pesanan'])); // Ambil hanya tanggal
                              echo "<div>" . $tanggalPesanan . "</div>";
                          }
                        ?></label>
                    </div>
                    <div class="col-md-5">
                      <label class="form-label">Jenis Layanan : <?php 
                        $iduser = $_SESSION['id'];
                        $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_do` 
                                                          JOIN tbl_harga_jl ON tbl_reservasi_do.id_jl = tbl_harga_jl.id_jl
                                                          WHERE tbl_reservasi_do.id_user = '$iduser'
                                                          ORDER BY tbl_reservasi_do.id_pesanan DESC LIMIT 1");

                        if ($sql) {
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo "<div>" . $row['nama_jl'] . "</div>";
                            }
                        } else {
                            echo "Error: " . mysqli_error($db_connect);
                        }
                      ?></label>
                    </div>
                    <div class="col-md-5">
                      <label class="form-label">Nama Pelanggan : <?php 
                            $iduser = $_SESSION['id'];
                            $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_users` WHERE id_user = '$iduser'");
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo "<div class='form-label'>" . $row['name'] . "</div>";
                            }
                        ?></label>
                    </div>
                    <div class="col-md-5">
                      <label class="form-label">No Whatsapp : <?php 
                            $iduser = $_SESSION['id'];
                            $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_users` WHERE id_user = '$iduser'");
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo "<div class='form-label'>" . $row['no_whatsapp'] . "</div>";
                            }
                        ?></label>
                    </div>
                    <div class="col-md-5">
                      <label class="form-label">Catatan Khusus : <?php 
                            $iduser = $_SESSION['id'];
                            $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_do` WHERE id_user = '$iduser'  ORDER BY id_pesanan DESC LIMIT 1");
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo "<div class='form-label'>" . $row['catatan_khusus'] . "</div>";
                            }
                        ?></label>
                    </div>
                      
                    <div class="col-lg-12">
                      <br>
                      
                      <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tampilAdditional = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_do` 
                            JOIN tbl_harga_jl ON tbl_reservasi_do.id_jl = tbl_harga_jl.id_jl
                            JOIN tbl_harga_ad ON tbl_reservasi_do.id_ad = tbl_harga_ad.id_ad
                            WHERE tbl_reservasi_do.id_user = '$iduser'
                            ORDER BY tbl_reservasi_do.id_pesanan DESC LIMIT 1");
                            $counter = 1;

                            foreach ($tampilAdditional as $additionalItem) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $counter++ . "</th>";
                                echo "<td>" . $additionalItem['nama_jl'] .  "</td>";
                                echo "<td>" . $additionalItem['harga_jl'] . "</td>";
                                echo "</tr>";

                                if (!empty($additionalItem['nama_ad'])) {
                                  echo "<tr>";
                                  echo "<th scope='row'>" . $counter++ . "</th>";
                                  echo "<td>" . $additionalItem['nama_ad'] . "</td>";
                                  echo "<td>" . $additionalItem['harga_ad'] . "</td>";
                                  echo "</tr>";
                                }

                            }
                            ?>

                        </tbody>
                      </table>
                            
                        <?php
                          $iduser = $_SESSION['id'];

                        $totalHargaJl = 0;
                        $totalHargaAd = 0;
                        
                        $sqlJl = mysqli_query($db_connect, "SELECT *
                                    FROM tbl_reservasi_do
                                    JOIN tbl_harga_jl ON tbl_reservasi_do.id_jl = tbl_harga_jl.id_jl
                                    WHERE tbl_reservasi_do.id_user = '$iduser'
                                    ORDER BY tbl_reservasi_do.id_pesanan DESC
                                    LIMIT 1");
                        
                        while ($rowJl = mysqli_fetch_assoc($sqlJl)) {
                            $totalHargaJl += $rowJl['harga_jl'];
                        }
                         
                        $sqlAd = mysqli_query($db_connect, "SELECT *
                                    FROM tbl_reservasi_do
                                    JOIN tbl_harga_ad ON tbl_reservasi_do.id_ad = tbl_harga_ad.id_ad
                                    WHERE tbl_reservasi_do.id_user = '$iduser'
                                    ORDER BY tbl_reservasi_do.id_pesanan DESC
                                    LIMIT 1");
                        
                        while ($rowAd = mysqli_fetch_assoc($sqlAd)) {
                            $totalHargaAd += $rowAd['harga_ad'];
                        }
                        
                        $totalHargaSeluruh = $totalHargaJl + $totalHargaAd;
                    
                    ?>

                      <!-- End Default Table Example -->
            
                    </div>

                    <!-- Total Pesanan Anda -->
                    <div class="col-md-5">
                      <label class="form-label">Total Pesanan Anda : <?php echo $totalHargaSeluruh; ?></label>
                    </div>

                  </div>
                </div>
              </div>
            </div>   
          </div>     
        </div> 
        <script>
        // Contoh menggunakan JavaScript untuk memicu fungsi cetak
        window.onload = function() {
            window.print();
        }
    </script>
      </section>
  </main>
    <!-- End #main -->
