const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\views\\main\\footer.blade.php';
let content = fs.readFileSync(path, 'utf8');

// Remove toggleInfoDetail function
content = content.replace(/\/\/ Toggle info detail function for interactive cards[\s\S]*?function toggleInfoDetail[\s\S]*?}\n    }/g, '');

// Remove toggleDetails function
content = content.replace(/function toggleDetails[\s\S]*?}\n    }/g, '');

// Since toggleFunctionDetail and toggleLayananDetail are not in footer.blade.php (they were actually in index.blade.php? No, they were in footer.blade.php but I didn't see them initially. Wait, where are they? Let me check).

fs.writeFileSync(path, content, 'utf8');
console.log('Cleanup complete.');
