<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namapengguna = $_POST['namapengguna'];
    $katasandi = $_POST['katasandi'];
    $email = $_POST['email'];
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO gallery_user (Username, Password, Email, NamaLengkap, Alamat)
            VALUES ('$namapengguna', '$katasandi', '$email', '$namalengkap', '$alamat')";

    if (mysqli_query($koneksi, $sql)) {
    echo "<script>
    alert('Daftar akun telah berhasil!');
    location.href='../masuk.php';
    </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>