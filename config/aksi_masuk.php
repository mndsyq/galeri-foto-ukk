<?php
session_start();
include 'koneksi.php';

$namapengguna = $_POST ['namapengguna'];
$katasandi = $_POST['katasandi'];

$sql = mysqli_query($koneksi, "SELECT * FROM gallery_user WHERE Username='$namapengguna' AND Password='$katasandi'");

$cek = mysqli_num_rows($sql);

if($cek > 0){
$data = mysqli_fetch_array($sql);

$_SESSION['namapengguna'] = $data['Username'];
$_SESSION['UserId'] = $data['UserId'];
$_SESSION['status'] ='masuk';
echo "<script>
location.href='../index.php';
</script>";
}else{
    echo "<script>
alert('Nama Pengguna atau Kata Sandi Salah!');
location.href='../masuk.php';
</script>";

}

?>