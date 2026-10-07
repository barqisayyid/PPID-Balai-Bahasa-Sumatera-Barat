const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\views\\main\\footer.blade.php';
let content = fs.readFileSync(path, 'utf8');

// Replace the previous fix-nav-js with the new one for the single row header
content = content.replace(
    /link\.classList\.remove\('text-amber-400', 'font-bold'\);\s*link\.classList\.add\('text-white\/90'\);/g,
    "link.classList.remove('text-blue-700', 'bg-blue-50');\n            link.classList.add('text-[#0F2A4A]');"
);

content = content.replace(
    /activeLink\.classList\.remove\('text-white\/90'\);\s*activeLink\.classList\.add\('text-amber-400', 'font-bold'\);/g,
    "activeLink.classList.remove('text-[#0F2A4A]');\n            activeLink.classList.add('text-blue-700', 'bg-blue-50');"
);

fs.writeFileSync(path, content, 'utf8');
console.log('Fixed active navigation JS for new single-row layout');
