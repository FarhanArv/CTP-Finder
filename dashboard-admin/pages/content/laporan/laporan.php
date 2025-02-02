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
        <h1>Pesanan</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Pesanan</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section dashboard">
        <div class="col-md-12">
                <div class="card info-card sales-card">
                  <!-- <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>
                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div> -->

                  <div class="card-body">
                    <h5 class="card-title">Laporan Pendapatan<span>| Drop Off</span></h5>

                    <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">No Pesanan</th>
                        <th scope="col">Tanggal Pesanan</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Jenis Layanan</th>
                        <th scope="col">Additional</th>
                        <th scope="col">Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <?php
                        $query = mysqli_query($db_connect, "SELECT tbl_transaksi_do.*, tbl_harga_jl.*, tbl_harga_ad.*, tbl_users.*
                                                            FROM tbl_transaksi_do
                                                            JOIN tbl_harga_jl ON tbl_transaksi_do.id_jl = tbl_harga_jl.id_jl
                                                            JOIN tbl_harga_ad ON tbl_transaksi_do.id_ad = tbl_harga_ad.id_ad
                                                            JOIN tbl_users ON tbl_transaksi_do.id_user = tbl_users.id_user;                        
                                                            ");

                        $totalHargaSemuaData = 0;

                        while ($row = mysqli_fetch_assoc($query)) {
                          $tanggal_pesanan = date('Y-m-d', strtotime($row['tanggal_pesanan']));
                          $total_harga = $row['harga_jl'] + $row['harga_ad'];
                          $totalHargaSemuaData += $total_harga; 
                          echo '<tr>
                                  <td>' . $row['id_pesanan'] .  '</td>
                                  <td>' . $tanggal_pesanan . '</td>
                                  <td>' . $row['name'] .  '</td>
                                  <td>' . $row['nama_jl'] . '</td>  
                                  <td>' . $row['nama_ad'] . '</td>
                                  <td>' . 'Rp. ' . number_format($total_harga, 0, ',', '.') . '</td>';
                          echo '</tr>';
                        }
                        
                        ?>
                      
                    </tbody>
                  </table>
                  <hr>
                  <!-- Total Pesanan Anda -->
                  <div class="col-md-5">
                      <label class="form-label">Total Pemasukan : <?php echo 'Rp. ' . number_format($totalHargaSemuaData, 0, ',', '.'); ?></label>
                  </div>
                  </div>

                </div>
              </div><!-- End Sales Card -->
      </section>
    </main>
    <!-- End #main -->

<?php
  require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>