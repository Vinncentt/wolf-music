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

<?php include("includes/headerAdmin.php") ?>

<h3 class="pageHeadingBig">You Might Also Like</h3>

<div class="gridViewContainer">
    <?php

    $albumQuery = mysqli_query($con, "SELECT * FROM albums ");

    while ($row = mysqli_fetch_array($albumQuery)) {


        echo "<div class='gridViewItem'>
                    <a href='admin-songs.php?id=" . $row['id'] . "'>
                    <img src='" . $row['artworkPath'] . "'>

                    <div class='gridViewInfo'>"
            . $row['title'] .
            "</div> 
                    </a>
                </div>";
    }



    ?>
</div>

<?php include("includes/footerAdmin.php") ?>