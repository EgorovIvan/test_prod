let playBtn = document.getElementById('play');
// let bgItems = document.querySelectorAll('.video-item');

let videoList = ["DkDDUOvwyxQ"];
let playerList = ["player"];

let tag = document.createElement('script');
tag.src = "https://www.youtube.com/player_api";
let scriptTag = document.getElementsByTagName('script')[0];
scriptTag.parentNode.insertBefore(tag, scriptTag);

let player;

//Флаг - если есть запущенные плейеры то удаляем
let onPlayer = false;

// function visible() {
//     for (let item of bgItems) {
//         item.style.display = 'block';
//     }
// }

//Настройки плейера
let playerFunc = function onYouTubePlayerAPIReady(playerId, videoId) {

    player = new YT.Player(playerId, {
        videoId: videoId,
        host: 'https://www.youtube.com',
        events: {
            'onReady': onPlayerReady,
            // 'onStateChange': onPlayerStateChange
        }
    });
}

//Запуск 1го плейера
playBtn.onclick = function () {
    if (onPlayer) {
        deletePlayer()
        // visible();
    }
    this.style.display = 'none';
    playerFunc(playerList[0], videoList[0]);
    onPlayer = true;
}

function onPlayerReady(event) {
    event.target.playVideo();
}

function deletePlayer() {
    player.destroy();
}

