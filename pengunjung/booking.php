<?php
// Pengaturan error reporting
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);


session_start();

// Redirect ke halaman login jika pengguna belum login
if (!isset($_SESSION['user_id'])) {
   // header('Location: ../login.php'); // Arahkan ke login.php di folder utama
   // exit();
}

// Opsional: Ambil data pengguna dari session untuk mengisi form
$nama_pemesan = htmlspecialchars($_SESSION['nama'] ?? 'Nama Pengguna Tes');
$email_pemesan = htmlspecialchars($_SESSION['email'] ?? 'tes@email.com'); 

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Pendakian - Tahura Raden Soerjo</title>
    <link rel="stylesheet" href="../style.css"> <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* CSS Tambahan untuk Form Booking */
        .booking-form {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2.5rem;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        .booking-form h2 {
            text-align: center;
            margin-bottom: 2rem;
            color: #2c3e50;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #555;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="tel"],
        .form-group input[type="date"],
        .form-group input[type="number"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
        }
        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }
        .form-row {
            display: flex;
            gap: 1.5rem;
        }
        .form-row .form-group {
            flex: 1;
        }
        .checkbox-container {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
            cursor: pointer;
            font-size: 0.95rem;
            user-select: none;
        }
        .checkbox-container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 22px;
            width: 22px;
            background-color: #eee;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .checkbox-container:hover input ~ .checkmark {
            background-color: #ccc;
        }
        .checkbox-container input:checked ~ .checkmark {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }
        .checkbox-container input:checked ~ .checkmark:after {
            display: block;
        }
        .checkbox-container .checkmark:after {
            left: 7px;
            top: 3px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            transform: rotate(45deg);
        }
        .btn-submit {
             display: block;
             width: 100%;
             padding: 0.8rem 2rem;
             border-radius: 50px;
             font-weight: 600;
             margin-top: 2rem;
             transition: all 0.3s ease;
             background-color: #e74c3c;
             color: #fff;
             border: none;
             cursor: pointer;
             font-size: 1.1rem;
        }
        .btn-submit:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<header>
    <?php include '../includes/navbar_user.php'; // Sesuaikan path ke navbar_user.php ?>
</header>

<main class="content-page">
    <div class="page-header">
        <h1>Formulir Booking Pendakian</h1>
    </div>

    <div class="booking-form">
        <h2>Detail Rencana Pendakian</h2>
        
        <form action="../backend/proses_booking.php" method="POST"> 
            
            <div class="form-row">
                <div class="form-group">
                    <label for="tanggal_naik">Tanggal Naik:</label>
                    <input type="date" id="tanggal_naik" name="tanggal_naik" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_turun">Tanggal Turun:</label>
                    <input type="date" id="tanggal_turun" name="tanggal_turun" required>
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_pendaki">Jumlah Pendaki (termasuk ketua):</label>
                <input type="number" id="jumlah_pendaki" name="jumlah_pendaki" min="3" placeholder="Minimal 3 orang" required>
            </div>

            <hr style="margin: 2rem 0; border: none; border-top: 1px solid #eee;">

            <h2>Data Ketua Kelompok</h2>
            <div class="form-group">
                <label for="nama_ketua">Nama Lengkap Ketua:</label>
                <input type="text" id="nama_ketua" name="nama_ketua" value="<?= $nama_pemesan; ?>" required readonly> 
                </div>
             <div class="form-group">
                <label for="email_ketua">Email Ketua:</label>
                <input type="email" id="email_ketua" name="email_ketua" value="<?= $email_pemesan; ?>" required readonly> 
                 </div>
             <div class="form-group">
                <label for="telepon_ketua">Nomor Telepon Ketua (WhatsApp Aktif):</label>
                <input type="tel" id="telepon_ketua" name="telepon_ketua" placeholder="Contoh: 081234567890" required>
            </div>
             <div class="form-group">
                <label for="alamat_ketua">Alamat Lengkap Ketua:</label>
                <textarea id="alamat_ketua" name="alamat_ketua" required></textarea>
            </div>
             <div class="form-group">
                <label for="no_identitas_ketua">Nomor Identitas Ketua (KTP/SIM/Paspor):</label>
                <input type="text" id="no_identitas_ketua" name="no_identitas_ketua" required>
            </div>

            <hr style="margin: 2rem 0; border: none; border-top: 1px solid #eee;">
            
            <h2>Data Anggota Kelompok</h2>
            <p style="color: #666; font-size: 0.9rem; margin-bottom: 1rem;">
                (Untuk saat ini, detail anggota akan diinput setelah booking terkonfirmasi atau melalui fitur terpisah)
            </p>
            
            <hr style="margin: 2rem 0; border: none; border-top: 1px solid #eee;">

            <label class="checkbox-container"> Saya menyatakan telah membaca, memahami, dan akan mematuhi seluruh Standard Operating Procedure (SOP) Pendakian Gunung Raung.
                <input type="checkbox" name="setuju_sop" value="1" required>
                <span class="checkmark"></span>
            </label>

            <button type="submit" class="btn-submit">Kirim Booking</button>

        </form>
    </div>
</main>

<footer>
    <p>&copy; 2025 Tahura Raden Soerjo. All Rights Reserved.</p>
</footer>

<script src="../script.js"></script> </body>
</html>