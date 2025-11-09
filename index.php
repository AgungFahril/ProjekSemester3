<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Pendakian Raung Bondowoso - Tahura Raden Soerjo</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<header>
    <?php include 'includes/navbar_user.php'; ?>
</header>

<main>
    <!-- 🏔️ Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Gunung Raung Bondowoso</h1>
            <p>Puncak Gunung Raung dikenal dengan nama Puncak Sejati yang berada di ketinggian 3.344 mdpl.</p>
            <div class="hero-buttons">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- ✅ Setelah login, arahkan ke SOP -->
                    <a href="pengunjung/sop.php" class="btn btn-primary">BOOKING</a>
                    <a href="StatusBooking.php" class="btn btn-secondary">STATUS BOOKING</a>
                <?php else: ?>
                    <!-- ❌ Jika belum login, arahkan ke login dan redirect ke SOP -->
                    <a href="login.php?redirect=pengunjung/sop.php" class="btn btn-primary">BOOKING</a>
                    <a href="login.php?redirect=StatusBooking.php" class="btn btn-secondary">STATUS BOOKING</a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- 📊 Statistik Pendaki -->
    <section class="stats-section">
        <div class="stat-card">
            <p class="stat-number">20,484</p>
            <p class="stat-label">Gunung Raung</p>
            <span>Jumlah pendaki tahun 2025</span>
        </div>
        <div class="stat-card">
            <p class="stat-number">5,000</p>
            <p class="stat-label">Kawah Ijen</p>
            <span>Jumlah pendaki tahun 2025</span>
        </div>
    </section>

    <!-- 🔁 Alur Booking -->
    <section class="info-section">
        <h2>Alur Booking</h2>
        <div class="booking-steps">
            <div class="step">
                <h3>1. Portal Booking Pendakian</h3>
                <p>Klik tombol BOOKING. Disarankan menggunakan browser Google Chrome untuk melakukan Booking.</p>
            </div>
            <div class="step">
                <h3>2. SOP Pendakian</h3>
                <p>Pahami dan taati SOP serta peraturan pendakian yang berlaku sebelum melanjutkan ke tahap berikutnya.</p>
            </div>
            <div class="step">
                <h3>3. Pilih Tujuan dan Jadwal</h3>
                <p>Pilih gunung serta tentukan tanggal pendakian sesuai dengan kuota yang tersedia.</p>
            </div>
            <div class="step">
                <h3>4. Mengisi Form Data Diri</h3>
                <p>Lengkapi semua kolom yang telah disediakan dan pastikan alamat email dan nomor telepon sudah benar.</p>
            </div>
            <div class="step">
                <h3>5. Pembayaran</h3>
                <p>Tagihan akan dikirimkan melalui email dan WhatsApp. Batas waktu pembayaran adalah 6 jam setelah pemesanan.</p>
            </div>
            <div class="step">
                <h3>6. Konfirmasi Pembayaran</h3>
                <p>Setelah membayar, klik tombol SUDAH BAYAR di halaman Status Booking untuk konfirmasi.</p>
            </div>
        </div>
    </section>

    <!-- 🗺️ Peta Jalur Pendakian -->
    <section class="info-section">
        <h2>Peta Jalur Pendakian</h2>
        <div class="map-container">
            <div class="map-card">
                <img src="https://via.placeholder.com/300x200.png?text=Peta+Sumber+Brantas" alt="Peta Jalur Sumber Brantas">
                <h3>Pos Sumber Brantas</h3>
                <p>Jl. Raya Sumber Brantas, Kec. Bumiaji, Kota Batu, Jawa Timur</p>
            </div>
            <div class="map-card">
                <img src="https://via.placeholder.com/300x200.png?text=Peta+Tretes" alt="Peta Jalur Tretes">
                <h3>Pos Tretes</h3>
                <p>Jl. Wilis Tretes, Kec. Prigen, Kab. Pasuruan, Jawa Timur</p>
            </div>
            <div class="map-card">
                <img src="https://via.placeholder.com/300x200.png?text=Peta+Tambaksari" alt="Peta Jalur Tambaksari">
                <h3>Pos Tambaksari</h3>
                <p>Tambakwatu, Tambak Sari, Kec. Purwodadi, Kab. Pasuruan, Jawa Timur</p>
            </div>
            <div class="map-card">
                <img src="https://via.placeholder.com/300x200.png?text=Peta+Lawang" alt="Peta Jalur Lawang">
                <h3>Pos Lawang</h3>
                <p>Wonorejo, Kec. Lawang, Kabupaten Malang, Jawa Timur</p>
            </div>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2025 Tahura Raden Soerjo. All Rights Reserved.</p>
</footer>

</body>
</html>
