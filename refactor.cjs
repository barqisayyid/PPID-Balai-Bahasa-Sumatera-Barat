const fs = require('fs');

const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\views\\main\\index.blade.php';
let content = fs.readFileSync(path, 'utf8');

// Refactor toggleFunctionDetail
content = content.replace(
    /<div class="(bg-white p-4 rounded-lg border border-green-200 shadow-sm hover:shadow-md transition-all duration-300 cursor-pointer)"\s*onclick="toggleFunctionDetail\('([^']+)'\)">/g,
    '<div x-data="{ open: false }" class="$1" @click="open = !open">'
);
content = content.replace(
    /<div id="(fungsi-[a-i])" class="hidden mt-3 pt-3 border-t border-green-200">/g,
    '<div x-show="open" x-collapse x-cloak class="mt-3 pt-3 border-t border-green-200">'
);

// Refactor toggleInfoDetail
content = content.replace(
    /<div class="([^"]+)"\s*onclick="toggleInfoDetail\('([^']+)'\)">/g,
    '<div x-data="{ open: false }" class="$1" @click="open = !open">'
);
content = content.replace(
    /<div id="(berkala-detail|sertamerta-detail|dikecualikan-detail)" class="hidden mt-4 pt-4 border-t border-[a-z]+-200">/g,
    (match) => match.replace('class="hidden', 'x-show="open" x-collapse x-cloak class="')
);

// Refactor toggleLayananDetail
content = content.replace(
    /<div class="([^"]+)"\s*onclick="toggleLayananDetail\('([^']+)'\)">/g,
    '<div x-data="{ open: false }" class="$1" @click="open = !open">'
);
content = content.replace(
    /<div id="(layanan-[1-5])" class="hidden mt-4 pt-4 border-t border-[a-z]+-200">/g,
    (match) => match.replace('class="hidden', 'x-show="open" x-collapse x-cloak class="')
);

fs.writeFileSync(path, content, 'utf8');
console.log('Refactoring complete.');
