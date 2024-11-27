<?php
// Mulai session jika diperlukan
session_start();
$title = "DASHBOARD-SMK";
include_once "template/header.php";
include_once "konek.php";

// Query untuk menghitung jumlah SMK
$query_smk = "SELECT COUNT(*) AS total_smk FROM sekolah";
$result_smk = mysqli_query($conn, $query_smk);
$row_smk = mysqli_fetch_assoc($result_smk);
$total_smk = $row_smk['total_smk'];

// Query untuk menghitung jumlah jurusan
$query_jurusan = "SELECT COUNT(*) AS total_jurusan FROM jurusan";
$result_jurusan = mysqli_query($conn, $query_jurusan);
$row_jurusan = mysqli_fetch_assoc($result_jurusan);
$total_jurusan = $row_jurusan['total_jurusan'];
?>

<div class="dashboard">
    <!-- Sidebar -->
    <?php include_once 'template/sidebar.php'; ?>

    <div class="main-content">
        <?php include_once 'template/navbar.php'; ?>
        <!-- Header (Navbar) -->

        <!-- Content Area -->
        <div class="content">
            <!-- Stats Section -->
            <div class="stats">
                <div class="stat-item">
                    <h3>Total SMK</h3>
                    <p><?php echo $total_smk; ?></p>
                </div>
                <div class="stat-item">
                    <h3>Jumlah Jurusan</h3>
                    <p><?php echo $total_jurusan; ?></p>
                </div>
                <div class="stat-item">
                    <h3>Laporan Bulanan</h3>
                    <p>85%</p>
                </div>
            </div>

            <!-- Chart Area -->
            <div class="chart-container">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>

<?php include_once 'template/footer.php'; ?>
