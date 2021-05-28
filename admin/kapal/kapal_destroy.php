<?php
include "../../fungsi/koneksi.php";

if (!isset($_GET['id'])) {
    header("location:../index.php");
}

$id = base64_decode($_GET['id']);

$query = "DELETE FROM kapal WHERE id ='$id' ";
$hasil = mysqli_query($koneksi, $query);


if ($hasil) {
    // setcookie('pesan', 'Kasbon berhasil di hapus!', time() + (3), '/');
    // setcookie('warna', 'alert-warning', time() + (3), '/');

    header("location:../index.php?");
} else {
    die("ada kesalahan : " . mysqli_error($koneksi));
}
