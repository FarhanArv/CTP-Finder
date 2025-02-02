<?php
  session_start();
  
  if( !isset($_SESSION["login"]) ) {
    header("Location: ../../../../login.php") ;
    exit;
  }
  $ds = DIRECTORY_SEPARATOR;  
  $base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . ".." ). $ds;
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
  include '../../../../config/db.php'

?>


    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Pelanggan</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Pelanggan</li>
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
                  <h5 class="card-title">Pelanggan</h5>
                  <!-- Table with stripped rows -->
                  <style>
                    .button-cell {
                      white-space: nowrap;
                    }
                  </style>

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Email</th>
                        <th scope="col">No WhatsApp</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <?php
                        // $iduser = $_SESSION['id'];
                        $query = mysqli_query($db_connect, "SELECT *
                                                            FROM tbl_users
                                                            ");
                        $nomor = 1;


                        while ($row = mysqli_fetch_assoc($query)) {
                            echo '<tr>';
                            echo '<td>' . $nomor .  '</td>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';  
                            echo '<td>' . $row['no_whatsapp'] . '</td>';
                            echo '<td>' . $row['role'] . '</td>';
                            echo '<td><a type="button" class="btn btn-success" href="edit-pelanggan.php?id=' . $row['id_user'] . '">Edit</a></td>';
                            echo '<td><button class="btn btn-danger" onclick="confirmDeleteSecond(' . $row["id_user"] . ')">Hapus</button></td>';
                            echo '</tr>';
                        
                            $nomor++;
                        }
                        
                        ?>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                         <script>
                          function confirmDeleteSecond(id_user) {
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
                                      window.location.href = '../../../../backend/proses_hapus_pelanggan.php?id=' + id_user;
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

