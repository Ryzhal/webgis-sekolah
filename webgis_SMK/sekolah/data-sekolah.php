<?php
session_start();
include_once "../konek.php"; // Pastikan file koneksi benar
$title = "Data Sekolah";
include_once "../template/header.php";
?>

<div class="dashboard">
    <!-- Sidebar -->
    <?php include_once '../template/sidebar.php'; ?>

    <div class="main-content">
        <?php include_once '../template/navbar.php'; ?>
        
        <!-- Content Area -->
        <div class="content">
            <h2>Data Sekolah</h2>

            <!-- Form Filter -->
            <form method="GET" action="data-sekolah.php" class="filter-form">
                <div class="form-group">
                    <label for="keyword" style="margin-top: 10px;">Cari Sekolah:</label>
                    <input type="text" id="keyword" style="width: 80%;" name="keyword" placeholder="Masukkan nama sekolah atau kecamatan" value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                    <button type="submit" class="btn-submit">Cari</button>
                </div>
            </form>
            <hr>

            <!-- Tabel Data -->
            <table border="1" class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Sekolah</th>
                        <th>Alamat</th>
                        <th>Kecamatan</th>
                        <th>Telepon</th>
                        <th>Website</th>
                        <th>Email</th>
                        <th>Gambar</th>
                        <th style="width: max-content;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Ambil keyword filter jika ada
                    $keyword = isset($_GET['keyword']) ? "%" . $_GET['keyword'] . "%" : "%%";

                    // Query data sekolah dengan filter
                    $sql = "SELECT * FROM sekolah WHERE nama_sekolah LIKE ? OR kecamatan LIKE ? ORDER BY id_sekolah DESC";
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
                                echo "<td>" . htmlspecialchars($row['nama_sekolah']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['kecamatan']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['telepon']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['website']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                echo "<td><img src='../uploads/" . htmlspecialchars($row['gambar']) . "' alt='Gambar Sekolah' width='100'></td>";
                                echo "<td>
                                        <a href='edit-sekolah.php?id_sekolah=" . $row['id_sekolah'] . "'>Edit</a> |
                                        <a href='hapus-sekolah.php?id_sekolah=" . $row['id_sekolah'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>Tidak ada data ditemukan.</td></tr>";
                        }

                        $stmt->close();
                    } else {
                        echo "<tr><td colspan='9'>Query tidak valid: " . $conn->error . "</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once '../template/footer.php'; ?>
