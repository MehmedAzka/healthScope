let addDiscussionButton = document.getElementById("add-discussion");
let secAddDisVoid = document.querySelector(".sec-add-dis-void");

let nav = document.querySelector("nav");
let ham = document.querySelector(".hamburger");
window.onscroll = function () {
  if (document.documentElement.scrollTop > 20) {
    nav.classList.add("sticky");
    ham.classList.add("sticky");
  } else {
    nav.classList.remove("sticky");
    ham.classList.remove("sticky");
  }
};

addDiscussionButton.addEventListener("click", function () {
    if (!secAddDisVoid.classList.contains("active")) {
        secAddDisVoid.classList.add("active");
    } else {
        secAddDisVoid.classList.remove("active");
    }
});

// const showMenu = (toggleId, navId) => {
//     const toggle = document.getElementById(toggleId),
//         nav = document.getElementById(navId)

//     toggle.addEventListener('click', () => {
//         nav.classList.toggle('show-menu')
//         toggle.classList.toggle('show-icon')
//     })
// }

// showMenu('nav-toggle', 'nav-menu')
