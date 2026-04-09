
<!DOCTYPE html>

// ini formHT.php

<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Input Karyawan</title>

</head>
<body>

<div class="container">
    <h2>Form Data Karyawan</h2>
    <form action="BackHT.php" method="POST">
        
        <label>Nama</label>
        <BR>
        <input type="text" name="nama" required>
<BR>
        <label>Jabatan</label>
        <BR>
        <select name="jabatan">
            <option value="Programmer">Programmer</option>
            <option value="Direktur">Direktur</option>
            <option value="PegawaiMingguan">Pegawai Mingguan</option>
        </select>
<BR>
        <label>Gaji Dasar</label>
        <BR>
        <input type="number" name="gaji" required>
<BR>
        <label>Masa Kerja (tahun)</label>
        <BR>
        <input type="number" name="masa" required>
<BR>
<BR>
        <h4>Khusus Pegawai Mingguan</h4>

        <label>Harga Barang</label><BR>
        <input type="number" name="harga"><BR>

        <label>Stock Target</label><BR>
        <input type="number" name="stock"><BR>

        <label>Total Terjual</label><BR>
        <input type="number" name="jual"><BR>
<BR>
        <button type="submit">Hitung Gaji</button><BR>
    </form>
</div>

</body>
</html>