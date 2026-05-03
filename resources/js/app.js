import './bootstrap';

// Initialize AOS Animation Library
AOS.init({
    once: true,
    offset: 50,
    duration: 800,
    easing: 'ease-in-out'
});

// DOM Elements
const navbar = document.getElementById('navbar');
const mobileMenuBtn = document.getElementById('mobile-menu-btn');
const mobileMenu = document.getElementById('mobile-menu');
const darkModeBtn = document.getElementById('dark-mode-btn');
const darkModeBtnMobile = document.getElementById('dark-mode-btn-mobile');
const html = document.documentElement;

// Set Default Theme to Dark for Premium Look
if (!html.classList.contains('dark')) {
    html.classList.add('dark');
}

// Navbar Scroll Effect
window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        if(html.classList.contains('dark')) {
            navbar.classList.add('glass', 'shadow-lg');
            navbar.classList.remove('bg-transparent', 'glass-light');
        } else {
            navbar.classList.add('glass-light', 'shadow-md');
            navbar.classList.remove('bg-transparent', 'glass');
        }
    } else {
        navbar.classList.remove('glass', 'glass-light', 'shadow-lg', 'shadow-md');
        navbar.classList.add('bg-transparent');
    }
});

// Mobile Menu Toggle
mobileMenuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
    // Change icon
    const icon = mobileMenuBtn.querySelector('i');
    if (mobileMenu.classList.contains('hidden')) {
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
    } else {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
    }
});

// Close mobile menu when link is clicked
const mobileLinks = mobileMenu.querySelectorAll('a');
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
    
    // Trigger scroll event to update navbar glass effect
    window.dispatchEvent(new Event('scroll'));
}

function updateDarkModeIcons() {
    const isDark = html.classList.contains('dark');
    const iconHtml = isDark 
        ? '<i class="fas fa-sun text-yellow-500"></i>' 
        : '<i class="fas fa-moon text-slate-700"></i>';
        
    darkModeBtn.innerHTML = iconHtml;
    darkModeBtnMobile.innerHTML = iconHtml;
}

// Initialize icons based on default theme
updateDarkModeIcons();

// Event Listeners for Dark Mode
darkModeBtn.addEventListener('click', toggleDarkMode);
darkModeBtnMobile.addEventListener('click', toggleDarkMode);

// --- Project Demo Modal Logic ---

// Project Data for Modal
const projectData = {
    'pengaduan': {
        title: 'Website Pengaduan Sekolah',
        images: [
            'images/pengaduan-dashboard.png',
            'images/pengaduan-login.png',
            'images/pengaduan-create.png'
        ],
        description: 'Sistem manajemen aspirasi dan pengaduan siswa terpadu yang dibangun dengan arsitektur modern. Memungkinkan siswa untuk menyampaikan keluhan secara transparan dan pihak sekolah untuk mengelola laporan dengan efisien melalui dashboard interaktif.',
        tags: ['PHP', 'React', 'Laravel', 'Inertia', 'Tailwind'],
        features: [
            { icon: 'fa-chart-line', title: 'Dashboard Statistik', desc: 'Visualisasi data laporan real-time' },
            { icon: 'fa-shield-alt', title: 'Sistem Autentikasi', desc: 'Login aman untuk Siswa & Admin' },
            { icon: 'fa-file-upload', title: 'Lampiran Bukti', desc: 'Dukungan upload foto bukti laporan' },
            { icon: 'fa-mobile-alt', title: 'Responsif', desc: 'Tampilan optimal di semua perangkat' }
        ],
        source: 'https://github.com/Galihnantion/MuhamadGalihSaputraUKKN.git'
    },
    'kasir': {
        title: 'Website Kasir (Point of Sale)',
        images: [
            'images/kasir-pos.png',
            'images/kasir-laporan.png',
            'images/kasir-struk.png'
        ],
        description: 'Aplikasi kasir (POS) komprehensif yang dirancang untuk mempercepat proses transaksi retail. Dilengkapi dengan sistem manajemen stok yang sinkron secara otomatis, fitur pratinjau struk sebelum cetak, dan laporan penjualan yang mendalam untuk membantu pemilik usaha dalam pengambilan keputusan.',
        tags: ['PHP', 'MySQL', 'JavaScript', 'HTML', 'CSS'],
        features: [
            { icon: 'fa-shopping-cart', title: 'Point of Sale (POS)', desc: 'Antarmuka kasir yang cepat dan responsif.' },
            { icon: 'fa-boxes', title: 'Manajemen Stok', desc: 'Update stok otomatis setiap transaksi.' },
            { icon: 'fa-receipt', title: 'Struk Digital', desc: 'Pratinjau dan cetak struk belanja profesional.' },
            { icon: 'fa-chart-bar', title: 'Laporan Penjualan', desc: 'Rekap transaksi harian & bulanan yang akurat.' }
        ],
        source: 'https://github.com/Galihnantion'
    }
};

