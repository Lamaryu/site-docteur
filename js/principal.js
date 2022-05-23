let patient = document.querySelectorAll(".patient");


patient.forEach(calcule => {

    let poids = calcule.querySelector("#poids");
    let taille = calcule.querySelector("#taille");
    let imc = calcule.querySelector("#imc");

    imc.innerText =   Math.round(parseFloat(poids.innerText) / (Math.pow((parseFloat(taille.innerText)/100),2)) * 10) / 10 
});