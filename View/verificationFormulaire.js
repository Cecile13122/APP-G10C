//function verificationFormulaireInscription(){
  //  let pattern=/^[a-zA-Z]+$/;

    let nom=document.getElementById('firstname');
    nom.addEventListener("input",messageErreur(nom));
//}

function messageErreur(){
    if(nom.validity.typeMismatch) {
        nom.setCustomValidity("J'attend un e-mail, mon cher !");
        document.getElementById('err_nom').innerHTML=" Le nom ou  le prénom ne sont pas acceptés";
        document.getElementById(this).style.backgroundColor='red';
    } else {
        nom.setCustomValidity("");
        document.getElementById('err_nom').innerHTML="";
        document.getElementById(this).style.backgroundColor='green';
    }

}
