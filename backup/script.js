// --- AOS Initialization ---
AOS.init({
    once: true,
    offset: 50,
    duration: 800,
    easing: 'ease-in-out'
});

// --- Dark Mode Logic ---
const darkModeBtn = document.getElementById('dark-mode-btn');
const darkModeBtnMobile = document.getElementById('dark-mode-btn-mobile');
const html = document.documentElement;

const toggleDarkMode = () => {
    html.classList.toggle('dark');
    const isDark = html.classList.contains('dark');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
    updateDarkModeIcons(isDark);
};

const updateDarkModeIcons = (isDark) => {
    const icon = isDark ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
    if (darkModeBtn) darkModeBtn.innerHTML = icon;
    if (darkModeBtnMobile) darkModeBtnMobile.innerHTML = icon;
};

if (localStorage.getItem('theme') === 'light') {
    html.classList.remove('dark');
    updateDarkModeIcons(false);
} else {
    html.classList.add('dark');
    updateDarkModeIcons(true);
}

darkModeBtn?.addEventListener('click', toggleDarkMode);
darkModeBtnMobile?.addEventListener('click', toggleDarkMode);

// --- Navbar Scroll Effect ---
window.addEventListener('scroll', () => {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 20) {
        navbar.classList.add('bg-white/80', 'dark:bg-dark/80', 'backdrop-blur-xl', 'py-3', 'shadow-xl');
        navbar.classList.remove('bg-transparent', 'py-5');
    } else {
        navbar.classList.remove('bg-white/80', 'dark:bg-dark/80', 'backdrop-blur-xl', 'py-3', 'shadow-xl');
        navbar.classList.add('bg-transparent', 'py-5');
    }
});

// --- Mobile Menu ---
const mobileMenuBtn = document.getElementById('mobile-menu-btn');
const mobileMenu = document.getElementById('mobile-menu');

mobileMenuBtn?.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
    mobileMenu.classList.toggle('flex');
});

document.querySelectorAll('.mobile-link').forEach(link => {
    link.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
        mobileMenu.classList.remove('flex');
    });
});

// --- Dynamic Glow Card Cursor Tracking ---
const handleMouseMove = (e) => {
    const cards = document.querySelectorAll('.dynamic-glow-card');
    cards.forEach(card => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        card.style.setProperty('--mouse-x', `${x}px`);
        card.style.setProperty('--mouse-y', `${y}px`);
    });
};

document.addEventListener('mousemove', handleMouseMove);

// --- Project Modal Logic ---
const projectData = {
    'pengaduan': {
        title: 'Website Pengaduan Sekolah',
        images: [
            'images/pengaduan-dashboard.png',
            'images/pengaduan-login.png',
            'images/pengaduan-create.png'
        ],
        tags: ['Laravel', 'MySQL', 'Tailwind'],
        description: 'Sistem manajemen pengaduan siswa yang dirancang untuk meningkatkan efisiensi komunikasi antara sekolah dan siswa.',
        features: [
            'Autentikasi Multi-role (Siswa, Petugas, Admin)',
            'Sistem Pengaduan Real-time',
            'Laporan PDF & Export Data',
            'Status Tracking Pengaduan'
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
        tags: ['Java', 'PHP', 'MySQL'],
        description: 'Solusi retail modern untuk manajemen inventaris dan transaksi penjualan yang cepat dan akurat.',
        features: [
            'Point of Sale (POS) Interface',
            'Manajemen Stok Barang Otomatis',
            'Riwayat Penjualan & Laporan',
            'Cetak Struk Transaksi'
        ],
        source: 'https://github.com/Galihnantion'
    }
};

let currentModalProject = null;
let currentImageIndex = 0;

window.openDemoModal = (id) => {
    const data = projectData[id];
    if (!data) return;

    currentModalProject = data;
    currentImageIndex = 0;

    document.getElementById('modal-title').innerText = data.title;
    document.getElementById('modal-description').innerText = data.description;
    document.getElementById('modal-image').src = data.images[0];
    document.getElementById('modal-source-btn').href = data.source;

    // Tags
    const tagsContainer = document.getElementById('modal-tags');
    tagsContainer.innerHTML = data.tags.map(tag => `<span class="px-3 py-1 bg-primary/10 text-primary text-[10px] font-bold uppercase rounded-full">${tag}</span>`).join('');

    // Features
    const featuresContainer = document.getElementById('modal-features');
    featuresContainer.innerHTML = data.features.map(f => `<div class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-400"><i class="fas fa-check-circle text-primary"></i><span>${f}</span></div>`).join('');

    document.getElementById('demo-modal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
};

window.closeDemoModal = () => {
    document.getElementById('demo-modal').classList.add('hidden');
    document.body.style.overflow = 'auto';
};

window.nextProjectImage = () => {
    if (!currentModalProject) return;
    currentImageIndex = (currentImageIndex + 1) % currentModalProject.images.length;
    updateModalImage();
};

window.prevProjectImage = () => {
    if (!currentModalProject) return;
    currentImageIndex = (currentImageIndex - 1 + currentModalProject.images.length) % currentModalProject.images.length;
    updateModalImage();
};

const updateModalImage = () => {
    const img = document.getElementById('modal-image');
    img.style.opacity = '0';
    setTimeout(() => {
        img.src = currentModalProject.images[currentImageIndex];
        img.style.opacity = '1';
    }, 200);
};

// --- WhatsApp Form Handler ---
const waForm = document.getElementById('whatsapp-form');
waForm?.addEventListener('submit', (e) => {
    e.preventDefault();
    const name = document.getElementById('wa-name').value;
    const email = document.getElementById('wa-email').value;
    const message = document.getElementById('wa-message').value;
    
    const waUrl = `https://wa.me/6281234567890?text=Halo Galih, Nama saya ${name} (${email}). %0A%0A${message}`;
    window.open(waUrl, '_blank');
});
