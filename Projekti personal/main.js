document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll(".slide");
    if (slides.length === 0) return; 
    
    let current = 0;
    
    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.display = (i === index ? "block" : "none");
        });
    }
    
    showSlide(current);
    
    setInterval(() => {
        current = (current + 1) % slides.length;
        showSlide(current);
    }, 4000);
});
