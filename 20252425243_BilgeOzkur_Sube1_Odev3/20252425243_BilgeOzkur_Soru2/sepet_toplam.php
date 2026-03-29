<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$urun = isset($_POST['urun']) ? trim((string) $_POST['urun']) : '';
$fiyat = (float) ($_POST['fiyat'] ?? 0);
$adet = (int) ($_POST['adet'] ?? 0);
$indirim = isset($_POST['indirim']) ? trim((string) $_POST['indirim']) : '';
$kdv = (float) ($_POST['kdv'] ?? 0);

$hata = '';
$araToplam = 0.0;
$kdvTutar = 0.0;
$indirimOrani = 0;
$indirimTutar = 0.0;
$genelToplam = 0.0;

if ($urun === '' || $fiyat <= 0 || $adet <= 0 || $kdv < 20) {
    $hata = 'Lütfen tüm zorunlu alanları doğru şekilde doldurun. KDV en az %20 olmalıdır.';
} else {
    $araToplam = $fiyat * $adet;
    $kdvTutar = $araToplam * ($kdv / 100);

    if ($indirim === 'IND20') {
        $indirimOrani = 20;
    } elseif ($indirim === 'IND50') {
        $indirimOrani = 50;
    }

    $indirimTutar = $araToplam * ($indirimOrani / 100);
    $genelToplam = $araToplam + $kdvTutar - $indirimTutar;
}

function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepet Sonucu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 650px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        .error {
            color: red;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
        }

        .result p {
            font-size: 18px;
            margin: 10px 0;
        }

        .total {
            font-size: 22px;
            font-weight: bold;
            color: green;
            margin-top: 20px;
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
        <h1>Sepet Sonucu</h1>

        <?php if ($hata !== '') { ?>
            <p class="error"><?php echo e($hata); ?></p>
        <?php } else { ?>
            <div class="result">
                <p><?php echo e($urun); ?> için toplam tutar: <?php echo e((string) $genelToplam); ?> TL</p>
                <p>Birim Fiyat: <?php echo e((string) $fiyat); ?> TL</p>
                <p>Adet: <?php echo e((string) $adet); ?></p>
                <p>Ara Toplam: <?php echo e((string) $araToplam); ?> TL</p>
                <p>KDV Tutarı: <?php echo e((string) $kdvTutar); ?> TL</p>

                <?php if ($indirimOrani > 0) { ?>
                    <p>&quot;<?php echo e($indirim); ?>&quot; indirim kodu uygulanmıştır ve İndirim Tutarı: <?php echo e((string) $indirimTutar); ?> TL</p>
                <?php } else { ?>
                    <p>İndirim uygulanmamıştır.</p>
                    <p>İndirim Tutarı: 0 TL</p>
                <?php } ?>

                <p class="total">Genel Toplam: <?php echo e((string) $genelToplam); ?> TL</p>
            </div>
        <?php } ?>

        <a href="index.php">Geri Dön</a>
    </div>
</body>
</html>
