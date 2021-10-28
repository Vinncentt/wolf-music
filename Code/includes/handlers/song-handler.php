<?php



if (isset($_POST['addSong'])) {
    
    //Login button was pressed
    // die("dsds");
    // echo "HHHHHHHH";
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $album = $_POST['album'];
    $genres = $_POST['genres'];
    $duration = $_POST['duration'];
    $path = $_POST['path'];
    $albumOrder = $_POST['albumOrder'];

    $Song = new SongForAdmin($con);
    $query_run = $Song->insertSong($title, $artist, $album, $genres, $duration, $path, $albumOrder);
}


if (isset($_POST['deleteSongButton'])) {

    //Login button was pressed
    $id_song = $_POST['deleteSongButton'];

    $Song = new SongForAdmin($con);
    $query_run = $Song->deletetSonggg($id_song);

}

if(isset($_POST['updateSong'])){
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $album = $_POST['album'];
    $genres = $_POST['genres'];
    $duration = $_POST['duration'];
    $path = $_POST['path'];
    $albumOrder = $_POST['albumOrder'];
    $id = $_POST['songIdHidden'];

    $Song = new SongForAdmin($con);
    $query_run = $Song->updateSong($title, $artist, $album, $genres, $duration, $path, $albumOrder, $id);
}


