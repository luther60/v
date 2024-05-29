const posts = fetch("/../../json/avis.json", {
  method: 'GET',
  headers: {
    "Content-type":"application/json;charset=UTF-8",
    "accept":"application/json"
  }
})
.then(posts => posts.json())
.then(data => {const avis = data
 
  const stars = [
  {s1 : '⭐'},//Caractère unicode
  {s2 : '⭐⭐'},//Emoji direct
  {s3 : '⭐'+'⭐'+'⭐'},
  {s4 : '⭐'+'⭐'+'⭐'+'⭐'},
  {s5 : '⭐'+'⭐'+'⭐'+'⭐'+'⭐'},
]

for(let i = 0; i < avis.length; i++) {

  //Récupération de la div
  const divPost = document.querySelector('.validateAvis')
  //Création de la div contenair
  const container = document.createElement('div')
  container.classList.add('container')
  //Création de la date
  const date = document.createElement('p')
  date.innerText = avis[i].date_post
  //Creation du titre
  const titlePost = document.createElement('h2')
  titlePost.innerText = avis[i].firstname
   //Création de l'étoile
  const star = document.createElement('span')
  star.classList.add('star')
  switch(avis[i].note) {
    case 1: star.innerText = stars[0].s1;
    break;
    case 2: star.innerText = stars[1].s2;
    break;
    case 3: star.innerText = stars[2].s3;
    break;
    case 4: star.innerText = stars[3].s4;
    break;
    case 5: star.innerText = stars[4].s5;
    break;
  }
  //Création du text
  const textPost = document.createElement('p')
  textPost.innerText = avis[i].avis
 
  //Noeud enfant
  divPost.appendChild(container)
  container.appendChild(date)
  container.appendChild(titlePost)
  container.appendChild(star)
  container.appendChild(textPost)
}
});




