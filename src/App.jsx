import { useState, useEffect } from 'react';
import { createPortal } from 'react-dom';
import { motion, AnimatePresence } from 'framer-motion';
import { 
  Github, 
  Instagram, 
  Youtube, 
  Twitter, 
  Mail, 
  Phone, 
  ArrowRight, 
  Code, 
  Layout, 
  Server, 
  Smartphone, 
  GraduationCap, 
  Briefcase, 
  CheckCircle2, 
  ExternalLink, 
  Moon, 
  Sun, 
  Menu, 
  X,
  ChevronLeft,
  ChevronRight,
  Rocket,
  Heart,
  Eye,
  TrendingUp,
  Globe,
  Gamepad2,
  Trophy,
  Sparkles
} from 'lucide-react';
import AOS from 'aos';
import 'aos/dist/aos.css';

// --- Data ---
const projects = [
  {
    id: 'pengaduan',
    title: 'Website Pengaduan Sekolah',
    category: 'Pengembangan Fullstack',
    image: '/images/pengaduan-dashboard.png',
    screenshots: [
      '/images/pengaduan-dashboard.png',
      '/images/pengaduan-login.png',
      '/images/pengaduan-create.png'
    ],
    tags: ['Laravel', 'MySQL', 'Tailwind CSS'],
    description: 'Sistem manajemen pengaduan siswa terpadu yang dirancang untuk mempercepat respon pihak sekolah terhadap aspirasi dan kendala siswa secara real-time.',
    features: [
      'Sistem Login Multi-level (Admin, Petugas, Siswa)',
      'Dashboard Statistik Interaktif',
      'Ekspor Laporan Pengaduan ke PDF',
      'Pelacakan Status Pengaduan Berbasis Warna'
    ],
    github: 'https://github.com/Galihnantion/MuhamadGalihSaputraUKKN.git'
  },
  {
    id: 'kasir',
    title: 'Website Kasir (Point of Sale)',
    category: 'Integrasi Sistem',
    image: '/images/kasir-pos.png',
    screenshots: [
      '/images/kasir-pos.png',
      '/images/kasir-laporan.png',
      '/images/kasir-struk.png'
    ],
    tags: ['Java', 'PHP', 'MySQL', 'Vite'],
    description: 'Aplikasi kasir retail modern dengan fitur manajemen stok dan sinkronisasi database untuk operasional toko yang lebih cepat dan terorganisir.',
    features: [
      'Antarmuka Point of Sale (POS) dengan Barcode Scanning',
      'Manajemen Inventaris Otomatis',
      'Laporan Penjualan Harian & Bulanan',
      'Cetak Struk Transaksi Digital'
    ],
    github: 'https://github.com/Galihnantion'
  },
  {
    id: 'info',
    title: 'Website Informasi (Portal)',
    category: 'Desain Web',
    image: null,
    isComingSoon: true,
    tags: ['React', 'Framer Motion', 'API'],
    description: 'Portal berita dan informasi modern dengan fokus pada UX yang responsif dan penyajian konten yang dinamis.',
    github: 'https://github.com/Galihnantion'
  }
];

const certificates = [
  { title: 'CSS Essentials', image: '/images/cert-css-essentials.png', issuer: 'Cisco Networking Academy' },
  { title: 'JS Essentials', image: '/images/cert-js-essentials.png', issuer: 'Cisco Networking Academy' },
  { title: 'Entrepreneurship', image: '/images/cert-entrepreneurship.png', issuer: 'Cisco Networking Academy' }
];

const skills = [
  { name: 'HTML & CSS', icon: <Layout className="w-8 h-8 text-orange-500" /> },
  { name: 'JavaScript', icon: <Code className="w-8 h-8 text-yellow-500" /> },
  { name: 'React.js', icon: <Rocket className="w-8 h-8 text-blue-500" /> },
  { name: 'Tailwind CSS', icon: <Layout className="w-8 h-8 text-cyan-400" /> },
  { name: 'Laravel', icon: <Server className="w-8 h-8 text-red-500" /> },
  { name: 'MySQL', icon: <Server className="w-8 h-8 text-blue-600" /> },
  { name: 'PHP', icon: <Code className="w-8 h-8 text-indigo-400" /> },
  { name: 'Vite', icon: <Rocket className="w-8 h-8 text-purple-500" /> }
];

const education = [
  {
    year: '2023 - 2026',
    school: 'SMK Telkom Lampung',
    major: 'Rekayasa Perangkat Lunak (RPL)',
    description: 'Mendalami pengembangan aplikasi web, algoritma, dan arsitektur database modern.',
    color: 'bg-primary'
  },
  {
    year: '2020 - 2023',
    school: 'SMP N 1 Pesawaran',
    major: 'Akademik Umum',
    description: 'Membangun dasar akademik dan mulai mengeksplorasi dunia teknologi informasi.',
    color: 'bg-secondary'
  },
  {
    year: '2014 - 2020',
    school: 'SD N 38 Pesawaran',
    major: 'Pendidikan Dasar',
    description: 'Awal mula ketertarikan pada bidang logika dan matematika.',
    color: 'bg-slate-400'
  }
];

// --- Components ---

const FloatingIcon = ({ icon: Icon, className, delay = 0, size = 24 }) => (
  <motion.div
    initial={{ opacity: 0 }}
    animate={{ 
      opacity: [0.3, 0.65, 0.3],
      y: [-18, 18, -18],
      x: [-8, 8, -8],
      rotate: [-8, 8, -8]
    }}
    transition={{ 
      duration: 7, 
      repeat: Infinity, 
      delay: delay,
      ease: "easeInOut" 
    }}
    className={`absolute pointer-events-none z-0 ${className}`}
  >
    <div className="p-4 rounded-2xl border border-indigo-400/40 bg-indigo-500/5 shadow-[0_0_25px_4px_rgba(99,102,241,0.25)] transition-all">
      <Icon size={size} className="text-indigo-400/80" />
    </div>
  </motion.div>
);

