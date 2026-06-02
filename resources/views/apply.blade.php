<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Your Loan - myLoans</title>
    <meta name="description" content="Apply for your quick UK loan with myLoans. Simple online application, instant decision, competitive rates.">
    <meta name="keywords" content="apply for loan, UK loan application, quick loans, personal loans">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url('/apply') }}">
    <meta name="theme-color" content="#20B2AA">
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

    <!-- Apply Hero Section -->
    <section class="apply-hero">
        <div class="container">
            <div class="apply-hero-content">
                <div class="apply-hero-text">
                    <div class="apply-badge">
                        <i class="fas fa-rocket"></i>
                        <span>Quick Application</span>
                    </div>
                    <h1>Apply for Your <span class="highlight">Quick UK Loan</span></h1>
                    <p class="apply-subtitle">
                        Get your loan approved in minutes with our simple online application. 
                        No paperwork, no hassle - just quick, secure, and reliable lending.
                    </p>
                    <div class="apply-features">
                        <div class="feature">
                            <i class="fas fa-bolt"></i>
                            <span>Instant decision</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-shield-alt"></i>
                            <span>Secure application</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-clock"></i>
                            <span>Same-day approval</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Form Section -->
    <section class="application-section">
        <div class="container">
            <div class="section-header">
                <h2>Complete Your Application</h2>
                <p>Fill out the form below to get your personalized loan quote.</p>
            </div>
            
            <div class="application-form-container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="application-form" method="POST" action="{{ route('loan.submit') }}" id="loan-application-form">
                    @csrf
                    
                    <!-- Step 1: Loan Details -->
                    <div class="form-step active" id="step-1">
                        <div class="step-header">
                            <div class="step-number">1</div>
                            <div class="step-title">
                                <h3>Loan Details</h3>
                                <p>Tell us about your loan requirements</p>
                            </div>
                        </div>
                        
                        <div class="form-section">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="loan_amount">Loan Amount *</label>
                                    <input type="number" id="loan_amount" name="loan_amount" min="500" max="50000" step="100" value="1000" required>
                                    <span class="form-hint">£500 - £50,000</span>
                                </div>
                                <div class="form-group">
                                    <label for="loan_term">Repayment Period *</label>
                                    <select id="loan_term" name="loan_term" required>
                                        <option value="">Select period</option>
                                        <option value="1">12 months</option>
                                        <option value="2">24 months</option>
                                        <option value="3">36 months</option>
                                        <option value="4">48 months</option>
                                        <option value="5">60 months</option>
                                        <option value="6">72 months</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="loan_purpose">Purpose of Loan *</label>
                                    <select id="loan_purpose" name="loan_purpose" required>
                                        <option value="">Select purpose</option>
                                        <option value="1">Debt consolidation</option>
                                        <option value="2">Home improvement</option>
                                        <option value="3">Car purchase</option>
                                        <option value="4">Holiday</option>
                                        <option value="5">Wedding</option>
                                        <option value="6">Business</option>
                                        <option value="7">Education</option>
                                        <option value="8">Medical</option>
                                        <option value="9">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="loan_count">Loans in last 90 days *</label>
                                    <select id="loan_count" name="loan_count" required>
                                        <option value="">Select number</option>
                                        <option value="1">None</option>
                                        <option value="2">1 loan</option>
                                        <option value="3">2 loans</option>
                                        <option value="4">3 loans</option>
                                        <option value="5">4+ loans</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Personal Details -->
                    <div class="form-step" id="step-2">
                        <div class="step-header">
                            <div class="step-number">2</div>
                            <div class="step-title">
                                <h3>Personal Details</h3>
                                <p>Your basic information</p>
                            </div>
                        </div>
                        
                        <div class="form-section">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="title">Title *</label>
                                    <select id="title" name="title" required>
                                        <option value="">Select title</option>
                                        <option value="1">Mr</option>
                                        <option value="2">Mrs</option>
                                        <option value="3">Miss</option>
                                        <option value="4">Dr</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="first_name">First Name *</label>
                                    <input type="text" id="first_name" name="first_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name *</label>
                                    <input type="text" id="last_name" name="last_name" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="date_of_birth">Date of Birth *</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" required>
                                </div>
                                <div class="form-group">
                                    <label for="marital_status">Marital Status *</label>
                                    <select id="marital_status" name="marital_status" required>
                                        <option value="">Select status</option>
                                        <option value="1">Single</option>
                                        <option value="2">Married</option>
                                        <option value="3">Divorced</option>
                                        <option value="4">Widowed</option>
                                        <option value="5">Separated</option>
                                        <option value="6">Civil Partnership</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="mobile_phone">Mobile Phone *</label>
                                    <input type="tel" id="mobile_phone" name="mobile_phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="home_phone">Home Phone *</label>
                                    <input type="tel" id="home_phone" name="home_phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address *</label>
                                    <input type="email" id="email" name="email" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="dependants">Number of Dependants *</label>
                                    <select id="dependants" name="dependants" required>
                                        <option value="">Select number</option>
                                        <option value="1">None</option>
                                        <option value="2">1</option>
                                        <option value="3">2</option>
                                        <option value="4">3</option>
                                        <option value="5">4+</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="adults_living_with">Adults Living With *</label>
                                    <select id="adults_living_with" name="adults_living_with" required>
                                        <option value="">Select number</option>
                                        <option value="1">None</option>
                                        <option value="2">1</option>
                                        <option value="3">2</option>
                                        <option value="4">3</option>
                                        <option value="5">4+</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Address Details -->
                    <div class="form-step" id="step-3">
                        <div class="step-header">
                            <div class="step-number">3</div>
                            <div class="step-title">
                                <h3>Address Details</h3>
                                <p>Your current address</p>
                            </div>
                        </div>
                        
                        <div class="form-section">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="residential_status">Residential Status *</label>
                                    <select id="residential_status" name="residential_status" required>
                                        <option value="">Select status</option>
                                        <option value="1">Owner</option>
                                        <option value="2">Tenant</option>
                                        <option value="3">Living with parents</option>
                                        <option value="4">Living with friends</option>
                                        <option value="5">Council tenant</option>
                                        <option value="6">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address_years">Years at Address *</label>
                                    <select id="address_years" name="address_years" required>
                                        <option value="">Select years</option>
                                        <option value="1">Less than 1 year</option>
                                        <option value="2">1-2 years</option>
                                        <option value="3">2-3 years</option>
                                        <option value="4">3-5 years</option>
                                        <option value="5">5+ years</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="house_name_number">House Name/Number *</label>
                                    <input type="text" id="house_name_number" name="house_name_number" required>
                                </div>
                                <div class="form-group">
                                    <label for="street_address">Street Address *</label>
                                    <input type="text" id="street_address" name="street_address" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="city">City *</label>
                                    <input type="text" id="city" name="city" required>
                                </div>
                                <div class="form-group">
                                    <label for="county">County *</label>
                                    <input type="text" id="county" name="county" required>
                                </div>
                                <div class="form-group">
                                    <label for="postcode">Postcode *</label>
                                    <input type="text" id="postcode" name="postcode" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4: Employment Details -->
                    <div class="form-step" id="step-4">
                        <div class="step-header">
                            <div class="step-number">4</div>
                            <div class="step-title">
                                <h3>Employment Details</h3>
                                <p>Your work information</p>
                            </div>
                        </div>
                        
                        <div class="form-section">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="employment_status">Employment Status *</label>
                                    <select id="employment_status" name="employment_status" required>
                                        <option value="">Select status</option>
                                        <option value="1">Full-time employed</option>
                                        <option value="2">Part-time employed</option>
                                        <option value="3">Self-employed</option>
                                        <option value="4">Unemployed</option>
                                        <option value="5">Retired</option>
                                        <option value="6">Student</option>
                                    </select>
                                </div>
                                <div class="form-group" id="employer_name_group" style="display: none;">
                                    <label for="employer_name">Employer Name *</label>
                                    <input type="text" id="employer_name" name="employer_name">
                                </div>
                            </div>
                            
                            <div class="form-row" id="employment_details" style="display: none;">
                                <div class="form-group">
                                    <label for="job_title">Job Title *</label>
                                    <input type="text" id="job_title" name="job_title">
                                </div>
                                <div class="form-group">
                                    <label for="work_phone">Work Phone *</label>
                                    <input type="tel" id="work_phone" name="work_phone">
                                </div>
                            </div>
                            
                            <div class="form-row" id="employment_duration" style="display: none;">
                                <div class="form-group">
                                    <label for="employer_years">Years at Employer *</label>
                                    <select id="employer_years" name="employer_years">
                                        <option value="">Select years</option>
                                        <option value="1">Less than 1 year</option>
                                        <option value="2">1-2 years</option>
                                        <option value="3">2-3 years</option>
                                        <option value="4">3-5 years</option>
                                        <option value="5">5+ years</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="employer_months">Months at Employer *</label>
                                    <select id="employer_months" name="employer_months">
                                        <option value="">Select months</option>
                                        <option value="1">0-3 months</option>
                                        <option value="2">3-6 months</option>
                                        <option value="3">6+ months</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-row" id="employment_industry" style="display: none;">
                                <div class="form-group">
                                    <label for="employment_industry">Industry Sector *</label>
                                    <select id="employment_industry" name="employment_industry">
                                        <option value="">Select industry</option>
                                        <option value="1">Administration</option>
                                        <option value="2">Agriculture</option>
                                        <option value="3">Construction</option>
                                        <option value="4">Education</option>
                                        <option value="5">Finance</option>
                                        <option value="6">Healthcare</option>
                                        <option value="7">Hospitality</option>
                                        <option value="8">IT</option>
                                        <option value="9">Manufacturing</option>
                                        <option value="10">Media</option>
                                        <option value="11">Public Sector</option>
                                        <option value="12">Retail</option>
                                        <option value="13">Sales</option>
                                        <option value="14">Transport</option>
                                        <option value="15">Utilities</option>
                                        <option value="16">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 5: Income Details -->
                    <div class="form-step" id="step-5">
                        <div class="step-header">
                            <div class="step-number">5</div>
                            <div class="step-title">
                                <h3>Income Details</h3>
                                <p>Your financial information</p>
                            </div>
                        </div>
                        
                        <div class="form-section">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="income_frequency">How often are you paid? *</label>
                                    <select id="income_frequency" name="income_frequency" required>
                                        <option value="">Select frequency</option>
                                        <option value="1">Weekly</option>
                                        <option value="2">Fortnightly</option>
                                        <option value="3">Monthly</option>
                                        <option value="4">Quarterly</option>
                                        <option value="5">Annually</option>
                                        <option value="6">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="net_monthly_income">Net Monthly Income *</label>
                                    <input type="number" id="net_monthly_income" name="net_monthly_income" min="0" step="0.01" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="next_pay_date">Next Pay Date *</label>
                                    <input type="date" id="next_pay_date" name="next_pay_date" required>
                                </div>
                                <div class="form-group">
                                    <label for="following_pay_date">Following Pay Date *</label>
                                    <input type="date" id="following_pay_date" name="following_pay_date" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="retirement_pension">Monthly Pension Income *</label>
                                    <input type="number" id="retirement_pension" name="retirement_pension" min="0" step="0.01" value="0" required>
                                </div>
                                <div class="form-group">
                                    <label for="government_benefits">Government Benefits *</label>
                                    <input type="number" id="government_benefits" name="government_benefits" min="0" step="0.01" value="0" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="other_benefits">Other Benefits *</label>
                                    <input type="number" id="other_benefits" name="other_benefits" min="0" step="0.01" value="0" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 6: Expenses -->
                    <div class="form-step" id="step-6">
                        <div class="step-header">
                            <div class="step-number">6</div>
                            <div class="step-title">
                                <h3>Monthly Expenses</h3>
                                <p>Your monthly outgoings</p>
                            </div>
                        </div>
                        
                        <div class="form-section">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="mortgage_rent">Mortgage/Rent *</label>
                                    <input type="number" id="mortgage_rent" name="mortgage_rent" min="0" step="0.01" required>
                                </div>
                                <div class="form-group">
                                    <label for="credit">Credit Payments *</label>
                                    <input type="number" id="credit" name="credit" min="0" step="0.01" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="utility">Utilities *</label>
                                    <input type="number" id="utility" name="utility" min="0" step="0.01" required>
                                </div>
                                <div class="form-group">
                                    <label for="food">Food *</label>
                                    <input type="number" id="food" name="food" min="0" step="0.01" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="transport">Transport *</label>
                                    <input type="number" id="transport" name="transport" min="0" step="0.01" required>
                                </div>
                                <div class="form-group">
                                    <label for="other">Other Expenses *</label>
                                    <input type="number" id="other" name="other" min="0" step="0.01" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 7: Bank Details -->
                    <div class="form-step" id="step-7">
                        <div class="step-header">
                            <div class="step-number">7</div>
                            <div class="step-title">
                                <h3>Bank Details</h3>
                                <p>Your banking information</p>
                            </div>
                        </div>
                        
                        <div class="form-section">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="direct_deposit">How do you receive your salary? *</label>
                                    <select id="direct_deposit" name="direct_deposit" required>
                                        <option value="">Select method</option>
                                        <option value="1">Direct deposit</option>
                                        <option value="2">Cheque</option>
                                        <option value="3">Cash</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bank_account_type">Bank Account Type *</label>
                                    <select id="bank_account_type" name="bank_account_type" required>
                                        <option value="">Select type</option>
                                        <option value="1">Current</option>
                                        <option value="2">Savings</option>
                                        <option value="3">Basic</option>
                                        <option value="4">Student</option>
                                        <option value="5">Business</option>
                                        <option value="6">Other</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="bank_account_number">Account Number *</label>
                                    <input type="text" id="bank_account_number" name="bank_account_number" maxlength="8" required>
                                </div>
                                <div class="form-group">
                                    <label for="bank_sort_code">Sort Code *</label>
                                    <input type="text" id="bank_sort_code" name="bank_sort_code" maxlength="6" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="bank_years">Years with Bank</label>
                                    <select id="bank_years" name="bank_years">
                                        <option value="">Select years</option>
                                        <option value="1">Less than 1 year</option>
                                        <option value="2">1-2 years</option>
                                        <option value="3">2-3 years</option>
                                        <option value="4">3-5 years</option>
                                        <option value="5">5+ years</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 8: Marketing Preferences -->
                    <div class="form-step" id="step-8">
                        <div class="step-header">
                            <div class="step-number">8</div>
                            <div class="step-title">
                                <h3>Marketing Preferences</h3>
                                <p>How would you like to hear from us?</p>
                            </div>
                        </div>
                        
                        <div class="form-section">
                            <div class="form-group checkbox-group">
                                <input type="checkbox" id="marketing_sms" name="marketing_sms" value="1">
                                <label for="marketing_sms">I would like to receive SMS marketing</label>
                            </div>
                            
                            <div class="form-group checkbox-group">
                                <input type="checkbox" id="marketing_phone" name="marketing_phone" value="1">
                                <label for="marketing_phone">I would like to receive phone marketing</label>
                            </div>
                            
                            <div class="form-group checkbox-group">
                                <input type="checkbox" id="marketing_email" name="marketing_email" value="1">
                                <label for="marketing_email">I would like to receive email marketing</label>
                            </div>
                        </div>
                    </div>

                    <!-- Step 9: Terms & Conditions -->
                    <div class="form-step" id="step-9">
                        <div class="step-header">
                            <div class="step-number">9</div>
                            <div class="step-title">
                                <h3>Terms & Conditions</h3>
                                <p>Please review and accept our terms</p>
                            </div>
                        </div>
                        
                        <div class="form-section">
                            <div class="form-group checkbox-group">
                                <input type="checkbox" id="terms_conditions" name="terms_conditions" required>
                                <label for="terms_conditions">I agree to the <a href="{{ url('/terms') }}" target="_blank">Terms & Conditions</a> and <a href="{{ url('/privacy') }}" target="_blank">Privacy Policy</a> *</label>
                            </div>
                            
                            <div class="form-group checkbox-group">
                                <input type="checkbox" id="marketing_consent" name="marketing_consent">
                                <label for="marketing_consent">I would like to receive marketing communications from myLoans</label>
                            </div>
                        </div>
                    </div>

                    <!-- Form Navigation -->
                    <div class="form-navigation">
                        <button type="button" class="btn btn-secondary" id="prev-btn" style="display: none;">Previous</button>
                        <button type="button" class="btn btn-primary" id="next-btn">Next</button>
                        <button type="submit" class="btn btn-primary" id="submit-btn" style="display: none;">Submit Application</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Trust Section -->
    <section class="trust-section">
        <div class="container">
            <div class="trust-content">
                <h2>Why Choose myLoans?</h2>
                <div class="trust-features">
                    <div class="trust-feature">
                        <i class="fas fa-shield-alt"></i>
                        <h3>FCA Regulated</h3>
                        <p>Fully authorized and regulated by the Financial Conduct Authority</p>
                    </div>
                    <div class="trust-feature">
                        <i class="fas fa-lock"></i>
                        <h3>Secure & Safe</h3>
                        <p>Your data is protected with bank-level encryption</p>
                    </div>
                    <div class="trust-feature">
                        <i class="fas fa-clock"></i>
                        <h3>Quick Decisions</h3>
                        <p>Get an instant decision on your loan application</p>
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
                    <div class="footer-logo">
                        <div class="logo">
                            <div class="logo-icon">
                                <span class="pound-symbol">£</span>
                            </div>
                            <div class="logo-text">
                                <span class="logo-my">my</span><span class="logo-loans">Loans</span>
                            </div>
                        </div>
                        <p>Quick, secure, and reliable UK loans. Get your loan approved in minutes with competitive rates and flexible terms.</p>
                        <div class="social-links">
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        </div>
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

    <script src="{{ asset('script.js') }}"></script>
    <script>
        // Multi-step form functionality
        let currentStep = 1;
        const totalSteps = 9;

        function showStep(step) {
            // Hide all steps
            document.querySelectorAll('.form-step').forEach(s => s.classList.remove('active'));
            
            // Show current step
            document.getElementById(`step-${step}`).classList.add('active');
            
            // Update navigation buttons
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const submitBtn = document.getElementById('submit-btn');
            
            prevBtn.style.display = step > 1 ? 'inline-block' : 'none';
            
            if (step === totalSteps) {
                nextBtn.style.display = 'none';
                submitBtn.style.display = 'inline-block';
            } else {
                nextBtn.style.display = 'inline-block';
                submitBtn.style.display = 'none';
            }
        }

        function nextStep() {
            if (validateCurrentStep()) {
                if (currentStep < totalSteps) {
                    currentStep++;
                    showStep(currentStep);
                }
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        }

        function validateCurrentStep() {
            const currentStepElement = document.getElementById(`step-${currentStep}`);
            const requiredFields = currentStepElement.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('error');
                    isValid = false;
                } else {
                    field.classList.remove('error');
                }
            });

            return isValid;
        }

        // Employment status change handler
        document.getElementById('employment_status').addEventListener('change', function() {
            const status = this.value;
            const employmentDetails = document.getElementById('employment_details');
            const employmentDuration = document.getElementById('employment_duration');
            const employmentIndustry = document.getElementById('employment_industry');
            const employerNameGroup = document.getElementById('employer_name_group');
            
            if (status === '1' || status === '2' || status === '3') {
                employmentDetails.style.display = 'block';
                employmentDuration.style.display = 'block';
                employmentIndustry.style.display = 'block';
                employerNameGroup.style.display = 'block';
                
                // Make fields required
                document.getElementById('employer_name').required = true;
                document.getElementById('job_title').required = true;
                document.getElementById('work_phone').required = true;
                document.getElementById('employer_years').required = true;
                document.getElementById('employer_months').required = true;
                document.getElementById('employment_industry').required = true;
            } else {
                employmentDetails.style.display = 'none';
                employmentDuration.style.display = 'none';
                employmentIndustry.style.display = 'none';
                employerNameGroup.style.display = 'none';
                
                // Remove required attribute
                document.getElementById('employer_name').required = false;
                document.getElementById('job_title').required = false;
                document.getElementById('work_phone').required = false;
                document.getElementById('employer_years').required = false;
                document.getElementById('employer_months').required = false;
                document.getElementById('employment_industry').required = false;
            }
        });

        // Event listeners
        document.getElementById('next-btn').addEventListener('click', nextStep);
        document.getElementById('prev-btn').addEventListener('click', prevStep);

        // Initialize
        showStep(1);
    </script>
</body>
</html>
