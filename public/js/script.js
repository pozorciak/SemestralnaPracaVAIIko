
$(document).on("click", ".delete" , function() {
    var aktualneId = $(this).val();
    var prvok = this;
    var potvrdenie = confirm("Naozaj chcete vymazať túto ponuku ?");
    if (potvrdenie) {
        $.ajax({
            url: 'sluzby/delete/' + aktualneId,
            type: 'GET',
            success: function () {
                $(prvok).closest('.ponuka').hide('slow');
            }
        });
    }
});


