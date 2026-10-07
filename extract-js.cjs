const fs = require('fs');
const pathFooter = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\views\\main\\footer.blade.php';
const pathJs = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\js\\frontend.js';

let footerContent = fs.readFileSync(pathFooter, 'utf8');

// Extract everything between <script> and </script>
const scriptMatch = footerContent.match(/<script>([\s\S]*?)<\/script>/);

if (scriptMatch) {
    const jsContent = scriptMatch[1];
    fs.writeFileSync(pathJs, jsContent, 'utf8');
    
    // Remove the script tag from footer
    footerContent = footerContent.replace(/<script>[\s\S]*?<\/script>/, '<!-- JavaScript has been moved to resources/js/frontend.js and is compiled via Vite -->');
    fs.writeFileSync(pathFooter, footerContent, 'utf8');
    
    console.log('Successfully extracted JS to frontend.js');
} else {
    console.log('Could not find script tag in footer');
}
