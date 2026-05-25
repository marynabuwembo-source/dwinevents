<?php $activePage = 'portfolio'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio — DWIN Events | Event Gallery, Kampala Uganda</title>
  <meta name="description" content="Browse DWIN Events' portfolio of weddings, introductions, birthdays and corporate events in Kampala, Uganda. Real events, real memories.">
  <link rel="stylesheet" href="dwin-core.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    /* ── PAGE HERO ───────────────────────────────────────── */
    .page-hero {
      position: relative;
      height: 58vh;
      min-height: 420px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      margin-top: 72px;
      overflow: hidden;
    }
    .page-hero img {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      transform: scale(1.04);
      transition: transform 8s ease;
    }
    .page-hero.loaded img { transform: scale(1); }
    .page-hero::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(160deg, rgba(26,24,20,0.75) 0%, rgba(26,24,20,0.45) 60%, rgba(26,24,20,0.70) 100%);
    }
    .page-hero-content {
      position: relative;
      z-index: 1;
      padding: 0 24px;
    }
    .page-hero-content h1 {
      font-family: var(--font-display);
      font-size: clamp(48px, 7vw, 82px);
      font-weight: 300;
      color: var(--white);
      line-height: 1.08;
      opacity: 0;
      animation: fadeUp 0.9s 0.3s forwards;
    }
    .page-hero-content h1 em {
      font-style: italic;
      color: var(--gold-light);
    }
    .page-hero-content p {
      font-size: 14px;
      letter-spacing: 1.5px;
      color: rgba(255,255,255,0.72);
      margin-top: 12px;
      opacity: 0;
      animation: fadeUp 0.9s 0.6s forwards;
    }
    .breadcrumb {
      display: flex;
      align-items: center;
      gap: 8px;
      justify-content: center;
      margin-top: 18px;
      font-size: 11px;
      letter-spacing: 2px;
      text-transform: uppercase;
      opacity: 0;
      animation: fadeUp 0.9s 0.8s forwards;
    }
    .breadcrumb a { color: rgba(255,255,255,0.55); text-decoration: none; transition: var(--transition); }
    .breadcrumb a:hover { color: var(--gold); }
    .breadcrumb span { color: var(--gold); }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(22px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ── INTRO STRIP ─────────────────────────────────────── */
    .portfolio-intro {
      background: var(--charcoal);
      border-bottom: 1px solid var(--border);
    }
    .portfolio-intro-inner {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 48px;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
    }
    .intro-stat {
      padding: 36px 0;
      text-align: center;
      border-right: 1px solid var(--border);
    }
    .intro-stat:last-child { border-right: none; }
    .intro-stat strong {
      display: block;
      font-family: var(--font-display);
      font-size: 44px;
      font-weight: 300;
      color: var(--gold);
      line-height: 1;
      margin-bottom: 6px;
    }
    .intro-stat span {
      font-size: 10px;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      color: rgba(255,255,255,0.45);
    }

    /* ── SECTION LEAD ────────────────────────────────────── */
    .portfolio-lead {
      max-width: 700px;
      margin: 0 auto;
      padding: 80px 24px 20px;
      text-align: center;
    }
    .portfolio-lead p {
      color: var(--mid);
      font-size: 16px;
      line-height: 1.85;
      margin-top: 16px;
    }

    /* ── FILTER TABS ─────────────────────────────────────── */
    .portfolio-filters {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0;
      flex-wrap: wrap;
      padding: 0 24px 52px;
    }
    .filter-btn {
      background: none;
      border: 1px solid var(--border);
      border-right: none;
      color: var(--muted);
      font-family: var(--font-body);
      font-size: 10px;
      font-weight: 500;
      letter-spacing: 2px;
      text-transform: uppercase;
      padding: 10px 24px;
      cursor: pointer;
      transition: var(--transition);
    }
    .filter-btn:first-child { border-radius: 2px 0 0 2px; }
    .filter-btn:last-child  { border-right: 1px solid var(--border); border-radius: 0 2px 2px 0; }
    .filter-btn:hover       { color: var(--gold); border-color: var(--gold); }
    .filter-btn.active      { background: var(--gold); color: var(--charcoal); border-color: var(--gold); }
    .filter-btn.active + .filter-btn { border-left-color: var(--gold); }

    /* ── MASONRY GRID ────────────────────────────────────── */
    .portfolio-grid {
      columns: 3;
      column-gap: 3px;
      padding: 0 48px;
      max-width: 1400px;
      margin: 0 auto;
    }
    .portfolio-item {
      break-inside: avoid;
      position: relative;
      overflow: hidden;
      margin-bottom: 3px;
      cursor: pointer;
    }
    /* Vary heights for masonry feel */
    .portfolio-item:nth-child(3n+1) { padding-top: 66%; }
    .portfolio-item:nth-child(3n+2) { padding-top: 80%; }
    .portfolio-item:nth-child(3n+3) { padding-top: 56%; }

    .portfolio-item img {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.65s cubic-bezier(0.4,0,0.2,1);
      display: block;
    }
    .portfolio-item:hover img { transform: scale(1.07); }

    .portfolio-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(26,24,20,0.90) 0%, rgba(26,24,20,0) 55%);
      opacity: 0;
      transition: opacity 0.4s ease;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 28px 24px;
    }
    .portfolio-item:hover .portfolio-overlay { opacity: 1; }

    .portfolio-overlay h4 {
      font-family: var(--font-display);
      font-size: 20px;
      font-weight: 400;
      color: var(--white);
      margin: 0 0 4px;
      transform: translateY(6px);
      transition: transform 0.4s ease;
    }
    .portfolio-item:hover .portfolio-overlay h4 { transform: translateY(0); }

    .portfolio-overlay p {
      font-size: 11px;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: var(--gold);
      margin: 0;
      transform: translateY(6px);
      transition: transform 0.45s ease;
    }
    .portfolio-item:hover .portfolio-overlay p { transform: translateY(0); }

    .portfolio-overlay .zoom-icon {
      position: absolute;
      top: 20px;
      right: 20px;
      width: 36px;
      height: 36px;
      border: 1px solid rgba(255,255,255,0.5);
      border-radius: 2px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--white);
      font-size: 15px;
      opacity: 0;
      transition: opacity 0.4s ease, border-color 0.3s;
    }
    .portfolio-item:hover .zoom-icon { opacity: 1; }
    .zoom-icon:hover { border-color: var(--gold); color: var(--gold); }

    /* hidden items */
    .portfolio-item.hidden {
      display: none;
    }

    /* ── LIGHTBOX ────────────────────────────────────────── */
    .lightbox {
      position: fixed;
      inset: 0;
      background: rgba(26,24,20,0.97);
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.35s ease;
    }
    .lightbox.open { opacity: 1; pointer-events: all; }

    .lightbox-img-wrap {
      position: relative;
      max-width: 90vw;
      max-height: 88vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .lightbox img {
      max-width: 90vw;
      max-height: 82vh;
      object-fit: contain;
      display: block;
      border: 1px solid var(--border);
    }
    .lightbox-caption {
      position: absolute;
      bottom: -44px;
      left: 0;
      right: 0;
      text-align: center;
    }
    .lightbox-caption h4 {
      font-family: var(--font-display);
      font-size: 18px;
      font-weight: 300;
      color: var(--white);
    }
    .lightbox-caption p {
      font-size: 10px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--gold);
      margin-top: 4px;
    }
    .lb-close {
      position: fixed;
      top: 28px;
      right: 36px;
      background: none;
      border: 1px solid var(--border);
      color: var(--white);
      font-size: 20px;
      width: 44px;
      height: 44px;
      border-radius: 2px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transition);
    }
    .lb-close:hover { border-color: var(--gold); color: var(--gold); }

    .lb-prev, .lb-next {
      position: fixed;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: 1px solid var(--border);
      color: var(--white);
      font-size: 20px;
      width: 50px;
      height: 50px;
      border-radius: 2px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transition);
    }
    .lb-prev { left: 24px; }
    .lb-next { right: 24px; }
    .lb-prev:hover, .lb-next:hover { border-color: var(--gold); color: var(--gold); }

    /* ── CTA BANNER ──────────────────────────────────────── */
    .portfolio-cta {
      background: var(--charcoal);
      border-top: 1px solid var(--border);
      margin-top: 80px;
    }
    .portfolio-cta-inner {
      max-width: 900px;
      margin: 0 auto;
      padding: 100px 48px;
      text-align: center;
    }
    .portfolio-cta-inner h2 {
      font-family: var(--font-display);
      font-size: clamp(36px, 5vw, 58px);
      font-weight: 300;
      color: var(--white);
      line-height: 1.15;
      margin-bottom: 16px;
    }
    .portfolio-cta-inner h2 em {
      font-style: italic;
      color: var(--gold-light);
    }
    .portfolio-cta-inner p {
      color: rgba(255,255,255,0.55);
      font-size: 15px;
      margin-bottom: 40px;
    }
    .cta-btns {
      display: flex;
      gap: 16px;
      justify-content: center;
      flex-wrap: wrap;
    }

    /* ── RESPONSIVE ──────────────────────────────────────── */
    @media (max-width: 900px) {
      .portfolio-grid { columns: 2; padding: 0 24px; }
      .portfolio-intro-inner { grid-template-columns: 1fr 1fr; }
      .intro-stat:nth-child(2) { border-right: none; }
      .intro-stat:last-child { border-top: 1px solid var(--border); grid-column: 1 / -1; }
    }
    @media (max-width: 580px) {
      .portfolio-grid { columns: 1; padding: 0 16px; }
      .portfolio-item:nth-child(n) { padding-top: 70%; }
      .portfolio-intro-inner { grid-template-columns: 1fr; }
      .intro-stat { border-right: none; border-bottom: 1px solid var(--border); }
      .intro-stat:last-child { border-bottom: none; grid-column: auto; }
      .filter-btn { padding: 10px 16px; }
      .portfolio-cta-inner { padding: 72px 24px; }
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

<!-- ── PAGE HERO ─────────────────────────────────────────────── -->
<section class="page-hero" id="pageHero">
  <img src="MORE PICS/KAR_4658.jpg"
       alt="DWIN Events Portfolio"
       onload="document.getElementById('pageHero').classList.add('loaded')">
  <div class="page-hero-content">
    <h1>Our <em>Portfolio</em></h1>
    <p>Real events. Real memories. Beautifully executed.</p>
    <nav class="breadcrumb" aria-label="breadcrumb">
      <a href="INDEX.php">Home</a>
      <i class="bi bi-chevron-right" style="font-size:9px;color:var(--gold)"></i>
      <span>Portfolio</span>
    </nav>
  </div>
</section>

<!-- ── STATS STRIP ────────────────────────────────────────────── -->
<div class="portfolio-intro">
  <div class="portfolio-intro-inner">
    <div class="intro-stat">
      <strong>150+</strong>
      <span>Events Planned</span>
    </div>
    <div class="intro-stat">
      <strong>5 <span style="font-size:22px">★</span></strong>
      <span>Client Rating</span>
    </div>
    <div class="intro-stat">
      <strong>4+</strong>
      <span>Years of Excellence</span>
    </div>
  </div>
</div>

<!-- ── SECTION LEAD ───────────────────────────────────────────── -->
<div class="portfolio-lead">
  <span class="section-eyebrow">Our Work</span>
  <h2 class="section-heading">Moments We've Created</h2>
  <span class="gold-rule" style="margin:20px auto;"></span>
  <p>From intimate gatherings to grand celebrations — every event in our portfolio tells a story of dedication, creativity, and care. Explore the moments we've brought to life for our clients across Kampala.</p>
</div>

<!-- ── FILTER TABS ────────────────────────────────────────────── -->
<div class="portfolio-filters">
  <button class="filter-btn active" data-filter="all">All Events</button>
  <button class="filter-btn" data-filter="wedding">Weddings</button>
  <button class="filter-btn" data-filter="introduction">Introductions</button>
  <button class="filter-btn" data-filter="corporate">Corporate</button>
  <button class="filter-btn" data-filter="birthday">Birthdays</button>
</div>

<!-- ── PORTFOLIO GRID ─────────────────────────────────────────── -->
<div class="portfolio-grid" id="portfolioGrid">

  <!-- Weddings -->
  <div class="portfolio-item wedding" data-title="Elegant Wedding" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/KAR_4660.JPG" alt="Elegant Wedding - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Wedding</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Wedding" data-service="Full Planning &amp; Coordination">
    <img src="MORE PICS/GBZ_8287.jpg" alt="Wedding - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Wedding</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Wedding" data-service="Full Planning, Design &amp; Coordination">
    <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.22.57 PM.jpeg" alt="Wedding - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Wedding</h4>
      <p>Full Planning, Design &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Wedding" data-service="Full Planning &amp; Coordination">
    <img src="MORE PICS/GBZ_8295.jpg" alt="Wedding - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Wedding</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Wedding" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.23.08 PM.jpg" alt="Wedding - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Wedding</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Wedding" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.23.05 PM.jpg" alt="Wedding - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Wedding</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Wedding" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/KAR_4658.JPG" alt="Wedding - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Wedding</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Wedding" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.23.07 PM.jpg" alt="Wedding - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Wedding</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Wedding" data-service="Full Planning &amp; Coordination">
    <img src="MORE PICS/GBZ_8401.jpg" alt="Wedding - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Wedding</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Wedding" data-service="Full Planning &amp; Coordination">
    <img src="MORE PICS/GBZ_8313.jpg" alt="Wedding - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Wedding</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Wedding" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.22.49 PM.jpg" alt="Wedding - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Wedding</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Wedding" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.22.46 PM.jpeg" alt="Wedding - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Wedding</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Wedding" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.22.55 PM.jpg" alt="Wedding - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Wedding</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <!-- Introductions / Kwanjula -->
  <div class="portfolio-item introduction" data-title="Introduction / Kwanjula" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.23.10 PM.jpg" alt="Introduction - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant wedding</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item introduction" data-title="Introduction / Kwanjula" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.23.12 PM.jpg" alt="Introduction - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Introduction / Kwanjula</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item introduction" data-title="Introduction / Kwanjula" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.23.16 PM.jpg" alt="Introduction - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Introduction / Kwanjula</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item introduction" data-title="Introduction / Kwanjula" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.23.19 PM.jpg" alt="Introduction - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Introduction / Kwanjula</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item introduction" data-title="Introduction / Kwanjula" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.23.18 PM.jpg" alt="Introduction - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Introduction / Kwanjula</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item introduction" data-title="Introduction / Kwanjula" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.23.17 PM.jpg" alt="Introduction - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Introduction / Kwanjula</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item introduction" data-title="Introduction / Kwanjula" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.23.12 PM.jpg" alt="Introduction - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Introduction / Kwanjula</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item introduction" data-title="Introduction / Kwanjula" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.23.20 PM.jpg" alt="Introduction - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Introduction / Kwanjula</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item introduction" data-title="Introduction / Kwanjula" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.23.21 PM.jpg" alt="Introduction - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Introduction / Kwanjula</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item introduction" data-title="Introduction / Kwanjula" data-service="Full Planning &amp; Coordination">
    <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.23.22 PM.jpg" alt="Introduction - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Introduction / Kwanjula</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <!-- More elegant events (from MORE PICS folder) -->
  <div class="portfolio-item corporate" data-title="Elegant Event" data-service="Full Planning &amp; Coordination">
    <img src="MORE PICS/KAR_5583.JPG" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item corporate" data-title="Elegant Event" data-service="Full Planning &amp; Coordination">
    <img src="MORE PICS/KAR_4638.JPG" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item corporate" data-title="Elegant Event" data-service="Vendor &amp; Timeline Management">
    <img src="MORE PICS/GBZ_8419.JPG" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Vendor &amp; Timeline Management</p>
    </div>
  </div>

  <div class="portfolio-item corporate" data-title="Elegant Event" data-service="Design &amp; Coordination">
    <img src="MORE PICS/GBZ_7774.jpg" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Design &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item corporate" data-title="Elegant Event" data-service="Full Planning &amp; Coordination">
    <img src="MORE PICS/GBZ_8403.JPG" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item corporate" data-title="Elegant Event" data-service="Vendor &amp; Timeline Management">
    <img src="MORE PICS/GBZ_8387.JPG" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Vendor &amp; Timeline Management</p>
    </div>
  </div>

  <div class="portfolio-item corporate" data-title="Elegant Event" data-service="Design &amp; Coordination">
    <img src="MORE PICS/GBZ_8344 (1).JPG" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Design &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item birthday" data-title="Elegant Event" data-service="Full Planning &amp; Coordination">
    <img src="MORE PICS/KAR_5914.jpg" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item birthday" data-title="Elegant Event" data-service="Full Planning &amp; Coordination">
    <img src="MORE PICS/GBZ_8293.JPG" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item birthday" data-title="Elegant Event" data-service="Design &amp; Coordination">
    <img src="MORE PICS/KAR_3262.JPG" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Design &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item birthday" data-title="Elegant Event" data-service="Full Planning &amp; Coordination">
    <img src="MORE PICS/KAR_4649.JPG" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item corporate" data-title="Elegant Event" data-service="Vendor &amp; Timeline Management">
    <img src="MORE PICS/KAR_4624.JPG" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Vendor &amp; Timeline Management</p>
    </div>
  </div>

  <div class="portfolio-item corporate" data-title="Elegant Event" data-service="Design &amp; Coordination">
    <img src="MORE PICS/KAR_4625.JPG" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Design &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Event" data-service="Full Planning &amp; Coordination">
    <img src="MORE PICS/KAR_4645.JPG" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Event" data-service="Planning &amp; Coordination">
    <img src="MORE PICS/KAR_4628.JPG" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Event" data-service="Design &amp; Coordination">
    <img src="MORE PICS/GBZ_8334.JPG" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Design &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Event" data-service="Full Planning &amp; Coordination">
    <img src="MORE PICS/KAR_4637.JPG" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item corporate" data-title="Elegant Event" data-service="Vendor Coordination &amp; Full Planning">
    <img src="MORE PICS/KAR_4630.JPG" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Vendor Coordination &amp; Full Planning</p>
    </div>
  </div>

  <div class="portfolio-item corporate" data-title="Elegant Event" data-service="Design &amp; Coordination">
    <img src="MORE PICS/KAR_5306.jpg" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Design &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Event" data-service="Full Planning &amp; Coordination">
    <img src="MORE PICS/KAR_4873.JPG" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>
  <div class="portfolio-item corporate" data-title="Elegant Event" data-service="Design &amp; Coordination">
    <img src="MORE PICS/KAR_5386.jpg" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Design &amp; Coordination</p>
    </div>
  </div>

  <div class="portfolio-item wedding" data-title="Elegant Event" data-service="Full Planning &amp; Coordination">
    <img src="MORE PICS/KAR_5376.jpg" alt="Elegant Event - DWIN Events" loading="lazy">
    <div class="portfolio-overlay">
      <span class="zoom-icon"><i class="bi bi-arrows-fullscreen"></i></span>
      <h4>Elegant Event</h4>
      <p>Full Planning &amp; Coordination</p>
    </div>
  </div>

</div><!-- /.portfolio-grid -->

<!-- ── LIGHTBOX ───────────────────────────────────────────────── -->
<div class="lightbox" id="lightbox" role="dialog" aria-modal="true" aria-label="Image viewer">
  <button class="lb-close" id="lbClose" aria-label="Close"><i class="bi bi-x-lg"></i></button>
  <button class="lb-prev"  id="lbPrev"  aria-label="Previous"><i class="bi bi-chevron-left"></i></button>
  <button class="lb-next"  id="lbNext"  aria-label="Next"><i class="bi bi-chevron-right"></i></button>
  <div class="lightbox-img-wrap">
    <img src="" id="lbImg" alt="">
    <div class="lightbox-caption">
      <h4 id="lbTitle"></h4>
      <p id="lbService"></p>
    </div>
  </div>
</div>

<!-- ── CTA SECTION ────────────────────────────────────────────── -->
<section class="portfolio-cta">
  <div class="portfolio-cta-inner">
    <span class="section-eyebrow">Start Planning Today</span>
    <h2>Ready to see your event <em>here?</em></h2>
    <p>Book a free consultation and let's create something beautiful together — elegantly and within your budget.</p>
    <div class="cta-btns">
      <a href="contact.php" class="btn-gold">Book a Consultation</a>
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
/* ── FILTER ──────────────────────────────────────────────────── */
const filterBtns = document.querySelectorAll('.filter-btn');
const items      = document.querySelectorAll('.portfolio-item');

filterBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    filterBtns.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    const filter = btn.dataset.filter;
    items.forEach(item => {
      if (filter === 'all' || item.classList.contains(filter)) {
        item.classList.remove('hidden');
      } else {
        item.classList.add('hidden');
      }
    });
  });
});

