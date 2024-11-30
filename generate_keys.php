<?php
function generateKeys() {
    $config = [
        "digest_alg" => "sha256",
        "private_key_bits" => 2048,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    ];

    // Membuat kunci RSA baru
    $res = openssl_pkey_new($config);

    if (!$res) {
        die("Error saat membuat kunci RSA: " . openssl_error_string());
    }

    // Ekspor kunci privat
    $privateKey = '';
    if (!openssl_pkey_export($res, $privateKey)) {
        die("Gagal mengekspor kunci privat: " . openssl_error_string());
    }

    // Cek apakah kunci privat berhasil diekspor
    if (empty($privateKey)) {
        die("Kunci privat kosong, ekspor gagal.");
    }

    // Mendapatkan kunci publik
    $keyDetails = openssl_pkey_get_details($res);
    $publicKey = $keyDetails["key"];

    // Menyimpan kunci privat dan publik ke file
    if (file_put_contents("keys/private_key.pem", $privateKey) === false) {
        die("Gagal menyimpan kunci privat ke file.");
    }

    if (file_put_contents("keys/public_key.pem", $publicKey) === false) {
        die("Gagal menyimpan kunci publik ke file.");
    }

    echo "Kunci RSA berhasil dibuat dan disimpan!";
}

generateKeys();
echo '<br><a href="index.php">Kembali ke Halaman Utama</a>';
?>


