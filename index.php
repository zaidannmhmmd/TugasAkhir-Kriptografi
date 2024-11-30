<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSA Digital Signature</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>RSA Digital Signature</h1>

        <!-- Generate Keys -->
        <section>
            <h2>1. Generate RSA Keys</h2>
            <form action="generate_keys.php" method="POST">
                <button type="submit">Generate Keys</button>
            </form>
        </section>

        <!-- Sign Data -->
        <section>
            <h2>2. Sign Data</h2>
            <form action="sign.php" method="POST">
                <textarea name="data" placeholder="Enter data to sign..." required></textarea>
                <button type="submit">Sign Data</button>
            </form>
        </section>

        <!-- Verify Signature -->
        <section>
            <h2>3. Verify Signature</h2>
            <form action="verify.php" method="POST">
                <textarea name="data" placeholder="Enter original data..." required></textarea>
                <textarea name="signature" placeholder="Paste the signature here..." required></textarea>
                <button type="submit">Verify Signature</button>
            </form>
        </section>

        <section>
            <h2>4. Buat QR Code</h2>
            <form action="qrcode.php" method="POST">
                <textarea name="data" placeholder="Masukkan Signature..." required></textarea>
                <button type="submit">Buat QR CODE</button>
            </form>
        </section>
    </div>
</body>
</html>
