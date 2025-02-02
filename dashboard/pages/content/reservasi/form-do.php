<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        die("Error: Session ID tidak tersedia.");
    }
  
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
        <h1>Input Data</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/Dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="./reservasi.php">Input Data</a></li>
            <li class="breadcrumb-item active">Form Input Plat</li>
          </ol>
        </nav>
      </div>
      <section class="section dashboard">
      <div class="row justify-content-center">
      <div class="col-lg-8" >
        <div class="card">
        <div class="card-body">
              <h5 class="card-title">Form Input Data Plat CTP</h5>
              <form class="row g-3 needs-validation" action="../../../../backend/proses-do.php" method="post" enctype="multipart/form-data">
                <h4>Input Data Plat CTP</h4>

                <!-- Pilih Jenis Layanan -->
                <div class="col-md-6">
                    <label for="ukuran_plat" class="form-label">Ukuran Plat</label>
                    <select class="form-select" name="ukuran_plat" id="ukuran_plat" required>
                        <option value="">- Pilih Ukuran Plat -</option>
                        <option value="Plat Toko">Plat Toko</option>
                        <option value="Plat 52">Plat 52</option>
                        <option value="Plat 58">Plat 58</option>
                        <option value="Plat 72">Plat 72</option>
                    </select>
                </div>

                <!-- Tanggal -->
                <div class="col-md-6">
                    <label for="tanggal_pesanan" class="form-label">Tanggal Pembuatan Plat</label>
                    <input type="date" class="form-control" id="tanggal_pesanan" name="tanggal_pesanan" value="<?= date('Y-m-d') ?>" required>
                </div>

                <!-- Jenis Desain -->
                <div class="col-md-6">
                    <label for="jenis_desain" class="form-label">Jenis Desain</label>
                    <select class="form-select" name="jenis_desain" id="ukuran_plat" required>
                        <option value="">- Pilih Jenis Desain -</option>
                        <option value="Kop Surat">Kop Surat</option>
                        <option value="Amplop">Amplop</option>
                        <option value="Nota / Invoice">Nota / Invoice</option>
                        <option value="Faktur Pajak">Faktur Pajak</option>
                        <option value="Dokumen">Dokumen</option>
                        <option value="Paper Bag">Paper Bag</option>
                        <option value="Buku">Buku</option>
                        <option value="Majalah">Majalah</option>
                        <option value="Undangan Pernikahan">Undangan Pernikahan</option>
                        <option value="Sertifikat & Piagam">Sertifikat & Piagam</option>
                        <option value="Tiket">Tiket</option>
                        <option value="Brosur">Brosur</option>
                        <option value="Flyer">Flyer</option>
                        <option value="Stiker & Label">Stiker & Label</option>
                    </select>
                </div>

                <!-- Nama Perusahaan -->
                <div class="col-md-6">
                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                    <input class="form-control" type="text" id="nama_perusahaan" name="nama_perusahaan" placeholder="Tulis di sini" aria-label="default input example">
                </div>

                <!-- Upload Gambar -->
                <div class="col-md-6">
                    <label for="gambar" class="form-label">Upload Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                </div>

                <!-- Deskripsi -->
                <div class="col-md-6">
                    <label for="catatan_khusus" class="form-label">Deskripsi</label>
                    <input class="form-control" type="text" id="catatan_khusus" name="catatan_khusus" placeholder="Tulis di sini" aria-label="default input example">
                </div>

                <!-- Tombol Submit -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit form</button>
                </div>
            </form>
          </div>
        </div>
      </div> 
      <div class="col-lg-4"> 
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Note</h5>
            <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Jenis Plat</th>
                                    <th scope="col">Ukuran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Plat Toko</td>
                                    <td>254 x 394 mm</td>
                                </tr>
                                <tr>
                                    <td>Plat 52</td>
                                    <td>510 x 400 mm</td>
                                </tr>
                                <tr>
                                    <td>Plat 58</td>
                                    <td>670 x 560 mm</td>
                                </tr>
                                <tr>
                                    <td>Plat 72</td>
                                    <td>724 x 605 mm</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th scope="col">Cara Baca Nomor Plat</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Contoh A-05-1</td>
                                </tr>
                                <tr>
                                    <td>A = Posisi Rak (A : Atas, B : Bawah)</td>
                                </tr>
                                <tr>
                                    <td>05 = Posisi Sekat Nomor 05</td>
                                </tr>
                                <tr>
                                    <td>1 = Posisi Plat Pada Sekat Adalah Nomor 1</td>
                                </tr>
                            </tbody>
                        </table>
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
