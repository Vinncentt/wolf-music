<?php include("includes/config.php") ?>

<?php 

// if(isset($_SESSION['userLoggedIn'])){
//     $userLoggedIn = $_SESSION['userLoggedIn'];
// }

// else{
//     header("Location: register.php");
    
// }
    if(empty($_SESSION)){
        header("Location: register.php");
        exit();
    }else{
        if ($_SESSION["role"] === "admin") {
            header("Location: admin.php");
        }
    }
   

?>

<?php include("includes/header.php") ?>





<h3 class="pageHeadingBig">You Might Also Like</h3>

<div class="gridViewContainer">
    <?php 
    
        $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");

        while($row = mysqli_fetch_array($albumQuery)){
                

            echo "<div class='gridViewItem'>
                    <a href='album.php?id=" . $row['id'] . "'>
                    <img src='" . $row['artworkPath'] ."'>

                    <div class='gridViewInfo'>"
                        . $row['title'] .
                    "</div> 
                    </a>
                </div>";

        }
        
    
    
    ?>
</div>


<?php include("includes/footer.php") ?>