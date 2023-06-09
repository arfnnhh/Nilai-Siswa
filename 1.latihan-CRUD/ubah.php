<?php
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
require 'conn.php';

class Database
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function executeQuery($sql)
    {
        return mysqli_query($this->conn, $sql);
    }

    public function getAffectedRows()
    {
        return mysqli_affected_rows($this->conn);
    }

    public function fetchData($id)
    {
        $result = $this->executeQuery("SELECT * FROM `db_nilai` WHERE id = $id");
        return mysqli_fetch_assoc($result);
    }
}

class DataHandler
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function updateData($data)
    {
        $id = $data["id"];
        $name = htmlspecialchars($data["name"]);
        $nis = htmlspecialchars($data["nis"]);
        $indonesia = htmlspecialchars($data["indonesia"]);
        $inggris = htmlspecialchars($data["inggris"]);
        $pipas = htmlspecialchars($data["pipas"]);
        $mtk = htmlspecialchars($data["mtk"]);
        $produktif = htmlspecialchars($data["produktif"]);
        $sejarah = htmlspecialchars($data["sejarah"]);

        $query = "UPDATE db_nilai SET
            nama = '$name',
            nis = '$nis',
            indonesia = '$indonesia',
            inggris = '$inggris',
            pipas = '$pipas',
            mtk = '$mtk',
            produktif = '$produktif',
            sejarah = '$sejarah'
            WHERE id = $id
        ";

        $this->db->executeQuery($query);

        return $this->db->getAffectedRows();
    }
}

$db = new Database($conn);
$dataHandler = new DataHandler($db);

$id = $_GET["id"];
$data = $db->fetchData($id);

if (isset($_POST["submit"])) {
    if ($dataHandler->updateData($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil diubah');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diubah');
            document.location.href = 'index.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <form action="" method="post">
        <h2>Isi Biodata</h2>
        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="number" class="form-control" name="nis" placeholder="NIS" value="<?php echo $data['nis']; ?>">
        </div>
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" name="name" placeholder="Nama" value="<?php echo $data['nama']; ?>">
        </div>
        <h2>Masukkan Nilai Anda</h2>
        <div class="form-group">
            <label for="indo">Indonesia</label>
            <input type="number" class="form-control" name="indo" placeholder="Indonesia" value="<?php echo $data['indonesia']; ?>">
        </div>
        <div class="form-group">
            <label for="inggris">Inggris</label>
            <input type="number" class="form-control" name="inggris" placeholder="Inggris" value="<?php echo $data['inggris']; ?>">
        </div>
        <div class="form-group">
            <label for="pipas">Pipas</label>
            <input type="number" class="form-control" name="pipas" placeholder="Pipas" value="<?php echo $data['pipas']; ?>">
        </div>
        <div class="form-group">
            <label for="mtk">MTK</label>
            <input type="number" class="form-control" name="mtk" placeholder="MTK" value="<?php echo $data['mtk']; ?>">
        </div>
        <div class="form-group">
            <label for="produktif">Produktif</label>
            <input type="number" class="form-control" name="produktif" placeholder="Produktif" value="<?php echo $data['produktif']; ?>">
        </div>
        <div class="form-group">
            <label for="sejarah">Sejarah</label>
            <input type="number" class="form-control" name="sejarah" placeholder="Sejarah" value="<?php echo $data['sejarah']; ?>">
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" class="btn btn-primary" name="submit" value="Kirim">
        <a href="menampilkan.php" class="btn btn-secondary">Batal</a>
    </form>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
