const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\views\\main\\index.blade.php';
let content = fs.readFileSync(path, 'utf8');

// Add 'hidden' class to the form sections that are missing it
content = content.replace(
    /id="form-permohonan" class="mb-12 bg-white rounded-2xl shadow-xl shadow-blue-100\/60 ring-1 ring-gray-100 \noverflow-hidden"/g,
    'id="form-permohonan" class="mb-12 bg-white rounded-2xl shadow-xl shadow-blue-100/60 ring-1 ring-gray-100 overflow-hidden hidden"'
);
content = content.replace(
    /id="form-permohonan" class="mb-12 bg-white rounded-2xl shadow-xl shadow-blue-100\/60 ring-1 ring-gray-100 overflow-hidden"/g,
    'id="form-permohonan" class="mb-12 bg-white rounded-2xl shadow-xl shadow-blue-100/60 ring-1 ring-gray-100 overflow-hidden hidden"'
);

content = content.replace(
    /id="form-pengaduan" class="mb-12 bg-white rounded-2xl shadow-xl shadow-blue-100\/60 ring-1 ring-gray-100 \noverflow-hidden"/g,
    'id="form-pengaduan" class="mb-12 bg-white rounded-2xl shadow-xl shadow-blue-100/60 ring-1 ring-gray-100 overflow-hidden hidden"'
);
content = content.replace(
    /id="form-pengaduan" class="mb-12 bg-white rounded-2xl shadow-xl shadow-blue-100\/60 ring-1 ring-gray-100 overflow-hidden"/g,
    'id="form-pengaduan" class="mb-12 bg-white rounded-2xl shadow-xl shadow-blue-100/60 ring-1 ring-gray-100 overflow-hidden hidden"'
);

content = content.replace(
    /id="form-keberatan" class="mb-12 bg-white rounded-2xl shadow-xl shadow-blue-100\/60 ring-1 ring-gray-100 \noverflow-hidden"/g,
    'id="form-keberatan" class="mb-12 bg-white rounded-2xl shadow-xl shadow-blue-100/60 ring-1 ring-gray-100 overflow-hidden hidden"'
);
content = content.replace(
    /id="form-keberatan" class="mb-12 bg-white rounded-2xl shadow-xl shadow-blue-100\/60 ring-1 ring-gray-100 overflow-hidden"/g,
    'id="form-keberatan" class="mb-12 bg-white rounded-2xl shadow-xl shadow-blue-100/60 ring-1 ring-gray-100 overflow-hidden hidden"'
);

fs.writeFileSync(path, content, 'utf8');
console.log('Added hidden class to forms');
