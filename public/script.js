// DOM Elements
const getQuoteBtn = document.getElementById('get-quote-btn');
const finalCtaBtn = document.getElementById('final-cta-btn');
const quoteModal = document.getElementById('quote-modal');
const modalClose = document.querySelector('.modal-close');
const quoteForm = document.getElementById('quote-form');
const loanAmountInput = document.getElementById('loan-amount');
const repaymentPeriodSelect = document.getElementById('repayment-period');
const monthlyPaymentDisplay = document.getElementById('monthly-payment');
const totalCostDisplay = document.getElementById('total-cost');

// Loan Calculator
class LoanCalculator {
    constructor() {
        this.baseRate = 0.049; // 4.9% APR base rate
        this.minAmount = 500;
        this.maxAmount = 50000;
        this.minTerm = 12;
        this.maxTerm = 48;
        
        this.init();
    }
    
    init() {
        // Handle amount slider
        const amountSlider = document.getElementById('amount-slider');
        const amountDisplay = document.getElementById('amount-display');
        if (amountSlider) {
            amountSlider.addEventListener('input', (e) => {
                const value = e.target.value;
                if (amountDisplay) {
                    amountDisplay.textContent = `£${parseInt(value).toLocaleString()}`;
                }
                this.updateCalculation();
            });
        }
        
        // Handle period buttons
        const periodButtons = document.querySelectorAll('.period-btn');
        periodButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                periodButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                this.updateCalculation();
            });
        });
        
        // Handle legacy form elements if they exist
        if (loanAmountInput && repaymentPeriodSelect) {
            this.updateCalculation();
            loanAmountInput.addEventListener('input', () => this.updateCalculation());
            repaymentPeriodSelect.addEventListener('change', () => this.updateCalculation());
        }
        
        // Initial calculation
        this.updateCalculation();
    }
    
    calculateRate(amount, term) {
        // Risk-based pricing
        let rate = this.baseRate;
        
        // Amount-based adjustments
        if (amount < 2000) rate += 0.02; // Higher rate for smaller amounts
        else if (amount > 15000) rate -= 0.005; // Lower rate for larger amounts
        
        // Term-based adjustments
        if (term > 36) rate += 0.01; // Higher rate for longer terms
        
        return Math.max(0.029, Math.min(0.15, rate)); // Cap between 2.9% and 15%
    }
    
    calculateMonthlyPayment(amount, rate, term) {
        const monthlyRate = rate / 12;
        const numPayments = term;
        
        if (monthlyRate === 0) {
            return amount / numPayments;
        }
        
        const monthlyPayment = amount * (monthlyRate * Math.pow(1 + monthlyRate, numPayments)) / 
                              (Math.pow(1 + monthlyRate, numPayments) - 1);
        
        return monthlyPayment;
    }
    
    updateCalculation() {
        // Get amount from slider or input
        const amountSlider = document.getElementById('amount-slider');
        const amountInput = document.getElementById('loan-amount');
        let amount = 1000; // default
        
        if (amountSlider) {
            amount = parseFloat(amountSlider.value) || 1000;
        } else if (amountInput) {
            amount = parseFloat(amountInput.value) || 1000;
        }
        
        // Get term from active period button or select
        const activePeriodButton = document.querySelector('.period-btn.active');
        const periodSelect = document.getElementById('repayment-period');
        let term = 12; // default
        
        if (activePeriodButton) {
            term = parseInt(activePeriodButton.dataset.period) || 12;
        } else if (periodSelect) {
            term = parseInt(periodSelect.value) || 12;
        }
        
        // Validate inputs
        const validAmount = Math.max(this.minAmount, Math.min(this.maxAmount, amount));
        const validTerm = Math.max(this.minTerm, Math.min(this.maxTerm, term));
        
        const rate = this.calculateRate(validAmount, validTerm);
        const monthlyPayment = this.calculateMonthlyPayment(validAmount, rate, validTerm);
        const totalCost = monthlyPayment * validTerm;
        
        // Update displays
        const monthlyPaymentDisplay = document.getElementById('monthly-payment');
        const totalCostDisplay = document.getElementById('total-cost');
        
        if (monthlyPaymentDisplay) {
            monthlyPaymentDisplay.textContent = `£${Math.round(monthlyPayment)}`;
        }
        if (totalCostDisplay) {
            totalCostDisplay.textContent = `£${Math.round(totalCost)}`;
        }
        
        // Update slider and display if they exist
        if (amountSlider) {
            amountSlider.value = validAmount;
        }
        const amountDisplay = document.getElementById('amount-display');
        if (amountDisplay) {
            amountDisplay.textContent = `£${validAmount.toLocaleString()}`;
        }
        
        // Store calculation data for form submission
        this.currentCalculation = {
            amount: validAmount,
            term: validTerm,
            rate: rate,
            monthlyPayment: monthlyPayment,
            totalCost: totalCost
        };
    }
}

