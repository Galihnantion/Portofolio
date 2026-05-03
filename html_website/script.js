// Initialize AOS Animation
AOS.init({
    once: true,
    offset: 30,
    duration: 800,
    easing: 'ease-out-cubic'
});

// DOM Elements
const navbar = document.getElementById('navbar');
const mobileMenuBtn = document.getElementById('mobile-menu-btn');
const mobileMenu = document.getElementById('mobile-menu');
const darkModeBtn = document.getElementById('dark-mode-btn');
const darkModeBtnMobile = document.getElementById('dark-mode-btn-mobile');
const html = document.documentElement;

// Set initial theme icons based on HTML class
updateDarkModeIcons();

// Navbar Scroll Effect
window.addEventListener('scroll', () => {
    if (window.scrollY > 20) {
        navbar.classList.add('glass', 'py-4');
        navbar.classList.remove('bg-transparent', 'py-5');
    } else {
        navbar.classList.remove('glass', 'py-4');
        navbar.classList.add('bg-transparent', 'py-5');
    }
});

// Mobile Menu Toggle
mobileMenuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
    const icon = mobileMenuBtn.querySelector('i');
    if (mobileMenu.classList.contains('hidden')) {
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
    } else {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
    }
});

// Close mobile menu on link click
const mobileLinks = mobileMenu.querySelectorAll('.mobile-link');
mobileLinks.forEach(link => {
    link.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
        const icon = mobileMenuBtn.querySelector('i');
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
    });
});

// Dark Mode Toggle Logic
function toggleDarkMode() {
    html.classList.toggle('dark');
    updateDarkModeIcons();
}

function updateDarkModeIcons() {
    const isDark = html.classList.contains('dark');
    const iconHtml = isDark 
        ? '<i class="fas fa-sun text-yellow-500"></i>' 
        : '<i class="fas fa-moon"></i>';
        
    if (darkModeBtn) darkModeBtn.innerHTML = iconHtml;
    if (darkModeBtnMobile) darkModeBtnMobile.innerHTML = iconHtml;
}

// Event Listeners for Dark Mode
if (darkModeBtn) darkModeBtn.addEventListener('click', toggleDarkMode);
if (darkModeBtnMobile) darkModeBtnMobile.addEventListener('click', toggleDarkMode);
