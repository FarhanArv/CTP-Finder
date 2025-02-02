<?php
  session_start();
  
  if( !isset($_SESSION["login"]) ) {
    header("Location: ../../../../login.php") ;
    exit;
  }

  $ds = DIRECTORY_SEPARATOR;  
  $base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . ".." ). $ds;
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
  // require_once("{$base_dir}{$base_dir}{$base_dir}backend");
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
        <div class="row">
          <!-- Riwayat Pesanan -->
          <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Riwayat Pesanan <span>| Drop Off</span></h5>
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jenis Layanan</th>
                        <th scope="col">Laundry Stuff</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <?php
                      $iduser = $_SESSION['id'];
                      $query = mysqli_query($db_connect, "SELECT tbl_reservasi_do.*, tbl_harga_jl.*, tbl_harga_ad.*
                                                          FROM tbl_reservasi_do
                                                          JOIN tbl_harga_jl ON tbl_reservasi_do.id_jl = tbl_harga_jl.id_jl
                                                          JOIN tbl_harga_ad ON tbl_reservasi_do.id_ad = tbl_harga_ad.id_ad
                                                          WHERE tbl_reservasi_do.id_user = '$iduser'
                                                          ORDER BY id_pesanan DESC");
                      $nomor = 1;
                      while ($row = mysqli_fetch_assoc($query)) {
                        $tanggal_pesanan = date('Y-m-d', strtotime($row['tanggal_pesanan']));
                        $total_harga = $row['harga_jl'] + $row['harga_ad'];
                    
                        $status_pesanan = $row['status_pesanan'];
                    
                        echo '<tr>';
                        echo '<td>' . $nomor .  '</td>';
                        echo '<td>' . $tanggal_pesanan . '</td>';
                        echo '<td>' . $row['nama_jl'] . '</td>';
                        echo '<td>' . $row['nama_ad'] . '</td>';
                        echo '<td>' . 'Rp. ' . number_format($total_harga, 0, ',', '.') . '</td>';
                    
                        switch ($status_pesanan) {
                            case 'Menunggu':
                                echo '<td><span class="badge bg-secondary">' . $status_pesanan . '</span></td>';
                                break;
                    
                            case 'Diterima':
                                echo '<td><span class="badge bg-info">' . $status_pesanan . '</span></td>';
                                break;
                    
                            case 'Proses':
                                echo '<td><span class="badge bg-warning">' . $status_pesanan . '</span></td>';
                                break;
                    
                            case 'Selesai':
                                echo '<td><span class="badge bg-success">' . $status_pesanan . '</span></td>';
                                break;
                    
                            default:
                                echo '<td><span class="badge bg-secondary">Unknown</span></td>';
                                break;
                        }
                    
                        echo '</tr>';
                        $nomor++;
                    }
                      ?>
                      </tr>
                    </tbody>
                  </table>
                  <h5 class="card-title">Riwayat Pesanan <span>| Self Service</span></h5>
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jenis Layanan</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Nomor Mesin</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <?php
                          $iduser = $_SESSION['id'];
                          $query = mysqli_query($db_connect, "SELECT tbl_reservasi_ss.*, tbl_users.*
                                                              FROM tbl_reservasi_ss
                                                              JOIN tbl_users ON tbl_reservasi_ss.id_user = tbl_users.id_user
                                                              WHERE tbl_reservasi_ss.id_user = '$iduser'
                                                              ORDER BY id_tbl_r DESC");
                           $nomor = 1;
                           while ($row = mysqli_fetch_assoc($query)) {
                             $status = $row['status_pesanan'];
                             $tanggal_pesanan = date('Y-m-d', strtotime($row['tanggal_pesanan']));
                             
                             echo '<tr>';
                             echo '<td>' . $nomor .  '</td>';
                             echo '<td>' . $tanggal_pesanan . '</td>';
                             echo '<td>' . $row['jenis_layanan'] . '</td>';  
                             echo '<td>' . $row['jam'] . '</td>';
                             echo '<td>' . $row['nomor_antrian'] . '</td>';
                         
                             switch ($status) {
                                 case 'Active':
                                     echo '<td><span class="badge bg-primary">' . $status . '</span></td>';
                                     break;
                         
                                 case 'Inactive':
                                     echo '<td><span class="badge bg-secondary">' . $status . '</span></td>';
                                     break;
                         
                                 default:
                                     echo '<td><span class="badge bg-warning">Unknown</span></td>';
                                     break;
                             }
                         
                             echo '</tr>';
                         
                             $nomor++;
                         }
                        ?>

                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- End Riwayat Pesanan -->
          </div><!-- End Right side columns -->
        </div>

      </section>
    </main>
    <!-- End #main -->

<?php
  require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>
