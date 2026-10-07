const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\js\\frontend.js';
const content = fs.readFileSync(path, 'utf8');

const startIndex = content.indexOf('const pegawaiData = [');
let bracketCount = 0;
let arrayStart = content.indexOf('[', startIndex);
let arrayEnd = -1;

for (let i = arrayStart; i < content.length; i++) {
    if (content[i] === '[') bracketCount++;
    if (content[i] === ']') bracketCount--;
    if (bracketCount === 0) {
        arrayEnd = i;
        break;
    }
}

let arrayString = content.substring(arrayStart, arrayEnd + 1);
arrayString = arrayString.replace(/\{\{\s*url\('([^']+)'\)\s*\}\}/g, "'$1'");

const tempJs = `module.exports = ${arrayString};`;
fs.writeFileSync('temp.cjs', tempJs, 'utf8');

const data = require('./temp.cjs');
const storageDir = 'c:\\laragon\\www\\PPID Balai Bahasa\\storage\\app';
if (!fs.existsSync(storageDir)){
    fs.mkdirSync(storageDir, { recursive: true });
}
fs.writeFileSync(storageDir + '\\pegawai.json', JSON.stringify(data, null, 2), 'utf8');
console.log("Successfully extracted pegawai data");
