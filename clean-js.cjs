const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\js\\frontend.js';
let content = fs.readFileSync(path, 'utf8');

// Find the start of the pegawai array and related functions, and remove them.
const startPegawai = content.indexOf('// Data Pegawai');
const endPegawai = content.indexOf('// ===== Pengiriman formulir');

if (startPegawai !== -1 && endPegawai !== -1) {
    const before = content.substring(0, startPegawai);
    const after = content.substring(endPegawai);
    fs.writeFileSync(path, before + after, 'utf8');
    console.log('Removed old pegawai JS logic');
} else {
    console.log('Could not find boundaries');
}
