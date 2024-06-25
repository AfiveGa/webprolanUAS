<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'function.php';

// Mengambil data dari id dengan fungsi get
$id = $_GET['id'];

// Mengambil data dari table pakaian dari id yang tidak sama dengan 0
$siswa = query("SELECT * FROM siswa WHERE id = $id")[0];

// Jika fungsi ubah lebih dari 0/data terubah, maka munculkan alert dibawah
if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data pakaian berhasil diubah!');
                document.location.href = 'index.php';
            </script>";
    } else {
        // Jika fungsi ubah dibawah dari 0/data tidak terubah, maka munculkan alert dibawah
        echo "<script>
                alert('Data pakaian gagal diubah!');
            </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <!-- Bootstrap Icons -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
     <!-- Font Google -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
     <!-- animasi CSS Aos -->
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
     <!-- My CSS -->
     <link rel="stylesheet" href="css/style.css">

     <title>Change data</title>
</head>

<body background="img/bg/skyy.jpg">
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
          <div class="container">
               <a class="navbar-brand" href="index.php">FORM UBAH DATA</a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                         <li class="nav-item">
                              <a class="nav-link" aria-current="page" href="index.php">Home</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="#about">About</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="logout.php">Logout</a>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>
     <!-- Close Navbar -->

     <!-- Container -->
     <div class="container">
          <div class="row my-2 text-light">
               <div class="col-md">
                    <h3 class="fw-bold text-uppercase ubah_data"></h3>
               </div>
               <hr>
          </div>
          <div class="row my-2 text-light">
               <div class="col-md">
                    <form action="" method="post" enctype="multipart/form-data">
                         <input type="hidden" name="gambarLama" value="<?= $siswa['gambar']; ?>">
                         <div class="mb-3">
                              <label for="id" class="form-label">ID</label>
                              <input type="number" class="form-control w-50" id="id" value="<?= $siswa['id']; ?>"
                                   name="id" readonly>
                         </div>
                         <div class="mb-3">
                              <label for="kode_barang" class="form-label">Kode Barang</label>
                              <input type="number" class="form-control w-50" id="kode_barang" value="<?= $siswa['kode_barang']; ?>"
                                   name="kode_barang" autocomplete="off" required>
                         </div>
                         <div class="mb-3">
                              <label for="nama_barang" class="form-label">Nama Barang</label>
                              <input type="text" class="form-control w-50" id="nama_barang"
                                   value="<?= $siswa['nama_barang']; ?>" name="nama_barang" autocomplete="off" required>
                         </div>
                         <div class="mb-3">
                              <label for="ukuran" class="form-label">ukuran</label>
                              <input type="number" class="form-control w-50" id="ukuran"
                                   value="<?= $siswa['ukuran']; ?>" name="ukuran" autocomplete="off" required>
                         </div>
                         <div class="mb-3">
                              <label for="deskripsi" class="form-label">Deskripsi</label>
                              <input type="deslripsi" class="form-control w-50" id="deskripsi"
                                   value="<?= $siswa['deskripsi']; ?>" name="deskripsi" autocomplete="off" required>
                         </div>
                         <div class="mb-3">
                              <label for="harga" class="form-label">Harga</label>
                              <input type="number" class="form-control w-50" id="harga"
                                   value="<?= $siswa['harga']; ?>" name="harga" autocomplete="off" required>
                         </div>
                         <div class="mb-3">
                              <label for="supplier" class="form-label">Supplier</label>
                              <input type="text" class="form-control w-50" id="supplier" value="<?= $siswa['supplier']; ?>"
                                   name="supplier" autocomplete="off" required>
                         </div>
                         <div class="mb-3">
                              <label for="gambar" class="form-label">Gambar <i>(Saat ini)</i></label> <br>
                              <img src="img/<?= $siswa['gambar']; ?>" width="50%" style="margin-bottom: 10px;">
                              <input class="form-control form-control-sm w-50" id="gambar" name="gambar" type="file">
                         </div>
                         <div class="mb-3">
                         <label for="stok" class="form-label">Stock</label>
                              <input type="teks" class="form-control w-50" id="stok"
                                   value="<?= $siswa['stok']; ?>" name="stok" autocomplete="off" required>
                         </div>
                         <hr>
                         <a href="index.php" class="btn btn-secondary">Kembali</a>
                         <button type="submit" class="btn btn-warning" name="ubah">Ubah</button>
                    </form>
               </div>
          </div>
     </div>
     <!-- Close Container -->



     <!-- Footer -->
     <div class="container-fluid">
          <div class="row bg-dark text-white text-center">
               <div class="col my-2" id="about">
                    <p>
                         Created by: Afif Galih
                    </p>
               </div>
          </div>
     </div>
     <!-- Close Footer -->

     <!-- Bootstrap -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
     </script>

     <!-- animasi  gsap-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"> </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/TextPlugin.min.js"></script>
     <script>
     gsap.registerPlugin(TextPlugin);
     gsap.to('.ubah_data', {
          duration: 2,
          delay: 1,
          text: '<i class="bi bi-pencil-square"></i>Ubah Data A5 Shop'
     })
     gsap.from('.navbar', {
          duration: 1,
          y: '-100%',
          opacity: 0,
          ease: 'bounce',
     })
     </script>
</body>

</html>