<?php
/**
 * Sadece POST ile gelindiğinde mesaj göster (doğrudan URL açılışında uyarı yok).
 */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$username = isset($_POST['username']) ? trim((string) $_POST['username']) : '';
$password = isset($_POST['password']) ? (string) $_POST['password'] : '';

$message = '';
$className = '';

if ($username === '' || $password === '') {
    $message = 'Lütfen tüm alanları doldurun';
    $className = 'error';
} elseif ($username === 'admin' && $password === '1234') {
    $message = 'Giriş başarılı, hoş geldiniz admin';
    $className = 'success';
} else {
    $message = 'Kullanıcı adı veya şifre hatalı';
    $className = 'error';
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Sonucu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
        }

        .success {
            color: green;
            font-size: 20px;
            font-weight: bold;
        }

        .error {
            color: red;
            font-size: 20px;
            font-weight: bold;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #2f6fed;
        }
    </style>
</head>
<body>
    <div class="container">
        <p class="<?php echo htmlspecialchars($className, ENT_QUOTES, 'UTF-8'); ?>">
            <?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
        </p>
        <a href="index.php">Geri Dön</a>
    </div>
</body>
</html>
