<?php
$conn = mysqli_connect("localhost", "root", "", "aas");

if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["edit-id"];
    $kode = $_POST["edit-kode"];
    $nama = $_POST["edit-nama"];

    $query = "UPDATE matakuliah SET kode='$kode', nama='$nama' WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        echo "Data matakuliah berhasil diperbarui.";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
