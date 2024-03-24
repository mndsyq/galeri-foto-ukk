<?php
session_start();
include 'koneksi.php';

if(isset($_POST['tambah'])){
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $tanggalunggah = date('Y-m-d');
    $AlbumId= $_POST['AlbumId'];
    $UserId = $_SESSION['UserId'];
    $foto = $_FILES ['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = '../gbr/';
    $namafoto = rand().'-'.$foto;

    move_uploaded_file($tmp, $lokasi.$namafoto);

    $sql = mysqli_query($koneksi, "INSERT INTO gallery_foto VALUES ('', '$judulfoto', '$deskripsifoto', '$tanggalunggah', '$namafoto', '$AlbumId', '$UserId')");

    if($sql) {
        echo "<script>
        location.href='../profil_user.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal menyimpan data. Silakan coba lagi!');
        location.href='../profil_user.php';
        </script>";
    }
}


if (isset($_POST['edit'])){
    $FotoId = $_POST['FotoId'];
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $AlbumId= $_POST['AlbumId'];
    $UserId = $_SESSION['UserId'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = '../gbr/';
    $namafoto = rand().'-'.$foto;

    if($foto == null){
        $sql = mysqli_query($koneksi, "UPDATE gallery_foto SET JudulFoto='$judulfoto', DeskripsiFoto='$deskripsifoto', 
        AlbumId='$AlbumId' WHERE FotoId='$FotoId'");
    } else {
        $query = mysqli_query($koneksi, "SELECT * FROM gallery_foto WHERE FotoId='$FotoId'");
        $data = mysqli_fetch_array($query);
        if (is_file($lokasi . $data['LokasiFile'])){
            unlink($lokasi . $data['LokasiFile']);
        }
        move_uploaded_file($tmp, $lokasi.$namafoto);
        $sql = mysqli_query($koneksi, "UPDATE gallery_foto SET JudulFoto='$judulfoto', DeskripsiFoto='$deskripsifoto', 
        LokasiFile='$namafoto', AlbumId='$AlbumId' WHERE FotoId='$FotoId'");
    }
    echo "<script>
    alert ('Data telah diperbarui!');
    location.href='../profil_user.php';
    </script>";
}


if(isset($_POST['hapus'])){
    $FotoId = $_POST['FotoId'];
    $query = mysqli_query($koneksi, "SELECT * FROM gallery_foto WHERE FotoId='$FotoId'");
        $data = mysqli_fetch_array($query);
        if (is_file($lokasi . $data['LokasiFile'])){
            unlink($lokasi . $data['LokasiFile']);
        }

        $sql = mysqli_query($koneksi, "DELETE FROM gallery_foto WHERE FotoId='$FotoId'");
        echo "<script>
        alert ('Data berhasil dihapus!');
        location.href='../profil_user.php';
        </script>";
}

?>