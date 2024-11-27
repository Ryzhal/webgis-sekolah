<?php
// Mulai session jika diperlukan
session_start();
include_once "../konek.php";
$title = "Tambah Sekolah";
include_once "../template/header.php";
?>
<div class="dashboard">
    <!-- Sidebar -->
    <?php include_once '../template/sidebar.php'; ?>

    <div class="main-content">
        <?php include_once '../template/navbar.php'; ?>
        
        <!-- Content Area -->
        <div class="content">
    <h2>Tambah Sekolah</h2>
    <form action="proses_add_sekolah.php" method="POST" enctype="multipart/form-data" class="form-add-user">
    <button type="submit" class="btn-submit">Tambah Sekolah</button>
        <div class="form-group">
            <label for="username">Nama Sekolah:</label>
            <input type="text" id="namaSekolah" name="namaSekolah" placeholder="Masukan Nama Sekolah" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat Sekolah:</label>
           <textarea name="alamatSekolah" id="alamatSekolah" rows="2" maxlength="200" placeholder="Masukan Alamat" ></textarea>
        </div>
        <div class="form-group">
            <label for="kecamatan">Kecamatan :</label>
            <input type="text" id="kecamatan" name="kecamatan" placeholder="Masukan Kecamatan" required>
        </div>
        <div class="form-group">
            <label for="latitude">Latitude :</label>
            <input type="text" id="latitude" name="latitude" placeholder="Masukan Latitude yang di copy dari googlemap" required>
        </div>
        <div class="form-group">
            <label for="longitude">Longitude :</label>
            <input type="text" id="longitude" name="longitude" placeholder="Masukan Longitude yang di copy dari googlemap" required>
        </div>
        <div class="form-group">
            <label for="telepon">Telepon :</label>
            <input type="text" id="telepon" name="telepon" placeholder="Masukan No Telepon" required>
        </div>
        <div class="form-group">
            <label for="website">Website Sekolah :</label>
            <input type="text" id="website" name="website" placeholder="Masukan Nama Website jika Tidak Ada Ketikan 'tidak ada' " required>
        </div>
        <div class="form-group">
            <label for="emailSekolah">Email Sekolah :</label>
            <input type="text" id="emailSekolah" name="emailSekolah" placeholder="Masukan Email Sekolah Anda" required>
        </div>
        <div class="form-group">
    <label for="gambarSekolah">Upload Gambar Sekolah:</label>
    <input type="file" id="gambarSekolah" name="gambarSekolah" accept="image/*" required>
</div>

        
    </form>
</div>

<?php include_once '../template/footer.php'; ?>
