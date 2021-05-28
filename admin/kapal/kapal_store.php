<?php

include "../../fungsi/koneksi.php";

if (isset($_POST['tambah'])) {
    $nm_kapal = $_POST['nm_kapal'];
    $type_kapal = $_POST['type_kapal'];
    $imo_number = $_POST['imo_number'];
    $call_sign = $_POST['call_sign'];
    $owner_company = $_POST['owner_company'];
    $panjang = $_POST['panjang'];
    $lebar = $_POST['lebar'];
    $draft = $_POST['draft'];

    $query = "INSERT INTO kapal ( nm_kapal, type_kapal, imo_number,    call_sign,    owner_company,    panjang,    lebar, draft, created_at, updated_at, created_by, updated_by, status) VALUES 
								( '$nm_kapal','$type_kapal',  '$imo_number', '$call_sign', '$owner_company', '$panjang', '$lebar', '$draft', now(), now(), 'Admin', 'Admin', '1');
			";

    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        header("location:../index.php");
    } else {
        die("ada kesalahan : " . mysqli_error($koneksi));
    }
}
