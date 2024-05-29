<?php
$conn = mysqli_connect("localhost", "root", "", "aas");

if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $kode = $_POST["kode"];
    $nama = $_POST["nama"];

    $query = "INSERT INTO matakuliah (id, kode, nama) VALUES ('$id', $kode', '$nama')";

    if (mysqli_query($conn, $query)) {
        echo "Data matakuliah berhasil ditambahkan.";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
