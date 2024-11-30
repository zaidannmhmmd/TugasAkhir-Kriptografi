<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];
    $signatureBase64 = $_POST['signature'];

    // Decode base64 signature
    $signature = base64_decode($signatureBase64);

    // Load public key
    $publicKeyPath = "keys/public_key.pem";
    if (!file_exists($publicKeyPath)) {
        die("Kunci publik tidak ditemukan. Silakan generate kunci terlebih dahulu.");
    }

    $publicKey = file_get_contents($publicKeyPath);

    // Verify the signature
    $result = openssl_verify($data, $signature, $publicKey, OPENSSL_ALGO_SHA256);

    echo "<h1>Hasil Verifikasi</h1>";
    if ($result === 1) {
        echo "<p>Signature is Valid!</p>";
    } elseif ($result === 0) {
        echo "<p>Signature is Invalid!</p>";
    } else {
        echo "<p>Terjadi kesalahan dalam proses verifikasi.</p>";
    }
    echo '<a href="index.php">Kembali ke Halaman Utama</a>';
}
