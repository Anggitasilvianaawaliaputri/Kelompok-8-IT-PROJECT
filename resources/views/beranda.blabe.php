<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Toko Yulia</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling Header Image */
        .header-image {
            background-image: url('path/to/your/image.png'); /* Ganti dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            color: #ffffff;
            text-align: center;
        }
        /* Styling Navbar */
        .navbar-custom {
            background-color: #004AAD;
        }
        .navbar-custom .navbar-brand {
            color: #ffffff;
            font-size: 2rem; /* Memperbesar tulisan "Toko Yulia" */
            font-weight: bold;
        }
        /* Styling Buttons */
        .button-container {
            margin-top: 20px;
        }
        .btn-custom {
            background-color: #004AAD;
            color: #ffffff;
            width: 150px; /* Memperbesar lebar tombol */
            height: 50px; /* Memperbesar tinggi tombol */
            font-size: 1.2rem; /* Memperbesar ukuran teks pada tombol */
            margin: 10px;
            border-radius: 8px;
        }
        .btn-custom:hover {
            background-color: #004AAD;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand mx-auto" href="#">Toko Yulia</a>
    </nav>

    <!-- Header Section -->
    <div class="header-image">
        <h1>Selamat Datang di Toko Yulia</h1>
        <p>Tempat terbaik untuk kebutuhan Anda</p>
        <div class="button-container">
            <button type="button" class="btn btn-custom">Pemilik</button>
            <button type="button" class="btn btn-custom">Admin</button>
            <button type="button" class="btn btn-custom">Karyawan</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

