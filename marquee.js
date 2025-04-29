document.addEventListener("DOMContentLoaded", function() {
    const textElement = document.getElementById('text-stop');
    const playButton = document.getElementById('start');
    const pauseButton = document.getElementById('stop');
    
    const playIcon = playButton.querySelector('.fas.fa-play');
    const pauseIcon = pauseButton.querySelector('.fa-solid.fa-pause');

    pauseIcon.style.display = "block";
    playIcon.style.display = "none";
    
    let marqueeInterval;
    
    function startMarquee() {
        textElement.style.animationPlayState = 'running';
        marqueeInterval = setInterval(() => {
            textElement.style.transform = `translateX(${textElement.offsetWidth}px)`;
        }, 20);
    }
    
    function stopMarquee() {
        textElement.style.animationPlayState = 'paused';
        clearInterval(marqueeInterval);
    }
    
    playButton.addEventListener('click', () => {
        playIcon.style.display = "none";
        pauseIcon.style.display = "block";
        startMarquee();
    });
    
    pauseButton.addEventListener('click', () => {
        playIcon.style.display = "block";
        pauseIcon.style.display = "none";
        stopMarquee();
    });
});