// Modal Management
class ModalManager {
    constructor() {
        this.init();
    }
    
    init() {
        // Buttons now redirect to apply page via onclick attributes
        // No need for modal event handlers
        
        // Close modal events
        if (modalClose) {
            modalClose.addEventListener('click', () => this.closeModal());
        }
        
        if (quoteModal) {
            quoteModal.addEventListener('click', (e) => {
                if (e.target === quoteModal) {
                    this.closeModal();
                }
            });
        }
        
        // Escape key to close
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && quoteModal.classList.contains('active')) {
                this.closeModal();
            }
        });
    }
    
    openModal() {
        if (quoteModal) {
            quoteModal.classList.add('active');
            document.body.style.overflow = 'hidden';
            
            // Focus first input
            const firstInput = quoteModal.querySelector('input, select');
            if (firstInput) {
                setTimeout(() => firstInput.focus(), 100);
            }
        }
    }
    
    closeModal() {
        if (quoteModal) {
            quoteModal.classList.remove('active');
            document.body.style.overflow = '';
        }
    }
}

// Form Handler
class FormHandler {
    constructor() {
        this.init();
    }
    
    init() {
        if (quoteForm) {
            quoteForm.addEventListener('submit', (e) => this.handleSubmit(e));
        }
    }
    
    handleSubmit(e) {
        e.preventDefault();
        
        const formData = new FormData(quoteForm);
        const data = Object.fromEntries(formData.entries());
        
        // Validate form
        if (!this.validateForm(data)) {
            return;
        }
        
        // Show loading state
        this.showLoading();
        
        // Simulate API call
        setTimeout(() => {
            this.handleSuccess(data);
        }, 2000);
    }
    
    validateForm(data) {
        const required = ['amount', 'purpose', 'employment', 'income', 'email', 'phone', 'terms'];
        const missing = required.filter(field => !data[field]);
        
        if (missing.length > 0) {
            this.showError('Please fill in all required fields.');
            return false;
        }
        
        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(data.email)) {
            this.showError('Please enter a valid email address.');
            return false;
        }
        
        // Phone validation
        const phoneRegex = /^[\+]?[0-9\s\-\(\)]{10,}$/;
        if (!phoneRegex.test(data.phone)) {
            this.showError('Please enter a valid phone number.');
            return false;
        }
        
        return true;
    }
    
    showLoading() {
        const submitBtn = quoteForm.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            submitBtn.disabled = true;
        }
    }
    
    handleSuccess(data) {
        // Reset form
        quoteForm.reset();
        
        // Show success message
        this.showSuccess();
        
        // Close modal after delay
        setTimeout(() => {
            modalManager.closeModal();
        }, 3000);
        
        // Track conversion (in real implementation, send to analytics)
        this.trackConversion(data);
    }
    
    showSuccess() {
        const modalBody = document.querySelector('.modal-body');
        if (modalBody) {
            modalBody.innerHTML = `
                <div style="text-align: center; padding: 40px 20px;">
                    <div style="width: 80px; height: 80px; background: #20B2AA; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
                        <i class="fas fa-check" style="color: white; font-size: 32px;"></i>
                    </div>
                    <h3 style="color: #2c3e50; margin-bottom: 16px;">Quote Request Submitted!</h3>
                    <p style="color: #666; margin-bottom: 24px;">Thank you for your interest. We'll review your application and get back to you within 24 hours with your personalized loan quote.</p>
                    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 24px;">
                        <h4 style="color: #2c3e50; margin-bottom: 12px;">What happens next?</h4>
                        <ul style="text-align: left; color: #666; line-height: 1.6;">
                            <li>We'll review your application</li>
                            <li>Check your credit profile</li>
                            <li>Send you a personalized quote</li>
                            <li>Guide you through the final steps</li>
                        </ul>
                    </div>
                    <p style="color: #666; font-size: 14px;">You can also call us at <strong>0800 123 4567</strong> for immediate assistance.</p>
                </div>
            `;
        }
    }
    
    showError(message) {
        // Remove existing error messages
        const existingError = document.querySelector('.form-error');
        if (existingError) {
            existingError.remove();
        }
        
        // Create error message
        const errorDiv = document.createElement('div');
        errorDiv.className = 'form-error';
        errorDiv.style.cssText = `
            background: #f8d7da;
            color: #721c24;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        `;
        errorDiv.textContent = message;
        
        // Insert at top of form
        const form = quoteForm;
        form.insertBefore(errorDiv, form.firstChild);
        
        // Remove error after 5 seconds
        setTimeout(() => {
            if (errorDiv.parentNode) {
                errorDiv.remove();
            }
        }, 5000);
    }
    
    trackConversion(data) {
        // In a real implementation, this would send data to analytics
        console.log('Conversion tracked:', {
            amount: data.amount,
            purpose: data.purpose,
            timestamp: new Date().toISOString()
        });
        
        // Example: Send to Google Analytics
        if (typeof gtag !== 'undefined') {
            gtag('event', 'loan_quote_request', {
                'event_category': 'engagement',
                'event_label': data.purpose,
                'value': parseFloat(data.amount)
            });
        }
    }
}

