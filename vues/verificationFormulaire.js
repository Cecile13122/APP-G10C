function verificationNom(val, id, id_btn) {
    let pattern = /^[A-Za-zÜ-ü-]+( *[A-Za-zÜ-ü-]+)*$/;
     if (val ==''){
        document.getElementById('err_'+ id).innerHTML = "Le champ est obligatoire";
        document.getElementById('btn').disabled = true;
        document.getElementById(id).style.boxShadow = '0 0 5px 1px #4C5760';

    }else if (val.match(pattern)===null) {
         document.getElementById('err_' + id).innerHTML = "Votre nom ne peut pas contenir de chiffre ou carateres speciaux";
         document.getElementById('btn').disabled = true;
         document.getElementById(id).style.boxShadow = '0 0 5px 1px #4C5760';

     }

     else {
        document.getElementById('err_'+id).innerHTML = "";
        document.getElementById(id).style.boxShadow = 'none';
         document.getElementById("btn").disabled = false;
    }}

function verificationDate(val,id){
    let pattern = /\d{4}(-\d{2}){2}/;
    if (val ==''){
        document.getElementById('err_'+ id).innerHTML = "Le champ est obligatoire";
        document.getElementById(id).style.boxShadow = '0 0 5px 1px #4C5760';
        document.getElementById("btn").disabled = true;
    }else if (val.match(pattern)===null) {
        document.getElementById('err_'+ id).innerHTML = "Le format ne correpond pas à une date";
        document.getElementById(id).style.boxShadow = '0 0 5px 1px #4C5760';
        document.getElementById('btn').disabled = true;
    } else {
        document.getElementById('err_'+id).innerHTML = "";
        document.getElementById(id).style.boxShadow = 'none';
        document.getElementById("btn").disabled = false;
    }
}

function verificationNumero(val, id) {
    let pattern = /(0|\+ ?33) *[1-9]( *[0-9]{2}){4}/;
    if (val ==''){
        document.getElementById('err_'+ id).innerHTML = "Le champ est obligatoire";
        document.getElementById(id).style.boxShadow = '0 0 5px 1px #4C5760';
        document.getElementById('btn').disabled = true;
    }else if (val.match(pattern)===null) {
        document.getElementById('err_'+ id).innerHTML = "Le numéro doit être de la forme 0_________";
        document.getElementById(id).style.boxShadow = '0 0 5px 1px #4C5760';
        document.getElementById('btn').disabled = true;

    } else {
        document.getElementById('err_'+id).innerHTML = "";
        document.getElementById(id).style.boxShadow = 'none';
        document.getElementById("btn").disabled = false;

    }}
function verificationPostal(val, id) {
    let pattern =/\d{5,6}/;
    if (val ==''){
        document.getElementById('err_'+ id).innerHTML = "Le champ est obligatoire";
        document.getElementById(id).style.boxShadow = '0 0 5px 1px #4C5760';
        document.getElementById('btn').disabled = true;
    }else if (val.match(pattern)===null) {
        document.getElementById('err_'+ id).innerHTML = "Le code postal doit être composé de 5 ou 6 chiffres";
        document.getElementById(id).style.boxShadow = '0 0 5px 1px #4C5760';
        document.getElementById('btn').disabled = true;

    } else {
        document.getElementById('err_'+id).innerHTML = "";
        document.getElementById(id).style.boxShadow = 'none';
        document.getElementById("btn").disabled = false;

    }}



    function verificationMail(val,id) {
        let pattern =/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        if (val ==''){
            document.getElementById('err_'+ id).innerHTML = "Le champ est obligatoire";
            document.getElementById(id).style.boxShadow = '0 0 5px 1px #4C5760';
            document.getElementById('btn').disabled = true;
        }else if (val.match(pattern)===null) {
            document.getElementById('err_'+ id).innerHTML = "Le format ne correspond pas à une adresse mail";
            document.getElementById(id).style.boxShadow = '0 0 5px 1px #4C5760';
            document.getElementById('btn').disabled = true;

        } else {
            document.getElementById('err_'+id).innerHTML = "";
            document.getElementById(id).style.boxShadow = 'none';
            document.getElementById("btn").disabled = false;

        }

    }

    function verificationConfirmationMail(val1, id1, val2, id2){
        let pattern =/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        if (val1 ==''){
            document.getElementById('err_'+ id2).innerHTML = "Le champ est obligatoire";
            document.getElementById(id1).style.boxShadow = '0 0 5px 1px #4C5760';
            document.getElementById('btn').disabled = true;
        }else if (val1.match(pattern)===null) {
            document.getElementById('err_'+ id2).innerHTML = "Le format ne correspond pas à une adresse mail";
            document.getElementById(id1).style.boxShadow = '0 0 5px 1px #4C5760';
            document.getElementById('btn').disabled = true;

        } else if (val1 != val2){
            document.getElementById('err_'+ id2).innerHTML = "L'adresse de confirmation ne correspond pas";
            document.getElementById(id1).style.boxShadow = '0 0 5px 1px #4C5760';
            document.getElementById('btn').disabled = true;
        }
            else {
            document.getElementById('err_'+id2).innerHTML = "";
            document.getElementById(id1).style.boxShadow = 'none';
            document.getElementById(id2).style.boxShadow = 'none';
            document.getElementById("btn").disabled = false;

        }

    }

function verificationMdp(val,id) {
    let pattern =/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&\._-]{8,}$/;
    if (val ==''){
        document.getElementById('err_'+ id).innerHTML = "Le champ est obligatoire";
        document.getElementById(id).style.boxShadow = '0 0 5px 1px #4C5760';
        document.getElementById('btn').disabled = true;
    }else if (val.match(pattern)===null) {
        document.getElementById('err_'+ id).innerHTML = "Le mot de passe doit être composé de 8 caractères dont une majuscule, une minuscule et un chiffre";
        document.getElementById(id).style.boxShadow = '0 0 5px 1px #4C5760';
        document.getElementById('btn').disabled = true;

    } else {
        document.getElementById('err_'+id).innerHTML = "";
        document.getElementById(id).style.boxShadow = 'none';
        document.getElementById("btn").disabled = false;

    }

}

function verificationConfirmationMdp(val1, id1, val2, id2){
    let pattern =/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&\._-]{8,}$/;
    if (val1 ==''){
        document.getElementById('err_'+ id2).innerHTML = "Le champ est obligatoire";
        document.getElementById(id1).style.boxShadow = '0 0 5px 1px #4C5760';
        document.getElementById('btn').disabled = true;
    }else if (val1.match(pattern)===null) {
        document.getElementById('err_'+ id2).innerHTML = "Le mot de passe doit être composé de 8 caractères dont une majuscule, une minuscule et un chiffre";
        document.getElementById(id1).style.boxShadow = '0 0 5px 1px #4C5760';
        document.getElementById('btn').disabled = true;

    } else if (val1 != val2){
        document.getElementById('err_'+ id2).innerHTML = "Le mot de passe de confirmation ne correspond pas";
        document.getElementById(id1).style.boxShadow = '0 0 5px 1px #4C5760';
        document.getElementById('btn').disabled = true;
    }
    else {
        document.getElementById('err_'+id2).innerHTML = "";
        document.getElementById(id1).style.boxShadow = 'none';
        document.getElementById(id2).style.boxShadow = 'none';
        document.getElementById("btn").disabled = false;

    }

}

