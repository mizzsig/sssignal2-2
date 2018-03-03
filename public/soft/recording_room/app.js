$(function() {
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
    window.URL = window.URL || window.webkitURL;

    var video = document.getElementsByClassName('recording-video')[0];
    var savedVideo = document.getElementsByClassName('saved')[0];
    var localStream;
    var recorder;
    var savedURL;
    console.log(video);

    // 映像・音声の入力を受け取る
    localStream = navigator.getUserMedia(
        {video : true, audio : true},
        function(stream) {
            localStream = stream;
            video.src = window.URL.createObjectURL(stream);
            video.play();
        }, function(error){}
    );

    // 録画開始
    function startRecording() {
        recorder = new MediaRecorder(localStream);
        // 録画が終了したら呼び出される
        recorder.ondataavailable = function(event) {
            var videoBlob = new Blob([event.data], { type: event.data.type });
            savedURL = window.URL.createObjectURL(videoBlob);

            savedVideo.src = savedURL;
        }

        recorder.start();
    }

    // ボタン操作
//    var flag = true;
    $('.record').on('click', function() {
        if ($(this).hasClass('recording-button-on')) {
            $(this).removeClass('recording-button-on');
            $(this).text('録画中...');

            $('.stop').addClass('recording-button-on');
            startRecording();
        }
    });

    $('.stop').on('click', function () {
        if ($(this).hasClass('recording-button-on')) {
            recorder.stop();
            console.log(recorder);

            $(this).removeClass('recording-button-on');
            $('.record').addClass('recording-button-on');
            $('.record').text('録画開始！');
/*
            if (flag) {
                flag = false;
                $('.confirm').addClass('recording-button-on');
                $('.save').addClass('recording-button-on');
            }*/
        }
    });

    $('.confirm').on('click', function () {
        if ($(this).hasClass('recording-button-on')) {
        }
    });

    $('.save').on('click', function () {
        if ($(this).hasClass('recording-button-on')) {
        }
    });
});