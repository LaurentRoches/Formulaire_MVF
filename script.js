//Passage d'un bloc à l'autre
function suivant(id) {
    let prochainFieldset = document.getElementById(id);
    let fieldsetActuel = prochainFieldset.previousElementSibling;

    fieldsetActuel.style.display = "none"; // Masquer l'actuel
    if (prochainFieldset) {
        prochainFieldset.style.display = "block"; // Afficher le prochain s'il existe
    }
}

let tarifReduit = document.getElementById('tarifReduit');
let pass1jour = document.getElementById('pass1jour');
let pass1jourLabel = pass1jour.nextElementSibling;
let pass2jours = document.getElementById('pass2jours');
let pass2joursLabel = pass2jours.nextElementSibling;
let pass3jours = document.getElementById('pass3jours');
let pass3joursLabel = pass3jours.nextElementSibling;
let pass1jourReduit = document.getElementById('pass1jourReduit');
let pass1jourReduitLabel = pass1jourReduit.nextElementSibling;
let pass2joursReduit = document.getElementById('pass2joursReduit');
let pass2joursReduitLabel = pass2joursReduit.nextElementSibling;
let pass3joursReduit = document.getElementById('pass3joursReduit');
let pass3joursReduitLabel = pass3joursReduit.nextElementSibling;


tarifReduit.addEventListener('change', ()=>{
    if (tarifReduit.checked){
        pass1jour.style.display="none";
        pass1jourLabel.style.display="none";
        pass2jours.style.display="none";
        pass2joursLabel.style.display="none";
        pass3jours.style.display="none";
        pass3joursLabel.style.display="none";
        pass1jourReduit.style.display="block";
        pass1jourReduitLabel.style.display="block";
        pass2joursReduit.style.display="block";
        pass2joursReduitLabel.style.display="block";
        pass3joursReduit.style.display="block";
        pass3joursReduitLabel.style.display="block";
    }else{
        pass1jour.style.display="block";
        pass1jourLabel.style.display="block";
        pass2jours.style.display="block";
        pass2joursLabel.style.display="block";
        pass3jours.style.display="block";
        pass3joursLabel.style.display="block";
        pass1jourReduit.style.display="none";
        pass1jourReduitLabel.style.display="none";
        pass2joursReduit.style.display="none";
        pass2joursReduitLabel.style.display="none";
        pass3joursReduit.style.display="none";
        pass3joursReduitLabel.style.display="none";
    }
})

pass1jour.addEventListener('change', ()=>{
    if(pass1jour.checked){
        document.getElementById('pass1jourDate').style.display ="block";
    }else{
        document.getElementById('pass1jourDate').style.display ="none";
    }
})
pass1jourReduit.addEventListener('change', ()=>{
    if(pass1jourReduit.checked){
        document.getElementById('pass1jourDate').style.display ="block";
    }else{
        document.getElementById('pass1jourDate').style.display ="none";
    }
})
pass2jours.addEventListener('change', ()=>{
    if(pass2jours.checked){
        document.getElementById('pass2joursDate').style.display ="block";
    }else{
        document.getElementById('pass2joursDate').style.display ="none";
    }
})
pass2joursReduit.addEventListener('change', ()=>{
    if(pass2joursReduit.checked){
        document.getElementById('pass2joursDate').style.display ="block";
    }else{
        document.getElementById('pass2joursDate').style.display ="none";
    }
})
