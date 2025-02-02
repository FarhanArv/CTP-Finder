<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../../../../login.php");
    exit;
}

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . "$ds..$ds..$ds..") . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");
include '../../../../config/db.php';

$id = $_GET["id"] ?? 0;
$query = mysqli_query($db_connect, "SELECT * FROM tbl_reservasi_do WHERE id = " . intval($id));
$row = mysqli_fetch_assoc($query);

if (!$row) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='../reservasi/reservasi.php';</script>";
    exit;
}
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Detail Data Plat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="./reservasi.php">Pencarian Plat</a></li>
                <li class="breadcrumb-item active">Detail Data Plat</li>
            </ol>
        </nav>
    </div>
    
    <section class="section dashboard">
        <div class="row align-items-top justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ringkasan Data Plat</h5>
                        <hr>
                        
                        <div class="row">
                            <div class="col-md-5"><label class="form-label">No Plat</label></div>
                            <div class="col-md-2"><label class="form-label">:</label></div>
                            <div class="col-md-5"><label class="form-label"><?php echo $row['id_pesanan'] ?? '-'; ?></label></div>

                            <div class="col-md-5"><label class="form-label">Tanggal Pembuatan</label></div>
                            <div class="col-md-2"><label class="form-label">:</label></div>
                            <div class="col-md-5">
                                <label class="form-label">
                                    <?php echo isset($row['tanggal_pesanan']) ? date('d-m-Y', strtotime($row['tanggal_pesanan'])) : '-'; ?>
                                </label>
                            </div>
                            
                            <?php 
                            $sql = mysqli_query($db_connect, "SELECT * FROM tbl_reservasi_do WHERE tbl_reservasi_do.id = " . intval($id));
                            $ukuranPlat = mysqli_fetch_assoc($sql);
                            ?>

                            <div class="col-md-5"><label class="form-label">Ukuran Plat</label></div>
                            <div class="col-md-2"><label class="form-label">:</label></div>
                            <div class="col-md-5"><label class="form-label"><?php echo $ukuranPlat['ukuran_plat'] ?? '-'; ?></label></div>

                            <div class="col-md-5"><label class="form-label">Jenis Desain</label></div>
                            <div class="col-md-2"><label class="form-label">:</label></div>
                            <div class="col-md-5"><label class="form-label"><?php echo $row['jenis_desain'] ?? '-'; ?></label></div>

                            <div class="col-md-5"><label class="form-label">Nama Perusahaan</label></div>
                            <div class="col-md-2"><label class="form-label">:</label></div>
                            <div class="col-md-5"><label class="form-label"><?php echo $row['nama_perusahaan'] ?? '-'; ?></label></div>

                            <div class="col-md-5"><label class="form-label">Deskripsi</label></div>
                            <div class="col-md-2"><label class="form-label">:</label></div>
                            <div class="col-md-5"><label class="form-label"><?php echo $row['catatan_khusus'] ?? '-'; ?></label></div>

                            <div class="col-md-5"><label class="form-label">Gambar Plat</label></div>
                            <div class="col-md-2"><label class="form-label">:</label></div>
                            <div class="col-md-5">
                                <label class="form-label">
                                    <?php $gambar = $row['gambar'] ?? 'default.jpg'; ?>
                                    <img src="default.jpg" alt="Gambar Reservasi" style="max-width: 400px; height: auto; border: 1px solid #ccc; padding: 5px;">
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 text-center">
                            <a class="btn btn-primary" href="../reservasi/form-do.php" role="button">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Ukuran Plat</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Jenis Plat</th>
                                    <th scope="col">Ukuran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>Plat Toko</td><td>254 x 394 mm</td></tr>
                                <tr><td>Plat 52</td><td>510 x 400 mm</td></tr>
                                <tr><td>Plat 58</td><td>670 x 560 mm</td></tr>
                                <tr><td>Plat 72</td><td>724 x 605 mm</td></tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th scope="col">Cara Baca Nomor Plat</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>Contoh A-05-1</td></tr>
                                <tr><td>A = Posisi Rak (A : Atas, B : Bawah)</td></tr>
                                <tr><td>05 = Posisi Sekat Nomor 05</td></tr>
                                <tr><td>1 = Posisi Plat Pada Sekat Adalah Nomor 1</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  
        </div>
    </section>
</main>
<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>
