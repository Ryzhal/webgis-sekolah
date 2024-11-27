<?php

if (!isset($_SESSION['username'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: index.php");
    exit();
}
?>
<nav class="navbar">
    <h1>SISTEM INFORMASI GEOGRAFIS SMK DI KABUPATEN SOPPENG</h1>

    <div class="user-profile">
        <span>Hai,Selamat Datang</span>
        <span style="margin-right: auto;"><?php echo $_SESSION['username']; ?></span>
    </div>
</nav>
