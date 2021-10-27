<?php

class Artist
{
    private $con;
    private $id;

    public function __construct($con, $id)
    {
        $this->con = $con;
        $this->id = $id;
    }

    public function getName()
    {
        $artistQuery = mysqli_query($this->con, "SELECT name FROM artists where id='$this->id'");
        $artist = mysqli_fetch_array($artistQuery);
        return $artist['name'];
    }

    // public function getNames()
    // {
    //     $artistQuery = mysqli_query($this->con, "SELECT * FROM artists");
    //     $rows = mysqli_fetch_all($artistQuery, MYSQLI_ASSOC);
    //     return $rows;
    // }
}