const Navbar = () => {
  const [isScrolled, setIsScrolled] = useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);
  const [isDark, setIsDark] = useState(true);

  useEffect(() => {
    const handleScroll = () => setIsScrolled(window.scrollY > 50);
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const toggleTheme = () => {
    setIsDark(!isDark);
    document.documentElement.classList.toggle('dark');
  };

  const navLinks = [
    { name: 'Beranda', href: '#home' },
    { name: 'Tentang', href: '#about' },
    { name: 'Pendidikan', href: '#education' },
    { name: 'Sertifikat', href: '#certificates' },
    { name: 'Keahlian', href: '#skills' },
    { name: 'Proyek', href: '#projects' },
    { name: 'Interaktif', href: '#games' },
    { name: 'Kontak', href: '#contact' }
  ];

  return (
    <nav className={`fixed w-full z-50 transition-all duration-500 ${isScrolled ? 'py-4 bg-white/80 dark:bg-slate-950/80 backdrop-blur-xl shadow-lg' : 'py-6 bg-transparent'}`}>
      <div className="container mx-auto px-6 md:px-12 flex justify-between items-center">
        <motion.a 
          href="#home" 
          initial={{ opacity: 0, x: -20 }}
          animate={{ opacity: 1, x: 0 }}
          className="font-heading text-2xl font-bold flex items-center gap-3 group"
        >
          <div className="w-11 h-11 rounded-xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white shadow-lg group-hover:rotate-12 transition-transform text-xl">G</div>
          <span className="text-slate-900 dark:text-white">Galih<span className="text-primary">Sptr</span></span>
        </motion.a>

        {/* Desktop Menu */}
        <div className="hidden xl:flex items-center space-x-8">
          {navLinks.map((link, i) => (
            <motion.a
              key={link.name}
              href={link.href}
              initial={{ opacity: 0, y: -10 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ delay: i * 0.1 }}
              className="text-sm font-bold text-slate-600 dark:text-slate-300 hover:text-primary transition-colors whitespace-nowrap"
            >
              {link.name}
            </motion.a>
          ))}
          <motion.button 
            onClick={toggleTheme}
            whileHover={{ scale: 1.1 }}
            whileTap={{ scale: 0.9 }}
            className="p-2.5 rounded-full bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-300"
          >
            {isDark ? <Sun size={20} /> : <Moon size={20} />}
          </motion.button>
          <motion.a
            href="#contact"
            whileHover={{ scale: 1.05 }}
            whileTap={{ scale: 0.95 }}
            className="px-6 py-3 rounded-full bg-primary text-white text-sm font-bold shadow-lg shadow-primary/20 whitespace-nowrap"
          >
            Hubungi Saya
          </motion.a>
        </div>

        {/* Mobile Menu Button */}
        <div className="xl:hidden flex items-center gap-4">
          <button onClick={toggleTheme} className="w-11 h-11 flex items-center justify-center rounded-full bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-300">
            {isDark ? <Sun size={20} /> : <Moon size={20} />}
          </button>
          <button
            onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
            className="w-12 h-12 flex items-center justify-center rounded-xl bg-slate-100 dark:bg-slate-900 text-slate-900 dark:text-white"
            aria-label="Toggle menu"
          >
            {isMobileMenuOpen ? <X size={24} /> : <Menu size={24} />}
          </button>
        </div>
      </div>

      {/* Mobile Full-Screen Overlay - rendered via Portal so it's always full-screen */}
      {isMobileMenuOpen && createPortal(
        <div
          style={{
            position: 'fixed',
            top: 0,
            left: 0,
            width: '100%',
            height: '100dvh',
            zIndex: 9999,
            background: 'var(--overlay-bg, white)',
            display: 'flex',
            flexDirection: 'column',
            overflowY: 'auto',
          }}
          className="bg-white dark:bg-slate-950 xl:hidden"
        >
          {/* Header */}
          <div className="flex justify-between items-center px-5 py-4 border-b border-slate-100 dark:border-slate-800" style={{ flexShrink: 0 }}>
            <span className="font-heading text-2xl font-bold text-slate-900 dark:text-white">Galih<span className="text-primary">Sptr</span></span>
            <button
              onClick={() => setIsMobileMenuOpen(false)}
              style={{ width: 44, height: 44, display: 'flex', alignItems: 'center', justifyContent: 'center', borderRadius: 12 }}
              className="bg-slate-100 dark:bg-slate-900 text-slate-900 dark:text-white"
            >
              <X size={24} />
            </button>
          </div>

          {/* Links */}
          <div style={{ flex: 1, padding: '16px 24px', display: 'flex', flexDirection: 'column', gap: 4 }}>
            {navLinks.map((link) => (
              <a
                key={link.name}
                href={link.href}
                onClick={() => setIsMobileMenuOpen(false)}
                style={{ display: 'block', padding: '18px 24px', borderRadius: 16, fontSize: 20, fontWeight: 900, touchAction: 'manipulation', WebkitTapHighlightColor: 'transparent' }}
                className="text-slate-900 dark:text-white active:bg-slate-100 dark:active:bg-slate-900"
              >
                {link.name}
              </a>
            ))}
          </div>

          {/* CTA */}
          <div style={{ padding: '16px 24px 40px', flexShrink: 0 }} className="border-t border-slate-100 dark:border-slate-800">
            <a
              href="#contact"
              onClick={() => setIsMobileMenuOpen(false)}
              style={{ display: 'flex', alignItems: 'center', justifyContent: 'center', width: '100%', padding: '14px', borderRadius: 12, fontWeight: 700, fontSize: 16, touchAction: 'manipulation', WebkitTapHighlightColor: 'transparent' }}
              className="bg-primary text-white shadow-lg"
            >
              Hubungi Saya
            </a>
          </div>
        </div>,
        document.body
      )}
    </nav>
  );
};

const ProjectModal = ({ project, onClose }) => {
  const [currentImg, setCurrentImg] = useState(0);

  if (!project) return null;

  const screenshots = project.screenshots || [];

  return (
    <motion.div 
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0 }}
      className="fixed inset-0 z-[100] flex items-center justify-center p-4"
    >
      <div className="absolute inset-0 bg-slate-950/90 backdrop-blur-md" onClick={onClose} />
      <motion.div 
        initial={{ scale: 0.9, opacity: 0, y: 20 }}
        animate={{ scale: 1, opacity: 1, y: 0 }}
        exit={{ scale: 0.9, opacity: 0, y: 20 }}
        className="relative bg-white dark:bg-slate-900 w-full max-w-6xl rounded-[2.5rem] overflow-hidden shadow-2xl flex flex-col lg:flex-row max-h-[90vh]"
      >
        {/* Image Display */}
        <div className="lg:w-[60%] bg-slate-100 dark:bg-black/40 relative flex items-center justify-center p-6 lg:p-12">
          {screenshots.length > 0 ? (
            <>
              <motion.img 
                key={currentImg}
                src={screenshots[currentImg]} 
                initial={{ opacity: 0, x: 20 }}
                animate={{ opacity: 1, x: 0 }}
                className="max-w-full h-auto max-h-[60vh] rounded-2xl shadow-2xl object-cover"
              />
              {screenshots.length > 1 && (
                <div className="absolute inset-x-0 bottom-12 flex justify-center gap-4">
                  <button 
                    onClick={() => setCurrentImg((prev) => (prev - 1 + screenshots.length) % screenshots.length)}
                    className="p-3 rounded-full bg-white/10 backdrop-blur-md text-white hover:bg-white/20 transition-all"
                  >
                    <ChevronLeft size={24} />
                  </button>
                  <button 
                    onClick={() => setCurrentImg((prev) => (prev + 1) % screenshots.length)}
                    className="p-3 rounded-full bg-white/10 backdrop-blur-md text-white hover:bg-white/20 transition-all"
                  >
                    <ChevronRight size={24} />
                  </button>
                </div>
              )}
            </>
          ) : (
            <div className="flex flex-col items-center text-slate-400">
              <Rocket size={64} className="mb-4 opacity-20" />
              <p>Pratinjau gambar tidak tersedia</p>
            </div>
          )}
        </div>

        {/* Info Display */}
        <div className="lg:w-[40%] p-10 flex flex-col h-full bg-white dark:bg-slate-900 overflow-y-auto custom-scrollbar">
          <div className="flex justify-between items-start mb-6">
            <div>
              <span className="text-xs font-bold text-primary uppercase tracking-widest">{project.category}</span>
              <h3 className="text-3xl font-black text-slate-900 dark:text-white mt-1 leading-tight">{project.title}</h3>
            </div>
            <button onClick={onClose} className="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
              <X className="text-slate-500" />
            </button>
          </div>

          <div className="flex flex-wrap gap-2 mb-8">
            {project.tags.map(tag => (
              <span key={tag} className="px-3 py-1 rounded-full bg-slate-100 dark:bg-slate-800 text-[10px] font-bold text-slate-600 dark:text-slate-400">{tag}</span>
            ))}
          </div>

          <p className="text-slate-600 dark:text-slate-400 leading-relaxed mb-8">{project.description}</p>

          <div className="space-y-4 mb-10">
            <h4 className="font-bold text-slate-900 dark:text-white flex items-center gap-2">
              <CheckCircle2 size={18} className="text-primary" /> Fitur Utama
            </h4>
            <div className="grid gap-3">
              {(project.features || []).map((feature, i) => (
                <div key={i} className="flex items-start gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-800">
                  <div className="w-1.5 h-1.5 rounded-full bg-primary mt-2 shrink-0" />
                  <p className="text-sm text-slate-600 dark:text-slate-400">{feature}</p>
                </div>
              ))}
            </div>
          </div>

          <div className="mt-auto pt-6 flex gap-4">
            <a 
              href={project.github} 
              target="_blank" 
              className="flex-1 py-4 rounded-2xl bg-primary text-white font-bold text-center shadow-xl shadow-primary/20 hover:scale-[1.02] transition-transform flex items-center justify-center gap-2"
            >
              <Github size={20} /> Lihat Repositori
            </a>
          </div>
        </div>
      </motion.div>
    </motion.div>
  );
};

