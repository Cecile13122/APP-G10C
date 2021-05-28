//function verification_form_mail(){
    var email = document.getElementsById('email');
    email.addEventListener("keyup", function (event) {
    if(email.validity.typeMismatch) {
        email.setCustomValidity("J'attend un e-mail, mon cher !");
    } else {
        email.setCustomValidity("");
    }
});

var forms = document.getElementsByTagName('form');
for (var i = 0; i < forms.length; i++) {
    forms[i].addEventListener('invalid', function(e) {
        e.preventDefault();
        // Créez votre affichage d'erreur ici.
    }, true);
}

//}
