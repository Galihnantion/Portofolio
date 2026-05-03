import os

html_content = """<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | Frontend Developer</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    
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
                        heading: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        primary: '#4f46e5', // indigo-600
                        primaryHover: '#4338ca', // indigo-700
                        dark: '#0f172a', // slate-900
                        darker: '#020617', // slate-950
                        surface: '#1e293b', // slate-800
                        light: '#f8fafc', // slate-50
                    }
                }
            }
        }
    </script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light text-slate-600 dark:bg-darker dark:text-slate-400 transition-colors duration-300 font-sans antialiased overflow-x-hidden selection:bg-primary selection:text-white">

    <!-- 1. Navbar Section -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-transparent py-5">
        <div class="container mx-auto px-6 md:px-12 flex justify-between items-center">
            
            <!-- Logo -->
            <a href="#home" class="font-heading text-2xl font-bold tracking-tight text-slate-900 dark:text-white group">
                My<span class="text-primary group-hover:text-primaryHover transition-colors">Porto.</span>
            </a>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 items-center font-medium text-sm">
                <a href="#home" class="text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary transition-colors">Home</a>
                <a href="#about" class="text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary transition-colors">About</a>
                <a href="#skills" class="text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary transition-colors">Skills</a>
                <a href="#projects" class="text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary transition-colors">Projects</a>
                <a href="#contact" class="text-slate-700 dark:text-slate-300 hover:text-primary dark:hover:text-primary transition-colors">Contact</a>
                
                <!-- Dark Mode Toggle Desktop -->
                <button id="dark-mode-btn" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-surface flex items-center justify-center text-slate-600 dark:text-slate-400 hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors focus:outline-none">
                    <i class="fas fa-sun"></i>
                </button>
            </div>
            
            <!-- Mobile Menu Icons -->
            <div class="md:hidden flex items-center space-x-4">
                <button id="dark-mode-btn-mobile" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-surface flex items-center justify-center text-slate-600 dark:text-slate-400 focus:outline-none">
                    <i class="fas fa-sun"></i>
                </button>
                <button id="mobile-menu-btn" class="text-2xl text-slate-900 dark:text-white focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden absolute w-full top-full left-0 bg-white/95 dark:bg-darker/95 backdrop-blur-md shadow-lg border-t border-slate-100 dark:border-slate-800 transition-all">
            <div class="flex flex-col px-6 py-6 space-y-4 text-center">
                <a href="#home" class="mobile-link text-slate-800 dark:text-slate-200 font-medium hover:text-primary">Home</a>
                <a href="#about" class="mobile-link text-slate-800 dark:text-slate-200 font-medium hover:text-primary">About</a>
                <a href="#skills" class="mobile-link text-slate-800 dark:text-slate-200 font-medium hover:text-primary">Skills</a>
                <a href="#projects" class="mobile-link text-slate-800 dark:text-slate-200 font-medium hover:text-primary">Projects</a>
                <a href="#contact" class="mobile-link text-slate-800 dark:text-slate-200 font-medium hover:text-primary">Contact</a>
            </div>
        </div>
    </nav>

    <!-- 2. Hero Section -->
    <section id="home" class="relative min-h-screen flex items-center pt-24 pb-16 bg-grid-pattern">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-light dark:to-darker pointer-events-none"></div>
        
        <div class="container mx-auto px-6 md:px-12 z-10">
            <div class="flex flex-col-reverse md:flex-row items-center justify-between gap-12 lg:gap-20">
                
                <!-- Text Content -->
                <div class="md:w-3/5 text-center md:text-left" data-aos="fade-up">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-50 dark:bg-indigo-900/30 text-primary mb-6 border border-indigo-100 dark:border-indigo-800/50">
                        <span class="relative flex h-2.5 w-2.5">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-primary"></span>
                        </span>
                        <span class="text-sm font-medium tracking-wide">Available for new projects</span>
                    </div>
                    
                    <h1 class="font-heading text-5xl md:text-6xl lg:text-7xl font-extrabold mb-6 text-slate-900 dark:text-white leading-tight tracking-tight">
                        Hi, I'm John Doe<br/>
                        <span class="text-gradient">Frontend Developer</span>
                    </h1>
                    
                    <p class="text-lg md:text-xl text-slate-600 dark:text-slate-400 mb-10 max-w-2xl mx-auto md:mx-0 leading-relaxed">
                        I craft clean, minimalist, and responsive web experiences. Focused on modern design principles and user-centric interfaces.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="#contact" class="px-8 py-3.5 rounded-full bg-primary text-white font-medium hover:bg-primaryHover hover:shadow-lg hover:shadow-primary/30 transition-all duration-300 w-full sm:w-auto text-center transform hover:-translate-y-0.5">
                            Let's Talk
                        </a>
                        <a href="#projects" class="px-8 py-3.5 rounded-full border border-slate-200 dark:border-slate-800 font-medium hover:border-slate-300 dark:hover:border-slate-700 bg-white dark:bg-surface text-slate-800 dark:text-slate-200 transition-all duration-300 w-full sm:w-auto text-center shadow-sm hover:shadow transform hover:-translate-y-0.5">
                            View Work
                        </a>
                    </div>
                </div>
                
                <!-- Hero Image -->
                <div class="md:w-2/5 flex justify-center relative" data-aos="fade-left" data-aos-delay="200">
                    <div class="relative w-64 h-64 md:w-80 md:h-80 lg:w-96 lg:h-96">
                        <!-- Abstract Shape Background -->
                        <div class="absolute inset-0 bg-primary/10 dark:bg-primary/20 rounded-full blur-3xl scale-110"></div>
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="John Doe" 
                             class="rounded-3xl w-full h-full object-cover shadow-2xl relative z-10 border border-white/20 dark:border-white/10 grayscale hover:grayscale-0 transition-all duration-700">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. About Section -->
    <section id="about" class="py-24 bg-white dark:bg-dark">
        <div class="container mx-auto px-6 md:px-12">
            <div class="flex flex-col md:flex-row gap-16 items-center">
                <!-- Image -->
                <div class="md:w-5/12 relative" data-aos="fade-right">
                    <div class="aspect-[4/5] rounded-3xl overflow-hidden shadow-xl border border-slate-100 dark:border-slate-800 relative group">
                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Workspace" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-colors duration-500"></div>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="md:w-7/12" data-aos="fade-left">
                    <h2 class="font-heading text-sm font-bold tracking-widest text-primary uppercase mb-3">About Me</h2>
                    <h3 class="font-heading text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-6 tracking-tight">
                        Design-driven development.
                    </h3>
                    <div class="space-y-4 text-lg text-slate-600 dark:text-slate-400 leading-relaxed mb-8">
                        <p>
                            I'm a Frontend Web Developer with a passion for building clean, modern, and highly interactive user interfaces. I bridge the gap between design and engineering, ensuring that every detail is executed perfectly.
                        </p>
                        <p>
                            My approach is minimalist: stripping away the unnecessary to focus on what truly matters. I believe that good design is invisible and seamless.
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-8 pt-6 border-t border-slate-100 dark:border-slate-800">
                        <div>
                            <h4 class="font-heading text-3xl font-bold text-slate-900 dark:text-white mb-1">2+</h4>
                            <p class="text-sm font-medium text-slate-500">Years Experience</p>
                        </div>
                        <div>
                            <h4 class="font-heading text-3xl font-bold text-slate-900 dark:text-white mb-1">30+</h4>
                            <p class="text-sm font-medium text-slate-500">Projects Completed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Skills & Services -->
    <section id="skills" class="py-24 bg-slate-50 dark:bg-darker">
        <div class="container mx-auto px-6 md:px-12">
            <div class="text-center max-w-2xl mx-auto mb-16" data-aos="fade-up">
                <h2 class="font-heading text-sm font-bold tracking-widest text-primary uppercase mb-3">Expertise</h2>
                <h3 class="font-heading text-3xl md:text-4xl font-bold text-slate-900 dark:text-white tracking-tight">
                    Tools & Technologies
                </h3>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                <!-- Skill Badge -->
                <div class="group bg-white dark:bg-surface border border-slate-200 dark:border-slate-800 rounded-2xl p-6 text-center hover:shadow-lg hover:border-primary/30 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-3xl text-slate-400 group-hover:text-orange-500 transition-colors mb-4"><i class="fab fa-html5"></i></div>
                    <h4 class="font-medium text-slate-800 dark:text-slate-200">HTML5 & CSS3</h4>
                </div>
                
                <div class="group bg-white dark:bg-surface border border-slate-200 dark:border-slate-800 rounded-2xl p-6 text-center hover:shadow-lg hover:border-primary/30 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-3xl text-slate-400 group-hover:text-yellow-400 transition-colors mb-4"><i class="fab fa-js"></i></div>
                    <h4 class="font-medium text-slate-800 dark:text-slate-200">JavaScript</h4>
                </div>
                
                <div class="group bg-white dark:bg-surface border border-slate-200 dark:border-slate-800 rounded-2xl p-6 text-center hover:shadow-lg hover:border-primary/30 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-3xl text-slate-400 group-hover:text-cyan-400 transition-colors mb-4"><i class="fas fa-wind"></i></div>
                    <h4 class="font-medium text-slate-800 dark:text-slate-200">Tailwind CSS</h4>
                </div>
                
                <div class="group bg-white dark:bg-surface border border-slate-200 dark:border-slate-800 rounded-2xl p-6 text-center hover:shadow-lg hover:border-primary/30 transition-all duration-300" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-3xl text-slate-400 group-hover:text-blue-500 transition-colors mb-4"><i class="fab fa-react"></i></div>
                    <h4 class="font-medium text-slate-800 dark:text-slate-200">React.js</h4>
                </div>
                
                <div class="group bg-white dark:bg-surface border border-slate-200 dark:border-slate-800 rounded-2xl p-6 text-center hover:shadow-lg hover:border-primary/30 transition-all duration-300" data-aos="fade-up" data-aos-delay="500">
                    <div class="text-3xl text-slate-400 group-hover:text-pink-500 transition-colors mb-4"><i class="fas fa-pen-nib"></i></div>
                    <h4 class="font-medium text-slate-800 dark:text-slate-200">UI/UX Design</h4>
                </div>
                
                <div class="group bg-white dark:bg-surface border border-slate-200 dark:border-slate-800 rounded-2xl p-6 text-center hover:shadow-lg hover:border-primary/30 transition-all duration-300" data-aos="fade-up" data-aos-delay="600">
                    <div class="text-3xl text-slate-400 group-hover:text-slate-800 dark:group-hover:text-white transition-colors mb-4"><i class="fab fa-github"></i></div>
                    <h4 class="font-medium text-slate-800 dark:text-slate-200">Git & GitHub</h4>
                </div>
                
                <div class="group bg-white dark:bg-surface border border-slate-200 dark:border-slate-800 rounded-2xl p-6 text-center hover:shadow-lg hover:border-primary/30 transition-all duration-300 md:col-span-2" data-aos="fade-up" data-aos-delay="700">
                    <div class="text-3xl text-slate-400 group-hover:text-primary transition-colors mb-4"><i class="fas fa-mobile-alt"></i></div>
                    <h4 class="font-medium text-slate-800 dark:text-slate-200">Responsive Architecture</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Projects Section -->
    <section id="projects" class="py-24 bg-white dark:bg-dark">
        <div class="container mx-auto px-6 md:px-12">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6" data-aos="fade-up">
                <div>
                    <h2 class="font-heading text-sm font-bold tracking-widest text-primary uppercase mb-3">Selected Works</h2>
                    <h3 class="font-heading text-3xl md:text-4xl font-bold text-slate-900 dark:text-white tracking-tight">
                        Featured Projects
                    </h3>
                </div>
                <a href="#" class="text-primary font-medium hover:text-primaryHover transition-colors flex items-center gap-2 group">
                    View All Projects <i class="fas fa-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
            
            <div class="grid md:grid-cols-2 gap-10">
                <!-- Project 1 -->
                <div class="group cursor-pointer" data-aos="fade-up" data-aos-delay="100">
                    <div class="overflow-hidden rounded-2xl mb-6 bg-slate-100 dark:bg-surface aspect-[4/3] relative">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                             class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" alt="Project 1">
                        <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/20 transition-colors duration-300 flex items-center justify-center">
                            <span class="opacity-0 group-hover:opacity-100 bg-white/90 dark:bg-dark/90 text-slate-900 dark:text-white px-6 py-3 rounded-full font-medium transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">View Project</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex gap-2 mb-3">
                            <span class="text-xs font-semibold px-3 py-1 bg-slate-100 dark:bg-surface text-slate-600 dark:text-slate-300 rounded-full">Dashboard</span>
                            <span class="text-xs font-semibold px-3 py-1 bg-slate-100 dark:bg-surface text-slate-600 dark:text-slate-300 rounded-full">Tailwind</span>
                        </div>
                        <h3 class="font-heading text-2xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">Admin Analytics Dashboard</h3>
                        <p class="text-slate-600 dark:text-slate-400 line-clamp-2">A minimal and modern admin dashboard interface designed to present complex data in a simple way.</p>
                    </div>
                </div>
                
                <!-- Project 2 -->
                <div class="group cursor-pointer" data-aos="fade-up" data-aos-delay="200">
                    <div class="overflow-hidden rounded-2xl mb-6 bg-slate-100 dark:bg-surface aspect-[4/3] relative">
                        <img src="https://images.unsplash.com/photo-1542393545-10f5cde2c810?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                             class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" alt="Project 2">
                        <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/20 transition-colors duration-300 flex items-center justify-center">
                            <span class="opacity-0 group-hover:opacity-100 bg-white/90 dark:bg-dark/90 text-slate-900 dark:text-white px-6 py-3 rounded-full font-medium transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">View Project</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex gap-2 mb-3">
                            <span class="text-xs font-semibold px-3 py-1 bg-slate-100 dark:bg-surface text-slate-600 dark:text-slate-300 rounded-full">E-Commerce</span>
                            <span class="text-xs font-semibold px-3 py-1 bg-slate-100 dark:bg-surface text-slate-600 dark:text-slate-300 rounded-full">React</span>
                        </div>
                        <h3 class="font-heading text-2xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">Minimalist E-Commerce</h3>
                        <p class="text-slate-600 dark:text-slate-400 line-clamp-2">Clean and seamless shopping experience with focus on product typography and whitespace.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Contact Section -->
    <section id="contact" class="py-24 bg-slate-50 dark:bg-darker">
        <div class="container mx-auto px-6 md:px-12 max-w-5xl">
            <div class="bg-white dark:bg-surface rounded-3xl p-8 md:p-14 shadow-xl border border-slate-100 dark:border-slate-800" data-aos="zoom-in">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="font-heading text-sm font-bold tracking-widest text-primary uppercase mb-3">Get In Touch</h2>
                        <h3 class="font-heading text-3xl md:text-4xl font-bold text-slate-900 dark:text-white tracking-tight mb-6">
                            Let's build something amazing together.
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 mb-8 leading-relaxed">
                            I'm currently available for freelance work and open to new opportunities. Feel free to reach out.
                        </p>
                        
                        <div class="space-y-4 text-slate-700 dark:text-slate-300 font-medium">
                            <a href="mailto:hello@johndoe.com" class="flex items-center gap-4 hover:text-primary transition-colors">
                                <div class="w-12 h-12 rounded-full bg-slate-50 dark:bg-dark flex items-center justify-center border border-slate-100 dark:border-slate-800">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                hello@johndoe.com
                            </a>
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-slate-50 dark:bg-dark flex items-center justify-center border border-slate-100 dark:border-slate-800">
                                    <i class="fas fa-location-dot"></i>
                                </div>
                                Jakarta, Indonesia
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <form class="space-y-5">
                            <div>
                                <label for="name" class="sr-only">Name</label>
                                <input type="text" id="name" class="w-full px-5 py-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-darker text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="Your Name">
                            </div>
                            <div>
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" id="email" class="w-full px-5 py-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-darker text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="Your Email">
                            </div>
                            <div>
                                <label for="message" class="sr-only">Message</label>
                                <textarea id="message" rows="4" class="w-full px-5 py-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-darker text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all resize-none" placeholder="How can I help you?"></textarea>
                            </div>
                            <button type="submit" class="w-full py-4 rounded-xl bg-slate-900 dark:bg-primary text-white font-medium hover:bg-slate-800 dark:hover:bg-primaryHover transition-colors shadow-md">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white dark:bg-dark py-12 border-t border-slate-100 dark:border-slate-800">
        <div class="container mx-auto px-6 md:px-12 text-center">
            <a href="#home" class="font-heading text-2xl font-bold tracking-tight text-slate-900 dark:text-white mb-6 inline-block">
                My<span class="text-primary">Porto.</span>
            </a>
            
            <div class="flex justify-center gap-6 mb-8">
                <a href="#" class="text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors text-xl"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors text-xl"><i class="fab fa-github"></i></a>
                <a href="#" class="text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors text-xl"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors text-xl"><i class="fab fa-dribbble"></i></a>
            </div>
            
            <p class="text-slate-500 text-sm">
                &copy; 2026 John Doe. Crafted with minimalism in mind.
            </p>
        </div>
    </footer>

    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Custom Script -->
    <script src="script.js"></script>
</body>
</html>"""