const allQuizzes = [
  { q: "Hewan apa yang bisa tidur sambil berdiri?", options: ["Sapi", "Kuda", "Kambing", "Anjing"], a: 1 },
  { q: "Apa planet terbesar di tata surya kita?", options: ["Bumi", "Mars", "Jupiter", "Saturnus"], a: 2 },
  { q: "Siapa penemu bola lampu pijar?", options: ["Albert Einstein", "Nikola Tesla", "Thomas Edison", "Isaac Newton"], a: 2 },
  { q: "Apa nama elemen kimia dengan simbol 'O'?", options: ["Osmium", "Oksigen", "Oganesson", "Emas"], a: 1 },
  { q: "Berapa hasil dari 8 + 5 x 2?", options: ["26", "18", "21", "13"], a: 1 },
  { q: "Apa bahasa pemrograman utama yang berjalan di browser?", options: ["Python", "C++", "JavaScript", "Java"], a: 2 },
  { q: "Apa nama samudra terluas di dunia?", options: ["Pasifik", "Atlantik", "Hindia", "Arktik"], a: 0 },
  { q: "Alat musik yang dimainkan dengan cara digesek adalah?", options: ["Gitar", "Biola", "Seruling", "Piano"], a: 1 },
  { q: "Negara mana yang memiliki peta berbentuk seperti sepatu bot?", options: ["Prancis", "Spanyol", "Italia", "Jerman"], a: 2 },
  { q: "Apa warna yang dihasilkan dari campuran merah dan biru?", options: ["Hijau", "Kuning", "Ungu", "Coklat"], a: 2 }
];

const allRiddles = [
  { q: "Saya selalu ada di depanmu, tetapi tidak pernah bisa dilihat. Apakah saya?", a: ["masa depan", "masadepan"], displayAnswer: "Masa Depan", hint: "Pikirkan tentang waktu." },
  { q: "Saya bisa berbicara tanpa mulut dan mendengar tanpa telinga. Saya tidak punya tubuh, tetapi menjadi hidup dengan angin. Siapakah saya?", a: ["gema"], displayAnswer: "Gema", hint: "Suara pantulan di gua atau tebing." },
  { q: "Semakin banyak kamu mengambilku, semakin banyak yang kamu tinggalkan. Apakah aku?", a: ["jejak langkah", "jejak", "langkah"], displayAnswer: "Jejak Langkah", hint: "Sesuatu yang tertinggal saat kamu berjalan di atas pasir." },
  { q: "Saya memiliki tuts tetapi bukan pintu. Saya memiliki ruang tetapi tidak ada kamar. Kamu bisa masuk tapi tak bisa ke luar. Apakah saya?", a: ["keyboard", "papan ketik"], displayAnswer: "Keyboard", hint: "Alat yang biasa digunakan untuk mengetik." },
  { q: "Apa yang harus dipecahkan sebelum bisa digunakan?", a: ["telur"], displayAnswer: "Telur", hint: "Bahan pembuat kue atau dadar." }
];

