<aside class="sidebar">
    <div class="sidebar-header">
        <h2>WEBGIS SMK</h2>
    </div>
    <ul class="sidebar-menu">
        <li>
            <a href="<?= $link ?>v_dash.php">Dashboard</a>
        </li>
        <hr>
        <li>
            <a href="<?= $link ?>pengunjung/v-pemetaan.php">Pemetaan</a>
        </li>
        <hr>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle">Sekolah</a>
            <ul class="dropdown-menu">
                <li><a href="<?= $link ?>pengunjung/v-data-sekolah.php">Data Sekolah</a></li>
                <li><a href="<?= $link ?>pengunjung/v-data-jurusan.php">Data Jurusan</a></li>
            </ul>
        </li>
        <hr>
        <li>
            <a href="<?= $link ?>logout.php">Logout</a>
        </li>
    </ul>
</aside>
