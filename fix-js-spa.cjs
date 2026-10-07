const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\js\\frontend.js';
let content = fs.readFileSync(path, 'utf8');

// I will just completely replace everything before the image slider functionality.
// The structure of frontend.js starts with activeNavLogic, then sections array, showSection, etc.
// Let's find "// Image slider functionality" and delete everything before it, then prepend activeNavLogic.

const sliderIndex = content.indexOf('// Image slider functionality');
if (sliderIndex !== -1) {
    const afterSlider = content.substring(sliderIndex);
    
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
    let activeLink = document.querySelector(\`a[href="/\${path === 'beranda' ? '' : path}"]\`) || 
                     document.querySelector(\`a[href="\${window.location.pathname}"]\`);
                     
    if (activeLink && activeLink.classList.contains('nav-link')) {
        activeLink.classList.remove('text-[#0F2A4A]');
        activeLink.classList.add('text-blue-700', 'bg-blue-50');
    }
});
\n`;
    
    fs.writeFileSync(path, activeNavLogic + afterSlider, 'utf8');
    console.log('Successfully stripped out all SPA routing logic');
} else {
    console.log('Could not find Image slider functionality marker');
}
