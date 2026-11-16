(() => {
  const area = document.querySelector('[data-demo-counter]');
  if (!area) return;
  const count = area.querySelector('[data-demo-count]');
  const notice = area.querySelector('[data-demo-notice]');
  const planCount = document.querySelector('[data-demo-plan-count]');
  const samples = ['Ana (nome fictício)', 'João (nome fictício)', 'Marina (nome fictício)'];
  let remaining = 5;
  let index = 0;
  window.setInterval(() => {
    if (remaining > 2) remaining -= 1;
    count.textContent = String(remaining);
    if (planCount) planCount.textContent = String(remaining);
    notice.textContent = `Simulação: ${samples[index++ % samples.length]} garantiu acesso.`;
  }, 8000);
})();
