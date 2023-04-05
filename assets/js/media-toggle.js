const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

const mediaToggle = document.getElementById("media-toggle");
const mediaContainer = document.querySelector(".media-hidden");

if (isMobile && mediaContainer) {
    mediaContainer.classList.add("d-none");
}

if (mediaToggle && mediaContainer) {
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
}
