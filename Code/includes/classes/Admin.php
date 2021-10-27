<?php

class ArtistForAdmin
{
    private $con;
    private $id;

    public function __construct($con, $id)
    {
        $this->con = $con;
        $this->id = $id;
        // $id = $this->id;
    }

    // public function getArtistsName()
    // {
    //     $artistQuery = mysqli_query($this->con, "SELECT name FROM artists where id='$this->id'");
    //     $artist = mysqli_fetch_array($artistQuery);
    //     return $artist;
        
    // }

    public function getArtistsName()
    {
        $artistQuery = mysqli_query($this->con, "SELECT * FROM artists");
        $rows = mysqli_fetch_all($artistQuery, MYSQLI_ASSOC);
        return $rows;
    }

    public function getAlbumsTitle()
    {
        $albumsQuery = mysqli_query($this->con, "SELECT * FROM albums");
        $rows = mysqli_fetch_all($albumsQuery, MYSQLI_ASSOC);
        return $rows;
    }

    public function getGenres()
    {
        $genresQuery = mysqli_query($this->con, "SELECT * FROM genres");
        $rows = mysqli_fetch_all($genresQuery, MYSQLI_ASSOC);
        return $rows;
    }
}
