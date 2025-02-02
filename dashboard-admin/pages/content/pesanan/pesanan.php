<?php
  session_start();
  
  if( !isset($_SESSION["login"]) ) {
    header("Location: ../../../../login.php") ;
    exit;
  }
  $ds = DIRECTORY_SEPARATOR;  
  $base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . ".." ). $ds;
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
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
                  <h5 class="card-title">Pesanan Drop Off</h5>
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
                        <th scope="col">Tanggal Pesanan</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Jenis Layanan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>000111111</td>
                        <td>12/12/2023</td>
                        <td>Laura Amelia</td>
                        <td>Quick Dry</td>
                        <td>28.000</td>
                        <td><span class="badge bg-success">Selesai</span></td>
                        <td class="button-cell">
                          <button type="button" class="btn btn-success">Edit</button>
                          <button type="button" class="btn btn-danger">Hapus</button>
                        </td>
                      </tr>

                      <tr>
                        <td>0001112222</td>
                        <td>13/12/2023</td>
                        <td>Laura Amelia</td>
                        <td>Quick Dry</td>
                        <td>28.000</td>
                        <td><span class="badge bg-warning">Proses</span></td>
                        <td class="button-cell">
                          <button type="button" class="btn btn-success">Edit</button>
                          <button type="button" class="btn btn-danger">Hapus</button>
                        </td>
                      </tr>

                      <tr>
                        <td>0001112222</td>
                        <td>13/12/2023</td>
                        <td>Laura Amelia</td>
                        <td>Quick Dry</td>
                        <td>28.000</td>
                        <td><span class="badge bg-danger">Gagal</span></td>
                        <td class="button-cell">
                          <a type="button" class="btn btn-success" href='./edit-do.php'>Edit</a>
                          <button type="button" class="btn btn-danger">Hapus</button>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>

                  <!-- End Table with stripped rows -->

                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Pesanan Self Service</h5>
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
                        <th scope="col">Tanggal Pesanan</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Jenis Layanan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>000111111</td>
                        <td>12/12/2023</td>
                        <td>Laura Amelia</td>
                        <td>Quick Dry</td>
                        <td>28.000</td>
                        <td><span class="badge bg-success">Selesai</span></td>
                        <td class="button-cell">
                          <button type="button" class="btn btn-success">Edit</button>
                          <button type="button" class="btn btn-danger">Hapus</button>
                        </td>
                      </tr>

                      <tr>
                        <td>0001112222</td>
                        <td>13/12/2023</td>
                        <td>Laura Amelia</td>
                        <td>Quick Dry</td>
                        <td>28.000</td>
                        <td><span class="badge bg-warning">Proses</span></td>
                        <td class="button-cell">
                          <button type="button" class="btn btn-success">Edit</button>
                          <button type="button" class="btn btn-danger">Hapus</button>
                        </td>
                      </tr>

                      <tr>
                        <td>0001112222</td>
                        <td>13/12/2023</td>
                        <td>Laura Amelia</td>
                        <td>Quick Dry</td>
                        <td>28.000</td>
                        <td><span class="badge bg-danger">Gagal</span></td>
                        <td class="button-cell">
                          <a type="button" class="btn btn-success" href='./edit-do.php'>Edit</a>
                          <button type="button" class="btn btn-danger">Hapus</button>
                        </td>
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

