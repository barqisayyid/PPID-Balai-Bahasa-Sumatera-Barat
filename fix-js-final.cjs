const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\js\\frontend.js';
let content = fs.readFileSync(path, 'utf8');

// 1. Fix Slider null safety
content = content.replace(
    /sliderTrack\.style\.transform = `translateX\(\-\$\{index \* 100\}%\)`;/g,
    "if (sliderTrack) { sliderTrack.style.transform = `translateX(-${index * 100}%)`; }"
);
content = content.replace(
    /setInterval\(\(\) => \{[\s\S]*?\}, 5000\);/g,
    "if (slides.length > 0) { setInterval(() => { currentSlide = (currentSlide + 1) % slides.length; showSlide(currentSlide); }, 5000); }"
);

// 2. Remove SPA routing logic
// The SPA routing logic starts at "// Navigation functionality with URL routing"
// and ends right before "const observer = new IntersectionObserver("
const spaStart = content.indexOf('// Navigation functionality with URL routing');
const spaEnd = content.indexOf('const observer = new IntersectionObserver(');

if (spaStart !== -1 && spaEnd !== -1) {
    const beforeSPA = content.substring(0, spaStart);
    const afterSPA = content.substring(spaEnd);
    content = beforeSPA + afterSPA;
}

fs.writeFileSync(path, content, 'utf8');
console.log('Fixed JS issues');
