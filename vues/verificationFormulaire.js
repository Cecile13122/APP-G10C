function verificationNom(val,id){
    let pattern=/^[A-Za-zÜ-ü'-]+( *[A-Za-zÜ-ü'-]+)*$/;
    //let valeur =val.values;
    //let identite =val.id;
    if (!val.match(pattern)){
       document.getElementById('err_'.id).innerHTML= "Ne peut pas contenir de chiffres";
        document.getElementById(id).style.boxShadow='0 0 5px 1px #4C5760';
    }
    else{
        document.getElementById('err_'.id).innerHTML="";
        document.getElementById(id).style.boxShadow='none';
    }

}