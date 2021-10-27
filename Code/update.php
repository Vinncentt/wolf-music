<?php include("includes/config.php") ?>



<?php

if (empty($_SESSION)) {
    header("Location: register.php");
} else {
    if ($_SESSION["role"] === "user") {
        header("Location: index.php");
    }
}



?>



<?php
include("includes/headerAdmin.php");
require_once("includes/classes/Song-for-Admin.php");
require_once("includes/handlers/song-handler.php");

// $album = new Album($con, $albumId);
// $songIdArray = $album->getSongIds();

if (isset($_POST['editeButton'])) {
    $x = new SongForAdmin($con);
    $y = $x->getSongInfos($_POST['editeButton']);
    // print_r($y);
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container-fluid d-flex justify-content-center align-items-center bg-dark" style="height: 100vh;"">
    <form action="" style=" width: 30%;" method="POST">
    <div class=" user-details mb-3  p-3">
        <h1 class="title">Insert a new Song</h1>
        <div class="mb-3 mt-3">
            <?php
            require_once("includes/classes/Admin.php");

            // $artistt = new SongForAdmin($con, 1);
            // $artisttNames = $artistt->getTitleU();
            // echo "<pre>";
            // print_r($artisttNames);
            ?>

            <label for="songTitleAdmin" class="form-label ">Song Title:</label>
            <input value="<?php echo $y['title']; ?>" type="text" name="title" class="form-control bg-secondary" id="songTitleAdmin">
        </div>

        <div class="mb-3">
            <?php
            require_once("includes/classes/Admin.php");

            $artistt = new SongForAdmin($con, 1);
            $artisttNames = $artistt->getArtistU();
            // echo "<pre>";
            // print_r($artisttNames);
            ?>
            <label for="artist" class="form-label">Select the Artist:</label>
            <select class="form-select bg-secondary" id="artist" name="artist">
                <?php foreach ($artisttNames as $artisttName) :  ?>
                    <option value="<?php echo $artisttName['id']; ?>"><?php echo $artisttName['name'];  ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <br>
            <?php
            require_once("includes/classes/Admin.php");

            $albums = new ArtistForAdmin($con, 1);
            $albumsTitle = $albums->getAlbumsTitle();
            // echo "<pre>";
            // print_r($albumsTitle);
            ?>
            <label for="album" class="form-label">Select the Album:</label>
            <select class="form-select bg-secondary" id="album" name="album">
                <?php foreach ($albumsTitle as $albumTitle) :  ?>
                    <option>--select Album--</option>
                    <option data-userId="<?php echo $albumTitle['artist']; ?>" value="<?php echo $albumTitle['id']; ?>"><?php echo $albumTitle['title'];  ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <br>
            <?php
            require_once("includes/classes/Admin.php");

            $genres = new ArtistForAdmin($con, 1);
            $songsGenre = $genres->getGenres();
            // echo "<pre>";
            // print_r($albumsTitle);
            ?>

            <label for="genre" class="form-label">Select the Genre:</label>
            <select class="form-select bg-secondary" id="genre" name="genres">
                <?php foreach ($songsGenre as $songGenre) :  ?>
                    <option value="<?php echo $songGenre['id']; ?>"><?php echo $songGenre['name'];  ?></option>
                <?php endforeach; ?>
            </select>

            <div class="mb-3 mt-3">
                <label for="Duration" class="form-label ">Duration of song:</label>
                <input type="text" class="form-control bg-secondary" name="duration" id="Duration" placeholder="Ex: 4:20">
            </div>

            <div class="mb-3 mt-3">
                <label for="title" class="form-label ">Path:</label>
                <input type="text" class="form-control bg-secondary" name="path" id="path" placeholder="Ex: 4:20">
            </div>

            <div class="mb-3 mt-3">
                <label for="order" class="form-label ">Order of song in album:</label>
                <input type="text" name="albumOrder" class="form-control bg-secondary" id="order" placeholder="Ex: 4:20">
            </div>

            <button type="submit" class="btn btn-secondary" id="submit" name="addSong">submit</button>

        </div>
        <div>
            <?php

            if (isset($_SESSION['status'])) {
                echo "<h4>" . $_SESSION['status'] . "<h4>";
                unset($_SESSION['status']);
            }


            ?>
        </div>
    </div>
    </form>
</div>

<script>
    const artist = document.querySelector('#artist');
    const album = document.querySelector('#album');





    artist.addEventListener('change', () => {

        var idArtist = artist.value;
        album.options[0].selected = "selected";
        //console.log(album.options);

        for (var i = 1; i < album.length; i++) {
            var albumArtisId = album.options[i].getAttribute('data-userId');
            //console.log(album.options[i]);

            if (idArtist == albumArtisId) {
                album.options[i].removeAttribute('hidden');
            } else {
                album.options[i].setAttribute('hidden', 'hidden');
            }
            // // now have option.text, option.value
        }



    });
</script>

<?php include("includes/footerAdmin.php") ?>