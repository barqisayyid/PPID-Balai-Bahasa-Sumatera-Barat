const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\storage\\app\\pegawai.json';
let content = fs.readFileSync(path, 'utf8');

let data = JSON.parse(content);
data = data.map(p => {
    if (p.foto && p.foto.startsWith("'") && p.foto.endsWith("'")) {
        // Strip leading and trailing single quotes
        // We also prepend '/' so it works correctly from any route (e.g. /profil-pegawai)
        p.foto = '/' + p.foto.slice(1, -1);
    } else if (p.foto && !p.foto.startsWith('/')) {
        p.foto = '/' + p.foto;
    }
    return p;
});

fs.writeFileSync(path, JSON.stringify(data, null, 2), 'utf8');
console.log('Fixed foto URLs in JSON');
