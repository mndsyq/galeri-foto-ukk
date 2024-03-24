<?php
session_start();
include 'config/koneksi.php';
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
    <title>Profil User</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-light">
        <div class="container-fluid px-5">
            <div class="col-2 justify-content-center">
                <a href="index.php" class="navbar-brand">GllryPics</a>
            </div>
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
                            <li><a class="dropdown-item" href="keluar.php">Keluar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid px-5 pp">
        <div class="row text-center">
            <div class="offset-4 col-4">
                <div class="text-container">
                    <?php 
                       $UserId = $_SESSION['UserId'];
                       $sql = mysqli_query($koneksi, "SELECT * FROM gallery_user WHERE UserId='$UserId'");
                        while($data = mysqli_fetch_array($sql)){
                        ?>
                    <h2 style="margin-top:0; margin-bottom:5px;"><?php echo $data['Username']?></h2>
                    <p style="margin-top:0; margin-bottom:0;"><?php echo $data['NamaLengkap']?></p>
                    <p style="margin-top:0; margin-bottom:0;"><?php echo $data['Email']?></p>
                    <p style="margin-top:0; margin-bottom:0;"><?php echo $data['Alamat']?></p>

                    <!-- Modal Edit Profil -->
                    <button type="button" class="btn btn-outline-secondary mt-3" data-bs-toggle="modal"
                        data-bs-target="#EditProfil<?php echo $data ['UserId']?> ">
                        Edit Profil
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="EditProfil<?php echo $data ['UserId']?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="config/aksi_pengguna.php" method="post">
                                        <div class="d-grid gap-3">
                                            <input type="hidden" class="form-control input" name="UserId"
                                                value="<?php echo $data['UserId']?>">
                                            <input type="text" class="form-control input" placeholder="Nama Pengguna"
                                                name="namapengguna" value="<?php echo $data['Username']?>">
                                            <input type="text" class="form-control input" placeholder="Nama Lengkap"
                                                name="namalengkap" value="<?php echo $data['NamaLengkap']?>">
                                            <input type="text" class="form-control input" placeholder="Email"
                                                name="email" value="<?php echo $data['Email']?>">
                                            <textarea type="text" class="form-control input" placeholder="Alamat"
                                                name="alamat"><?php echo $data['Alamat']?></textarea>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn batal" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn simpan" name="edit">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Edit Profil -->

                    <!-- Modal Tambah Foto -->
                    <button type="button" class="btn btn-secondary mt-3" data-bs-toggle="modal"
                        data-bs-target="#TambahFoto">
                        Tambah Foto
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="TambahFoto" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Foto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="config/aksi_foto.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3 addfoto d-flex justify-content-center">
                                            <label for="img"><img src="gbr/pp.jpg" alt="foto" id="img-preview"
                                                    class="img-fluid object-fit-cover"></label>
                                            <input id="img" type="file" class="inputfile" name="lokasifile" required>
                                        </div>
                                        <div class="my-4">
                                            <input type="text" class="form-control input" placeholder="Judul Foto"
                                                name="judulfoto">
                                        </div>
                                        <div class="my-4">
                                            <input type="text" class="form-control input" placeholder="Deskripsi Foto"
                                                name="deskripsifoto"></input>
                                        </div>
                                        <div class="my-4">
                                            <select name="AlbumId" id="" class="form-control input">
                                                <?php 
                                                $UserId = $_SESSION['UserId'];
                                                $sql_album = mysqli_query($koneksi, "SELECT * FROM gallery_album WHERE UserId = '$UserId' ");
                                            while ($data_album = mysqli_fetch_array($sql_album)){
                                            ?>
                                                <option value="<?php echo $data_album['AlbumId']?>">
                                                    <?php echo $data_album['NamaAlbum']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn batal" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn simpan" name="tambah">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Tambah Foto -->
                    <?php } ?>

                </div>
            </div>
        </div>
        <hr style=" border-top: 2px solid #000;" class="my-3 mt-5">
        <div class="row text-center">
            <h5>Foto yang diunggah </h5>
        </div>
    </div>

    <!-- Foto -->
    <div class="container-fluid px-5 pp">
        <?php
        $album = mysqli_query($koneksi, "SELECT * FROM gallery_album WHERE UserId='$UserId' ");
        while ($row = mysqli_fetch_array($album)){
        ?>
        <a href="profil_user.php?AlbumId=<?php echo $row['AlbumId']?>" class="btn btn-secondary">
            <?php echo $row['NamaAlbum']?>
        </a>
        <?php } ?>

        <div class="row my-2">
            <?php  
        if (isset($_GET['AlbumId'])){
            $AlbumId = $_GET['AlbumId'];
            $query = mysqli_query($koneksi, "SELECT * FROM gallery_foto WHERE UserId='$UserId' AND AlbumId='$AlbumId' ");
            while($data = mysqli_fetch_array($query)){?>
            <div class="col-3 g-4">
                <a href="komen.php?FotoId=<?php echo $data['FotoId']; ?>"> <img
                        class="poto-galeri object-fit-cover img-fluid" src="gbr/<?php echo $data['LokasiFile']?>"
                        alt="">
                </a>

                <!-- Modal Edit Foto -->
                <button type="button" class="btn btn-outline-secondary my-1 btn-edit-foto" data-bs-toggle="modal"
                    data-bs-target="#EditFoto<?php echo $data['FotoId']?>">
                    Edit Foto
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="EditFoto<?php echo $data['FotoId']?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Foto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="config/aksi_foto.php" method="post" enctype="multipart/form-data">
                                <div class="my-4">
                                    <input type="hidden" class="form-control input" name="FotoId"
                                        value="<?php echo $data['FotoId']?>">
                                </div>
                                <div class="my-4 justify-content-center">
                                    <label for="img"><img src="gbr/<?php echo $data['LokasiFile']?>" alt="foto"
                                            id="img-preview" class="img-fluid object-fit-cover"></label>
                                    <input id="img" type="file" class="" name="lokasifile">
                                </div>
                                <div class="my-4">
                                    <input type="text" class="form-control input" placeholder="Judul Foto"
                                        name="judulfoto" value="<?php echo $data['JudulFoto']?>">
                                </div>
                                <div class="my-4">
                                    <input type="text" class="form-control input" placeholder="Deskripsi Foto"
                                        name="deskripsifoto" value="<?php echo $data['DeskripsiFoto']?>"></input>
                                </div>
                                <div class="my-4">
                                    <select name="AlbumId" id="" class="form-control input">
                                        <?php 
                                        $UserId = $_SESSION['UserId'];
                                        $sql_album = mysqli_query($koneksi, "SELECT * FROM gallery_album WHERE UserId = '$UserId'");
                                            while ($data_album = mysqli_fetch_array($sql_album)){
                                            ?>
                                        <option value="<?php echo $data_album['AlbumId']?>">
                                            <?php echo $data_album['NamaAlbum']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn batal" data-bs-dismiss="modal" name="hapus">Hapus</button>
                            <button type="submit" class="btn simpan" name="edit">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            }
        }else{        
                  $UserId = $_SESSION['UserId'];
                  $sql = mysqli_query($koneksi, "SELECT * FROM gallery_foto WHERE UserId='$UserId'");
                  while($data = mysqli_fetch_array($sql)) {
                    
                        ?>
            <div class="col-3 g-4">
                <a href="komen.php?FotoId=<?php echo $data['FotoId']; ?>"> <img
                        class="poto-galeri object-fit-cover img-fluid" src="gbr/<?php echo $data['LokasiFile']?>"
                        alt="">
                </a>

                <!-- Modal Edit Foto -->
                <button type="button" class="btn btn-outline-secondary my-1 btn-edit-foto" data-bs-toggle="modal"
                    data-bs-target="#EditFoto<?php echo $data['FotoId']?>">
                    Edit Foto
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="EditFoto<?php echo $data['FotoId']?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Foto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="config/aksi_foto.php" method="post" enctype="multipart/form-data">
                                <div class="my-4">
                                    <input type="hidden" class="form-control input" name="FotoId"
                                        value="<?php echo $data['FotoId']?>">
                                </div>
                                <div class="my-4 justify-content-center">
                                    <label for="img"><img src="gbr/<?php echo $data['LokasiFile']?>" alt="foto"
                                            id="img-preview" class="img-fluid object-fit-cover"></label>
                                    <input id="img" type="file" class="" name="lokasifile">
                                </div>
                                <div class="my-4">
                                    <input type="text" class="form-control input" placeholder="Judul Foto"
                                        name="judulfoto" value="<?php echo $data['JudulFoto']?>">
                                </div>
                                <div class="my-4">
                                    <input type="text" class="form-control input" placeholder="Deskripsi Foto"
                                        name="deskripsifoto" value="<?php echo $data['DeskripsiFoto']?>"></input>
                                </div>
                                <div class="my-4">
                                    <select name="AlbumId" id="" class="form-control input">
                                        <?php 
                                        $UserId = $_SESSION['UserId'];
                                        $sql_album = mysqli_query($koneksi, "SELECT * FROM gallery_album WHERE UserId = '$UserId'");
                                            while ($data_album = mysqli_fetch_array($sql_album)){
                                            ?>
                                        <option value="<?php echo $data_album['AlbumId']?>">
                                            <?php echo $data_album['NamaAlbum']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn batal" data-bs-dismiss="modal" name="hapus">Hapus</button>
                            <button type="submit" class="btn simpan" name="edit">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Edit Foto -->
            <?php } } ?>
        </div>

    </div>
    <!-- End Foto -->

    <!-- Footer -->
    <footer class="d-flex justify-content-center">
        &copy; 2024 Amanda Naisyiqa. All
        rights reserved.
    </footer>
    <!-- End Footer -->


    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
    document.getElementById("img").addEventListener("change", function() {
        const file = this.files[0]; // Mendapatkan file yang dipilih oleh pengguna
        if (file) {
            const reader = new FileReader(); // Membuat objek FileReader
            reader.onload = function(e) {
                document.getElementById("img-preview").setAttribute("src", e.target
                    .result); // Menyetel atribut src dari elemen img dengan gambar yang dipilih
            }
            reader.readAsDataURL(file); // Membaca file sebagai URL data
        }
    });
    </script>
    <!-- End Script -->

</body>

</html>