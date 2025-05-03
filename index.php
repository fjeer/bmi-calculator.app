<?php

$berat = null;
$tinggi_cm = null;
$bmi = null;
$kategori = null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $berat = $_POST['berat'];
    $tinggi_cm = $_POST['tinggi'];
    $tinggi_m = $tinggi_cm / 100;

    $bmi = $berat / ($tinggi_m * $tinggi_m);
    $bmi = round($bmi, 2);

    if ($bmi < 18.5) {
        $kategori = "Kurus";
        $warna = "warning";
    } elseif ($bmi < 24.9) {
        $kategori = "Normal / Ideal";
        $warna = "success";
    } elseif ($bmi < 29.9) {
        $kategori = "Gemuk";
        $warna = "info";
    } else {
        $kategori = "Obesitas";
        $warna = "danger";
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kalkulator IMT (BMI)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anaheim:wght@400..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-white text-center">
                        <div class="logo">
                            <img src="img/logo.png" alt="">
                        </div>
                        <h4>Kalkulator Indeks Massa Tubuh</h4>
                    </div>
                    <div class="card-body bg-light">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="berat" class="form-label">Berat Badan (kg)</label>
                                <input type="number" step="0.1" class="form-control" id="berat" name="berat" placeholder="contoh: 50" value="<?= $berat ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="tinggi" class="form-label">Tinggi Badan (cm)</label>
                                <input type="number" step="0.1" class="form-control" id="tinggi" name="tinggi" placeholder="contoh: 150" value="<?= $tinggi_cm ?>" required>
                            </div>
                            <button type="submit" class="btn btn-danger w-100" name="submit">Hitung BMI</button>
                        </form>

                        <?php if ($bmi): ?>
                            <div class="alert alert-<?= $warna ?> mt-4">
                                <strong>BMI Anda:</strong> <?= $bmi ?><br>
                                <strong>Kategori:</strong> <?= $kategori ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="card-shadow text-center p-2 card-bawah">
                <a href="https://github.com/fjeer" target="_blank" rel="noopener noreferrer" s><img src="img/github.png" alt=""></a>
                <a href="https://instagram.com/jer.seven" target="_blank" rel="noopener noreferrer"><img src="img/instagram.png" alt=""></a>
                <a href="https://linkedin.com/in/fjeer" target="_blank" rel="noopener noreferrer"> <img src="img/linkedin.png" alt=""></a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>