const InteractiveSection = () => {
  const [activeTab, setActiveTab] = useState('riddle');
  
  const [currentRiddle, setCurrentRiddle] = useState(allRiddles[0]);
  const [riddleAnswer, setRiddleAnswer] = useState('');
  const [riddleSolved, setRiddleSolved] = useState(false);
  const [riddleError, setRiddleError] = useState(false);
  
  const [activeQuizzes, setActiveQuizzes] = useState([]);
  const [quizScore, setQuizScore] = useState(0);
  const [currentQuiz, setCurrentQuiz] = useState(0);
  const [quizFinished, setQuizFinished] = useState(false);

  useEffect(() => {
    resetQuiz();
    resetRiddle();
  }, []);

  const resetRiddle = () => {
    let newRiddle;
    do {
      newRiddle = allRiddles[Math.floor(Math.random() * allRiddles.length)];
    } while (allRiddles.length > 1 && newRiddle.q === currentRiddle?.q); // avoid same riddle twice in a row
    setCurrentRiddle(newRiddle);
    setRiddleAnswer('');
    setRiddleSolved(false);
    setRiddleError(false);
  };

  const handleRiddleSubmit = (e) => {
    e.preventDefault();
    const ans = riddleAnswer.toLowerCase().trim();
    if(currentRiddle.a.some(validAns => ans.includes(validAns))) {
      setRiddleSolved(true);
      setRiddleError(false);
    } else {
      setRiddleError(true);
      setTimeout(() => setRiddleError(false), 2000);
    }
  };

  const showAnswer = () => {
    setRiddleAnswer(currentRiddle.displayAnswer);
    setRiddleSolved(true);
    setRiddleError(false);
  };

  const handleQuizAnswer = (idx) => {
    if(idx === activeQuizzes[currentQuiz].a) setQuizScore(s => s + 1);
    if(currentQuiz + 1 < activeQuizzes.length) setCurrentQuiz(c => c + 1);
    else setQuizFinished(true);
  };

  const resetQuiz = () => {
    const shuffled = [...allQuizzes].sort(() => 0.5 - Math.random());
    setActiveQuizzes(shuffled.slice(0, 3));
    setCurrentQuiz(0);
    setQuizScore(0);
    setQuizFinished(false);
  };

  return (
    <section id="games" className="section-padding bg-slate-50 dark:bg-slate-950 relative overflow-hidden">
      <FloatingIcon icon={Gamepad2} className="top-20 left-1/4 text-accent" delay={1} size={32} />
      <FloatingIcon icon={Sparkles} className="bottom-20 right-1/4 text-yellow-400" delay={3} size={28} />
      
      <div className="container mx-auto px-6 md:px-12 relative z-10">
        <div className="text-center mb-16 md:mb-20" data-aos="fade-up">
          <span className="text-xs font-black uppercase tracking-[0.3em] text-primary mb-6 block">Interaktif</span>
          <h2 className="text-4xl md:text-6xl font-black text-slate-900 dark:text-white leading-tight mb-4">Waktunya Bersantai</h2>
          <p className="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">Uji kreativitas dan pengetahuanmu dengan teka-teki dan kuis seru.</p>
        </div>

        <div className="max-w-4xl mx-auto glass-dark bg-white/50 dark:bg-slate-900/50 rounded-[3rem] p-6 md:p-10 shadow-2xl backdrop-blur-2xl border border-white/20 dark:border-slate-800/50" data-aos="zoom-in">
          
          {/* Tabs */}
          <div className="flex p-2 bg-slate-100 dark:bg-slate-950 rounded-full mb-8 md:mb-12 shadow-inner">
            <button 
              onClick={() => setActiveTab('riddle')}
              className={`flex-1 py-3 md:py-4 rounded-full font-bold text-sm md:text-base flex items-center justify-center gap-2 transition-all ${activeTab === 'riddle' ? 'bg-primary text-white shadow-lg' : 'text-slate-500 hover:text-slate-900 dark:hover:text-white'}`}
            >
              <Sparkles size={20} /> Teka-Teki
            </button>
            <button 
              onClick={() => setActiveTab('quiz')}
              className={`flex-1 py-3 md:py-4 rounded-full font-bold text-sm md:text-base flex items-center justify-center gap-2 transition-all ${activeTab === 'quiz' ? 'bg-accent text-white shadow-lg' : 'text-slate-500 hover:text-slate-900 dark:hover:text-white'}`}
            >
              <Trophy size={20} /> Kuis Seru
            </button>
          </div>

          {/* Riddle Content */}
          {activeTab === 'riddle' && (
            <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} className="text-center py-4 md:py-8">
              {!riddleSolved ? (
                <>
                  <div className="w-20 h-20 mx-auto bg-primary/10 rounded-3xl flex items-center justify-center mb-8 rotate-12">
                    <Sparkles className="text-primary w-10 h-10 -rotate-12" />
                  </div>
                  <h3 className="text-2xl md:text-3xl font-black text-slate-900 dark:text-white mb-10 leading-relaxed max-w-2xl mx-auto">"{currentRiddle.q}"</h3>
                  <form onSubmit={handleRiddleSubmit} className="max-w-md mx-auto relative mb-6">
                    <input 
                      type="text" 
                      value={riddleAnswer}
                      onChange={(e) => setRiddleAnswer(e.target.value)}
                      placeholder="Ketik jawabanmu..." 
                      className={`w-full px-8 py-5 rounded-full bg-slate-50 dark:bg-slate-950 border-2 ${riddleError ? 'border-red-500' : 'border-slate-200 dark:border-slate-800'} focus:border-primary outline-none text-slate-900 dark:text-white font-bold transition-all shadow-inner text-center text-lg`}
                    />
                    <button type="submit" className="absolute right-3 top-3 bottom-3 px-6 bg-primary text-white rounded-full font-bold shadow-lg hover:bg-primary-dark transition-colors">Cek</button>
                  </form>
                  <button onClick={showAnswer} className="text-sm font-bold text-slate-500 hover:text-primary transition-colors underline underline-offset-4 mb-4 block mx-auto">Menyerah? Lihat Jawaban</button>
                  <button onClick={resetRiddle} className="text-xs font-bold text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors">Lewati & Ganti Teka-Teki</button>
                  <AnimatePresence>
                    {riddleError && <motion.p initial={{ opacity: 0 }} animate={{ opacity: 1 }} exit={{ opacity: 0 }} className="text-red-500 font-bold mt-4">Coba lagi! {currentRiddle.hint}</motion.p>}
                  </AnimatePresence>
                </>
              ) : (
                <motion.div initial={{ scale: 0.8 }} animate={{ scale: 1 }} className="py-10">
                  <div className="w-24 h-24 mx-auto bg-green-500/20 rounded-full flex items-center justify-center mb-6">
                    <Trophy className="text-green-500 w-12 h-12" />
                  </div>
                  <h3 className="text-3xl font-black text-slate-900 dark:text-white mb-4">Luar Biasa! 🎉</h3>
                  <p className="text-lg text-slate-600 dark:text-slate-400">Jawabannya adalah <span className="font-bold text-primary">{currentRiddle.displayAnswer}</span>.</p>
                  <button onClick={resetRiddle} className="mt-8 px-8 py-3 bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-white rounded-full font-bold hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors">Teka-Teki Selanjutnya</button>
                </motion.div>
              )}
            </motion.div>
          )}

          {/* Quiz Content */}
          {activeTab === 'quiz' && activeQuizzes.length > 0 && (
            <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} className="py-4 md:py-8">
              {!quizFinished ? (
                <>
                  <div className="flex justify-between items-center mb-8">
                    <span className="font-bold text-slate-500 uppercase tracking-widest text-xs">Pertanyaan {currentQuiz + 1} / {activeQuizzes.length}</span>
                    <span className="font-bold text-accent">Skor: {quizScore}</span>
                  </div>
                  <h3 className="text-2xl md:text-3xl font-black text-slate-900 dark:text-white mb-10 text-center leading-relaxed">
                    {activeQuizzes[currentQuiz].q}
                  </h3>
                  <div className="grid md:grid-cols-2 gap-4">
                    {activeQuizzes[currentQuiz].options.map((opt, i) => (
                      <button 
                        key={i}
                        onClick={() => handleQuizAnswer(i)}
                        className="p-5 md:p-6 rounded-2xl bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 hover:border-accent hover:bg-accent/5 text-slate-900 dark:text-white font-bold text-lg transition-all group relative overflow-hidden"
                      >
                        <div className="absolute inset-0 bg-accent/10 translate-y-full group-hover:translate-y-0 transition-transform duration-300" />
                        <span className="relative z-10">{opt}</span>
                      </button>
                    ))}
                  </div>
                </>
              ) : (
                <motion.div initial={{ scale: 0.8 }} animate={{ scale: 1 }} className="text-center py-10">
                  <div className="w-24 h-24 mx-auto bg-accent/20 rounded-full flex items-center justify-center mb-6">
                    <Gamepad2 className="text-accent w-12 h-12" />
                  </div>
                  <h3 className="text-3xl font-black text-slate-900 dark:text-white mb-4">Kuis Selesai! 🎮</h3>
                  <p className="text-lg text-slate-600 dark:text-slate-400 mb-8">Kamu menjawab <span className="font-black text-accent text-2xl">{quizScore}</span> dari {activeQuizzes.length} dengan benar.</p>
                  <button onClick={resetQuiz} className="px-8 py-3 bg-accent text-white rounded-full font-bold shadow-lg shadow-accent/20 hover:scale-105 transition-transform">Ganti Soal Lainnya</button>
                </motion.div>
              )}
            </motion.div>
          )}

        </div>
      </div>
    </section>
  );
};

