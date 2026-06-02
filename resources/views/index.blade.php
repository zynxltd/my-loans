<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myLoans - Quick UK Loans from £500+ | Fast Approval | FCA Regulated</title>
    <meta name="description" content="Get quick UK loans from £500+ with myLoans. Same-day approval, competitive rates, no hidden fees. FCA regulated lender. Get your instant quote today!">
    <meta name="keywords" content="UK loans, quick loans, personal loans, same day loans, FCA regulated, loan calculator, instant approval, competitive rates">
    <meta name="robots" content="index, follow">
    <meta name="author" content="myLoans">
    <meta property="og:title" content="myLoans - Quick UK Loans from £500+ | Fast Approval">
    <meta property="og:description" content="Get quick UK loans from £500+ with myLoans. Same-day approval, competitive rates, no hidden fees. FCA regulated lender.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://myloans.co.uk">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="myLoans - Quick UK Loans from £500+">
    <meta name="twitter:description" content="Get quick UK loans from £500+ with myLoans. Same-day approval, competitive rates, no hidden fees.">
    <link rel="canonical" href="https://myloans.co.uk">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="theme-color" content="#20B2AA">
    
    <!-- CRO Optimization Scripts -->
    <script>
        // Track user engagement
        let startTime = Date.now();
        let scrollDepth = 0;
        let maxScrollDepth = 0;
        
        // Track scroll depth
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            scrollDepth = Math.round((scrollTop / docHeight) * 100);
            maxScrollDepth = Math.max(maxScrollDepth, scrollDepth);
        });
        
        // Track time on page
        window.addEventListener('beforeunload', function() {
            const timeOnPage = Math.round((Date.now() - startTime) / 1000);
            console.log('Time on page:', timeOnPage, 'seconds');
            console.log('Max scroll depth:', maxScrollDepth, '%');
        });
    </script>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="nav">
            <div class="nav-container">
                <div class="logo">
                    <div class="logo-icon">
                        <span class="pound-symbol">£</span>
                    </div>
                    <div class="logo-text">
                        <span class="logo-my">my</span><span class="logo-loans">Loans</span>
                    </div>
                </div>
                <div class="nav-links">
                    <a href="{{ url('/') }}#how-it-works">How it Works</a>
                    <a href="{{ url('/') }}#rates">Rates</a>
                    <a href="{{ url('/about') }}">About</a>
                    <a href="{{ url('/contact') }}">Contact</a>
                </div>
                <div class="nav-cta">
                    <button class="btn btn-primary" onclick="window.location.href='{{ url('/apply') }}'">Get Quote</button>
                </div>
                <div class="mobile-menu-toggle">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-background">
            <div class="hero-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
            </div>
        </div>
        <div class="hero-container">
            <div class="hero-content">
                <div class="hero-text">
                    <div class="hero-badge">
                        <i class="fas fa-star"></i>
                        <span>Trusted by 50,000+ UK Customers</span>
                    </div>
                    <h1 class="hero-title">
                        Get Your <span class="highlight">Quick UK Loan</span><br>
                        From <span class="amount">£500+</span>
                    </h1>
                    <p class="hero-subtitle">
                        Fast approval, competitive rates, and flexible repayment options. 
                        Get your quote in minutes with our simple online application.
                    </p>
                    <div class="hero-features">
                        <div class="feature">
                            <i class="fas fa-bolt"></i>
                            <span>Same-day approval</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-shield-alt"></i>
                            <span>No hidden fees</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Flexible terms</span>
                        </div>
                    </div>
                    <div class="hero-cta">
                        <button class="btn btn-primary btn-large pulse-animation" id="get-quote-btn" onclick="window.location.href='{{ url('/apply') }}'">
                            <i class="fas fa-calculator"></i>
                            Get Your Quote Now
                            <span class="btn-badge">FREE</span>
                        </button>
                        <div class="trust-indicators">
                            <div class="trust-item">
                                <i class="fas fa-shield-alt"></i>
                                <span>FCA Regulated</span>
                            </div>
                            <div class="trust-item">
                                <i class="fas fa-lock"></i>
                                <span>Secure & Safe</span>
                            </div>
                            <div class="trust-item">
                                <i class="fas fa-award"></i>
                                <span>5-Star Rated</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-calculator">
                    <div class="calculator-card">
                        <div class="calculator-header">
                            <h3>Quick Loan Calculator</h3>
                            <div class="calculator-badge">
                                <i class="fas fa-calculator"></i>
                                <span>Instant Quote</span>
                            </div>
                        </div>
                        <div class="calculator-body">
                            <div class="calculator-input">
                                <label>Loan Amount</label>
                                <div class="amount-slider-container">
                                    <span class="amount-display" id="amount-display">£1,000</span>
                                    <input type="range" id="amount-slider" min="500" max="50000" value="1000" step="100" class="amount-slider">
                                </div>
                            </div>
                            <div class="calculator-input">
                                <label>Repayment Period</label>
                                <div class="period-buttons">
                                    <button class="period-btn active" data-period="12">12m</button>
                                    <button class="period-btn" data-period="24">24m</button>
                                    <button class="period-btn" data-period="36">36m</button>
                                    <button class="period-btn" data-period="48">48m</button>
                                </div>
                            </div>
                            <div class="calculator-result">
                                <div class="result-item">
                                    <span class="result-label">Monthly Payment</span>
                                    <span class="result-value" id="monthly-payment">£89</span>
                                </div>
                                <div class="result-item">
                                    <span class="result-label">Total Cost</span>
                                    <span class="result-value" id="total-cost">£1,068</span>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-full calculator-apply" onclick="window.location.href='{{ url('/apply') }}'">
                                <i class="fas fa-rocket"></i>
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">50,000+</div>
                    <div class="stat-label">Happy Customers</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">£2.5B+</div>
                    <div class="stat-label">Loans Approved</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">4.9/5</div>
                    <div class="stat-label">Customer Rating</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider">
        <div class="divider-content">
            <i class="fas fa-arrow-down"></i>
        </div>
    </div>

    <!-- How It Works Section -->
    <section class="how-it-works" id="how-it-works">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">
                    <i class="fas fa-cogs"></i>
                    <span>Simple Process</span>
                </div>
                <h2>How It Works</h2>
                <p>Get your loan in 3 simple steps - it's that easy!</p>
            </div>
            <div class="steps-container">
                <div class="steps">
                    <div class="step">
                        <div class="step-visual">
                            <div class="step-icon">
                                <i class="fas fa-laptop"></i>
                            </div>
                            <div class="step-number">1</div>
                        </div>
                        <div class="step-content">
                            <h3>Apply Online</h3>
                            <p>Fill out our simple online form in just a few minutes. No paperwork required.</p>
                            <div class="step-features">
                                <span class="step-feature">
                                    <i class="fas fa-check"></i>
                                    <span>2 minutes to complete</span>
                                </span>
                                <span class="step-feature">
                                    <i class="fas fa-check"></i>
                                    <span>No paperwork needed</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="step-connector">
                        <div class="connector-line"></div>
                        <div class="connector-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-visual">
                            <div class="step-icon">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <div class="step-number">2</div>
                        </div>
                        <div class="step-content">
                            <h3>Get Approved</h3>
                            <p>Receive instant approval decision. We'll review your application quickly.</p>
                            <div class="step-features">
                                <span class="step-feature">
                                    <i class="fas fa-check"></i>
                                    <span>Instant decision</span>
                                </span>
                                <span class="step-feature">
                                    <i class="fas fa-check"></i>
                                    <span>Soft credit check</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="step-connector">
                        <div class="connector-line"></div>
                        <div class="connector-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-visual">
                            <div class="step-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div class="step-number">3</div>
                        </div>
                        <div class="step-content">
                            <h3>Receive Funds</h3>
                            <p>Get your money transferred to your account the same day if approved.</p>
                            <div class="step-features">
                                <span class="step-feature">
                                    <i class="fas fa-check"></i>
                                    <span>Same-day transfer</span>
                                </span>
                                <span class="step-feature">
                                    <i class="fas fa-check"></i>
                                    <span>Secure banking</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="process-highlight">
                    <div class="highlight-content">
                        <i class="fas fa-clock"></i>
                        <div class="highlight-text">
                            <span class="highlight-title">Total Time</span>
                            <span class="highlight-value">Under 5 Minutes</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider">
        <div class="divider-content">
            <div class="divider-line"></div>
            <div class="divider-icon">
                <i class="fas fa-pound-sign"></i>
            </div>
            <div class="divider-line"></div>
        </div>
    </div>

    <!-- Loan Types Section -->
    <section class="loan-types">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">
                    <i class="fas fa-piggy-bank"></i>
                    <span>Loan Products</span>
                </div>
                <h2>Loan Types We Offer</h2>
                <p>Choose the perfect loan solution for your needs</p>
            </div>
            <div class="loan-cards">
                <div class="loan-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="card-badge">
                            <span>Flexible</span>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3>Personal Loans</h3>
                        <p>Flexible personal loans for any purpose. From home improvements to debt consolidation.</p>
                        <div class="loan-amount">
                            <span class="amount-range">£500 - £50,000</span>
                            <span class="amount-label">Loan Amount</span>
                        </div>
                        <ul class="loan-features">
                            <li><i class="fas fa-check"></i>1-7 years term</li>
                            <li><i class="fas fa-check"></i>Competitive rates</li>
                            <li><i class="fas fa-check"></i>No early repayment fees</li>
                        </ul>
                        <div class="card-footer">
                            <button class="btn btn-outline">Learn More</button>
                        </div>
                    </div>
                </div>
                <div class="loan-card featured">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="card-badge popular">
                            <i class="fas fa-star"></i>
                            <span>Most Popular</span>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3>Quick Loans</h3>
                        <p>Fast approval loans for urgent needs. Get the money you need when you need it.</p>
                        <div class="loan-amount">
                            <span class="amount-range">£500 - £25,000</span>
                            <span class="amount-label">Loan Amount</span>
                        </div>
                        <ul class="loan-features">
                            <li><i class="fas fa-check"></i>Same-day approval</li>
                            <li><i class="fas fa-check"></i>No early repayment fees</li>
                            <li><i class="fas fa-check"></i>Instant decision</li>
                        </ul>
                        <div class="card-footer">
                            <button class="btn btn-primary" onclick="window.location.href='{{ url('/apply') }}'">Apply Now</button>
                        </div>
                    </div>
                </div>
                <div class="loan-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="card-badge">
                            <span>Business</span>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3>Business Loans</h3>
                        <p>Support your business growth with our flexible business loan options.</p>
                        <div class="loan-amount">
                            <span class="amount-range">£1,000 - £100,000</span>
                            <span class="amount-label">Loan Amount</span>
                        </div>
                        <ul class="loan-features">
                            <li><i class="fas fa-check"></i>Flexible terms</li>
                            <li><i class="fas fa-check"></i>Quick decisions</li>
                            <li><i class="fas fa-check"></i>Business support</li>
                        </ul>
                        <div class="card-footer">
                            <button class="btn btn-outline">Learn More</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="loan-comparison">
                <div class="comparison-header">
                    <h3>Why Choose myLoans?</h3>
                    <p>Compare us with other lenders</p>
                </div>
                <div class="comparison-grid">
                    <div class="comparison-item">
                        <div class="comparison-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="comparison-content">
                            <h4>Fast Approval</h4>
                            <p>Get approved in minutes, not days</p>
                        </div>
                    </div>
                    <div class="comparison-item">
                        <div class="comparison-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="comparison-content">
                            <h4>FCA Regulated</h4>
                            <p>Fully regulated and protected</p>
                        </div>
                    </div>
                    <div class="comparison-item">
                        <div class="comparison-icon">
                            <i class="fas fa-percentage"></i>
                        </div>
                        <div class="comparison-content">
                            <h4>Competitive Rates</h4>
                            <p>From 4.9% APR representative</p>
                        </div>
                    </div>
                    <div class="comparison-item">
                        <div class="comparison-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="comparison-content">
                            <h4>No Hidden Fees</h4>
                            <p>Transparent pricing, no surprises</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider">
        <div class="divider-content">
            <div class="divider-line"></div>
            <div class="divider-icon">
                <i class="fas fa-quote-left"></i>
            </div>
            <div class="divider-line"></div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">
                    <i class="fas fa-quote-left"></i>
                    <span>Customer Stories</span>
                </div>
                <h2>What Our Customers Say</h2>
                <p>Real stories from real customers who trust myLoans</p>
            </div>
            <div class="testimonial-grid">
                <div class="testimonial">
                    <div class="testimonial-content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"Amazing service! I got approved within hours and the money was in my account the same day. The process was so simple and straightforward."</p>
                        <div class="testimonial-highlight">
                            <i class="fas fa-bolt"></i>
                            <span>Same-day approval</span>
                        </div>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=100&h=100&fit=crop&crop=face" alt="Sarah Johnson">
                        </div>
                        <div class="author-info">
                            <h4>Sarah Johnson</h4>
                            <span>London • Personal Loan</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="testimonial-content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"The best loan experience I've had. Clear terms, no hidden fees, and excellent customer service. Highly recommended!"</p>
                        <div class="testimonial-highlight">
                            <i class="fas fa-shield-alt"></i>
                            <span>No hidden fees</span>
                        </div>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face" alt="Michael Brown">
                        </div>
                        <div class="author-info">
                            <h4>Michael Brown</h4>
                            <span>Manchester • Business Loan</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="testimonial-content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"Fast, reliable, and trustworthy. I needed a loan quickly and myLoans delivered exactly what they promised."</p>
                        <div class="testimonial-highlight">
                            <i class="fas fa-handshake"></i>
                            <span>Trustworthy service</span>
                        </div>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&h=100&fit=crop&crop=face" alt="Emma Wilson">
                        </div>
                        <div class="author-info">
                            <h4>Emma Wilson</h4>
                            <span>Birmingham • Quick Loan</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-stats">
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number">4.9/5</div>
                        <div class="stat-label">Customer Rating</div>
                        <div class="stat-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Would Recommend</div>
                        <div class="stat-icon">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">50,000+</div>
                        <div class="stat-label">Happy Customers</div>
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider">
        <div class="divider-content">
            <div class="divider-line"></div>
            <div class="divider-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <div class="divider-line"></div>
        </div>
    </div>

    <!-- Trust & Security Section -->
    <section class="trust-security">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">
                    <i class="fas fa-shield-alt"></i>
                    <span>Security & Trust</span>
                </div>
                <h2>Trusted & Secure</h2>
                <p>Your security and privacy are our top priorities</p>
            </div>
            <div class="trust-grid">
                <div class="trust-item">
                    <div class="trust-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="trust-content">
                        <h3>FCA Regulated</h3>
                        <p>We are fully regulated by the Financial Conduct Authority, ensuring your protection.</p>
                        <div class="trust-badge">
                            <span>FCA Number: 123456</span>
                        </div>
                    </div>
                </div>
                <div class="trust-item">
                    <div class="trust-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="trust-content">
                        <h3>256-bit SSL Encryption</h3>
                        <p>All your data is protected with bank-level security encryption.</p>
                        <div class="trust-badge">
                            <span>Bank-level security</span>
                        </div>
                    </div>
                </div>
                <div class="trust-item">
                    <div class="trust-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div class="trust-content">
                        <h3>Data Protection</h3>
                        <p>We comply with GDPR and never share your personal information.</p>
                        <div class="trust-badge">
                            <span>GDPR Compliant</span>
                        </div>
                    </div>
                </div>
                <div class="trust-item">
                    <div class="trust-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="trust-content">
                        <h3>Award Winning</h3>
                        <p>Recognized for excellence in customer service and loan products.</p>
                        <div class="trust-badge">
                            <span>5-Star Rated</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="security-features">
                <div class="security-header">
                    <h3>Why Customers Trust myLoans</h3>
                    <p>Industry-leading security and compliance</p>
                </div>
                <div class="security-grid">
                    <div class="security-item">
                        <div class="security-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div class="security-text">
                            <h4>ISO 27001 Certified</h4>
                            <p>Information security management</p>
                        </div>
                    </div>
                    <div class="security-item">
                        <div class="security-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="security-text">
                            <h4>Responsible Lending</h4>
                            <p>Affordability checks and fair practices</p>
                        </div>
                    </div>
                    <div class="security-item">
                        <div class="security-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="security-text">
                            <h4>24/7 Support</h4>
                            <p>Always here when you need us</p>
                        </div>
                    </div>
                    <div class="security-item">
                        <div class="security-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="security-text">
                            <h4>Transparent Pricing</h4>
                            <p>No hidden fees or surprises</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider">
        <div class="divider-content">
            <div class="divider-line"></div>
            <div class="divider-icon">
                <i class="fas fa-rocket"></i>
            </div>
            <div class="divider-line"></div>
        </div>
    </div>

    <!-- FAQ Section -->
    <section class="faq-section" id="faq">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">
                    <i class="fas fa-question-circle"></i>
                    <span>Frequently Asked Questions</span>
                </div>
                <h2>Everything You Need to Know</h2>
                <p>Find answers to common questions about our quick UK loans</p>
            </div>
            
            <div class="faq-container">
                <div class="faq-categories">
                    <div class="faq-category active" data-category="general">
                        <i class="fas fa-info-circle"></i>
                        <span>General</span>
                    </div>
                    <div class="faq-category" data-category="application">
                        <i class="fas fa-file-alt"></i>
                        <span>Application</span>
                    </div>
                    <div class="faq-category" data-category="repayment">
                        <i class="fas fa-calendar-check"></i>
                        <span>Repayment</span>
                    </div>
                    <div class="faq-category" data-category="eligibility">
                        <i class="fas fa-user-check"></i>
                        <span>Eligibility</span>
                    </div>
                </div>
                
                <div class="faq-content">
                    <div class="faq-category-content active" id="general">
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>What is myLoans?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>myLoans is a leading UK loan provider offering quick, competitive personal loans from £500 to £50,000. We're FCA regulated and have helped over 50,000 customers get the funding they need.</p>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>How quickly can I get my loan?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Most applications are approved within minutes, and funds can be transferred to your account the same day if approved before 3pm on a weekday. Weekend applications are processed on the next business day.</p>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Are you FCA regulated?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Yes, we are fully authorized and regulated by the Financial Conduct Authority (FCA). This means we follow strict lending criteria and treat customers fairly.</p>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>What makes myLoans different?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>We offer competitive rates, fast approval, flexible repayment terms, and excellent customer service. Our online application is simple and secure, with no hidden fees.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="faq-category-content" id="application">
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>How do I apply for a loan?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Simply use our loan calculator to get an instant quote, then click "Get Your Quote Now" to start your application. The process takes just a few minutes and you'll get an instant decision.</p>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>What documents do I need?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>You'll need proof of identity (passport or driving licence), proof of address (utility bill or bank statement), and proof of income (payslips or bank statements). We may request additional documents depending on your circumstances.</p>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Is my personal information secure?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Absolutely. We use bank-level encryption to protect your data and are fully GDPR compliant. Your information is never shared with third parties without your consent.</p>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Can I apply if I have bad credit?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>We consider applications from people with various credit histories. While we can't guarantee approval, we use a comprehensive assessment that looks at more than just your credit score.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="faq-category-content" id="repayment">
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>When do I start repaying my loan?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Your first repayment is typically due one month after your loan is paid out. We'll confirm your exact repayment schedule when your loan is approved.</p>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Can I pay off my loan early?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Yes, you can pay off your loan early at any time without penalty. You'll only pay interest for the time you had the loan, potentially saving you money.</p>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>What if I can't make a payment?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Contact us immediately if you're having trouble making payments. We offer flexible solutions and can work with you to find a manageable repayment plan.</p>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>How do I make payments?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Payments are automatically collected by Direct Debit from your nominated bank account on your agreed repayment date. You can also make additional payments online or by phone.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="faq-category-content" id="eligibility">
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>What are the basic eligibility requirements?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>You must be 18 or over, a UK resident, have a UK bank account, and have a regular income. We also consider your credit history and ability to afford the loan.</p>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Do I need to be employed to apply?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Not necessarily. We accept applications from employed, self-employed, and retired individuals, as long as you can demonstrate a regular income.</p>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>What's the minimum income requirement?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>We don't have a fixed minimum income requirement. We assess each application individually, considering your income, expenses, and other financial commitments.</p>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Can I apply if I'm self-employed?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Yes, we welcome applications from self-employed individuals. You'll need to provide additional documentation such as tax returns or accountant's statements to verify your income.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-background">
            <div class="cta-shapes">
                <div class="cta-shape cta-shape-1"></div>
                <div class="cta-shape cta-shape-2"></div>
            </div>
        </div>
        <div class="container">
            <div class="cta-content">
                <div class="cta-header">
                    <div class="cta-badge">
                        <i class="fas fa-rocket"></i>
                        <span>Get Started Today</span>
                    </div>
                    <h2>Ready to Get Your Loan?</h2>
                    <p>Join thousands of satisfied customers who trust myLoans for their financial needs.</p>
                </div>
                <div class="cta-main">
                    <div class="cta-primary">
                        <button class="btn btn-primary btn-large pulse-animation" id="final-cta-btn" onclick="window.location.href='{{ url('/apply') }}'">
                            <i class="fas fa-calculator"></i>
                            Get Your Quote Now
                            <span class="btn-badge">FREE</span>
                        </button>
                        <div class="cta-guarantee">
                            <i class="fas fa-shield-alt"></i>
                            <span>100% Secure • No Obligation • Instant Quote</span>
                        </div>
                    </div>
                    <div class="cta-features">
                        <div class="feature">
                            <i class="fas fa-bolt"></i>
                            <span>Same-day approval</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-pound-sign"></i>
                            <span>From £500</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-mobile-alt"></i>
                            <span>Apply online</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-shield-alt"></i>
                            <span>FCA Regulated</span>
                        </div>
                    </div>
                </div>
                <div class="cta-stats">
                    <div class="stat">
                        <div class="stat-number">50,000+</div>
                        <div class="stat-label">Happy Customers</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number">4.9/5</div>
                        <div class="stat-label">Customer Rating</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Approval Rate</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="logo">
                        <div class="logo-icon">
                            <span class="pound-symbol">£</span>
                        </div>
                        <div class="logo-text">
                            <span class="logo-my">my</span><span class="logo-loans">Loans</span>
                        </div>
                    </div>
                    <p>Your trusted partner for quick and reliable UK loans.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="{{ url('/') }}#how-it-works">How it Works</a></li>
                        <li><a href="{{ url('/') }}#rates">Interest Rates</a></li>
                        <li><a href="{{ url('/about') }}">About Us</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Loan Products</h4>
                    <ul>
                        <li><a href="{{ url('/') }}#loan-types">Personal Loans</a></li>
                        <li><a href="{{ url('/') }}#loan-types">Quick Loans</a></li>
                        <li><a href="{{ url('/') }}#loan-types">Business Loans</a></li>
                        <li><a href="{{ url('/') }}#loan-types">Debt Consolidation</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="{{ url('/') }}#faq">FAQ</a></li>
                        <li><a href="{{ url('/contact') }}">Help Center</a></li>
                        <li><a href="{{ url('/terms') }}">Terms & Conditions</a></li>
                        <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 myLoans. All rights reserved. | FCA Regulated | Company Registration: 12345678</p>
            </div>
        </div>
    </footer>

    <!-- Quote Modal -->
    <div class="modal" id="quote-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Get Your Loan Quote</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <form id="quote-form">
                    <div class="form-group">
                        <label for="loan-amount-modal">Loan Amount</label>
                        <div class="amount-input">
                            <span class="currency">£</span>
                            <input type="number" id="loan-amount-modal" name="amount" min="500" max="50000" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="purpose">Loan Purpose</label>
                        <select id="purpose" name="purpose" required>
                            <option value="">Select purpose</option>
                            <option value="home-improvement">Home Improvement</option>
                            <option value="debt-consolidation">Debt Consolidation</option>
                            <option value="car-purchase">Car Purchase</option>
                            <option value="holiday">Holiday</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="employment">Employment Status</label>
                        <select id="employment" name="employment" required>
                            <option value="">Select status</option>
                            <option value="employed">Employed</option>
                            <option value="self-employed">Self-Employed</option>
                            <option value="retired">Retired</option>
                            <option value="unemployed">Unemployed</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="income">Annual Income</label>
                        <select id="income" name="income" required>
                            <option value="">Select income</option>
                            <option value="15000-25000">£15,000 - £25,000</option>
                            <option value="25000-40000">£25,000 - £40,000</option>
                            <option value="40000-60000">£40,000 - £60,000</option>
                            <option value="60000+">£60,000+</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="form-group checkbox-group">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">I agree to the <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a></label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-full">Get My Quote</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Floating CTA Button -->
    <div class="floating-cta" id="floating-cta">
        <button class="floating-btn" onclick="window.location.href='#faq'">
            <i class="fas fa-question-circle"></i>
            <span>FAQ</span>
            <div class="floating-badge">HELP</div>
        </button>
    </div>

    <!-- Exit Intent Modal -->
    <div class="exit-intent-modal" id="exit-intent-modal">
        <div class="exit-modal-content">
            <div class="exit-modal-header">
                <h3>Wait! Don't Miss Out</h3>
                <button class="exit-close" onclick="document.getElementById('exit-intent-modal').style.display='none'">×</button>
            </div>
            <div class="exit-modal-body">
                <p>Get your loan quote in under 2 minutes and see if you qualify for same-day approval!</p>
                <div class="exit-features">
                    <div class="exit-feature">
                        <i class="fas fa-bolt"></i>
                        <span>Same-day approval</span>
                    </div>
                    <div class="exit-feature">
                        <i class="fas fa-shield-alt"></i>
                        <span>No obligation</span>
                    </div>
                    <div class="exit-feature">
                        <i class="fas fa-clock"></i>
                        <span>2 minutes to complete</span>
                    </div>
                </div>
                <button class="btn btn-primary btn-large" onclick="window.location.href='{{ url('/apply') }}'; document.getElementById('exit-intent-modal').style.display='none'">
                    <i class="fas fa-rocket"></i>
                    Get My Quote Now
                </button>
            </div>
        </div>
    </div>

    <script src="{{ asset('script.js') }}"></script>
</body>
</html>
