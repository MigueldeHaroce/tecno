const dots = document.querySelectorAll('.dot');
const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');

let currentIndex = 0;

function updateDots() {
  dots.forEach((dot, index) => {
    dot.classList.toggle('active', index === currentIndex);
  });
}

prevButton.addEventListener('click', () => {
  currentIndex = (currentIndex - 1 + dots.length) % dots.length;
  updateDots();
});

nextButton.addEventListener('click', () => {
  currentIndex = (currentIndex + 1) % dots.length;
  updateDots();
});

updateDots();
