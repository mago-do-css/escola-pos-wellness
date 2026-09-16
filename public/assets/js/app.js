const header = document.querySelector('[data-header]');
const menuButton = document.querySelector('[data-menu-toggle]');
const mobileMenu = document.querySelector('[data-mobile-menu]');

const closeMenu = () => {
  if (!menuButton || !mobileMenu) return;

  menuButton.setAttribute('aria-expanded', 'false');
  menuButton.setAttribute('aria-label', 'Abrir menu');
  mobileMenu.setAttribute('aria-hidden', 'true');
  document.body.classList.remove('menu-open');
};

menuButton?.addEventListener('click', () => {
  const isOpen = menuButton.getAttribute('aria-expanded') === 'true';

  menuButton.setAttribute('aria-expanded', String(!isOpen));
  menuButton.setAttribute('aria-label', isOpen ? 'Abrir menu' : 'Fechar menu');
  mobileMenu?.setAttribute('aria-hidden', String(isOpen));
  document.body.classList.toggle('menu-open', !isOpen);
});

mobileMenu?.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeMenu));

window.addEventListener('resize', () => {
  if (window.innerWidth >= 1024) closeMenu();
});

window.addEventListener('scroll', () => {
  header?.classList.toggle('is-scrolled', window.scrollY > 24);
}, { passive: true });

const captureForm = document.querySelector('[data-capture-form]');
const captureFeedback = document.querySelector('[data-capture-feedback]');

captureForm?.addEventListener('submit', (event) => {
  event.preventDefault();

  if (!captureForm.checkValidity()) {
    captureForm.classList.add('is-invalid');
    captureFeedback.textContent = 'Revise os campos indicados para continuar.';
    captureForm.reportValidity();
    return;
  }

  captureForm.classList.remove('is-invalid');
  captureFeedback.textContent = 'Tudo certo. Preparando seu acesso…';
  window.location.assign(captureForm.dataset.thankYouUrl || '/obrigado-mapa-do-dinheiro');
});
