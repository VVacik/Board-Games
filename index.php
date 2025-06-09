<?php

session_start();
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>planszowki</title>
    <link rel="stylesheet" href="styl2.css" >
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Lato"
    >
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    >
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
    >
  </head>

  <body>
    
      <header>
        <p class="logo">Planszówki</p>
        <input type="checkbox" id="check" >
        <label for="check" id="checkbtn">
          <i class="bx bx-menu"></i>
        </label>
        <ul id="menu">
          <li class="przyci"><a href="index.php">Menu</a></li>
          <li class="przyci"><a href="dodaj.php">Dodaj Gry</a></li>
          <li class="przyci">
            <a href="posiad.php">Wyświetl posiadane</a>
          </li>
          <li class="przyci">
            <a href="pozadane.php">Wyświetl pożądane</a>
          </li>
        </ul>
      </header>
      
    
      <main>
        
        <article class="container">
          <h1>Organizer Gier Planszowych</h1>
          <div class="slider">
            <button
              id="prev-slide"
              class="slide-button material-symbols-outlined"
            >
              chevron_left
            </button>
            <div class="image">
              <img src="galeria/img1.jpg" alt="im1" class="item" >
              <img src="galeria/img2.jpg" alt="im1" class="item" >
              <img src="galeria/img3.jpg" alt="im1" class="item" >
              <img src="galeria/img4.jpg" alt="im1" class="item" >
              <img src="galeria/img5.jpg" alt="im1" class="item" >
              <img src="galeria/img6.jpg" alt="im1" class="item" >
              <img src="zdjecia/talisman.jpg" alt="im1" class="item" >
              <img src="zdjecia/zaklinacze_cienia.jpg" alt="im1" class="item" >
              <img src="zdjecia/zaginiona_wyspa_arnak.jpg" alt="im1" class="item" >
              <img src="zdjecia/nemesis.jpg" alt="im1" class="item" >
              
            </div>
            <button
              id="next-slide"
              class="slide-button material-symbols-outlined"
            >
              chevron_right
            </button>
          </div>
          <div class="scroll">
            <div class="scrollbartrack">
              <div class="scrollthing"></div>
            </div>
          </div>
        </article>
        
      </main>
  

    <footer>
            <p>Placeholder</p>
        </footer>





        <script>


    const initSlider = () => {
    const imageList = document.querySelector(".slider .image");
    const slideButtons = document.querySelectorAll(".slider .slide-button");
    const sliderScrollbar = document.querySelector(".container .scroll");
    const scrollbarThumb = sliderScrollbar.querySelector(".scrollthing");
    const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;
    
    
    scrollbarThumb.addEventListener("mousedown", (e) => {
        const startX = e.clientX;
        const thumbPosition = scrollbarThumb.offsetLeft;
        const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;
        
        
        const handleMouseMove = (e) => {
            const deltaX = e.clientX - startX;
            const newThumbPosition = thumbPosition + deltaX;
            
            const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
            const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;
            
            scrollbarThumb.style.left = `${boundedPosition}px`;
            imageList.scrollLeft = scrollPosition;
        }
        
        const handleMouseUp = () => {
            document.removeEventListener("mousemove", handleMouseMove);
            document.removeEventListener("mouseup", handleMouseUp);
        }
        
        document.addEventListener("mousemove", handleMouseMove);
        document.addEventListener("mouseup", handleMouseUp);
    });
    
    slideButtons.forEach(button => {
        button.addEventListener("click", () => {
            const direction = button.id === "prev-slide" ? -1 : 1;
            const scrollAmount = imageList.clientWidth * direction;
            imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
        });
    });
     
    const handleSlideButtons = () => {
        slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
        slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
    }
    
    const updateScrollThumbPosition = () => {
        const scrollPosition = imageList.scrollLeft;
        const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
        scrollbarThumb.style.left = `${thumbPosition}px`;
    }
    
    imageList.addEventListener("scroll", () => {
        updateScrollThumbPosition();
        handleSlideButtons();
    });
}
window.addEventListener("resize", initSlider);
window.addEventListener("load", initSlider);
  </script>
  </body>

  
</html>
