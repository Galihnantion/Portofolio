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

    .nav-links a:hover { color: var(--accent-neon); }
    .nav-links a:hover::after { width: 100%; }

    /* --- rest of CSS omitted for brevity in partial (kept full in original file) --- */
</style>
