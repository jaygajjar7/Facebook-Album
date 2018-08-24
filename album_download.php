<?php
include 'function.php';

if (isset($_POST['download_all'])){
    allAlbumDownload();
    make_zip();
}
if (isset($_POST['download_selected'])){
    $album_ids = explode("-", $_POST['albums']);
    foreach ( $album_ids as $album_id ) {
        $multiple = explode( ",", $album_id );
        downloadAlbum($album_id);
    }
    make_zip();
}
if (isset($_POST['download_single'])){
    $album_id = $_POST['album_id'];
    downloadAlbum($album_id);
    make_zip();
}