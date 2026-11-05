(function () {
  'use strict';
  const groups = {
    '/': 'formulario',
    '/mapa-do-dinheiro-gratuito': 'formulario',
    '/por-tras-do-dinheiro': 'vendas',
    '/por-tras-do-dinheiro-oferta': 'vendas',
    '/radar-do-dinheiro': 'vendas',
    '/dinheiro-e-fruto': 'vendas',
  };
  const path = window.location.pathname.replace(/\/+$/, '') || '/';
  const storageKey = 'pw_meta_entry_v1';
  let entry = null;
  try {
    const saved = JSON.parse(window.sessionStorage.getItem(storageKey) || 'null');
    if (saved && ((Object.prototype.hasOwnProperty.call(groups, saved.entry_path) && groups[saved.entry_path] === saved.entry_type) || (saved.entry_path === '' && saved.entry_type === 'desconhecida'))) entry = saved;
    if (!entry) {
      entry = Object.prototype.hasOwnProperty.call(groups, path) ? { entry_path: path, entry_type: groups[path] } : { entry_path: '', entry_type: 'desconhecida' };
      window.sessionStorage.setItem(storageKey, JSON.stringify(entry));
    }
  } catch (_) {
    if (Object.prototype.hasOwnProperty.call(groups, path)) entry = { entry_path: path, entry_type: groups[path] };
  }
  window.metaJourney = entry || { entry_path: '', entry_type: 'desconhecida' };
}());
