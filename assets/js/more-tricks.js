const seeMoreButton = document.getElementById('see-more');

if (seeMoreButton) {
    seeMoreButton.addEventListener('click', function() {
        const displayedTricksCount = document.querySelectorAll('.trick-card').length;

        fetch(`/homepage/load-more/${displayedTricksCount}`)
            .then (response => response.text())
            .then(html => {
                console.log(html);
                const tricksContainer = document.getElementById('tricks-container')

                tricksContainer.insertAdjacentHTML('beforeend', html);


            })
            .catch(error => {
                console.error('Erreur de chargement des tricks supplémentaires', error);
            });

    });
}

