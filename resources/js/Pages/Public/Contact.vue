<script setup>
// Loading Animation
window.addEventListener('load', function () {
  setTimeout(() => {
    document.getElementById('loadingOverlay').classList.add('fade-out');
  }, 1000);
});

// Animated Particles
function createParticles() {
  const container = document.getElementById('particlesContainer');
  const particleCount = 50;

  for (let i = 0; i < particleCount; i++) {
    const particle = document.createElement('div');
    particle.className = 'particle';

    // Random size between 2px and 6px
    const size = Math.random() * 4 + 2;
    particle.style.width = size + 'px';
    particle.style.height = size + 'px';

    // Random horizontal position
    particle.style.left = Math.random() * 100 + '%';

    // Random animation delay
    particle.style.animationDelay = Math.random() * 20 + 's';

    // Random animation duration
    particle.style.animationDuration = (Math.random() * 10 + 15) + 's';

    container.appendChild(particle);
  }
}

// Form Validation and Submission
document.getElementById('contactForm').addEventListener('submit', function (e) {
  e.preventDefault();

  // Get form data
  const formData = new FormData(this);
  const data = Object.fromEntries(formData);

  // Basic validation
  let isValid = true;
  const requiredFields = ['firstName', 'lastName', 'email', 'phone', 'company', 'service', 'budget', 'message'];

  requiredFields.forEach(field => {
    const input = document.getElementById(field);
    if (!input.value.trim()) {
      input.style.borderColor = '#ff4444';
      isValid = false;
    } else {
      input.style.borderColor = 'rgba(255, 215, 0, 0.2)';
    }
  });

  // Email validation
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const emailInput = document.getElementById('email');
  if (!emailRegex.test(emailInput.value)) {
    emailInput.style.borderColor = '#ff4444';
    isValid = false;
  }

  if (isValid) {
    // Simulate form submission
    const submitBtn = document.querySelector('.btn-primary-custom');
    const originalText = submitBtn.innerHTML;

    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Enviando...';
    submitBtn.disabled = true;

    setTimeout(() => {
      submitBtn.innerHTML = '<i class="fas fa-check me-2"></i>¡Mensaje Enviado!';
      submitBtn.style.background = 'linear-gradient(135deg, #00FF88, #00CC70)';

      setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        submitBtn.style.background = 'linear-gradient(135deg, var(--primary-gold), var(--primary-gold-dark))';
        this.reset();
      }, 3000);
    }, 2000);
  }
});

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }
  });
});

// Navbar scroll effect
window.addEventListener('scroll', function () {
  const navbar = document.querySelector('.navbar-custom');
  if (window.scrollY > 100) {
    navbar.style.background = 'rgba(10, 10, 10, 0.98)';
    navbar.style.backdropFilter = 'blur(25px)';
  } else {
    navbar.style.background = 'rgba(10, 10, 10, 0.95)';
    navbar.style.backdropFilter = 'blur(20px)';
  }
});

// Initialize particles
createParticles();

// Form input animations
document.querySelectorAll('.form-control-custom').forEach(input => {
  input.addEventListener('focus', function () {
    this.parentElement.style.transform = 'translateY(-2px)';
  });

  input.addEventListener('blur', function () {
    this.parentElement.style.transform = 'translateY(0)';
  });
});

// Contact cards hover effect
document.querySelectorAll('.contact-info-card').forEach(card => {
  card.addEventListener('mouseenter', function () {
    this.style.transform = 'translateY(-8px) scale(1.02)';
  });

  card.addEventListener('mouseleave', function () {
    this.style.transform = 'translateY(0) scale(1)';
  });
});
</script>

