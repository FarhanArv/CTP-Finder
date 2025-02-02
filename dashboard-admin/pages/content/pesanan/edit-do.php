<?php
  session_start();
  $ds = DIRECTORY_SEPARATOR;  
  $base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . ".." ). $ds;
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
  include '../../../../config/db.php';

  // http://swipeclean-main.test/dashboard-admin/pages/content/pesanan/pesanan-do.php


  $id = $_GET["id"];
  $query = mysqli_query($db_connect, "SELECT tbl_reservasi_do.*, tbl_harga_jl.*, tbl_harga_ad.*, tbl_users.*
                                      FROM tbl_reservasi_do
                                      JOIN tbl_harga_jl ON tbl_reservasi_do.id_jl = tbl_harga_jl.id_jl
                                      JOIN tbl_harga_ad ON tbl_reservasi_do.id_ad = tbl_harga_ad.id_ad
                                      JOIN tbl_users ON tbl_reservasi_do.id_user = tbl_users.id_user
                                      WHERE id_pesanan = $id");

  while ($row = mysqli_fetch_assoc($query)) {
    // var_dump($row);
    ?>
    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Edit Pesanan</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="./pesanan.php">Pencarian Plat</a></li>
            <li class="breadcrumb-item active">Edit Data Plat</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section dashboard">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Data Plat</h5>
            <p></p>
              <form action="../../../../backend/proses_edit.php" method="POST">
                <input type="hidden" name="id_pesanan" value="<?php echo $row["id_pesanan"] ?>">
                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">No Plat</label>
                  <div class="col-sm-10">
                  <input class="form-control" type="text" id="nama_perusahaan" name="nama_perusahaan" 
                placeholder="Tulis di sini" aria-label="default input example">
                  </div>
                </div>

                <!-- <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" value="name">Nama Pelanggan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name = "id_user" value="<?php echo $row['name'] ?> " disabled>
                  </div>
                </div> -->
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Tanggal Pembuatan</label>
                  <div class="col-sm-10">
                    <?php
                    $tanggal_database = $row['tanggal_pesanan'];
                    $tanggal_format_baru = date('Y-m-d', strtotime($tanggal_database));
                    ?>
                    <input type="date" class="form-control" name="tanggal_pesanan" value="<?php echo $tanggal_format_baru; ?>">
                  </div>
                </div>


                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Ukuran Plat</label>
                  <div class="col-sm-10">
                    <select class="form-select" name = "id_jl" aria-label="Default select example">
                      <option selected>- Pilih Ukuran Plat -</option>
                      <option value="1" <?php if ($row['nama_jl'] == "QuickDry & Press") echo "selected"?>>Plat Toko</option>
                      <option value="2" <?php if ($row['nama_jl'] == "QuickDry & Press 3") echo "selected"?>>Plat 52  </option>
                      <option value="3" <?php if ($row['nama_jl'] == "QuickDry & Press 5") echo "selected"?>>Plat 56</option>
                      <option value="4" <?php if ($row['nama_jl'] == "QuickDry & Press 7") echo "selected"?>>Plat 72</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Nama Perusahaan</label>
                  <div class="col-sm-10">
                    <!-- <select class="form-select" name = "id_ad" aria-label="Default select example">
                      <option selected>-- Pilih Additional --</option>
                      <option value="1" <?php if ($row['nama_ad'] == "Tas Kecil") echo "selected"?>>Tas Kecil</option>
                      <option value="2" <?php if ($row['nama_ad'] == "Tas Sedang") echo "selected"?>>Tas Sedang</option>
                      <option value="3" <?php if ($row['nama_ad'] == "Tas Besar") echo "selected"?>>Tas Besar</option>
                      <option value="4" <?php if ($row['nama_ad'] == "Kantong Plastik") echo "selected"?>>Kantong Plastik</option>
                    </select> -->
                    <input class="form-control" type="text" id="nama_perusahaan" name="nama_perusahaan" 
                placeholder="Tulis di sini" aria-label="default input example">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Nama Plat</label>
                  <div class="col-sm-10">
                    <!-- <select class="form-select" name = "id_ad" aria-label="Default select example">
                      <option selected>-- Pilih Additional --</option>
                      <option value="1" <?php if ($row['nama_ad'] == "Tas Kecil") echo "selected"?>>Tas Kecil</option>
                      <option value="2" <?php if ($row['nama_ad'] == "Tas Sedang") echo "selected"?>>Tas Sedang</option>
                      <option value="3" <?php if ($row['nama_ad'] == "Tas Besar") echo "selected"?>>Tas Besar</option>
                      <option value="4" <?php if ($row['nama_ad'] == "Kantong Plastik") echo "selected"?>>Kantong Plastik</option>
                    </select> -->
                    <input class="form-control" type="text" id="nama_perusahaan" name="nama_perusahaan" 
                placeholder="Tulis di sini" aria-label="default input example">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <!-- <select class="form-select" name = "id_ad" aria-label="Default select example">
                      <option selected>-- Pilih Additional --</option>
                      <option value="1" <?php if ($row['nama_ad'] == "Tas Kecil") echo "selected"?>>Tas Kecil</option>
                      <option value="2" <?php if ($row['nama_ad'] == "Tas Sedang") echo "selected"?>>Tas Sedang</option>
                      <option value="3" <?php if ($row['nama_ad'] == "Tas Besar") echo "selected"?>>Tas Besar</option>
                      <option value="4" <?php if ($row['nama_ad'] == "Kantong Plastik") echo "selected"?>>Kantong Plastik</option>
                    </select> -->
                    <input class="form-control" type="text" id="nama_perusahaan" name="nama_perusahaan" 
                placeholder="Tulis di sini" aria-label="default input example">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status Plat</label>
                  <div class="col-sm-10">
                    <select class="form-select" name = "status_pesanan" aria-label="Default select example">
                      <option selected>-- Pilih Status Plat --</option>
                      <option value="Menunggu" <?php if ($row['status_pesanan'] == "Menunggu") echo "selected"?>>Baik</option>
                      <option value="Diterima" <?php if ($row['status_pesanan'] == "Diterima") echo "selected"?>>Rusak</option>
                      <option value="Proses" <?php if ($row['status_pesanan'] == "Proses") echo "selected"?>>Perbaikan</option>
                    </select
                    <input class="form-control" type="text" id="nama_perusahaan" name="nama_perusahaan" 
                placeholder="Tulis di sini" aria-label="default input example">
                  </div>
                </div>
               

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->
          </div>
        </div>
      </div>
    </section>
  </main>
    <?php
  }


?>


    
    <!-- End #main -->

<?php
  require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>
