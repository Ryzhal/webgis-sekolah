<?php
session_start();
include_once "../konek.php"; // Pastikan file koneksi benar
$title = "Data Jurusan";
include_once "../template/header.php";
?>

<div class="dashboard">
    <!-- Sidebar -->
    <?php include_once '../template/v_sidebar.php'; ?>

    <div class="main-content">
        <?php include_once '../template/navbar.php'; ?>
        
        <!-- Content Area -->
        <div class="content">
            <h2>Data Jurusan</h2>

            <!-- Form Filter -->
            <form method="GET" action="data-jurusan.php" class="filter-form">
                <div class="form-group">
                    <label for="keyword" style="margin-top: 10px;">Cari Jurusan:</label>
                    <input type="text" id="keyword" style="width: 80%;" name="keyword" placeholder="Masukkan nama jurusan atau sekolah" value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                    <button type="submit" class="btn-submit">Cari</button>
                </div>
            </form>
            <hr>

            <!-- Tabel Data -->
            <table border="1" class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Jurusan</th>
                        <th>Nama Sekolah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Ambil keyword filter jika ada
                    $keyword = isset($_GET['keyword']) ? "%" . $_GET['keyword'] . "%" : "%%";

                    // Query data jurusan dengan join ke tabel sekolah
                    $sql = "SELECT jurusan.nama_jurusan, sekolah.nama_sekolah 
                            FROM jurusan 
                            INNER JOIN sekolah ON jurusan.id_sekolah = sekolah.id_sekolah
                            WHERE jurusan.nama_jurusan LIKE ? OR sekolah.nama_sekolah LIKE ? 
                            ORDER BY jurusan.id_jurusan DESC";

                    $stmt = $conn->prepare($sql);

                    if ($stmt) {
                        $stmt->bind_param("ss", $keyword, $keyword);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $no = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . htmlspecialchars($row['nama_jurusan']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['nama_sekolah']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>Tidak ada data ditemukan.</td></tr>";
                        }

                        $stmt->close();
                    } else {
                        echo "<tr><td colspan='3'>Query tidak valid: " . $conn->error . "</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once '../template/footer.php'; ?>
