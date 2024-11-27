<aside class="sidebar">
    <div class="sidebar-header">
        <h2>WEBGIS SMK</h2>
    </div>
    <ul class="sidebar-menu">
        <li>
            <a href="<?= $link ?>dashboard.php">Dashboard</a>
        </li>
        <hr>
        <li>
            <a href="<?= $link ?>lokasi/pemetaan.php">Pemetaan</a>
        </li>
        <hr>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle">User</a>
            <ul class="dropdown-menu">
                <li><a href="<?= $link ?>user/add-user.php">Tambah User</a></li>
                
            </ul>
        </li>
       <hr>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle">Sekolah</a>
            <ul class="dropdown-menu">
                <li><a href="<?= $link ?>sekolah/data-sekolah.php">Data Sekolah</a></li>
                <li><a href="<?= $link ?>sekolah/data-jurusan.php">Data Jurusan</a></li>
                <li><a href="<?= $link ?>sekolah/add-sekolah.php">Tambah Sekolah</a></li>
                <li><a href="<?= $link ?>sekolah/add-jurusan.php">Tambah Jurusan</a></li>
            </ul>
        </li>
        <hr>
        <li>
            <a href="<?= $link ?>logout.php">Logout</a>
        </li>
    </ul>
</aside>
