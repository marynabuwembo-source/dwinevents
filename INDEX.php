<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DWIN Events — Elegant Event Planning & Coordination | Kampala, Uganda</title>
  <meta name="description" content="DWIN Events is Kampala's premier event planning and coordination company. Weddings, introductions, birthdays, corporate events — beautifully executed within your budget.">
  <link rel="stylesheet" href="dwin-core.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    /* ── HERO ────────────────────────────────────────────── */
    .hero {
      position: relative;
      height: 100vh;
      min-height: 600px;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .hero-slides { position: absolute; inset: 0; }

    .hero-slide {
      position: absolute;
      inset: 0;
      opacity: 0;
      transition: opacity 1.2s ease;
    }
    .hero-slide.active { opacity: 1; }

    .hero-slide img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transform: scale(1.06);
      transition: transform 8s ease;
    }
    .hero-slide.active img { transform: scale(1); }

    .hero-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(
        160deg,
        rgba(26,24,20,0.72) 0%,
        rgba(26,24,20,0.45) 50%,
        rgba(26,24,20,0.65) 100%
      );
    }

    .hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      padding: 0 24px;
      max-width: 800px;
    }

    .hero-eyebrow {
      display: inline-block;
      font-size: 10px;
      font-weight: 500;
      letter-spacing: 5px;
      text-transform: uppercase;
      color: var(--gold);
      margin-bottom: 20px;
      opacity: 0;
      animation: fadeUp 0.8s 0.3s forwards;
    }

    .hero-title {
      font-family: var(--font-display);
      font-size: clamp(52px, 8vw, 96px);
      font-weight: 300;
      line-height: 1.05;
      color: var(--white);
      margin-bottom: 24px;
      opacity: 0;
      animation: fadeUp 0.8s 0.6s forwards;
    }
    .hero-title em {
      font-style: italic;
      color: var(--gold-light);
    }

    .hero-tagline {
      font-size: 15px;
      color: rgba(255,255,255,0.78);
      margin-bottom: 40px;
      letter-spacing: 0.5px;
      opacity: 0;
      animation: fadeUp 0.8s 0.9s forwards;
    }

    .hero-buttons {
      display: flex;
      gap: 16px;
      justify-content: center;
      flex-wrap: wrap;
      opacity: 0;
      animation: fadeUp 0.8s 1.1s forwards;
    }

    .hero-indicators {
      position: absolute;
      bottom: 40px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 8px;
      z-index: 3;
    }
    .hero-dot {
      width: 28px;
      height: 2px;
      background: rgba(255,255,255,0.35);
      border: none;
      cursor: pointer;
      transition: var(--transition);
    }
    .hero-dot.active { background: var(--gold); }

    .hero-scroll {
      position: absolute;
      bottom: 36px;
      right: 48px;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
      z-index: 3;
    }
    .hero-scroll span {
      font-size: 9px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: rgba(255,255,255,0.5);
      writing-mode: vertical-rl;
    }
    .hero-scroll-line {
      width: 1px;
      height: 48px;
      background: linear-gradient(to bottom, var(--gold), transparent);
      animation: scrollLine 2s infinite;
    }

    @keyframes scrollLine {
      0% { transform: scaleY(0); transform-origin: top; }
      50% { transform: scaleY(1); transform-origin: top; }
      51% { transform: scaleY(1); transform-origin: bottom; }
      100% { transform: scaleY(0); transform-origin: bottom; }
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(24px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ── STATS BAR ───────────────────────────────────────── */
    .stats-bar {
      background: var(--charcoal);
      border-bottom: 1px solid var(--border);
    }
    .stats-inner {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 48px;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      divide-x: 1px solid var(--border);
    }
    .stat-item {
      padding: 36px 0;
      text-align: center;
      border-right: 1px solid var(--border);
    }
    .stat-item:last-child { border-right: none; }
    .stat-number {
      font-family: var(--font-display);
      font-size: 42px;
      font-weight: 300;
      color: var(--gold);
      line-height: 1;
      margin-bottom: 6px;
    }
    .stat-label {
      font-size: 10px;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      color: rgba(255,255,255,0.45);
    }

    /* ── ABOUT SNIPPET ───────────────────────────────────── */
    .about-snippet {
      padding: 120px 48px;
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 80px;
      align-items: center;
    }
    .about-image-wrap {
      position: relative;
    }
    .about-image-wrap img {
      width: 100%;
      height: 520px;
      object-fit: cover;
      display: block;
    }
    .about-image-accent {
      position: absolute;
      bottom: -24px;
      right: -24px;
      width: 180px;
      height: 180px;
      border: 1px solid var(--border);
      z-index: -1;
    }
    .about-badge {
      position: absolute;
      bottom: 32px;
      left: -32px;
      background: var(--charcoal);
      border: 1px solid var(--border);
      padding: 20px 24px;
      text-align: center;
    }
    .about-badge strong {
      display: block;
      font-family: var(--font-display);
      font-size: 36px;
      font-weight: 300;
      color: var(--gold);
    }
    .about-badge span {
      font-size: 10px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: rgba(255,255,255,0.55);
    }
    .about-text p {
      color: var(--mid);
      font-size: 15px;
      line-height: 1.85;
      margin-bottom: 18px;
    }
    .about-features {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      margin: 32px 0 36px;
    }
    .about-feature {
      display: flex;
      align-items: flex-start;
      gap: 10px;
    }
    .about-feature i { color: var(--gold); margin-top: 2px; font-size: 14px; }
    .about-feature span { font-size: 13px; color: var(--mid); }

    /* ── SERVICES GRID ───────────────────────────────────── */
    .services-section {
      background: var(--charcoal);
      padding: 100px 0;
    }
    .services-header {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 48px;
      display: flex;
      align-items: flex-end;
      justify-content: space-between;
      margin-bottom: 60px;
    }
    .services-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2px;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 48px;
    }
    .service-tile {
      position: relative;
      overflow: hidden;
      height: 360px;
      cursor: pointer;
    }
    .service-tile img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.7s ease;
    }
    .service-tile:hover img { transform: scale(1.08); }
    .service-tile-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(26,24,20,0.88) 0%, rgba(26,24,20,0.1) 60%);
      transition: var(--transition);
    }
    .service-tile:hover .service-tile-overlay { background: linear-gradient(to top, rgba(26,24,20,0.92) 0%, rgba(26,24,20,0.3) 60%); }
    .service-tile-content {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 28px 24px;
    }
    .service-tile-content h3 {
      font-family: var(--font-display);
      font-size: 22px;
      font-weight: 400;
      color: var(--white);
      margin-bottom: 6px;
    }
    .service-tile-content p {
      font-size: 12px;
      color: rgba(255,255,255,0.6);
      margin-bottom: 16px;
      transform: translateY(8px);
      opacity: 0;
      transition: var(--transition);
    }
    .service-tile:hover .service-tile-content p { transform: translateY(0); opacity: 1; }
    .service-tile-link {
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--gold);
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 6px;
      transform: translateY(8px);
      opacity: 0;
      transition: var(--transition) 0.05s;
    }
    .service-tile:hover .service-tile-link { transform: translateY(0); opacity: 1; }

    /* ── PROCESS ─────────────────────────────────────────── */
    .process-section {
      padding: 100px 48px;
      max-width: 1200px;
      margin: 0 auto;
    }
    .process-header { text-align: center; margin-bottom: 72px; }
    .process-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 0;
    }
    .process-step {
      padding: 0 32px;
      border-right: 1px solid var(--border);
      position: relative;
    }
    .process-step:first-child { padding-left: 0; }
    .process-step:last-child { border-right: none; padding-right: 0; }
    .process-num {
      font-family: var(--font-display);
      font-size: 72px;
      font-weight: 300;
      color: rgba(201,168,76,0.15);
      line-height: 1;
      margin-bottom: 16px;
    }
    .process-step h3 {
      font-family: var(--font-display);
      font-size: 20px;
      font-weight: 400;
      margin-bottom: 12px;
    }
    .process-step p {
      font-size: 13px;
      color: var(--muted);
      line-height: 1.75;
    }

    /* ── PACKAGES ────────────────────────────────────────── */
    .packages-section {
      background: var(--ivory);
      padding: 100px 48px;
    }
    .packages-header { text-align: center; margin-bottom: 64px; }
    .packages-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 24px;
      max-width: 1200px;
      margin: 0 auto;
    }
    .pkg-card {
      border: 1px solid var(--border);
      padding: 40px 28px;
      transition: var(--transition);
      position: relative;
    }
    .pkg-card:hover { border-color: var(--gold); box-shadow: var(--shadow-gold); transform: translateY(-4px); }
    .pkg-card.featured {
      background: var(--charcoal);
      border-color: var(--gold);
    }
    .pkg-badge {
      position: absolute;
      top: -1px;
      left: 50%;
      transform: translateX(-50%);
      background: var(--gold);
      color: var(--charcoal);
      font-size: 9px;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      padding: 4px 14px;
    }
    .pkg-name {
      font-family: var(--font-display);
      font-size: 24px;
      font-weight: 400;
      margin-bottom: 4px;
    }
    .pkg-card.featured .pkg-name { color: var(--white); }
    .pkg-tag {
      font-size: 10px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--gold);
      margin-bottom: 24px;
    }
    .pkg-price {
      font-family: var(--font-display);
      font-size: 20px;
      font-weight: 300;
      color: var(--charcoal);
      margin-bottom: 24px;
      padding-bottom: 24px;
      border-bottom: 1px solid var(--border);
    }
    .pkg-card.featured .pkg-price { color: var(--white); }
    .pkg-price strong { color: var(--gold); font-size: 26px; font-weight: 600; }
    .pkg-features { list-style: none; margin-bottom: 32px; }
    .pkg-features li {
      font-size: 13px;
      padding: 8px 0;
      border-bottom: 1px solid rgba(0,0,0,0.05);
      color: var(--mid);
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .pkg-card.featured .pkg-features li {
      color: rgba(255,255,255,0.7);
      border-color: rgba(255,255,255,0.06);
    }
    .pkg-features li::before { content: '✦'; font-size: 8px; color: var(--gold); }

    /* ── TESTIMONIALS ────────────────────────────────────── */
    .testimonials-section {
      background: var(--charcoal-2);
      padding: 100px 48px;
      overflow: hidden;
    }
    .testimonials-header { text-align: center; margin-bottom: 64px; }
    .testimonial-track {
      display: flex;
      gap: 32px;
      max-width: 900px;
      margin: 0 auto;
      position: relative;
    }
    .testimonial-card {
      flex: 0 0 100%;
      display: none;
      text-align: center;
    }
    .testimonial-card.active { display: block; }
    .testimonial-quote {
      font-family: var(--font-display);
      font-size: 22px;
      font-weight: 300;
      font-style: italic;
      color: rgba(255,255,255,0.85);
      line-height: 1.7;
      margin-bottom: 32px;
    }
    .testimonial-quote::before { content: '\201C'; color: var(--gold); font-size: 64px; line-height: 0; vertical-align: -24px; margin-right: 4px; }
    .testimonial-author strong {
      display: block;
      font-family: var(--font-display);
      font-size: 17px;
      color: var(--white);
      margin-bottom: 4px;
    }
    .testimonial-author span {
      font-size: 10px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--gold);
    }
    .testimonial-stars { color: var(--gold); font-size: 13px; margin-bottom: 20px; }
    .testimonial-nav {
      display: flex;
      justify-content: center;
      gap: 8px;
      margin-top: 40px;
    }
    .t-dot {
      width: 24px;
      height: 2px;
      background: rgba(255,255,255,0.2);
      border: none;
      cursor: pointer;
      transition: var(--transition);
    }
    .t-dot.active { background: var(--gold); }

    /* ── CTA BANNER ──────────────────────────────────────── */
    .cta-banner {
      position: relative;
      padding: 100px 48px;
      background: url('classy img/wed.jpg') center/cover no-repeat;
      text-align: center;
      overflow: hidden;
    }
    .cta-banner::before {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(26,24,20,0.78);
    }
    .cta-inner { position: relative; z-index: 1; max-width: 700px; margin: 0 auto; }
    .cta-inner h2 {
      font-family: var(--font-display);
      font-size: clamp(36px, 5vw, 58px);
      font-weight: 300;
      color: var(--white);
      margin-bottom: 16px;
    }
    .cta-inner p { color: rgba(255,255,255,0.7); font-size: 16px; margin-bottom: 36px; }
    .cta-buttons { display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; }

    /* ── RESPONSIVE ──────────────────────────────────────── */
    @media (max-width: 1024px) {
      .packages-grid { grid-template-columns: repeat(2, 1fr); }
      .process-grid { grid-template-columns: repeat(2, 1fr); gap: 48px; }
      .process-step { border-right: none; border-bottom: 1px solid var(--border); padding: 0 0 36px; }
      .process-step:last-child { border-bottom: none; }
    }
    @media (max-width: 900px) {
      .stats-inner { grid-template-columns: repeat(2, 1fr); }
      .about-snippet { grid-template-columns: 1fr; gap: 48px; padding: 80px 24px; }
      .about-badge { left: 16px; }
      .services-grid { grid-template-columns: 1fr 1fr; padding: 0 24px; }
      .services-header { flex-direction: column; align-items: flex-start; gap: 20px; padding: 0 24px; }
      .process-section { padding: 80px 24px; }
      .packages-section { padding: 80px 24px; }
      .testimonials-section { padding: 80px 24px; }
      .cta-banner { padding: 80px 24px; }
    }
    @media (max-width: 600px) {
      .stats-inner { grid-template-columns: 1fr; }
      .stat-item { border-right: none; border-bottom: 1px solid var(--border); }
      .services-grid { grid-template-columns: 1fr; }
      .packages-grid { grid-template-columns: 1fr; }
      .about-features { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<!-- ── NAVIGATION ───────────────────────────────────────────── -->
<nav class="dwin-nav" id="mainNav">
  <a href="INDEX.php" class="nav-brand">DWIN EVENTS</a>

  <button class="nav-hamburger" id="hamburger" aria-label="Menu">
    <span></span><span></span><span></span>
  </button>

  <div class="nav-menu" id="navMenu">
    <ul class="nav-links">
      <li><a href="INDEX.php" class="active">Home</a></li>
      <li><a href="About.php">About</a></li>
      <li class="nav-dropdown" id="servicesDropdown">
        <a href="Services.php">Services</a>
        <ul class="nav-dropdown-menu">
          <li><a href="Services.php#weddings">Weddings</a></li>
          <li><a href="Services.php#introductions">Introductions / Kwanjula</a></li>
          <li><a href="Services.php#birthdays">Birthdays</a></li>
          <li><a href="Services.php#corporate">Corporate Events</a></li>
          <li><a href="Services.php#proposals">Proposals</a></li>
        </ul>
      </li>
      <li><a href="portfolio.php">Portfolio</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="FAQ.php">FAQs</a></li>
      <li><a href="dashboard.php" class="nav-account-icon" title="Dashboard" aria-label="Dashboard"><i class="bi bi-person-circle"></i></a></li>
    </ul>
    <a href="contact.php" class="nav-cta nav-links">Book Now</a>
  </div>
</nav>

<!-- ── HERO ─────────────────────────────────────────────────── -->
<section class="hero">
  <div class="hero-slides">
    <div class="hero-slide active">
      <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.22.57 PM.jpg" alt="Elegant Wedding by DWIN Events">
    </div>
    <div class="hero-slide">
      <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.22.46 PM.jpg" alt="Beautiful Ceremony">
    </div>
    <div class="hero-slide">
      <img src="MORE PICS/KAR_4638.JPG" alt="DWIN Events Coordination">
    </div>
  </div>
  <div class="hero-overlay"></div>

  <div class="hero-content">
    <span class="hero-eyebrow">Kampala's Premier Event Planners</span>
    <h1 class="hero-title">Your <em>perfect</em><br>event starts here</h1>
    <p class="hero-tagline">Professional event planning &amp; coordination — stress-free, elegant, and within your budget.</p>
    <div class="hero-buttons">
      <a href="contact.html" class="btn-gold">Book a Consultation</a>
      <a href="portfolio.html" class="btn-outline-white">View Our Work</a>
    </div>
  </div>

  <div class="hero-indicators" id="heroIndicators">
    <button class="hero-dot active"></button>
    <button class="hero-dot"></button>
    <button class="hero-dot"></button>
  </div>

  <div class="hero-scroll">
    <div class="hero-scroll-line"></div>
    <span>Scroll</span>
  </div>
</section>

<!-- ── STATS ─────────────────────────────────────────────────── -->
<div class="stats-bar">
  <div class="stats-inner">
    <div class="stat-item">
      <div class="stat-number">150+</div>
      <div class="stat-label">Events Executed</div>
    </div>
    <div class="stat-item">
      <div class="stat-number">5+</div>
      <div class="stat-label">Years Experience</div>
    </div>
    <div class="stat-item">
      <div class="stat-number">98%</div>
      <div class="stat-label">Client Satisfaction</div>
    </div>
    <div class="stat-item">
      <div class="stat-number">50+</div>
      <div class="stat-label">Trusted Vendors</div>
    </div>
  </div>
</div>

<!-- ── ABOUT SNIPPET ─────────────────────────────────────────── -->
<section style="padding-top: 24px;">
  <div class="about-snippet">
    <div class="about-image-wrap">
      <img src="MORE PICS/KAR_4631.JPG" alt="DWIN Events team at work">
      <div class="about-image-accent"></div>
      <div class="about-badge">
        <strong>5+</strong>
        <span>Years of Excellence</span>
      </div>
    </div>
    <div class="about-text">
      <span class="section-eyebrow">About DWIN Events</span>
      <h2 class="section-heading">Turning moments into <em style="font-style:italic;color:var(--gold)">memories</em></h2>
      <span class="gold-rule"></span>
      <p>
        DWIN Events is a professional event planning and coordination company committed to
        creating unforgettable experiences with elegance and precision. We work closely with
        our clients to understand their vision and plan thoughtfully within their budget.
      </p>
      <p>
        From concept development to full event-day coordination, we handle every detail so
        you can relax and enjoy your special occasion, completely stress-free.
      </p>
      <div class="about-features">
        <div class="about-feature">
          <i class="bi bi-check-circle-fill"></i>
          <span>Personalized planning approach</span>
        </div>
        <div class="about-feature">
          <i class="bi bi-check-circle-fill"></i>
          <span>Budget-conscious execution</span>
        </div>
        <div class="about-feature">
          <i class="bi bi-check-circle-fill"></i>
          <span>Trusted vendor network</span>
        </div>
        <div class="about-feature">
          <i class="bi bi-check-circle-fill"></i>
          <span>Full day-of coordination</span>
        </div>
      </div>
      <div style="display:flex;gap:16px;flex-wrap:wrap;">
        <a href="About.html" class="btn-gold">Learn More</a>
        <a href="contact.html" class="btn-outline-gold">Book Consultation</a>
      </div>
    </div>
  </div>
</section>

<!-- ── SERVICES ──────────────────────────────────────────────── -->
<section class="services-section">
  <div class="services-header">
    <div>
      <span class="section-eyebrow">What We Do</span>
      <h2 class="section-heading light">Our Services</h2>
    </div>
    <a href="Services.html" class="btn-outline-gold">View All Services</a>
  </div>
  <div class="services-grid">
    <div class="service-tile">
      <img src="MORE PICS/WhatsApp Image 2026-02-01 at 4.31.54 PM.jpeg" alt="Wedding Planning">
      <div class="service-tile-overlay"></div>
      <div class="service-tile-content">
        <h3>Wedding Ceremonies</h3>
        <p>Elegant, seamless weddings planned with love and meticulous attention to every detail.</p>
        <a href="Services.html" class="service-tile-link">Explore <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
    <div class="service-tile">
      <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.23.11 PM.jpeg" alt="Traditional Introductions">
      <div class="service-tile-overlay"></div>
      <div class="service-tile-content">
        <h3>Introductions / Kwanjula</h3>
        <p>Beautifully coordinated traditional ceremonies that honor culture and create lasting impressions.</p>
        <a href="Services.html" class="service-tile-link">Explore <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
    <div class="service-tile">
      <img src="MORE PICS/KAR_4645.JPG" alt="Birthday Celebrations">
      <div class="service-tile-overlay"></div>
      <div class="service-tile-content">
        <h3>Birthday Celebrations</h3>
        <p>From intimate gatherings to grand parties, we turn birthdays into unforgettable milestones.</p>
        <a href="Services.html" class="service-tile-link">Explore <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
    <div class="service-tile">
      <img src="classy img/edwin-petrus-XpmdZfDE3pI-unsplash.jpg" alt="Corporate Events">
      <div class="service-tile-overlay"></div>
      <div class="service-tile-content">
        <h3>Corporate Events</h3>
        <p>Professional planning for conferences, product launches, galas, and corporate celebrations.</p>
        <a href="Services.html" class="service-tile-link">Explore <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
    <div class="service-tile">
      <img src="MORE PICS/KAR_4637.JPG" alt="Proposals">
      <div class="service-tile-overlay"></div>
      <div class="service-tile-content">
        <h3>Proposals &amp; Romantic Setups</h3>
        <p>Creative, intimate proposals designed to create unforgettable "YES" moments.</p>
        <a href="Services.html" class="service-tile-link">Explore <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
    <div class="service-tile">
      <img src="MORE PICS/KAR_4641.JPG" alt="Baby Showers">
      <div class="service-tile-overlay"></div>
      <div class="service-tile-content">
        <h3>Baby Showers &amp; Gender Reveals</h3>
        <p>Warmly styled celebrations filled with elegance, fun, and beautiful memories.</p>
        <a href="Services.html" class="service-tile-link">Explore <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- ── PROCESS ───────────────────────────────────────────────── -->
<section class="process-section">
  <div class="process-header">
    <span class="section-eyebrow">How We Work</span>
    <h2 class="section-heading">The DWIN Experience</h2>
    <span class="gold-rule" style="margin: 20px auto;"></span>
    <p style="color:var(--muted);max-width:520px;margin:0 auto;">From your first consultation to the final toast, we handle every detail with care and precision.</p>
  </div>
  <div class="process-grid">
    <div class="process-step">
      <div class="process-num">01</div>
      <h3>Consultation</h3>
      <p>We begin with a discovery session to understand your vision, preferences, and budget — no commitment required.</p>
    </div>
    <div class="process-step">
      <div class="process-num">02</div>
      <h3>Planning &amp; Design</h3>
      <p>We craft a detailed event plan, source trusted vendors, and design a program tailored to your style.</p>
    </div>
    <div class="process-step">
      <div class="process-num">03</div>
      <h3>Coordination</h3>
      <p>We manage all vendor communication, timeline management, and logistics in the lead-up to your event.</p>
    </div>
    <div class="process-step">
      <div class="process-num">04</div>
      <h3>Event Day</h3>
      <p>Our team is on-site from setup to close, ensuring every moment runs smoothly so you can enjoy every second.</p>
    </div>
  </div>
</section>

<!-- ── PACKAGES ──────────────────────────────────────────────── -->
<section class="packages-section">
  <div class="packages-header">
    <span class="section-eyebrow">Pricing</span>
    <h2 class="section-heading">Event Packages</h2>
    <span class="gold-rule" style="margin: 20px auto;"></span>
    <p style="color:var(--muted);max-width:480px;margin:0 auto;">Flexible packages designed to fit your vision and budget. All packages are fully customizable.</p>
  </div>
  <div class="packages-grid">
    <!-- Silver -->
    <div class="pkg-card">
      <div class="pkg-name">Silver</div>
      <div class="pkg-tag">Coordination Only</div>
      <div class="pkg-price">From <strong>UGX 600,000</strong></div>
      <ul class="pkg-features">
        <li>Event timeline management</li>
        <li>Vendor coordination</li>
        <li>On-day supervision</li>
        <li>Run-of-show management</li>
      </ul>
      <a href="contact.html" class="btn-outline-gold" style="width:100%;text-align:center;display:block;">Book Package</a>
    </div>
    <!-- Gold -->
    <div class="pkg-card featured">
      <div class="pkg-badge">Most Popular</div>
      <div class="pkg-name">Gold</div>
      <div class="pkg-tag">Partial Planning</div>
      <div class="pkg-price">From <strong>UGX 1,200,000</strong></div>
      <ul class="pkg-features">
        <li>Everything in Silver</li>
        <li>Vendor sourcing</li>
        <li>Program design</li>
        <li>Guest coordination</li>
        <li>Budget tracking</li>
      </ul>
      <a href="contact.html" class="btn-gold" style="width:100%;text-align:center;display:block;">Book Package</a>
    </div>
    <!-- Platinum -->
    <div class="pkg-card">
      <div class="pkg-name">Platinum</div>
      <div class="pkg-tag">Full Planning</div>
      <div class="pkg-price">From <strong>UGX 2,500,000</strong></div>
      <ul class="pkg-features">
        <li>Everything in Gold</li>
        <li>Full event planning</li>
        <li>Premium vendor sourcing</li>
        <li>Full on-day execution</li>
        <li>Post-event wrap-up</li>
      </ul>
      <a href="contact.html" class="btn-outline-gold" style="width:100%;text-align:center;display:block;">Book Package</a>
    </div>
    <!-- Luxury -->
    <div class="pkg-card">
      <div class="pkg-name">Luxury ⭐</div>
      <div class="pkg-tag">White-Glove Experience</div>
      <div class="pkg-price"><strong>Custom Pricing</strong></div>
      <ul class="pkg-features">
        <li>Everything in Platinum</li>
        <li>Personalized styling concept</li>
        <li>VIP guest handling</li>
        <li>On-site coordination team</li>
        <li>Extended event coverage</li>
      </ul>
      <a href="contact.html" class="btn-outline-gold" style="width:100%;text-align:center;display:block;">Get a Quote</a>
    </div>
  </div>
  <p style="text-align:center;margin-top:32px;font-size:13px;color:var(--muted);">
    All packages are customizable. <a href="contact.html" style="color:var(--gold);">Contact us</a> to discuss your specific needs.
  </p>
</section>

<!-- ── TESTIMONIALS ──────────────────────────────────────────── -->
<section class="testimonials-section">
  <div class="testimonials-header">
    <span class="section-eyebrow">Client Stories</span>
    <h2 class="section-heading light">What Our Clients Say</h2>
  </div>
  <div class="testimonial-track">
    <div class="testimonial-card active">
      <div class="testimonial-stars">★★★★★</div>
      <p class="testimonial-quote">Dwin Events made our wedding absolutely stress-free and beautiful. Every detail was handled with elegance and professionalism. We couldn't have asked for more.</p>
      <div class="testimonial-author">
        <strong>Kefa &amp; Mulungi</strong>
        <span>Wedding Ceremony, Kampala</span>
      </div>
    </div>
    <div class="testimonial-card">
      <div class="testimonial-stars">★★★★★</div>
      <p class="testimonial-quote">From planning to execution, Dwin Events exceeded every expectation. The décor, coordination, and timing were absolutely perfect. My birthday was a dream.</p>
      <div class="testimonial-author">
        <strong>Mary N.</strong>
        <span>Birthday Celebration</span>
      </div>
    </div>
    <div class="testimonial-card">
      <div class="testimonial-stars">★★★★★</div>
      <p class="testimonial-quote">Professional, creative, and reliable. Both our introduction and wedding were flawlessly organized. Every guest complimented the seamless coordination. Highly recommended!</p>
      <div class="testimonial-author">
        <strong>Godwin &amp; Rose</strong>
        <span>Introduction &amp; Wedding</span>
      </div>
    </div>
  </div>
  <div class="testimonial-nav" id="tNav">
    <button class="t-dot active"></button>
    <button class="t-dot"></button>
    <button class="t-dot"></button>
  </div>
</section>

<!-- ── CTA BANNER ────────────────────────────────────────────── -->
<section class="cta-banner">
  <div class="cta-inner">
    <span class="section-eyebrow">Start Planning Today</span>
    <h2>Ready to create something <em style="font-style:italic;color:var(--gold-light)">unforgettable?</em></h2>
    <p>Book a free consultation and let us turn your vision into a beautifully executed reality.</p>
    <div class="cta-buttons">
      <a href="contact.html" class="btn-gold">Book Free Consultation</a>
      <a href="https://wa.me/256766436695" target="_blank" class="btn-outline-white">
        <i class="bi bi-whatsapp"></i> Chat on WhatsApp
      </a>
    </div>
  </div>
</section>

<!-- ── FOOTER ────────────────────────────────────────────────── -->
<footer class="dwin-footer">
  <div class="footer-grid">
    <div class="footer-brand footer-col">
      <h2>Dwin Events</h2>
      <p>Your stress-free event starts here. We turn meaningful moments into lasting memories — elegantly and within budget.</p>
      <a href="contact.html" class="btn-gold" style="font-size:10px;padding:11px 24px;">Book Your Event</a>
    </div>
    <div class="footer-col">
      <h4>Explore</h4>
      <ul>
        <li><a href="INDEX.HTML">Home</a></li>
        <li><a href="About.html">About Us</a></li>
        <li><a href="Services.html">Our Services</a></li>
        <li><a href="portfolio.html">Gallery</a></li>
        <li><a href="FAQ.HTML">FAQs</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>What We Do</h4>
      <ul>
        <li><a href="Services.html">Wedding Planning</a></li>
        <li><a href="Services.html">Introductions</a></li>
        <li><a href="Services.html">Birthdays &amp; Anniversaries</a></li>
        <li><a href="Services.html">Corporate Events</a></li>
        <li><a href="Services.html">Proposals &amp; Mini Events</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Contact Us</h4>
      <div class="footer-contact-item"><i class="bi bi-geo-alt" style="color:var(--gold)"></i> Kampala, Uganda</div>
      <div class="footer-contact-item"><i class="bi bi-telephone" style="color:var(--gold)"></i> +256 751 282 196</div>
      <div class="footer-contact-item"><i class="bi bi-envelope" style="color:var(--gold)"></i> info@dwinevents.com</div>
      <form class="footer-newsletter" onsubmit="return false;">
        <input type="email" placeholder="Your email address">
        <button type="submit">Subscribe</button>
      </form>
      <div class="footer-socials">
        <a href="https://instagram.com" target="_blank" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://twitter.com" target="_blank" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="https://wa.me/256751282196" target="_blank" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
        <a href="https://facebook.com/dwineventsuganda" target="_blank" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <p>© 2026 DWIN Events. All rights reserved. Kampala, Uganda.</p>
    <p>Keeping it simple, within budget.</p>
  </div>
</footer>

<script>
// ── NAVBAR SCROLL ─────────────────────────────────────────────
const nav = document.getElementById('mainNav');
window.addEventListener('scroll', () => {
  nav.classList.toggle('scrolled', window.scrollY > 40);
});

// ── HAMBURGER ─────────────────────────────────────────────────
document.getElementById('hamburger').addEventListener('click', () => {
  document.getElementById('navMenu').classList.toggle('open');
});

// ── HERO SLIDER ───────────────────────────────────────────────
const slides = document.querySelectorAll('.hero-slide');
const dots = document.querySelectorAll('.hero-dot');
let current = 0;

function goToSlide(n) {
  slides[current].classList.remove('active');
  dots[current].classList.remove('active');
  current = (n + slides.length) % slides.length;
  slides[current].classList.add('active');
  dots[current].classList.add('active');
}

dots.forEach((d, i) => d.addEventListener('click', () => goToSlide(i)));
setInterval(() => goToSlide(current + 1), 5000);

// ── TESTIMONIALS ──────────────────────────────────────────────
const cards = document.querySelectorAll('.testimonial-card');
const tDots = document.querySelectorAll('.t-dot');
let tCurrent = 0;

function goToTestimonial(n) {
  cards[tCurrent].classList.remove('active');
  tDots[tCurrent].classList.remove('active');
  tCurrent = (n + cards.length) % cards.length;
  cards[tCurrent].classList.add('active');
  tDots[tCurrent].classList.add('active');
}

tDots.forEach((d, i) => d.addEventListener('click', () => goToTestimonial(i)));
setInterval(() => goToTestimonial(tCurrent + 1), 6000);
</script>
</body>
</html>
