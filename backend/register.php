<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $no_hp = $_POST['no_hp'];

    $sql = "INSERT INTO users (nama, email, password, no_hp, role) 
            VALUES ('$nama', '$email', '$password', '$no_hp', 'pendaki')";
    
    if ($conn->query($sql)) {
        header("Location: ../login.html?success=1");
    } else {
        echo "Gagal registrasi: " . $conn->error;
    }
}
?>
