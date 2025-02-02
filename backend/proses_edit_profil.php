<?php
session_start();
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_POST['id_user'];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $no_whatsapp = $_POST["no_whatsapp"];
    // $iduser = $_SESSION['id'];
    

    if ($db_connect->connect_error) {
        die("Koneksi gagal: " . $db_connect->connect_error);
     }
    
     if (!empty($id_user)) {
        $sql = "UPDATE tbl_users SET name='$name' , email='$email', no_whatsapp='$no_whatsapp' WHERE id_user='$id_user'";
    
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
                            window.location.href = '../dashboard/pages/content/profile/profile.php';
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

