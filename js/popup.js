const closeBtn = document.querySelector('.dq-close i');
const popup = document.querySelector('.dq-container');

window.onload = function () {
    const visited = sessionStorage.getItem('visited');
    if (!visited) {
        setTimeout(function () {
            popup.style.display = "flex";
            document.documentElement.style.overflowY = "hidden";
            sessionStorage.setItem('visited', 'true');
        }, 3000);
    }
};

closeBtn.addEventListener('click', () => {
    popup.style.display = "none";
    document.documentElement.style.overflowY = "scroll";
});