<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | Pengembang Frontend</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        primary: '#4F46E5', // Indigo 600
                        secondary: '#0EA5E9', // Sky 500
                        accent: '#F43F5E', // Rose 500
                        dark: '#0F172A', // Slate 900
                        darker: '#020617', // Slate 950
                        surface: '#1E293B', // Slate 800
                        light: '#F8FAFC', // Slate 50
                    },
                    animation: {
                        blob: "blob 7s infinite",
                        float: "float 6s ease-in-out infinite",
                    },
                    keyframes: {
                        blob: {
                            "0%": { transform: "translate(0px, 0px) scale(1)" },
                            "33%": { transform: "translate(30px, -50px) scale(1.1)" },
                            "66%": { transform: "translate(-20px, 20px) scale(0.9)" },
                            "100%": { transform: "translate(0px, 0px) scale(1)" }
                        },
                        float: {
                            "0%, 100%": { transform: "translateY(0)" },
                            "50%": { transform: "translateY(-15px)" }
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Custom CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .neon-primary {
            text-shadow: 0 0 5px #fff, 0 0 10px #4F46E5, 0 0 20px #4F46E5, 0 0 40px #4F46E5;
        }
        .neon-secondary {
            text-shadow: 0 0 5px #fff, 0 0 10px #0EA5E9, 0 0 20px #0EA5E9, 0 0 40px #0EA5E9;
        }
        .neon-accent {
            text-shadow: 0 0 5px #fff, 0 0 10px #F43F5E, 0 0 20px #F43F5E, 0 0 40px #F43F5E;
        }
        .animate-glow {
            animation: neon-pulse 3s ease-in-out infinite alternate;
        }
        @keyframes neon-pulse {
            from { opacity: 0.5; transform: scale(1); }
            to { opacity: 1; transform: scale(1.1); }
        }
        
        /* Dynamic Spotlight Effect */
        .dynamic-glow-card {
            position: relative;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            transform-style: preserve-3d;
        }
        .dynamic-glow-card::after {
            content: "";
            position: absolute;
            inset: -1px;
            background: radial-gradient(600px circle at var(--mouse-x) var(--mouse-y), rgba(79, 70, 229, 0.4), transparent 40%);
            z-index: -1;
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.5s;
        }
        .dynamic-glow-card:hover::after {
            opacity: 1;
        }
        .dark .dynamic-glow-card::after {
            background: radial-gradient(600px circle at var(--mouse-x) var(--mouse-y), rgba(129, 140, 248, 0.3), transparent 40%);
        }

        /* Neon Badge & Line */
        .neon-glow-badge {
            box-shadow: 0 0 10px currentColor;
            animation: badge-pulse 2s infinite alternate;
        }
        @keyframes badge-pulse {
            from { filter: brightness(1) drop-shadow(0 0 2px currentColor); }
            to { filter: brightness(1.5) drop-shadow(0 0 8px currentColor); }
        }
        .neon-line-effect {
            position: relative;
            overflow: hidden;
        }
        .neon-line-effect::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, currentColor, transparent);
            transform: translateX(-100%);
            transition: transform 0.6s;
        }
        .group:hover .neon-line-effect::after {
            transform: translateX(100%);
        }
    </style>
