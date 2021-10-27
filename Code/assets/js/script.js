
var currentPlayList = [];
var audioElement;
var mouseDown = false;
var currentIndex = 0;
var repeat = false;

function formatTime(seconds){
    var time = Math.round(seconds);
    var minutes = Math.floor(time / 60);
    var seconds = time - (minutes * 60);

    var extraZero;

    if(seconds < 10){
        extraZero = "0";
    }
    else {
        extraZero = "";
    }
    // var extraZero = (seconds < 10) ? "0" : "";
    return minutes + ":" + extraZero + seconds;

}

function updateTimeProgressBar(audio){
    $(".progressTime.current").text(formatTime(audio.currentTime));
    $(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));

    var progress = audio.currentTime / audio.duration * 100;
    $(".playbackBar .progress").css("width", progress + "%");

}

function updateVolumeProgressBar(audio){
    var volume = audio.volume * 100;
    $(".volumeBar .progress").css("width", volume + "%");

}

function Audio() {
    this.currentlyPlaying;
    this.audio = document.createElement('audio'); //audio object

    // this.audio.addEventListener("canplay", function() { //canplay means when ur able to play a song do what's inside the function
    //     //'this' refers to the object that the event was called on 
    //     $(".progressTime.remaining").text(this.duration);
    // });

    this.audio.addEventListener("canplay", function(){ //canplay means when ur able to play a song do what's inside the function
      //'this' refers to the object that the event was called on
      var duration = formatTime(this.duration);
      $(".progressTime.remaining").text(duration);

    });

    this.audio.addEventListener("timeupdate", function(){
         if(this.duration){
             updateTimeProgressBar(this);
         }
    });

    this.audio.addEventListener("volumechange", function() {
        updateVolumeProgressBar(this);
    });

    this.setTrack = function(track) { //track is a json object
        this.currentlyPlaying = track;
        this.audio.src = track.path;
    }

    this.play = function(){
        this.audio.play();
    }

    this.pause = function() {
        this.audio.pause();
    }

    this.setTime = function(seconds){
        this.audio.currentTime = seconds;
    }
}