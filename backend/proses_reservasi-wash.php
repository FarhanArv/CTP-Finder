<?php
session_start();
include '../config/db.php';

if ($db_connect->connect_error) {
   die("Koneksi gagal: " . $db_connect->connect_error);
}

$jam = isset($_POST['jam']) ? $_POST['jam'] : '';
$iduser = $_SESSION['id'];
$jenis = 'Wash It Yourself';

$sql = "SELECT COUNT(*) AS jumlah_aktif FROM tbl_mesin_cuci WHERE status_mesin = 'Aktif'";
$result = $db_connect->query($sql);

if ($result === FALSE) {
    die("Error: " . $db_connect->error);
}

// rowMW = row Mesin Wash
$rowMW = $result->fetch_assoc();
$maxSlots = $rowMW['jumlah_aktif'];

// $maxSlots = 4;

if (empty($jam)) {
   die("<SCRIPT LANGAUAGE='JavaScript'>
         window.location.href='../dashboard/pages/content/reservasi/form-ss-wash.php';
         window.alert('Anda belum memilih Jam!')
         </SCRIPT>");
}

$sqlCheckAvailability = "SELECT COUNT(*) as count FROM tbl_reservasi_ss WHERE jam = '$jam' AND id_user = '$iduser'";
$result = $db_connect->query($sqlCheckAvailability);

if ($result) {
   $row = $result->fetch_assoc();
   $count = $row['count'];

   if ($count < $maxSlots) {
      $sqlLastQueueNumber = "SELECT MAX(nomor_antrian) as last_queue_number FROM tbl_reservasi_ss WHERE jam = '$jam'";
      $resultLastQueueNumber = $db_connect->query($sqlLastQueueNumber);

      if ($resultLastQueueNumber) {
         $rowLastQueueNumber = $resultLastQueueNumber->fetch_assoc();
         $lastQueueNumber = $rowLastQueueNumber['last_queue_number'];

         $nomorAntrian = ($lastQueueNumber < $maxSlots) ? $lastQueueNumber + 1 : 1;
         
         $tanggalPesanan = date('Y-m-d H:i:s');

         $sql = "INSERT INTO tbl_reservasi_ss (jam, id_user, jenis_layanan, nomor_antrian, tanggal_pesanan) VALUES ('$jam', '$iduser', '$jenis', '$nomorAntrian', '$tanggalPesanan') ";

         if ($db_connect->query($sql) === TRUE) {
            echo ("
                  <script type='text/javascript'>
                     document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                              icon: 'success',
                              title: 'Reservasi Berhasil!', 
                              html: '<p class=\"p-popup\">Reservasi berhasil! Nomor Mesin Anda: $nomorAntrian</p>',
                              showConfirmButton: true,
                              timer: 5000
                        }).then(() => {
                              // Redirect ke halaman nota-do.php setelah popup ditutup
                              window.location.href = '../dashboard/pages/content/nota/nota-ss-wash.php';
                        });
                     });
                  </script>
        ");
         } else {
            echo "Error: " . $sql . "<br>" . $db_connect->error;
         }
      } else {
         echo "Error: " . $sqlLastQueueNumber . "<br>" . $db_connect->error;
      }
   } else {
      echo ("
            <script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', () => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Antrian Penuh!', 
                        html: '<p class=\"p-popup\">Maaf, slot untuk jam $jam sudah penuh. Silakan pilih jam lain.</p>',
                        showConfirmButton: true, // Set to true to display the OK button
                        timer: 5000
                    }).then(() => {
                        // Redirect ke halaman nota-do.php setelah popup ditutup
                        window.location.href = '../dashboard/pages/content/reservasi/form-ss-wash.php';
                    });
                });
            </script>
            ");
   }
   } else {
   echo "Error: " . $sqlCheckAvailability . "<br>" . $db_connect->error;
   }

?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
