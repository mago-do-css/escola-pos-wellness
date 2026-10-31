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
const whatsappInput = document.querySelector('[data-whatsapp-input]');

const captureLead = async (form) => {
  const endpoint = form.dataset.captureEndpoint;
  if (!endpoint) throw new Error('Endpoint de captura indisponível.');

  const eventId = `lead_${window.crypto?.randomUUID?.() || `${Date.now()}_${Math.random().toString(16).slice(2)}`}`;
  const formData = new FormData(form);
  formData.set('event_id', eventId);

  const response = await window.fetch(endpoint, {
    method: 'POST',
    credentials: 'same-origin',
    headers: { 'X-Requested-With': 'XMLHttpRequest' },
    body: new URLSearchParams(formData),
  });
  const result = await response.json();
  if (!response.ok || result.status !== 'ok') throw new Error(result.message || 'Não foi possível concluir o envio.');

  if (result.is_new_lead && window.metaTracking?.pixelId) {
    window.fbq?.('track', 'Lead', { content_name: 'Mapa do Dinheiro' }, { eventID: eventId });
  }
};

whatsappInput?.addEventListener('input', () => {
  const digits = whatsappInput.value.replace(/\D/g, '').slice(0, 11);

  if (digits.length <= 2) {
    whatsappInput.value = digits ? `(${digits}` : '';
    return;
  }

  if (digits.length <= 6) {
    whatsappInput.value = `(${digits.slice(0, 2)}) ${digits.slice(2)}`;
    return;
  }

  if (digits.length <= 10) {
    whatsappInput.value = `(${digits.slice(0, 2)}) ${digits.slice(2, 6)}-${digits.slice(6)}`;
    return;
  }

  whatsappInput.value = `(${digits.slice(0, 2)}) ${digits.slice(2, 7)}-${digits.slice(7)}`;
});

captureForm?.addEventListener('submit', async (event) => {
  event.preventDefault();

  if (!captureForm.checkValidity()) {
    captureForm.classList.add('is-invalid');
    captureFeedback.textContent = 'Revise os campos indicados para continuar.';
    captureForm.reportValidity();
    return;
  }

  captureForm.classList.remove('is-invalid');
  captureFeedback.textContent = 'Salvando seus dados…';
  try {
    await captureLead(captureForm);
    captureFeedback.textContent = 'Tudo certo. Preparando seu acesso…';
    window.location.assign(captureForm.dataset.thankYouUrl || '/obrigado-mapa-do-dinheiro');
  } catch (error) {
    captureFeedback.textContent = error instanceof Error ? error.message : 'Não foi possível concluir o envio. Tente novamente.';
  }
});
