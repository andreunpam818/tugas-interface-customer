<?php

session_start();
require_once __DIR__ . '/Customer.php';

// Endpoint ini hanya menerima POST.
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    header('Content-Type: text/plain; charset=UTF-8');
    echo '405 - Method Not Allowed. Gunakan POST untuk mengirim form.';
    exit;
}

// Baca data dari request body.
$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$noHp = trim((string) ($_POST['No_Hp'] ?? ''));
$nik = trim((string) ($_POST['NIK'] ?? ''));
$alamat = trim((string) ($_POST['alamat'] ?? ''));
$provinsi = trim((string) ($_POST['provinsi'] ?? ''));
$kota = trim((string) ($_POST['kota'] ?? ''));
$kabupaten = trim((string) ($_POST['kabupaten'] ?? ''));
$kodePos = trim((string) ($_POST['kode-pos'] ?? ''));
$tempatLahir = trim((string) ($_POST['tempat-lahir'] ?? ''));
$tanggalLahir = trim((string) ($_POST['tanggal-lahir'] ?? ''));
$namaOrtu = trim((string) ($_POST['nama-ortu'] ?? ''));

// Validasi server tetap wajib walaupun sudah ada JavaScript di browser.
$errors = [];

if ($name === '') {
    $errors[] = 'Nama customer wajib diisi.';
}

if ($email === '' || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $errors[] = 'Email wajib diisi dengan format yang valid.';
}

if ($noHp === '') {
    $errors[] = 'No.Hp wajib diisi.';
}

if ($nik === '') {
    $errors[] = 'NIK wajib diisi.';
}

if ($alamat === '') {
    $errors[] = 'Alamat wajib diisi.';
}

if ($provinsi === '') {
    $errors[] = 'Provinsi wajib diisi.';
}

if ($kota === '') {
    $errors[] = 'Kota wajib diisi.';
}

if ($kabupaten === '') {
    $errors[] = 'Kabupaten wajib diisi.';
}

if ($kodePos === '') {
    $errors[] = 'Kode Pos wajib diisi.';
}

if ($tempatLahir === '') {
    $errors[] = 'Tempat Lahir wajib diisi.';
}

if ($tanggalLahir === '') {
    $errors[] = 'Tanggal Lahir wajib diisi.';
}

if ($namaOrtu === '') {
    $errors[] = 'Nama Orang Tua wajib diisi.';
}

if ($errors !== []) {
    http_response_code(422);
    header('Content-Type: text/html; charset=UTF-8');

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
        <title>422 - Data Tidak Valid</title>
        <style>body{font:16px/1.5 Arial,sans-serif;max-width:680px;margin:40px auto;padding:0 16px;color:#203129}h1{color:#9b1c1c}a{color:#0f6a4a}</style>
    </head>
    <body>
        <h1>422 — Data Tidak Valid</h1>
        <p>Request sudah mencapai server, tetapi data belum lolos validasi.</p>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= e($error) ?></li>
            <?php endforeach; ?>
        </ul>
        <p><a href="index.php">Kembali ke formulir</a></p>
    </body>
    </html>
    <?php
    exit;
}

// Buat object dari class yang sudah dikenal sejak Session 14.
$customer = new Customer($name, $email, trim((string) ($_POST['No_Hp'] ?? '')), trim((string) ($_POST['NIK'] ?? '')), trim((string) ($_POST['alamat'] ?? '')) , trim((string) ($_POST['provinsi'] ?? '')), trim((string) ($_POST['kota'] ?? '')), trim((string) ($_POST['kabupaten'] ?? '')), trim((string) ($_POST['kode-pos'] ?? '')), trim((string) ($_POST['tempat-lahir'] ?? '')), trim((string) ($_POST['tanggal-lahir'] ?? '')), trim((string) ($_POST['nama-ortu'] ?? '')));

// Simpan sementara untuk menunjukkan session lintas-request.
$_SESSION['customer_name'] = $customer->getName();
$_SESSION['customer_email'] = $customer->getEmail();
$_SESSION['customer_no_hp'] = $customer->getNoHp();
$_SESSION['customer_nik'] = $customer->getNik();
$_SESSION['customer_alamat'] = $customer->getAlamat();
$_SESSION['customer_provinsi'] = $customer->getProvinsi();
$_SESSION['customer_kota'] = $customer->getKota();
$_SESSION['customer_kabupaten'] = $customer->getKabupaten();
$_SESSION['customer_kode_pos'] = $customer->getKodePos();
$_SESSION['customer_tempat_lahir'] = $customer->getTempatLahir();
$_SESSION['customer_tanggal_lahir'] = $customer->getTanggalLahir();
$_SESSION['customer_nama_ortu'] = $customer->getNamaOrtu();

session_write_close();

// PRG: POST -> 303 -> GET halaman sukses.
header('Location: success.php', true, 303);
exit;