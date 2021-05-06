const burgerActiveShowNav = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-items');
    const navItems = document.querySelectorAll('.nav-items li');

    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-show');

        navItems.forEach((item, index) => {
            if(item.style.animation){
                item.style.animation = '';
            } else {
                item.style.animation = `navItemsSlideIn 0.5s ease forwards ${index / 7 + 0.6}s`;
            }
        });

        burger.classList.toggle('toggle');
    });
}

burgerActiveShowNav();