// Smooth Scrolling
class SmoothScroll {
    constructor() {
        this.init();
    }
    
    init() {
        // Add smooth scrolling to anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                e.preventDefault();
                const target = document.querySelector(anchor.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }
}

// Animation on Scroll
class ScrollAnimations {
    constructor() {
        this.init();
    }
    
    init() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);
        
        // Observe elements for animation
        const animatedElements = document.querySelectorAll('.step, .loan-card, .testimonial, .trust-item');
        animatedElements.forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    }
}

// Trust Indicators Animation
class TrustIndicators {
    constructor() {
        this.init();
    }
    
    init() {
        // Animate trust indicators on scroll
        const trustItems = document.querySelectorAll('.trust-item');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                }
            });
        }, { threshold: 0.1 });
        
        trustItems.forEach(item => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';
            item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(item);
        });
    }
}

// Mobile Menu
class MobileMenu {
    constructor() {
        this.init();
    }
    
    init() {
        const mobileToggle = document.querySelector('.mobile-menu-toggle');
        const navLinks = document.querySelector('.nav-links');
        
        if (mobileToggle && navLinks) {
            mobileToggle.addEventListener('click', () => {
                navLinks.classList.toggle('active');
                mobileToggle.classList.toggle('active');
            });
        }
    }
}

// Exit Intent Detection
class ExitIntent {
    constructor() {
        this.init();
    }
    
    init() {
        let exitIntentShown = false;
        
        document.addEventListener('mouseout', (e) => {
            if (e.clientY <= 0 && !exitIntentShown) {
                this.showExitIntent();
                exitIntentShown = true;
            }
        });
        
        // Show exit intent after 30 seconds if user hasn't converted
        setTimeout(() => {
            if (!exitIntentShown) {
                this.showExitIntent();
                exitIntentShown = true;
            }
        }, 30000);
    }
    
    showExitIntent() {
        const modal = document.getElementById('exit-intent-modal');
        if (modal) {
            modal.style.display = 'flex';
        }
    }
}


// Floating CTA Management
class FloatingCTA {
    constructor() {
        this.init();
    }
    
    init() {
        const floatingCTA = document.getElementById('floating-cta');
        if (floatingCTA) {
            // Show floating CTA after scrolling 50% of page
            window.addEventListener('scroll', () => {
                const scrollPercent = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
                if (scrollPercent > 50) {
                    floatingCTA.style.display = 'block';
                }
            });
        }
    }
}

// FAQ Handler
class FAQHandler {
    constructor() {
        this.init();
    }
    
