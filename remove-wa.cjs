const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\views\\main\\header.blade.php';
let content = fs.readFileSync(path, 'utf8');

// Remove the WhatsApp button from header
content = content.replace(
    /<!-- WhatsApp Button[\s\S]*?<\/a>/,
    '<!-- WhatsApp button moved to footer -->'
);

fs.writeFileSync(path, content, 'utf8');
console.log('Removed WhatsApp button from header');
