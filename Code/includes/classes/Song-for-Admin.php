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


    public function getSongInfos( $id){
        
        $query = mysqli_query($this->con, "SELECT * FROM songs where id='$id'");
        $data = mysqli_fetch_array($query);
        

       return $data;
    }
    
    public function getTitleU() {
        return $this->title;
    }

    public function getArtistU()
    {
        return $this->artist;
    }

    public function getAlbumtU()
    {
        return $this->album;
    }

    public function getGenreU()
    {
       return $this->genre;
    }

    public function getdurationU()
    {
        return $this->duration;
    }

    public function getPathU()
    {
        return $this->path;
    }

    public function getAlbumOrderU()
    {
        return $this->albumOrder;
    }

    

    public function updateSonggg($id)
    {
        // $duration = "4:20";
        // $path = "assets/music/Sac.flac";
        // $albumOrder = "6";
        //$plays = 0;
        (" fro_m = :from,city_to 
        = :to,date_time = :date_tim,arrive_time = :arrive,price = :price ,seats_number = :seats,status = :status WHERE id = :id");
        $q = mysqli_query($this->con, "UPDATE songs SET id = $id");
        $query_run = mysqli_query($this->con, $q);
        return  $query_run;
    }
}
