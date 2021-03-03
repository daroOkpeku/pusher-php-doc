let bar = document.querySelector('.graphics');
let slide = document.querySelector('.steve');

bar.addEventListener('click', function (e) {
    if (e.target) {
        slide.classList.toggle("steve-active")
        bar.classList.toggle("active")
    } else {
        slide.classList.remove('steve-active')
        bar.classList.remove("active")
    }
});

