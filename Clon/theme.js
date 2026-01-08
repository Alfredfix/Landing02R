/**
 * Louvre Theme JavaScript
 * Funcionalidades para el tema inspirado en museedulouvre-tickets.org
 */

document.addEventListener('DOMContentLoaded', function () {
    // =============================================
    // MODAL FUNCTIONALITY
    // =============================================
    const modal = document.getElementById('theme4Modal');
    const closeBtn = document.querySelector('.theme4-modal-close');
    const cards = document.querySelectorAll('.tour-card');
    const modalTitle = document.querySelector('.theme4-modal-title');

    let currentStep = 1;
    const totalSteps = 5;

    function showStep(step) {
        document.querySelectorAll('.wizard-step').forEach(el => {
            el.classList.remove('active');
            el.style.display = 'none';
        });

        const activeStep = document.querySelector(`.wizard-step[data-step="${step}"]`);
        if (activeStep) {
            activeStep.classList.add('active');
            activeStep.style.display = 'block';
        }

        const prevBtn = document.querySelector('.wizard-btn-prev');
        const nextBtn = document.querySelector('.wizard-btn-next');

        if (prevBtn) prevBtn.style.display = step === 1 ? 'none' : 'block';
        if (nextBtn) {
            if (step === totalSteps) {
                nextBtn.style.display = 'none';
            } else {
                nextBtn.style.display = 'block';
                nextBtn.textContent = 'Siguiente';
            }
        }

        currentStep = step;
    }

    function validateStep(step) {
        if (step === 1) {
            const dateInput = document.getElementById('fecha');
            if (!dateInput || !dateInput.value) {
                showNotification('Por favor, selecciona una fecha.', 'warning');
                return false;
            }
            return true;
        }

        if (step === 2) {
            const visibleRadios = document.querySelectorAll('.wizard-step[data-step="2"] input[type="radio"]:not(:disabled)');
            if (visibleRadios.length > 0) {
                const checked = document.querySelector('.wizard-step[data-step="2"] input[type="radio"]:checked');
                if (!checked) {
                    showNotification('Por favor, selecciona un horario/idioma.', 'warning');
                    return false;
                }
            }
            return true;
        }

        if (step === 3) {
            let totalPeople = 0;
            document.querySelectorAll('input[name^="persona_"]').forEach(input => {
                totalPeople += parseInt(input.value || 0);
            });

            if (totalPeople === 0) {
                showNotification('Por favor, selecciona al menos una persona.', 'warning');
                return false;
            }
            return true;
        }

        return true;
    }

    function openModal(tourId, tourTitle) {
        if (modalTitle) modalTitle.textContent = tourTitle;

        const tourRadio = document.querySelector(`input[name="tour"][value="${tourId}"]`);
        if (tourRadio) {
            tourRadio.checked = true;
            $(tourRadio).trigger('change');
        }

        currentStep = 1;
        showStep(1);

        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    // Exportar openModal al contexto global para uso desde onclick
    window.openModal = openModal;

    function closeModal() {
        modal.classList.remove('show');
        document.body.style.overflow = '';

        currentStep = 1;
        showStep(1);

        // Reset form
        const formInputs = modal.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"], input[type="number"], textarea');
        formInputs.forEach(input => input.value = '');

        const radioInputs = modal.querySelectorAll('input[type="radio"]');
        radioInputs.forEach(radio => radio.checked = false);

        const checkboxInputs = modal.querySelectorAll('input[type="checkbox"]');
        checkboxInputs.forEach(checkbox => checkbox.checked = false);

        const numberInputs = modal.querySelectorAll('input[name^="persona_"]');
        numberInputs.forEach(input => input.value = '0');

        const stripeContainer = document.getElementById('stripe-payment-container');
        if (stripeContainer) stripeContainer.innerHTML = '';

        const dateInput = document.getElementById('fecha');
        if (dateInput) {
            const today = new Date();
            dateInput.value = `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, '0')}-${String(today.getDate()).padStart(2, '0')}`;
        }

        if (typeof $.datepicker !== 'undefined' && dateInput) {
            $(dateInput).datepicker('setDate', new Date());
        }
    }

    // Event listeners
    const infoButtons = document.querySelectorAll('.tour-info-btn');
    infoButtons.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.stopPropagation();
        });
    });

    cards.forEach(card => {
        card.addEventListener('click', function (e) {
            if (e.target.classList.contains('tour-info-btn') || e.target.closest('.tour-info-btn')) {
                return;
            }
            const tourId = this.dataset.tourId;
            const tourTitle = this.querySelector('.tour-card-title').textContent;
            openModal(tourId, tourTitle);
        });
    });

    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('wizard-btn-next')) {
            if (validateStep(currentStep)) {
                showStep(currentStep + 1);
            }
        }
        if (e.target.classList.contains('wizard-btn-prev')) {
            showStep(currentStep - 1);
        }
    });

    window.addEventListener('click', function (event) {
        if (event.target == modal) {
            closeModal();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && modal.classList.contains('show')) {
            closeModal();
        }
    });

    // =============================================
    // INFO CAROUSEL
    // =============================================
    const infoSlides = document.querySelectorAll('.louvre-info-slide');
    const carouselDots = document.querySelectorAll('.louvre-carousel-dot');
    const prevArrow = document.querySelector('.louvre-carousel-arrow.prev');
    const nextArrow = document.querySelector('.louvre-carousel-arrow.next');
    let currentSlide = 0;
    let autoSlideInterval;

    function showSlide(index) {
        if (infoSlides.length === 0) return;
        
        if (index >= infoSlides.length) index = 0;
        if (index < 0) index = infoSlides.length - 1;
        
        currentSlide = index;
        
        infoSlides.forEach((slide, i) => {
            slide.classList.remove('active');
            if (i === index) slide.classList.add('active');
        });
        
        carouselDots.forEach((dot, i) => {
            dot.classList.remove('active');
            if (i === index) dot.classList.add('active');
        });
    }

    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    function prevSlide() {
        showSlide(currentSlide - 1);
    }

    function startAutoSlide() {
        stopAutoSlide();
        autoSlideInterval = setInterval(nextSlide, 7000);
    }

    function stopAutoSlide() {
        if (autoSlideInterval) clearInterval(autoSlideInterval);
    }

    carouselDots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            startAutoSlide();
        });
    });

    if (prevArrow) {
        prevArrow.addEventListener('click', () => {
            prevSlide();
            startAutoSlide();
        });
    }

    if (nextArrow) {
        nextArrow.addEventListener('click', () => {
            nextSlide();
            startAutoSlide();
        });
    }

    if (infoSlides.length > 0) {
        showSlide(0);
        startAutoSlide();
    }

    // =============================================
    // SMOOTH SCROLL
    // =============================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // =============================================
    // NOTIFICATION SYSTEM
    // =============================================
    function showNotification(message, type = 'info') {
        const existing = document.querySelector('.louvre-notification');
        if (existing) existing.remove();

        const notification = document.createElement('div');
        notification.className = `louvre-notification louvre-notification-${type}`;
        notification.innerHTML = `
            <span>${message}</span>
            <button class="louvre-notification-close">&times;</button>
        `;
        
        Object.assign(notification.style, {
            position: 'fixed',
            top: '20px',
            right: '20px',
            padding: '14px 20px',
            borderRadius: '4px',
            backgroundColor: type === 'warning' ? '#fff3cd' : type === 'error' ? '#f8d7da' : '#d1e7dd',
            color: type === 'warning' ? '#856404' : type === 'error' ? '#721c24' : '#155724',
            boxShadow: '0 4px 15px rgba(0,0,0,0.1)',
            zIndex: '99999',
            display: 'flex',
            alignItems: 'center',
            gap: '15px',
            animation: 'slideInRight 0.3s ease'
        });

        document.body.appendChild(notification);

        notification.querySelector('.louvre-notification-close').addEventListener('click', () => {
            notification.remove();
        });

        setTimeout(() => {
            if (notification.parentNode) {
                notification.style.animation = 'slideOutRight 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }
        }, 4000);
    }

    // Notification animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideOutRight {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        .louvre-notification-close {
            background: none;
            border: none;
            font-size: 1.4rem;
            cursor: pointer;
            opacity: 0.6;
            transition: opacity 0.2s;
        }
        .louvre-notification-close:hover {
            opacity: 1;
        }
    `;
    document.head.appendChild(style);

    // =============================================
    // STRIPE PAYMENT EVENT
    // =============================================
    if (window.EventBus) {
        window.EventBus.on('SHOW_STRIPE_PAYMENT', async function (data) {
            console.log('[LouvreTheme] SHOW_STRIPE_PAYMENT event received:', data);

            try {
                showStep(5);

                const prevBtn = document.querySelector('.wizard-btn-prev');
                const nextBtn = document.querySelector('.wizard-btn-next');
                if (prevBtn) prevBtn.style.display = 'none';
                if (nextBtn) nextBtn.style.display = 'none';

                if (window.StripePaymentHelper) {
                    const stripeHtml = window.StripePaymentHelper.generateStripeForm(data);
                    const container = document.getElementById('stripe-payment-container');

                    if (container) {
                        container.innerHTML = stripeHtml;

                        setTimeout(async () => {
                            try {
                                await window.StripePaymentHelper.initializeStripe(
                                    data.stripe_api_key,
                                    data.checkout_session,
                                    data.session_data
                                );
                            } catch (error) {
                                console.error('[LouvreTheme] Error initializing Stripe:', error);
                            }
                        }, 100);
                    }
                }
            } catch (error) {
                console.error('[LouvreTheme] Error:', error);
                showNotification('Error al cargar el formulario de pago. Por favor, recarga la página.', 'error');
            }
        });
    }

    // =============================================
    // SCROLL ANIMATIONS
    // =============================================
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -30px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.tour-card, .louvre-feature, .louvre-benefit').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(15px)';
        el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(el);
    });

    const animateStyle = document.createElement('style');
    animateStyle.textContent = `
        .animate-in {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
    `;
    document.head.appendChild(animateStyle);

    // =============================================
    // MENÚ HAMBURGUESA MÓVIL
    // =============================================
    function initMobileMenu() {
        // Crear botón hamburguesa si no existe
        let navbarToggler = document.querySelector('.navbar-toggler');
        if (!navbarToggler) {
            const navbar = document.querySelector('.navbar, header.navbar, nav.navbar');
            if (navbar) {
                navbarToggler = document.createElement('button');
                navbarToggler.className = 'navbar-toggler';
                navbarToggler.setAttribute('aria-label', 'Toggle navigation');
                navbarToggler.innerHTML = '<span class="navbar-toggler-icon"></span>';

                // Insertar el botón después del logo
                const navbarBrand = navbar.querySelector('.navbar-brand');
                if (navbarBrand) {
                    navbarBrand.parentNode.insertBefore(navbarToggler, navbarBrand.nextSibling);
                } else {
                    navbar.appendChild(navbarToggler);
                }
            }
        }

        // Crear overlay si no existe
        let overlay = document.querySelector('.navbar-overlay');
        if (!overlay) {
            overlay = document.createElement('div');
            overlay.className = 'navbar-overlay';
            document.body.appendChild(overlay);
        }

        // Encontrar el menú de navegación
        const navCollapse = document.querySelector('.navbar-collapse, .louvre-nav-container, .navbar-nav');

        if (navbarToggler && navCollapse) {
            // Toggle del menú
            navbarToggler.addEventListener('click', function(e) {
                e.stopPropagation();
                this.classList.toggle('active');
                navCollapse.classList.toggle('show');
                overlay.classList.toggle('show');
                document.body.style.overflow = navCollapse.classList.contains('show') ? 'hidden' : '';
            });

            // Cerrar menú al hacer clic en el overlay
            overlay.addEventListener('click', function() {
                navbarToggler.classList.remove('active');
                navCollapse.classList.remove('show');
                overlay.classList.remove('show');
                document.body.style.overflow = '';
            });

            // Cerrar menú al hacer clic en un enlace
            const navLinks = navCollapse.querySelectorAll('a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 992) {
                        navbarToggler.classList.remove('active');
                        navCollapse.classList.remove('show');
                        overlay.classList.remove('show');
                        document.body.style.overflow = '';
                    }
                });
            });

            // Cerrar menú al cambiar tamaño de ventana
            window.addEventListener('resize', function() {
                if (window.innerWidth > 992) {
                    navbarToggler.classList.remove('active');
                    navCollapse.classList.remove('show');
                    overlay.classList.remove('show');
                    document.body.style.overflow = '';
                }
            });
        }
    }

    // Inicializar menú móvil
    initMobileMenu();

    console.log('[LouvreTheme] Initialized successfully');
});
