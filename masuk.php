<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- End Bootstrap -->

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Syne:wght@400..800&display=swap"
        rel="stylesheet">
    <!-- End Font -->

    <link rel="stylesheet" href="css/mm.css">
    <title>Masuk</title>
</head>

<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row">

                <!-- Gambar -->
                <div class="col-lg-6">
                    <img src="gbr/fix.png" class="img-fluid">
                </div>
                <!-- End Gambar -->

                <div class="col-6">
                    <h1>Selamat Datang di <span>GllryPics</span></h1>
                    <form action="config/aksi_masuk.php" method="post">

                        <!-- Input -->
                        <div class="d-flex mt-4 justify-content-center">
                            <input type="text" placeholder="Masukkan Nama Pengguna" name="namapengguna"
                                class="form-control input" required>
                        </div>
                        <div class="d-flex mt-3 justify-content-center">
                            <input type="password" placeholder="Masukkan Kata Sandi" name="katasandi"
                                class="form-control input" required>
                        </div>
                        <!-- End Input -->

                        <!-- Button & Paragraf -->
                        <div class="d-flex justify-content-center mt-4">
                            <input type="submit" value="Masuk" class="button"><br>
                        </div>
                        <div class="d-flex justify-content-center mt-2">
                            <p>Belum memiliki akun? <a href="daftar.php">Daftar</a></p>
                        </div>
                        <!-- End Button & Paragraf -->

                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>