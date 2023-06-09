<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nilai</title>
    <!-- Tambahkan link CSS Bootstrap di bawah ini -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <a href="menampilkan.php" class="btn btn-primary">Melihat Data</a>
        <div class="text-center">
            <form action="input_php.php" method="post">
                <h2>Isi Biodata</h2>
                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="number" class="form-control" name="nis" placeholder="NIS" required>
                </div>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama" required>
                </div>
                <h2>Masukkan Nilai Anda</h2>
                <div class="form-group">
                    <label for="indo">Indonesia</label>
                    <input type="number" class="form-control" name="indo" placeholder="Indonesia" required>
                </div>
                <div class="form-group">
                    <label for="inggris">Inggris</label>
                    <input type="number" class="form-control" name="inggris" placeholder="Inggris" required>
                </div>
                <div class="form-group">
                    <label for="pipas">Pipas</label>
                    <input type="number" class="form-control" name="pipas" placeholder="Pipas" required>
                </div>
                <div class="form-group">
                    <label for="mtk">MTK</label>
                    <input type="number" class="form-control" name="mtk" placeholder="MTK" required>
                </div>
                <div class="form-group">
                    <label for="produktif">Produktif</label>
                    <input type="number" class="form-control" name="produktif" placeholder="Produktif" required>
                </div>
                <div class="form-group">
                    <label for="sejarah">Sejarah</label>
                    <input type="number" class="form-control" name="sejarah" placeholder="Sejarah" required>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Kirim">
            </form>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>