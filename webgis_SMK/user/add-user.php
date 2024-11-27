<?php
// Mulai session jika diperlukan
session_start();
include_once "../konek.php";
$title = "Tambah User";
include_once "../template/header.php";
?>
<div class="dashboard">
    <!-- Sidebar -->
    <?php include_once '../template/sidebar.php'; ?>

    <div class="main-content">
        <?php include_once '../template/navbar.php'; ?>
        
        <!-- Content Area -->
        <div class="content">
    <h2>Tambah User</h2>
    <form action="proses_add_user.php" method="POST" class="form-add-user">
    <button type="submit" class="btn-submit">Tambah User</button>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Role:</label>
            <div class="form-radio">
                <label>
                    <input type="radio" name="role" value="admin" required> Admin
                </label>
                <label>
                    <input type="radio" name="role" value="viewer" required> Viewer
                </label>
            </div>
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
            // Membuat option untuk setiap jenis koperasi
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
