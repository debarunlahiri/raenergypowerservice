document.addEventListener("DOMContentLoaded", () => {
    const header = document.querySelector("[data-header]");
    const nav = document.querySelector("[data-nav]");
    const navToggle = document.querySelector("[data-nav-toggle]");
    const backTop = document.querySelector("[data-back-top]");
    const slides = [...document.querySelectorAll("[data-slide]")];
    const dots = [...document.querySelectorAll("[data-slide-dot]")];
    const lightbox = document.querySelector("[data-lightbox]");
    const lightboxImage = document.querySelector("[data-lightbox-image]");
    const lightboxCaption = document.querySelector("[data-lightbox-caption]");
    const lightboxItems = [...document.querySelectorAll("[data-lightbox-src]")];
    let activeSlide = 0;
    let activeLightbox = 0;
    let slideTimer;

    const syncHeader = () => {
        header?.classList.toggle("is-scrolled", window.scrollY > 16);
        backTop?.classList.toggle("is-visible", window.scrollY > 500);
    };

    const setSlide = (index) => {
        if (!slides.length) return;
        activeSlide = (index + slides.length) % slides.length;
        slides.forEach((slide, i) => slide.classList.toggle("is-active", i === activeSlide));
        dots.forEach((dot, i) => dot.classList.toggle("is-active", i === activeSlide));
    };

    const startSlider = () => {
        if (slides.length < 2) return;
        window.clearInterval(slideTimer);
        slideTimer = window.setInterval(() => setSlide(activeSlide + 1), 5500);
    };

    navToggle?.addEventListener("click", () => {
        const isOpen = nav?.classList.toggle("is-open");
        navToggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
        document.body.classList.toggle("nav-open", Boolean(isOpen));
    });

    nav?.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", () => {
            nav.classList.remove("is-open");
            navToggle?.setAttribute("aria-expanded", "false");
            document.body.classList.remove("nav-open");
        });
    });

    dots.forEach((dot, index) => {
        dot.addEventListener("click", () => {
            setSlide(index);
            startSlider();
        });
    });

    const setLightboxImage = (index) => {
        if (!lightbox || !lightboxImage || !lightboxItems.length) return;
        activeLightbox = (index + lightboxItems.length) % lightboxItems.length;
        const item = lightboxItems[activeLightbox];
        lightboxImage.src = item.dataset.lightboxSrc;
        lightboxCaption.textContent = `${activeLightbox + 1} / ${lightboxItems.length}`;
    };

    const openLightbox = (index) => {
        if (!lightbox) return;
        setLightboxImage(index);
        lightbox.hidden = false;
        document.body.classList.add("nav-open");
    };

    const closeLightbox = () => {
        if (!lightbox || lightbox.hidden) return;
        lightbox.hidden = true;
        document.body.classList.remove("nav-open");
    };

    lightboxItems.forEach((item, index) => {
        item.addEventListener("click", () => openLightbox(index));
    });

    document.querySelector("[data-lightbox-close]")?.addEventListener("click", closeLightbox);
    document.querySelector("[data-lightbox-prev]")?.addEventListener("click", () => setLightboxImage(activeLightbox - 1));
    document.querySelector("[data-lightbox-next]")?.addEventListener("click", () => setLightboxImage(activeLightbox + 1));

    lightbox?.addEventListener("click", (event) => {
        if (event.target === lightbox) closeLightbox();
    });

    document.addEventListener("keydown", (event) => {
        if (!lightbox || lightbox.hidden) return;
        if (event.key === "Escape") closeLightbox();
        if (event.key === "ArrowLeft") setLightboxImage(activeLightbox - 1);
        if (event.key === "ArrowRight") setLightboxImage(activeLightbox + 1);
    });

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add("is-visible");
            revealObserver.unobserve(entry.target);
        });
    }, { threshold: 0.16 });

    document.querySelectorAll(".reveal").forEach((element) => revealObserver.observe(element));

    const countObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            const node = entry.target;
            const target = Number(node.dataset.count || 0);
            const duration = 1200;
            const started = performance.now();

            const tick = (now) => {
                const progress = Math.min((now - started) / duration, 1);
                node.textContent = Math.floor(target * progress).toString();
                if (progress < 1) requestAnimationFrame(tick);
            };

            requestAnimationFrame(tick);
            countObserver.unobserve(node);
        });
    }, { threshold: 0.6 });

    document.querySelectorAll("[data-count]").forEach((node) => countObserver.observe(node));

    backTop?.addEventListener("click", () => window.scrollTo({ top: 0, behavior: "smooth" }));
    window.addEventListener("scroll", syncHeader, { passive: true });
    window.addEventListener("resize", () => {
        if (window.innerWidth >= 980) {
            nav?.classList.remove("is-open");
            navToggle?.setAttribute("aria-expanded", "false");
            document.body.classList.remove("nav-open");
        }
    });

    syncHeader();
    setSlide(0);
    startSlider();
});
