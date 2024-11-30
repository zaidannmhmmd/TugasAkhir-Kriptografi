<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];

    // Load private key
    $privateKeyPath = "keys/private_key.pem";
    if (!file_exists($privateKeyPath)) {
        die("Kunci privat tidak ditemukan. Silakan generate kunci terlebih dahulu.");
    }

    $privateKey = file_get_contents($privateKeyPath);

    // Sign the data
    openssl_sign($data, $signature, $privateKey, OPENSSL_ALGO_SHA256);

    // Convert signature to base64
    $signatureBase64 = base64_encode($signature);

    echo "<h1>Hasil Tanda Tangan Digital</h1>";
    echo "<p>Data: $data</p>";
    echo "<p>Signature (Base64):</p>";
    echo "<textarea readonly style='width:100%; height:150px;'>$signatureBase64</textarea>";
    echo '<a href="index.php">Kembali ke Halaman Utama</a>';
}
