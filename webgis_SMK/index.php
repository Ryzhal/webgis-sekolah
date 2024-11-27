<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Depan</title>
    <link rel="stylesheet" href="css/sekolah.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="img/logo.png" alt="Logo" />
                <span>SISTEM INFORMASI GEOGRAFIS SMK DI KABUPATEN SOPPENG</span>
            </div>
        </nav>
    </header>
    <main class="content">
        <div class="login-form">
            <h2>Login</h2>
            <form action="login_process.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </main>
</body>
</html>
