const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\js\\frontend.js';
let content = fs.readFileSync(path, 'utf8');

// Find the start of the rogue observer block: const observerOptions = {
// and delete up to the toggleInfoDetail function.

const startObserver = content.indexOf('const observerOptions =');
const startObserver2 = content.indexOf('const observer =');
const endObserver = content.indexOf('// Toggle info detail function');

let minStart = Math.min(
    startObserver !== -1 ? startObserver : Infinity,
    startObserver2 !== -1 ? startObserver2 : Infinity
);

if (minStart !== Infinity && endObserver !== -1) {
    content = content.substring(0, minStart) + content.substring(endObserver);
}

fs.writeFileSync(path, content, 'utf8');
console.log('Fixed observer syntax error');
