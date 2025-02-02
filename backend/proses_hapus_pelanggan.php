<?php
session_start();
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_user = $_GET["id"];

    if ($db_connect->connect_error) {
        die("Koneksi gagal: " . $db_connect->connect_error);
    }

    if (!empty($id_user)) {
        $sql = "DELETE FROM tbl_users WHERE id_user = $id_user";

        if (mysqli_query($db_connect, $sql)) {
            echo ("
                <script type='text/javascript'>
                    document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Hapus Data Berhasil', 
                            html: '<p class=\"p-popup\">Data berhasil dihapus!</p>',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(() => {
                            // Redirect ke halaman nota-do.php setelah popup ditutup
                            window.location.href = '../dashboard-admin/pages/content/pelanggan/pelanggan.php';
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
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>