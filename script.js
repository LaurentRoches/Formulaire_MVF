//Passage d'un bloc à l'autre
function suivant(id) {
    let prochainFieldset = document.getElementById(id);
    let fieldsetActuel = prochainFieldset.previousElementSibling;
    //déclenche l'effet de fondu:
    fieldsetActuel.classList.add('hidden');
    //supprimer la classe à la fin de l'animation:
    setTimeout(()=>{
        fieldsetActuel.classList.remove('hidden');
        fieldsetActuel.style.display = "none"; // Masquer l'actuel
        if (prochainFieldset) {
            prochainFieldset.style.display = "block"; // Afficher le prochain s'il existe
        }
    }, 500);
}

    //Première section:

let tarifReduit = document.getElementById('tarifReduit');
let pass1jour = document.getElementById('pass1jour');
let pass1jourLabel = pass1jour.previousElementSibling;
let pass2jours = document.getElementById('pass2jours');
let pass2joursLabel = pass2jours.previousElementSibling;
let pass3jours = document.getElementById('pass3jours');
let pass3joursLabel = pass3jours.previousElementSibling;
let pass1jourReduit = document.getElementById('pass1jourReduit');
let pass1jourReduitLabel = pass1jourReduit.previousElementSibling;
let pass2joursReduit = document.getElementById('pass2joursReduit');
let pass2joursReduitLabel = pass2joursReduit.previousElementSibling;
let pass3joursReduit = document.getElementById('pass3joursReduit');
let pass3joursReduitLabel = pass3joursReduit.previousElementSibling;


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

    // Deuxième section:
//Les tentes
let tenteNuit1 = document.getElementById('tenteNuit1');
let tenteNuit2 = document.getElementById('tenteNuit2');
let tenteNuit3 = document.getElementById('tenteNuit3');
let tente3Nuits = document.getElementById('tente3Nuits');

tente3Nuits.addEventListener('change', ()=>{
    if(tente3Nuits.checked){
        tenteNuit1.disabled = true;
        tenteNuit2.disabled = true;
        tenteNuit3.disabled = true;
    }else{
        tenteNuit1.disabled = false;
        tenteNuit2.disabled = false;
        tenteNuit3.disabled = false;
    }
})

//Les vans
let vanNuit1 = document.getElementById('vanNuit1');
let vanNuit2 = document.getElementById('vanNuit2');
let vanNuit3 = document.getElementById('vanNuit3');
let van3Nuits = document.getElementById('van3Nuits');

van3Nuits.addEventListener('change', ()=>{
    if(van3Nuits.checked){
        vanNuit1.disabled = true;
        vanNuit2.disabled = true;
        vanNuit3.disabled = true;
    }else{
        vanNuit1.disabled = false;
        vanNuit2.disabled = false;
        vanNuit3.disabled = false;
    }
})

//Les enfants
let enfantsOui = document.getElementById('enfantsOui');
enfantsOui.addEventListener('change', ()=>{
    if(enfantsOui.checked){
        document.getElementById('demonsPresent').style.display ="block";
    }else{
        document.getElementById('demonsPresent').style.display ="none";
    }
})
