<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Pegadaian Syariah</title>

</head>
<body>

    <span class="logo">Tugas Pertemuan 3<br></span> 

    <div class="header">
        <h3>TOKO PEGADAIAN SYARIAH</h3>
        <p>Jl Keadilan No 16</p>
        <p>Telp. 72353459</p>
    </div>

    <h4>Program Penghitung Besaran Angsuran Hutang</h4>

    <form action="proses.pegadaian.php" method="POST">
        <div class="form-group">
            <label>Besaran Pinjaman (Rp) :</label>
            <input type="number" name="pinjaman" value="" required>
        </div>


        <div class="form-group">
            <label>Lama angsuran (bulan) :</label>
            <input type="number" name="lama" value="" required>
        </div>

        <div class="form-group">
            <label>Keterlambatan Angsuran (Hari) :</label>
            <input type="number" name="telat" value="" required>
        </div>

        <br>
        <button type="submit" name="hitung">Hitung</button>
    </form>

</body>
</html>