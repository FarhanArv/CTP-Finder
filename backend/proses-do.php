<?php
session_start();
include '../config/db.php';

if (!isset($_SESSION["login"])) {
    die("Error: Session ID tidak tersedia.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $tanggal_pesanan = $_POST["tanggal_pesanan"];
    $catatan_khusus = $_POST["catatan_khusus"];
    $namaPerusahaan = trim($_POST['nama_perusahaan']);
    $iduser = $_SESSION["login"];
    $status_plat = 'Baik';

    // Jenis Desain & Ukuran Plat
    $jenis_desain = $_POST['jenis_desain'];
    $ukuran_plat = $_POST['ukuran_plat'];

    // Validasi koneksi database
    if ($db_connect->connect_error) {
        die("Koneksi gagal: " . $db_connect->connect_error);
    }

    // Fungsi untuk menghasilkan id_pesanan
    function generateIdPesanan($db_connect) {
        $query = "SELECT id_pesanan FROM tbl_reservasi_do ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($db_connect, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $lastIdPesanan = $row['id_pesanan'];

            list($huruf, $nomorSekat, $nomorPlat) = explode('-', $lastIdPesanan);
            $nomorSekat = (int) $nomorSekat;
            $nomorPlat = (int) $nomorPlat;

            if ($nomorPlat < 5) {
                $nomorPlat++;
            } else {
                $nomorPlat = 1;
                if ($nomorSekat < 10) {
                    $nomorSekat++;
                } else {
                    $nomorSekat = 1;
                    $huruf = chr(ord($huruf) + 1);
                }
            }
        } else {
            $huruf = 'A';
            $nomorSekat = 1;
            $nomorPlat = 1;
        }

        return sprintf("%s-%02d-%d", $huruf, $nomorSekat, $nomorPlat);
    }

    $id_pesanan = generateIdPesanan($db_connect);

    // Upload Gambar
    $gambar = null;
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                $gambar = $target_file;
            } else {
                echo "Gagal mengunggah gambar.";
            }
        } else {
            echo "File bukan gambar.";
        }
    }

    // Simpan data reservasi dengan prepared statement
    $sql = "INSERT INTO tbl_reservasi_do (id_pesanan, id_user, tanggal_pesanan, catatan_khusus, nama_perusahaan, gambar, status_plat, jenis_desain, ukuran_plat) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($db_connect, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sisssssss", $id_pesanan, $iduser, $tanggal_pesanan, $catatan_khusus, $namaPerusahaan, $gambar, $status_plat, $jenis_desain, $ukuran_plat);
        if (mysqli_stmt_execute($stmt)) {
            echo ("<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', () => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Pemesanan Berhasil', 
                        html: '<p class=\"p-popup\">Pemesanan berhasil!</p>',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        window.location.href = '../dashboard/pages/content/nota/nota-do.php';
                    });
                });
            </script>");
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Gagal menyiapkan query reservasi: " . mysqli_error($db_connect);
    }

    mysqli_close($db_connect);
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
