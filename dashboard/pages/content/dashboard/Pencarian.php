<?php
session_start();

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . "..") . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");
include '../../../../config/db.php';
?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Pencarian Plat</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
        <li class="breadcrumb-item active">Pencarian Plat</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Plat <span></span></h5>
            <div class="search-bar mb-3">
                <form method="GET" action="">
                </form>
                <script>
                    function resetForm() {
                        document.querySelector('.search-bar input[name="search"]').value = '';
                        document.querySelector('.search-bar form').submit();
                    }
                </script>
            </div>
            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">No Plat</th>
                        <th scope="col">Ukuran Plat</th>
                        <th scope="col">Jenis Design</th>
                        <th scope="col">Nama Perusahaan</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th> <!-- Kolom untuk tombol aksi -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Ambil data dari database
                    $query = "SELECT * FROM tbl_reservasi_do";
                    $result = mysqli_query($db_connect, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id_pesanan']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['ukuran_plat']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['jenis_desain']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['nama_perusahaan']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['catatan_khusus']) . "</td>";

                            // Tampilkan status dengan badge
                            $status = $row['status_plat'];
                            switch ($status) {
                                case 'Baik':
                                    echo '<td><span class="badge bg-success">' . $status . '</span></td>';
                                    break;
                                case 'Rusak':
                                    echo '<td><span class="badge bg-danger">' . $status . '</span></td>';
                                    break;
                                case 'Perbaikan':
                                    echo '<td><span class="badge bg-secondary">' . $status . '</span></td>';
                                    break;
                                case 'Selesai':
                                    echo '<td><span class="badge bg-success">' . $status . '</span></td>';
                                    break;
                                default:
                                    echo '<td><span class="badge bg-secondary">Unknown</span></td>';
                                    break;
                            }

                            // Tombol aksi (Detail, Edit, Hapus)
                            echo "<td>
                                    <a href='detail.php?id=" . $row['id'] . "' class='btn btn-info btn-sm'>Detail</a>
                                    <a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                    <button class='btn btn-danger btn-sm hapusButton' data-id='" . $row['id_pesanan'] . "'>Hapus</button>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>Tidak ada data tersedia</td></tr>";
                    }

                    mysqli_free_result($result);
                    mysqli_close($db_connect);
                    ?>
                </tbody>
            </table>
        </div>
        </div>
      </div>
    </div>
  </section>
</main>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Tangkap semua tombol hapus
    const hapusButtons = document.querySelectorAll('.hapusButton');

    hapusButtons.forEach(button => {
      button.addEventListener('click', function () {
        const idPesanan = this.getAttribute('data-id'); // Ambil ID pesanan dari atribut data-id

        Swal.fire({
          title: 'Apakah Anda yakin?',
          text: "Data yang dihapus tidak dapat dikembalikan!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Ya, Hapus!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            // Redirect ke halaman hapus.php dengan ID pesanan
            window.location.href = 'hapus.php?id=' + idPesanan;
          }
        });
      });
    });
  });
</script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
// Tampilkan pesan sukses atau error
if (isset($_SESSION['success_message'])) {
    echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '" . $_SESSION['success_message'] . "',
                showConfirmButton: false,
                timer: 1500
            });
          </script>";
    unset($_SESSION['success_message']); // Hapus pesan setelah ditampilkan
}

if (isset($_SESSION['error_message'])) {
    echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '" . $_SESSION['error_message'] . "',
                showConfirmButton: false,
                timer: 1500
            });
          </script>";
    unset($_SESSION['error_message']); // Hapus pesan setelah ditampilkan
}
?>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>