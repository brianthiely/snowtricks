const newItem = (e) => {
    const collectionHolder = document.querySelector(e.currentTarget.dataset.collection);
    const item = document.createElement('div');
    item.classList.add('col-6');

    item.innerHTML += collectionHolder
        .dataset
        .prototype
        .replace(
            /__name__/g,
            collectionHolder.dataset.index
        );

    item.querySelector('.btn-remove').addEventListener('click', () => item.remove());

    collectionHolder.appendChild(item);

    collectionHolder.dataset.index++;

}

document
    .querySelectorAll('.btn-remove')
    .forEach(btn => btn.addEventListener('click', (e) => {
        console.log(e.currentTarget);
        const parentElement = e.currentTarget.closest('.col-12.col-md-6');
        if (parentElement) {
            parentElement.remove();
        }
    }));

document
    .querySelectorAll('.btn-new')
    .forEach(btn => btn.addEventListener('click', newItem));
