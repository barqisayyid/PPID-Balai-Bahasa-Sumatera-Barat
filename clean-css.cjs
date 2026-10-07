const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\views\\main\\app.blade.php';
let content = fs.readFileSync(path, 'utf8');

// Remove .nav-item, .dropdown, and .mobile-menu CSS blocks
content = content.replace(/\.nav-item \{[\s\S]*?\}\s*/g, '');
content = content.replace(/\.dropdown \{[\s\S]*?\}\s*/g, '');
content = content.replace(/\.nav-item:hover \.dropdown \{[\s\S]*?\}\s*/g, '');
content = content.replace(/\.mobile-menu \{[\s\S]*?\}\s*/g, '');
content = content.replace(/\.mobile-menu\.active \{[\s\S]*?\}\s*/g, '');
// And remove the media query that hides desktop nav since we handle it via tailwind hidden lg:block
content = content.replace(/@media \(max-width: 768px\) \{[\s\S]*?\.desktop-nav \{[\s\S]*?\}[\s\S]*?\}/g, '');

fs.writeFileSync(path, content, 'utf8');
console.log('Cleaned up app.blade.php CSS');
