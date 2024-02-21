const lenis = new Lenis();

function raf(time) {
    lenis.raf(time);
}

requestAnimationFrame(raf);

window.addEventListener("load", () => {
    const tl = gsap.timeline();

    tl.to(".preloader", {opacity: 0, delay: 0.5});
    tl.to(".loader", {animation : "none"});
    tl.to(".loader span", {animation : "none"});
    tl.to(".preloader", {display : "none"});

    tl.from(".title1", {opacity : 0, x: 300});
    tl.from(".title2", {opacity : 0, x: -300});
    tl.from(".title3", {opacity : 0, x: 300});

    tl.from(".img1", {scale : 0});
    tl.from(".img2", {scale : 0});
});

const headings = gsap.utils.toArray('.heading h1');
headings.forEach(h => {
    gsap.from(h, {
        opacity: 0,
        y: 200,
        ease: "power3.out",
        scrollTrigger: {
            start: "top 70%",
            trigger: h
        }
    });
});

const progressBars = document.querySelectorAll(".progress-bar .skill-progress");
progressBars.forEach(progress => {
    const level = parseInt(progress.getAttribute("value"));
    const maxLevel = parseInt(progress.getAttribute("max"));
    const percentage = (level / maxLevel) * 100;
    progress.style.width = percentage + "%";
});

const btns = document.querySelectorAll('.gallery-controls button');
const imgs = document.querySelectorAll('.imgs img');

btns.forEach(btn => {
    btn.addEventListener('click', filterImg);
});

function setActiveBtn(e) {
    btns.forEach(btn => {
        btn.classList.remove('btn-active');
    });
    e.target.classList.add('btn-active');
}

function filterImg(e) {
    setActiveBtn(e);
    imgs.forEach(img => {
        img.classList.remove('img-shrink');
        img.classList.add('img-expand');
        const imgType = parseInt(img.dataset.img);
        const btnType = parseInt(e.target.dataset.btn);
        if(imgType !== btnType) {
            img.classList.remove('img-expand');
            img.classList.add('img-shrink');
        }
    });
}

btns[0].addEventListener('click', (e) => {
    setActiveBtn(e);
    imgs.forEach(img => {
        img.classList.remove('img-shrink');
        img.classList.add('img-expanded');
    });
});

const navbarLinks = document.querySelectorAll(".navbar a");

navbarLinks.forEach(link => {
    link.addEventListener("click", () => {
        navbarLinks.forEach(link => link.classList.remove("link-active"));
        link.classList.add("link-active");
    });
});

const tracker = document.querySelector(".tracker");

let scrollAmount = 0;
let yPos = 0;
let xPos = 0;

function mouseTracker() {
    scrollAmount = window.scrollY + yPos;
    tracker.style.top = `${scrollAmount}px`;
    tracker.style.left = `${xPos}px`;
}

window.addEventListener("mousemove", e => {
    setTimeout(() => {
        yPos = e.clientY - tracker.offsetHeight / 2;
        yPos = e.clientX - tracker.offsetWidth / 2;
        mouseTracker();
    }, 100);
});

window.addEventListener("scroll", () => {
    mouseTracker();
});

const links = document.querySelectorAll("a, button");

links.forEach(link => {
    link.addEventListener("mouseenter", () => {
        tracker.style.display = "none";
    });
    link.addEventListener("mouseleave", () => {
        tracker.style.display = "block";
    });
});

if ('ontouchstart' in window || navigator.maxTouchPoints) {
    tracker.style.display = "none";
}

// Fonction pour ouvrir le popup
function openPopup() {
    document.getElementById("contactPopup").style.display = "block";
}

// Fonction pour fermer le popup
function closePopup() {
    document.getElementById("contactPopup").style.display = "none";
}

// Ajouter un écouteur d'événement au clic sur le bouton "Me contacter"
document.querySelector(".btn-main").addEventListener("click", function(event) {
    event.preventDefault(); // Pour empêcher le comportement par défaut du lien
    openPopup();
});

// Événement de clic en dehors du popup pour le fermer
window.addEventListener("click", function(event) {
    var popup = document.getElementById("contactPopup");
    if (event.target == popup) {
        closePopup();
    }
});

