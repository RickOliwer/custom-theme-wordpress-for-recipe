const track = document.querySelector('.carousel_track');
const slides = Array.from(track.children);
const nextButton = document.querySelector('.button-right');
const prevButton = document.querySelector('.button-left');
const dotsNav = document.querySelector('.carousel_nav');
const dots = Array.from(dotsNav.children);

const slideWidth = slides[0].getBoundingClientRect().width;

//get first child in html element
const addClassToCurrentSlider = document.querySelector('.carousel_track > li:first-child');
const addClassToCarouselNav = document.querySelector('.carousel_nav > button:first-child')

//add class to first child in html element.
addClassToCurrentSlider.classList.add('current-slide');
addClassToCarouselNav.classList.add('current-slide');

// arrange the slides next to one another
const setSlidePosition = (slide, index) => {
    slide.style.left = slideWidth * index + 'px';
}

slides.forEach(setSlidePosition);

const moveToSlide = (track, currentSlide, targetSlide) =>{
    track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
    currentSlide.classList.remove('current-slide');
    targetSlide.classList.add('current-slide');
}

const updateDots = (currentDot, targetDot) => {
    currentDot.classList.remove('current-slide');
    targetDot.classList.add('current-slide');
}

const hideShowArrows = (slides, prevButton, nextButton, targetIndex) => {
    if(targetIndex === 0) {
        prevButton.classList.add('is-hidden');
        nextButton.classList.remove('is-hidden');
    }else if(targetIndex === slides.length - 1){
        prevButton.classList.remove('is-hidden');
        nextButton.classList.add('is-hidden');
    } else {
        prevButton.classList.remove('is-hidden');
        nextButton.classList.remove('is-hidden');
    }
}

//when I ckicj left, move slides to left
prevButton.addEventListener('click', e => {
    const currentSlide = track.querySelector('.current-slide');
    //console.log(currentSlide.nextElementSibling);
    const prevSlide = currentSlide.previousElementSibling;
    const currentDot = dotsNav.querySelector('.current-slide')
    const prevDot = currentDot.previousElementSibling;
    const prevIndex = slides.findIndex(slide => slide === prevSlide)

    hideShowArrows(slides, prevButton, nextButton, prevIndex)
    moveToSlide(track, currentSlide, prevSlide);
    updateDots(currentDot, prevDot);
});


//when click right, move slides to right
nextButton.addEventListener('click', e => {
    const currentSlide = track.querySelector('.current-slide');
    //console.log(currentSlide.nextElementSibling);
    const nextSlide = currentSlide.nextElementSibling;
    const currentDot = dotsNav.querySelector('.current-slide')
    const nextDot = currentDot.nextElementSibling;
    const nextIndex = slides.findIndex(slide => slide === nextSlide)
    moveToSlide(track, currentSlide, nextSlide);

    updateDots(currentDot, nextDot);

    hideShowArrows(slides, prevButton, nextButton, nextIndex)

});

// when click the nav indicator

dotsNav.addEventListener('click', e =>{
    //what indicator was clicked on?
    const targetDot = e.target.closest('button');
    console.log(targetDot);
    if(!targetDot) return;

    const currentSlide = track.querySelector('.current-slide');
    const currentDot = dotsNav.querySelector('.current-slide');
    //find index
    const targetIndex = dots.findIndex(dot => dot === targetDot)
    const targetSlide = slides[targetIndex];
    console.log(targetIndex);

    moveToSlide(track, currentSlide, targetSlide);

    currentDot.classList.remove('current-slide');
    targetDot.classList.add('current-slide');
    updateDots(currentDot, targetDot);

    hideShowArrows(slides, prevButton, nextButton, targetIndex);

});
