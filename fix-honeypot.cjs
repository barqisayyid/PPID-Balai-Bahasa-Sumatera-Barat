const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\views\\main\\index.blade.php';
let content = fs.readFileSync(path, 'utf8');

// Replace all honeypot inputs to be fully hidden from screen readers and autofill
content = content.replace(/<input type="text"\s*\n\s*id="_confirm_email/g, '<input type="text" tabindex="-1" autocomplete="off"\n           id="_confirm_email');

fs.writeFileSync(path, content, 'utf8');
console.log('Honeypot accessibility fixed.');
