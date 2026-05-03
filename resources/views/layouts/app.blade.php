<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Web Developer Modern & Futuristik</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-dark: #000000;
            --secondary-dark: #15ff00;
            --accent-neon: #00ffff;
            --text-light: #ffffff;
            --text-muted: #b0b0b0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--primary-dark);
            color: var(--text-light);
            overflow-x: hidden;
            line-height: 1.6;
        }

        .loading-bar {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            background: var(--accent-neon);
            width: 0;
            z-index: 9999;
            animation: loadingBar 1.5s ease-out forwards;
        }

        @keyframes loadingBar {
            0% { width: 0; }
            50% { width: 70%; }
            100% { width: 100%; }
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 255, 255, 0.3);
            z-index: 1000;
            padding: 1rem 2rem;
        }

        nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--accent-neon);
            font-family: 'Courier New', monospace;
            letter-spacing: 2px;
            text-transform: uppercase;
            animation: glowPulse 2s ease-in-out infinite;
        }

        @keyframes glowPulse {
            0%, 100% { text-shadow: 0 0 20px rgba(0, 255, 255, 0.5), 0 0 40px rgba(0, 255, 255, 0.3); }
            50% { text-shadow: 0 0 40px rgba(0, 255, 255, 0.8), 0 0 80px rgba(0, 255, 255, 0.5); }
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-light);
            text-decoration: none;
            font-size: 0.95rem;
            position: relative;
            transition: color 0.3s ease;
            letter-spacing: 0.5px;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent-neon);
            transition: width 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--accent-neon);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: linear-gradient(135deg, #000000 0%, #0a0a0a 100%);
            position: relative;
            overflow: hidden;
            margin-top: 60px;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 50%, rgba(0, 255, 255, 0.15) 0%, transparent 50%),
                        radial-gradient(circle at 80% 80%, rgba(0, 255, 255, 0.1) 0%, transparent 50%);
            animation: floatBg 15s ease-in-out infinite;
        }

        @keyframes floatBg {
            0%, 100% { transform: translate(0, 0); }
            33% { transform: translate(50px, -50px); }
            66% { transform: translate(-50px, 50px); }
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            padding: 2rem;
        }

        .hero h1 {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: var(--accent-neon);
            text-shadow: 0 0 30px rgba(0, 255, 255, 0.5), 0 0 60px rgba(0, 255, 255, 0.3);
            animation: slideInDown 0.8s ease-out;
            font-weight: 800;
            letter-spacing: -1px;
        }

        @keyframes slideInDown {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: var(--text-light);
            margin-bottom: 2rem;
            animation: slideInDown 0.8s ease-out 0.2s backwards;
        }

        .hero-description {
            font-size: 1.1rem;
            color: var(--text-muted);
            margin-bottom: 3rem;
            animation: slideInDown 0.8s ease-out 0.4s backwards;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: slideInDown 0.8s ease-out 0.6s backwards;
        }

        .btn {
            padding: 1rem 2rem;
            font-size: 1rem;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-primary {
            background: var(--accent-neon);
            color: var(--primary-dark);
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.4), 0 0 40px rgba(0, 255, 255, 0.2);
        }

        .btn-primary:hover {
            box-shadow: 0 0 40px rgba(0, 255, 255, 0.8), 0 0 80px rgba(0, 255, 255, 0.5);
            transform: translateY(-3px);
        }

        .btn-secondary {
            background: transparent;
            color: var(--accent-neon);
            border: 2px solid var(--accent-neon);
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(0, 255, 255, 0.1);
            box-shadow: 0 0 30px rgba(0, 255, 255, 0.6), 0 0 60px rgba(0, 255, 255, 0.3);
            transform: translateY(-3px);
        }

        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateX(-50%) translateY(0); }
            50% { transform: translateX(-50%) translateY(15px); }
        }

        .about {
            padding: 6rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-image {
            position: relative;
            display: flex;
            justify-content: center;
        }

        .profile-circle {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(0, 255, 255, 0.05);
            border: 3px solid var(--accent-neon);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 0 30px rgba(0, 255, 255, 0.5), inset 0 0 30px rgba(0, 255, 255, 0.1);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(deg); }
        }

        .profile-circle::before {
            content: '';
            position: absolute;
            width: 310px;
            height: 310px;
            border-radius: 50%;
            border: 2px dashed var(--accent-neon);
            animation: rotateReverse 20s linear infinite reverse;
        }

        @keyframes rotateReverse {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .profile-circle img {
            width: 280px;
            height: 280px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--accent-neon);
        }

        .profile-circle::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.23), transparent);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .about-content h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--accent-neon);
            text-shadow: 0 0 20px rgba(0, 255, 255, 0.4);
        }

        .about-content p {
            color: var(--text-muted);
            font-size: 1rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .about-skills {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .skill-badge {
            background: rgba(0, 255, 255, 0.1);
            border: 1px solid var(--accent-neon);
            color: var(--accent-neon);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .skill-badge:hover {
            background: rgba(0, 255, 255, 0.2);
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.6), 0 0 30px rgba(0, 255, 255, 0.3);
        }

        .skills {
            padding: 6rem 2rem;
            background: linear-gradient(180deg, transparent, rgba(0, 255, 255, 0.05));
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 4rem;
            color: var(--accent-neon);
            text-shadow: 0 0 20px rgba(0, 255, 255, 0.4);
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .skill-card {
            background: rgba(0, 255, 255, 0.05);
            border: 1px solid rgba(0, 255, 255, 0.2);
            padding: 2rem;
            border-radius: 15px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .skill-card:hover {
            background: rgba(0, 255, 255, 0.1);
            border-color: var(--accent-neon);
            box-shadow: 0 0 30px rgba(0, 255, 255, 0.4), inset 0 0 30px rgba(0, 255, 255, 0.1);
            transform: translateY(-10px);
        }

        .skill-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--accent-neon);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.6);
        }

        .skill-card:hover::before {
            transform: scaleX(1);
        }

        .skill-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .skill-card h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--accent-neon);
        }

        .skill-description {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }

        .progress-bar {
            background: rgba(0, 255, 255, 0.1);
            height: 8px;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid rgba(0, 255, 255, 0.2);
        }

        .progress-fill {
            height: 100%;
            background: var(--accent-neon);
            border-radius: 10px;
            animation: fillProgress 1s ease-out forwards;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.8), 0 0 20px rgba(0, 255, 255, 0.4);
        }

        @keyframes fillProgress {
            from { width: 0; }
            to { width: var(--progress, 85%); }
        }

        .portfolio {
            padding: 6rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .portfolio-card {
            background: rgba(0, 255, 255, 0.05);
            border: 1px solid rgba(0, 255, 255, 0.2);
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .portfolio-card:hover {
            border-color: var(--accent-neon);
            box-shadow: 0 0 30px rgba(0, 255, 255, 0.4), inset 0 0 30px rgba(0, 255, 255, 0.1);
            transform: translateY(-10px);
        }

        .portfolio-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, rgba(0, 255, 255, 0.1), rgba(0, 255, 255, 0.05));
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .portfolio-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .portfolio-content {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .portfolio-card h3 {
            color: var(--accent-neon);
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .portfolio-card .category {
            color: var(--accent-neon);
            font-size: 0.85rem;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .portfolio-card .description {
            color: var(--text-muted);
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1rem;
            flex-grow: 1;
        }

        .technologies {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .tech-tag {
            background: rgba(0, 255, 255, 0.1);
            border: 1px solid var(--accent-neon);
            color: var(--accent-neon);
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.75rem;
            text-transform: uppercase;
        }

        .portfolio-actions {
            display: flex;
            gap: 1rem;
        }

        .btn-link, .btn-details {
            flex: 1;
            padding: 0.7rem;
            text-align: center;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-link {
            background: var(--accent-neon);
            color: var(--primary-dark);
        }

        .btn-link:hover {
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.6), 0 0 30px rgba(0, 255, 255, 0.3);
        }

        .btn-details {
            background: transparent;
            border: 1px solid var(--accent-neon);
            color: var(--accent-neon);
        }

        .btn-details:hover {
            background: rgba(0, 255, 255, 0.1);
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.6), 0 0 30px rgba(0, 255, 255, 0.3);
        }

        .timeline {
            padding: 6rem 2rem;
            background: linear-gradient(180deg, rgba(0, 255, 255, 0.05), transparent);
            max-width: 1200px;
            margin: 0 auto;
        }

        .timeline-container {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        .timeline-container::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 3px;
            height: 100%;
            background: var(--accent-neon);
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.5), 0 0 30px rgba(0, 255, 255, 0.3);
        }

        .timeline-item {
            margin-bottom: 3rem;
        }

        .timeline-item:nth-child(odd) .timeline-content {
            margin-left: 0;
            margin-right: 52%;
            text-align: right;
        }

        .timeline-item:nth-child(even) .timeline-content {
            margin-left: 52%;
            margin-right: 0;
        }

        .timeline-dot {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            background: var(--primary-dark);
            border: 3px solid var(--accent-neon);
            border-radius: 50%;
            top: 20px;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.8), 0 0 30px rgba(0, 255, 255, 0.4);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 15px rgba(0, 255, 255, 0.8), 0 0 30px rgba(0, 255, 255, 0.4); }
            50% { box-shadow: 0 0 30px rgba(0, 255, 255, 1), 0 0 60px rgba(0, 255, 255, 0.6); }
        }

        .timeline-content {
            background: rgba(0, 255, 255, 0.05);
            border: 1px solid rgba(0, 255, 255, 0.2);
            border-radius: 10px;
            padding: 2rem;
            transition: all 0.3s ease;
        }

        .timeline-content:hover {
            border-color: var(--accent-neon);
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.4), inset 0 0 20px rgba(0, 255, 255, 0.1);
            background: rgba(0, 255, 255, 0.1);
        }

        .timeline-content h3 {
            color: var(--accent-neon);
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .timeline-content .timeline-period {
            color: var(--accent-neon);
            font-size: 0.85rem;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .timeline-content p {
            color: var(--text-muted);
            line-height: 1.6;
        }

        .contact {
            padding: 6rem 2rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
        }

        .contact-info h3 {
            color: var(--accent-neon);
            margin-bottom: 2rem;
            font-size: 1.5rem;
        }

        .contact-info p {
            color: var(--text-muted);
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .social-links {
            display: flex;
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .social-link {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(0, 255, 255, 0.1);
            border: 2px solid var(--accent-neon);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: var(--accent-neon);
            transition: all 0.3s ease;
            font-size: 1.5rem;
        }

        .social-link:hover {
            background: rgba(0, 255, 255, 0.2);
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.6), 0 0 40px rgba(0, 255, 255, 0.3);
            transform: translateY(-5px);
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            color: var(--accent-neon);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-group input,
        .form-group textarea {
            background: rgba(0, 255, 255, 0.05);
            border: 1px solid rgba(0, 255, 255, 0.2);
            color: var(--text-light);
            padding: 1rem;
            border-radius: 8px;
            font-family: inherit;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: var(--text-muted);
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            background: rgba(0, 255, 255, 0.1);
            border-color: var(--accent-neon);
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.5), 0 0 30px rgba(0, 255, 255, 0.2);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .btn-submit {
            background: var(--accent-neon);
            color: var(--primary-dark);
            padding: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            box-shadow: 0 0 30px rgba(0, 255, 255, 0.8), 0 0 60px rgba(0, 255, 255, 0.4);
            transform: translateY(-3px);
        }

        footer {
            background: rgba(0, 0, 0, 0.8);
            border-top: 1px solid rgba(0, 255, 255, 0.3);
            padding: 2rem;
            text-align: center;
            color: var(--text-muted);
            margin-top: 6rem;
        }

        @media (max-width: 768px) {
            header { padding: 1rem; }
            .nav-links { gap: 1rem; font-size: 0.85rem; }
            .hero { min-height: auto; padding: 2rem 0; margin-top: 80px; }
            .hero h1 { font-size: 2.5rem; }
            .hero-subtitle { font-size: 1.2rem; }
            .hero-buttons { flex-direction: column; align-items: center; }
            .btn { width: 100%; max-width: 250px; }
            .about { grid-template-columns: 1fr; gap: 2rem; }
            .profile-circle { width: 200px; height: 200px; }
            .profile-circle img { width: 180px; height: 180px; }
            .about-content h2 { font-size: 1.8rem; }
            .skills-grid { grid-template-columns: 1fr; }
            .timeline-container::before { left: 0; }
            .timeline-item:nth-child(odd) .timeline-content,
            .timeline-item:nth-child(even) .timeline-content {
                margin-left: 40px;
                margin-right: 0;
                text-align: left;
            }
            .timeline-dot { left: 0; }
            .contact-container { grid-template-columns: 1fr; gap: 2rem; }
            .section-title { font-size: 1.8rem; margin-bottom: 2rem; }
            .skills, .portfolio, .timeline, .contact { padding: 3rem 1rem; }
        }

        @media (max-width: 480px) {
            nav { flex-direction: column; gap: 1rem; }
            .nav-links { flex-direction: column; gap: 0.5rem; text-align: center; }
            .hero h1 { font-size: 1.8rem; }
            .hero-subtitle { font-size: 1rem; }
            .hero-description { font-size: 0.95rem; }
            .about-skills { justify-content: center; }
            .section-title { font-size: 1.5rem; }
            .skill-card h3 { font-size: 1.1rem; }
            .social-links { justify-content: center; }
        }
    </style>
</head>
<body>
    <div class="loading-bar"></div>

    <header>
        <nav>
            <div class="logo">Galih<span style="color: var(--accent-neon);">.</span></div>
            <ul class="nav-links">
                <li><a href="#hero">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#skills">Skill</a></li>
                <li><a href="#portfolio">Portofolio</a></li>
                <li><a href="#timeline">Pengalaman</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero" id="hero">
        <div class="hero-content">
            <h1>Selamat Datang 👋</h1>
            <p class="hero-subtitle">Web Developer Modern & Futuristik</p>
            <p class="hero-description">
                Saya menciptakan pengalaman web yang inovatif dan responsif. 
                Dengan teknologi terkini dan desain modern, kami wujudkan ide-ide digital Anda.
            </p>
            <div class="hero-buttons">
                <a href="#portfolio" class="btn btn-primary">Lihat Portofolio</a>
                <a href="#contact" class="btn btn-secondary">Hubungi Saya</a>
            </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="about-image">
            <div class="profile-circle">
                <img src="{{ asset('images/Profile.png') }}" alt="Profile">
            </div>
        </div>
        <div class="about-content">
            <h2>Tentang Saya</h2>
            <p>
                Hallo saya Galih seorang web developer passionate dengan pengalaman dalam membangun aplikasi web modern, 
                responsif, dan user-friendly. Saya selalu bersemangat mengikuti perkembangan teknologi terbaru 
                dan menerapkannya dalam setiap project.
            </p>
            <p>
                Fokus saya adalah menciptakan solusi digital yang tidak hanya indah secara visual, 
                tetapi juga berfungsi dengan sempurna dan memberikan nilai tambah kepada pengguna.
            </p>
            <div class="about-skills">
                <span class="skill-badge">HTML & CSS</span>
                <span class="skill-badge">Desain Grafis</span>
                <span class="skill-badge">PHP & Laravel</span>
                <span class="skill-badge">MySQL & Database</span>
                <span class="skill-badge">UI/UX Design</span>
                <span class="skill-badge">Responsive Design</span>
            </div>
        </div>
    </section>

    <section class="skills" id="skills">
        <h2 class="section-title">Keahlian Saya</h2>
        <div class="skills-grid">
            <div class="skill-card">
                <div class="skill-icon">🌐</div>
                <h3>HTML & CSS</h3>
                <p class="skill-description">Membangun struktur dan styling web yang semantik dan responsif.</p>
                <div class="progress-bar">
                    <div class="progress-fill" style="--progress: 95%"></div>
                </div>
            </div>

            <div class="skill-card">
                <div class="skill-icon">⚡</div>
                <h3>Desain Grafis</h3>
                <p class="skill-description">Membuat Desain yang dinamis dan menarik pengguna yang melihatnya</p>
                <div class="progress-bar">
                    <div class="progress-fill" style="--progress: 90%"></div>
                </div>
            </div>

            <div class="skill-card">
                <div class="skill-icon">🔧</div>
                <h3>PHP & Laravel</h3>
                <p class="skill-description">Backend development dengan framework Laravel untuk aplikasi scalable.</p>
                <div class="progress-bar">
                    <div class="progress-fill" style="--progress: 60%"></div>
                </div>
            </div>

            <div class="skill-card">
                <div class="skill-icon">💾</div>
                <h3>MySQL & Database</h3>
                <p class="skill-description">Desain database dan query optimization untuk performa maksimal.</p>
                <div class="progress-bar">
                    <div class="progress-fill" style="--progress: 30%"></div>
                </div>
            </div>

            <div class="skill-card">
                <div class="skill-icon">🎨</div>
                <h3>UI/UX Design</h3>
                <p class="skill-description">Menciptakan interface yang intuitif dan user experience yang excellent.</p>
                <div class="progress-bar">
                    <div class="progress-fill" style="--progress: 30%"></div>
                </div>
            </div>

            <div class="skill-card">
                <div class="skill-icon">📱</div>
                <h3>Responsive Design</h3>
                <p class="skill-description">Memastikan website berfungsi sempurna di semua ukuran device.</p>
                <div class="progress-bar">
                    <div class="progress-fill" style="--progress: 80%"></div>
                </div>
            </div>
        </div>
    </section>

    @yield('content')

    <section class="timeline" id="timeline">
        <h2 class="section-title">Pengalaman & Pendidikan</h2>
        <div class="timeline-container">
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h3>SMK Telkom Lampung</h3>
                    <p class="timeline-period">2023 - Sekarang</p>
                    <p>Memimpin tim development dalam membuat aplikasi web enterprise-scale. Fokus pada architecture design dan best practices.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h3>SMP N 1 Pesawaran</h3>
                    <p class="timeline-period">2021 - 2023</p>
                    <p>Mengembangkan aplikasi web full stack dengan Laravel dan Vue.js. Mengelola database dan API integration untuk klien.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h3>SD N 38 Gedung Tataan</h3>
                    <p class="timeline-period">2018 - 2022</p>
                    <p>Lulus dari universitas ternama dengan fokus pada web development, database systems, dan software engineering principles.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h3>Junior Web Developer</h3>
                    <p class="timeline-period">2020 - 2021</p>
                    <p>Memulai karir sebagai junior developer, belajar dari mentor berpengalaman dan berkontribusi pada berbagai project.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <h2 class="section-title">Hubungi Saya</h2>
        <div class="contact-container">
            <div class="contact-info">
                <h3>Mari Berkolaborasi</h3>
                <p>
                    Saya selalu tertarik untuk mendengarkan tentang project baru dan peluang untuk berkontribusi 
                    dalam menciptakan pengalaman digital yang luar biasa. Jangan ragu untuk menghubungi saya!
                </p>
                <div class="social-links">
                    <a href="https://github.com" target="_blank" class="social-link" title="GitHub">📱</a>
                    <a href="https://instagram.com" target="_blank" class="social-link" title="Instagram">📷</a>
                    <a href="https://linkedin.com" target="_blank" class="social-link" title="LinkedIn">💼</a>
                    <a href="mailto:email@example.com" class="social-link" title="Email">✉️</a>
                </div>
            </div>

            <form class="contact-form" onsubmit="handleFormSubmit(event)">
                <div class="form-group">
                    <label for="name">Nama Anda</label>
                    <input type="text" id="name" name="name" placeholder="Nama Anda" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="e-maileanda@example.com" required>
                </div>

                <div class="form-group">
                    <label for="message">Pesan</label>
                    <textarea id="message" name="message" placeholder="Tulis pesan Anda di sini..." required></textarea>
                </div>

                <button type="submit" class="btn-submit">Kirim Pesan</button>
            </form>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Portfolio. Dibuat dengan ❤️ oleh Galih Saputra</p>
    </footer>

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if(target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        function handleFormSubmit(event) {
            event.preventDefault();
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;
            
            alert(`Terima kasih ${name}! Pesan Anda telah dikirim.\n\nKami akan menghubungi Anda di ${email} segera.`);
            
            event.target.reset();
        }

        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if(entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.skill-card, .portfolio-card, .timeline-item').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    </script>
</body>
</html>
