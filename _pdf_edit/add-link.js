const fs = require('fs');

const [input, output, url] = process.argv.slice(2);
const original = fs.readFileSync(input);
const text = original.toString('latin1');
const startXrefMatch = text.match(/startxref\s*(\d+)\s*%%EOF\s*$/);
if (!startXrefMatch) throw new Error('Original PDF startxref was not found.');
const previousXref = Number(startXrefMatch[1]);
const xrefTail = text.slice(previousXref);
const sizeMatch = xrefTail.match(/\/Size\s+(\d+)/);
if (!sizeMatch) throw new Error('Original PDF trailer size was not found.');
const nextObject = Number(sizeMatch[1]);

const annotation = [
  `${nextObject} 0 obj`,
  '<<',
  '/Type /Annot',
  '/Subtype /Link',
  '/Rect [62 315 265 362]',
  '/Border [0 0 0]',
  `/A << /S /URI /URI (${url.replace(/[()\\]/g, '\\$&')}) >>`,
  '>>',
  'endobj',
  ''
].join('\n');

const updatedPage = [
  '23 0 obj',
  '<<',
  '/Type /Page',
  '/Resources << /ProcSet [/PDF /Text /ImageB /ImageC /ImageI] /ExtGState 69 0 R /XObject << /X20 70 0 R >> >>',
  '/MediaBox [0.0 7.8299813 595.5 850.07996]',
  '/Contents 71 0 R',
  '/Tabs /S',
  '/Parent 2 0 R',
  '/BleedBox [0.0 7.8299813 595.5 850.07996]',
  '/TrimBox [0.0 7.8299813 595.5 850.07996]',
  '/CropBox [0.0 7.8299813 595.5 850.07996]',
  '/Rotate 0',
  `/Annots [${nextObject} 0 R]`,
  '/StructParents 13',
  '>>',
  'endobj',
  ''
].join('\n');

const prefix = Buffer.concat([original, Buffer.from('\n', 'latin1')]);
const pageOffset = prefix.length;
const annotationOffset = pageOffset + Buffer.byteLength(updatedPage, 'latin1');
const xrefOffset = annotationOffset + Buffer.byteLength(annotation, 'latin1');
const xref = [
  'xref',
  '23 1',
  `${String(pageOffset).padStart(10, '0')} 00000 n `,
  `${nextObject} 1`,
  `${String(annotationOffset).padStart(10, '0')} 00000 n `,
  'trailer',
  `<< /Size ${nextObject + 1} /Root 1 0 R /Prev ${previousXref} >>`,
  'startxref',
  String(xrefOffset),
  '%%EOF',
  ''
].join('\n');

fs.writeFileSync(output, Buffer.concat([prefix, Buffer.from(updatedPage + annotation + xref, 'latin1')]));
