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

document.querySelector('#password').addEventListener('keyup', function (event) {
    if (event.getModifierState('CapsLock')) {
        document.querySelector('.warning').textContent = 'Pozor,máte zapnutý Caps Lock';
    } else {
        document.querySelector('.warning').textContent = '';
    }
});


$(".loginButt").click(function () {
    $(".loginCon").fadeOut(1500);
    document.querySelector('.uvitaciaSprava').textContent = 'Vitajte !';
    $(".uvitaciaSprava").hide(2000);

});
