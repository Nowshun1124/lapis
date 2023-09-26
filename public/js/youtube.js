var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var ytPlayer;

function onYouTubeIframeAPIReady() {
    ytPlayer = new YT.Player('player', {
        height: 390,
        width: 640,
        videoId: 'vifZUxk2WgI',
        playerVars: {//パラメータ
          playsinline: 1,// インライン再生指定
          rel      : 0,// 再生中の動画と同じチャンネルの関連動画を表示
          controls: 0,// コントローラー出さない
          showinfo: 0// タイトルとか動画情報出さない
        },    
        events: {//　イベント
            'onReady': onPlayerReady
        }
    });
}

function onPlayerReady() {
  ytPlayer.mute();// ミュートにしてから
  ytPlayer.playVideo();// 再生
}
