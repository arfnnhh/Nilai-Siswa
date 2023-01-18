<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<!-- Form -->

    <!-- Biodata -->
    <form action="nilai.php" method="post" name="form">
    <h2 style="text-align:center"><b>Biodata Siswa</b></h2><hr>

    <div class="form-group row">
        <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
        <input type="text" class="form-control" id="inputNama" placeholder="Nama" name="Nama">
            </div>
    </div>

    <div class="form-group row">
        <label for="inputNIS" class="col-sm-2 col-form-label">NIS</label>
            <div class="col-sm-10">
        <input type="number" class="form-control" id="inputNIS" placeholder="NIS" name="Nis">
            </div>
    </div>

    <div class="form-group row">
        <label for="inputRombel" class="col-sm-2 col-form-label">Rombel</label>
            <div class="col-sm-10">
        <input type="text" class="form-control" id="inputRombel" placeholder="Rombel" name="Rombel">
            </div>
    </div>
    <!-- Biodata END -->


    <!-- Nilai -->
    <hr><h2 style="text-align:center"><b>Nilai</b></h2>

    <div class="row">
        <div class="col">
            <input type="number" class="form-control" placeholder="Produktif" name="Prod">
        </div>
        <div class="col">
            <input type="number" class="form-control" placeholder="Bahasa Indonesia" name="Bi">
        </div>
    </div><br>

    <div class="row">
        <div class="col">
            <input type="number" class="form-control" placeholder="Seni Budaya" name="Sb">
        </div>
        <div class="col">
            <input type="number" class="form-control" placeholder="Matematika" name="Mtk">
        </div>
    </div><br>

    <div class="row">
        <div class="col">
            <input type="number" class="form-control" placeholder="Sejarah" name="Sjr">
        </div>
        <div class="col">
            <input type="number" class="form-control" placeholder="Pelajaran Agama" name="Paibp">
        </div>
    </div><br>

    <div class="row">
        <div class="col">
            <input type="number" class="form-control" placeholder="Pendidikan Pancasila" name="Pp">
        </div>
    </div><br>
    
    <br>
    <button type="submit" class="btn btn-primary mb-2" style="margin-left:890px">Masukan Data</button>
    </form>
    <!-- Nilai END -->

<!-- Form END -->

    <hr/>


<!-- Table -->
<h1 style="text-align:center">Nilai Siswa</h1><hr/>
    <table style="width:100%; text-align:center; " class="table table-striped">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">NIS</th>
            <th scope="col">Rombel</th>
            <th scope="col">Produktif</th>
            <th scope="col">B. Indo</th>
            <th scope="col">Seni Budaya</th>
            <th scope="col">Matematika</th>
            <th scope="col">Sejarah</th>
            <th scope="col">Pelajaran Agama</th>
            <th scope="col">Pelajaran Pancasila</th>
            <th scope="col">Rata-rata</th>
            <th scope="col">Minimal</th>
            <th scope="col">Maksimal</th>
        </tr>
  <?php
  $conn = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($conn, "nilai_db");  
  
  $no = 1;
  $data = mysqli_query($conn,"select * from nilai");
  
  while ($r = mysqli_fetch_array($data)) {
    $NNama = $r['nilai_nama'];
    $NNis = $r['nilai_nis'];
    $NRombel = $r['nilai_rombel'];
    $NProd = $r['nilai_prod'];
    $NBi = $r['nilai_bindo'];
    $NSb = $r['nilai_sbud'];
    $NMtk = $r['nilai_mtk'];
    $NSjrh = $r['nilai_sjrh'];
    $NPai = $r['nilai_paibp'];
    $Npp = $r['nilai_pp'];
    $NRata = $r['nilai_rata'];
    $NMax = $r['nilai_max'];
    $NMin = $r['nilai_min'];
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $NNama; ?></td>
        <td><?php echo $NNis; ?></td>
        <td><?php echo $NRombel; ?></td>
        <td><?php echo $NProd; ?></td>
        <td><?php echo $NBi; ?></td>
        <td><?php echo $NSb; ?></td>
        <td><?php echo $NMtk; ?></td>
        <td><?php echo $NSjrh; ?></td>
        <td><?php echo $NPai; ?></td>
        <td><?php echo $Npp; ?></td>
        <td><?php echo $NRata; ?></td>
        <td><?php echo $NMin; ?></td>
        <td><?php echo $NMax; ?></td>
    </tr>
  <?php 
  }
  ?>
    </table> 

    <hr>

    
    <h1 style="text-align:center">Kelompok Arfan</h1>
<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Arfan Hashif Hairuman
    <span class="badge badge-primary badge-pill">PPLG-X4</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Kevin Ilpalazzo
    <span class="badge badge-primary badge-pill">PPLG-X4</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Fachry Shiddiq
    <span class="badge badge-primary badge-pill">PPLG-X4</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Rasya Alamsyah
    <span class="badge badge-primary badge-pill">PPLG-X1</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Abiyu Rafi
    <span class="badge badge-primary badge-pill">PPLG-X1</span>
  </li>
</ul>
    
<!-- Table END -->
</body>
</html>