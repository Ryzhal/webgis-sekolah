<?php
session_start();
include_once "../konek.php"; // Pastikan file koneksi benar

// Ambil data dari form
$id_sekolah = $_POST['id_sekolah'];
$nama_sekolah = $_POST['nama_sekolah'];
$alamat = $_POST['alamat'];
$kecamatan = $_POST['kecamatan'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$telepon = $_POST['telepon'];
$website = $_POST['website'];
$email = $_POST['email'];

// Handle upload gambar jika ada
$uploadDir = "../uploads/";
$gambar = $_FILES['gambar']['name'];
$gambarPath = "";

if (!empty($gambar)) {
    $gambarPath = $uploadDir . basename($gambar);
    move_uploaded_file($_FILES['gambar']['tmp_name'], $gambarPath);
}

// Update data ke database
if (empty($gambarPath)) {
    // Jika gambar tidak diupload
    $sql = "UPDATE sekolah SET nama_sekolah = ?, alamat = ?, kecamatan = ?, latitude = ?, longitude = ?, telepon = ?, website = ?, email = ? WHERE id_sekolah = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $nama_sekolah, $alamat, $kecamatan, $latitude, $longitude, $telepon, $website, $email, $id_sekolah);
} else {
    // Jika gambar diupload
    $sql = "UPDATE sekolah SET nama_sekolah = ?, alamat = ?, kecamatan = ?, latitude = ?, longitude = ?, telepon = ?, website = ?, email = ?, gambar = ? WHERE id_sekolah = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssi", $nama_sekolah, $alamat, $kecamatan, $latitude, $longitude, $telepon, $website, $email, $gambarPath, $id_sekolah);
}

if ($stmt->execute()) {
    echo "<script>alert('Data berhasil diperbarui!'); window.location.href='data-sekolah.php';</script>";
} else {
    echo "<script>alert('Data gagal diperbarui!'); window.history.back();</script>";
}

$stmt->close();
$conn->close();
?>
