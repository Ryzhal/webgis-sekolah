<?php
// Mulai session jika diperlukan
session_start();

// Koneksi ke database
include_once "../konek.php";

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id_sekolah = $_POST['id_sekolah'];  // id_sekolah yang dipilih
    $nama_jurusan = $_POST['namaSekolah']; // Nama jurusan yang diinputkan

    // Validasi input
    if (empty($id_sekolah) || empty($nama_jurusan)) {
        // Jika ada data yang kosong, beri pesan error
        $_SESSION['error'] = "Semua data harus diisi!";
        header("Location: add-jurusan.php");
        exit();
    }

    // Query untuk memasukkan data ke tabel jurusan
    $query = "INSERT INTO jurusan (id_sekolah, nama_jurusan) VALUES ('$id_sekolah', '$nama_jurusan')";

    // Jalankan query
    if (mysqli_query($conn, $query)) {
        // Jika berhasil
        $_SESSION['success'] = "Jurusan berhasil ditambahkan!";
    } else {
        // Jika gagal
        $_SESSION['error'] = "Terjadi kesalahan: " . mysqli_error($conn);
    }

    // Redirect ke halaman sebelumnya atau halaman lain
    header("Location: add-jurusan.php");
    exit();
}
?>
