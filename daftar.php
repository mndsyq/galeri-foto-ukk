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

    <link rel="stylesheet" href="css/daftar.css">
    <title>Daftar</title>
</head>

<body>

    <div class="container-fluid">
        <div class="container">
            <div class="row">

                <!-- Gambar -->
                <div class="col-6">
                    <img src="gbr/daftar.png" class="img-fluid">
                </div>
                <!-- End Gambar -->

                <div class="col-6">
                    <h1>Daftar <span>GllryPics</span></h1>
                    <form action="config/aksi_daftar.php" method="post">

                        <!-- Input Data -->
                        <div class="row row-cols-2">
                            <div class="col mt-2">
                                <label class="form-label mb-1">Nama Pengguna</label><br>
                                <input type="text" class="form-control input" name="namapengguna" required>
                            </div>
                            <div class="col mt-2">
                                <label class="form-label mb-1">Kata Sandi</label><br>
                                <input type="password" class="form-control input" name="katasandi" required>
                            </div>
                            <div class="col mt-3">
                                <label class="form-label mb-1">Email</label><br>
                                <input type="email" class="form-control input" name="email" required>
                            </div>
                            <div class="col mt-3">
                                <label class="form-label mb-1">Nama Lengkap</label><br>
                                <input type="text" class="form-control input" name="namalengkap" required>
                            </div>
                        </div>
                        <div class="col mt-3">
                            <label class="form-label mb-1">Alamat</label><br>
                            <input type="text" class="form-control input" name="alamat" required>
                        </div>
                        <!-- End Input Data -->

                        <!-- Button & Paragraf -->
                        <div class="d-flex justify-content-center mt-4 me-5">
                            <input type="submit" value="Daftar" class="button"><br>
                        </div>
                        <div class="d-flex justify-content-center me-5 mt-1">
                            <p>Sudah memiliki akun? <a href="masuk.php">Masuk</a></p>
                        </div>
                        <!-- End Button & Paragraf -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>