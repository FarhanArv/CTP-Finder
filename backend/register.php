<?php

class Register extends DB {
    function __construct($hostname, $username, $password, $database)
    {
        parent::__construct($hostname, $username, $password, $database);
    }

    public function connect() {
        return mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
    }

    public function registerAccount($data, $conn) {
        $name = htmlspecialchars($data['name']);
        $no_whatsapp = htmlspecialchars($data['no_whatsapp']);
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);
        $confirm = htmlspecialchars($data['confirm']);
    
        // Periksa jika ada data yang kosong
        if (empty($name) || empty($no_whatsapp) || empty($email) || empty($password) || empty($confirm)) {
            echo "
                <script type='text/javascript'>
                    document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal', 
                            html: '<p class="."p-popup".">Harap lengkapi semua data!</p>',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    })
                </script>
            ";
    
            return false;
        }
    
        // cek email already exist
        $result = mysqli_query($conn, "SELECT email FROM tbl_users WHERE email = '$email'");
    
        if (mysqli_num_rows($result) === 1) {
            echo "
                <script type='text/javascript'>
                    document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal', 
                            html: '<p class="."p-popup".">Email sudah ada sebelumnya!</p>',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    })
                </script>
            ";
    
            return false;
        }
    
        // cek password 
        if ($password !== $confirm) {
            echo "
                <script type='text/javascript'>
                    document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal', 
                            html: '<p class="."p-popup".">Password dan konfirmasi password tidak sama!</p>',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    })
                </script>
            ";
    
            return false;
        }

        // hash password
        $password = password_hash($password, PASSWORD_BCRYPT);
        $created_at = date('Y-m-d H:i:s', time());
        $updated_at = $created_at;

        mysqli_query($conn, "INSERT INTO tbl_users (name, email, no_whatsapp, role, password, created_at, update_at) VALUES(
            '$name',
            '$email',
            '$no_whatsapp',
            'user',
            '$password',
            '$created_at',
            '$updated_at'
        )");

        return mysqli_affected_rows($conn);
    }
}
?>

