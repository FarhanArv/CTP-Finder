<?php
session_start();
include '../config/db.php';

if (mysqli_connect_errno()) {
    echo json_encode(['status' => 'error', 'message' => 'Koneksi database gagal: ' . mysqli_connect_error()]);
    exit();
}

$sql = "UPDATE tbl_reservasi_ss SET status_pesanan = 'Inactive'";

if (mysqli_query($db_connect, $sql)) {
    echo json_encode(['status' => 'success', 'message' => 'Data berhasil direset.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error: ' . $sql . '<br>' . mysqli_error($db_connect)]);
}

mysqli_close($db_connect);



?>