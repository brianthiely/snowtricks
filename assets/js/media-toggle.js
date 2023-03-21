// Détecter si l'utilisateur est sur un appareil mobile
const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

// Sélectionner le bouton "Voir médias" et la balise <div> contenant le code HTML
const mediaToggle = document.getElementById("media-toggle");
const mediaContainer = document.querySelector(".media-hidden");

// Masquer le code HTML par défaut sur les appareils mobiles
if (isMobile) {
    mediaContainer.classList.add("d-none");
}

// Ajouter un événement de clic au bouton "Voir médias"
mediaToggle.addEventListener("click", function () {
    if (mediaContainer.classList.contains("d-none")) {
        // Afficher le code HTML des médias
        mediaContainer.classList.remove("d-none");
        mediaToggle.textContent = "Masquer médias";
    } else {
        // Masquer le code HTML des médias
        mediaContainer.classList.add("d-none");
        mediaToggle.textContent = "Voir médias";
    }
});
