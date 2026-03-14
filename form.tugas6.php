<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Bangun Ruang</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { border-collapse: collapse; margin-bottom: 20px; width: 600px; text-align: center; }
        th, td { border: 1px solid #000; padding: 8px; }
        th { background-color: blue; color: white; }
        input[type="number"] { width: 60px; text-align: center; }
        .btn-submit { padding: 10px 20px; background-color: #28a745; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Input Data Bangun Ruang</h2>
    <form action="proses.tugas6.php" method="POST">
        <table>
            <tr>
                <th>Jenis Bangun Ruang</th>
                <th>Sisi</th>
                <th>Jari-jari</th>
                <th>Tinggi</th>
            </tr>
            <tr>
                <td style="text-align: left;">Bola <input type="hidden" name="data[0][jenis]" value="Bola"></td>
                <td><input type="number" name="data[0][sisi]" value="0"></td>
                <td><input type="number" name="data[0][jari_jari]" value="0"></td>
                <td><input type="number" name="data[0][tinggi]" value="0"></td>
            </tr>
            <tr>
                <td style="text-align: left;">Kerucut <input type="hidden" name="data[1][jenis]" value="Kerucut"></td>
                <td><input type="number" name="data[1][sisi]" value="0"></td>
                <td><input type="number" name="data[1][jari_jari]" value="0"></td>
                <td><input type="number" name="data[1][tinggi]" value="0"></td>
            </tr>
            <tr>
                <td style="text-align: left;">Limas Segi Empat <input type="hidden" name="data[2][jenis]" value="Limas Segi Empat"></td>
                <td><input type="number" name="data[2][sisi]" value="0"></td>
                <td><input type="number" name="data[2][jari_jari]" value="0"></td>
                <td><input type="number" name="data[2][tinggi]" value="0"></td>
            </tr>
            <tr>
                <td style="text-align: left;">Kubus <input type="hidden" name="data[3][jenis]" value="Kubus"></td>
                <td><input type="number" name="data[3][sisi]" value="0"></td>
                <td><input type="number" name="data[3][jari_jari]" value="0"></td>
                <td><input type="number" name="data[3][tinggi]" value="0"></td>
            </tr>
            <tr>
                <td style="text-align: left;">Tabung <input type="hidden" name="data[4][jenis]" value="Tabung"></td>
                <td><input type="number" name="data[4][sisi]" value="0"></td>
                <td><input type="number" name="data[4][jari_jari]" value="0"></td>
                <td><input type="number" name="data[4][tinggi]" value="0"></td>
            </tr>
        </table>
        <button type="submit" class="btn-submit">Hitung Volume</button>
    </form>
</body>
</html>