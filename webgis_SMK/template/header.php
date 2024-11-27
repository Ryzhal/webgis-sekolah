<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= $link ?>/css/dash.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Library Chart.js -->
    <link rel="stylesheet" href="<?= $link?>leaflet/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <script src="<?= $link?>leaflet/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
     <!-- link font awesome -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css" integrity="sha384-NvKbDTEnL+A8F/AA5Tc5kmMLSJHUO868P+lDtTpJIeQdGYaUIuLr4lVGOEA1OcMy" crossorigin="anonymous">
    <style>
      
    /* Reset default styles */
body, html {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    box-sizing: border-box;
}

/* Dashboard Layout */
.dashboard {
    display: flex;
    height: 100vh;
    margin-top: 60px; /* Menghindari overlap dengan navbar */
}

/* Sidebar */
.sidebar {
    width: 250px;
    background-color: #2c3e50;
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px 0;
    position: fixed; /* Membuat sidebar tetap di kiri halaman */
    top: 0;
    left: 0;
    height: 100%; /* Sidebar akan penuh sepanjang halaman */
    z-index: 1; /* Pastikan sidebar berada di bawah navbar */
    margin-top: 58px;
}

.sidebar-header {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
}

.sidebar-menu {
    list-style: none;
    padding: 0;
    width: 100%;
}

.sidebar-menu li {
    margin: 10px 0;
    width: 100%;
}

.sidebar-menu a {
    text-decoration: none;
    color: white;
    padding: 10px 20px;
    display: block;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.sidebar-menu a:hover {
    background-color: #1abc9c;
}

/* Main Content */
.main-content {
    flex: 1;
    background-color: #ecf0f1;
    display: flex;
    flex-direction: column;
    margin-left: 250px; /* Memberi ruang untuk sidebar yang fixed */
    padding-top: 50px; /* Memberi jarak agar tidak menyentuh navbar */
}


/* Header (Navbar) */
.header {
    background-color: #3498db; /* Navbar berwarna biru */
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: fixed; /* Navbar fixed di atas */
    top: 0;
    left: 0;
    width: 100%;
    z-index: 2; /* Navbar berada di atas sidebar */
}

.header h1 {
    margin: 0;
    font-size: 24px;
}

.header .user-profile {
    display: flex;
    align-items: center;
}

.header .user-profile img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-left: 10px;
}

/* Content Area */
.content {
    padding: 20px;
    flex: 1;}

/* Stats Section */
.stats {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.stat-item {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
    flex: 1;
    min-width: 200px;
}

.stat-item h3 {
    margin: 0 0 10px 0;
    color: #2c3e50;
}

.stat-item p {
    font-size: 24px;
    margin: 0;
    color: #3498db;
}

/* Chart Section */
.chart-container {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Responsive Design */
@media (max-width: 768px) {
    .dashboard {
        flex-direction: column;
        margin-top: 0;
    }

    .sidebar {
        width: 100%;
        height: auto;
        position: relative; /* Untuk perangkat kecil, sidebar menjadi bagian dari konten */
        flex-direction: row;
        justify-content: space-around;
        padding: 10px 0;
    }

    .sidebar-menu a {
        padding: 10px 15px;
        font-size: 14px;
    }

    .stats {
        flex-direction: column;
    }

    .header h1 {
        font-size: 20px;
    }

    .header .user-profile img {
        width: 30px;
        height: 30px;
    }

    .main-content {
        margin-left: 0;
    }
}


/* Navbar Styles */
.navbar {
    background-color: #3498db; /* Warna biru navbar */
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between; /* Jarak antara elemen kiri dan kanan */
    align-items: center;
    position: fixed; /* Navbar tetap di atas */
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1; 
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Tambahkan shadow untuk efek depth */
}

.navbar h1 {
    margin: 0;
    font-size: 24px;
    font-weight: 600;
}

/* User Profile */
.user-profile {
    display: flex;
    align-items: center;
    color: white;
    margin-right: 50px;
}

.user-profile span {
    font-size: 18px;
    font-weight: 500;
    margin-right: 10px;
}

.user-profile img {
    width: 50px;
    height: 50px;
    /* border-radius: 50%; */
    object-fit: cover;
    border: 2px solid #fff;
    transition: transform 0.3s ease;
}

.user-profile img:hover {
    transform: scale(1.1); /* Efek zoom saat hover pada gambar */
}

/* Responsive Design */
@media (max-width: 768px) {
    .navbar {
        padding: 10px 15px;
    }

    .navbar h1 {
        font-size: 20px;
    }

    .user-profile span {
        font-size: 14px;
    }

    .user-profile img {
        width: 35px;
        height: 35px;
    }
}

/* Sidebar Styling */
.sidebar {
    width: 250px;
    background-color: #2c3e50;
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px 0;
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
}

.sidebar-header {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
}

.sidebar-menu {
    list-style: none;
    padding: 0;
    width: 100%;
}

.sidebar-menu li {
    position: relative;
    margin: 10px 0;
    width: 100%;
}

.sidebar-menu a {
    text-decoration: none;
    color: white;
    padding: 10px 20px;
    display: block;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.sidebar-menu a:hover {
    background-color: #1abc9c;
}

/* Dropdown Styling */
.dropdown-menu {
    list-style: none;
    padding: 0;
    margin: 0;
    display: none; /* Tersembunyi secara default */
    position: absolute;
    left: 100%;
    top: 0;
    background-color: #34495e;
    width: 200px;
    border-radius: 5px;
    z-index: 100;
}

.dropdown-menu li a {
    padding: 10px 15px;
}

.dropdown-menu li a:hover {
    background-color: #1abc9c;
}

/* Tampilkan dropdown saat hover */
.sidebar-menu .dropdown:hover .dropdown-menu {
    display: block;
}

/* Transition untuk smooth dropdown */
.dropdown-menu {
    transition: all 0.3s ease-in-out;
}

/* css form add user */
.form-add-user {
    max-width: 100%;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #2c3e50;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.form-group input:focus,
.form-group select:focus {
    border-color: #3498db;
    outline: none;
}

.btn-submit {
    display: flex;
    margin-left: auto; /* Dorong tombol ke kanan */
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-submit:hover {
    background-color: #2980b9;
}
.form-radio {
    display: flex;
    gap: 15px;
    margin-top: 5px;
}

.form-radio label {
    font-size: 16px;
    color: #2c3e50;
    cursor: pointer;
}

.form-radio input {
    margin-right: 5px;
}

/* text area */
textarea {
    width: 100%; /* Lebar otomatis mengikuti elemen pembungkus */
    box-sizing: border-box; /* Sertakan padding dan border dalam total lebar */
    resize: vertical; /* Hanya bisa diubah tinggi, bukan lebar */
}
/* class data tabel sekolah */

.content {
    padding: 20px;
}

.filter-form {
    margin-bottom: 20px;
}

.filter-form .form-group {
    display: flex;
    gap: 10px;
    margin-bottom: 10px;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.data-table th, .data-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
}

.data-table th {
    background-color: #3498db;
    color: white;
}

.data-table img {
    border-radius: 5px;
}

    </style>
</head>
<body>
