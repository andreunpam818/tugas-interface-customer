<?php

session_start();

$name = $_SESSION['customer_name'] ?? null;
$email = $_SESSION['customer_email'] ?? null;
$noHp = $_SESSION['customer_no_hp'] ?? null;
$nik = $_SESSION['customer_nik'] ?? null;
$alamat = $_SESSION['customer_alamat'] ?? null;
$provinsi = $_SESSION['customer_provinsi'] ?? null;
$kota = $_SESSION['customer_kota'] ?? null;
$kabupaten = $_SESSION['customer_kabupaten'] ?? null;
$kodePos = $_SESSION['customer_kode_pos'] ?? null;
$tempatLahir = $_SESSION['customer_tempat_lahir'] ?? null;
$tanggalLahir = $_SESSION['customer_tanggal_lahir'] ?? null;
$namaOrtu = $_SESSION['customer_nama_ortu'] ?? null;

// Data hanya sementara; hapus setelah ditampilkan satu kali.
unset($_SESSION['customer_name'], $_SESSION['customer_email'], $_SESSION['customer_no_hp'], $_SESSION['customer_nik'], $_SESSION['customer_alamat'], $_SESSION['customer_provinsi'], $_SESSION['customer_kota'], $_SESSION['customer_kabupaten'], $_SESSION['customer_kode_pos'], $_SESSION['customer_tempat_lahir'], $_SESSION['customer_tanggal_lahir'], $_SESSION['customer_nama_ortu']);

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Pengiriman Customer</title>
    <style>
        body{font:16px/1.5 Arial,sans-serif;max-width:680px;margin:40px auto;padding:0 16px;color:#203129}
        .card{padding:24px;border:1px solid #d8e2dc;border-radius:12px;background:#fff}
        h1{color:#0f6a4a}.muted{color:#5c6d63}a{color:#0f6a4a}
    </style>
</head>
<body>
    <main class="card">
        <h1>200 — Halaman Berhasil Dimuat</h1>
        <?php if ($name !== null && $email !== null && $noHp !== null && $nik !== null && $alamat !== null && $provinsi !== null && $kota !== null && $kabupaten !== null && $kodePos !== null && $tempatLahir !== null && $tanggalLahir !== null && $namaOrtu !== null): ?>
            <p>JavaScript mengizinkan submit dan server juga menerima data yang valid.</p>
            <p><strong>Nama:</strong> <?= e((string) $name) ?></p>
            <p><strong>Email:</strong> <?= e((string) $email) ?></p>
            <p><strong>No.Hp:</strong> <?= e((string) $noHp) ?></p>
            <p><strong>NIK:</strong> <?= e((string) $nik) ?></p>
            <p><strong>Alamat:</strong> <?= e((string) $alamat) ?></p>
            <p><strong>Provinsi:</strong> <?= e((string) $provinsi) ?></p>
            <p><strong>Kota:</strong> <?= e((string) $kota) ?></p>
            <p><strong>Kabupaten:</strong> <?= e((string) $kabupaten) ?></p>
            <p><strong>Kode Pos:</strong> <?= e((string) $kodePos) ?></p>
            <p><strong>Tempat Lahir:</strong> <?= e((string) $tempatLahir) ?></p>
            <p><strong>Tanggal Lahir:</strong> <?= e((string) $tanggalLahir) ?></p>
            <p><strong>Nama Orang Tua:</strong> <?= e((string) $namaOrtu) ?></p>

            <p class="muted">Data ini disimpan sementara di session, bukan database.</p>
        <?php else: ?>
            <p>Belum ada data customer dari pengiriman terbaru.</p>
        <?php endif; ?>
        <p><a href="index.php">Kembali ke formulir</a></p>
    </main>
</body>
</html>