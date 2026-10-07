const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\js\\frontend.js';
let content = fs.readFileSync(path, 'utf8');
content = content.replace(/\\n/g, '\n');
fs.writeFileSync(path, content, 'utf8');
console.log('Fixed syntax error in frontend.js');
