var playerVideo, view, timer, videoPreloader;

var btnPlay, btnFull;

var hour, min, seg, currentHour, currentMin, currentSeg;

var intervalTimer;

var barProgress, videoLoader, progress;

var pctSeek, pctBar;

var slider, sliderVol, drag;

var btnVol;

var teste;

function prepare(elem){
	if (playerVideo != elem) {
		playerVideo = elem;

		view = playerVideo.querySelector('.video-view');
		timer = playerVideo.querySelector('.video-time');

		barProgress = playerVideo.querySelector('.video-progress-bar');
		videoLoader = playerVideo.querySelector('.video-loader');
		progress = playerVideo.querySelector('.video-progress');

		btnVol = playerVideo.querySelector('.video-volume');
		btnVol.addEventListener('click', mute);

		barProgress.addEventListener('click', seeker);

		btnPlay = playerVideo.querySelector('.video-play');
		btnPlay.addEventListener('click', play);

		slider = playerVideo.querySelector('.slider');
		sliderVol = playerVideo.querySelector('.slider-vol');

		slider.addEventListener('mousedown', startDrag);
		slider.addEventListener('mouseup', startDrag);

		slider.addEventListener('mousemove', showVolume);

		drag = false;

		intervalTimer = setInterval(updateTimer, 100);

		videoPreloader = playerVideo.querySelector('.video-preloader');
		view.addEventListener('waiting', loader);
		view.addEventListener('playing', loader);

		btnFull = playerVideo.querySelector('.video-screen');
		btnFull.addEventListener('click', fullScreen);

		view.addEventListener('click', play);
		view.addEventListener('dblclick', fullScreen);
	}
}

function fullScreen(){
	if (!document.webkitFullscreenElement) {
		playerVideo.webkitRequestFullscreen();
	}else{
		document.webkitExitFullscreen();
	}
}

function loader(event){
	switch(event.type) {
		case 'waiting':
			videoPreloader.style.display = "block";
			break;
		case 'playing' :
			videoPreloader.style.display = "none";
			break;
	}
}

function mute(){
	if (!view.muted) {
		view.muted = true;
		btnVol.style.backgroundImage = "url(/pay_for_view/assets/img/skin/volume-mute.png)";
	}else{
		view.muted = false;
		btnVol.style.backgroundImage = "url(/pay_for_view/assets/img/skin/volume-medium.png)";
	}
}

function startDrag(event){
	if (event.type == "mousedown") {
		drag = true;
	}else {
		drag = false;
	}
}

function showVolume(event){
	if (drag) {
		var w = slider.clientWidth - 2;
		var x = event.clientX - slider.offsetLeft;
		var pctVol = x/w;

		sliderVol.style.width = x+"px";
		view.volume = pctVol;

		if (pctVol<=0) {
			btnVol.style.backgroundImage = "url(/pay_for_view/assets/img/skin/volume-mute.png)";
		}else if (pctVol >0 && pctVol <=0.5) {
			btnVol.style.backgroundImage = "url(/pay_for_view/assets/img/skin/volume-low.png)";
		}else {
			btnVol.style.backgroundImage = "url(/pay_for_view/assets/img/skin/volume-medium.png)";
		}

	}else{

	}
}

function seeker(){
	pctBar = (event.clientX / barProgress.clientWidth) * 100;
	view.currentTime = (view.duration * pctBar) / 100;
}

function updateTimer(){

	bufferedEnd = view.buffered.end(view.buffered.length - 1);

	videoLoader.style.width = String ((bufferedEnd / view.duration) * 100) + '%';

	pctSeek = (view.currentTime / view.duration) * 100;

	progress.style.width = String(pctSeek)+ '%';

	// Duracao total do video
	hour = Math.floor(view.duration / 3600);
	min = Math.floor(view.duration / 60);
	seg = Math.floor(((view.duration / 60) % 1) * 60);

	// CurrentTime
	currentHour = Math.floor(view.currentTime / 3600);
	currentMin = Math.floor(view.currentTime / 60);
	currentSeg = Math.floor(((view.currentTime / 60) % 1) * 60);

	timer.innerHTML = converteTimer(currentHour, currentMin, currentSeg) + ' | ' + converteTimer(hour, min, seg);
}

function play(){
	if(view.played.length != 0){
		if (view.played.start(0)==0 && !view.paused) {

			view.pause();
			btnPlay.style.backgroundImage = "url(/pay_for_view/assets/img/skin/play.png)";

		}else {

			view.play();
			btnPlay.style.backgroundImage = "url(/pay_for_view/assets/img/skin/pause.png)";
		}
	}else{

		view.play();
		btnPlay.style.backgroundImage = "url(/pay_for_view/assets/img/skin/pause.png)";
	}
}
	//Conversor para timer
	function converteTimer(horas, minutos, segundos){
		if (horas<10 && horas>0) {

			horas = '0' + String(horas) + ":";
		}else {

			horas = '';
		}
		if(minutos<10){

			minutos = '0' + String(minutos);

		}else if (minutos>59) {

			minutos = minutos - (Math.floor(minutos / 60) * 60);
		}
		if (segundos<10) {

			segundos = '0' + String(segundos);
		}
		return String(horas) + String(minutos) + ':' + String(segundos);
	}
