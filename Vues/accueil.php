<div class="main">
  <h1>Bienvenue</h1>
  <p class="milieu">Sur ce site vous trouverez vos résultats aux différents tests. Une fois que tous les candidats de votre session auront passé les tests vous saurez si vous êtes admis pour la prochaine phase de recrutement.</p>
    <h2>Voici notre équipe :</h2><br>
    <div class="slideshow">
      <div class="slide">
        <img src="../images/add.png">
        <h3>Adam ASMAHARI</h3>
        <p class="milieu">Respo jsp</p>
      </div>
        <div class="slide">
          <img src="../images/add.png">
          <h3>Cécile MEYNIEUX</h3>
          <p class="milieu">Respo jsp</p>
        </div>
          <div class="slide">
            <img src="../images/add.png">
            <h3>Elarig RAULT</h3>
            <p class="milieu">Respo jsp</p>
          </div>
            <div class="slide">
              <img src="../images/add.png">
              <h3>Marie MOTTIER</h3>
              <p class="milieu">Respo jsp</p>
            </div>
              <div class="slide">
                <img src="../images/add.png">
                <h3>Paul VIDOR</h3>
                <p class="milieu">Respo jsp</p>
              </div>
                <div class="slide">
                  <img src="../images/add.png">
                  <h3>Robin HENRY</h3>
                  <p class="milieu">Respo jsp</p>
                </div>
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<div class="dots">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
  <span class="dot" onclick="currentSlide(5)"></span>
  <span class="dot" onclick="currentSlide(6)"></span>
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
