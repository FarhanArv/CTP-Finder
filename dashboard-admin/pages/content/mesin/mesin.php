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
        <h1>Mesin</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Mesin</li>
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
         
        </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Data Mesin Cuci</h5>
                  <!-- Table with stripped rows -->
                  <style>
                    .button-cell {
                      white-space: nowrap;
                    }
                  </style>

                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Mesin</th>              
                        <th scope="col">Status</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <?php
                      $sql = "SELECT * FROM tbl_mesin_cuci";

                      $result = $db_connect->query($sql);

                      if ($result === FALSE) {
                          die("Error: " . $db_connect->error);
                      }
                      $nomor = 1;

                      while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $nomor . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                    
                        $statusMesinColor = ($row['status_mesin'] == 'Aktif') ? 'bg-success' : 'bg-danger';
                        echo "<td><span class='badge $statusMesinColor'>" . $row['status_mesin'] . "</span></td>";
                    
                        $kondisi = $row['kondisi'];
                        $kondisiColor = '';
                    
                        if ($kondisi == 'Baik') {
                            $kondisiColor = 'bg-success';
                        } elseif ($kondisi == 'Perbaikan') {
                            $kondisiColor = 'bg-warning';
                        } elseif ($kondisi == 'Rusak') {
                            $kondisiColor = 'bg-danger';
                        }
                    
                        echo "<td><span class='badge $kondisiColor'>" . $kondisi . "</span></td>";
                        
                        echo "<td class='button-cell'>";
                        echo "<a type='button' class='btn btn-success' style='margin-right: 5px;' href='edit-mesin.php?id=" . $row['id_mesin_cuci'] . "'>Edit</a>";
                        echo "</td>";
                        echo "</tr>";
                        
                        $nomor++;
                    }
                    
                    
                    
                      ?>
                      
                    </tbody>
                  </table>
                  <!-- End Table Mesin Cuci -->
                </div>
              </div>
            </div>
          </div>
        </div>

        </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Data Mesin Pengering</h5>
                  <!-- Table with stripped rows -->
                  <style>
                    .button-cell {
                      white-space: nowrap;
                    }
                  </style>

                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Mesin</th>              
                        <th scope="col">Status</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT * FROM tbl_mesin_pengering";

                    $result = $db_connect->query($sql);

                    if ($result === FALSE) {
                        die("Error: " . $db_connect->error);
                      }
                    $nomor = 1;

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $nomor . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                    
                        $statusMesinColor = ($row['status_mesin'] == 'Aktif') ? 'bg-success' : 'bg-danger';
                        echo "<td><span class='badge $statusMesinColor'>" . $row['status_mesin'] . "</span></td>";
                    
                        $kondisi = $row['kondisi'];
                        $kondisiColor = '';
                    
                        if ($kondisi == 'Baik') {
                            $kondisiColor = 'bg-success';
                        } elseif ($kondisi == 'Perbaikan') {
                            $kondisiColor = 'bg-warning';
                        } elseif ($kondisi == 'Rusak') {
                            $kondisiColor = 'bg-danger';
                        }
                    
                        echo "<td><span class='badge $kondisiColor'>" . $kondisi . "</span></td>";
                    
                        echo "<td class='button-cell'>";
                        echo "<a type='button' class='btn btn-success' style='margin-right: 5px;' href='edit-mesin-pengering.php?id=" . $row['id_mesin_pengering'] . "'>Edit</a>";
                    
                        echo "</td>";
                        echo "</tr>";
                    
                        $nomor++;
                    }
                  
                    ?>

                    </tbody>
                  </table>
                  <!-- End Table Mesin Pengering -->
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

