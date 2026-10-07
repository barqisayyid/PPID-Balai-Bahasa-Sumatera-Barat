const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\views\\main\\header.blade.php';
let content = fs.readFileSync(path, 'utf8');

// Fix the desktop nav chevron
content = content.replace(
    /class="w-3\.5 h-3\.5 ml-1 opacity-60/g,
    'class="w-4 h-4 flex-shrink-0 ml-1 opacity-60'
);

// Fix the mobile nav chevron just in case
content = content.replace(
    /class="w-5 h-5 text-gray-400/g,
    'class="w-5 h-5 flex-shrink-0 text-gray-400'
);

// We should also make sure the text isn't awkwardly split into two lines if we don't want it to.
// text-center or whitespace-nowrap can help. Let's add text-center so if it wraps, it looks balanced.
content = content.replace(
    /class="nav-link flex items-center px-3 py-2/g,
    'class="nav-link flex items-center text-center px-3 py-2'
);

fs.writeFileSync(path, content, 'utf8');
console.log('Fixed SVG sizes');
