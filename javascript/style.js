//Récupération des boutons
const btn1 = document.getElementById('btn1');
const btn2 = document.getElementById('btn2');
const btn3 = document.getElementById('btn3');
const btn4 = document.getElementById('btn4');
const btn5 = document.getElementById('btn5');
//Tableau contenant les boutons
const array = [];
array.push(btn1,btn2,btn3,btn4,btn5);

//On boucle sur le tableau des boutons
for(let i = 0; i < array.length; i++) {
 
  array[i].addEventListener('click', () => {
    //On récupère l'id
    let id_current = array[i].id;
    //On l'envoie à la fonction
    getDisplay(id_current)
  })
}

//On récupère les sous blocs
const subtext1 = document.querySelector('.sous_bloc');
const subtext2 = document.querySelector('.sous_bloc2');
const subtext3 = document.querySelector('.sous_bloc3');
const subtext4 = document.querySelector('.sous_bloc4');
const subtext5 = document.querySelector('.sous_bloc5');

function getDisplay(id_current) {
  
   if(id_current == 'btn1') {
    if(subtext1.style.display == 'block') {
    subtext1.style.display = 'none';
  }else {
    subtext1.style.display = 'block';
  }
  }

   if(id_current == 'btn2') {
    if(subtext2.style.display == 'block') {
    subtext2.style.display = 'none';
  }else {
    subtext2.style.display = 'block';
  }
  }

  if(id_current == 'btn3') {
    if(subtext3.style.display == 'block') {
    subtext3.style.display = 'none';
  }else {
    subtext3.style.display = 'block';
  }
  }

  if(id_current == 'btn4') {
    if(subtext4.style.display == 'block') {
    subtext4.style.display = 'none';
  }else {
    subtext4.style.display = 'block';
  }
  }

  if(id_current == 'btn5') {
    if(subtext5.style.display == 'block') {
    subtext5.style.display = 'none';
  }else {
    subtext5.style.display = 'block';
  }
  }
  }


  
 

  
 

