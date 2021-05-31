<div class="main">
  <h1>Bienvenue</h1>
  <p class="milieu">Sur ce site vous trouverez vos résultats aux différents tests de sélection pour devenir pilote d'hélicoptère dans l'Armée. Une fois que tous les candidats de votre session auront passé les tests vous saurez si vous êtes admis pour la prochaine phase de recrutement.</p>
    <h2>Pourquoi s'engager ?</h2><br>
    <div class="slideshow">
      <div class="slide">
        <img src="./images/helicoptere2.jpg">
        <h3>Servir son pays</h3>
        <p class="milieu">Servir son pays en France mais aussi dans le monde pour assurer la défense de la France.</p>
      </div>
        <div class="slide">
          <img src="./images/formation.jpg">
          <h3>Se former</h3>
          <p class="milieu">L'Armée vous formera et vous donnera accès à des diplômes reconnus dans le civil.</p>
        </div>
          <div class="slide">
            <img src="./images/helicoptère.jpg">
            <h3>Accéder à des technologies de pointe</h3>
            <p class="milieu">L'Armée travaille sans relâche pour développer des nouvelles technologies pour améliorer la vie des soldats.</p>
          </div>
            <div class="slide">
              <img src="./images/soldat.jpg">
              <h3>Se développer personnellement</h3>
              <p class="milieu">Vous découverez des ressources insoupçonnées. Vous developperez rapidement confiance et sens de la discipline.</p>
            </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<div class="dots">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>

</div>
<script>
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("slide");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}</script>
</div>
