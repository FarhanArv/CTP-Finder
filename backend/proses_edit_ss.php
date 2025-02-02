<?php
session_start();
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $tanggal_pesanan = $_POST["tanggal_pesanan"];
    $id_pesanan = $_POST["id_pesanan"];
    $nama_perusahaan= $_POST["nama_perusahaan"];
    $catatan_khusus= $_POST["catatan_khusus"];
    $status_plat= $_POST["status_plat"];
    
    if ($db_connect->connect_error) {
        die("Koneksi gagal: " . $db_connect->connect_error);
     }
    
     if (!empty($id_pesanan)) {
        $sql = "UPDATE tbl_reservasi_do SET id_pesanan='$id_pesanan', nama_perusahaan='$nama_perusahaan', catatan_khusus='$catatan_khusus', status_plat='$status_plat' WHERE id_pesanan='$id_pesanan";
    
        if (mysqli_query($db_connect, $sql)) {
            echo ("
                <script type='text/javascript'>
                    document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Ubah Data Berhasil', 
                            html: '<p class=\"p-popup\">Edit data berhasil!</p>',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(() => {
                            // Redirect ke halaman nota-do.php setelah popup ditutup
                            window.location.href = '../dashboard-admin/pages/content/pesanan/pesanan-ss.php';
                        });
                    });
                </script>
            ");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db_connect);
        }
    } else {
        echo "Error: ID Pesanan tidak valid.";
    }

    mysqli_close($db_connect);
}


?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

