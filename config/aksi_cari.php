<?php 
include 'koneksi.php';

function cari($keyword){
    global $koneksi;
    $sql = "SELECT gallery_foto.FotoId, gallery_foto.JudulFoto, gallery_foto.LokasiFile, gallery_user.UserId, 
    gallery_user.Username FROM gallery_foto INNER JOIN gallery_user ON gallery_foto.UserId = gallery_user.UserId
    WHERE gallery_foto.JudulFoto LIKE ? OR gallery_user.Username LIKE ?";

    $keyword = "%" . $keyword . "%";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ss", $keyword, $keyword);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}



?>