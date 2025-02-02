<?php
session_start();

class Login extends DB {
    function __construct($hostname, $username, $password, $database)
    {
        parent::__construct($hostname, $username, $password, $database);
    }

    public function connect() {
        return mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
    }

    public function LoginAction($data, $conn) {
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);

        $result = mysqli_query($conn, "SELECT * FROM tbl_users WHERE email = '$email'");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        // Lakukan sanitasi pada input, misalnya menggunakan mysqli_real_escape_string
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        // Query untuk mendapatkan data pengguna berdasarkan email
        $query = "SELECT * FROM tbl_users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        
        // Periksa apakah kueri berhasil dieksekusi
        if (!$result) {
            die('Error in SQL query: ' . mysqli_error($conn));
        }
        
        // Periksa jumlah baris hasil kueri
        if (mysqli_num_rows($result) === 1) {
            $arr = mysqli_fetch_assoc($result);
        
            // Periksa apakah password sesuai menggunakan password_verify
            if (password_verify($password, $arr['password'])) {
                // cek role
                if ($arr['role'] === 'user') {
                    // set session
                    $_SESSION['id'] = $arr['id_user'];
                    $_SESSION['name'] = $arr['name'];
                    $_SESSION['email'] = $arr['email'];
                    $_SESSION['login'] = $arr['role'];
        
                    // Redirect ke dashboard user
                    header("Location: dashboard/pages/content/dashboard/Dashboard.php");
                    exit;
                } else {
                    // set session
                    $_SESSION['id'] = $arr['id_user'];
                    $_SESSION['name'] = $arr['name'];
                    $_SESSION['email'] = $arr['email'];
                    $_SESSION['login'] = $arr['role'];
        
                    // Redirect ke dashboard admin
                    header("Location: dashboard-admin/pages/content/dashboard/Dashboard.php");
                    exit;
                }
            } else {
                // Password tidak sesuai
                echo "
                <script type='text/javascript'>
                    document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                            icon: 'error',
                            title: 'error', 
                            html: '<p class="."p-popup".">Password salah!</p>',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    })
                </script>
            ";
            }
        } else {
            // Pengguna dengan email tersebut tidak ditemukan
            echo "
                <script type='text/javascript'>
                    document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                            icon: 'error',
                            title: 'error', 
                            html: '<p class="."p-popup".">Email atau password salah!</p>',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    })
                </script>
            ";
        }
        
        // Tutup koneksi database
        mysqli_close($conn);
    }

}
?>

