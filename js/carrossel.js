const carouselContainer = document.querySelector('.carousel-container');
const carouselSlides = Array.from(document.querySelectorAll('.carousel-slide'));
const prevButton = document.querySelector('.carousel-prev');
const nextButton = document.querySelector('.carousel-next');

let currentIndex = 0;
let timer;

// Exiba o slide atual
function showSlide(index) {
  carouselSlides.forEach(slide => {
    slide.classList.remove('active');
  });
  
  carouselSlides[index].classList.add('active');
}

// Avance para o próximo slide
function nextSlide() {
  currentIndex++;
  
  if (currentIndex === carouselSlides.length) {
    currentIndex = 0;
  }
  
  showSlide(currentIndex);
}

// Volte para o slide anterior
function prevSlide() {
  currentIndex--;
  
  if (currentIndex < 0) {
    currentIndex = carouselSlides.length - 1;
  }
  
  showSlide(currentIndex);
}

// Iniciar o carrossel automático
function startCarousel() {
  timer = setInterval(nextSlide, 4000); // Altere o intervalo conforme necessário (em milissegundos)
}

// Parar o carrossel automático
function stopCarousel() {
  clearInterval(timer);
}

prevButton.addEventListener('click', () => {
  prevSlide();
  stopCarousel();
});

nextButton.addEventListener('click', () => {
  nextSlide();
  stopCarousel();
});

carouselContainer.addEventListener('mouseover', stopCarousel);
carouselContainer.addEventListener('mouseout', startCarousel);

// Exiba o primeiro slide
showSlide(currentIndex);

// Inicie o carrossel automático
startCarousel();
