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

                // On récupère le nombre total de tricks en faisant une requête AJAX
                fetch('/homepage/total-tricks')
                    .then(response => response.json())
                    .then(data => {
                        const totalTricks = data.total;

                        if (displayedTricksCount === totalTricks) {
                            seeMoreButton.style.display = 'none';
                            const endMessage = document.createElement('p');
                            endMessage.textContent = 'Il n\'y a plus de tricks à afficher.';
                            endMessage.classList.add('text-center', 'mt-4');
                            tricksContainer.insertAdjacentElement('afterend', endMessage);
                        }
                    })
                    .catch(error => {
                        console.error('Erreur lors de la récupération du nombre total de tricks', error);
                    });
            })
            .catch(error => {
                console.error('Erreur de chargement des tricks supplémentaires', error);
            });

    });
}
