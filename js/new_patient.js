let jour = document.querySelector(".jour");
let mois = document.querySelector(".mois");
let annee = document.querySelector(".annee");

let listemois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre"]
 
for(let i = 0; i < listemois.length; i++) {
    let option = document.createElement('option');
    option.textContent = listemois[i];
    mois.appendChild(option);
  }

populateDays(mois.value);
populateYears();

  function populateDays(month) {

    while(jour.firstChild){
        jour.removeChild(jour.firstChild);
      }
    
    let dayNum;
  
   
    if(month === 'Janvier' || month === 'Mars' || month === 'Mai' || month === 'Juillet' || month === 'Aout' || month === 'Octobre' || month === 'Décembre') {
      dayNum = 31;
    } else if(month === 'Avril' || month === 'Juin' || month === 'Septembre' || month === 'Novembre') {
      dayNum = 30;
    } else {
    // Si le mois est février, on calcule si l'année est bissextile
      let year = annee.value;
      let leap = new Date(year, 1, 29).getMonth() == 1;
      dayNum = leap ? 29 : 28;
    }
  
   
    for(i = 1; i <= dayNum; i++) {
      let option = document.createElement('option');
      option.textContent = i;
      jour.appendChild(option);
    }
  }

  function populateYears() {
   
    let date = new Date();
    let year = date.getFullYear();
  
    for(let i = 0; i <= 100; i++) {
      let option = document.createElement('option');
      option.textContent = year-i;
      annee.appendChild(option);
    }
  }

    annee.onchange = function() {
    populateDays(mois.value);
  }

  mois.onchange = function() {
    populateDays(mois.value);
  }