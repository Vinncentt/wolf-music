<?php
class SongForAdmin
{

    private $con;
    private $id;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function insertSong($title, $artist, $album, $genre, $duration, $path, $albumOrder)
    {


        // $duration = "4:20";
        // $path = "assets/music/Sac.flac";
        // $albumOrder = "6";
        $plays = 0;
        $q = mysqli_query($this->con, "INSERT INTO songs  VALUES ('', '$title', '$artist', '$album', '$genre', '$duration', '$path', '$albumOrder',' $plays')");
        $query_run = mysqli_query($this->con, $q);

        return  $query_run;
    }

    public function deletetSonggg($id)
    {
        // $duration = "4:20";
        // $path = "assets/music/Sac.flac";
        // $albumOrder = "6";
        //$plays = 0;
        $q = mysqli_query($this->con, "DELETE FROM songs WHERE id = $id");
        $query_run = mysqli_query($this->con, $q);
        return  $query_run;
    }


    public function getSongInfos($id)
    {

        // $query = mysqli_query($this->con, "SELECT * FROM songs where id='$id'");
        $query = mysqli_query($this->con, "SELECT *, t.name as artistname, s.id as songId, t.id as artistId, s.title as songtitle FROM songs s , artists t , albums a , genres g where s.artist = t.id and s.genre = g.id and s.album = a.id and s.id = $id");
        $data = mysqli_fetch_assoc($query);

        return $data;
    }

    public function updateSong($title, $artist, $album, $genre, $duration, $path, $albumOrder, $id)
    {
        mysqli_query($this->con, "UPDATE songs
        SET 
            title='$title',
            artist=$artist,
            album=$album,
            genre=$genre,
            duration='$duration',
            path='$path',
            albumOrder= $albumOrder,
            plays = 0 
        WHERE
            id = $id");

    }
    
}
