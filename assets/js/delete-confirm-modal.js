$(document).ready(function() {
    let trickId;

    $('.delete-button').click(function(e) {
        e.preventDefault();
        $('.modal').toggle();
        trickId = $(this).data('trick-id');
    });

    $('.close, .btn-secondary').click(function() {
        $('.modal').hide();
    });

    $('#confirm-delete').click(function() {
        fetch('/trick/' + trickId + '/delete', {
            method: 'DELETE'
        }).then(r => {
            if (r.status === 200) {
                $('.modal').hide();
                $('#trick-' + trickId).remove();
                window.location.href = '/';
                alert('Trick deleted successfully !')
            } else {
                alert('Error while deleting trick !')
            }
        })

    });
});