</head>
<body class="bg-light text-slate-700 dark:bg-darker dark:text-slate-300 transition-colors duration-300 font-sans antialiased overflow-x-hidden selection:bg-primary selection:text-white">

    <!-- 1. Navbar Section -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-transparent py-5">
        <div class="container mx-auto px-6 md:px-12 flex justify-between items-center">
            
            <!-- Logo -->
            <a href="#home" class="font-heading text-2xl font-bold tracking-tight text-slate-900 dark:text-white flex items-center gap-1">
                <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-primary to-secondary text-white flex items-center justify-center text-lg shadow-lg shadow-primary/30">G</span>
                <span>Galih<span class="text-primary">Sptr</span></span>
            </a>
            
            <!-- Desktop Menu -->
            <div class="hidden lg:flex space-x-4 xl:space-x-8 items-center font-medium text-sm">
                <a href="#home" class="text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary transition-colors">Beranda</a>
                <a href="#about" class="text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary transition-colors">Tentang</a>
                <a href="#education" class="text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary transition-colors">Pendidikan</a>
                <a href="#experience" class="text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary transition-colors">Pengalaman</a>
                <a href="#skills" class="text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary transition-colors">Keahlian</a>
                <a href="#projects" class="text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary transition-colors">Proyek</a>
                <a href="#certificates" class="text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary transition-colors">Sertifikat</a>
                <a href="#contact" class="px-5 py-2.5 rounded-full bg-slate-900 text-white dark:bg-white dark:text-slate-900 hover:scale-105 transition-transform shadow-md">Hubungi Saya</a>
                
                <!-- Dark Mode Toggle Desktop -->
                <button id="dark-mode-btn" class="text-xl focus:outline-none text-slate-600 dark:text-slate-400 hover:text-primary transition-colors">
                    <i class="fas fa-moon"></i>
                </button>
            </div>
            
            <!-- Mobile Menu Icons -->
            <div class="lg:hidden flex items-center space-x-5">
                <button id="dark-mode-btn-mobile" class="text-xl focus:outline-none text-slate-600 dark:text-slate-400">
                    <i class="fas fa-moon"></i>
                </button>
                <button id="mobile-menu-btn" class="text-2xl text-slate-900 dark:text-white focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden absolute w-full top-full left-0 bg-white dark:bg-dark border-t border-slate-100 dark:border-slate-800 shadow-xl transition-all">
            <div class="flex flex-col px-6 py-6 space-y-4 text-center">
                <a href="#home" class="mobile-link text-slate-800 dark:text-slate-200 font-medium hover:text-primary">Beranda</a>
                <a href="#about" class="mobile-link text-slate-800 dark:text-slate-200 font-medium hover:text-primary">Tentang</a>
                <a href="#education" class="mobile-link text-slate-800 dark:text-slate-200 font-medium hover:text-primary">Pendidikan</a>
                <a href="#experience" class="mobile-link text-slate-800 dark:text-slate-200 font-medium hover:text-primary">Pengalaman</a>
                <a href="#skills" class="mobile-link text-slate-800 dark:text-slate-200 font-medium hover:text-primary">Keahlian</a>
                <a href="#projects" class="mobile-link text-slate-800 dark:text-slate-200 font-medium hover:text-primary">Proyek</a>
                <a href="#certificates" class="mobile-link text-slate-800 dark:text-slate-200 font-medium hover:text-primary">Sertifikat</a>
                <a href="#contact" class="mobile-link text-primary font-bold">Hubungi Saya</a>
            </div>
        </div>
    </nav>

    <!-- 2. Hero Section -->
    <section id="home" class="relative min-h-screen flex items-center pt-24 pb-16 overflow-hidden">
        <!-- Floating Tech Icons (Living Dashboard) -->
        <div class="absolute top-[15%] left-[5%] text-primary neon-primary text-4xl animate-float animate-glow z-0 opacity-40 md:opacity-100" style="animation-duration: 8s;"><i class="fab fa-laravel"></i></div>
        <div class="absolute top-[25%] right-[8%] text-secondary neon-secondary text-5xl animate-float animate-glow z-0 opacity-40 md:opacity-100" style="animation-duration: 12s; animation-delay: 1s;"><i class="fab fa-react"></i></div>
        <div class="absolute bottom-[20%] left-[10%] text-accent neon-accent text-3xl animate-float animate-glow z-0 opacity-40 md:opacity-100" style="animation-duration: 10s; animation-delay: 2s;"><i class="fab fa-js"></i></div>
        <div class="absolute bottom-[15%] right-[15%] text-primary neon-primary text-4xl animate-float animate-glow z-0 opacity-40 md:opacity-100" style="animation-duration: 9s; animation-delay: 1.5s;"><i class="fab fa-php"></i></div>
        <div class="absolute top-[40%] left-[20%] text-secondary neon-secondary text-2xl animate-float animate-glow z-0 opacity-20 md:opacity-60" style="animation-duration: 15s;"><i class="fas fa-database"></i></div>
        <div class="absolute top-[60%] right-[25%] text-accent neon-accent text-2xl animate-float animate-glow z-0 opacity-20 md:opacity-60" style="animation-duration: 11s; animation-delay: 3s;"><i class="fas fa-code"></i></div>
        
        <div class="container mx-auto px-6 md:px-12 z-10">
            <div class="flex flex-col-reverse md:flex-row items-center justify-between gap-12">
                
                <!-- Text Content -->
                <div class="md:w-1/2 text-center md:text-left" data-aos="fade-up">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white dark:bg-surface text-sm font-medium mb-6 shadow-sm border border-slate-100 dark:border-slate-800">
                        <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                        <span class="text-slate-600 dark:text-slate-300">Tersedia untuk proyek baru</span>
                    </div>
                    
                    <h1 class="font-heading text-5xl md:text-6xl lg:text-7xl font-bold mb-6 text-slate-900 dark:text-white leading-[1.1]">
                        Hai, Saya<br/>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary via-secondary to-primary bg-300% animate-gradient">Muhamad Galih Saputra</span>
                    </h1>
                    
                    <p class="text-lg text-slate-600 dark:text-slate-400 mb-8 max-w-lg mx-auto md:mx-0 leading-relaxed">
                        Seorang <span class="font-bold text-slate-800 dark:text-slate-200">Fullstack Web Developer</span> yang berdedikasi menciptakan solusi digital inovatif. Berfokus pada pengembangan antarmuka yang <span class="text-primary font-bold">presisi</span>, fungsional, dan memberikan pengalaman pengguna yang luar biasa.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="#projects" class="px-8 py-3.5 rounded-full bg-slate-900 text-white dark:bg-white dark:text-slate-900 font-medium hover:scale-105 transition-all duration-300 shadow-xl shadow-slate-900/20 dark:shadow-white/10 flex justify-center items-center gap-2">
                            Lihat Portfolio <i class="fas fa-arrow-right text-sm"></i>
                        </a>
                        <a href="#contact" class="px-8 py-3.5 rounded-full bg-white dark:bg-surface text-slate-900 dark:text-white font-medium hover:scale-105 transition-all duration-300 shadow-md border border-slate-100 dark:border-slate-800 flex justify-center items-center">
                            Hubungi Saya
                        </a>
                    </div>
                </div>
                
                <!-- Hero Image -->
                <div class="md:w-1/2 flex justify-center relative" data-aos="fade-left" data-aos-delay="200">
                    <div class="relative w-72 h-72 md:w-96 md:h-96 animate-float">
                        <!-- Decorative ring -->
                        <div class="absolute inset-0 rounded-full border-2 border-dashed border-primary/30 animate-[spin_20s_linear_infinite]"></div>
                        <!-- Profile Image -->
                        <div class="absolute inset-4 rounded-full overflow-hidden border-4 border-white dark:border-dark shadow-2xl bg-primary/10">
                            <img src="images/profile-galih.png" 
                                 alt="Muhamad Galih Saputra" 
                                 class="w-full h-full object-cover object-top">
                        </div>
                        <!-- Floating Badges -->
                        <div class="absolute top-10 right-0 bg-white dark:bg-surface p-3 rounded-2xl shadow-xl flex items-center gap-3 animate-float" style="animation-delay: 1s;">
                            <div class="text-yellow-400 text-2xl"><i class="fab fa-js"></i></div>
                            <div class="text-sm font-bold text-slate-800 dark:text-white">JavaScript</div>
                        </div>
                        <div class="absolute bottom-10 left-0 bg-white dark:bg-surface p-3 rounded-2xl shadow-xl flex items-center gap-3 animate-float" style="animation-delay: 2s;">
                            <div class="text-cyan-400 text-2xl"><i class="fab fa-react"></i></div>
                            <div class="text-sm font-bold text-slate-800 dark:text-white">React.js</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. About Section -->
    <section id="about" class="py-24 bg-white dark:bg-dark relative overflow-hidden">
        <!-- Floating Decorative Elements -->
        <div class="absolute top-[20%] left-[5%] text-primary neon-primary text-4xl animate-float opacity-20 md:opacity-40" style="animation-duration: 8s;"><i class="fas fa-lightbulb"></i></div>
        <div class="absolute bottom-[20%] right-[5%] text-secondary neon-secondary text-5xl animate-float opacity-20 md:opacity-40" style="animation-duration: 12s;"><i class="fas fa-terminal"></i></div>
        
        <div class="container mx-auto px-6 md:px-12 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <!-- Visual Side -->
                <div class="lg:w-1/2" data-aos="fade-right">
                    <div class="relative">
                        <!-- Background Glow -->
                        <div class="absolute -inset-4 bg-gradient-to-tr from-primary/20 to-secondary/20 rounded-[3rem] blur-2xl"></div>
                        
                        <!-- Aesthetic Card Stack -->
                        <div class="relative grid grid-cols-2 gap-4">
                            <div class="space-y-4 pt-8">
                                <div class="bg-slate-50 dark:bg-surface p-6 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-xl dynamic-glow-card">
                                    <div class="w-12 h-12 rounded-2xl bg-primary/10 flex items-center justify-center text-primary text-xl mb-4">
                                        <i class="fas fa-rocket"></i>
                                    </div>
                                    <h4 class="font-bold text-slate-900 dark:text-white mb-2">Ambisi</h4>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">Bertekad menjadi Frontend Developer profesional.</p>
                                </div>
                                <div class="bg-slate-50 dark:bg-surface p-6 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-xl dynamic-glow-card">
                                    <div class="w-12 h-12 rounded-2xl bg-accent/10 flex items-center justify-center text-accent text-xl mb-4">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                    <h4 class="font-bold text-slate-900 dark:text-white mb-2">Passion</h4>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">Mencintai seni dalam setiap baris kode.</p>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div class="bg-slate-50 dark:bg-surface p-6 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-xl dynamic-glow-card">
                                    <div class="w-12 h-12 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary text-xl mb-4">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <h4 class="font-bold text-slate-900 dark:text-white mb-2">Visi</h4>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">Membangun antarmuka yang modern & interaktif.</p>
                                </div>
                                <div class="bg-slate-50 dark:bg-surface p-6 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-xl dynamic-glow-card">
                                    <div class="w-12 h-12 rounded-2xl bg-green-400/10 flex items-center justify-center text-green-500 text-xl mb-4">
                                        <i class="fas fa-seedling"></i>
                                    </div>
                                    <h4 class="font-bold text-slate-900 dark:text-white mb-2">Growth</h4>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">Selalu bersemangat mencoba hal-hal baru.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Text Side -->
                <div class="lg:w-1/2" data-aos="fade-left">
                    <div class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-sm font-semibold tracking-wider uppercase mb-6">Tentang Saya</div>
                    <h2 class="font-heading text-3xl md:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-white mb-8 leading-tight">
                        Mengubah Imajinasi Menjadi <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">Realitas Digital</span>
                    </h2>
                    <div class="space-y-6 text-lg text-slate-600 dark:text-slate-400 leading-relaxed">
                        <p>
                            Saya adalah seorang pengembang web yang memiliki gairah mendalam dalam mengeksplorasi ekosistem teknologi modern. Dengan spesialisasi di bidang <span class="text-primary font-bold">Frontend & Backend Development</span>, saya berkomitmen untuk mengubah konsep kompleks menjadi realitas digital yang intuitif dan bermakna.
                        </p>
                        <p>
                            Bagi saya, setiap baris kode adalah kesempatan untuk menciptakan dampak positif bagi pengguna. Saya selalu bersemangat untuk mengadopsi <span class="text-secondary font-bold">teknologi mutakhir</span> dan tren inovasi terbaru guna memberikan solusi digital yang melampaui ekspektasi—baik dari segi fungsionalitas maupun keindahan estetika.
                        </p>
                    </div>

                    <!-- CTA or Highlights -->
                    <div class="mt-10 flex flex-wrap gap-6">
                        <div class="flex items-center gap-3">
                            <div class="text-2xl text-primary"><i class="fas fa-check-circle"></i></div>
                            <div class="text-sm font-medium text-slate-700 dark:text-slate-300">Fast Learner</div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="text-2xl text-secondary"><i class="fas fa-check-circle"></i></div>
                            <div class="text-sm font-medium text-slate-700 dark:text-slate-300">Modern UI/UX</div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="text-2xl text-accent"><i class="fas fa-check-circle"></i></div>
                            <div class="text-sm font-medium text-slate-700 dark:text-slate-300">Creative Solutions</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Education Section -->
    <section id="education" class="py-24 bg-slate-50 dark:bg-darker relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-1/4 -right-20 w-96 h-96 bg-primary/10 rounded-full blur-[100px] animate-blob"></div>
        <div class="absolute bottom-1/4 -left-20 w-96 h-96 bg-secondary/10 rounded-full blur-[100px] animate-blob" style="animation-delay: 2s;"></div>
        
        <!-- Floating Icons (Living Elements) - NEON BALANCED -->
        <div class="absolute top-20 left-[5%] text-primary neon-primary text-5xl animate-float animate-glow z-0" style="animation-duration: 8s;"><i class="fas fa-book-open"></i></div>
        <div class="absolute top-60 right-[10%] text-secondary neon-secondary text-6xl animate-float animate-glow z-0" style="animation-duration: 12s; animation-delay: 1s;"><i class="fas fa-graduation-cap"></i></div>
        <div class="absolute bottom-40 left-[8%] text-accent neon-accent text-4xl animate-float animate-glow z-0" style="animation-duration: 10s; animation-delay: 2s;"><i class="fas fa-code"></i></div>
        <div class="absolute bottom-20 right-[5%] text-primary neon-primary text-5xl animate-float animate-glow z-0" style="animation-duration: 9s; animation-delay: 1.5s;"><i class="fas fa-laptop-code"></i></div>
        <div class="absolute top-1/2 left-[12%] text-secondary neon-secondary text-7xl animate-float animate-glow z-0" style="animation-duration: 15s;"><i class="fas fa-pencil-ruler"></i></div>
        <div class="absolute top-1/3 right-[20%] text-accent neon-accent text-4xl animate-float animate-glow z-0" style="animation-duration: 11s; animation-delay: 3s;"><i class="fas fa-brain"></i></div>

        <div class="container mx-auto px-6 md:px-12 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-20" data-aos="fade-up">
                <div class="inline-block px-4 py-1.5 rounded-full bg-gradient-to-r from-primary/10 to-secondary/10 border border-primary/20 text-primary text-xs font-bold tracking-widest uppercase mb-6 shadow-sm">
                    <i class="fas fa-user-graduate mr-2"></i> Perjalanan Akademik
                </div>
                <h2 class="font-heading text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-6">
                    Riwayat <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">Pendidikan</span>
                </h2>
                <p class="text-slate-600 dark:text-slate-400">Jejak langkah saya dalam menuntut ilmu dan mengasah keterampilan.</p>
            </div>

            <div class="max-w-5xl mx-auto">
                <div class="relative">
                    <!-- Vertical Timeline Line -->
                    <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-1 bg-slate-200 dark:bg-slate-800 md:-translate-x-1/2 rounded-full">
                        <div class="absolute top-0 bottom-0 w-full bg-gradient-to-b from-primary via-secondary to-accent shadow-[0_0_20px_rgba(79,70,229,0.4)] rounded-full"></div>
                    </div>

                    <div class="space-y-24">
                        <!-- SMK (Latest) -->
                        <div class="relative flex flex-col md:flex-row items-center group" data-aos="fade-right">
                            <div class="flex flex-1 md:justify-end md:pr-16 w-full">
                                <div class="relative bg-white dark:bg-surface p-8 rounded-[2.5rem] shadow-xl border border-slate-100 dark:border-slate-800 md:text-right w-full md:w-[400px] transform transition-all duration-700 group-hover:-translate-y-3 group-hover:shadow-primary/20 education-card overflow-hidden">
                                    <!-- Card Glow Effect -->
                                    <div class="absolute -top-24 -right-24 w-48 h-48 bg-primary/10 rounded-full blur-3xl group-hover:bg-primary/20 transition-colors"></div>
                                    
                                    <div class="relative z-10">
                                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-[10px] font-black uppercase tracking-tighter mb-4">
                                            <span class="w-1.5 h-1.5 rounded-full bg-primary animate-ping"></span> 2022 - Sekarang
                                        </span>
                                        <h3 class="font-heading text-2xl font-extrabold text-slate-900 dark:text-white mb-3 group-hover:text-primary transition-colors">SMK Telkom Lampung</h3>
                                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-6">Jurusan <strong class="text-slate-900 dark:text-white">Rekayasa Perangkat Lunak (RPL)</strong>. Mendalami arsitektur web, manajemen basis data, dan logika pemrograman tingkat lanjut.</p>
                                        <div class="flex flex-wrap md:justify-end gap-2">
                                            <span class="px-3 py-1 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-[10px] font-bold border border-slate-200 dark:border-slate-700">Web Dev</span>
                                            <span class="px-3 py-1 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-[10px] font-bold border border-slate-200 dark:border-slate-700">Inertia.js</span>
                                            <span class="px-3 py-1 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-[10px] font-bold border border-slate-200 dark:border-slate-700">Laravel</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Timeline Dot -->
                            <div class="absolute left-4 md:left-1/2 w-12 h-12 rounded-full bg-white dark:bg-dark border-4 border-primary shadow-[0_0_25px_rgba(79,70,229,0.6)] z-20 -translate-x-1/2 flex items-center justify-center transition-transform duration-500 group-hover:scale-125">
                                <i class="fas fa-graduation-cap text-primary text-sm group-hover:animate-bounce"></i>
                            </div>
                            <div class="flex-1 md:pl-16 hidden md:block"></div>
                        </div>

                        <!-- SMP -->
                        <div class="relative flex flex-col md:flex-row items-center group" data-aos="fade-left">
                            <div class="flex-1 md:pr-16 hidden md:block"></div>
                            <!-- Timeline Dot -->
                            <div class="absolute left-4 md:left-1/2 w-12 h-12 rounded-full bg-white dark:bg-dark border-4 border-secondary shadow-[0_0_25px_rgba(14,165,233,0.6)] z-20 -translate-x-1/2 flex items-center justify-center transition-transform duration-500 group-hover:scale-125">
                                <i class="fas fa-school text-secondary text-sm group-hover:animate-bounce"></i>
                            </div>
                            <div class="flex flex-1 md:pl-16 w-full">
                                <div class="relative bg-white dark:bg-surface p-8 rounded-[2.5rem] shadow-xl border border-slate-100 dark:border-slate-800 w-full md:w-[400px] transform transition-all duration-700 group-hover:-translate-y-3 group-hover:shadow-secondary/20 education-card overflow-hidden">
                                    <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-secondary/10 rounded-full blur-3xl group-hover:bg-secondary/20 transition-colors"></div>
                                    
                                    <div class="relative z-10">
                                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary/10 text-secondary text-[10px] font-black uppercase tracking-tighter mb-4">
                                             2019 - 2022
                                        </span>
                                        <h3 class="font-heading text-2xl font-extrabold text-slate-900 dark:text-white mb-3 group-hover:text-secondary transition-colors">SMP N 1 Pesawaran</h3>
                                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Membangun fondasi akademik dan mulai menunjukkan minat besar pada teknologi informasi dan kreativitas digital.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SD -->
                        <div class="relative flex flex-col md:flex-row items-center group" data-aos="fade-right">
                            <div class="flex flex-1 md:justify-end md:pr-16 w-full">
                                <div class="relative bg-white dark:bg-surface p-8 rounded-[2.5rem] shadow-xl border border-slate-100 dark:border-slate-800 md:text-right w-full md:w-[400px] transform transition-all duration-500 group-hover:-translate-y-3 group-hover:shadow-accent/20 education-card overflow-hidden">
                                    <div class="absolute -top-24 -left-24 w-48 h-48 bg-accent/10 rounded-full blur-3xl group-hover:bg-accent/20 transition-colors"></div>
                                    
                                    <div class="relative z-10">
                                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-accent/10 text-accent text-[10px] font-black uppercase tracking-tighter mb-4">
                                             2013 - 2019
                                        </span>
                                        <h3 class="font-heading text-2xl font-extrabold text-slate-900 dark:text-white mb-3 group-hover:text-accent transition-colors">SD N 38</h3>
                                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Masa pembentukan karakter awal dan pengembangan rasa ingin tahu yang tinggi terhadap hal-hal baru.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Timeline Dot -->
                            <div class="absolute left-4 md:left-1/2 w-12 h-12 rounded-full bg-white dark:bg-dark border-4 border-accent shadow-[0_0_25px_rgba(244,63,94,0.6)] z-20 -translate-x-1/2 flex items-center justify-center transition-transform duration-500 group-hover:scale-125">
                                <i class="fas fa-book text-accent text-sm group-hover:animate-bounce"></i>
                            </div>
                            <div class="flex-1 md:pl-16 hidden md:block"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="py-24 bg-white dark:bg-dark relative overflow-hidden">
        <!-- Floating Icons -->
        <div class="absolute top-[20%] right-[10%] text-primary neon-primary text-5xl animate-float animate-glow z-0" style="animation-duration: 10s;"><i class="fas fa-briefcase"></i></div>
        <div class="absolute bottom-[20%] left-[5%] text-secondary neon-secondary text-4xl animate-float animate-glow z-0" style="animation-duration: 8s; animation-delay: 1.5s;"><i class="fas fa-laptop-code"></i></div>
        
        <div class="container mx-auto px-6 md:px-12 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-20" data-aos="fade-up">
                <div class="inline-block px-4 py-1.5 rounded-full bg-gradient-to-r from-primary/10 to-secondary/10 border border-primary/20 text-primary text-xs font-bold tracking-widest uppercase mb-6 shadow-sm">
                    <i class="fas fa-briefcase mr-2"></i> Pengalaman & Organisasi
                </div>
                <h2 class="font-heading text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-6">
                    Rekam <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">Jejak</span> Saya
                </h2>
                <p class="text-slate-600 dark:text-slate-400 text-lg">Berbagai kontribusi, magang, dan proyek yang telah saya lalui.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- Exp 1 -->
                <div class="bg-slate-50 dark:bg-surface/50 rounded-[2.5rem] p-8 md:p-10 border border-slate-100 dark:border-slate-800 group hover:shadow-2xl transition-all duration-500 dynamic-glow-card" data-aos="fade-up">
                    <div class="flex items-start gap-6">
                        <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center text-primary text-2xl neon-glow-badge group-hover:scale-110 transition-transform">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="flex-1">
                            <span class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-[10px] font-black uppercase tracking-tighter mb-3">Magang / Prakerin</span>
                            <h3 class="font-heading text-2xl font-bold text-slate-900 dark:text-white mb-1 group-hover:text-primary transition-colors">Universitas Aisyah Pringsewu</h3>
                            <p class="text-slate-500 dark:text-slate-400 text-sm font-medium mb-4">Bagian Administrasi</p>
                            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Bertanggung jawab dalam pengelolaan administrasi kantor, pengarsipan dokumen digital, koordinasi data mahasiswa, dan mendukung operasional harian di lingkungan universitas.</p>
                        </div>
                    </div>
                </div>

                <!-- Exp 2 -->
                <div class="bg-slate-50 dark:bg-surface/50 rounded-[2.5rem] p-8 md:p-10 border border-slate-100 dark:border-slate-800 group hover:shadow-2xl transition-all duration-500 dynamic-glow-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-start gap-6">
                        <div class="w-16 h-16 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary text-2xl neon-glow-badge group-hover:scale-110 transition-transform">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div class="flex-1">
                            <span class="inline-block px-3 py-1 rounded-full bg-secondary/10 text-secondary text-[10px] font-black uppercase tracking-tighter mb-3">Organisasi</span>
                            <h3 class="font-heading text-2xl font-bold text-slate-900 dark:text-white mb-1 group-hover:text-secondary transition-colors">Bendahara - Organisasi Pemuda</h3>
                            <p class="text-slate-500 dark:text-slate-400 text-sm font-medium mb-4">Aktif - Tingkat Desa</p>
                            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Mengelola manajemen keuangan organisasi, penyusunan laporan anggaran rutin, serta mengoordinasikan pendanaan untuk berbagai kegiatan kepemudaan dan sosial di lingkungan desa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Skills Section -->
    <section id="skills" class="py-24 bg-slate-50 dark:bg-darker">
        <div class="container mx-auto px-6 md:px-12 text-center">
            <div class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-sm font-semibold tracking-wider uppercase mb-4" data-aos="fade-up">Keahlian</div>
            <h2 class="font-heading text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-16" data-aos="fade-up" data-aos-delay="100">
                Teknologi yang Saya Gunakan
            </h2>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                <!-- Skill Card -->
                <div class="bg-white dark:bg-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 hover:shadow-xl transition-all duration-300 group dynamic-glow-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 mx-auto bg-orange-50 dark:bg-orange-500/10 rounded-2xl flex items-center justify-center text-orange-500 text-3xl mb-4 group-hover:scale-110 transition-transform">
                        <i class="fab fa-html5"></i>
                    </div>
                    <h3 class="font-bold text-slate-800 dark:text-white">HTML & CSS</h3>
                </div>
                
                <div class="bg-white dark:bg-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 hover:shadow-xl transition-all duration-300 group dynamic-glow-card" data-aos="fade-up" data-aos-delay="150">
                    <div class="w-16 h-16 mx-auto bg-yellow-50 dark:bg-yellow-500/10 rounded-2xl flex items-center justify-center text-yellow-500 text-3xl mb-4 group-hover:scale-110 transition-transform">
                        <i class="fab fa-js"></i>
                    </div>
                    <h3 class="font-bold text-slate-800 dark:text-white">JavaScript</h3>
                </div>
                
                <div class="bg-white dark:bg-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 hover:shadow-xl transition-all duration-300 group dynamic-glow-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 mx-auto bg-cyan-50 dark:bg-cyan-500/10 rounded-2xl flex items-center justify-center text-cyan-500 text-3xl mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-wind"></i>
                    </div>
                    <h3 class="font-bold text-slate-800 dark:text-white">Tailwind CSS</h3>
                </div>
                
                <div class="bg-white dark:bg-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 hover:shadow-xl transition-all duration-300 group dynamic-glow-card" data-aos="fade-up" data-aos-delay="250">
                    <div class="w-16 h-16 mx-auto bg-blue-50 dark:bg-blue-500/10 rounded-2xl flex items-center justify-center text-blue-500 text-3xl mb-4 group-hover:scale-110 transition-transform">
                        <i class="fab fa-react"></i>
                    </div>
                    <h3 class="font-bold text-slate-800 dark:text-white">React.js</h3>
                </div>
                
                <div class="bg-white dark:bg-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 hover:shadow-xl transition-all duration-300 group dynamic-glow-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 mx-auto bg-red-50 dark:bg-red-500/10 rounded-2xl flex items-center justify-center text-red-500 text-3xl mb-4 group-hover:scale-110 transition-transform">
                        <i class="fab fa-laravel"></i>
                    </div>
                    <h3 class="font-bold text-slate-800 dark:text-white">Laravel</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Certificates Section -->
    <section id="certificates" class="py-24 bg-white dark:bg-dark relative overflow-hidden">
        <!-- Floating Icons -->
        <div class="absolute top-[10%] left-[5%] text-primary neon-primary text-4xl animate-float animate-glow z-0 opacity-40 md:opacity-100" style="animation-duration: 8s;"><i class="fas fa-medal"></i></div>
        <div class="absolute bottom-[10%] right-[5%] text-secondary neon-secondary text-5xl animate-float animate-glow z-0 opacity-40 md:opacity-100" style="animation-duration: 12s;"><i class="fas fa-star"></i></div>
        <div class="absolute top-1/2 right-[10%] text-accent neon-accent text-3xl animate-float animate-glow z-0 opacity-20 md:opacity-60" style="animation-duration: 15s;"><i class="fas fa-award"></i></div>

        <div class="container mx-auto px-6 md:px-12">
            <div class="text-center max-w-2xl mx-auto mb-16" data-aos="fade-up">
                <div class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-sm font-semibold tracking-wider uppercase mb-4">Pencapaian</div>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-slate-900 dark:text-white">
                    Sertifikat & Penghargaan
                </h2>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Cert 1 -->
                <div class="bg-white dark:bg-surface rounded-3xl overflow-hidden border border-slate-100 dark:border-slate-800 hover:shadow-2xl transition-all duration-500 group dynamic-glow-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative h-48 overflow-hidden bg-slate-200 dark:bg-darker">
                        <div class="absolute inset-0 flex items-center justify-center text-primary/20 opacity-20 group-hover:scale-110 transition-transform duration-700">
                            <i class="fas fa-certificate text-8xl"></i>
                        </div>
                        <img src="images/cert-css-essentials.png" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="CSS Essentials Certificate">
                        <div class="absolute top-4 right-4">
                            <div class="w-10 h-10 rounded-full bg-white dark:bg-dark shadow-lg flex items-center justify-center text-primary neon-glow-badge">
                                <i class="fas fa-award"></i>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2 py-0.5 rounded text-[10px] font-black uppercase tracking-widest bg-primary text-white neon-glow-badge">Cisco</span>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Networking Academy</span>
                        </div>
                        <h3 class="font-heading text-lg font-bold text-slate-900 dark:text-white mb-2 leading-tight group-hover:text-primary transition-colors">CSS Essentials</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-xs mb-6">Sertifikasi kompetensi dalam dasar-dasar CSS, tata letak, dan desain web modern yang ditawarkan oleh SMK Telkom Lampung.</p>
                        <div class="pt-6 border-t border-slate-100 dark:border-slate-800 flex justify-between items-center neon-line-effect text-primary">
                            <span class="text-[10px] text-slate-400 font-mono tracking-tighter">ID: 28871c17...</span>
                            <a href="images/cert-css-essentials.png" target="_blank" class="text-xs font-bold hover:underline flex items-center gap-1">Lihat Detail <i class="fas fa-external-link-alt text-[10px]"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Cert 2 -->
                <div class="bg-white dark:bg-surface rounded-3xl overflow-hidden border border-slate-100 dark:border-slate-800 hover:shadow-2xl transition-all duration-500 group dynamic-glow-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative h-48 overflow-hidden bg-slate-200 dark:bg-darker">
                        <div class="absolute inset-0 flex items-center justify-center text-secondary/20 opacity-20 group-hover:scale-110 transition-transform duration-700">
                            <i class="fas fa-award text-8xl"></i>
                        </div>
                        <img src="images/cert-js-essentials.png" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="JavaScript Essentials 1 Certificate">
                        <div class="absolute top-4 right-4">
                            <div class="w-10 h-10 rounded-full bg-white dark:bg-dark shadow-lg flex items-center justify-center text-secondary neon-glow-badge">
                                <i class="fas fa-shield-halved"></i>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2 py-0.5 rounded text-[10px] font-black uppercase tracking-widest bg-secondary text-white neon-glow-badge">Cisco</span>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Networking Academy</span>
                        </div>
                        <h3 class="font-heading text-lg font-bold text-slate-900 dark:text-white mb-2 leading-tight group-hover:text-secondary transition-colors">JavaScript Essentials 1</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-xs mb-6">Sertifikasi kompetensi dalam dasar-dasar pemrograman JavaScript, tipe data, algoritma, dan manipulasi objek.</p>
                        <div class="pt-6 border-t border-slate-100 dark:border-slate-800 flex justify-between items-center neon-line-effect text-secondary">
                            <span class="text-[10px] text-slate-400 font-mono tracking-tighter">ID: 14ee21b5...</span>
                            <a href="images/cert-js-essentials.png" target="_blank" class="text-xs font-bold hover:underline flex items-center gap-1">Lihat Detail <i class="fas fa-external-link-alt text-[10px]"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Cert 3 -->
                <div class="bg-white dark:bg-surface rounded-3xl overflow-hidden border border-slate-100 dark:border-slate-800 hover:shadow-2xl transition-all duration-500 group dynamic-glow-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="relative h-48 overflow-hidden bg-slate-200 dark:bg-darker">
                        <div class="absolute inset-0 flex items-center justify-center text-accent/20 opacity-20 group-hover:scale-110 transition-transform duration-700">
                            <i class="fas fa-lightbulb text-8xl"></i>
                        </div>
                        <img src="images/cert-entrepreneurship.png" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Entrepreneurship Certificate">
                        <div class="absolute top-4 right-4">
                            <div class="w-10 h-10 rounded-full bg-white dark:bg-dark shadow-lg flex items-center justify-center text-accent neon-glow-badge">
                                <i class="fas fa-rocket"></i>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2 py-0.5 rounded text-[10px] font-black uppercase tracking-widest bg-accent text-white neon-glow-badge">Cisco</span>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Networking Academy</span>
                        </div>
                        <h3 class="font-heading text-lg font-bold text-slate-900 dark:text-white mb-2 leading-tight group-hover:text-accent transition-colors">Discovering Entrepreneurship</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-xs mb-6">Sertifikasi mengenai konsep dasar kewirausahaan, inovasi, dan strategi bisnis digital melalui program SMK Telkom Lampung.</p>
                        <div class="pt-6 border-t border-slate-100 dark:border-slate-800 flex justify-between items-center neon-line-effect text-accent">
                            <span class="text-[10px] text-slate-400 font-mono tracking-tighter">Verified Student 2023</span>
                            <a href="images/cert-entrepreneurship.png" target="_blank" class="text-xs font-bold hover:underline flex items-center gap-1">Lihat Detail <i class="fas fa-external-link-alt text-[10px]"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Projects Section -->
    <section id="projects" class="py-24 bg-slate-50 dark:bg-darker relative overflow-hidden">
        <!-- Floating Icons -->
        <div class="absolute top-[20%] right-[5%] text-primary neon-primary text-5xl animate-float animate-glow z-0 opacity-40 md:opacity-100" style="animation-duration: 10s;"><i class="fas fa-rocket"></i></div>
        <div class="absolute bottom-[15%] left-[5%] text-secondary neon-secondary text-4xl animate-float animate-glow z-0 opacity-40 md:opacity-100" style="animation-duration: 8s;"><i class="fas fa-code-branch"></i></div>
        <div class="absolute top-1/2 left-[10%] text-accent neon-accent text-3xl animate-float animate-glow z-0 opacity-20 md:opacity-60" style="animation-duration: 14s;"><i class="fas fa-cubes"></i></div>

        <div class="container mx-auto px-6 md:px-12">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6" data-aos="fade-up">
                <div>
                    <div class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-sm font-semibold tracking-wider uppercase mb-4">Portfolio</div>
                    <h2 class="font-heading text-3xl md:text-4xl font-bold text-slate-900 dark:text-white">
                        Karya Terbaik Saya
                    </h2>
                </div>
                <a href="#" class="inline-flex items-center gap-2 font-semibold text-slate-900 dark:text-white hover:text-primary dark:hover:text-primary transition-colors group">
                    Lihat Semua Proyek 
                    <span class="w-8 h-8 rounded-full bg-white dark:bg-surface border border-slate-200 dark:border-slate-700 flex items-center justify-center group-hover:translate-x-1 transition-transform">
                        <i class="fas fa-arrow-right text-sm"></i>
                    </span>
                </a>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Project 1 -->
                <div class="bg-white dark:bg-surface rounded-3xl overflow-hidden shadow-lg border border-slate-100 dark:border-slate-800 group hover:-translate-y-2 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative h-60 overflow-hidden">
                        <img src="images/pengaduan-dashboard.png" 
                             class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" alt="Website Pengaduan Sekolah Dashboard">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                            <div class="flex gap-3 w-full transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                <button onclick="openDemoModal('pengaduan')" class="flex-1 bg-primary text-white text-center py-2.5 rounded-xl font-medium text-sm hover:bg-blue-600 transition-colors">Demo</button>
                                <a href="https://github.com/Galihnantion/MuhamadGalihSaputraUKKN.git" target="_blank" class="flex-1 bg-white/20 backdrop-blur-md text-white text-center py-2.5 rounded-xl font-medium text-sm hover:bg-white/30 transition-colors">Source</a>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs font-semibold px-3 py-1 bg-indigo-50 text-primary dark:bg-indigo-500/10 rounded-full">PHP</span>
                            <span class="text-xs font-semibold px-3 py-1 bg-blue-50 text-blue-600 dark:bg-blue-500/10 rounded-full">React</span>
                            <span class="text-xs font-semibold px-3 py-1 bg-rose-50 text-accent dark:bg-rose-500/10 rounded-full">Laravel</span>
                            <span class="text-xs font-semibold px-3 py-1 bg-cyan-50 text-cyan-600 dark:bg-cyan-500/10 rounded-full">Inertia</span>
                        </div>
                        <h3 class="font-heading text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">Website Pengaduan Sekolah</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm line-clamp-2">Portal Aspirasi & Pengaduan Siswa modern dengan dashboard interaktif, sistem manajemen laporan terpadu, dan pelacakan status real-time.</p>
                    </div>
                </div>
                
                <!-- Project 2 -->
                <div class="bg-white dark:bg-surface rounded-3xl overflow-hidden shadow-lg border border-slate-100 dark:border-slate-800 group hover:-translate-y-2 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative h-60 overflow-hidden">
                        <img src="images/kasir-pos.png" 
                             class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" alt="Website Kasir Dashboard">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                            <div class="flex gap-3 w-full transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                <button onclick="openDemoModal('kasir')" class="flex-1 bg-primary text-white text-center py-2.5 rounded-xl font-medium text-sm hover:bg-blue-600 transition-colors">Demo</button>
                                <a href="https://github.com/Galihnantion" target="_blank" class="flex-1 bg-white/20 backdrop-blur-md text-white text-center py-2.5 rounded-xl font-medium text-sm hover:bg-white/30 transition-colors">Source</a>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs font-semibold px-3 py-1 bg-indigo-50 text-primary dark:bg-indigo-500/10 rounded-full">PHP</span>
                            <span class="text-xs font-semibold px-3 py-1 bg-blue-50 text-blue-600 dark:bg-blue-500/10 rounded-full">MySQL</span>
                            <span class="text-xs font-semibold px-3 py-1 bg-yellow-50 text-yellow-600 dark:bg-yellow-500/10 rounded-full">JavaScript</span>
                            <span class="text-xs font-semibold px-3 py-1 bg-orange-50 text-orange-600 dark:bg-orange-500/10 rounded-full">HTML/CSS</span>
                        </div>
                        <h3 class="font-heading text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">Website Kasir (Point of Sale)</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm line-clamp-2">Aplikasi manajemen penjualan retail modern dengan fitur POS real-time, manajemen stok otomatis, cetak struk digital, dan laporan transaksi harian yang akurat.</p>
                    </div>
                </div>
                
                <!-- Project 3 -->
                <div class="bg-white dark:bg-surface rounded-3xl overflow-hidden shadow-lg border border-slate-100 dark:border-slate-800 group hover:-translate-y-2 transition-all duration-300 relative" data-aos="fade-up" data-aos-delay="300">
                    <!-- Coming Soon Badge -->
                    <div class="absolute top-4 right-4 z-20">
                        <span class="px-4 py-1.5 rounded-full bg-accent/90 backdrop-blur-md text-white text-[10px] font-black uppercase tracking-widest shadow-lg animate-pulse border border-white/20">
                            Coming Soon
                        </span>
                    </div>
                    
                    <div class="relative h-60 overflow-hidden grayscale group-hover:grayscale-0 transition-all duration-700">
                        <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" alt="Website Informasi">
                        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-[2px] group-hover:backdrop-blur-0 transition-all duration-500"></div>
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                             <div class="bg-white/10 backdrop-blur-md border border-white/20 px-6 py-2 rounded-2xl text-white font-bold text-sm">
                                Sedang Dikembangkan
                             </div>
                        </div>
                    </div>
                    <div class="p-6 opacity-80 group-hover:opacity-100 transition-opacity">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs font-semibold px-3 py-1 bg-blue-50 text-blue-600 dark:bg-blue-500/10 rounded-full">Tailwind</span>
                            <span class="text-xs font-semibold px-3 py-1 bg-yellow-50 text-yellow-600 dark:bg-yellow-500/10 rounded-full">JavaScript</span>
                        </div>
                        <h3 class="font-heading text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">Website Informasi (Portal Berita)</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm line-clamp-2">Platform penyedia informasi dan berita terkini yang sedang dalam tahap pengembangan. Dirancang untuk pengalaman membaca yang modern.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. Contact Section -->
    <section id="contact" class="py-24 bg-white dark:bg-dark relative overflow-hidden">
        <!-- Floating Icons -->
        <div class="absolute top-[15%] left-[5%] text-primary neon-primary text-5xl animate-float animate-glow z-0 opacity-40 md:opacity-100" style="animation-duration: 11s;"><i class="fas fa-paper-plane"></i></div>
        <div class="absolute bottom-[20%] right-[8%] text-secondary neon-secondary text-4xl animate-float animate-glow z-0 opacity-40 md:opacity-100" style="animation-duration: 9s;"><i class="fas fa-comment-dots"></i></div>
        <div class="absolute top-1/2 right-[15%] text-accent neon-accent text-3xl animate-float animate-glow z-0 opacity-20 md:opacity-60" style="animation-duration: 13s;"><i class="fas fa-at"></i></div>

        <div class="container mx-auto px-6 md:px-12 max-w-6xl">
            <div class="bg-slate-50 dark:bg-surface rounded-[2.5rem] p-8 md:p-14 shadow-sm border border-slate-100 dark:border-slate-800" data-aos="zoom-in">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <div class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-sm font-semibold tracking-wider uppercase mb-4">Kontak</div>
                        <h2 class="font-heading text-3xl md:text-5xl font-bold text-slate-900 dark:text-white mb-6 leading-tight">
                            Mari diskusi tentang <span class="text-primary">Proyek Anda</span>.
                        </h2>
                        <p class="text-slate-600 dark:text-slate-400 mb-10 text-lg">
                            Saya selalu terbuka untuk berdiskusi tentang penawaran project website, desain UI/UX, atau sekadar menyapa!
                        </p>
                        
                        <div class="space-y-6 text-slate-700 dark:text-slate-300 font-medium">
                            <div class="flex items-center gap-5">
                                <div class="w-14 h-14 rounded-2xl bg-white dark:bg-dark flex items-center justify-center text-primary text-xl shadow-sm border border-slate-100 dark:border-slate-800">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-500 mb-1">Email</p>
                                    <a href="mailto:galihsaputra3139@gmail.com" class="hover:text-primary transition-colors text-lg">galihsaputra3139@gmail.com</a>
                                </div>
                            </div>
                            <div class="flex items-center gap-5">
                                <div class="w-14 h-14 rounded-2xl bg-white dark:bg-dark flex items-center justify-center text-secondary text-xl shadow-sm border border-slate-100 dark:border-slate-800">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-500 mb-1">Telepon</p>
                                    <a href="tel:083134110144" class="hover:text-secondary transition-colors text-lg">083134110144</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white dark:bg-dark p-8 md:p-10 rounded-3xl shadow-xl border border-slate-100 dark:border-slate-800">
                        <form id="whatsapp-form" class="space-y-6">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Nama Lengkap</label>
                                    <input type="text" id="wa-name" required class="w-full px-5 py-3.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="Nama Anda">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Email</label>
                                    <input type="email" id="wa-email" required class="w-full px-5 py-3.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="email@anda.com">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Subjek</label>
                                <input type="text" id="wa-subject" required class="w-full px-5 py-3.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="Proyek Website">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Pesan</label>
                                <textarea id="wa-message" rows="4" required class="w-full px-5 py-3.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all resize-none" placeholder="Ceritakan tentang proyek Anda..."></textarea>
                            </div>
                            <button type="submit" class="w-full py-4 rounded-xl bg-primary text-white font-bold text-lg hover:bg-blue-700 transition-colors shadow-lg shadow-primary/30 hover:-translate-y-1 transform duration-300 flex justify-center items-center gap-2">
                                Kirim Pesan <i class="fas fa-paper-plane text-sm"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-50 dark:bg-darker py-12 border-t border-slate-100 dark:border-slate-800">
        <div class="container mx-auto px-6 md:px-12 text-center">
            <a href="#home" class="font-heading text-2xl font-bold tracking-tight text-slate-900 dark:text-white mb-6 inline-flex items-center gap-1 justify-center">
                <span class="text-primary"><i class="fas fa-code"></i></span>
                <span>Galih<span class="text-primary">Sptr</span></span>
            </a>
            
            <div class="flex justify-center gap-4 mb-8">
                <a href="https://github.com/Galihnantion" target="_blank" class="w-10 h-10 rounded-full bg-white dark:bg-surface border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-600 dark:text-slate-400 hover:text-primary dark:hover:text-primary transition-all transform hover:-translate-y-1 shadow-sm"><i class="fab fa-github"></i></a>
                <a href="#" class="w-10 h-10 rounded-full bg-white dark:bg-surface border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-600 dark:text-slate-400 hover:text-[#0A66C2] dark:hover:text-[#0A66C2] transition-all transform hover:-translate-y-1 shadow-sm"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://www.instagram.com/galhsptrrr/" target="_blank" class="w-10 h-10 rounded-full bg-white dark:bg-surface border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-600 dark:text-slate-400 hover:text-[#E4405F] dark:hover:text-[#E4405F] transition-all transform hover:-translate-y-1 shadow-sm"><i class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/@galihnantion2915" target="_blank" class="w-10 h-10 rounded-full bg-white dark:bg-surface border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-600 dark:text-slate-400 hover:text-[#FF0000] dark:hover:text-[#FF0000] transition-all transform hover:-translate-y-1 shadow-sm"><i class="fab fa-youtube"></i></a>
            </div>
            
            <p class="text-slate-500 text-sm">
                &copy; 2026 Muhamad Galih Saputra. Built with Passion & Code.
            </p>
        </div>
    </footer>

    <!-- Project Demo Modal (Redesigned) -->
    <div id="demo-modal" class="fixed inset-0 z-[100] hidden overflow-y-auto overflow-x-hidden">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-950/95 backdrop-blur-xl transition-opacity" onclick="closeDemoModal()"></div>
        
        <!-- Content -->
        <div class="relative min-h-screen flex items-center justify-center p-4 md:p-12">
            <div class="relative bg-white dark:bg-darker w-full max-w-7xl rounded-[2.5rem] overflow-hidden shadow-[0_0_50px_rgba(0,0,0,0.5)] transform transition-all animate-zoom-in border border-slate-200/10">
                
                <!-- Browser-Style Header -->
                <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 dark:border-slate-800 bg-slate-50 dark:bg-surface/50">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-red-500/80"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500/80"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500/80"></div>
                        <div class="ml-4 px-4 py-1 rounded-lg bg-slate-200 dark:bg-dark/50 text-[10px] font-mono text-slate-500 tracking-wider hidden sm:block">
                            HTTPS://PORTFOLIO.GALIH/PREVIEW/PENGADUAN-SEKOLAH
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-primary animate-pulse">Mode Pratinjau Langsung</span>
                        <button onclick="closeDemoModal()" class="w-8 h-8 rounded-lg bg-white dark:bg-surface hover:bg-red-500 hover:text-white transition-all flex items-center justify-center text-slate-400 shadow-sm border border-slate-100 dark:border-slate-700">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row">
                    <!-- Left: Large Image Area (70%) -->
                    <div class="lg:w-[70%] border-r border-slate-100 dark:border-slate-800 relative group bg-slate-100 dark:bg-[#050505]">
                        <div id="modal-view-container" class="relative flex items-center justify-center min-h-[400px] lg:min-h-[600px] overflow-hidden">
                            <img id="modal-image" src="" alt="Project Preview" class="w-full h-auto max-h-[85vh] object-contain transition-all duration-700">
                            
                            <!-- Premium Navigation -->
                            <div id="modal-nav" class="absolute inset-x-0 top-1/2 -translate-y-1/2 flex justify-between px-6 pointer-events-none opacity-0 group-hover:opacity-100 transition-all duration-300 transform scale-95 group-hover:scale-100">
                                <button onclick="prevProjectImage(event)" class="pointer-events-auto w-14 h-14 rounded-2xl bg-white/10 backdrop-blur-xl text-white flex items-center justify-center hover:bg-primary hover:scale-110 transition-all border border-white/10 shadow-2xl">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button onclick="nextProjectImage(event)" class="pointer-events-auto w-14 h-14 rounded-2xl bg-white/10 backdrop-blur-xl text-white flex items-center justify-center hover:bg-primary hover:scale-110 transition-all border border-white/10 shadow-2xl">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>

                            <!-- Floating Indicators -->
                            <div id="modal-indicators" class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-3 px-4 py-2 rounded-full bg-black/20 backdrop-blur-md border border-white/10">
                                <!-- Dynamic dots -->
                            </div>
                        </div>

                        <!-- Only View Label -->
                        <div class="absolute top-6 right-6 pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity">
                            <div class="px-4 py-2 rounded-full bg-primary/20 backdrop-blur-md border border-primary/30 text-primary text-[10px] font-black uppercase tracking-widest">
                                <i class="fas fa-eye mr-2"></i>Hanya Tampilan
                            </div>
                        </div>
                    </div>

                    <!-- Right: Project Info Sidebar (30%) -->
                    <div class="lg:w-[30%] flex flex-col h-full bg-white dark:bg-darker">
                        <div class="p-8 lg:p-10 flex-1 overflow-y-auto max-h-[85vh]">
                            <div class="mb-8">
                                <div class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-[10px] font-bold uppercase tracking-widest mb-4">Studi Kasus</div>
                                <h3 id="modal-title" class="font-heading text-3xl font-black text-slate-900 dark:text-white leading-tight mb-4">Project Title</h3>
                                <div id="modal-tags" class="flex flex-wrap gap-2">
                                    <!-- Dynamic Tags -->
                                </div>
                            </div>

                            <div class="space-y-8">
                                <!-- About -->
                                <div>
                                    <h4 class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Ringkasan Proyek</h4>
                                    <p id="modal-description" class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed"></p>
                                </div>

                                <!-- Features -->
                                <div>
                                    <h4 class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Fitur Utama</h4>
                                    <div id="modal-features" class="grid gap-3">
                                        <!-- Dynamic Features -->
                                    </div>
                                </div>

                                <!-- Project Details -->
                                <div class="p-6 rounded-2xl bg-slate-50 dark:bg-surface/50 border border-slate-100 dark:border-slate-800">
                                    <div class="grid grid-cols-2 gap-4 text-[11px]">
                                        <div>
                                            <p class="text-slate-400 mb-1">Status</p>
                                            <p class="font-bold text-green-500 uppercase">Selesai</p>
                                        </div>
                                        <div>
                                            <p class="text-slate-400 mb-1">Tipe</p>
                                            <p class="font-bold text-slate-700 dark:text-slate-200">Aplikasi Web</p>
                                        </div>
                                        <div>
                                            <p class="text-slate-400 mb-1">Tahun</p>
                                            <p class="font-bold text-slate-700 dark:text-slate-200">2026</p>
                                        </div>
                                        <div>
                                            <p class="text-slate-400 mb-1">Role</p>
                                            <p class="font-bold text-slate-700 dark:text-slate-200">Fullstack</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Action -->
                        <div class="p-8 border-t border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-surface/30">
                            <a href="#" id="modal-source-btn" target="_blank" class="flex items-center justify-center gap-3 w-full py-4 rounded-2xl bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-bold hover:scale-[1.02] transition-all shadow-xl">
                                <i class="fab fa-github"></i>
                                Lihat Kode Sumber
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Custom Script -->

    
    <script>
        // Dynamic Skills Effect
        document.querySelectorAll('.dynamic-glow-card').forEach(card => {
            card.addEventListener('mousemove', e => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                card.style.setProperty('--mouse-x', `${x}px`);
                card.style.setProperty('--mouse-y', `${y}px`);
                
                // Premium 3D Tilt
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                const rotateX = (centerY - y) / 15;
                const rotateY = (x - centerX) / 15;
                
                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.05, 1.05, 1.05)`;
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
            });
        });

        // WhatsApp Form Submission
        document.getElementById('whatsapp-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('wa-name').value;
            const email = document.getElementById('wa-email').value;
            const subject = document.getElementById('wa-subject').value;
            const message = document.getElementById('wa-message').value;
            
            const waNumber = '6283134110144';
            const fullMessage = `Halo Galih!%0A%0ASaya: *${name}*%0AEmail: ${email}%0ASubjek: *${subject}*%0A%0APesan:%0A${message}`;
            
            window.open(`https://wa.me/${waNumber}?text=${fullMessage}`, '_blank');
        });
    </script>
</body>
</html>
