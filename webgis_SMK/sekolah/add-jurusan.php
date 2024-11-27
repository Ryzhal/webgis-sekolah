<?php
// Mulai session jika diperlukan
session_start();
include_once "../konek.php";
$title = "Tambah Jurusan";
include_once "../template/header.php";
?>
<div class="dashboard">
    <!-- Sidebar -->
    <?php include_once '../template/sidebar.php'; ?>

    <div class="main-content">
        <?php include_once '../template/navbar.php'; ?>
        
        <!-- Content Area -->
        <div class="content">
    <h2>Tambah Jurusan</h2>
 <!-- Menampilkan Pesan Status -->
 <?php if (isset($_SESSION['success'])) { ?>
        <div class="success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php } ?>
    <?php if (isset($_SESSION['error'])) { ?>
        <div class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php } ?>

    <form action="proses-jurusan.php" method="POST" enctype="multipart/form-data" class="form-add-user">
    <button type="submit" class="btn-submit">Tambah Jurusan</button>
        <div class="form-group">
            <label for="username">Nama Jurusan:</label>
            <input type="text" id="namaSekolah" name="namaSekolah" placeholder="Masukan Nama Sekolah" required>
        </div>
        <div class="form-group">
            <label for="id_sekolah">ID Sekolah:</label>
            <select id="id_sekolah" name="id_sekolah" required>
                <option value="">Pilih Sekolah</option>
                <?php
    // Query untuk mengambil data dari tabel jenis_koperasi
    $query = "SELECT * FROM sekolah";
    $result = mysqli_query($conn, $query);

    // Jika ada hasil dari query
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Membuat option untuk memilih sekolah
            echo '<option value="' . $row['id_sekolah'] . '">' . $row['nama_sekolah'] . '</option>';
        }
    } else {
        echo '<option value="">Tidak ada SEKOLAH YAng tersedia</option>';
    }
    ?>
            </select>
        </div>
        
        
    </form>
</div>

<?php include_once '../template/footer.php'; ?>
