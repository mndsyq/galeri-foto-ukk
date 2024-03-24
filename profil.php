<?php
include 'config/koneksi.php';
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- /Bootstrap -->

    <!-- Icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- /Icon -->


    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Syne:wght@400..800&display=swap"
        rel="stylesheet">
    <!-- /Font -->

    <link rel=" stylesheet" href="css/profil.css">
    <title>Profil</title>
</head>

<body>

    </head>

    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-light">
            <div class="container-fluid px-5">
                <div class="col-2 justify-content-center">
                    <a href="index.php" class="navbar-brand">GllryPics</a>
                </div>
                <?php
            if(empty($_SESSION['status'])) { ?>
                <div class="d-flex offset-8 col-2 justify-content-end">
                    <a href="masuk.php" class="btn btn-masuk text-dark rounded-pill">Masuk</a>
                    <a href="daftar.php" class="btn btn-daftar rounded-pill">Daftar</a>
                </div>
                <?php } else { ?>
                <div class="d-flex offset-8 col-2 justify-content-end">
                    <div class="dropdown">
                        <div class="btn-group">
                            <button class="btn" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" aria-expanded="false">
                                <ion-icon name="menu-outline"></ion-icon>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" style="  background-color: #f7f7f7;">
                                <li><a class="dropdown-item" href="profil_user.php">Profil</a></li>
                                <li><a class="dropdown-item" href="album.php">Album</a></li>
                                <li><a class="dropdown-item" href="config/aksi_keluar.php">Keluar</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="container-fluid px-5 pp">
            <div class="row d-flex align-items-center">
                <div class="col-4">
                    <div class="text-container">
                        <?php 
                       $UserId = $_GET['UserId'];
                       $sql = mysqli_query($koneksi, "SELECT * FROM gallery_user WHERE UserId='$UserId'");
                        while($data = mysqli_fetch_array($sql)){
                        ?>
                        <h2 style="margin-top:0; margin-bottom:5px;"><?php echo $data['Username']?></h2>
                        <p style="margin-top:0; margin-bottom:0;"><?php echo $data['NamaLengkap']?></p>
                        <p style="margin-top:0; margin-bottom:0;"><?php echo $data['Email']?></p>
                        <p style="margin-top:0; margin-bottom:0;"><?php echo $data['Alamat']?></p>
                        <?php } ?>
                    </div>
                </div>
                <hr style=" border-top: 2px solid #000;" class="my-4">
                <div class="row text-center">
                    <h5>Unggahan Pengguna </h5>
                </div>
            </div>
        </div>


        <!-- Foto -->
        <div class="container-fluid px-5 pp">
            <div class="row my-4">
                <?php 
                       $UserId = $_GET['UserId'];
                       $sql = mysqli_query($koneksi, "SELECT * FROM gallery_foto WHERE UserId='$UserId'");
                        while($data = mysqli_fetch_array($sql)){
                        ?>
                <div class="col-3">
                    <!-- gambar galeri -->
                    <a href="komen.php?FotoId=<?php echo $data['FotoId']; ?>"> <img
                            class="poto-galeri object-fit-cover img-fluid" src="gbr/<?php echo $data['LokasiFile']?>"
                            alt="">
                    </a>
                </div>
                <?php } ?>

            </div>
        </div>
        </div>



        <!-- Footer -->
        <footer class="fixed-bottom d-flex justify-content-center">
            &copy; 2024 Amanda Naisyiqa. All
            rights reserved.
        </footer>
        <!-- End Footer -->

    </body>

</html>