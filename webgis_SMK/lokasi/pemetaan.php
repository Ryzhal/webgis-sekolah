<?php
// Mulai session jika diperlukan
session_start();
include_once "../konek.php";
$title = "PEMETAAN - SMK";
include_once "../template/header.php";

$query = "SELECT * FROM sekolah" ;
$result = mysqli_query($conn, $query);
?>
<div class="dashboard">
    <!-- Sidebar -->
    <?php include_once '../template/sidebar.php'; ?>

    <div class="main-content">
        <?php include_once '../template/navbar.php'; ?>
        <!-- Header (Navbar) -->

        <!-- Content Area -->
        <div class="content">
        <div id="map" style="width: 100%; height: 550px;"></div>
<script>

	const map = L.map('map').setView([-4.351552912359528, 119.88921073095801], 10);

	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

    // Jika ada hasil dari query
    <?php while ($row = $result->fetch_assoc()) { ?>
            var marker = L.marker([<?php echo $row['latitude']; ?>, <?php echo $row['longitude']; ?>])
                .bindPopup(
                    "<b><?php echo $row['nama_sekolah']; ?></b><br>" +
                    "<p>Alamat: <?php echo $row['alamat']; ?></p>" +
                    "<p>Kecamatan: <?php echo $row['kecamatan']; ?></p>" +
                    "<p>Telepon: <?php echo $row['telepon']; ?></p>" +
                    "<p>Website: <?php echo $row['website']; ?></p>" +
                    "<p>Email: <?php echo $row['email']; ?></p>" +
                    "<img src='../uploads/<?php echo $row['gambar']; ?>' alt='Gambar Koperasi Beringin' width='300px' height='150px'><br>" +
                    "<hr>"+
                    "<div style='text-align: center;'>" +
                    "<a href='https://www.google.com/maps/place/<?php echo $row['latitude']; ?>,<?php echo $row['longitude']; ?>' target='_blank'>Lihat di Google Maps</a>" +
                    "</div>" 
                )
                .addTo(map);
        <?php } ?>
    </script>

            
        </div>
    </div>
</div>






      


<?php include_once '../template/footer.php'; ?>
