const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\views\\main\\header.blade.php';
let content = fs.readFileSync(path, 'utf8');

// Replace lg: with md: for responsive breakpoints to match original design
content = content.replace(/lg:hidden/g, 'md:hidden');
content = content.replace(/hidden lg:block/g, 'hidden md:block');
content = content.replace(/hidden lg:flex/g, 'hidden md:flex');

// Replace bg-ink and text-ink with explicit hex values just in case
content = content.replace(/bg-ink/g, 'bg-[#0F2A4A]');
content = content.replace(/text-ink/g, 'text-[#0F2A4A]');

fs.writeFileSync(path, content, 'utf8');
console.log('Fixed header breakpoints and colors');
