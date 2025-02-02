<?php
  session_start();
  $ds = DIRECTORY_SEPARATOR;  
  $base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . ".." ). $ds;
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
  include '../../../../config/db.php';
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
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
                <h5 class="card-title">Reset Harian Reservasi</h5>
                <button class="btn btn-danger" id="resetButton">Reset Status Pesanan</button>

                <script>
                    const resetButton = document.getElementById('resetButton');

                    resetButton.addEventListener('click', function() {
                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: 'Semua status pesanan akan direset menjadi Inaktif!',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Ya, Reset!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                fetch('../../../../backend/reset_ss.php', {
                                    method: 'POST'
                                }).then(response => response.json())
                                  .then(data => {
                                      Swal.fire({
                                          title: 'Berhasil!',
                                          text: 'Data berhasil direset.',
                                          icon: 'success'
                                      });
                                  })
                                  .catch(error => {
                                      Swal.fire({
                                          title: 'Error!',
                                          text: 'Terjadi kesalahan saat mereset data.',
                                          icon: 'error'
                                      });
                                  });
                            }
                        });
                    });
                </script>

                <h5 class="card-title">Pesanan Self Service</h5>
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
                        <th scope="col">No Pesanan</th>
                        <th scope="col">Tanggal Reservasi</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Jenis Layanan</th>
                        <th scope="col">Nomor Mesin</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      </tr>
                      <tr>
                      <?php
                      $iduser = $_SESSION['id'];
                      if (isset($_GET['search'])) {
                        $search = mysqli_real_escape_string($db_connect, $_GET['search']);
                    
                        $query = mysqli_query($db_connect, "SELECT tbl_reservasi_ss.*, tbl_users.*
                                                          FROM tbl_reservasi_ss
                                                          JOIN tbl_users ON tbl_reservasi_ss.id_user = tbl_users.id_user
                                                          WHERE tbl_reservasi_ss.id_tbl_r LIKE '%$search%'
                                                             OR tbl_reservasi_ss.tanggal_pesanan LIKE '%$search%'
                                                             OR tbl_users.name LIKE '%$search%'
                                                             OR tbl_reservasi_ss.jam LIKE '%$search%'
                                                             OR tbl_reservasi_ss.nomor_antrian LIKE '%$search%'
                                                             OR tbl_reservasi_ss.status_pesanan LIKE '%$search%'
                                                          ORDER BY tbl_reservasi_ss.id_tbl_r DESC
                                                        ");
                    } else {

                        $query = mysqli_query($db_connect, "SELECT tbl_reservasi_ss.*, tbl_users.*
                                                              FROM tbl_reservasi_ss
                                                              JOIN tbl_users ON tbl_reservasi_ss.id_user = tbl_users.id_user
                                                              ORDER BY id_tbl_r DESC
                                                        ");
                    }

                      $nomor = 1;

                      while ($row = mysqli_fetch_assoc($query)) {
                          $tanggal_pesanan = date('d-m-Y', strtotime($row['tanggal_pesanan']));

                          echo '<tr>';
                          echo '<td>' . $row['id_tbl_r'] .  '</td>';
                          echo '<td>' . $tanggal_pesanan . '</td>';
                          echo '<td>' . $row['name'] . '</td>';  
                          echo '<td>' . $row['jenis_layanan'] . '</td>';
                          echo '<td>' . $row['nomor_antrian'] . '</td>';

                          $status = $row['status_pesanan'];

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

                          echo '<td>
                                  <a class="btn btn-success" href="edit-ss.php?id=' . $row["id_tbl_r"] . '">Edit</a>
                                  <button class="btn btn-danger" onclick="confirmDeleteSecond(' . $row["id_tbl_r"] . ')">Hapus</button>
                                </td>';
                          echo '</tr>';

                          $id_tbl_r = $row['id_tbl_r'];
                          $nomor++;
                      }
                      ?>
                      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                      
                      <script>
                          function confirmDeleteSecond(id_tbl_r) {
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
                                      window.location.href = '../../../../backend/proses_hapus_ss.php?id=' + id_tbl_r;
                                  }
                              });
                          }
                      </script>
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

