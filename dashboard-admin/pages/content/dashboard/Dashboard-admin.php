<?php
  session_start();

  // if( !isset($_SESSION["login"]) ) {
  //   header("Location: ../../../../login.php") ;
  //   exit;
  // }
  
  $ds = DIRECTORY_SEPARATOR;  
  $base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . ".." ). $ds;
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
  include '../../../../config/db.php';
  
?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Pencarian Plat</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
        <li class="breadcrumb-item active">Pencarian Plat</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

  <section class="section dashboard">
    
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
          <!-- Welcome Admin -->
          <div class="col-xxl-4R col-xl-12">
            <div class="text">
              <!-- <div class="text">
                <h2 class="card-title" style="font-size: 35px">Welcome, <?php echo $_SESSION['name'];?></h2>
              </div> -->
            </div>
          </div><!-- End Welcome Admin -->
      </div>

        </div>
        <!-- TABEL PESANAN -->
        <div class="col-lg-12">
          <div class="card">
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
              <h5 class="card-title">Data Plat <span></span></h5>
              <div class="search-bar mb-3">
                    <form method="GET" action="">
                    <div class="input-group">
                        <input class="form-control" type="text" name="search" placeholder="Search...">
                        <button class="btn btn-primary" type="submit">Search</button>
                        <button class="btn btn-secondary" type="button" onclick="resetForm()">Reset</button>
                    </div>
                    </form>
                    <script>
                        function resetForm() {
                            document.querySelector('.search-bar input[name="search"]').value = '';
                            document.querySelector('.search-bar form').submit();
                        }
                    </script>
                </div>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No Plat</th>
                    <th scope="col">Tanggal Pembuatan</th>
                    <th scope="col">Ukuran Plat</th>
                    <th scope="col">Jenis Design</th>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Nama Plat</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <?php
                  if (isset($_GET['search'])) {
                      $search = mysqli_real_escape_string($db_connect, $_GET['search']);
                  
                      $query = mysqli_query($db_connect, "SELECT tbl_reservasi_do.*, tbl_harga_jl.*, tbl_harga_ad.*, tbl_users.*
                                                        FROM tbl_reservasi_do
                                                        JOIN tbl_harga_jl ON tbl_reservasi_do.id_jl = tbl_harga_jl.id_jl
                                                        JOIN tbl_harga_ad ON tbl_reservasi_do.id_ad = tbl_harga_ad.id_ad
                                                        LEFT JOIN tbl_users ON tbl_reservasi_do.id_user = tbl_users.id_user
                                                        WHERE tbl_reservasi_do.id_pesanan LIKE '%$search%'
                                                           OR tbl_reservasi_do.tanggal_pesanan LIKE '%$search%'
                                                           OR tbl_users.name LIKE '%$search%'
                                                           OR tbl_harga_jl.nama_jl LIKE '%$search%'
                                                           OR tbl_harga_ad.nama_ad LIKE '%$search%'
                                                           OR tbl_reservasi_do.status_pesanan LIKE '%$search%'
                                                        ORDER BY tbl_reservasi_do.id_pesanan DESC
                                                      ");
                  } else {
                      $query = mysqli_query($db_connect, "SELECT tbl_reservasi_do.*, tbl_harga_jl.*, tbl_harga_ad.*, tbl_users.*
                                                        FROM tbl_reservasi_do
                                                        JOIN tbl_harga_jl ON tbl_reservasi_do.id_jl = tbl_harga_jl.id_jl
                                                        JOIN tbl_harga_ad ON tbl_reservasi_do.id_ad = tbl_harga_ad.id_ad
                                                        LEFT JOIN tbl_users ON tbl_reservasi_do.id_user = tbl_users.id_user
                                                        ORDER BY tbl_reservasi_do.id_pesanan DESC
                                                      ");
                  }
                  
                  $nomor = 1;
                  while ($row = mysqli_fetch_assoc($query)) {
                    $tanggal_pesanan = date('d-m-Y', strtotime($row['tanggal_pesanan']));
                    $total_harga = $row['harga_jl'] + $row['harga_ad'];
                
                    echo '<tr>
        <td>' . $row['id_pesanan'] . '</td>
        <td>' . $tanggal_pesanan . '</td>
        <td>' . $row['nama_jl'] . '</td>
        <td>' . $row['name'] . '</td>
        <td>' . $row['nama_ad'] . '</td>
        <td>' . 'Rp. ' . number_format($total_harga, 0, ',', '.') . '</td>';

$status = $row['status_pesanan'];

switch ($status) {
    case 'Baik':
        echo '<td><span class="badge bg-success">' . $status . '</span></td>';
        break;

    case 'Rusak':
        echo '<td><span class="badge bg-danger">' . $status . '</span></td>';
        break;

    case 'Perbaikan':
        echo '<td><span class="badge bg-secondary">' . $status . '</span></td>';
        break;

    case 'Selesai':
        echo '<td><span class="badge bg-success">' . $status . '</span></td>';
        break;

    default:
        echo '<td><span class="badge bg-secondary">Unknown</span></td>';
        break;
}

// Tambahkan kolom tombol
echo '<td class="button-cell">
        <button type="button" class="btn btn-primary">Detail</button>
        <button type="button" class="btn btn-success">Edit</button>
        <button type="button" class="btn btn-danger" id="hapusButton">Hapus</button>
      </td>';

echo '</tr>';
                  }
                  ?>
                  </tr>
                </tbody>
              </table>
              <!-- <h5 class="card-title">Daftar Pesanan <span>| Self Service</span></h5>
              <form class="form-inline mb-3" method="GET" action="">
                  <div class="input-group">
                      <input class="form-control" type="text" name="search-ss" placeholder="Search...">
                      <button class="btn btn-primary" type="submit">Search</button>
                      <button class="btn btn-secondary" type="button" onclick="resetForm()">Reset</button>
                  </div>
              </form>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No Pesanan</th>
                    <th scope="col">Tanggal Pembuatan</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Nomor Mesin</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <?php
                  if (isset($_GET['search-ss'])) {
                    $search2 = mysqli_real_escape_string($db_connect, $_GET['search-ss']);
                    $query2 = mysqli_query($db_connect, "SELECT *
                                                      FROM detail_ss_users
                                                      WHERE detail_ss_users.id_tbl_r LIKE '%$search2%'
                                                         OR detail_ss_users.tanggal_pesanan LIKE '%$search2%'
                                                         OR detail_ss_users.name LIKE '%$search2%'
                                                         OR detail_ss_users.jam LIKE '%$search2%'
                                                         OR detail_ss_users.nomor_antrian LIKE '%$search2%'
                                                         OR detail_ss_users.status_pesanan LIKE '%$search2%'
                                                      ORDER BY detail_ss_users.id_tbl_r DESC
                                                    ");
                } else {
                    $query2 = mysqli_query($db_connect, "SELECT *
                                                      FROM detail_ss_users
                                                      ORDER BY detail_ss_users.id_tbl_r DESC
                                                    ");
                }
                
                $iduser = $_SESSION['id'];
                $nomor = 1;
                
                while ($row2 = mysqli_fetch_assoc($query2)) {
                    $tanggal_pesanan2 = date('d-m-Y', strtotime($row2['tanggal_pesanan']));
                
                    echo '<tr>';
                    echo '<td>' . $row2['id_tbl_r'] .  '</td>';
                    echo '<td>' . $tanggal_pesanan2 . '</td>';
                    echo '<td>' . $row2['name'] . '</td>';
                    echo '<td>' . $row2['jam'] . '</td>';
                    echo '<td>' . $row2['nomor_antrian'] . '</td>';
                
                    $status2 = $row2['status_pesanan'];
                
                    switch ($status2) {
                        case 'Active':
                            echo '<td><span class="badge bg-primary">' . $status2 . '</span></td>';
                            break;
                
                        case 'Inactive':
                            echo '<td><span class="badge bg-secondary">' . $status2 . '</span></td>';
                            break;
                
                        default:
                            echo '<td><span class="badge bg-warning">Unknown</span></td>';
                            break;
                    }
                
                    echo '</tr>';
                }
                          
                          ?>
                  </tr>
                </tbody>
              </table> -->
            </div>
          </div>       
        </div><!-- End TABEL PESANAN -->


  </section>
</main> <!-- End #main -->
<script>
    // Pilih tombol hapus berdasarkan ID
    document.getElementById('hapusButton').addEventListener('click', function () {
        // Tampilkan SweetAlert konfirmasi
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika dikonfirmasi, lakukan aksi hapus (misalnya request AJAX atau redirect)
                Swal.fire(
                    'Dihapus!',
                    'Data Anda berhasil dihapus.',
                    'success'
                );

                // Contoh: Redirect ke URL untuk menghapus data
                // window.location.href = 'delete.php?id=123'; // Ganti dengan URL Anda
            }
        });
    });
</script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
  require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>
