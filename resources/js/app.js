import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import Swiper from 'swiper';
import { Navigation, Autoplay, Pagination } from 'swiper/modules';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// ─── Alpine Setup ──────────────────────────
window.Alpine = Alpine;
Alpine.plugin(intersect);
Alpine.start();

// ─── GSAP Setup ────────────────────────────
gsap.registerPlugin(ScrollTrigger);

// ─── Intersection Observer (reveal classes) ─
document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                // For stagger, also trigger children
                const children = entry.target.querySelectorAll('.reveal, .reveal-left');
                children.forEach((child, i) => {
                    setTimeout(() => child.classList.add('is-visible'), i * 100);
                });
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -60px 0px' });

    document.querySelectorAll('.reveal, .reveal-left').forEach(el => observer.observe(el));

    // ─── GSAP Hero text animation ────────────
    const heroTitle = document.querySelector('[data-hero-title]');
    if (heroTitle) {
        gsap.from(heroTitle, {
            y: 60,
            opacity: 0,
            duration: 1.1,
            ease: 'power4.out',
            delay: 0.2,
        });
    }

    const heroSub = document.querySelector('[data-hero-sub]');
    if (heroSub) {
        gsap.from(heroSub, {
            y: 40,
            opacity: 0,
            duration: 1,
            ease: 'power3.out',
            delay: 0.55,
        });
    }

    const heroActions = document.querySelector('[data-hero-actions]');
    if (heroActions) {
        gsap.from(heroActions, {
            y: 30,
            opacity: 0,
            duration: 0.8,
            ease: 'power3.out',
            delay: 0.8,
        });
    }

    // ─── GSAP Section headings ───────────────
    document.querySelectorAll('[data-gsap-heading]').forEach(el => {
        gsap.from(el, {
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
            },
            y: 50,
            opacity: 0,
            duration: 1,
            ease: 'power3.out',
        });
    });

    // ─── Work grid stagger ───────────────────
    const workGrid = document.querySelector('[data-work-grid]');
    if (workGrid) {
        gsap.from(workGrid.children, {
            scrollTrigger: {
                trigger: workGrid,
                start: 'top 80%',
            },
            y: 60,
            opacity: 0,
            duration: 0.9,
            ease: 'power3.out',
            stagger: 0.12,
        });
    }

    // ─── Logos Marquee ──────────────────────
    const marquee = document.querySelector('.animate-marquee');
    if (marquee) {
        // Pause on hover
        marquee.parentElement.addEventListener('mouseenter', () => {
            marquee.style.animationPlayState = 'paused';
        });
        marquee.parentElement.addEventListener('mouseleave', () => {
            marquee.style.animationPlayState = 'running';
        });
    }

    // ─── Showreel video modal ────────────────
    const showreelTriggers = document.querySelectorAll('.showreel-trigger, #showreel-btn');
    const showreelModal = document.getElementById('showreel-modal');
    const showreelClose = document.getElementById('showreel-close');

    if (showreelTriggers.length && showreelModal) {
        // Ativa o player (define o src diferido) — funciona para iframe (YouTube/Vimeo/outro) e <video> local.
        const activateShowreel = () => {
            const iframe = showreelModal.querySelector('[data-video-embed]');
            if (iframe && iframe.dataset.src) {
                iframe.src = iframe.dataset.src;
            }
            const video = showreelModal.querySelector('[data-video-file]');
            if (video) {
                if (video.dataset.src && !video.querySelector('source')) {
                    const source = document.createElement('source');
                    source.src = video.dataset.src;
                    video.appendChild(source);
                    video.load();
                }
                video.play().catch(() => {});
            }
        };

        // Desativa (pára a reprodução ao fechar).
        const deactivateShowreel = () => {
            const iframe = showreelModal.querySelector('[data-video-embed]');
            if (iframe) {
                iframe.src = '';
            }
            const video = showreelModal.querySelector('[data-video-file]');
            if (video) {
                video.pause();
            }
        };

        const openShowreel = () => {
            showreelModal.classList.remove('hidden');
            showreelModal.classList.add('flex');
            document.body.style.overflow = 'hidden';
            activateShowreel();
        };

        const closeShowreel = () => {
            showreelModal.classList.add('hidden');
            showreelModal.classList.remove('flex');
            document.body.style.overflow = '';
            deactivateShowreel();
        };

        showreelTriggers.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                openShowreel();
            });
        });
        if (showreelClose) {
            showreelClose.addEventListener('click', closeShowreel);
        }
        showreelModal.addEventListener('click', (e) => {
            if (e.target === showreelModal) {
                closeShowreel();
            }
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !showreelModal.classList.contains('hidden')) {
                closeShowreel();
            }
        });
    }

    // ─── Work filter ────────────────────────
    const filterBtns = document.querySelectorAll('[data-filter]');
    const workCards = document.querySelectorAll('[data-sector]');

    if (filterBtns.length && workCards.length) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const filter = btn.dataset.filter;

                // Reset all filter buttons to inactive state
                filterBtns.forEach(b => {
                    b.classList.remove('bg-[var(--color-brand-accent)]', 'text-white', 'shadow-md', 'border-blue-600');
                    b.classList.add('bg-gray-100', 'text-gray-700');
                });

                // Set clicked button to active state
                btn.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                btn.classList.add('bg-[var(--color-brand-accent)]', 'text-white', 'shadow-md');

                // Filter cards
                workCards.forEach(card => {
                    const cardSector = card.dataset.sector;
                    if (filter === 'all' || cardSector === filter) {
                        card.style.display = 'block';
                        gsap.fromTo(card, 
                            { opacity: 0, y: 15, scale: 0.98 }, 
                            { opacity: 1, y: 0, scale: 1, duration: 0.35, ease: 'power2.out' }
                        );
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }

    // ─── Custom Orange Circle Cursor ───────────
    const cursorFollower = document.getElementById('custom-cursor-follower');
    const cursorDot = document.getElementById('custom-cursor-dot');

    if (cursorFollower && cursorDot && window.matchMedia('(pointer: fine)').matches) {
        let mouseX = -100, mouseY = -100;
        let followerX = -100, followerY = -100;
        let isHovered = false;

        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;

            if (cursorFollower.style.opacity === '0' || cursorFollower.style.opacity === '') {
                cursorFollower.style.opacity = '1';
                cursorDot.style.opacity = '1';
            }

            // Dot follows pointer directly
            gsap.set(cursorDot, { x: mouseX, y: mouseY });
        });

        // Smooth GSAP follower ticker animation
        gsap.ticker.add(() => {
            const dt = 1 - Math.pow(1 - 0.25, gsap.ticker.deltaRatio());
            followerX += (mouseX - followerX) * dt;
            followerY += (mouseY - followerY) * dt;

            gsap.set(cursorFollower, {
                x: followerX,
                y: followerY,
                scale: isHovered ? 1.8 : 1,
                backgroundColor: isHovered ? 'rgba(254, 61, 10, 0.15)' : 'transparent',
                borderColor: 'var(--color-brand-accent)',
            });
        });

        // Hover scale on interactive elements
        const interactiveSelectors = 'a, button, input, textarea, select, label, [role="button"], .group, iframe, summary';
        document.addEventListener('mouseover', (e) => {
            if (e.target.closest(interactiveSelectors)) {
                isHovered = true;
            }
        });

        document.addEventListener('mouseout', (e) => {
            if (e.target.closest(interactiveSelectors)) {
                isHovered = false;
            }
        });

        // Hide when mouse leaves window
        document.addEventListener('mouseleave', () => {
            cursorFollower.style.opacity = '0';
            cursorDot.style.opacity = '0';
        });
    }
});
