<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if(target) { target.scrollIntoView({ behavior: 'smooth' }); }
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

    const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -100px 0px' };
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => { if(entry.isIntersecting) { entry.target.style.opacity = '1'; entry.target.style.transform = 'translateY(0)'; } });
    }, observerOptions);

    document.querySelectorAll('.skill-card, .portfolio-card, .timeline-item').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });

    // Hamburger + theme toggle initializer were added as separate script blocks earlier; keep them here if present
</script>
