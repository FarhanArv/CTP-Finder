<?php
session_start();

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . "$ds..$ds..$ds..") . $ds;

require_once("{$base_dir}pages{$ds}core{$ds}header.php");
include '../../../../config/db.php';

$id = $_GET["id"];
$query = mysqli_query($db_connect, "SELECT * FROM tbl_reservasi_do WHERE id = $id");

while ($row = mysqli_fetch_assoc($query)) {
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Data Plat</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
        <li class="breadcrumb-item"><a href="./pesanan.php">Pencarian Plat</a></li>
        <li class="breadcrumb-item active">Edit Data Plat</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Data Plat</h5>
          <form action="../../../../backend/proses_edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <input type="hidden" name="id_pesanan" value="<?php echo $row["id_pesanan"] ?>">

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Nomor Plat</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="no_plat" value="<?php echo $row["id_pesanan"] ?>" placeholder="Tulis di sini">
              </div>
            </div>

            <!-- <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Tanggal Pembuatan</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="tanggal_pesanan" value="<?php echo date('Y-m-d', strtotime($row['tanggal_pesanan'])); ?>">
              </div>
            </div> -->

            <!-- <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Ukuran Plat</label>
              <div class="col-sm-10">
                <select class="form-select" name="ukuran_plat">
                  <option value="1" <?php echo ($row['ukuran_plat'] == 1) ? "selected" : ""; ?>>Plat Toko</option>
                  <option value="2" <?php echo ($row['ukuran_plat'] == 2) ? "selected" : ""; ?>>Plat 52</option>
                  <option value="3" <?php echo ($row['ukuran_plat'] == 3) ? "selected" : ""; ?>>Plat 56</option>
                  <option value="4" <?php echo ($row['ukuran_plat'] == 4) ? "selected" : ""; ?>>Plat 72</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Jenis Desain</label>
              <div class="col-sm-10">
                <select class="form-select" name="ukuran_plat">
                  <option value="1" <?php if ($row['ukuran_plat'] == 1) echo "selected"; ?>>Plat Toko</option>
                  <option value="2" <?php if ($row['ukuran_plat'] == 2) echo "selected"; ?>>Plat 52</option>
                  <option value="3" <?php if ($row['ukuran_plat'] == 3) echo "selected"; ?>>Plat 56</option>
                  <option value="4" <?php if ($row['ukuran_plat'] == 4) echo "selected"; ?>>Plat 72</option>
                </select>
              </div>
            </div> -->

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Nama Perusahaan</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="nama_perusahaan" value="<?php echo $row["nama_perusahaan"] ?>" placeholder="Tulis di sini">
              </div>
            </div>

            <!-- <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Nama Plat</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="nama_plat" value="<?php echo $row["nama_plat"] ?>" placeholder="Tulis di sini">
              </div>
            </div> -->

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Deskripsi</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="catatan_khusus" value="<?php echo $row["catatan_khusus"] ?>" placeholder="Tulis di sini">
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Status Plat</label>
              <div class="col-sm-10">
                <select class="form-select" name="status_plat">
                  <option value="Baik" <?php if ($row['status_plat'] == "Baik") echo "selected"; ?>>Baik</option>
                  <option value="Rusak" <?php if ($row['status_plat'] == "Rusak") echo "selected"; ?>>Rusak</option>
                  <option value="Perbaikan" <?php if ($row['status_plat'] == "Perbaikan") echo "selected"; ?>>Perbaikan</option>
                </select>
              </div>
            </div>

            <!-- <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Ubah Gambar</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" name="gambar" accept="image/*">
                <?php if (!empty($row["gambar"])): ?>
                  <img src="../../../../uploads/<?php echo $row['gambar']; ?>" alt="Gambar Plat" class="img-thumbnail mt-2" width="150">
                <?php endif; ?>
              </div>
            </div> -->

            <div class="row mb-3">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
<?php
}
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>
