(() => {
  const dialog = document.querySelector('[data-lesson-dialog]');
  if (!dialog || typeof dialog.showModal !== 'function') return;
  let opener = null;
  document.querySelectorAll('[data-open-lesson-form]').forEach((button) => {
    button.addEventListener('click', () => {
      opener = button;
      if (!dialog.open) dialog.showModal();
    });
  });
  dialog.querySelector('[data-close-lesson-form]')?.addEventListener('click', () => dialog.close());
  dialog.addEventListener('click', (event) => { if (event.target === dialog) dialog.close(); });
  dialog.addEventListener('close', () => { opener?.focus(); });
})();

