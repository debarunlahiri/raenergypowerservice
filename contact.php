<?php
session_start();
require __DIR__ . '/includes/site-data.php';
require __DIR__ . '/includes/layout.php';

// Generate CSRF token if not present
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrfToken = $_SESSION['csrf_token'];

render_site_start($company, $navItems, 'contact', 'Contact | ' . $company['name'], 'Request a call or contact RA Energy Power Service for power plant operation, maintenance and industrial utility support.');
render_page_hero('Contact', 'Request a call from our industrial service team.', 'Share your requirement or contact our offices directly for operation, maintenance, erection and utility support.');
?>
<style>
    .honeypot-field { position: absolute; left: -9999px; top: -9999px; opacity: 0; }
    .form-alert { display: none; margin-bottom: 18px; }
    .form-alert.is-visible { display: block; }
    .btn.is-loading { opacity: 0.7; pointer-events: none; }
    .btn.is-loading::after { content: '...'; }

    /* Modal */
    .modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 100;
        align-items: center;
        justify-content: center;
        background: rgba(7, 17, 31, 0.55);
        backdrop-filter: blur(4px);
        opacity: 0;
        transition: opacity 250ms ease;
    }
    .modal-overlay.is-open {
        display: flex;
        opacity: 1;
    }
    .modal-box {
        width: min(480px, calc(100% - 32px));
        padding: 32px 28px;
        border-radius: var(--radius-lg);
        background: var(--paper);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.18);
        text-align: center;
        transform: translateY(12px) scale(0.98);
        transition: transform 250ms ease;
    }
    .modal-overlay.is-open .modal-box {
        transform: translateY(0) scale(1);
    }
    .modal-icon {
        display: grid;
        place-items: center;
        width: 64px;
        height: 64px;
        margin: 0 auto 18px;
        border-radius: 50%;
        font-size: 28px;
    }
    .modal-icon.success {
        color: #16a34a;
        background: rgba(22, 163, 74, 0.10);
    }
    .modal-icon.error {
        color: var(--red);
        background: rgba(199, 62, 29, 0.10);
    }
    .modal-box h3 {
        margin: 0 0 8px;
        font-size: 1.25rem;
        font-weight: 800;
        color: var(--ink);
    }
    .modal-box p {
        margin: 0 0 22px;
        color: var(--muted);
        line-height: 1.5;
    }
    .modal-close {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 44px;
        padding: 10px 24px;
        border: 2px solid var(--blue);
        border-radius: var(--radius-sm);
        background: var(--blue);
        color: #ffffff;
        font-weight: 800;
        font-size: .95rem;
        cursor: pointer;
        transition: transform 160ms ease, background-color 160ms ease;
    }
    .modal-close:hover {
        transform: translateY(-2px);
    }
    .field input.is-invalid,
    .field textarea.is-invalid {
        border-color: var(--red) !important;
    }
    .field input.is-invalid + span,
    .field textarea.is-invalid + span {
        color: var(--red) !important;
    }
    .field input.is-invalid:focus,
    .field textarea.is-invalid:focus {
        border-color: var(--red) !important;
        box-shadow: 0 0 0 3px rgba(199, 62, 29, 0.12);
    }
    .field input.is-valid,
    .field textarea.is-valid {
        border-color: #16a34a !important;
    }
    .field input.is-valid:focus,
    .field textarea.is-valid:focus {
        box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.12);
    }
    .field input:focus,
    .field textarea:focus {
        box-shadow: 0 0 0 3px rgba(23, 78, 166, 0.12);
    }
    .field-error {
        display: none;
        margin-top: 6px;
        color: var(--red);
        font-size: .78rem;
        font-weight: 700;
    }
    .field-error.is-visible {
        display: block;
    }
    .field-hint {
        display: block;
        margin-top: 6px;
        color: var(--muted);
        font-size: .78rem;
        font-weight: 600;
    }