// Modal State
let currentProject = null;
let currentImageIndex = 0;

// Modal Elements
const modal = document.getElementById('demo-modal');
const modalTitle = document.getElementById('modal-title');
const modalImage = document.getElementById('modal-image');
const modalDescription = document.getElementById('modal-description');
const modalTags = document.getElementById('modal-tags');
const modalFeatures = document.getElementById('modal-features');
const modalIndicators = document.getElementById('modal-indicators');
const modalSourceBtn = document.getElementById('modal-source-btn');

function openDemoModal(projectId) {
    currentProject = projectData[projectId];
    if (!currentProject) return;

    currentImageIndex = 0;
    updateModalContent();

    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden'; // Prevent scroll
}

function updateModalContent() {
    if (!currentProject) return;

    modalTitle.innerText = currentProject.title;
    modalDescription.innerText = currentProject.description;
    modalSourceBtn.href = currentProject.source;
    
    // Smooth image transition
    modalImage.style.opacity = '0';
    modalImage.style.transform = 'scale(0.98)';
    setTimeout(() => {
        modalImage.src = currentProject.images[currentImageIndex];
        modalImage.style.opacity = '1';
        modalImage.style.transform = 'scale(1)';
    }, 250);

    // Render Tags
    modalTags.innerHTML = '';
    currentProject.tags.forEach(tag => {
        const span = document.createElement('span');
        span.className = 'text-[10px] font-bold px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded-lg border border-slate-200 dark:border-slate-700';
        span.innerText = tag;
        modalTags.appendChild(span);
    });

    // Render Features
    modalFeatures.innerHTML = '';
    currentProject.features.forEach(feature => {
        const item = document.createElement('div');
        item.className = 'flex items-start gap-4 p-4 rounded-xl bg-slate-50 dark:bg-surface/30 border border-slate-100 dark:border-slate-800 hover:border-primary/30 transition-all group/feat';
        item.innerHTML = `
            <div class="w-10 h-10 rounded-lg bg-white dark:bg-dark flex items-center justify-center text-primary shadow-sm group-hover/feat:bg-primary group-hover/feat:text-white transition-all">
                <i class="fas ${feature.icon} text-sm"></i>
            </div>
            <div>
                <p class="text-sm font-bold text-slate-800 dark:text-white mb-0.5">${feature.title}</p>
                <p class="text-[11px] text-slate-500 dark:text-slate-400 leading-tight">${feature.desc}</p>
            </div>
        `;
        modalFeatures.appendChild(item);
    });

    // Render Indicators
    modalIndicators.innerHTML = '';
    if (currentProject.images.length > 1) {
        currentProject.images.forEach((_, index) => {
            const dot = document.createElement('div');
            dot.className = `h-1.5 rounded-full transition-all duration-300 ${index === currentImageIndex ? 'w-8 bg-primary' : 'w-2 bg-white/30 hover:bg-white/50 cursor-pointer'}`;
            dot.onclick = (e) => {
                e.stopPropagation();
                currentImageIndex = index;
                updateModalContent();
            };
            modalIndicators.appendChild(dot);
        });
        document.getElementById('modal-nav').classList.remove('hidden');
    } else {
        document.getElementById('modal-nav').classList.add('hidden');
    }
}

function nextProjectImage(e) {
    if (e) e.stopPropagation();
    if (!currentProject) return;
    currentImageIndex = (currentImageIndex + 1) % currentProject.images.length;
    updateModalContent();
}

function prevProjectImage(e) {
    if (e) e.stopPropagation();
    if (!currentProject) return;
    currentImageIndex = (currentImageIndex - 1 + currentProject.images.length) % currentProject.images.length;
    updateModalContent();
}

function closeDemoModal() {
    modal.classList.add('hidden');
    document.body.style.overflow = ''; // Restore scroll
    currentProject = null;
}

// Global listeners
window.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeDemoModal();
    if (e.key === 'ArrowRight') nextProjectImage();
    if (e.key === 'ArrowLeft') prevProjectImage();
});

window.openDemoModal = openDemoModal;
window.closeDemoModal = closeDemoModal;
window.nextProjectImage = nextProjectImage;
window.prevProjectImage = prevProjectImage;