    init() {
        // Handle category switching
        const categoryButtons = document.querySelectorAll('.faq-category');
        categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                const category = button.dataset.category;
                this.switchCategory(category);
            });
        });
        
        // Handle FAQ item toggling
        const faqItems = document.querySelectorAll('.faq-item');
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            question.addEventListener('click', () => {
                this.toggleFAQItem(item);
            });
        });
    }
    
    switchCategory(category) {
        // Update active category button
        const categoryButtons = document.querySelectorAll('.faq-category');
        categoryButtons.forEach(btn => {
            btn.classList.remove('active');
            if (btn.dataset.category === category) {
                btn.classList.add('active');
            }
        });
        
        // Update active category content
        const categoryContents = document.querySelectorAll('.faq-category-content');
        categoryContents.forEach(content => {
            content.classList.remove('active');
            if (content.id === category) {
                content.classList.add('active');
            }
        });
    }
    
    toggleFAQItem(item) {
        const isActive = item.classList.contains('active');
        
        // Close all other FAQ items in the same category
        const categoryContent = item.closest('.faq-category-content');
        const allItems = categoryContent.querySelectorAll('.faq-item');
        allItems.forEach(faqItem => {
            if (faqItem !== item) {
                faqItem.classList.remove('active');
            }
        });
        
        // Toggle current item
        if (isActive) {
            item.classList.remove('active');
        } else {
            item.classList.add('active');
        }
    }
}

// Application Form Handler
class ApplicationFormHandler {
    constructor() {
        this.init();
    }
    
    init() {
        const applicationForm = document.getElementById('application-form');
        if (applicationForm) {
            applicationForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleApplicationSubmission(applicationForm);
            });
        }
    }
    
    handleApplicationSubmission(form) {
        const formData = new FormData(form);
        const data = Object.fromEntries(formData);
        
        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
        submitBtn.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            // Reset button
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            
            // Show success message
            this.showSuccessMessage();
            
            // Track conversion
            if (typeof gtag !== 'undefined') {
                gtag('event', 'conversion', {
                    'event_category': 'form_submission',
                    'event_label': 'loan_application'
                });
            }
        }, 2000);
    }
    
    showSuccessMessage() {
        const modal = document.createElement('div');
        modal.className = 'success-modal';
        modal.innerHTML = `
            <div class="success-content">
                <div class="success-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3>Application Submitted Successfully!</h3>
                <p>Thank you for your loan application. We'll review your details and contact you within 2 hours with a decision. You'll receive an email confirmation shortly.</p>
                <button class="btn btn-primary" onclick="this.parentElement.parentElement.remove()">
                    Close
                </button>
            </div>
        `;
        
        document.body.appendChild(modal);
        
        // Auto-remove after 8 seconds
        setTimeout(() => {
            if (modal.parentElement) {
                modal.remove();
            }
        }, 8000);
    }
}

// Initialize everything when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    // Initialize all components
    const calculator = new LoanCalculator();
    const modalManager = new ModalManager();
    const formHandler = new FormHandler();
    const applicationFormHandler = new ApplicationFormHandler();
    const faqHandler = new FAQHandler();
    const smoothScroll = new SmoothScroll();
    const scrollAnimations = new ScrollAnimations();
    const trustIndicators = new TrustIndicators();
    const mobileMenu = new MobileMenu();
    const exitIntent = new ExitIntent();
    const floatingCTA = new FloatingCTA();
    
    // Add loading animation
    document.body.style.opacity = '0';
    setTimeout(() => {
        document.body.style.transition = 'opacity 0.5s ease';
        document.body.style.opacity = '1';
    }, 100);
    
    // Add click tracking for CRO optimization
    document.addEventListener('click', (e) => {
        const target = e.target.closest('button, a');
        if (target) {
            const action = target.textContent.trim() || target.getAttribute('href') || 'unknown';
            console.log('User clicked:', action);
            
            // Track button clicks for analytics
            if (typeof gtag !== 'undefined') {
                gtag('event', 'click', {
                    'event_category': 'engagement',
                    'event_label': action
                });
            }
        }
    });
    
    // Add form field tracking
    const formInputs = document.querySelectorAll('input, select, textarea');
    formInputs.forEach(input => {
        input.addEventListener('focus', () => {
            console.log('User focused on:', input.name || input.id);
        });
        
        input.addEventListener('blur', () => {
            if (input.value) {
                console.log('User completed field:', input.name || input.id);
            }
        });
    });
    
    // Add scroll-based animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    const animatedElements = document.querySelectorAll('.step, .loan-card, .testimonial, .trust-item, .comparison-item');
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
});

// Utility functions
const utils = {
    formatCurrency: (amount) => {
        return new Intl.NumberFormat('en-GB', {
            style: 'currency',
            currency: 'GBP'
        }).format(amount);
    },
    
    formatNumber: (number) => {
        return new Intl.NumberFormat('en-GB').format(number);
    },
    
    debounce: (func, wait) => {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
};

// Export for potential module use
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        LoanCalculator,
        ModalManager,
        FormHandler,
        utils
    };
}
