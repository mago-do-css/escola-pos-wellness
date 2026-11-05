const assert = require('node:assert/strict');
const fs = require('node:fs');
const vm = require('node:vm');
const script = fs.readFileSync('public/assets/js/meta-journey.js', 'utf8');
function visit(path, storage) {
  const window = { location: { pathname: path }, sessionStorage: storage };
  vm.runInNewContext(script, { window });
  return JSON.parse(JSON.stringify(window.metaJourney));
}
function session() {
  const values = new Map();
  return { getItem: key => values.get(key) ?? null, setItem: (key, value) => values.set(key, value) };
}
const formSession = session();
assert.deepEqual(visit('/mapa-do-dinheiro-gratuito', formSession), { entry_path: '/mapa-do-dinheiro-gratuito', entry_type: 'formulario' });
assert.deepEqual(visit('/obrigado-mapa-do-dinheiro-gratuito', formSession), { entry_path: '/mapa-do-dinheiro-gratuito', entry_type: 'formulario' });
assert.deepEqual(visit('/por-tras-do-dinheiro-oferta', formSession), { entry_path: '/mapa-do-dinheiro-gratuito', entry_type: 'formulario' });
const salesSession = session();
assert.deepEqual(visit('/por-tras-do-dinheiro-oferta', salesSession), { entry_path: '/por-tras-do-dinheiro-oferta', entry_type: 'vendas' });
assert.deepEqual(visit('/obrigado-por-tras-do-dinheiro', salesSession), { entry_path: '/por-tras-do-dinheiro-oferta', entry_type: 'vendas' });
const otherSession = session();
assert.equal(visit('/baixar-mapa-do-dinheiro', otherSession).entry_type, 'desconhecida');
assert.equal(visit('/por-tras-do-dinheiro-oferta', otherSession).entry_type, 'desconhecida');
console.log('Origens de formulário, venda e origem desconhecida verificadas.');