export default function App() {
  const [selectedProject, setSelectedProject] = useState(null);

  useEffect(() => {
    AOS.init({
      once: true,
      duration: 1000,
      easing: 'ease-out-cubic',
      offset: 100,
    });
  }, []);

  return (
    <div className="bg-slate-50 dark:bg-slate-950 overflow-x-hidden">
      <Navbar />

      {/* --- HERO SECTION --- */}
      <section id="home" className="relative min-h-screen flex items-center pt-24 pb-16 overflow-hidden">
        {/* Animated Background Elements */}
        <div className="absolute top-0 right-0 w-[800px] h-[800px] bg-primary/5 rounded-full blur-[120px] -mr-[400px] -mt-[400px]" />
        <div className="absolute bottom-0 left-0 w-[600px] h-[600px] bg-secondary/5 rounded-full blur-[100px] -ml-[300px] -mb-[300px]" />
        
        {/* Floating Background Icons */}
        <FloatingIcon icon={Code} className="top-1/4 left-10" delay={0} size={32} />
        <FloatingIcon icon={Rocket} className="top-1/3 right-20" delay={2} size={28} />
        <FloatingIcon icon={Globe} className="bottom-1/4 left-1/4" delay={4} size={24} />
        <FloatingIcon icon={Smartphone} className="top-20 right-1/4" delay={1} size={20} />
        
        <div className="container mx-auto px-6 md:px-12 z-10">
          <div className="flex flex-col-reverse lg:flex-row items-center justify-between gap-12 lg:gap-16">
            <div className="lg:w-[55%] text-center lg:text-left">
              <motion.div 
                initial={{ opacity: 0, y: 20 }}
                animate={{ opacity: 1, y: 0 }}
                className="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white/50 dark:bg-slate-900/50 backdrop-blur-md border border-slate-200 dark:border-slate-800 text-sm font-semibold mb-8 shadow-sm"
              >
                <span className="relative flex h-2 w-2">
                  <span className="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                  <span className="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                </span>
                <span className="text-slate-600 dark:text-slate-400">Tersedia untuk proyek baru</span>
              </motion.div>

              <motion.h1 
                initial={{ opacity: 0, y: 20 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ delay: 0.1 }}
                className="font-heading text-5xl md:text-7xl lg:text-8xl font-black text-slate-900 dark:text-white leading-[1] tracking-tighter mb-8"
              >
                Hai, Saya <br />
                <span className="text-gradient">Galih Saputra</span>
              </motion.h1>

              <motion.p 
                initial={{ opacity: 0, y: 20 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ delay: 0.2 }}
                className="text-lg md:text-xl text-slate-600 dark:text-slate-400 max-w-xl mx-auto lg:mx-0 leading-relaxed mb-10"
              >
                Seorang <span className="font-bold text-slate-900 dark:text-white underline decoration-primary decoration-4 underline-offset-4">Fullstack Web Developer</span> yang berdedikasi menciptakan pengalaman digital berperforma tinggi dan memukau.
              </motion.p>

              <motion.div 
                initial={{ opacity: 0, y: 20 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ delay: 0.3 }}
                className="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-6"
              >
                <a href="#projects" className="group px-8 py-4 rounded-3xl bg-slate-900 text-white dark:bg-white dark:text-slate-900 font-black text-lg shadow-2xl hover:scale-105 transition-all flex items-center gap-3">
                  Lihat Karya Saya <ArrowRight className="group-hover:translate-x-2 transition-transform" />
                </a>
                <div className="flex items-center gap-4">
                  {[
                    { icon: <Github />, href: 'https://github.com/Galihnantion' },
                    { icon: <Instagram />, href: 'https://www.instagram.com/galhsptrrr/' },
                    { icon: <Twitter />, href: '#' }
                  ].map((social, i) => (
                    <motion.a 
                      key={i}
                      whileHover={{ y: -5 }}
                      href={social.href} 
                      className="p-4 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 hover:text-primary transition-colors shadow-sm"
                    >
                      {social.icon}
                    </motion.a>
                  ))}
                </div>
              </motion.div>
            </div>

            <motion.div 
              initial={{ opacity: 0, scale: 0.8 }}
              animate={{ opacity: 1, scale: 1 }}
              transition={{ duration: 1, ease: "easeOut" }}
              className="lg:w-[45%] flex justify-center relative"
            >
              <div className="relative w-72 h-72 md:w-[450px] md:h-[450px] flex items-center justify-center">
                
                {/* Circular Text Animation */}
                <motion.div 
                  animate={{ rotate: 360 }}
                  transition={{ duration: 15, repeat: Infinity, ease: "linear" }}
                  className="absolute inset-0 z-0"
                >
                  <svg viewBox="0 0 100 100" className="w-full h-full opacity-30 dark:opacity-20 fill-primary dark:fill-primary">
                    <path id="circlePath" d="M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0" fill="transparent" />
                    <text className="text-[6.5px] font-black uppercase tracking-[2px]">
                      <textPath xlinkHref="#circlePath">
                        • Fullstack Developer • UI/UX Enthusiast • Innovator • Code Architect •
                      </textPath>
                    </text>
                  </svg>
                </motion.div>

                {/* Floating Icons */}
                <motion.div 
                  animate={{ y: [0, -20, 0], rotate: [0, 10, 0] }}
                  transition={{ duration: 5, repeat: Infinity, ease: "easeInOut" }}
                  className="absolute top-6 left-6 z-20 w-12 h-12 md:w-16 md:h-16 bg-white dark:bg-slate-900 rounded-2xl shadow-2xl flex items-center justify-center text-indigo-400 border border-slate-100 dark:border-slate-800"
                >
                  <Code className="w-6 h-6 md:w-8 md:h-8" />
                </motion.div>
                
                <motion.div 
                  animate={{ y: [0, 20, 0], rotate: [0, -15, 0] }}
                  transition={{ duration: 6, repeat: Infinity, ease: "easeInOut", delay: 1 }}
                  className="absolute bottom-6 right-6 z-20 w-12 h-12 md:w-16 md:h-16 bg-white dark:bg-slate-900 rounded-2xl shadow-2xl flex items-center justify-center text-cyan-400 border border-slate-100 dark:border-slate-800"
                >
                  <Layout className="w-6 h-6 md:w-8 md:h-8" />
                </motion.div>

                {/* Main Photo Container */}
                <div className="relative z-10 w-[85%] h-[85%] rounded-[4rem] md:rounded-[5rem] overflow-hidden border-8 border-white dark:border-slate-900 shadow-2xl bg-slate-200 dark:bg-slate-800 group">
                  <img 
                    src="/images/profile-galih.png" 
                    alt="Galih Saputra" 
                    className="w-full h-full object-cover scale-110 object-top brightness-110 group-hover:scale-125 transition-transform duration-1000" 
                  />
                  <div className="absolute inset-0 bg-gradient-to-t from-primary/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity" />
                </div>

                {/* Floating Keahlian Tag */}
                <div className="absolute bottom-16 -left-6 md:-left-10 glass-dark p-4 md:p-6 rounded-3xl shadow-xl flex items-center gap-4 z-20 animate-float hidden md:flex">
                  <div className="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-orange-500/20 flex items-center justify-center text-orange-500"><Code size={24} /></div>
                  <div>
                    <p className="text-[10px] font-black text-slate-500 uppercase">Keahlian</p>
                    <p className="font-black text-slate-900 dark:text-white">Coding</p>
                  </div>
                </div>
              </div>
            </motion.div>
          </div>
        </div>
      </section>

      {/* --- ABOUT SECTION --- */}
      <section id="about" className="section-padding bg-white dark:bg-slate-950 overflow-hidden relative">
        <FloatingIcon icon={Heart} className="top-20 right-10" delay={1} size={30} />
        <FloatingIcon icon={CheckCircle2} className="bottom-20 left-10" delay={3} size={24} />
        <div className="container mx-auto px-6 md:px-12">
          <div className="flex flex-col lg:flex-row items-center gap-16 lg:gap-24">
            <div className="lg:w-1/2 relative" data-aos="fade-right">
              <div className="grid grid-cols-2 gap-4 md:gap-6">
                {[
                  { icon: <Rocket className="text-primary" />, title: 'Ambisi', desc: 'Menargetkan standar pengembangan kelas dunia.' },
                  { icon: <Heart className="text-accent" />, title: 'Semangat', desc: 'Mencintai seni coding dan desain kreatif.' },
                  { icon: <Eye className="text-secondary" />, title: 'Visi', desc: 'Menciptakan produk digital yang intuitif dan bermakna.' },
                  { icon: <TrendingUp className="text-green-500" />, title: 'Pertumbuhan', desc: 'Terus belajar dan berkembang mengikuti teknologi.' }
                ].map((item, i) => (
                  <div key={i} className="p-6 md:p-8 rounded-[2rem] md:rounded-[2.5rem] bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-800 shadow-sm hover:shadow-xl transition-all group">
                    <div className="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-white dark:bg-black/20 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-sm">{item.icon}</div>
                    <h4 className="text-lg md:text-xl font-bold text-slate-900 dark:text-white mb-2">{item.title}</h4>
                    <p className="text-xs md:text-sm text-slate-500 dark:text-slate-400 leading-relaxed">{item.desc}</p>
                  </div>
                ))}
              </div>
            </div>

            <div className="lg:w-1/2" data-aos="fade-left">
              <span className="text-xs font-black uppercase tracking-[0.3em] text-primary mb-6 block">Biografi</span>
              <h2 className="text-4xl md:text-6xl font-black text-slate-900 dark:text-white mb-8 leading-tight">
                Mengubah Imajinasi Menjadi <span className="text-primary italic">Realitas Digital.</span>
              </h2>
              <div className="space-y-6 text-lg md:text-xl text-slate-600 dark:text-slate-400 leading-relaxed">
                <p>Saya adalah seorang pengembang yang bersemangat dengan antusiasme mendalam untuk mengeksplorasi ekosistem teknologi modern. Spesialisasi dalam <span className="font-bold text-primary">Pengembangan Frontend & Backend</span>, saya menjembatani kesenjangan antara logika kompleks dan antarmuka pengguna yang indah.</p>
                <p>Perjalanan saya didorong oleh komitmen untuk mengubah ide-ide konseptual menjadi solusi digital intuitif dan berperforma tinggi yang memberikan dampak nyata.</p>
              </div>

              <div className="grid grid-cols-2 gap-8 md:gap-12 mt-12">
                <div>
                  <h4 className="text-4xl md:text-5xl font-black text-slate-900 dark:text-white mb-2">3+</h4>
                  <p className="text-[10px] md:text-xs font-black uppercase tracking-widest text-slate-500">Proyek Utama</p>
                </div>
                <div>
                  <h4 className="text-4xl md:text-5xl font-black text-slate-900 dark:text-white mb-2">100%</h4>
                  <p className="text-[10px] md:text-xs font-black uppercase tracking-widest text-slate-500">Tingkat Dedikasi</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* --- EDUCATION & EXPERIENCE --- */}
      <section id="education" className="section-padding bg-slate-50 dark:bg-slate-950 relative overflow-hidden">
        <FloatingIcon icon={GraduationCap} className="top-1/4 right-20" delay={2} size={32} />
        <FloatingIcon icon={Briefcase} className="bottom-1/4 left-20" delay={5} size={28} />
        <div className="container mx-auto px-6 md:px-12">
          <div className="grid lg:grid-cols-2 gap-16 lg:gap-20">
            {/* Education */}
            <div data-aos="fade-up">
              <div className="flex items-center gap-4 mb-12">
                <div className="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-primary/10 flex items-center justify-center text-primary"><GraduationCap size={28} /></div>
                <h2 className="text-3xl md:text-4xl font-black text-slate-900 dark:text-white">Pendidikan</h2>
              </div>
              <div className="relative ml-7 pl-10 md:pl-12 border-l-2 border-slate-200 dark:border-slate-800">
                {/* Animated Line Overlay */}
                <motion.div 
                  initial={{ height: 0 }}
                  whileInView={{ height: '100%' }}
                  transition={{ duration: 2, ease: "easeInOut" }}
                  className="absolute left-[-2px] top-0 w-1 bg-gradient-to-b from-primary via-secondary to-accent shadow-[0_0_15px_rgba(79,70,229,0.5)] z-10"
                />

                <div className="space-y-12 md:space-y-16">
                  {education.map((edu, i) => (
                    <div key={i} className="relative group">
                      <div className={`absolute -left-[56px] md:-left-[58px] top-0 w-4 h-4 md:w-5 md:h-5 rounded-full ${edu.color} border-4 border-white dark:border-slate-950 group-hover:scale-150 transition-transform shadow-lg z-20`} />
                      <span className="text-xs font-bold text-primary uppercase tracking-widest">{edu.year}</span>
                      <h3 className="text-xl md:text-2xl font-black text-slate-900 dark:text-white mt-2 group-hover:text-primary transition-colors">{edu.school}</h3>
                      <p className="text-sm md:text-base text-slate-500 font-bold mb-4">{edu.major}</p>
                      <p className="text-sm md:text-base text-slate-600 dark:text-slate-400 leading-relaxed max-w-lg">{edu.description}</p>
                    </div>
                  ))}
                </div>
              </div>
            </div>

            {/* Experience */}
            <div data-aos="fade-up" data-aos-delay="200">
              <div className="flex items-center gap-4 mb-12">
                <div className="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary"><Briefcase size={28} /></div>
                <h2 className="text-3xl md:text-4xl font-black text-slate-900 dark:text-white">Pengalaman</h2>
              </div>
              <div className="grid gap-6 md:gap-8">
                {[
                  { company: 'Universitas Aisyah Pringsewu', role: 'Magang Perkantoran', time: 'Magang Jangka Pendek', desc: 'Mengelola administrasi kantor dan pengarsipan dokumen digital menggunakan perangkat produktivitas modern.' },
                  { company: 'Organisasi Profesional', role: 'Petugas Bendahara', time: 'Partisipasi Berkelanjutan', desc: 'Bertanggung jawab atas manajemen keuangan, penganggaran, dan pelaporan transaksi yang detail.' }
                ].map((exp, i) => (
                  <div key={i} className="p-6 md:p-8 rounded-[2rem] md:rounded-[2.5rem] bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 shadow-sm hover:shadow-xl transition-all hover:-translate-y-2">
                    <div className="flex flex-col md:flex-row justify-between items-start md:items-center mb-4 md:mb-6 gap-2">
                      <h3 className="text-xl md:text-2xl font-black text-slate-900 dark:text-white">{exp.company}</h3>
                      <span className="px-3 py-1 rounded-full bg-slate-50 dark:bg-slate-800 text-[10px] font-black uppercase text-slate-500">{exp.time}</span>
                    </div>
                    <p className="text-primary font-bold mb-4">{exp.role}</p>
                    <p className="text-sm md:text-base text-slate-600 dark:text-slate-400 leading-relaxed">{exp.desc}</p>
                  </div>
                ))}
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* --- SKILLS SECTION --- */}
      <section id="skills" className="section-padding bg-white dark:bg-slate-950 relative overflow-hidden">
        <FloatingIcon icon={Code} className="top-10 left-1/2" delay={1} size={24} />
        <FloatingIcon icon={Server} className="bottom-10 right-1/4" delay={4} size={28} />
        <div className="container mx-auto px-6 md:px-12">
          <div className="text-center mb-16 md:mb-20" data-aos="fade-up">
            <span className="text-xs font-black uppercase tracking-[0.3em] text-primary mb-6 block">Teknologi</span>
            <h2 className="text-4xl md:text-6xl font-black text-slate-900 dark:text-white">Keahlian Utama</h2>
          </div>
          <div className="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
            {skills.map((skill, i) => (
              <motion.div 
                key={i}
                whileHover={{ y: -10 }}
                className="p-6 md:p-10 rounded-[2rem] md:rounded-[3rem] bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-800 shadow-sm flex flex-col items-center group"
                data-aos="zoom-in"
                data-aos-delay={i * 50}
              >
                <div className="mb-4 md:mb-6 transform group-hover:scale-125 transition-transform duration-500">{skill.icon}</div>
                <h4 className="font-black text-slate-900 dark:text-white text-base md:text-lg">{skill.name}</h4>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* --- PROJECTS SECTION --- */}
      <section id="projects" className="section-padding bg-slate-50 dark:bg-slate-950 relative overflow-hidden">
        <FloatingIcon icon={ExternalLink} className="top-20 left-10" delay={2} size={26} />
        <FloatingIcon icon={Layout} className="bottom-40 right-10" delay={0} size={32} />
        <div className="container mx-auto px-6 md:px-12">
          <div className="flex flex-col md:flex-row justify-between items-end mb-16 md:mb-20 gap-8" data-aos="fade-up">
            <div className="max-w-2xl">
              <span className="text-xs font-black uppercase tracking-[0.3em] text-primary mb-6 block">Portofolio</span>
              <h2 className="text-4xl md:text-6xl font-black text-slate-900 dark:text-white leading-tight">Proyek Pilihan</h2>
            </div>
            <a href="#" className="flex items-center gap-3 font-black text-slate-900 dark:text-white hover:text-primary transition-colors group">
              Lihat Semua Proyek <div className="w-10 h-10 md:w-12 md:h-12 rounded-full border border-slate-200 dark:border-slate-800 flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-all"><ArrowRight size={20} /></div>
            </a>
          </div>

          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
            {projects.map((project, i) => (
              <div 
                key={i} 
                data-aos="fade-up" 
                data-aos-delay={i * 100}
                className={`relative rounded-[2.5rem] md:rounded-[3.5rem] p-[2px] overflow-hidden group shadow-lg hover:shadow-2xl transition-all duration-700 ${project.isComingSoon ? 'grayscale' : ''}`}
              >
                {/* Moving Border Beam Effect */}
                {!project.isComingSoon && (
                  <div className="absolute inset-0 z-0">
                    <motion.div 
                      animate={{ 
                        rotate: [0, 360] 
                      }}
                      transition={{ 
                        duration: 4, 
                        repeat: Infinity, 
                        ease: "linear" 
                      }}
                      className="absolute top-[-50%] left-[-50%] w-[200%] h-[200%] bg-[conic-gradient(transparent,transparent,transparent,#6366f1,#0ea5e9,transparent)] opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                    />
                  </div>
                )}

                <div className="relative z-10 h-full w-full bg-white dark:bg-slate-900 rounded-[2.4rem] md:rounded-[3.4rem] overflow-hidden">
                  {project.isComingSoon && (
                    <div className="absolute top-6 right-6 z-20 px-4 py-1.5 bg-accent/20 backdrop-blur-md text-accent text-[10px] font-black uppercase tracking-[0.2em] rounded-full border border-accent/30 animate-pulse">
                      Segera Hadir
                    </div>
                  )}
                  
                  <div className="relative h-60 md:h-72 overflow-hidden bg-slate-200 dark:bg-slate-800 flex items-center justify-center">
                    {project.image ? (
                      <img 
                        src={project.image} 
                        alt={project.title} 
                        className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000" 
                      />
                    ) : (
                      <Rocket size={48} className="text-slate-400 opacity-20 group-hover:scale-125 transition-transform duration-700" />
                    )}
                    
                    {!project.isComingSoon && (
                      <div className="absolute inset-0 bg-slate-950/80 opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-center justify-center gap-6">
                        <button 
                          onClick={() => setSelectedProject(project)}
                          className="px-6 md:px-8 py-2.5 md:py-3.5 bg-primary text-white rounded-2xl font-black shadow-xl hover:scale-110 transition-all text-sm"
                        >
                          Detail
                        </button>
                        <a href={project.github} target="_blank" className="p-2.5 md:p-3.5 bg-white text-slate-900 rounded-2xl font-black shadow-xl hover:scale-110 transition-all">
                          <Github className="w-5 h-5 md:w-6 md:h-6" />
                        </a>
                      </div>
                    )}
                    {project.isComingSoon && (
                      <div className="absolute inset-0 bg-slate-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <span className="text-white font-black text-[10px] uppercase tracking-[0.3em]">Dalam Pengembangan</span>
                      </div>
                    )}
                  </div>

                  <div className="p-8 md:p-10">
                    <span className="text-[10px] font-black text-primary uppercase tracking-widest">{project.category}</span>
                    <h3 className="text-xl md:text-2xl font-black text-slate-900 dark:text-white mt-2 mb-4 group-hover:text-primary transition-colors">{project.title}</h3>
                    <div className="flex flex-wrap gap-2">
                      {project.tags.map(tag => (
                        <span key={tag} className="px-3 py-1 rounded-full bg-slate-100 dark:bg-slate-800 text-[10px] font-bold text-slate-500">{tag}</span>
                      ))}
                    </div>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* --- INTERACTIVE GAMES --- */}
      <InteractiveSection />

      {/* --- CERTIFICATES --- */}
      <section id="certificates" className="section-padding bg-white dark:bg-slate-950">
        <div className="container mx-auto px-6 md:px-12">
          <div className="text-center mb-16 md:mb-20" data-aos="fade-up">
            <span className="text-xs font-black uppercase tracking-[0.3em] text-primary mb-6 block">Validasi</span>
            <h2 className="text-4xl md:text-6xl font-black text-slate-900 dark:text-white leading-tight">Sertifikasi Profesional</h2>
          </div>
          <div className="grid md:grid-cols-3 gap-6 md:gap-8">
            {certificates.map((cert, i) => (
              <div 
                key={i} 
                data-aos="fade-up" 
                data-aos-delay={i * 100}
                className="p-8 md:p-10 rounded-[2.5rem] md:rounded-[3rem] bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-800 group hover:shadow-2xl transition-all relative overflow-hidden"
              >
                {/* Cisco Glowing Badge Overlay */}
                <div className="absolute top-4 right-4 md:top-6 md:right-6 z-10 px-3 py-1.5 md:px-4 md:py-2 bg-primary/20 backdrop-blur-md rounded-xl border border-primary/40 flex items-center gap-2 animate-pulse shadow-[0_0_20px_rgba(79,70,229,0.4)]">
                   <Globe size={14} className="text-primary" />
                   <span className="text-[10px] font-black uppercase tracking-widest text-primary">Cisco Terverifikasi</span>
                </div>

                <div className="relative aspect-[4/3] rounded-3xl overflow-hidden mb-6 md:mb-8 bg-slate-200 dark:bg-slate-800">
                  <img src={cert.image} alt={cert.title} className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                  <div className="absolute inset-0 bg-primary/10 opacity-0 group-hover:opacity-100 transition-opacity" />
                </div>
                <div className="mb-4">
                  <span className="text-[10px] font-black text-primary uppercase tracking-[0.3em] drop-shadow-[0_0_10px_rgba(99,102,241,0.8)] animate-pulse">
                    Cisco Networking Academy
                  </span>
                </div>
                <h3 className="text-xl md:text-2xl font-black text-slate-900 dark:text-white mb-2">{cert.title}</h3>
                <p className="text-xs md:text-sm font-bold text-slate-500 mb-6">{cert.issuer}</p>
                
                <div className="w-full h-1 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                   <motion.div 
                     initial={{ width: 0 }}
                     whileInView={{ width: '100%' }}
                     transition={{ duration: 1.5, delay: 0.5 }}
                     className="h-full bg-gradient-to-r from-primary to-secondary"
                   />
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* --- CONTACT SECTION --- */}
      <section id="contact" className="section-padding bg-slate-50 dark:bg-slate-950">
        <div className="container mx-auto px-6 md:px-12">
          <div className="max-w-6xl mx-auto rounded-[3rem] md:rounded-[4rem] overflow-hidden bg-slate-900 dark:bg-slate-900 shadow-2xl relative">
            {/* Background Accents */}
            <div className="absolute top-0 right-0 w-96 h-96 bg-primary/20 rounded-full blur-[100px] -mr-48 -mt-48" />
            
            <div className="flex flex-col lg:flex-row relative z-10">
              <div className="lg:w-2/5 p-10 md:p-16 text-white bg-gradient-to-br from-primary to-primary-dark">
                <span className="text-xs font-black uppercase tracking-[0.3em] opacity-60 mb-6 block">Kontak</span>
                <h2 className="text-4xl md:text-5xl font-black mb-8 leading-tight">Mari Diskusikan Proyek Anda.</h2>
                <p className="text-white/70 text-lg mb-12">Saya selalu terbuka untuk proyek baru, ide kreatif, atau kesempatan untuk menjadi bagian dari visi Anda.</p>
                
                <div className="space-y-8">
                  <div className="flex items-center gap-6">
                    <div className="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-white/10 flex items-center justify-center"><Mail size={24} /></div>
                    <div>
                      <p className="text-[10px] font-black uppercase opacity-60">Email Saya</p>
                      <p className="text-sm sm:text-base md:text-lg font-bold break-all md:break-normal">galihsaputra3139@gmail.com</p>
                    </div>
                  </div>
                  <div className="flex items-center gap-6">
                    <div className="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-white/10 flex items-center justify-center"><Phone size={24} /></div>
                    <div>
                      <p className="text-[10px] font-black uppercase opacity-60">WhatsApp</p>
                      <p className="text-base md:text-lg font-bold">+62 831 3411 0144</p>
                    </div>
                  </div>
                </div>
              </div>

              <div className="lg:w-3/5 p-10 md:p-20 bg-white dark:bg-slate-900">
                <form 
                  onSubmit={(e) => {
                    e.preventDefault();
                    const name = e.target[0].value;
                    const email = e.target[1].value;
                    const message = e.target[2].value;
                    const whatsappUrl = `https://wa.me/6283134110144?text=${encodeURIComponent(
                      `Halo Galih,\n\nSaya ${name} (${email}).\n\n${message}`
                    )}`;
                    window.open(whatsappUrl, '_blank');
                  }}
                  className="space-y-6 md:space-y-8"
                >
                  <div className="grid md:grid-cols-2 gap-6 md:gap-8">
                    <div className="space-y-4">
                      <label className="text-[10px] md:text-xs font-black uppercase tracking-widest text-slate-400">Nama Lengkap</label>
                      <input required type="text" className="w-full px-6 md:px-8 py-4 md:py-5 rounded-2xl md:rounded-3xl bg-slate-50 dark:bg-slate-800 border-none focus:ring-4 ring-primary/20 outline-none transition-all text-slate-900 dark:text-white font-bold" placeholder="Nama Anda" />
                    </div>
                    <div className="space-y-4">
                      <label className="text-[10px] md:text-xs font-black uppercase tracking-widest text-slate-400">Alamat Email</label>
                      <input required type="email" className="w-full px-6 md:px-8 py-4 md:py-5 rounded-2xl md:rounded-3xl bg-slate-50 dark:bg-slate-800 border-none focus:ring-4 ring-primary/20 outline-none transition-all text-slate-900 dark:text-white font-bold" placeholder="email@contoh.com" />
                    </div>
                  </div>
                  <div className="space-y-4">
                    <label className="text-[10px] md:text-xs font-black uppercase tracking-widest text-slate-400">Pesan</label>
                    <textarea required rows="4" className="w-full px-6 md:px-8 py-4 md:py-5 rounded-2xl md:rounded-3xl bg-slate-50 dark:bg-slate-800 border-none focus:ring-4 ring-primary/20 outline-none transition-all text-slate-900 dark:text-white font-bold resize-none" placeholder="Ceritakan tentang proyek Anda..." />
                  </div>
                  <button type="submit" className="w-full py-5 md:py-6 rounded-[1.5rem] md:rounded-[2rem] bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-black text-lg md:text-xl shadow-2xl hover:scale-[1.02] active:scale-95 transition-all">
                    Kirim Pesan
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* --- FOOTER --- */}
      <footer className="py-16 md:py-20 bg-white dark:bg-slate-950 text-center">
        <div className="container mx-auto px-6">
          <a href="#home" className="font-heading text-3xl md:text-4xl font-black text-slate-900 dark:text-white mb-8 md:mb-10 flex items-center justify-center gap-3">
            <div className="w-10 h-10 md:w-12 md:h-12 rounded-2xl bg-primary flex items-center justify-center text-white text-lg md:text-xl">G</div>
            Galih<span className="text-primary">Sptr</span>
          </a>
          
          <div className="flex justify-center gap-4 md:gap-6 mb-10 md:mb-12">
            {[
              { icon: <Github />, href: '#' },
              { icon: <Instagram />, href: '#' },
              { icon: <Youtube />, href: '#' },
              { icon: <Twitter />, href: '#' }
            ].map((social, i) => (
              <a key={i} href={social.href} className="w-14 h-14 md:w-16 md:h-16 rounded-[1.5rem] md:rounded-[2rem] bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-800 flex items-center justify-center text-slate-600 hover:text-primary transition-all hover:-translate-y-2">
                {social.icon}
              </a>
            ))}
          </div>

          <p className="text-xs md:text-sm text-slate-500 font-bold">
            &copy; {new Date().getFullYear()} Muhamad Galih Saputra. SMK Telkom Lampung.
          </p>
        </div>
      </footer>

      {/* --- PROJECT MODAL --- */}
      <AnimatePresence>
        {selectedProject && (
          <ProjectModal 
            project={selectedProject} 
            onClose={() => setSelectedProject(null)} 
          />
        )}
      </AnimatePresence>
    </div>
  );
}
