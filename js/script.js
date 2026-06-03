// ================================
//  script.js — SuperEmpleo
// ================================
 
// 1. MARCAR EL LINK ACTIVO EN LA NAV
// Detecta en qué página estás y resalta el link correspondiente
const links = document.querySelectorAll('.nav-links a');
const paginaActual = window.location.pathname.split('/').pop();
 
links.forEach(link => {
  const href = link.getAttribute('href');
  if (href === paginaActual || (paginaActual === '' && href === 'index.html')) {
    link.style.color = '#EF9F27'; // naranja = activo
  }
});
 
// 2. ANIMACIÓN AL HACER SCROLL
// Las cards aparecen suavemente cuando entran en pantalla
const cards = document.querySelectorAll('.card');
 
const observador = new IntersectionObserver((entradas) => {
  entradas.forEach(entrada => {
    if (entrada.isIntersecting) {
      entrada.target.style.opacity = '1';
      entrada.target.style.transform = 'translateY(0)';
    }
  });
}, { threshold: 0.1 });
 
cards.forEach(card => {
  card.style.opacity = '0';
  card.style.transform = 'translateY(20px)';
  card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
  observador.observe(card);
});
 
// 3. MENSAJE EN CONSOLA
console.log('✅ SuperEmpleo cargado correctamente');
 