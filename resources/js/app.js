import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    initHeader();
    initMobileMenu();
    initRevealAnimations();
    initFaqAccordion();
    initHeroCanvas();
    initDashboardCanvas();
    initCursorCanvas();
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
    const mouse = { x: null, y: null, active: false };

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

    const updateMouse = (clientX, clientY) => {
        if (!section) return;
        const rect = section.getBoundingClientRect();
        mouse.x = clientX - rect.left;
        mouse.y = clientY - rect.top;
        mouse.active = mouse.x >= 0 && mouse.x <= width && mouse.y >= 0 && mouse.y <= height;
    };

    const draw = () => {
        ctx.clearRect(0, 0, width, height);

        if (mouse.active) {
            const glow = ctx.createRadialGradient(mouse.x, mouse.y, 0, mouse.x, mouse.y, 120);
            glow.addColorStop(0, 'rgba(95, 168, 255, 0.18)');
            glow.addColorStop(0.45, 'rgba(95, 168, 255, 0.06)');
            glow.addColorStop(1, 'rgba(95, 168, 255, 0)');
            ctx.fillStyle = glow;
            ctx.fillRect(0, 0, width, height);
        }

        particles.forEach((p, i) => {
            if (mouse.active) {
                const dx = mouse.x - p.x;
                const dy = mouse.y - p.y;
                const dist = Math.sqrt(dx * dx + dy * dy);

                if (dist < 220 && dist > 0) {
                    const force = (220 - dist) / 220;
                    p.vx += (dx / dist) * force * 0.025;
                    p.vy += (dy / dist) * force * 0.025;

                    ctx.beginPath();
                    ctx.moveTo(p.x, p.y);
                    ctx.lineTo(mouse.x, mouse.y);
                    ctx.strokeStyle = `rgba(95, 168, 255, ${0.45 * force})`;
                    ctx.lineWidth = 1.2;
                    ctx.stroke();
                }
            }

            p.vx *= 0.985;
            p.vy *= 0.985;
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

        if (mouse.active) {
            ctx.beginPath();
            ctx.arc(mouse.x, mouse.y, 6, 0, Math.PI * 2);
            ctx.fillStyle = 'rgba(95, 168, 255, 0.9)';
            ctx.fill();

            ctx.beginPath();
            ctx.arc(mouse.x, mouse.y, 18, 0, Math.PI * 2);
            ctx.strokeStyle = 'rgba(95, 168, 255, 0.35)';
            ctx.lineWidth = 1.5;
            ctx.stroke();
        }

        animationId = requestAnimationFrame(draw);
    };

    resize();
    draw();

    window.addEventListener('resize', resize);
    window.addEventListener('app:ready', resize);
    window.addEventListener('mousemove', (e) => updateMouse(e.clientX, e.clientY));
    section?.addEventListener('mouseleave', () => {
        mouse.active = false;
        mouse.x = null;
        mouse.y = null;
    });

    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            cancelAnimationFrame(animationId);
        } else {
            draw();
        }
    });
}

function initCursorCanvas() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    if (window.matchMedia('(pointer: coarse)').matches) return;

    const canvas = document.getElementById('cursor-canvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    const dpr = Math.min(window.devicePixelRatio || 1, 2);
    let width, height, animationId;
    let targetX = -200;
    let targetY = -200;
    let visible = false;

    const trail = Array.from({ length: 14 }, () => ({ x: -200, y: -200 }));
    const sparks = Array.from({ length: 8 }, () => ({
        x: -200,
        y: -200,
        vx: 0,
        vy: 0,
        life: 0,
    }));

    const resize = () => {
        width = window.innerWidth;
        height = window.innerHeight;
        canvas.width = Math.floor(width * dpr);
        canvas.height = Math.floor(height * dpr);
        canvas.style.width = `${width}px`;
        canvas.style.height = `${height}px`;
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    };

    const spawnSpark = (x, y) => {
        const spark = sparks[Math.floor(Math.random() * sparks.length)];
        spark.x = x;
        spark.y = y;
        spark.vx = (Math.random() - 0.5) * 1.4;
        spark.vy = (Math.random() - 0.5) * 1.4;
        spark.life = 1;
    };

    const draw = () => {
        ctx.clearRect(0, 0, width, height);

        if (!visible) {
            animationId = requestAnimationFrame(draw);
            return;
        }

        trail[0].x += (targetX - trail[0].x) * 0.28;
        trail[0].y += (targetY - trail[0].y) * 0.28;

        for (let i = 1; i < trail.length; i++) {
            trail[i].x += (trail[i - 1].x - trail[i].x) * 0.32;
            trail[i].y += (trail[i - 1].y - trail[i].y) * 0.32;
        }

        const headGlow = ctx.createRadialGradient(trail[0].x, trail[0].y, 0, trail[0].x, trail[0].y, 90);
        headGlow.addColorStop(0, 'rgba(95, 168, 255, 0.22)');
        headGlow.addColorStop(0.5, 'rgba(95, 168, 255, 0.08)');
        headGlow.addColorStop(1, 'rgba(95, 168, 255, 0)');
        ctx.fillStyle = headGlow;
        ctx.fillRect(0, 0, width, height);

        for (let i = trail.length - 1; i > 0; i--) {
            const alpha = (1 - i / trail.length) * 0.55;
            ctx.beginPath();
            ctx.moveTo(trail[i - 1].x, trail[i - 1].y);
            ctx.lineTo(trail[i].x, trail[i].y);
            ctx.strokeStyle = `rgba(95, 168, 255, ${alpha})`;
            ctx.lineWidth = 2 - i * 0.08;
            ctx.stroke();
        }

        trail.forEach((point, i) => {
            const size = 5 - i * 0.22;
            const alpha = 0.85 - i * 0.055;
            if (size <= 0) return;

            ctx.beginPath();
            ctx.arc(point.x, point.y, size, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(95, 168, 255, ${alpha})`;
            ctx.fill();
        });

        sparks.forEach((spark) => {
            if (spark.life <= 0) return;

            spark.x += spark.vx;
            spark.y += spark.vy;
            spark.life -= 0.04;

            ctx.beginPath();
            ctx.arc(spark.x, spark.y, 2 * spark.life, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(109, 158, 235, ${spark.life * 0.7})`;
            ctx.fill();
        });

        ctx.beginPath();
        ctx.arc(trail[0].x, trail[0].y, 4.5, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba(255, 255, 255, 0.95)';
        ctx.fill();

        ctx.beginPath();
        ctx.arc(trail[0].x, trail[0].y, 10, 0, Math.PI * 2);
        ctx.strokeStyle = 'rgba(95, 168, 255, 0.5)';
        ctx.lineWidth = 1.5;
        ctx.stroke();

        animationId = requestAnimationFrame(draw);
    };

    resize();
    draw();

    window.addEventListener('resize', resize);
    window.addEventListener('mousemove', (e) => {
        targetX = e.clientX;
        targetY = e.clientY;
        visible = true;

        if (Math.random() > 0.65) {
            spawnSpark(targetX, targetY);
        }
    });

    window.addEventListener('mouseleave', () => {
        visible = false;
    });

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
