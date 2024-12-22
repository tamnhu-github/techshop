 <div class="row mb footer">
     Copyright © 2024 TechShop
 </div>

 <!-- slideshow-->
 <script>
let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides"); ===
    ===
    = <
    footer class = "bg-dark text-white py-4 mt-5" >
        <
        div class = "container text-center" >
        <
        p class = "mb-0" > Copyright© 2024 TechShop < /p> < /
    div > <
        /footer>

        <
        script src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js" >
 </script>
 <script>
let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++; <<
    <<
    <<
    <
    HEAD
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
 </script>

 if (slideIndex > slides.length) {
 slideIndex = 1
 }
 for (i = 0; i < dots.length; i++) { dots[i].className=dots[i].className.replace(" active", "" ); } slides[slideIndex -
     1].style.display="block" ; dots[slideIndex - 1].className +=" active" ; setTimeout(showSlides, 2000); // Change
     image every 2 seconds } </script>
     </body>

     </html>