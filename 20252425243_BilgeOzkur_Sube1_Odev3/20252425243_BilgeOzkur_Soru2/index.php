<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alışveriş Sepeti Toplamı</title>
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
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1f7f35;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Alışveriş Sepeti Toplamı</h1>

        <form action="sepet_toplam.php" method="post" autocomplete="off">
            <label for="urun">Ürün Adı</label>
            <input type="text" id="urun" name="urun" required>

            <label for="fiyat">Ürün Fiyatı</label>
            <input type="number" id="fiyat" name="fiyat" step="0.01" min="0.01" required>

            <label for="adet">Adet</label>
            <input type="number" id="adet" name="adet" min="1" step="1" required>

            <label for="indirim">İndirim Kodu</label>
            <input type="text" id="indirim" name="indirim" placeholder="İsteğe bağlı">

            <label for="kdv">KDV Oranı (%)</label>
            <input type="number" id="kdv" name="kdv" min="20" step="0.01" required>

            <button type="submit">Hesapla</button>
        </form>
    </div>
</body>
</html>
