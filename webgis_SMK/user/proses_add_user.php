<?php
include_once "../konek.php";

// Pastikan semua data telah diisi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password untuk keamanan
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $id_sekolah = intval($_POST['id_sekolah']);
    $role = mysqli_real_escape_string($conn, $_POST['role']); // Ambil data role

    if ($username && $password && $email && $id_sekolah && $role) {
        $query = "INSERT INTO pengguna (username, password, email, id_sekolah, role) 
                  VALUES ('$username', '$password', '$email', $id_sekolah, '$role')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('User berhasil ditambahkan!'); window.location.href='add-user.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan: " . mysqli_error($conn) . "'); history.back();</script>";
        }
    } else {
        echo "<script>alert('Pastikan semua data terisi!'); history.back();</script>";
    }
}
?>
