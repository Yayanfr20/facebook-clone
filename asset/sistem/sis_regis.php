<?php
require 'config.php';

// function regis
function regis($data)
{
    // koneksi db
    global $conn;

    // ambil data dari form regis
    $namaDepan = htmlspecialchars($data['namaDepan']);
    $namaBelakang = htmlspecialchars($data['namaBelakang']);
    $nama = $namaDepan . " " . $namaBelakang;
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $tanggalLahir = htmlspecialchars($data['tanggalLahir']);
    $jenisKelamin = htmlspecialchars($data['jenisKelamin']);

    // validasi username
    $cek = query("SELECT * FROM user WHERE username LIKE '$username'");
    if ($cek) {
        return false;
    } else {
        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // input ke database
        $query = "INSERT INTO user VALUES(NULL,'$username','$password','$nama','$tanggalLahir','$jenisKelamin')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
}
