<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika dataSiswa diklik maka
if (isset($_POST['dataSiswa'])) {
    $output = '';

    // mengambil data siswa dari id yang berasal dari dataSiswa
    $sql = "SELECT * FROM siswa WHERE id = '" . $_POST['dataSiswa'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '<tr align="center">
                            <td colspan="2"><img src="img/' . $row['gambar'] . '" width="50%"></td>
                        </tr>
                        <tr>
                            <th width="40%">ID</th>
                            <td width="60%">' . $row['id'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Kode Barang</th>
                            <td width="60%">' . $row['kode_barang'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama Barang</th>
                            <td width="60%">' . $row['nama_barang'] .  '</td>
                        </tr>
                        <tr>
                            <th width="40%">Ukuran</th>
                            <td width="60%">' . $row['ukuran'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Deskripsi</th>
                            <td width="60%">' . $row['deskripsi'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Harga</th>
                            <td width="60%">' . $row['harga'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Supplier</th>
                            <td width="60%">' . $row['supplier'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}
