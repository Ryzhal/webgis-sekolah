<?php
// Mulai session jika diperlukan
session_start();
include_once "../konek.php"; // Pastikan file koneksi database benar

// Pastikan parameter ID disertakan
if (isset($_GET['id_sekolah'])) {
    $id = intval($_GET['id_sekolah']); // Pastikan ID adalah angka

    // Ambil data sekolah berdasarkan ID
    $sql = "SELECT gambar FROM sekolah WHERE id_sekolah = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $gambarSekolah = $row['gambar'];

        // Hapus file gambar jika ada
        if (file_exists($gambarSekolah)) {
            unlink($gambarSekolah); // Hapus file gambar
        }

        // Hapus data dari database
        $delete_sql = "DELETE FROM sekolah WHERE id_sekolah = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("i", $id);

        if ($delete_stmt->execute()) {
            echo "Data sekolah berhasil dihapus.";
            header("Location: data-sekolah.php"); // Arahkan ke halaman daftar sekolah
            exit();
        } else {
            echo "Terjadi kesalahan saat menghapus data: " . $conn->error;
        }
    } else {
        echo "Data tidak ditemukan.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID tidak ditemukan.";
    header("Location:data-sekolah.php"); // Arahkan kembali jika ID tidak valid
    exit();
}
?>
