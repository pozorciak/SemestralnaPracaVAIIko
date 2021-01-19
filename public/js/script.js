
$(document).on("click", ".delete" , function() {
    var aktualneId = $(this).val();
    var aktualnyPrvok = this;
    var potvrdenie = confirm("Naozaj chcete vymazať túto ponuku ?");
    if (potvrdenie) {
        $.ajax({
            url: 'sluzby/delete/' + aktualneId,
            type: 'GET',
            success: function () {
                $(aktualnyPrvok).closest('.ponuka').hide('slow');
            }
        });
    }
});


