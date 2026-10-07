const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\js\\frontend.js';
let content = fs.readFileSync(path, 'utf8');

// Replace the problematic DOMContentLoaded block
content = content.replace(
    /document\.addEventListener\('DOMContentLoaded', function\(\) \{\s*initializePage\(\);\s*setupScrollNavigation\(\);\s*renderPegawai\(\);\s*\}\);/g,
    `document.addEventListener('DOMContentLoaded', function() {
        if (typeof renderPegawai === 'function') {
            renderPegawai();
        }
    });`
);

fs.writeFileSync(path, content, 'utf8');
console.log('Fixed DOMContentLoaded crash');
