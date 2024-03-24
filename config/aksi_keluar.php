<?php
session_start();
session_destroy();
echo "<script>
alert('Berhasil Keluar');
location.href='../index.php';
</script>";
?>