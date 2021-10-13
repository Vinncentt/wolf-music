<?php
    $songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");

    $resultArray = array();

    while($row = mysqli_fetch_array($songQuery)){
        array_push($resultArray, $row['id']);
    }

    $jsonArray = json_encode($resultArray);

?>

<script>
    
    //document.readyBlock :
    $(document).ready(function(){
        currentPlayList = <?php echo $jsonArray; ?>;
        audioElement = new Audio();
        setTrack(currentPlayList[0], currentPlayList, false);
    });

    function setTrack(trackId, newPlayList, play ){

        $.post("includes/handlers/ajax/getSongJson.php", { songId: trackId}, function(data) {
            
            var track = JSON.parse(data);

            $(".trackName span").text(track.title);

            $.post("includes/handlers/ajax/getArtistJson.php", { artistId: track.artist}, function(data) {
                var artist = JSON.parse(data);
                $(".artistName span").text(artist.name);
            });

            $.post("includes/handlers/ajax/getAlbumJson.php", { albumId: track.album}, function(data) {
                var album = JSON.parse(data);
                $(".albumLink img").attr("src", album.artworkPath);
            });
            audioElement.setTrack(track);
            // audioElement.play();
            
        });

        if(play == true){
            audioElement.play();
        } 
        
    }

    function playSong() {

        if(audioElement.audio.currentTime == 0) {
            $.post("includes/handlers/ajax/updatePlays.php", { songId: audioElement.currentlyPlaying.id});
        }

        $(".controlButton.play").hide();
        $(".controlButton.pause").show();
        audioElement.play();
    }

    function pauseSong() {
        $(".controlButton.play").show();
        $(".controlButton.pause").hide();
        audioElement.pause();
    }

</script>



<div id="nowPlayingBarContainer">

            <div id="nowPlayingBar">

                <div id="nowPlayingLeft">
                    <div class="content">
                        <span class="albumLink">
                            <img class="albumArtwork" src="" alt="">
                        </span>

                        <div class="trackInfo">
                            <span class="trackName">
                                <span></span>
                            </span>

                            <span class="artistName">
                                <span></span>
                            </span>
                        </div>

                    </div>
                </div>

                <div id="nowPlayingCenter">
                    <div class="content playerControls">
                        <div class="buttons">
                            <button class="controlButton shuffle" title="shuffle button">
                                <img src="assets/images/icons/shuffle.png" alt="shuffle">
                            </button>

                            <button class="controlButton previous" title="previous button">
                                <img src="assets/images/icons/previous.png" alt="previous">
                            </button>

                            <button class="controlButton play" title="play button" onclick="playSong()">
                                <img src="assets/images/icons/play.png" alt="play">
                            </button>

                            <button class="controlButton pause" title="pause button" style="display: none;" onclick="pauseSong()">
                                <img src="assets/images/icons/pause.png" alt="pause">
                            </button>

                            <button class="controlButton next" title="next button">
                                <img src="assets/images/icons/next.png" alt="play">
                            </button>

                            <button class="controlButton repeat" title="repeat button">
                                <img src="assets/images/icons/repeat.png" alt="shuffle">
                            </button>
                        </div>

                        <div class="playbackBar">
                            <span class="progressTime current">0.00</span>
                            <div class="progressBar">
                                <div class="progressBarBg">
                                    <div class="progress"></div>
                                </div>
                            </div>
                            <span class="progressTime remaining">0.00</span>
                        </div>


                    </div>
                </div>

                <div id="nowPlayingRight">
                    <div class="volumeBar">
                        <button class="controlButton volume" title="Volume Button">
                            <img src="assets/images/icons/volume.png" alt="Volume">
                        </button>

                        <div class="progressBar">
                                <div class="progressBarBg">
                                    <div class="progress"></div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>