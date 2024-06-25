<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Menampilkan semua data dari table siswa berdasarkan id secara Descending
$siswa = query("SELECT * FROM siswa ORDER BY id DESC");

// Membuat nama file
$filename = "data pakaian-" . date('Ymd') . ".xls";

// Kodingam untuk export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Toko Pakaian A5 Store.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>ID</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Ukuran</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Supplier</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; ?>
        <?php foreach ($siswa as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['id']; ?></td>
                <td><?= $row['kode_barang']; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['ukuran']; ?></td>
                <td><?= $row['deskripsi']; ?></td>
                <td><?= $row['harga']; ?></td>
                <td><?= $row['supplier']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>