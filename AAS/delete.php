<?php
$conn = mysqli_connect("localhost", "root", "", "aas");

if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["delete-id"];

    $query = "DELETE FROM matakuliah WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        echo "Data matakuliah berhasil dihapus.";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
