<?php
  session_start();
  $ds = DIRECTORY_SEPARATOR;  
  $base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . ".." ). $ds;
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
  include '../../../../config/db.php';
?>

<!-- http://swipeclean-main.test/dashboard-admin/pages/content/pesanan/edit-do.php?id=129 -->

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Pencarian</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Pencarian</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section">
        <style>
          .button-cell {
            white-space: nowrap;
          }
        </style>

        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Pencarian Plat</h5>
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
                  <!-- Table with stripped rows -->
                  <style>
                    .button-cell {
                      white-space: nowrap;
                    }
                  </style>

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">No Plat</th>
                        <th scope="col">Tanggal Pembuatan</th>
                        <!-- <th scope="col">Nama Pelanggan</th> -->
                        <th scope="col">Ukuran Plat</th>
                        <th scope="col">Nama Perusahaan</th>
                        <th scope="col">Nama Plat</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <tr>
                      
                    <?php
                    $iduser = $_SESSION['id'];
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
                      // If no search is performed, use the original query
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
                        $tanggal_pesanan = date('Y-m-d', strtotime($row['tanggal_pesanan']));
                        $total_harga = $row['harga_jl'] + $row['harga_ad'];

                    echo '<tr>
                            <td>' . $row['id_pesanan'] . '</td>
                            <td>' . $tanggal_pesanan . '</td>
                            
                            <td>' . $row['nama_jl'] . '</td>  
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
                    
                    echo '<td>
                            <a class="btn btn-success" href="edit-do.php?id=' . $row["id_pesanan"] . '">Edit</a>
                            <button class="btn btn-danger" onclick="confirmDelete(' . $row["id_pesanan"] . ')">Hapus</button>
                          </td>
                        </tr>';
                
                        $id_pesanan = $row['id_pesanan'];
                        $nomor++;
                    }
                    ?>

                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

                    <script>
                        function confirmDelete(id_pesanan) {
                            Swal.fire({
                                title: 'Yakin menghapus data?',
                                text: 'Data yang dihapus tidak dapat kembali!',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Hapus'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../../../../backend/proses_hapus.php?id=' + id_pesanan;
                                }
                            });
                        }
                    </script>
                                </div>
                            </div>
                        </div>
                      </tr>
                    </tbody>
                  </table>

                  <!-- End Table with stripped rows -->

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

