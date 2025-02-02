<?php
  session_start();
  $ds = DIRECTORY_SEPARATOR;  
  $base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . ".." ). $ds;
  require_once("{$base_dir}pages{$ds}core{$ds}header.php");
  include '../../../../config/db.php';

  $id = $_GET["id"];
  $query = mysqli_query($db_connect, "SELECT tbl_reservasi_ss.*, tbl_users.*
                                      FROM tbl_reservasi_ss
                                      JOIN tbl_users ON tbl_reservasi_ss.id_user = tbl_users.id_user
                                      WHERE id_tbl_r = $id");

  while ($row = mysqli_fetch_assoc($query)) {
    ?>
    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Edit Pesanan</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="./pesanan.php">Pesanan</a></li>
            <li class="breadcrumb-item active">Edit Pesanan</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section dashboard">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Pesanan</h5>
            <p></p>
              <form action="../../../../backend/proses_edit_ss.php" method="POST">
                <input type="hidden" name="id_tbl_r" value="<?php echo $row["id_tbl_r"] ?>">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label disabled">No Pesanan</label>
                  <div class="col-sm-10">
                  <input type="number" class="form-control" value="<?php echo $row['id_tbl_r'] ?>" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" value="name">Nama Pelanggan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name = "id_user" value="<?php echo $row['name'] ?> " disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Nomor Mesin</label>
                  <div class="col-sm-10">
                    <select class="form-select" name = "nomor_antrian" aria-label="Default select example">
                      <option selected>-- Pilih Nomor Mesin --</option>
                      <option value="1" <?php if ($row['nomor_antrian'] == "1") echo "selected"?>>Mesin 1</option>
                      <option value="2" <?php if ($row['nomor_antrian'] == "2") echo "selected"?>>Mesin 2</option>
                      <option value="3" <?php if ($row['nomor_antrian'] == "3") echo "selected"?>>Mesin 3</option>
                      <option value="4" <?php if ($row['nomor_antrian'] == "4") echo "selected"?>>Mesin 4</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status Pesanan</label>
                  <div class="col-sm-10">
                    <select class="form-select" name = "status_pesanan" aria-label="Default select example">
                      <option selected>-- Pilih Status Pesanan --</option>
                      <option value="Active" <?php if ($row['status_pesanan'] == "Active") echo "selected"?>>Active</option>
                      <option value="Inactive" <?php if ($row['status_pesanan'] == "Inactive") echo "selected"?>>Inactive</option>
                    </select>
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
