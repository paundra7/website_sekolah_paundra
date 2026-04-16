<?php
include "../koneksi.php";
$query = "SELECT nis from siswa ORDER BY nis DESC LIMIT 1";
$result = mysqli_query($koneksi,$query);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Input Data Siswa</title>
</head>
<body>

<h1>Tambah Data Siswa</h1>

<form action="simpan_siswa.php" method="POST">

    <table>
        <tr>
            <td>NIS</td>
            <td><input type="text" value="<?php echo $data['nis'] + 1 ?>" name="nis" required></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" required></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" required></td>
        </tr>
        <tr>
            <td>Kode Kelas</td>
            <td> <select name="kode_kelas" id="kode_kelas">
            <?php
                $query = 'SELECT kode_kelas, nama_kelas FROM kelas';
                $result = mysqli_query($koneksi, $query);
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<option value='".$row['kode_kelas']."'>".$row['kode_kelas']." - ".$row['nama_kelas']."</option>";
                }
            ?>
        </select></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit">Simpan</button>
            </td>
        </tr>
    </table>
</form>

</body>
</html>