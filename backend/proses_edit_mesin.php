<?php
session_start();
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $status_mesin = $_POST["status_mesin"];
    $kondisi = $_POST["kondisi"];
    $id_mesin_cuci = $_POST["id_mesin_cuci"];
    // $iduser = $_SESSION['id'];
    

    if ($db_connect->connect_error) {
        die("Koneksi gagal: " . $db_connect->connect_error);
     }
    
     if (!empty($id_mesin_cuci)) {
        $sql = "UPDATE tbl_mesin_cuci SET status_mesin='$status_mesin', kondisi='$kondisi' , id_mesin_cuci='$id_mesin_cuci' WHERE id_mesin_cuci='$id_mesin_cuci'";
    
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
                            window.location.href = '../dashboard-admin/pages/content/mesin/mesin.php';
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

