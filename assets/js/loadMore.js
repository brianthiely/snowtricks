const loadmore = document.querySelector('.load-more');

let currentItems = 15;
loadmore.addEventListener('click', (e) => {
    const elementList = [...document.querySelectorAll('.tricks div')];
    e.target.classList.add('show-loader');

    for (let i = currentItems; i < currentItems + 15; i++) {
        setTimeout(function () {
            e.target.classList.remove('show-loader');
            if (elementList[i]) {
                elementList[i].style.display = 'flex';
            }
        }, 3000);
    }
    currentItems += 15;

    // hide load more button if all items are displayed
    if (currentItems >= elementList.length) {
        e.target.classList.add('loaded');
    }
});
