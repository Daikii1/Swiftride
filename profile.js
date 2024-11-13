// animation.js

document.addEventListener("DOMContentLoaded", function() {
    const animatedImage = document.getElementById('animated-image');
    setTimeout(() => {
        animatedImage.classList.add('show');
    }, 600); // Delay the animation by 500 milliseconds
});

// 
let subMenu = document.getElementById("subMenu")

function toggleMenu(){
    subMenu.classList.toggle('open-menu')
}
// dowloand pdf
window.onload = function() {
    document.getElementById('downloadBtn').addEventListener('click', () => {
        const invoice = document.getElementById("toDownload");
        const opt = {
            margin: 1,
            filename: 'reservation.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
        };
        html2pdf().from(invoice).set(opt).save();
    });
}
