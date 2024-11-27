<?php
session_start();
include_once "../konek.php"; // Pastikan file koneksi benar
$title = "Edit Sekolah";
include_once "../template/header.php";

// Cek apakah parameter id_sekolah tersedia
if (!isset($_GET['id_sekolah']) || empty($_GET['id_sekolah'])) {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='data-sekolah.php';</script>";
    exit;
}

$id_sekolah = $_GET['id_sekolah'];

// Ambil data sekolah berdasarkan id_sekolah
$sql = "SELECT * FROM sekolah WHERE id_sekolah = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_sekolah);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='data-sekolah.php';</script>";
    exit;
}

$data = $result->fetch_assoc();
$stmt->close();
?>

<div class="dashboard">
    <!-- Sidebar -->
    <?php include_once '../template/sidebar.php'; ?>

    <div class="main-content">
        <?php include_once '../template/navbar.php'; ?>

        <!-- Content Area -->
        <div class="content">
            <h2>Edit Data Sekolah</h2>

            <form action="proses-edit-sekolah.php" method="POST" enctype="multipart/form-data" class="form-edit-user">
                <!-- Hidden ID -->
                <input type="hidden" name="id_sekolah" value="<?php echo $data['id_sekolah']; ?>">

                <div class="form-group">
                    <label for="nama_sekolah">Nama Sekolah:</label>
                    <input type="text" id="nama_sekolah" name="nama_sekolah" value="<?php echo htmlspecialchars($data['nama_sekolah']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat Sekolah:</label>
                    <textarea name="alamat" id="alamat" rows="3" required><?php echo htmlspecialchars($data['alamat']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="kecamatan">Kecamatan:</label>
                    <input type="text" id="kecamatan" name="kecamatan" value="<?php echo htmlspecialchars($data['kecamatan']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="latitude">Latitude:</label>
                    <input type="text" id="latitude" name="latitude" value="<?php echo htmlspecialchars($data['latitude']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="longitude">Longitude:</label>
                    <input type="text" id="longitude" name="longitude" value="<?php echo htmlspecialchars($data['longitude']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="telepon">Telepon:</label>
                    <input type="text" id="telepon" name="telepon" value="<?php echo htmlspecialchars($data['telepon']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="website">Website:</label>
                    <input type="text" id="website" name="website" value="<?php echo htmlspecialchars($data['website']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Sekolah:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="gambar">Upload Gambar Sekolah (Opsional):</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*">
                    <small>Biarkan kosong jika tidak ingin mengganti gambar.</small>
                </div>

                <div class="form-group">
                    <label>Gambar Sekarang:</label><br>
                    <img src="<?php echo htmlspecialchars($data['gambar']); ?>" alt="Gambar Sekolah" width="150">
                </div>

                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>

<?php include_once '../template/footer.php'; ?>
