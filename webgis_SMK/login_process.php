<?php
session_start(); // Mulai sesi
include_once "konek.php"; // Koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Ambil data pengguna berdasarkan username
    $query = "SELECT * FROM pengguna WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Login berhasil, simpan data pengguna ke sesi
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Arahkan berdasarkan role
            if ($user['role'] == 'admin') {
                header("Location: dashboard.php");
            } else if ($user['role'] == 'viewer') {
                header("Location: v_dash.php");
            } else {
                echo "<script>alert('Role tidak valid!'); history.back();</script>";
            }
        } else {
            echo "<script>alert('Password salah!'); history.back();</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); history.back();</script>";
    }
} else {
    echo "<script>alert('Metode tidak valid!'); history.back();</script>";
}
?>
