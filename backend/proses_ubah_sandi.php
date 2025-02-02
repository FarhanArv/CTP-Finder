<?php
session_start();
include '../config/db.php';

// enkripsi inputan password lama
$password_lama = $_POST['pass_lama'];

// panggil username
$id_user = $_SESSION['id'];

// uji jika password lama sesuai
$tampil = mysqli_query($db_connect, "SELECT * FROM tbl_users WHERE id_user = '$id_user'");
$data = mysqli_fetch_array($tampil);

// jika data ditemukan, maka password sesuai
if ($data && password_verify($password_lama, $data['password'])) {
    // uji jika password baru dan konfirmasi password sama
    $password_baru = $_POST['pass_baru'];
    $konfirmasi_password = $_POST['konfirmasi_pass'];

    if ($password_baru == $konfirmasi_password) {
        // proses ganti password
        // enkripsi password baru
        $pass_ok = password_hash($password_baru, PASSWORD_DEFAULT);
        $ubah = mysqli_query($db_connect, "UPDATE tbl_users SET password = '$pass_ok' WHERE id_user = '$id_user'");
        
        if ($ubah) {
            echo ("
                    <script type='text/javascript'>
                    document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!', 
                                html: '<p class=\"p-popup\">Password anda berhasil diubah!</p>',
                                showConfirmButton: true,
                                timer: 5000
                        }).then(() => {
                                // Redirect ke halaman nota-do.php setelah popup ditutup
                                window.location.href = '../dashboard/pages/content/profile/profile.php';
                        });
                    });
                    </script>
                ");
        } else {
            echo ("
                    <script type='text/javascript'>
                    document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                                icon: 'error',
                                title: 'Gagal!', 
                                html: '<p class=\"p-popup\">Gagal mengubah password!</p>',
                                showConfirmButton: true,
                                timer: 5000
                        }).then(() => {
                                // Redirect ke halaman nota-do.php setelah popup ditutup
                                window.location.href = '../dashboard/pages/content/profile/profile.php';
                        });
                    });
                    </script>
                ");
        }
    } else {
        echo ("
        <script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire({
                    icon: 'error',
                    title: 'Gagal!', 
                    html: '<p class=\"p-popup\">Maaf, Password Baru & Konfirmasi password yang anda inputkan tidak sama!</p>',
                    showConfirmButton: true,
                    timer: 5000
            }).then(() => {
                    // Redirect ke halaman nota-do.php setelah popup ditutup
                    window.location.href = '../dashboard/pages/content/profile/profile.php';
            });
        });
        </script>
    ");
    }
} else {
    echo ("
        <script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire({
                    icon: 'error',
                    title: 'Gagal!', 
                    html: '<p class=\"p-popup\">Password lama anda tidak sesuai/tidak terdaftar!</p>',
                    showConfirmButton: true,
                    timer: 5000
            }).then(() => {
                    // Redirect ke halaman nota-do.php setelah popup ditutup
                    window.location.href = '../dashboard/pages/content/profile/profile.php';
            });
        });
        </script>
    ");
}
?>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