css_content = """/* Custom Styles for Minimalist Portfolio */
html {
    scroll-behavior: smooth;
}

body {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 6px;
}
::-webkit-scrollbar-track {
    background: transparent;
}
::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}
.dark ::-webkit-scrollbar-thumb {
    background: #334155;
}
::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}
.dark ::-webkit-scrollbar-thumb:hover {
    background: #475569;
}

/* Glassmorphism Navbar */
.glass {
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}
.dark .glass {
    background: rgba(15, 23, 42, 0.85);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

/* Gradients */
.text-gradient {
    background: linear-gradient(135deg, #4f46e5, #0ea5e9);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Minimalist Grid Pattern Background */
.bg-grid-pattern {
    background-image: radial-gradient(rgba(0, 0, 0, 0.08) 1px, transparent 1px);
    background-size: 32px 32px;
}
.dark .bg-grid-pattern {
    background-image: radial-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px);
}
"""

js_content = """// Initialize AOS Animation
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

// Theme Initialization
if (!html.classList.contains('dark')) {
    html.classList.add('dark'); // Default to dark for premium modern look
}
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
        ? '<i class="fas fa-sun"></i>' 
        : '<i class="fas fa-moon"></i>';
        
    darkModeBtn.innerHTML = iconHtml;
    darkModeBtnMobile.innerHTML = iconHtml;
}

// Event Listeners for Dark Mode
darkModeBtn.addEventListener('click', toggleDarkMode);
darkModeBtnMobile.addEventListener('click', toggleDarkMode);
"""

import os
with open(r'd:\Laravel\Portfolio\scratch\build.py', 'w', encoding='utf-8') as f:
    f.write(f'''import os

with open(r"d:\\Laravel\\Portfolio\\html_website\\index.html", "w", encoding="utf-8") as f:
    f.write("""{html_content}""")

with open(r"d:\\Laravel\\Portfolio\\html_website\\style.css", "w", encoding="utf-8") as f:
    f.write("""{css_content}""")

with open(r"d:\\Laravel\\Portfolio\\html_website\\script.js", "w", encoding="utf-8") as f:
    f.write("""{js_content}""")

# Also update the blade template if it exists
blade_path = r"d:\\Laravel\\Portfolio\\resources\\views\\portfolio\\index.blade.php"
if os.path.exists(blade_path):
    with open(blade_path, "w", encoding="utf-8") as f:
        f.write("""{html_content}""")
''')

print("Script written to scratch/build.py")
