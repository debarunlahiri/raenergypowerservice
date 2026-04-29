document.addEventListener("DOMContentLoaded", () => {
    const backToTop = document.querySelector(".back-to-top");
    const navCollapseElement = document.querySelector("#mainNav");
    const navToggler = document.querySelector(".navbar-toggler");
    const mainNav = document.querySelector(".main-nav");
    const mobileNavBackdrop = document.querySelector(".mobile-nav-backdrop");
    const animatedBlocks = document.querySelectorAll(
        ".service-card, .metric-card, .reason-card, .team-card, .detail-card, .contact-card, .mini-cta, .stack-card, .info-card"
    );
    const qualityTabs = document.querySelectorAll(".quality-service-tab");

    animatedBlocks.forEach((block) => block.classList.add("fade-in"));

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.18 }
    );

    animatedBlocks.forEach((block) => observer.observe(block));

    const toggleBackToTop = () => {
        if (!backToTop) {
            return;
        }
        backToTop.classList.toggle("is-visible", window.scrollY > 500);
    };

    window.addEventListener("scroll", toggleBackToTop, { passive: true });
    toggleBackToTop();

    backToTop?.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });

    if (navCollapseElement && navToggler && mainNav && window.bootstrap?.Collapse) {
        const navCollapse = new window.bootstrap.Collapse(navCollapseElement, { toggle: false });
        const syncMenuState = () => {
            const isOpen = navCollapseElement.classList.contains("show") && window.innerWidth < 992;
            document.body.classList.toggle("menu-open", isOpen);
            navToggler.setAttribute("aria-expanded", isOpen ? "true" : "false");
        };

        navCollapseElement.addEventListener("shown.bs.collapse", syncMenuState);
        navCollapseElement.addEventListener("hidden.bs.collapse", syncMenuState);

        const handleOutsideClose = (event) => {
            const isDesktop = window.innerWidth >= 992;
            const isOpen = navCollapseElement.classList.contains("show");

            if (isDesktop || !isOpen) {
                return;
            }

            if (!mainNav.contains(event.target)) {
                navCollapse.hide();
            }
        };

        document.addEventListener("click", handleOutsideClose);
        document.addEventListener("touchstart", handleOutsideClose, { passive: true });

        navToggler.addEventListener("click", () => {
            if (window.innerWidth >= 992) {
                return;
            }

            if (navCollapseElement.classList.contains("show")) {
                navCollapse.hide();
            } else {
                navCollapse.show();
            }
        });

        mobileNavBackdrop?.addEventListener("click", () => {
            navCollapse.hide();
        });

        mobileNavBackdrop?.addEventListener("touchstart", () => {
            navCollapse.hide();
        }, { passive: true });

        navCollapseElement.querySelectorAll(".nav-link, .nav-cta").forEach((link) => {
            link.addEventListener("click", () => {
                if (window.innerWidth < 992) {
                    navCollapse.hide();
                }
            });
        });

        window.addEventListener("resize", () => {
            if (window.innerWidth >= 992) {
                navCollapse.hide();
            }
            syncMenuState();
        });

        syncMenuState();
    }

    if (qualityTabs.length > 0) {
        const qualityPanels = document.querySelectorAll(".quality-service-panel");
        const qualityPanelsWrap = document.querySelector(".quality-service-panels");

        const updateQualityPanelHeight = () => {
            if (!qualityPanelsWrap) {
                return;
            }

            let maxHeight = 0;

            qualityPanels.forEach((panel) => {
                const wasHidden = panel.hasAttribute("hidden");
                const previousDisplay = panel.style.display;
                const previousPosition = panel.style.position;
                const previousInset = panel.style.inset;
                const previousVisibility = panel.style.visibility;
                const previousPointerEvents = panel.style.pointerEvents;
                const previousWidth = panel.style.width;

                panel.hidden = false;
                panel.style.display = "grid";
                panel.style.position = "absolute";
                panel.style.inset = "0";
                panel.style.visibility = "hidden";
                panel.style.pointerEvents = "none";
                panel.style.width = "100%";

                maxHeight = Math.max(maxHeight, panel.offsetHeight);

                panel.style.display = previousDisplay;
                panel.style.position = previousPosition;
                panel.style.inset = previousInset;
                panel.style.visibility = previousVisibility;
                panel.style.pointerEvents = previousPointerEvents;
                panel.style.width = previousWidth;

                if (wasHidden) {
                    panel.hidden = true;
                }
            });

            qualityPanelsWrap.style.height = `${maxHeight}px`;
        };

        const setActiveQualityTab = (targetId) => {
            qualityTabs.forEach((tab) => {
                const isActive = tab.dataset.qualityTarget === targetId;
                tab.classList.toggle("is-active", isActive);
                tab.setAttribute("aria-selected", isActive ? "true" : "false");
            });

            qualityPanels.forEach((panel) => {
                const isActive = panel.id === targetId;
                panel.classList.toggle("is-active", isActive);
                panel.toggleAttribute("hidden", !isActive);
            });
        };

        qualityTabs.forEach((tab) => {
            tab.addEventListener("click", () => {
                setActiveQualityTab(tab.dataset.qualityTarget);
                updateQualityPanelHeight();
            });
        });

        window.addEventListener("resize", updateQualityPanelHeight);
        window.addEventListener("load", updateQualityPanelHeight);

        qualityPanels.forEach((panel) => {
            panel.querySelectorAll("img").forEach((image) => {
                if (image.complete) {
                    return;
                }

                image.addEventListener("load", updateQualityPanelHeight, { once: true });
            });
        });

        updateQualityPanelHeight();
        document.fonts?.ready?.then(updateQualityPanelHeight);
    }
});