/* ── LIGHTBOX ────────────────────────────────────────────────── */
const lb        = document.getElementById('lightbox');
const lbImg     = document.getElementById('lbImg');
const lbTitle   = document.getElementById('lbTitle');
const lbService = document.getElementById('lbService');
const lbClose   = document.getElementById('lbClose');
const lbPrev    = document.getElementById('lbPrev');
const lbNext    = document.getElementById('lbNext');

let visibleItems = [];
let currentIdx   = 0;

function getVisible() {
  return Array.from(items).filter(i => !i.classList.contains('hidden'));
}

function openLightbox(idx) {
  visibleItems = getVisible();
  currentIdx   = idx;
  const item   = visibleItems[idx];
  lbImg.src     = item.querySelector('img').src;
  lbImg.alt     = item.querySelector('img').alt;
  lbTitle.textContent   = item.dataset.title   || '';
  lbService.textContent = item.dataset.service || '';
  lb.classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeLightbox() {
  lb.classList.remove('open');
  document.body.style.overflow = '';
}

function navigate(dir) {
  visibleItems = getVisible();
  currentIdx = (currentIdx + dir + visibleItems.length) % visibleItems.length;
  const item = visibleItems[currentIdx];
  lbImg.src     = item.querySelector('img').src;
  lbImg.alt     = item.querySelector('img').alt;
  lbTitle.textContent   = item.dataset.title   || '';
  lbService.textContent = item.dataset.service || '';
}

items.forEach((item, globalIdx) => {
  item.addEventListener('click', () => {
    visibleItems = getVisible();
    const visIdx = visibleItems.indexOf(item);
    if (visIdx !== -1) openLightbox(visIdx);
  });
});

lbClose.addEventListener('click', closeLightbox);
lbPrev.addEventListener('click',  () => navigate(-1));
lbNext.addEventListener('click',  () => navigate(1));

lb.addEventListener('click', e => {
  if (e.target === lb) closeLightbox();
});

document.addEventListener('keydown', e => {
  if (!lb.classList.contains('open')) return;
  if (e.key === 'Escape')     closeLightbox();
  if (e.key === 'ArrowLeft')  navigate(-1);
  if (e.key === 'ArrowRight') navigate(1);
});
</script>
</body>
</html>
