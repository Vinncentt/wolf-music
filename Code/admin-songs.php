<?php include("includes/config.php") ?>
<!--  -->
<?php include("includes/classes/Song-for-Admin.php") ?>
<?php include("includes/handlers/song-handler.php") ?>

<?php
require_once("includes/classes/Song-for-Admin.php");
require_once("includes/handlers/song-handler.php");


if (empty($_SESSION)) {
    header("Location: register.php");
} else {
    if ($_SESSION["role"] === "user") {
        header("Location: index.php");
    }
}

?>

<?php include("includes/headerAdmin.php") ?>


<h1>All songs for Admin</h1>

<?php
if (isset($_GET['id'])) {
    $albumId = $_GET['id'];
}
// else {
// header("Location: index.php");
// }

$album = new Album($con, $albumId);

$artist = $album->getArtist();
?>

<div class="entityInfo">
    <div class="leftSection">
        <img src="<?php echo $album->getartworkPath(); ?>" alt="">
    </div>

    <div class="rightSection">
        <h2><?php echo $album->getTitle(); ?></h2>
        <p>By <?php echo $artist->getName(); ?></p>
        <p> <?php echo $album->getNumberOfSongs(); ?></p>
    </div>
</div>

<div class="tracklistContainer">
    <ul class="tracklist">
        <?php
        $songIdArray = $album->getSongIds();
        $i = 1;

        foreach ($songIdArray as $songId) {

            $albumSong = new Song($con, $songId);
            $albumArtist = $albumSong->getArtist();

            echo "<li class='tracklistRow'>
                        <div class='trackCount'>
                            <span class='trackNumber'>$i</span>
                        </div>

                        <div class='trackInfo'>
                            <span class='trackName'>" . $albumSong->getTitle() . "</span>
                            <span class='artistName'>" . $albumArtist->getName() . "</span>
                        </div>
                        <div class='trackOptions'>
                            
                            <form method='POST' action='update.php'>
                            <button name='editeButton' class='controlButton edit' value=" . $songId . " title='edit'>
                            <i>
                            <img class='optionsButton' src='assets/images/icons/editing.png'>
                            </i>
                            </button>
                            </form>

                            <form method='POST' action=''>
                            <button type='submit' name='deleteSongButton' value=" . $songId . " class='controlButton delete' title='delete'>
                            <img class='optionsButton' src='assets/images/icons/bin.png'>
                            </button>
                            </form>
                        </div>
                        
                     </li> ";

            $i = $i + 1;
        }
        ?>
    </ul>
</div>

<?php include("includes/footerAdmin.php") ?>

<!-- <div class='trackDuration'>
    <img class='duration' src='assets/images/icons/editing.png'>
</div> -->