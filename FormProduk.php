<!DOCTYPE html>
<html>
<head>
    <title>Form Belanja Warung</title>
</head>
<body>

    <h2>Form Belanja Warung</h2>

    <form method="POST" action="ProsesProduk.php">

        Nama Pembeli:<br>
        <input type="text" name="nama" required><br><br>

        Nama Barang:<br>
        <input type="text" name="barang" required><br><br>

        Harga:<br>
        <input type="number" name="harga" required><br><br>

        Jumlah:<br>
        <input type="number" name="jumlah" required><br><br>

        <button type="submit">Proses Belanja</button>

    </form>

</body>
</html>