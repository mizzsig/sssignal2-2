$(function() {
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
    window.URL = window.URL || window.webkitURL;

    var video = document.getElementsByClassName('recording-video')[0];
    console.log(video);

    navigator.getUserMedia(
        {video : true, audio : false},
        function(stream) {
            video.src = window.URL.createObjectURL(stream);
            video.play();
        }, function (err) {
            console.log(err);
        }
    );
});