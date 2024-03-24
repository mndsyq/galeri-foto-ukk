<?php
include 'config/koneksi.php';
include 'config/aksi_cari.php';

session_start();
$UserId = $_SESSION['UserId'];
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

    <link rel=" stylesheet" href="css/cari.css">
    <title>cari</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-light">
        <div class="container-fluid px-5">
            <div class="col-2 justify-content-center">
                <a href="index.php" class="navbar-brand">GllryPics</a>
            </div>
            <form class="offset-1 col-6 d-flex mt-3 align-items-center" action="cari.php" method="GET">
                <input class="form-control search" type="search" placeholder="cari" aria-label="Search"
                    autocomplete="off" name="cari" value="<?php echo $_GET['cari'] ?>">
                <button class="btn-search btn" type="submit">
                    <ion-icon class="bi bi-search" name="search-outline"></ion-icon>
                </button>
            </form>
            <div class="d-flex offset-1 col-2 justify-content-end">
                <div class="dropdown">
                    <div class="btn-group">
                        <button class="btn" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" aria-expanded="false">
                            <ion-icon name="menu-outline"></ion-icon>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" style="  background-color: #f7f7f7;">
                            <li><a class="dropdown-item" href="profil_user.php">Profil</a></li>
                            <li><a class="dropdown-item" href="album.php">Album</a></li>
                            <li><a class="dropdown-item" href="keluar.php">Keluar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Foto -->
    <div class="container-fluid px-5">
        <div class="row kategori text-center mt-5">
            <h3>Jelajahi Galeri</h3>
        </div>
        <div class="row my-4">
            <?php
if(isset($_GET['cari'])){
    $keyword = $_GET['cari'];
    $result = cari($keyword);
    while($data = mysqli_fetch_array($result)){
?>
            <div class="col-3">
                <!-- gambar galeri -->
                <a href="komen.php?FotoId=<?= $data['FotoId']?>">
                    <img class="poto-galeri object-fit-cover img-fluid" src="gbr/<?= $data['LokasiFile']?>">
                </a>
                <div class="d-flex align-items-center justify-content-between mt-1 mb-4">
                    <a href="profil.php?UserId=<?= $data['UserId']?>" class="text-decoration-none"><small
                            class="fw-bold text-black"><?php echo $data['Username']?></small></a> <!-- nama pengguna -->
                    <!-- Icon -->
                    <div class="d-flex">
                        <div class="me-2 d-flex align-items-center">
                            <?php
                    $FotoId = $data['FotoId'];
                    $ceksuka = mysqli_query($koneksi, "SELECT * FROM gallery_likefoto WHERE FotoId='$FotoId' AND UserId ='$UserId' ");
                    if(mysqli_num_rows($ceksuka) == 1) { ?>
                            <a href="config/proses_suka.php?FotoId=<?php echo $data['FotoId'] ?>" type="submit"
                                name="batalsuka">
                                <ion-icon name="heart"></ion-icon>
                            </a><small>
                                <?php } else { ?>
                                <a href="config/proses_suka.php?FotoId=<?php echo $data['FotoId'] ?>" type="submit"
                                    name="suka">
                                    <ion-icon name="heart-outline"></ion-icon>
                                </a><small>
                                    <?php }
                    $like = mysqli_query($koneksi, "SELECT * FROM gallery_likefoto WHERE FotoId='$FotoId'");
                    echo mysqli_num_rows($like);
                    ?>
                                </small>
                        </div>
                    </div>
                    <!-- End Icon -->
                </div>
            </div>
            <?php
    }
} else {
    echo "Tidak ada hasil pencarian.";
}
?>


        </div>
    </div>
    <!-- End Foto -->

    <!-- Footer -->
    <footer>
        <div class="container-fluid px-5">
            <div class="row align-items-center d-flex">
                <div class="col-2">
                    <a href="index.php" class="navbar-brand">GllryPics</a>
                </div>
                <div class="offset-1 col-6 text-center">
                    <p class="mt-4">Temukan karya-karya lainnya yang menginspirasi dari kami untuk anda. Setiap
                        karya
                        memiliki
                        cerita uniknya sendiri. Jangan ragu untuk terus mengunjungi situs kami.</p>
                </div>
                <div class="d-flex col-3" style="justify-content: space-between;">
                    <button type="button" class="btn-footer btn rounded-circle">
                        <ion-icon name="logo-facebook" class="ikon"></ion-icon>
                    </button>
                    <button type="button" class="btn-footer btn rounded-circle">
                        <ion-icon name="logo-instagram" class="ikon"></ion-icon>
                    </button>
                    <button type="button" class="btn-footer btn rounded-circle">
                        <ion-icon name="logo-twitter" class="ikon"></ion-icon>
                    </button>
                </div>
                <p class="text-center" style="background-color: rgba(0, 0, 0, 0.2);">&copy; 2024 Amanda Naisyiqa.
                    All
                    rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

</body>

</html>