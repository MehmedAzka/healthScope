const container = document.querySelector(".v-container"),
    mainVideo = container.querySelector("video"),
    videoTimeline = container.querySelector(".video-timeline"),
    progressBar = container.querySelector(".progress-bar"),
    volumeBtn = container.querySelector(".volume i"),
    volumeSlider = container.querySelector(".left input"),
    currentVidTime = container.querySelector(".current-time"),
    videoDuration = container.querySelector(".video-duration"),
    skipBackward = container.querySelector(".skip-backward i"),
    skipForward = container.querySelector(".skip-forward i"),
    playPauseBtn = container.querySelector(".play-pause i"),
    speedBtn = container.querySelector(".playback-speed span"),
    speedOptions = container.querySelector(".speed-options"),
    picInPicBtn = container.querySelector(".pic-in-pic span"),
    picInPicBtn2 = container.querySelector(".pic-in-pic"),
    fullscreenBtn = container.querySelector(".full-screen i");

let timer;

const hideControls = () => {
    if (mainVideo.paused) return;
    timer = setTimeout(() => {
        container.classList.remove("show-controls");
    }, 3000);
}
hideControls();

container.addEventListener("mousemove", () => {
    container.classList.add("show-controls");
    clearTimeout(timer);
    hideControls();
});

const formatTime = time => {
    let seconds = Math.floor(time % 60),
    minutes = Math.floor(time / 60) % 60,
    hours = Math.floor(time / 3600);

    seconds = seconds < 10 ? `0${seconds}` : seconds;
    minutes = minutes < 10 ? `0${minutes}` : minutes;
    hours = hours < 10 ? `0${hours}` : hours;

    if(hours == 0) {
        return `${minutes}:${seconds}`;
    }
    return `${hours}:${minutes}:${seconds}`;
}

mainVideo.addEventListener("timeupdate", e => {
    let { currentTime, duration } = e.target;
    let percent = (currentTime / duration) * 100;
    progressBar.style.width = `${percent}%`;
    currentVidTime.innerText = formatTime(currentTime);
});

mainVideo.addEventListener("loadeddata", e => {
    videoDuration.innerText = formatTime(e.target.duration);
});

videoTimeline.addEventListener("click", e => {
    let timeLineWidth = videoTimeline.clientWidth;
    mainVideo.currentTime = (e.offsetX / timeLineWidth) * mainVideo.duration;
});

const draggableProgressBar = e => {
    let timeLineWidth = videoTimeline.clientWidth;
    progressBar.style.width = `${e.offsetX}px`;
    mainVideo.currentTime = (e.offsetX / timeLineWidth) * mainVideo.duration;
    currentVidTime.innerText = formatTime(mainVideo.currentTime);
}

videoTimeline.addEventListener("mousedown", () => {
    videoTimeline.addEventListener("mousemove", draggableProgressBar);
});

container.addEventListener("mouseup", () => {
    videoTimeline.removeEventListener("mousemove", draggableProgressBar);
});

videoTimeline.addEventListener("mousemove", e => {
    const progressTime = videoTimeline.querySelector("span");
    let offsetX = e.offsetX;
    progressTime.style.left = `${offsetX}px`;
    let timeLineWidth = videoTimeline.clientWidth;
    let percent = (e.offsetX / timeLineWidth) * mainVideo.duration;
    progressTime.innerText = formatTime(percent);
});

volumeBtn.addEventListener("click", () => {
    if (!volumeBtn.classList.contains("ri-volume-up-line")) {
        mainVideo.volume = 0.5;
        volumeBtn.classList.replace("ri-volume-mute-line", "ri-volume-up-line");
    } else {
        mainVideo.volume = 0.0;
        volumeBtn.classList.replace("ri-volume-up-line", "ri-volume-mute-line");
    }
    volumeSlider.value = mainVideo.volume;
});

volumeSlider.addEventListener("input", e => {
    mainVideo.volume = e.target.value;
    if (e.target.value == 0) {
        volumeBtn.classList.replace("ri-volume-up-line", "ri-volume-mute-line");
    } else {
        volumeBtn.classList.replace("ri-volume-mute-line", "ri-volume-up-line");
    }
});

speedBtn.addEventListener("click", () => {
    speedOptions.classList.toggle("show");
});

speedOptions.querySelectorAll("li").forEach(Option => {
    Option.addEventListener("click", () => {
        mainVideo.playbackRate = Option.dataset.speed;
        speedOptions.querySelector(".s-active").classList.remove("s-active");
        Option.classList.add("s-active");
    });
});

document.addEventListener("click", e => {
    if (e.target.tagName !== "SPAN" || e.tagert.className !== "ri-slow-down-fill") {
        speedOptions.classList.remove("show");
    }
});

picInPicBtn.addEventListener("click", () => {
    mainVideo.requestPictureInPicture();
});

fullscreenBtn.addEventListener("click", () => {
    container.classList.toggle("fullscreen");
    if (document.fullscreenElement) {
        fullscreenBtn.classList.replace("ri-fullscreen-exit-line", "ri-fullscreen-line");
        picInPicBtn2.classList.remove("hide-pip");
        return document.exitFullscreen();
    }
    fullscreenBtn.classList.replace("ri-fullscreen-line", "ri-fullscreen-exit-line");
    picInPicBtn2.classList.add("hide-pip");
    container.requestFullscreen();
});

skipBackward.addEventListener("click", () => {
    mainVideo.currentTime -= 5;
});

skipForward.addEventListener("click", () => {
    mainVideo.currentTime += 5;
});

playPauseBtn.addEventListener("click", () => {
    mainVideo.paused ? mainVideo.play() : mainVideo.pause();
});

mainVideo.addEventListener("play", () => {
    playPauseBtn.classList.replace("ri-play-fill", "ri-pause-fill")
});

mainVideo.addEventListener("pause", () => {
    playPauseBtn.classList.replace("ri-pause-fill", "ri-play-fill")
});