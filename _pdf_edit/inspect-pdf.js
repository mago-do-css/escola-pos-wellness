const fs = require('fs');

const input = process.argv[2];
const data = fs.readFileSync(input);
const text = data.toString('latin1');
const startXref = Number(text.match(/startxref\s*(\d+)\s*%%EOF\s*$/)[1]);
const xrefText = text.slice(startXref);
const offsets = new Map();
let cursor = xrefText.indexOf('xref') + 4;
while (true) {
  const remainder = xrefText.slice(cursor).replace(/^\s+/, '');
  cursor = xrefText.length - remainder.length;
  if (remainder.startsWith('trailer')) break;
  const header = remainder.match(/^(\d+)\s+(\d+)\s*\r?\n/);
  if (!header) throw new Error(`Unable to parse xref at ${cursor}`);
  cursor += header[0].length;
  const first = Number(header[1]);
  const count = Number(header[2]);
  for (let i = 0; i < count; i++) {
    const entry = xrefText.slice(cursor, cursor + 20);
    if (entry[17] === 'n') offsets.set(first + i, Number(entry.slice(0, 10)));
    cursor += entry.length;
  }
}

function objectBody(number) {
  const at = offsets.get(number);
  const chunk = text.slice(at, text.indexOf('endobj', at));
  return chunk.replace(/^\d+\s+\d+\s+obj\s*/, '');
}
function refs(value) {
  return [...value.matchAll(/(\d+)\s+\d+\s+R/g)].map(match => Number(match[1]));
}
const root = Number(text.slice(startXref).match(/\/Root\s+(\d+)\s+\d+\s+R/)[1]);
const rootBody = objectBody(root);
const pagesRoot = Number(rootBody.match(/\/Pages\s+(\d+)\s+\d+\s+R/)[1]);
const pages = [];
function visit(number) {
  const body = objectBody(number);
  if (/\/Type\s*\/Page\b/.test(body)) { pages.push({ number, body }); return; }
  const kidsMatch = body.match(/\/Kids\s*\[([\s\S]*?)\]/);
  if (!kidsMatch) throw new Error(`No Kids array in page tree node ${number}`);
  refs(kidsMatch[1]).forEach(visit);
}
visit(pagesRoot);
const last = pages.at(-1);
console.log(JSON.stringify({ pages: pages.length, lastPageObject: last.number, lastPageBody: last.body }, null, 2));