<template>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
      content="Contacta con World Recycling Coin - GEA-WRC. Únete a la revolución del reciclaje blockchain y construye un futuro sostenible.">
    <meta name="keywords" content="World Recycling Coin, WRC, blockchain, reciclaje, sostenibilidad, GEA-WRC, contacto">
    <meta name="author" content="GEA-WRC">
    <title>Contacto - World Recycling Coin | GEA-WRC</title>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
      rel="stylesheet">

    <style>
      :root {
        /* Color System - Paleta Dorada Premium */
        --primary-gold: #FFD700;
        --primary-gold-dark: #E6C200;
        --primary-gold-light: #FFF4B3;
        --secondary-dark: #0A0A0A;
        --secondary-gray: #1A1A1A;
        --accent-cyan: #00D4FF;
        --text-light: #F8F9FA;
        --text-muted: #ADB5BD;
        --success-green: #00FF88;
        --warning-amber: #FFA500;

        /* Spacing System - Precisión Milimétrica */
        --space-xs: 0.25rem;
        /* 4px */
        --space-sm: 0.5rem;
        /* 8px */
        --space-md: 0.75rem;
        /* 12px */
        --space-lg: 1rem;
        /* 16px */
        --space-xl: 1.5rem;
        /* 24px */
        --space-2xl: 2rem;
        /* 32px */
        --space-3xl: 3rem;
        /* 48px */
        --space-4xl: 4rem;
        /* 64px */
        --space-5xl: 6rem;
        /* 96px */
        --space-6xl: 8rem;
        /* 128px */

        /* Typography System */
        --font-primary: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        --font-display: 'Playfair Display', Georgia, serif;

        /* Animation System */
        --transition-fast: 0.15s cubic-bezier(0.4, 0, 0.2, 1);
        --transition-normal: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --transition-slow: 0.5s cubic-bezier(0.4, 0, 0.2, 1);

        /* Shadow System */
        --shadow-sm: 0 1px 2px 0 rgba(255, 215, 0, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(255, 215, 0, 0.1), 0 2px 4px -1px rgba(255, 215, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(255, 215, 0, 0.1), 0 4px 6px -2px rgba(255, 215, 0, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(255, 215, 0, 0.1), 0 10px 10px -5px rgba(255, 215, 0, 0.04);
        --shadow-glow: 0 0 20px rgba(255, 215, 0, 0.3);
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      html {
        scroll-behavior: smooth;
        font-size: 16px;
      }

      body {
        font-family: var(--font-primary);
        background: linear-gradient(135deg, var(--secondary-dark) 0%, var(--secondary-gray) 100%);
        color: var(--text-light);
        line-height: 1.6;
        overflow-x: hidden;
        position: relative;
      }

      /* Animated Background Particles */
      .particles-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1;
        overflow: hidden;
      }

      .particle {
        position: absolute;
        background: var(--primary-gold);
        border-radius: 50%;
        opacity: 0.1;
        animation: float 20s infinite linear;
      }

      @keyframes float {
        0% {
          transform: translateY(100vh) rotate(0deg);
          opacity: 0;
        }

        10% {
          opacity: 0.1;
        }

        90% {
          opacity: 0.1;
        }

        100% {
          transform: translateY(-100px) rotate(360deg);
          opacity: 0;
        }
      }

      /* Header Styles */
      .navbar-custom {
        background: rgba(10, 10, 10, 0.95);
        backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(255, 215, 0, 0.1);
        padding: var(--space-lg) 0;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        transition: all var(--transition-normal);
      }

      .navbar-brand {
        font-family: var(--font-display);
        font-weight: 700;
        font-size: 1.75rem;
        color: var(--primary-gold) !important;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: var(--space-md);
      }

      .logo-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-gold), var(--primary-gold-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 900;
        font-size: 1.2rem;
        color: var(--secondary-dark);
        box-shadow: var(--shadow-glow);
      }

      .nav-link {
        color: var(--text-light) !important;
        font-weight: 500;
        margin: 0 var(--space-lg);
        padding: var(--space-sm) var(--space-lg) !important;
        border-radius: 8px;
        transition: all var(--transition-fast);
        position: relative;
      }

      .nav-link:hover {
        color: var(--primary-gold) !important;
        background: rgba(255, 215, 0, 0.1);
        transform: translateY(-2px);
      }

      /* Main Content */
      main {
        position: relative;
        z-index: 2;
        padding-top: var(--space-6xl);
      }

      /* Hero Section */
      .hero-contact {
        padding: var(--space-5xl) 0;
        text-align: center;
        position: relative;
        overflow: hidden;
      }

      .hero-contact::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 50% 50%, rgba(255, 215, 0, 0.1) 0%, transparent 70%);
        pointer-events: none;
      }

      .hero-title {
        font-family: var(--font-display);
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 800;
        color: var(--primary-gold);
        margin-bottom: var(--space-xl);
        text-shadow: 0 4px 8px rgba(255, 215, 0, 0.3);
        line-height: 1.2;
      }

      .hero-subtitle {
        font-size: clamp(1.1rem, 2vw, 1.3rem);
        color: var(--text-muted);
        margin-bottom: var(--space-3xl);
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
      }

      /* Contact Form Section */
      .contact-section {
        padding: var(--space-5xl) 0;
      }

      .contact-card {
        background: linear-gradient(135deg, rgba(26, 26, 26, 0.9), rgba(10, 10, 10, 0.9));
        border: 1px solid rgba(255, 215, 0, 0.2);
        border-radius: 24px;
        padding: var(--space-3xl);
        box-shadow: var(--shadow-xl);
        backdrop-filter: blur(20px);
        position: relative;
        overflow: hidden;
      }

      .contact-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--primary-gold), transparent);
      }

      .form-group {
        margin-bottom: var(--space-xl);
      }

      .form-label {
        display: block;
        font-weight: 600;
        color: var(--primary-gold);
        margin-bottom: var(--space-sm);
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }

      .form-control-custom {
        width: 100%;
        padding: var(--space-lg) var(--space-xl);
        background: rgba(26, 26, 26, 0.8);
        border: 2px solid rgba(255, 215, 0, 0.2);
        border-radius: 12px;
        color: var(--text-light);
        font-size: 1rem;
        transition: all var(--transition-normal);
        backdrop-filter: blur(10px);
      }

      .form-control-custom:focus {
        outline: none;
        border-color: var(--primary-gold);
        box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.1);
        background: rgba(26, 26, 26, 0.9);
      }

      .form-control-custom::placeholder {
        color: var(--text-muted);
      }

      textarea.form-control-custom {
        resize: vertical;
        min-height: 120px;
      }

      .btn-primary-custom {
        background: linear-gradient(135deg, var(--primary-gold), var(--primary-gold-dark));
        border: none;
        color: var(--secondary-dark);
        font-weight: 700;
        font-size: 1.1rem;
        padding: var(--space-lg) var(--space-3xl);
        border-radius: 12px;
        cursor: pointer;
        transition: all var(--transition-normal);
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        overflow: hidden;
      }

      .btn-primary-custom:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-glow);
      }

      .btn-primary-custom:active {
        transform: translateY(-1px);
      }

      /* Contact Info Cards */
      .contact-info-card {
        background: linear-gradient(135deg, rgba(26, 26, 26, 0.8), rgba(10, 10, 10, 0.8));
        border: 1px solid rgba(255, 215, 0, 0.15);
        border-radius: 16px;
        padding: var(--space-2xl);
        text-align: center;
        transition: all var(--transition-normal);
        height: 100%;
        backdrop-filter: blur(10px);
      }

      .contact-info-card:hover {
        transform: translateY(-8px);
        border-color: rgba(255, 215, 0, 0.3);
        box-shadow: var(--shadow-lg);
      }

      .contact-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary-gold), var(--primary-gold-dark));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto var(--space-lg);
        font-size: 1.5rem;
        color: var(--secondary-dark);
        box-shadow: var(--shadow-md);
      }

      .contact-info-title {
        font-weight: 700;
        color: var(--primary-gold);
        margin-bottom: var(--space-sm);
        font-size: 1.1rem;
      }

      .contact-info-text {
        color: var(--text-muted);
        font-size: 0.95rem;
        line-height: 1.5;
      }

      /* Map Section */
      .map-section {
        padding: var(--space-5xl) 0;
        background: linear-gradient(135deg, rgba(10, 10, 10, 0.9), rgba(26, 26, 26, 0.9));
      }

      .map-container {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-xl);
        border: 2px solid rgba(255, 215, 0, 0.2);
      }

      .map-placeholder {
        height: 400px;
        background: linear-gradient(135deg, var(--secondary-gray), var(--secondary-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-muted);
        font-size: 1.2rem;
        position: relative;
      }

      .map-placeholder::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100px;
        height: 100px;
        background: radial-gradient(circle, var(--primary-gold) 0%, transparent 70%);
        border-radius: 50%;
        opacity: 0.3;
        animation: pulse 2s infinite;
      }

      @keyframes pulse {

        0%,
        100% {
          transform: translate(-50%, -50%) scale(1);
          opacity: 0.3;
        }

        50% {
          transform: translate(-50%, -50%) scale(1.2);
          opacity: 0.1;
        }
      }

      /* Footer */
      .footer-custom {
        background: var(--secondary-dark);
        border-top: 1px solid rgba(255, 215, 0, 0.1);
        padding: var(--space-3xl) 0 var(--space-xl);
        margin-top: var(--space-5xl);
      }

      .footer-brand {
        font-family: var(--font-display);
        font-weight: 700;
        font-size: 1.5rem;
        color: var(--primary-gold);
        margin-bottom: var(--space-lg);
      }

      .footer-text {
        color: var(--text-muted);
        font-size: 0.9rem;
        line-height: 1.6;
      }

      .social-links {
        display: flex;
        gap: var(--space-lg);
        margin-top: var(--space-xl);
      }

      .social-link {
        width: 45px;
        height: 45px;
        background: rgba(255, 215, 0, 0.1);
        border: 1px solid rgba(255, 215, 0, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-gold);
        text-decoration: none;
        transition: all var(--transition-normal);
      }

      .social-link:hover {
        background: var(--primary-gold);
        color: var(--secondary-dark);
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
      }

      /* Responsive Design */
      @media (max-width: 768px) {
        .hero-contact {
          padding: var(--space-4xl) 0;
        }

        .contact-card {
          padding: var(--space-2xl);
          margin: 0 var(--space-lg);
        }

        .contact-section {
          padding: var(--space-4xl) 0;
        }

        .map-section {
          padding: var(--space-4xl) 0;
        }

        .map-placeholder {
          height: 300px;
        }
      }

      @media (max-width: 576px) {
        .navbar-custom {
          padding: var(--space-md) 0;
        }

        .hero-title {
          font-size: 2.2rem;
        }

        .contact-card {
          margin: 0 var(--space-sm);
          padding: var(--space-xl);
        }

        .contact-info-card {
          margin-bottom: var(--space-xl);
        }
      }

      /* Loading Animation */
      .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--secondary-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        transition: opacity var(--transition-slow);
      }

      .loading-spinner {
        width: 60px;
        height: 60px;
        border: 3px solid rgba(255, 215, 0, 0.2);
        border-top: 3px solid var(--primary-gold);
        border-radius: 50%;
        animation: spin 1s linear infinite;
      }

      @keyframes spin {
        0% {
          transform: rotate(0deg);
        }

        100% {
          transform: rotate(360deg);
        }
      }

      .fade-out {
        opacity: 0;
        pointer-events: none;
      }
    </style>
  </head>
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
      <div class="loading-spinner"></div>
    </div>

    <!-- Animated Background Particles -->
    <div class="particles-container" id="particlesContainer"></div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <div class="logo-icon">WRC</div>
          World Recycling Coin
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          style="border: none; background: none;">
          <i class="fas fa-bars" style="color: var(--primary-gold); font-size: 1.5rem;"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="contact.html">Contacto</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <main>
      <!-- Hero Section -->
      <section class="hero-contact">
        <div class="container">
          <h1 class="hero-title">Conecta con el Futuro</h1>
          <p class="hero-subtitle">
            Únete a la revolución del reciclaje blockchain. Nuestro equipo de expertos está listo para transformar tu
            visión en realidad sostenible.
          </p>
        </div>
      </section>

      <!-- Contact Form Section -->
      <section class="contact-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="contact-card">
                <div class="text-center mb-5">
                  <h2 class="h3 text-warning mb-3">¿Listo para Revolucionar tu Negocio?</h2>
                  <p class="text-muted">Completa el formulario y nuestro equipo de especialistas se pondrá en contacto
                    contigo en menos de 24 horas.</p>
                </div>

                <form id="contactForm" novalidate>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label" for="firstName">Nombre</label>
                        <input type="text" class="form-control-custom" id="firstName" name="firstName"
                          placeholder="Tu nombre" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label" for="lastName">Apellido</label>
                        <input type="text" class="form-control-custom" id="lastName" name="lastName"
                          placeholder="Tu apellido" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label" for="email">Email Corporativo</label>
                        <input type="email" class="form-control-custom" id="email" name="email"
                          placeholder="tu@empresa.com" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label" for="phone">Teléfono</label>
                        <input type="tel" class="form-control-custom" id="phone" name="phone"
                          placeholder="+1 (555) 123-4567" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="form-label" for="company">Empresa</label>
                    <input type="text" class="form-control-custom" id="company" name="company"
                      placeholder="Nombre de tu empresa" required>
                  </div>

                  <div class="form-group">
                    <label class="form-label" for="service">Servicio de Interés</label>
                    <select class="form-control-custom" id="service" name="service" required>
                      <option value="">Selecciona un servicio</option>
                      <option value="blockchain-integration">Integración Blockchain</option>
                      <option value="wrc-tokens">Programa WRC Tokens</option>
                      <option value="recycling-platform">Plataforma de Reciclaje</option>
                      <option value="sustainability-consulting">Consultoría en Sostenibilidad</option>
                      <option value="enterprise-solution">Solución Empresarial Completa</option>
                      <option value="partnership">Alianza Estratégica</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label class="form-label" for="budget">Presupuesto Estimado</label>
                    <select class="form-control-custom" id="budget" name="budget" required>
                      <option value="">Selecciona un rango</option>
                      <option value="10k-50k">$10,000 - $50,000</option>
                      <option value="50k-100k">$50,000 - $100,000</option>
                      <option value="100k-500k">$100,000 - $500,000</option>
                      <option value="500k-1m">$500,000 - $1,000,000</option>
                      <option value="1m+">$1,000,000+</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label class="form-label" for="message">Mensaje</label>
                    <textarea class="form-control-custom" id="message" name="message"
                      placeholder="Cuéntanos sobre tu proyecto y cómo podemos ayudarte a revolucionar tu industria con blockchain..."
                      required></textarea>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn-primary-custom">
                      <i class="fas fa-rocket me-2"></i>
                      Iniciar Revolución
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Contact Info Cards -->
      <section class="py-5">
        <div class="container">
          <div class="row g-4">
            <div class="col-lg-4 col-md-6">
              <div class="contact-info-card">
                <div class="contact-icon">
                  <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3 class="contact-info-title">Oficina Principal</h3>
                <p class="contact-info-text">
                  Silicon Valley Tech Hub<br>
                  1234 Innovation Drive<br>
                  San Francisco, CA 94105
                </p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6">
              <div class="contact-info-card">
                <div class="contact-icon">
                  <i class="fas fa-phone-alt"></i>
                </div>
                <h3 class="contact-info-title">Línea Directa</h3>
                <p class="contact-info-text">
                  +1 (555) WRC-COIN<br>
                  +1 (555) 972-2646<br>
                  Disponible 24/7
                </p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6">
              <div class="contact-info-card">
                <div class="contact-icon">
                  <i class="fas fa-envelope"></i>
                </div>
                <h3 class="contact-info-title">Email Corporativo</h3>
                <p class="contact-info-text">
                  info@gea-wrc.com<br>
                  partnerships@gea-wrc.com<br>
                  support@gea-wrc.com
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Map Section -->
      <section class="map-section">
        <div class="container">
          <div class="text-center mb-5">
            <h2 class="h3 text-warning mb-3">Encuéntranos</h2>
            <p class="text-muted">Visita nuestras oficinas en el corazón de la innovación tecnológica</p>
          </div>

          <div class="map-container">
            <div class="map-placeholder">
              <div class="text-center">
                <i class="fas fa-map-marked-alt fa-3x mb-3" style="color: var(--primary-gold);"></i>
                <p>Mapa Interactivo - Silicon Valley Tech Hub</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <footer class="footer-custom">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="footer-brand">World Recycling Coin</div>
            <p class="footer-text">
              Revolucionando la industria del reciclaje con tecnología blockchain de vanguardia.
              Construyendo un futuro sostenible, un token a la vez.
            </p>
            <div class="social-links">
              <a href="#" class="social-link" aria-label="LinkedIn">
                <i class="fab fa-linkedin-in"></i>
              </a>
              <a href="#" class="social-link" aria-label="Twitter">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-link" aria-label="Telegram">
                <i class="fab fa-telegram-plane"></i>
              </a>
              <a href="#" class="social-link" aria-label="Discord">
                <i class="fab fa-discord"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-6">
                <h5 class="text-warning mb-3">Enlaces Rápidos</h5>
                <ul class="list-unstyled">
                  <li><a href="index.html" class="footer-text text-decoration-none">Inicio</a></li>
                  <li><a href="#" class="footer-text text-decoration-none">Whitepaper</a></li>
                  <li><a href="#" class="footer-text text-decoration-none">Roadmap</a></li>
                  <li><a href="#" class="footer-text text-decoration-none">Equipo</a></li>
                </ul>
              </div>
              <div class="col-md-6">
                <h5 class="text-warning mb-3">Soporte</h5>
                <ul class="list-unstyled">
                  <li><a href="#" class="footer-text text-decoration-none">Centro de Ayuda</a></li>
                  <li><a href="#" class="footer-text text-decoration-none">Documentación</a></li>
                  <li><a href="#" class="footer-text text-decoration-none">API</a></li>
                  <li><a href="contact.html" class="footer-text text-decoration-none">Contacto</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr style="border-color: rgba(255, 215, 0, 0.1); margin: var(--space-2xl) 0 var(--space-lg);">
        <div class="text-center">
          <p class="footer-text mb-0">
            © 2024 GEA-WRC. Todos los derechos reservados. |
            <a href="#" class="text-warning text-decoration-none">Política de Privacidad</a> |
            <a href="#" class="text-warning text-decoration-none">Términos de Servicio</a>
          </p>
        </div>
      </div>
    </footer>
</template>