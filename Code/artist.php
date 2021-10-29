<?php
include("includes/config.php");
include("includes/header.php");

if (isset($_GET['id'])) {
    $artistId = $_GET['id'];
} else {
    header("Location: index.php");
}

$artist = new Artist($con, $artistId);

?>
<div class="entityInfo borderButtom">
    <div class="centerSection">
        <div class="artistInfo">
            <h1 class="artistName"><?php echo $artist->getName(); ?></h1>
            <div class="headerButtons">
                <button class="button green" onclick="playFirstSong()">PLAY</button>
            </div>
        </div>
    </div>
</div>

<div class="tracklistContainer borderButtom">
    <h2>SONGS</h2>
    <ul class="tracklist">
        <?php
        $songIdArray = $artist->getSongIds();
        $i = 1;
        foreach ($songIdArray as $songId) {
            if ($i > 5) {
                break;
            }

            $albumSong = new Song($con, $songId);
            $albumArtist = $albumSong->getArtist();

            echo "<li class='tracklistRow'>
                        <div class='trackCount'>
                            <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumSong->getId() . "\",tempPlaylist, true )'>
                            <span class='trackNumber'>$i</span>
                        </div>

                        <div class='trackInfo'>
                            <span class='trackName'>" . $albumSong->getTitle() . "</span>
                            <span class='artistName'>" . $albumArtist->getName() . "</span>
                        </div>
                        <div class='trackOptions'>
                            <img class='optionsButton' src='assets/images/icons/more.png'
                        </div>
                        <div class='trackDuration'>
                            <span class='duration'>" . $albumSong->getDuration() . "</span>
                        </div>
                     </li> ";

            $i = $i + 1;
        }
        ?>
        <script>
            var tempSongIds = '<?php print json_encode($songIdArray); ?>';
            tempPlaylist = JSON.parse(tempSongIds);
        </script>
    </ul>
</div>

<div class="gridViewContainer">
    <h2>ALBUMS</h2>
    <?php

    $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE artist='$artistId'");

    while ($row = mysqli_fetch_array($albumQuery)) {


        echo "<div class='gridViewItem'>
                    <a href='album.php?id=" . $row['id'] . "'>
                    <img src='" . $row['artworkPath'] . "'>

                    <div class='gridViewInfo'>"
            . $row['title'] .
            "</div> 
                    </a>
                </div>";
    }



    ?>


    <?php include("includes/footer.php") ?>