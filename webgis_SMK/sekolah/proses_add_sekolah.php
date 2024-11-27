<?php
// Mulai session jika diperlukan
session_start();
include_once "../konek.php"; // Pastikan file koneksi database benar

// Konfigurasi folder untuk menyimpan gambar
$target_dir = "../uploads/"; // Folder penyimpanan gambar
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true); // Buat folder jika belum ada
}

// Tangkap data dari formulir
$namaSekolah = $_POST['namaSekolah'];
$alamatSekolah = $_POST['alamatSekolah'];
$kecamatan = $_POST['kecamatan'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$telepon = $_POST['telepon'];
$website = $_POST['website'];
$emailSekolah = $_POST['emailSekolah'];

// Tangkap file gambar
$gambar = $_FILES['gambarSekolah'];
$target_file = $target_dir . basename($gambar['name']);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$uploadOk = 1;

// Validasi file gambar
if (isset($gambar)) {
    $check = getimagesize($gambar['tmp_name']);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File bukan gambar yang valid.";
        $uploadOk = 0;
    }

    // Validasi ukuran file (maks. 2MB)
    if ($gambar['size'] > 2000000) {
        echo "Ukuran file terlalu besar. Maksimal 2MB.";
        $uploadOk = 0;
    }

    // Validasi format file
    $allowed_formats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowed_formats)) {
        echo "Format file tidak didukung. Gunakan JPG, JPEG, PNG, atau GIF.";
        $uploadOk = 0;
    }

    // Proses unggah file
    if ($uploadOk == 1) {
        if (move_uploaded_file($gambar['tmp_name'], $target_file)) {
            echo "File " . htmlspecialchars(basename($gambar['name'])) . " berhasil diunggah.";
        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
            exit();
        }
    } else {
        echo "File tidak dapat diunggah.";
        exit();
    }
} else {
    echo "Gambar tidak ditemukan.";
    exit();
}

// Simpan data ke database
$sql = "INSERT INTO sekolah (nama_sekolah, alamat, kecamatan, latitude, longitude, telepon, website, email, gambar) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $namaSekolah, $alamatSekolah, $kecamatan, $latitude, $longitude, $telepon, $website, $emailSekolah, $target_file);

if ($stmt->execute()) {
    echo "Data sekolah berhasil ditambahkan.";
    header("Location: data-sekolah.php"); // Arahkan ke halaman daftar sekolah setelah berhasil
    exit();
} else {
    echo "Terjadi kesalahan: " . $conn->error;
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
