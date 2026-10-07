const fs = require('fs');
const cheerio = require('cheerio');

const html = fs.readFileSync('resources/views/main/index.blade.php', 'utf8');
const $ = cheerio.load(html, { recognizeSelfClosing: true, lowerCaseTags: false });

const sections = [];
$('main > section').each((i, el) => {
    sections.push($(el).attr('id'));
});

console.log("Top-level sections:", sections);
