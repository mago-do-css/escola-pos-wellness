(() => {
  const popup = document.querySelector('[data-customer-popup]');
  if (!popup) return;
  const name = popup.querySelector('[data-customer-name]');
  const customers = ['Marcelo', 'Magda dos Santos', 'Paulo Roberto', 'Renata Santana'];
  const counters = [...document.querySelectorAll('[data-test-remaining]')];
  const counter = counters[0];
  const minimum = counter ? Number(counter.dataset.minimum) : 0;
  let remaining = counter ? Number(counter.dataset.initial) : 0;
  let index = 0;
  let intervalId;
  const showCustomer = () => {
    if (counter && remaining <= minimum) return;
    name.textContent = customers[index++ % customers.length];
    popup.hidden = false;
    if (counter) {
      remaining = Math.max(minimum, remaining - 1);
      counters.forEach((item) => { item.textContent = String(remaining); });
      if (remaining <= minimum && intervalId) window.clearInterval(intervalId);
    }
    window.setTimeout(() => { popup.hidden = true; }, 6500);
  };
  window.setTimeout(() => {
    showCustomer();
    if (!counter || remaining > minimum) intervalId = window.setInterval(showCustomer, 30000);
  }, 15000);
})();

(() => {
  const track = document.querySelector('[data-benefit-track]');
  if (!track) return;
  const section = track.closest('.members-benefit-showcase');
  const next = section.querySelector('[data-benefit-next]');
  const previous = section.querySelector('[data-benefit-prev]');
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  let paused = false;
  const move = (direction) => {
    const card = track.querySelector('.members-benefit-card');
    const step = card.getBoundingClientRect().width + parseFloat(getComputedStyle(track).columnGap || '0');
    const end = track.scrollWidth - track.clientWidth;
    const target = direction > 0 && track.scrollLeft >= end - 2 ? 0 : direction < 0 && track.scrollLeft <= 2 ? end : track.scrollLeft + direction * step;
    track.scrollTo({ left: target, behavior: reducedMotion.matches ? 'auto' : 'smooth' });
  };
  previous.addEventListener('click', () => move(-1));
  next.addEventListener('click', () => move(1));
  section.addEventListener('mouseenter', () => { paused = true; });
  section.addEventListener('mouseleave', () => { paused = false; });
  section.addEventListener('focusin', () => { paused = true; });
  section.addEventListener('focusout', (event) => { if (!section.contains(event.relatedTarget)) paused = false; });
  window.setInterval(() => { if (!paused && !reducedMotion.matches && !document.hidden) move(1); }, 6000);
})();

(() => {
  const slider = document.querySelector('[data-story-slider]');
  if (!slider) return;
  const cards = [...slider.querySelectorAll('[data-story-card]')];
  const position = slider.querySelector('[data-story-position]');
  const wide = window.matchMedia('(min-width: 768px)');
  let current = 0;
  const show = (index) => {
    current = (index + cards.length) % cards.length;
    const visible = wide.matches ? 3 : 1;
    cards.forEach((card, i) => {
      const offset = (i - current + cards.length) % cards.length;
      card.hidden = offset >= visible;
      card.style.order = String(offset);
    });
    position.textContent = `${current + 1} / ${cards.length}`;
  };
  show(0);
  wide.addEventListener('change', () => show(current));
  slider.querySelector('[data-story-prev]').addEventListener('click', () => show(current - 1));
  slider.querySelector('[data-story-next]').addEventListener('click', () => show(current + 1));
  if (cards.length > 1 && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    window.setInterval(() => show(current + 1), 8000);
  }
})();
