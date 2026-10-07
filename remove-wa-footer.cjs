const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\views\\main\\footer.blade.php';
let content = fs.readFileSync(path, 'utf8');

// Remove the WhatsApp button from footer
content = content.replace(
    /<li class="pt-4">\s*<a href="https:\/\/wa\.me\/\+6285186055030"[\s\S]*?<\/a>\s*<\/li>/,
    ''
);

fs.writeFileSync(path, content, 'utf8');
console.log('Removed WA from footer');
