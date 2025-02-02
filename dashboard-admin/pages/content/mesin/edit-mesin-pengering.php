<?php
  session_start();
  
  if( !isset($_SESSION["login"]) ) {
    header("Location: ../../../../login.php") ;
    exit;
  }
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . "..") . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");
include '../../../../config/db.php';
?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Pesanan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
        <li class="breadcrumb-item"><a href="./mesin.php">Mesin</a></li>
        <li class="breadcrumb-item active">Edit Mesin</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

  <section class="section dashboard">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <?php
          $id = $_GET["id"];
          $sql = "SELECT * FROM tbl_mesin_pengering WHERE id_mesin_pengering=$id";

          $result = $db_connect->query($sql);

          if ($result === FALSE) {
            die("Error: " . $db_connect->error);
          }

          if ($row = $result->fetch_assoc()) {
          ?>
            <h5 class="card-title">Edit Mesin</h5>
            <p></p>
            <form method="post" action="../../../../backend/proses_edit_mesin_dry.php">
              <input type="hidden" name="id_mesin_pengering" value="<?php echo $row["id_mesin_pengering"] ?>">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">No</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nomor" value="<?php echo $row['id_mesin_pengering']; ?>" disabled>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">Mesin</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>" disabled>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example" name="status_mesin">
                    <option value="Aktif" <?php echo ($row['status_mesin'] == 'Aktif') ? 'selected' : ''; ?>>Aktif</option>
                    <option value="Nonaktif" <?php echo ($row['status_mesin'] == 'Nonaktif') ? 'selected' : ''; ?>>Nonaktif</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Kondisi</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example" name="kondisi">
                    <option value="Baik" <?php echo ($row['kondisi'] == 'Baik') ? 'selected' : ''; ?>>Baik</option>
                    <option value="Perbaikan" <?php echo ($row['kondisi'] == 'Perbaikan') ? 'selected' : ''; ?>>Perbaikan</option>
                    <option value="Rusak" <?php echo ($row['kondisi'] == 'Rusak') ? 'selected' : ''; ?>>Rusak</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </form><!-- End General Form Elements -->
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- End #main -->

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>
