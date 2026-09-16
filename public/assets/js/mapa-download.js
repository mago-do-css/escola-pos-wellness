(() => {
  const page = document.querySelector('[data-download-page]');

  if (!page) return;

  const downloadUrl = page.dataset.downloadUrl;
  const downloadFilename = page.dataset.downloadFilename || 'mapa-do-dinheiro.pdf';
  const initialCountdown = Number(page.dataset.countdown || 3);
  const status = page.querySelector('[data-download-status]');
  const countdown = page.querySelector('[data-download-countdown]');
  const fallback = page.querySelector('[data-download-fallback]');
  const fallbackMessage = page.querySelector('[data-download-fallback-message]');
  let hasStarted = false;

  const showFallback = (message) => {
    if (message && fallbackMessage) fallbackMessage.textContent = message;
    fallback?.removeAttribute('hidden');
  };

  const startDownload = () => {
    if (hasStarted) return;

    hasStarted = true;
    if (status) status.textContent = 'Iniciando o download…';

    const link = document.createElement('a');
    link.href = downloadUrl;
    link.download = downloadFilename;
    link.hidden = true;
    document.body.append(link);
    link.click();
    link.remove();

    // Browsers do not expose a reliable signal confirming a completed download.
    // Keep a manual option visible shortly after the automatic attempt.
    window.setTimeout(() => {
      if (status) status.textContent = 'O download foi solicitado.';
      showFallback('Se o download não começou, use o botão abaixo.');
    }, 3500);
  };

  const startCountdown = () => {
    if (!navigator.onLine) {
      if (status) status.textContent = 'Você está sem conexão no momento.';
      if (countdown) countdown.textContent = '—';
      showFallback('Quando a conexão voltar, use o botão para baixar o mapa.');
      return;
    }

    let remaining = initialCountdown;
    if (countdown) countdown.textContent = String(remaining);

    const interval = window.setInterval(() => {
      remaining -= 1;

      if (remaining > 0) {
        if (countdown) countdown.textContent = String(remaining);
        return;
      }

      window.clearInterval(interval);
      if (countdown) countdown.textContent = '✓';
      startDownload();
    }, 1000);
  };

  startCountdown();

  window.addEventListener('online', () => {
    if (!hasStarted && !fallback?.hasAttribute('hidden')) startCountdown();
  }, { once: true });
})();
