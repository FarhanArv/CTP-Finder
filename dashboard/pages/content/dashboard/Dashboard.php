<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../../../../login.php");
    exit;
}

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . ".." . $ds . ".." . $ds . "..") . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");
include '../../../../config/db.php';
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Plat<span></span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="card-title ps-3">
                                        <h8>
                                            <?php
                                            // Query untuk menghitung total plat
                                            $queryTotal = "SELECT COUNT(*) as total FROM tbl_reservasi_do";
                                            $resultTotal = mysqli_query($db_connect, $queryTotal);
                                            $rowTotal = mysqli_fetch_assoc($resultTotal);
                                            $totalPlat = $rowTotal['total'];

                                            // Query untuk menghitung plat baik
                                            $queryBaik = "SELECT COUNT(*) as baik FROM tbl_reservasi_do WHERE status_plat = 'Baik'";
                                            $resultBaik = mysqli_query($db_connect, $queryBaik);
                                            $rowBaik = mysqli_fetch_assoc($resultBaik);
                                            $platBaik = $rowBaik['baik'];

                                            // Query untuk menghitung plat baik
                                            $queryPerbaikan = "SELECT COUNT(*) as baik FROM tbl_reservasi_do WHERE status_plat = 'Perbaikan'";
                                            $resultPerbaikan = mysqli_query($db_connect, $queryPerbaikan);
                                            $rowPerbaikan = mysqli_fetch_assoc($resultPerbaikan);
                                            $platPerbaikan = $rowPerbaikan['baik'];

                                            // Query untuk menghitung plat rusak
                                            $queryRusak = "SELECT COUNT(*) as rusak FROM tbl_reservasi_do WHERE status_plat = 'Rusak'";
                                            $resultRusak = mysqli_query($db_connect, $queryRusak);
                                            $rowRusak = mysqli_fetch_assoc($resultRusak);
                                            $platRusak = $rowRusak['rusak'];

                                            // Tampilkan data
                                            echo "<h5 class=''>Total Plat : $totalPlat | Plat Baik : $platBaik | Plat Perbaikan : $platPerbaikan | Plat Rusak : $platRusak<span></span></h5>";
                                            ?>
                                        </h8>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="filter">
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Data Plat <span></span></h5>
                                <div class="search-bar mb-3">
                                    <!-- <form method="GET" action="">
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="search" placeholder="Search...">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                            <button class="btn btn-secondary" type="button" onclick="resetForm()">Reset</button>
                                        </div>
                                    </form> -->
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
                                            <!-- <th scope="col">Tanggal</th> -->
                                            <th scope="col">Ukuran Plat</th>
                                            <th scope="col">Jenis Design</th>
                                            <th scope="col">Nama Perusahaan</th>
                                            <th scope="col">Nama Plat</th>
                                            <th scope="col">Status</th>
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
                                                // echo "<td>" . ($row['status_plat']) . "</td>";
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
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='6' class='text-center'>Tidak ada data tersedia</td></tr>";
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

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>