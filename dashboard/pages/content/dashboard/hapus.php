<?php
// Mulai session
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION["login"])) {
    header("Location: ../../../../login.php");
    exit;
}

// Include koneksi database
include '../../../../config/db.php';

// Cek apakah parameter id ada di URL
if (isset($_GET['id'])) {
    $id_pesanan = $_GET['id'];

    // Query untuk menghapus data berdasarkan id_pesanan
    $query = "DELETE FROM tbl_reservasi_do WHERE id_pesanan = ?";
    $stmt = mysqli_prepare($db_connect, $query);

    if ($stmt) {
        // Bind parameter
        mysqli_stmt_bind_param($stmt, "s", $id_pesanan);

        // Eksekusi query
        if (mysqli_stmt_execute($stmt)) {
            // Jika berhasil dihapus, set pesan sukses di session
            $_SESSION['success_message'] = "Data berhasil dihapus!";
        } else {
            // Jika gagal, set pesan error di session
            $_SESSION['error_message'] = "Gagal menghapus data: " . mysqli_error($db_connect);
        }

        // Tutup statement
        mysqli_stmt_close($stmt);
    } else {
        // Jika gagal menyiapkan statement
        $_SESSION['error_message'] = "Terjadi kesalahan dalam menyiapkan query.";
    }
} else {
    // Jika parameter id tidak ada
    $_SESSION['error_message'] = "ID tidak ditemukan!";
}

// Tutup koneksi database
mysqli_close($db_connect);

// Redirect ke halaman sebelumnya
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>