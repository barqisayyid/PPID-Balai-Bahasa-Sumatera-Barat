const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\views\\main\\footer.blade.php';
let content = fs.readFileSync(path, 'utf8');

// Remove the WhatsApp Action Button in Bottom Bar
content = content.replace(
    /<!-- WhatsApp Action Button in Bottom Bar \(matches mockup\) -->[\s\S]*?<\/a>/,
    ''
);

// We also need to center the copyright text since it might look weird if the flex justifies between empty space.
// It is currently: flex flex-col md:flex-row justify-between items-center gap-4
// Let's change it to justify-center if it's the only thing there
content = content.replace(
    /flex flex-col md:flex-row justify-between items-center gap-4/,
    'flex flex-col md:flex-row justify-center items-center gap-4'
);


fs.writeFileSync(path, content, 'utf8');
console.log('Removed dark blue WA button from footer bottom bar');
