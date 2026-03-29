<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Giriş Sistemi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 450px;
            margin: 0 auto;
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 12px;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            width: 100%;
            margin-top: 18px;
            padding: 12px;
            background-color: #2f6fed;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2459be;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kullanıcı Giriş Sistemi</h1>

        <form action="kullanici_kontrol.php" method="post" autocomplete="off">
            <label for="username">Kullanıcı Adı</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Şifre</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Giriş Yap</button>
        </form>
    </div>
</body>
</html>
