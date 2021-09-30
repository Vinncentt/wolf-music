<?php 
include("includes/header.php") ;



    if(isset($_GET['id'])){
        $albumId = $_GET['id'];
    }
    else {
       header("Location: index.php");
    }

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

<div class="trackListContainer">
    <ul>
        <li>Dog</li>
        <li>Cat</li>
        <li>Frog</li>
    </ul>
</div>

    

<?php include("includes/footer.php") ?>