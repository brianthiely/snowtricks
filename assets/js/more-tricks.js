$(document).ready(function() {
    const seeMoreButton = $('#see-more');
    if (seeMoreButton.length) {
        console.log('ok');
        seeMoreButton.on('click', function(){
            console.log('bonjour');
        });
    }
});
