<?php
session_start();
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status_plat = $_POST["status_plat"] ?? '';
    $id_pesanan = $_POST["id_pesanan"] ?? '';
    $nama_perusahaan = $_POST["nama_perusahaan"] ?? '';
    $catatan_khusus = $_POST["catatan_khusus"] ?? '';
    $status_plat = $_POST["status_plat"] ?? '';
    $id = $_GET["id"] ?? null; // Hindari error jika id tidak ada

    if (!$id) {
        die("Error: ID tidak ditemukan.");
    }

    if ($db_connect->connect_error) {
        die("Koneksi gagal: " . $db_connect->connect_error);
    }

    if (!empty($id_pesanan)) {
        $sql = "UPDATE tbl_reservasi_do 
                SET nama_perusahaan='$nama_perusahaan', 
                    status_plat='$status_plat', 
                    id_pesanan='$id_pesanan', 
                    catatan_khusus='$catatan_khusus', 
                    status_plat='$status_plat'
                WHERE id='$id'";

        if (mysqli_query($db_connect, $sql)) {
            echo ("<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>");
            echo ("<script>
                    document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Ubah Data Berhasil', 
                            text: 'Edit data berhasil!',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(() => {
                            window.location.href = '../dashboard/pages/content/dashboard/Pencarian.php';
                        });
                    });
                </script>");
        } else {
            echo "Error: " . mysqli_error($db_connect);
        }
    } else {
        echo "Error: ID Pesanan tidak valid.";
    }

    mysqli_close($db_connect);
}
?>
