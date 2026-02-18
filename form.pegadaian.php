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
    <table>
        <tr>
            <td>Besaran Pinjaman (Rp)</td>
            <td>:</td>
            <td><input type="number" name="pinjaman" required></td>
        </tr>

        <tr>
            <td>Lama angsuran (bulan)</td>
            <td>:</td>
            <td><input type="number" name="lama" required></td>
        </tr>

        <tr>
            <td>Keterlambatan Angsuran (Hari)</td>
            <td>:</td>
            <td><input type="number" name="telat" required></td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td>
                <br>
                <button type="submit" name="hitung">Hitung</button>
            </td>
        </tr>
    </table>
</form>


</body>
</html>