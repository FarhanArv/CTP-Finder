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
        <h1>Tambah Data Plat</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="./reservasi.php">Tambah Data</a></li>
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
                  <h5 class="card-title">Ringkasan Data Plat</h5>
                  <hr>
                  <p></p>
                  <!-- Nota -->
                                
                  <div class="row">
                    <!-- No Pesanan -->
                    <div class="col-md-5">
                      <label class="form-label">No Plat</label>
                    </div>

                    <div class="col-md-2">
                      <label class="form-label">:</label>
                    </div>

                    <div class="col-md-5">
                      <label class="form-label">
                        <?php 
                            $iduser = $_SESSION['id'];
                            $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_do` ORDER BY id_pesanan DESC LIMIT 1");
                            while ($row = mysqli_fetch_assoc($sql)) {
                              echo "<div>" . $row['id_pesanan'] . "</div>";
                          }
                        ?>
                      </label>
                    </div>

                    <!-- Tanggal Pemesanan -->
                    <div class="col-md-5">
                      <label class="form-label">Tanggal Pembuatan</label>
                    </div>

                    <div class="col-md-2">
                      <label class="form-label">:</label>
                    </div>

                    <div class="col-md-5">
                      <label class="form-label">
                        <?php 
                            $iduser = $_SESSION['id'];
                            $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_do`  ORDER BY id_pesanan DESC LIMIT 1");
                            while ($row = mysqli_fetch_assoc($sql)) {
                              $tanggalPesanan = date('d-m-Y', strtotime($row['tanggal_pesanan'])); // Ambil hanya tanggal
                              echo "<div>" . $tanggalPesanan . "</div>";
                          }
                        ?>
                      </label>
                    </div>

                    <!-- Jenis Layanan -->
                    <div class="col-md-5">
                      <label class="form-label">Ukuran Plat</label>
                    </div>

                    <div class="col-md-2">
                      <label class="form-label">:</label>
                    </div>

                    <div class="col-md-5">
                      <label class="form-label">
                      <?php 
                        $iduser = $_SESSION['id'];
                        $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_do` 
                                                          ORDER BY tbl_reservasi_do.id_pesanan DESC LIMIT 1");

                        if ($sql) {
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo "<div>" . $row['ukuran_plat'] . "</div>";
                            }
                        } else {
                            echo "Error: " . mysqli_error($db_connect);
                        }
                      ?>

                      </label>
                    </div>

                    <!-- No Whatsapp -->
                    <div class="col-md-5">
                      <label class="form-label">Jenis Desain</label>
                    </div>

                    <div class="col-md-2">
                      <label class="form-label">:</label>
                    </div>

                    <div class="col-md-5">
                      <label class="form-label">
                      <?php 
                            $iduser = $_SESSION['id'];
                            $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_do` ORDER BY id_pesanan DESC LIMIT 1");
                            while ($row = mysqli_fetch_assoc($sql)) {
                              echo "<div>" . $row['jenis_desain'] . "</div>";
                          }
                        ?>
                      </label>
                    </div>
                    
                    <!-- Nama Pelanggan -->
                    <!-- <div class="col-md-5">
                      <label class="form-label">Nama Pelanggan</label>
                    </div>

                    <div class="col-md-2">
                      <label class="form-label">:</label>
                    </div>

                    <div class="col-md-5">
                      <label class="form-label">
                        <?php 
                            // $iduser = $_SESSION['id'];
                            // $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_users` WHERE id_user = '$iduser'");
                            // while ($row = mysqli_fetch_assoc($sql)) {
                            //     echo "<div class='form-label'>" . $row['name'] . "</div>";
                            // }
                        ?>
                      </label>
                    </div> -->
                    
                    <!-- No Whatsapp -->
                    <!-- <div class="col-md-5">
                      <label class="form-label">No Whatsapp</label>
                    </div>

                    <div class="col-md-2">
                      <label class="form-label">:</label>
                    </div> -->

                    <!-- <div class="col-md-5">
                      <label class="form-label">
                        <?php 
                            // $iduser = $_SESSION['id'];
                            // $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_users` WHERE id_user = '$iduser'");
                            // while ($row = mysqli_fetch_assoc($sql)) {
                            //     echo "<div class='form-label'>" . $row['no_whatsapp'] . "</div>";
                            // }
                        ?>
                      </label>
                    </div> -->

                    <!-- No Whatsapp -->
                    <div class="col-md-5">
                      <label class="form-label">Nama Perusahan</label>
                    </div>

                    <div class="col-md-2">
                      <label class="form-label">:</label>
                    </div>

                    <div class="col-md-5">
                      <label class="form-label">
                      <?php 
                            $iduser = $_SESSION['id'];
                            $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_do` ORDER BY id_pesanan DESC LIMIT 1");
                            while ($row = mysqli_fetch_assoc($sql)) {
                              echo "<div>" . $row['nama_perusahaan'] . "</div>";
                          }
                        ?>
                      </label>
                    </div>
                              
                    <div class="col-md-5">
                      <label class="form-label">Deskripsi</label>
                    </div>

                    <div class="col-md-2">
                      <label class="form-label">:</label>
                    </div>

                    <div class="col-md-5">
                      <label class="form-label">
                      <?php 
                            $iduser = $_SESSION['id'];
                            $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_do` ORDER BY id_pesanan DESC LIMIT 1");
                            while ($row = mysqli_fetch_assoc($sql)) {
                              echo "<div>" . $row['catatan_khusus'] . "</div>";
                          }
                        ?>
                      </label>
                    </div>

                    <div class="col-md-5">
                      <label class="form-label">Gambar Plat</label>
                    </div>

                    <div class="col-md-2">
                      <label class="form-label">:</label>
                    </div>

                    <div class="col-md-5">
                      <label class="form-label">
                        <?php
                        $iduser = $_SESSION['id'];
                        $sql = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_do` ORDER BY id_pesanan DESC LIMIT 1");
                        if ($row = mysqli_fetch_assoc($sql)) {
                            $gambar = $row['gambar'];
                        } else {
                            $gambar = "uploads/default.jpg"; // Jika tidak ada gambar, gunakan gambar default
                        }
                        mysqli_close($db_connect);
                        ?>
                        <img src="default.jpg" alt="Gambar Reservasi" style="max-width: 300px; height: auto; border: 1px solid #ccc; padding: 5px;">
                      </label>
                    </div>

                    
                        
                    <div class="col-lg-12">
                      <br>
                      
                      <!-- <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $tampilAdditional = mysqli_query($db_connect, "SELECT * FROM `tbl_reservasi_do` 
                            // JOIN tbl_harga_jl ON tbl_reservasi_do.id_jl = tbl_harga_jl.id_jl
                            // JOIN tbl_harga_ad ON tbl_reservasi_do.id_ad = tbl_harga_ad.id_ad
                            // WHERE tbl_reservasi_do.id_user = '$iduser'
                            // ORDER BY tbl_reservasi_do.id_pesanan DESC LIMIT 1");
                            // $counter = 1;

                            // foreach ($tampilAdditional as $additionalItem) {
                            //     echo "<tr>";
                            //     echo "<th scope='row'>" . $counter++ . "</th>";
                            //     echo "<td>" . $additionalItem['nama_jl'] .  "</td>";
                            //     echo "<td>" . $additionalItem['harga_jl'] . "</td>";
                            //     echo "</tr>";

                            //     if (!empty($additionalItem['nama_ad'])) {
                            //       echo "<tr>";
                            //       echo "<th scope='row'>" . $counter++ . "</th>";
                            //       echo "<td>" . $additionalItem['nama_ad'] . "</td>";
                            //       echo "<td>" . $additionalItem['harga_ad'] . "</td>";
                            //       echo "</tr>";
                            //     }

                            // }
                            ?>

                        </tbody>
                      </table> -->
                            
                      <?php 
                        // $iduser = $_SESSION['id'];

                        // $totalHargaJl = 0;
                        // $totalHargaAd = 0;
                        
                        // $sqlJl = mysqli_query($db_connect, "SELECT *
                        //             FROM tbl_reservasi_do
                        //             JOIN tbl_harga_jl ON tbl_reservasi_do.id_jl = tbl_harga_jl.id_jl
                        //             WHERE tbl_reservasi_do.id_user = '$iduser'
                        //             ORDER BY tbl_reservasi_do.id_pesanan DESC
                        //             LIMIT 1");
                        
                        // while ($rowJl = mysqli_fetch_assoc($sqlJl)) {
                        //     $totalHargaJl += $rowJl['harga_jl'];
                        // }
                        
                        // $sqlAd = mysqli_query($db_connect, "SELECT *
                        //             FROM tbl_reservasi_do
                        //             JOIN tbl_harga_ad ON tbl_reservasi_do.id_ad = tbl_harga_ad.id_ad
                        //             WHERE tbl_reservasi_do.id_user = '$iduser'
                        //             ORDER BY tbl_reservasi_do.id_pesanan DESC
                        //             LIMIT 1");
                        
                        // while ($rowAd = mysqli_fetch_assoc($sqlAd)) {
                        //     $totalHargaAd += $rowAd['harga_ad'];
                        // }
                        
                        // $totalHargaSeluruh = $totalHargaJl + $totalHargaAd;
                    
                    ?>

                      <!-- End Default Table Example -->
            
                    </div>

                    <!-- <div class="col-md-5">
                      <label class="form-label">Total Pesanan Anda</label>
                    </div>

                    <div class="col-md-1">
                      <label class="form-label"></label>
                    </div>

                    <div class="col-md-6" style="text-align: center;">
                      <label class="form-label">
                        <?php // echo $totalHargaSeluruh; ?>
                      </label>
                    </div> -->
                    
                    <div class="col-lg-12 text-center">
                      <a class="btn btn-primary" href="../reservasi/form-do.php" role="button">Kembali</a>
                      <!-- <a class="btn btn-primary" target="_blank" href="nota-cetak.php" role="button">Cetak</a> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Ukuran Plat</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Jenis Plat</th>
                                    <th scope="col">Ukuran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Plat Toko</td>
                                    <td>254 x 394 mm</td>
                                </tr>
                                <tr>
                                    <td>Plat 52</td>
                                    <td>510 x 400 mm</td>
                                </tr>
                                <tr>
                                    <td>Plat 58</td>
                                    <td>670 x 560 mm</td>
                                </tr>
                                <tr>
                                    <td>Plat 72</td>
                                    <td>724 x 605 mm</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th scope="col">Cara Baca Nomor Plat</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Contoh A-05-1</td>
                                </tr>
                                <tr>
                                    <td>A = Posisi Rak (A : Atas, B : Bawah)</td>
                                </tr>
                                <tr>
                                    <td>05 = Posisi Sekat Nomor 05</td>
                                </tr>
                                <tr>
                                    <td>1 = Posisi Plat Pada Sekat Adalah Nomor 1</td>
                                </tr>
                            </tbody> 
                        </table>
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
