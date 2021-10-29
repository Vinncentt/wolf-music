<?php
$songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");

$resultArray = array();

while ($row = mysqli_fetch_array($songQuery)) {
    array_push($resultArray, $row['id']);
}

$jsonArray = json_encode($resultArray);

?>

<script>
    //document.readyBlock :
    $(document).ready(function() {
        var newPlaylist = <?php echo $jsonArray; ?>;
        audioElement = new Audio();
        setTrack(newPlaylist[0], newPlaylist, false);
        updateVolumeProgressBar(audioElement.audio);

        $("#nowPlayingBarContainer").on("mousedown touchstart mousemove thouchmove", function(e) {
            e.preventDefault();
        });

        $(".playbackBar .progressBar").mousedown(function() {
            mouseDown = true;
        });

        $(".playbackBar .progressBar").mousemove(function(e) {
            if (mouseDown == ture) {
                //Set time of song, depending on position of mouse
                timeFromOffset(e, this);
            }
        });

        $(".playbackBar .progressBar").mouseup(function(e) {
            timeFromOffset(e, this);
        });

        $(".volumeBar .progressBar").mousedown(function() {
            mouseDown = true;
        });

        $(".volumeBar .progressBar").mousemove(function(e) {
            if (mouseDown == ture) {

                var percentage = e.offsetX / $(this).width();

                if (percentage >= 0 && percentage <= 1) {
                    audioElement.audio.volume = percentage;
                }


            }
        });

        $(".volumeBar .progressBar").mouseup(function(e) {

            var percentage = e.offsetX / $(this).width();

            if (percentage >= 0 && percentage <= 1) {
                audioElement.audio.volume = percentage;
            }
        });

        $(document).mouseup(function() {
            mouseDown = false;
        });

    });

    function timeFromOffset(mouse, progressBar) {
        var percentage = mouse.offsetX / $(progressBar).width() * 100; //"this" on here can also be ".playbackBar .progressBar" that means is rerfers to the jquery object (".playbackBar .progressBar"). 
        var seconds = audioElement.audio.duration * (percentage / 100);
        audioElement.setTime(seconds);
    }

    function prevSong() {
        if (audioElement.audio >= 3 || currentIndex == 0) {
            audioElement.setTime(0);
        } else {
            currentIndex = currentIndex - 1;
            setTrack(currentPlayList[currentIndex], currentPlayList, true);
        }
    }

    function nextSong() {
        // console.log(currentIndex);
        if (repeat == true) {
            audioElement.setTime(0);
            playSong();
            return;
        }

        if (currentIndex == currentPlayList.length - 1) {
            currentIndex = 0;
        } else {
            currentIndex++;
        }

        var trackToPlay = shuffle ? shufflePlaylist[currentIndex] : currentPlayList[currentIndex];
        setTrack(trackToPlay, currentPlayList, true);
        // console.log(currentIndex);
    }

    function setRepeat() {
        repeat = !repeat;
        var imageName = repeat ? "repeat-active.png" : "repeat.png";
        $(".controlButton.repeat img").attr("src", "assets/images/icons/" + imageName);
    }

    function setMute() {
        audioElement.audio.muted = !audioElement.audio.muted;
        var imageName = audioElement.audio.muted ? "volume-mute.png" : "volume.png";
        $(".controlButton.volume img").attr("src", "assets/images/icons/" + imageName);
    }

    function setShuffle() {
        shuffle = !shuffle;
        var imageName = shuffle ? "shuffle-active.png" : "shuffle.png";
        $(".controlButton.shuffle img").attr("src", "assets/images/icons/" + imageName);

        if (shuffle = true) {
            //Randomise playlist
            shuffleArray(shufflePlaylist)
            currentIndex = shufflePlaylist.indexOf(audioElement.currentlyPlaying.id);
        } else {
            //shuffle has been desactivated
            //Go back to regular playlist
            currentIndex = shufflePlaylist.indexOf(audioElement.currentlyPlaying.id);
        }
    }

    function shuffleArray(a) {
        var j, x, i;
        for (i = a.length; i; i--) {
            j = Math.floor(Math.random() * i);
            x = a[i - 1];
            a[i - 1] = a[j];
            a[j] = x;
        }
    }

    function setTrack(trackId, newPlayList, play) {

        if (newPlayList != currentPlayList) {
            currentPlayList = newPlayList;
            shufflePlaylist = currentPlayList.slice();
            shuffleArray(shufflePlaylist);
        }
        if (shuffle == true) {
            currentIndex = shufflePlayList.indexOf(trackId);
        } else {
            currentIndex = currentPlayList.indexOf(trackId);
        }

        // pauseSong();

        $.post("includes/handlers/ajax/getSongJson.php", {
            songId: trackId
        }, function(data) {


            var track = JSON.parse(data);

            $(".trackName span").text(track.title);

            $.post("includes/handlers/ajax/getArtistJson.php", {
                artistId: track.artist
            }, function(data) {
                var artist = JSON.parse(data);
                $(".artistName span").text(artist.name);
                $(".artistName span").attr("onclick", "location.replace('artist.php?id=" + artist.id + "')");
            });

            $.post("includes/handlers/ajax/getAlbumJson.php", {
                albumId: track.album
            }, function(data) {
                var album = JSON.parse(data);
                $(".albumLink img").attr("src", album.artworkPath);
            });
            audioElement.setTrack(track);
            audioElement.play();

        });

        if (play == true) {
            audioElement.play();
        }

    }

    function playSong() {

        if (audioElement.audio.currentTime == 0) {
            $.post("includes/handlers/ajax/updatePlays.php", {
                songId: audioElement.currentlyPlaying.id
            });
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
                    <img role="link" tabindex="0" class="albumArtwork" src="" alt="">
                </span>

                <div class="trackInfo">
                    <span class="trackName">
                        <span role="link" tabindex="0"></span>
                    </span>

                    <span class="artistName" style="cursor: pointer;">
                        <span role="link" tabindex="0"></span>
                    </span>
                </div>

            </div>
        </div>

        <div id="nowPlayingCenter">
            <div class="content playerControls">
                <div class="buttons">
                    <button class="controlButton shuffle" title="shuffle button" onclick="setShuffle()">
                        <img src="assets/images/icons/shuffle.png" alt="shuffle">
                    </button>

                    <button class="controlButton previous" title="previous button" onclick="prevSong()">
                        <img src="assets/images/icons/previous.png" alt="previous">
                    </button>

                    <button class="controlButton play" title="play button" onclick="playSong()">
                        <img src="assets/images/icons/play.png" alt="play">
                    </button>

                    <button class="controlButton pause" title="pause button" style="display: none;" onclick="pauseSong()">
                        <img src="assets/images/icons/pause.png" alt="pause">
                    </button>

                    <button class="controlButton next" title="next button" onclick="nextSong()">
                        <img src="assets/images/icons/next.png" alt="play">
                    </button>

                    <button class="controlButton repeat" title="repeat button" onclick="setRepeat()">
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
                <button class="controlButton volume" title="Volume Button" onclick="setMute()">
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