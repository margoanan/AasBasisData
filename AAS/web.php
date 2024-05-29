<!DOCTYPE html>
<html>
<head>
    <title>Sistem Akademik</title>
</head>
<body>
    <h1>Data Mata Kuliah</h1>


    <?php

    $conn = mysqli_connect("localhost", "root", "", "aas");
    
    if (mysqli_connect_errno()) {
        echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
        exit();
    }


    $query = "SELECT * FROM matakuliah";
    $result = mysqli_query($conn, $query);
    ?>

    <table border=1>
        <tr>
            <th>No</th>
            <th>id</th>
            <th>Kode Matakuliah</th>
            <th>Nama Matakuliah</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['kode'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Input Data Matakuliah</h2>

    <form method="post" action="insert.php">
        <label for="id">id:</label>
        <input type="text" id="id" name="id" required><br><br>
        <label for="kode">Kode Matakuliah:</label>
        <input type="text" id="kode" name="kode" required><br><br>
        <label for="nama">Nama Matakuliah:</label>
        <input type="text" id="nama" name="nama" required><br><br>
        <input type="submit" value="Simpan">
    </form>

    <h2>Edit Data Matakuliah</h2>

    <form method="post" action="update.php">
        <label for="edit-id">ID Matakuliah:</label>
        <input type="text" id="edit-id" name="edit-id" required><br><br>
        <label for="edit-kode">Kode Matakuliah:</label>
        <input type="text" id="edit-kode" name="edit-kode" required><br><br>
        <label for="edit-nama">Nama Matakuliah:</label>
        <input type="text" id="edit-nama" name="edit-nama" required><br><br>
        <input type="submit" value="Simpan">
    </form>

    <h2>Hapus Data Matakuliah</h2>

    
    <form method="post" action="delete.php">
        <label for="delete-id">ID Matakuliah:</label>
        <input type="text" id="delete-id" name="delete-id" required><br><br>
        <input type="submit" value="Hapus">
    </form>

    <h1>Hasil Relasi Tabel</h1>

    <?php
    
    $query_relasi = "SELECT m.nama AS nama_mahasiswa, mk.nama AS nama_matakuliah, th.tahun_ajaran, r.nilai FROM relasi r
                    INNER JOIN mahasiswa m ON r.mahasiswa_id = m.id
                    INNER JOIN matakuliah mk ON r.matakuliah_id = mk.id
                    INNER JOIN tahun_ajaran th ON r.tahun_ajaran_id = th.id";
    $result_relasi = mysqli_query($conn, $query_relasi);
    ?>

    <table border=1>
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>Nama Mata Kuliah</th>
            <th>Tahun Ajaran</th>
            <th>Nilai</th>
        </tr>
        <?php
        $no = 1;
        while ($row_relasi = mysqli_fetch_assoc($result_relasi)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $row_relasi['nama_mahasiswa'] . "</td>";
            echo "<td>" . $row_relasi['nama_matakuliah'] . "</td>";
            echo "<td>" . $row_relasi['tahun_ajaran'] . "</td>";
            echo "<td>" . $row_relasi['nilai'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php
    mysqli_close($conn);
    ?>
</body>
</html>
