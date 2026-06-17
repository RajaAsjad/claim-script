import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    initHeader();
    initMobileMenu();
    initRevealAnimations();
    initFaqAccordion();
    initHeroCanvas();
    initDashboardCanvas();
});

function initHeader() {
    const header = document.querySelector('.site-header');
    const logoLight = document.querySelector('.logo-light');
    const logoDark = document.querySelector('.logo-dark');
    if (!header) return;

    const onScroll = () => {
        const scrolled = window.scrollY > 40;
        header.classList.toggle('is-scrolled', scrolled);

        if (logoLight && logoDark) {
            logoLight.classList.toggle('hidden', !scrolled);
            logoDark.classList.toggle('hidden', scrolled);
        }
    };

    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
}

function initMobileMenu() {
    const toggle = document.querySelector('[data-mobile-toggle]');
    const menu = document.querySelector('[data-mobile-menu]');
    const close = document.querySelector('[data-mobile-close]');
    const links = document.querySelectorAll('[data-mobile-link]');

    if (!toggle || !menu) return;

    const openMenu = () => {
        menu.classList.add('is-open');
        document.body.style.overflow = 'hidden';
    };

    const closeMenu = () => {
        menu.classList.remove('is-open');
        document.body.style.overflow = '';
    };

    toggle.addEventListener('click', openMenu);
    close?.addEventListener('click', closeMenu);
    links.forEach((link) => link.addEventListener('click', closeMenu));
}

function initRevealAnimations() {
    const elements = document.querySelectorAll('.reveal');
    if (!elements.length) return;

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    );

    elements.forEach((el) => observer.observe(el));
}

function initFaqAccordion() {
    document.querySelectorAll('[data-faq-toggle]').forEach((button) => {
        button.addEventListener('click', () => {
            const item = button.closest('.faq-item');
            const isOpen = item?.classList.contains('is-open');

            document.querySelectorAll('.faq-item.is-open').forEach((openItem) => {
                openItem.classList.remove('is-open');
                openItem.querySelector('[data-faq-toggle]')?.setAttribute('aria-expanded', 'false');
            });

            if (!isOpen && item) {
                item.classList.add('is-open');
                button.setAttribute('aria-expanded', 'true');
            }
        });
    });
}

function initHeroCanvas() {
    const canvas = document.getElementById('hero-canvas');
    if (!canvas) return;

    const section = canvas.closest('section');
    const ctx = canvas.getContext('2d');
    let width, height, particles, animationId;
    const dpr = Math.min(window.devicePixelRatio || 1, 2);

    const resize = () => {
        if (!section) return;

        const rect = section.getBoundingClientRect();
        width = rect.width;
        height = rect.height;

        canvas.width = Math.floor(width * dpr);
        canvas.height = Math.floor(height * dpr);
        canvas.style.width = `${width}px`;
        canvas.style.height = `${height}px`;
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);

        initParticles();
    };

    const initParticles = () => {
        const count = Math.min(90, Math.max(40, Math.floor((width * height) / 12000)));
        particles = Array.from({ length: count }, () => ({
            x: Math.random() * width,
            y: Math.random() * height,
            vx: (Math.random() - 0.5) * 0.55,
            vy: (Math.random() - 0.5) * 0.55,
            radius: Math.random() * 2.2 + 1.2,
            opacity: Math.random() * 0.45 + 0.35,
            pulse: Math.random() * Math.PI * 2,
        }));
    };

    const draw = () => {
        ctx.clearRect(0, 0, width, height);

        particles.forEach((p, i) => {
            p.x += p.vx;
            p.y += p.vy;
            p.pulse += 0.02;

            if (p.x < 0 || p.x > width) p.vx *= -1;
            if (p.y < 0 || p.y > height) p.vy *= -1;

            const glowPulse = 0.75 + Math.sin(p.pulse) * 0.25;

            ctx.beginPath();
            ctx.arc(p.x, p.y, p.radius * glowPulse, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(95, 168, 255, ${p.opacity * glowPulse})`;
            ctx.fill();

            ctx.beginPath();
            ctx.arc(p.x, p.y, p.radius * 3, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(95, 168, 255, ${p.opacity * 0.15})`;
            ctx.fill();

            for (let j = i + 1; j < particles.length; j++) {
                const q = particles[j];
                const dx = p.x - q.x;
                const dy = p.y - q.y;
                const dist = Math.sqrt(dx * dx + dy * dy);

                if (dist < 170) {
                    const alpha = 0.35 * (1 - dist / 170);
                    ctx.beginPath();
                    ctx.moveTo(p.x, p.y);
                    ctx.lineTo(q.x, q.y);
                    ctx.strokeStyle = `rgba(95, 168, 255, ${alpha})`;
                    ctx.lineWidth = 1;
                    ctx.stroke();
                }
            }
        });

        animationId = requestAnimationFrame(draw);
    };

    resize();
    draw();

    window.addEventListener('resize', resize);
    window.addEventListener('app:ready', resize);

    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            cancelAnimationFrame(animationId);
        } else {
            draw();
        }
    });
}

function initDashboardCanvas() {
    const canvas = document.getElementById('dashboard-canvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    let width, height, time = 0, animationId;

    const resize = () => {
        const rect = canvas.parentElement.getBoundingClientRect();
        width = canvas.width = rect.width;
        height = canvas.height = rect.height;
    };

    const draw = () => {
        time += 0.008;
        ctx.clearRect(0, 0, width, height);

        const gridSize = 40;
        ctx.strokeStyle = 'rgba(95, 168, 255, 0.06)';
        ctx.lineWidth = 1;

        for (let x = 0; x < width; x += gridSize) {
            ctx.beginPath();
            ctx.moveTo(x, 0);
            ctx.lineTo(x, height);
            ctx.stroke();
        }

        for (let y = 0; y < height; y += gridSize) {
            ctx.beginPath();
            ctx.moveTo(0, y);
            ctx.lineTo(width, y);
            ctx.stroke();
        }

        const points = 8;
        ctx.beginPath();
        for (let i = 0; i <= points; i++) {
            const x = (width / points) * i;
            const y = height * 0.5 + Math.sin(time + i * 0.8) * (height * 0.15) + Math.cos(time * 0.7 + i) * (height * 0.08);
            if (i === 0) ctx.moveTo(x, y);
            else ctx.lineTo(x, y);
        }

        const gradient = ctx.createLinearGradient(0, 0, width, 0);
        gradient.addColorStop(0, 'rgba(95, 168, 255, 0)');
        gradient.addColorStop(0.5, 'rgba(95, 168, 255, 0.6)');
        gradient.addColorStop(1, 'rgba(109, 158, 235, 0)');

        ctx.strokeStyle = gradient;
        ctx.lineWidth = 2;
        ctx.stroke();

        ctx.lineTo(width, height);
        ctx.lineTo(0, height);
        ctx.closePath();
        ctx.fillStyle = 'rgba(95, 168, 255, 0.04)';
        ctx.fill();

        animationId = requestAnimationFrame(draw);
    };

    resize();
    draw();
    window.addEventListener('resize', resize);
}