</style>
<section class="section">
    <div class="wrap contact-grid">
        <form class="contact-form reveal" id="contactForm" action="contact-handler.php" method="post" novalidate>
            <h2>Send Requirement</h2>
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
            <label class="field honeypot-field">
                <input type="text" name="website" placeholder=" " tabindex="-1" autocomplete="off">
                <span>Website</span>
            </label>
            <label class="field">
                <input type="text" name="name" id="name" placeholder=" " required minlength="2" maxlength="100">
                <span>Name</span>
                <em class="field-error" id="nameError"></em>
            </label>
            <label class="field">
                <input type="tel" name="phone" id="phone" placeholder=" " required>
                <span>Phone</span>
                <em class="field-error" id="phoneError"></em>
                <small class="field-hint">Enter a valid phone number (minimum 10 digits)</small>
            </label>
            <label class="field">
                <input type="email" name="email" id="email" placeholder=" " maxlength="255">
                <span>Email</span>
                <em class="field-error" id="emailError"></em>
            </label>
            <label class="field">
                <textarea name="message" id="message" rows="6" placeholder=" " required minlength="10" maxlength="2000"></textarea>
                <span>Requirement</span>
                <em class="field-error" id="messageError"></em>
                <small class="field-hint">Describe your requirement in at least 10 characters</small>
            </label>
            <button class="btn btn-primary" type="submit" id="submitBtn">Submit Request</button>
        </form>

        <!-- Success Modal -->
        <div class="modal-overlay" id="successModal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
            <div class="modal-box">
                <div class="modal-icon success" aria-hidden="true">&#10003;</div>
                <h3 id="modalTitle">Message Sent!</h3>
                <p>Thank you! Your message has been sent successfully. We will get back to you shortly.</p>
                <button class="modal-close" type="button" id="modalCloseBtn">Close</button>
            </div>
        </div>

        <!-- Error Modal -->
        <div class="modal-overlay" id="errorModal" role="dialog" aria-modal="true" aria-labelledby="errorModalTitle">
            <div class="modal-box">
                <div class="modal-icon error" aria-hidden="true">&#33;</div>
                <h3 id="errorModalTitle">Something went wrong</h3>
                <p id="errorModalText">An unexpected error occurred. Please try again.</p>
                <button class="modal-close" type="button" id="errorModalCloseBtn">Try Again</button>
            </div>
        </div>

        <script>
            (function() {
                const form = document.getElementById('contactForm');
                const submitBtn = document.getElementById('submitBtn');
                const successModal = document.getElementById('successModal');
                const errorModal = document.getElementById('errorModal');
                const errorModalText = document.getElementById('errorModalText');
                const modalCloseBtn = document.getElementById('modalCloseBtn');
                const errorModalCloseBtn = document.getElementById('errorModalCloseBtn');
                
                const fields = {
                    name: document.getElementById('name'),
                    phone: document.getElementById('phone'),
                    email: document.getElementById('email'),
                    message: document.getElementById('message')
                };
                
                const errors = {
                    name: document.getElementById('nameError'),
                    phone: document.getElementById('phoneError'),
                    email: document.getElementById('emailError'),
                    message: document.getElementById('messageError')
                };
                
                const phoneRegex = /^[\+]?[0-9\s\-\.\(\)xext]{7,50}$/i;
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                function clearFieldError(fieldName) {
                    const field = fields[fieldName];
                    const error = errors[fieldName];
                    if (field) {
                        field.classList.remove('is-invalid');
                        field.classList.remove('is-valid');
                    }
                    if (error) {
                        error.textContent = '';
                        error.classList.remove('is-visible');
                    }
                }
                
                function showFieldError(fieldName, message) {
                    const field = fields[fieldName];
                    const error = errors[fieldName];
                    if (field) {
                        field.classList.add('is-invalid');
                        field.classList.remove('is-valid');
                    }
                    if (error) {
                        error.textContent = message;
                        error.classList.add('is-visible');
                    }
                }
                
                function showFieldValid(fieldName) {
                    const field = fields[fieldName];
                    if (field) {
                        field.classList.remove('is-invalid');
                        field.classList.add('is-valid');
                    }
                }

                function openModal(modal) {
                    modal.classList.add('is-open');
                    document.body.style.overflow = 'hidden';
                }

                function closeModal(modal) {
                    modal.classList.remove('is-open');
                    document.body.style.overflow = '';
                }

                function showSuccessModal() {
                    openModal(successModal);
                }

                function showErrorModal(message) {
                    if (errorModalText) {
                        errorModalText.textContent = message;
                    }
                    openModal(errorModal);
                }

                function hideModals() {
                    closeModal(successModal);
                    closeModal(errorModal);
                }
                
                function validateField(fieldName) {
                    const field = fields[fieldName];
                    const value = field.value.trim();
                    clearFieldError(fieldName);
                    
                    if (fieldName === 'name') {
                        if (!value) {
                            showFieldError('name', 'Please enter your name.');
                            return false;
                        }
                        if (value.length < 2) {
                            showFieldError('name', 'Name must be at least 2 characters.');
                            return false;
                        }
                        if (value.length > 100) {
                            showFieldError('name', 'Name must be less than 100 characters.');
                            return false;
                        }
                        showFieldValid('name');
                        return true;
                    }
                    
                    if (fieldName === 'phone') {
                        if (!value) {
                            showFieldError('phone', 'Please enter your phone number.');
                            return false;
                        }
                        const digitsOnly = value.replace(/\D/g, '');
                        if (digitsOnly.length < 10) {
                            showFieldError('phone', 'Phone number must have at least 10 digits.');
                            return false;
                        }
                        if (!phoneRegex.test(value)) {
                            showFieldError('phone', 'Please enter a valid phone number.');
                            return false;
                        }
                        showFieldValid('phone');
                        return true;
                    }
                    
                    if (fieldName === 'email') {
                        if (value && !emailRegex.test(value)) {
                            showFieldError('email', 'Please enter a valid email address.');
                            return false;
                        }
                        if (value) {
                            showFieldValid('email');
                        }
                        return true;
                    }
                    
                    if (fieldName === 'message') {
                        if (!value) {
                            showFieldError('message', 'Please describe your requirement.');
                            return false;
                        }
                        if (value.length < 10) {
                            showFieldError('message', 'Requirement must be at least 10 characters.');
                            return false;
                        }
                        if (value.length > 2000) {
                            showFieldError('message', 'Requirement must be less than 2000 characters.');
                            return false;
                        }
                        showFieldValid('message');
                        return true;
                    }
                    
                    return true;
                }
                
                function validateAll() {
                    let valid = true;
                    ['name', 'phone', 'email', 'message'].forEach(function(name) {
                        if (!validateField(name)) {
                            valid = false;
                        }
                    });
                    return valid;
                }
                
                // Real-time validation on blur
                Object.keys(fields).forEach(function(name) {
                    if (fields[name]) {
                        fields[name].addEventListener('blur', function() {
                            validateField(name);
                        });
                        fields[name].addEventListener('input', function() {
                            if (fields[name].classList.contains('is-invalid')) {
                                validateField(name);
                            }
                        });
                    }
                });
                
                // Close buttons
                modalCloseBtn.addEventListener('click', function() {
                    closeModal(successModal);
                });
                errorModalCloseBtn.addEventListener('click', function() {
                    closeModal(errorModal);
                });

                // Close on backdrop click
                successModal.addEventListener('click', function(e) {
                    if (e.target === successModal) {
                        closeModal(successModal);
                    }
                });
                errorModal.addEventListener('click', function(e) {
                    if (e.target === errorModal) {
                        closeModal(errorModal);
                    }
                });

                // Close on Escape key
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        hideModals();
                    }
                });

                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    hideModals();

                    if (!validateAll()) {
                        // Focus first invalid field
                        const firstInvalid = form.querySelector('.is-invalid');
                        if (firstInvalid) {
                            firstInvalid.focus();
                        }
                        return;
                    }

                    submitBtn.classList.add('is-loading');

                    const formData = new FormData(form);

                    fetch('contact-handler.php', {
                        method: 'POST',
                        body: formData,
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        submitBtn.classList.remove('is-loading');
                        if (data.success) {
                            showSuccessModal();
                            form.reset();
                            Object.keys(fields).forEach(function(name) {
                                clearFieldError(name);
                            });
                        } else {
                            if (data.field_errors) {
                                Object.keys(data.field_errors).forEach(function(name) {
                                    showFieldError(name, data.field_errors[name]);
                                });
                                const firstInvalid = form.querySelector('.is-invalid');
                                if (firstInvalid) {
                                    firstInvalid.focus();
                                }
                            }
                            if (data.message) {
                                showErrorModal(data.message);
                            }
                        }
                    })
                    .catch(function() {
                        submitBtn.classList.remove('is-loading');
                        showErrorModal('An unexpected error occurred. Please try again.');
                    });
                });
            })();
        </script>

        <aside class="contact-panel reveal">
            <h2>Contact Details</h2>
            <article>
                <strong><?= e($company['india_name']) ?></strong>
                <p><?= e($company['regional_office']) ?></p>
                <p><a href="tel:+919038018888"><?= e($company['phone_india']) ?></a></p>
                <p><a href="tel:+919038028888"><?= e($company['phone_india_alt']) ?></a></p>
            </article>
            <article>
                <strong>Gujarat Branch Office</strong>
                <p><?= e($company['gujarat_branch_office']) ?></p>
            </article>
            <article>
                <strong><?= e($company['nepal_name']) ?></strong>
                <p><?= e($company['registered_office']) ?></p>
                <p><a href="tel:+9779806925595"><?= e($company['phone_nepal']) ?></a></p>
                <p><a href="tel:+9777572075150"><?= e($company['phone_nepal_alt']) ?></a></p>
            </article>
            <article>
                <strong>Email</strong>
                <p><a href="mailto:<?= e($company['email']) ?>"><?= e($company['email']) ?></a></p>
            </article>
            <article>
                <strong>Hours</strong>
                <p><?= e($company['hours']) ?></p>
            </article>
        </aside>
    </div>
</section>
<?php render_site_end($company, $navItems); ?>
