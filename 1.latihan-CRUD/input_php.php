<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
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
}

class DataHandler
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addData($data)
    {
        $nis = $data["nis"];
        $nama = $data["name"];
        $indonesia = $data["indo"];
        $inggris = $data["inggris"];
        $pipas = $data["pipas"];
        $mtk = $data["mtk"];
        $produktif = $data["produktif"];
        $sejarah = $data["sejarah"];

        $jumlah = $indonesia + $inggris + $pipas + $mtk + $produktif + $sejarah;
        $rata = $jumlah / 6;
        $max = max($indonesia, $inggris, $pipas, $mtk, $produktif, $sejarah);
        $min = min($indonesia, $inggris, $pipas, $mtk, $produktif, $sejarah);

        $sql = "INSERT INTO `db_nilai`
        (`id`, `nis`, `nama`, `indonesia`, `inggris`, `pipas`, `mtk`, `produktif`, `sejarah`, `total`, `rata`, `max`, `min`)
        VALUES 
        ('', '$nis', '$nama', '$indonesia', '$inggris', '$pipas', '$mtk', '$produktif', '$sejarah', '$jumlah', '$rata', '$max', '$min')";

        $this->db->executeQuery($sql);

        return $this->db->getAffectedRows();
    }
}

$db = new Database($conn);
$dataHandler = new DataHandler($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($dataHandler->addData($_POST) > 0) {
        echo "<script> 
            alert('Data berhasil diinput');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal input');
            window.location.href = 'index.php';
        </script>";
    }
}
?>
