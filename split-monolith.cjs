const fs = require('fs');
const cheerio = require('cheerio');
const path = require('path');

const basePath = 'c:\\laragon\\www\\PPID Balai Bahasa';
const indexHtml = fs.readFileSync(path.join(basePath, 'resources/views/main/index.blade.php'), 'utf8');

// 1. Parse index.blade.php
const $ = cheerio.load(indexHtml, { recognizeSelfClosing: true, lowerCaseTags: false }, false);

// 2. Ensure pages directory exists
const pagesDir = path.join(basePath, 'resources/views/pages');
if (!fs.existsSync(pagesDir)) {
    fs.mkdirSync(pagesDir, { recursive: true });
}

// 3. Extract sections and create blade files
const sections = [];
$('main > section').each((i, el) => {
    const id = $(el).attr('id');
    if (!id) return;
    
    sections.push(id);
    
    // Remove hidden class
    $(el).removeClass('hidden');
    
    // Get HTML content
    const content = $.html(el);
    
    // Create blade file
    const bladeContent = `@extends('main.app')\n\n@section('content')\n${content}\n@endsection\n`;
    fs.writeFileSync(path.join(pagesDir, `${id}.blade.php`), bladeContent, 'utf8');
});

console.log(`Created ${sections.length} blade pages.`);

// 4. Update app.blade.php
let appBlade = fs.readFileSync(path.join(basePath, 'resources/views/main/app.blade.php'), 'utf8');
appBlade = appBlade.replace(/@include\('main\.index'\)/, `<main class="container mx-auto px-4 xl:px-8 py-8 min-h-screen">\n        @yield('content')\n    </main>`);
fs.writeFileSync(path.join(basePath, 'resources/views/main/app.blade.php'), appBlade, 'utf8');
console.log('Updated app.blade.php layout');

// 5. Update web.php routes
let routes = `<?php\n\nuse Illuminate\\Support\\Facades\\Route;\n\n`;
routes += `Route::get('/', function () { return view('pages.beranda'); });\n`;
sections.forEach(id => {
    if (id !== 'beranda') {
        routes += `Route::get('/${id}', function () { return view('pages.${id}'); });\n`;
    }
});
fs.writeFileSync(path.join(basePath, 'routes/web.php'), routes, 'utf8');
console.log('Updated routes/web.php');

// 6. Update header.blade.php menus
let headerBlade = fs.readFileSync(path.join(basePath, 'resources/views/main/header.blade.php'), 'utf8');
headerBlade = headerBlade.replace(/'url' => '#beranda'/g, `'url' => '/'`);
headerBlade = headerBlade.replace(/'url' => '#([^']+)'/g, `'url' => '/$1'`);
fs.writeFileSync(path.join(basePath, 'resources/views/main/header.blade.php'), headerBlade, 'utf8');
console.log('Updated header URLs');

// 7. Update frontend.js to handle pathname-based active state instead of hash, and remove SPA routing
let jsContent = fs.readFileSync(path.join(basePath, 'resources/js/frontend.js'), 'utf8');

// Remove showSection and hash routing logic completely, but keep active nav logic
const activeNavLogic = `
document.addEventListener('DOMContentLoaded', function() {
    // Determine active section from URL
    const path = window.location.pathname.replace(/^\\//, '') || 'beranda';
    
    // Remove active class from all nav links
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('text-blue-700', 'bg-blue-50');
        link.classList.add('text-[#0F2A4A]');
    });

    // Add active class to current section link
    const activeLink = document.querySelector(\`a[href="/\${path === 'beranda' ? '' : path}"]\`) || 
                       document.querySelector(\`a[href="\${window.location.pathname}"]\`);
                       
    if (activeLink && activeLink.classList.contains('nav-link')) {
        activeLink.classList.remove('text-[#0F2A4A]');
        activeLink.classList.add('text-blue-700', 'bg-blue-50');
    }
});
`;

// Replace the entire top section of frontend.js (which had the SPA logic) up to the toggleInfoDetail function
// Actually it's safer to just prepend the active nav logic and comment out window.addEventListener('hashchange')
jsContent = jsContent.replace(/window\.addEventListener\('hashchange', function\(\) {[\s\S]*?}\);/g, '');
jsContent = jsContent.replace(/function initializePage\(\) {[\s\S]*?}\n\n\s*initializePage\(\);/g, '');
jsContent = jsContent.replace(/function updateActiveNavigation\([\s\S]*?\}\n\n/g, '');

jsContent = activeNavLogic + "\\n" + jsContent;

fs.writeFileSync(path.join(basePath, 'resources/js/frontend.js'), jsContent, 'utf8');
console.log('Updated frontend.js');

// 8. Delete index.blade.php (optional, but good for cleanup)
// fs.unlinkSync(path.join(basePath, 'resources/views/main/index.blade.php'));
console.log('Done! Run npm run build.');
