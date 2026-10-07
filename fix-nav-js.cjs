const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\views\\main\\footer.blade.php';
let content = fs.readFileSync(path, 'utf8');

content = content.replace(
    /link\.classList\.remove\('text-blue-600', 'font-bold'\);\s*link\.classList\.add\('text-gray-700'\);/g,
    "link.classList.remove('text-amber-400', 'font-bold');\n            link.classList.add('text-white/90');"
);

content = content.replace(
    /activeLink\.classList\.remove\('text-gray-700'\);\s*activeLink\.classList\.add\('text-blue-600', 'font-bold'\);/g,
    "activeLink.classList.remove('text-white/90');\n            activeLink.classList.add('text-amber-400', 'font-bold');"
);

fs.writeFileSync(path, content, 'utf8');
console.log('Fixed active navigation JS');
