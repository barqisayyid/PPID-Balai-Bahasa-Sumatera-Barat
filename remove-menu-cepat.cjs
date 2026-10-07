const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\views\\main\\footer.blade.php';
let content = fs.readFileSync(path, 'utf8');

// Replace lg:grid-cols-4 with lg:grid-cols-3
content = content.replace(/lg:grid-cols-4/g, 'lg:grid-cols-3');

// Remove Column 2
content = content.replace(
    /<!-- Column 2: Tautan Cepat -->[\s\S]*?<!-- Column 3: Informasi Kontak -->/,
    '<!-- Column 3: Informasi Kontak -->'
);

fs.writeFileSync(path, content, 'utf8');
console.log('Removed Menu Cepat and updated grid');
