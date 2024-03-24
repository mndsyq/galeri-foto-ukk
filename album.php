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

    <link rel=" stylesheet" href="css/album.css">
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

    <!-- Foto -->
    <div class="container-fluid px-5 pp">
        <div class="card">
            <div class="card-header">
                <!-- Modal Tambah Album -->
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Album
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Album</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="config/aksi_album.php" method="post">
                                    <div class="my-4">
                                        <input type="text" class="form-control input" placeholder="Nama Album"
                                            name="namaalbum">
                                    </div>
                                    <div class="my-4">
                                        <textarea class="form-control input" placeholder="Deskripsi Album"
                                            name="deskripsialbum"></textarea>
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
                <!-- End Modal Tambah Album -->
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Album</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="align-items-center">
                        <?php 
                       $no = 1;
                       $UserId = $_SESSION['UserId'];
                       $sql = mysqli_query($koneksi, "SELECT * FROM gallery_album WHERE UserId='$UserId'");
                        while($data = mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['NamaAlbum']?></td>
                            <td><?php echo $data['Deskripsi']?></td>
                            <td><?php echo $data['TanggalDibuat']?></td>
                            <td>
                                <!-- Modal Edit Album -->
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                    data-bs-target="#edit<?php echo $data ['AlbumId'] ?>">
                                    Edit
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="edit<?php echo $data ['AlbumId'] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Album</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="config/aksi_album.php" method="post">
                                                    <input type="hidden" class="form-control" name="AlbumId"
                                                        value="<?php echo $data['AlbumId']?>">
                                                    <div class="my-4">
                                                        <input type="text" class="form-control input"
                                                            placeholder="Nama Album" name="namaalbum"
                                                            value="<?php echo $data['NamaAlbum'] ?>">
                                                    </div>
                                                    <div class="my-4">
                                                        <textarea class="form-control input"
                                                            placeholder="Deskripsi Album"
                                                            name="deskripsialbum"><?php echo $data['Deskripsi'] ?></textarea>
                                                    </div>
                                            </div>
                                            <div class=" modal-footer">
                                                <button type="button" class="btn batal"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn simpan" name="edit">Edit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Edit Album -->

                                <!-- Modal Hapus Album -->
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                    data-bs-target="#hapus<?php echo $data ['AlbumId'] ?>">
                                    Hapus
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="hapus<?php echo $data ['AlbumId'] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Album</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="config/aksi_album.php" method="post">
                                                    <input type="hidden" class="form-control" name="AlbumId"
                                                        value="<?php echo $data['AlbumId']?>">
                                                    Anda yakin ingin menghapus <strong>
                                                        <?php echo $data['NamaAlbum']?>
                                                    </strong>?
                                            </div>
                                            <div class=" modal-footer">
                                                <button type="button" class="btn batal"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn simpan" name="hapus">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Hapus Album -->

                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Foto -->

    <!-- Footer -->
    <footer class="fixed-bottom d-flex justify-content-center">
        &copy; 2024 Amanda Naisyiqa. All
        rights reserved.
    </footer>
    <!-- End Footer -->

</body>

</html>