/**
 * Main JavaScript file for AutoParts Pro
 * Handles interactive functionality and UI enhancements
 */

// DOM Content Loaded Event
document.addEventListener('DOMContentLoaded', function() {
    initSmoothScroll();
    initCategoryCards();
    initStatsAnimation();
    initMobileMenu();
});

/**
 * Initialize smooth scrolling for anchor links
 */
function initSmoothScroll() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            // Skip empty hash
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
}

/**
 * Initialize category card interactions
 */
function initCategoryCards() {
    const categoryCards = document.querySelectorAll('.category-card');
    
    categoryCards.forEach(card => {
        card.addEventListener('click', function() {
            const categoryName = this.querySelector('h3').textContent;
            console.log('Category selected:', categoryName);
            // TODO: Add navigation to category page when PHP controllers are implemented
        });
    });
}

/**
 * Initialize statistics counter animation
 */
function initStatsAnimation() {
    const statNumbers = document.querySelectorAll('.stat-number');
    
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateNumber(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    statNumbers.forEach(stat => {
        observer.observe(stat);
    });
}

/**
 * Animate number counting effect
 */
function animateNumber(element) {
    const text = element.textContent;
    const number = parseInt(text.replace(/\D/g, ''));
    
    if (isNaN(number)) return;
    
    const duration = 2000; // 2 seconds
    const steps = 60;
    const increment = number / steps;
    let current = 0;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= number) {
            element.textContent = text; // Restore original text with symbols
            clearInterval(timer);
        } else {
            const displayNumber = Math.floor(current);
            // Preserve original format (e.g., "10+", "50K+")
            if (text.includes('K+')) {
                element.textContent = (displayNumber / 1000).toFixed(0) + 'K+';
            } else if (text.includes('+')) {
                element.textContent = displayNumber + '+';
            } else {
                element.textContent = displayNumber;
            }
        }
    }, duration / steps);
}

/**
 * Initialize mobile menu toggle (for future mobile menu implementation)
 */
function initMobileMenu() {
    // TODO: Add mobile menu toggle when hamburger menu is added
    const nav = document.querySelector('nav');
    
    // Add active class on scroll for header
    let lastScroll = 0;
    const header = document.querySelector('header');
    
    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > 100) {
            header.style.boxShadow = '0 4px 20px rgba(0,0,0,0.4)';
        } else {
            header.style.boxShadow = '0 2px 10px rgba(0,0,0,0.3)';
        }
        
        lastScroll = currentScroll;
    });
}

/**
 * Utility function to format currency
 * @param {number} amount - Amount to format
 * @returns {string} Formatted currency string
 */
function formatCurrency(amount) {
    return new Intl.NumberFormat('ru-RU', {
        style: 'currency',
        currency: 'RUB'
    }).format(amount);
}

/**
 * Utility function to show notification
 * @param {string} message - Notification message
 * @param {string} type - Notification type (success, error, info)
 */
function showNotification(message, type = 'info') {
    // TODO: Implement notification system when needed
    console.log(`[${type.toUpperCase()}] ${message}`);
}

// Export functions for use in other modules (when using modules)
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        formatCurrency,
        showNotification
    };
}

