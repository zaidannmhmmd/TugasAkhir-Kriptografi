<?php
require_once 'assets/phpqrcode/qrlib.php'; // Pastikan phpqrcode sudah diunduh dan dimasukkan dalam proyek

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];

    // 1. Input signature dalam format base64
    $signature_base64 = $data;

    // 2. Direktori untuk menyimpan QR Code (opsional)
    $outputDir = "qrcodes/";
    if (!is_dir($outputDir)) {
        mkdir($outputDir, 0777, true);
    }

    // 3. Nama file output QR Code
    $qrFile = $outputDir . "signature_qr.png";

    // 4. Generate QR Code dari data base64
    QRcode::png($signature_base64, $qrFile, QR_ECLEVEL_L, 10);

    // 5. Tampilkan hasil
    echo "QR Code berhasil dibuat: <a href='$qrFile' target='_blank'>Lihat QR Code</a>";
}
