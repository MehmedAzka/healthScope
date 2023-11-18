<div class="video">
    <div class="v-container show-controls">
        <div class="v-wrapper">
            <div class="video-timeline">
                <div class="progress-area">
                    <span>00:00</span>
                    <div class="progress-bar"></div>
                </div>
            </div>
            <ul class="video-controls">
                <li class="options left">
                    <button class="volume"><i class="ri-volume-up-line"></i></button>
                    <input type="range" min="0" max="1" step="any">
                    <div class="video-timer">
                        <p class="current-time">00:00</p>
                        <p class="separator"> / </p>
                        <p class="video-duration">00:00</p>
                    </div>
                </li>
                <li class="options center">
                    <button class="skip-backward"><i class="ri-arrow-left-double-fill"></i></button>
                    <button class="play-pause"><i class="ri-play-fill"></i></button>
                    <button class="skip-forward"><i class="ri-arrow-right-double-fill"></i></i></button>
                </li>
                <li class="options rigth">
                    <div class="playback-content">
                        <button class="playback-speed">
                            <span class="ri-slow-down-fill"></span>
                        </button>
                        <ul class="speed-options">
                            <li data-speed="2">2x</li>
                            <li data-speed="1.5">1.5x</li>
                            <li data-speed="1" class="s-active">Normal</li>
                            <li data-speed="0.75">0.75x</li>
                            <li data-speed="0.5">0.5x</li>
                        </ul>
                    </div>
                    <button class="pic-in-pic">
                        <span class="ri-picture-in-picture-line"></span>
                    </button>
                    <button class="full-screen"><i class="ri-fullscreen-line"></i></button>
                </li>
            </ul>
        </div>
        <video src="video/video-content.mp4"></video>
    </div>
</div>