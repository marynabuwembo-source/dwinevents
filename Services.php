<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Services — DWIN Events | Event Planning & Coordination Uganda</title>
  <meta name="description" content="Explore DWIN Events' full range of services — wedding planning, introductions, birthdays, corporate events, proposals and more. Silver, Gold, Platinum and Luxury packages available in Kampala, Uganda.">
  <link rel="stylesheet" href="dwin-core.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>

    /* ── HERO ──────────────────────────────────────────────── */
    .services-hero {
      position: relative;
      height: 100vh;
      min-height: 560px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      overflow: hidden;
      margin-top: 72px;
    }

    .hero-video {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      transform: scale(1.04);
    }

    /* Fallback gradient if video unavailable */
    .hero-img-fallback {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .hero-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(
        170deg,
        rgba(26,24,20,0.78) 0%,
        rgba(26,24,20,0.42) 45%,
        rgba(26,24,20,0.70) 100%
      );
    }

    .hero-content {
      position: relative;
      z-index: 2;
      padding: 0 24px;
      max-width: 820px;
    }

    .hero-eyebrow-tag {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      font-size: 10px;
      font-weight: 500;
      letter-spacing: 4px;
      text-transform: uppercase;
      color: var(--gold);
      margin-bottom: 24px;
      opacity: 0;
      animation: fadeUp 0.8s 0.3s forwards;
    }
    .hero-eyebrow-tag::before,
    .hero-eyebrow-tag::after {
      content: '';
      display: block;
      width: 32px;
      height: 1px;
      background: var(--gold);
      opacity: 0.5;
    }

    .hero-title {
      font-family: var(--font-display);
      font-size: clamp(52px, 8vw, 90px);
      font-weight: 300;
      line-height: 1.06;
      color: var(--white);
      margin-bottom: 20px;
      opacity: 0;
      animation: fadeUp 0.8s 0.55s forwards;
    }
    .hero-title em {
      font-style: italic;
      color: var(--gold-light);
    }

    .hero-tagline {
      font-size: 15px;
      color: rgba(255,255,255,0.75);
      line-height: 1.7;
      margin-bottom: 40px;
      max-width: 560px;
      margin-left: auto;
      margin-right: auto;
      opacity: 0;
      animation: fadeUp 0.8s 0.8s forwards;
    }

    .hero-buttons {
      display: flex;
      gap: 16px;
      justify-content: center;
      flex-wrap: wrap;
      opacity: 0;
      animation: fadeUp 0.8s 1.0s forwards;
    }

    .hero-scroll-hint {
      position: absolute;
      bottom: 36px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 3;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 6px;
    }
    .hero-scroll-hint span {
      font-size: 9px;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      color: rgba(255,255,255,0.4);
    }
    .scroll-chevron {
      color: var(--gold);
      font-size: 18px;
      animation: bounce 2s infinite;
    }
    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50%       { transform: translateY(6px); }
    }
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(22px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ── INTRO STRIP ───────────────────────────────────────── */
    .intro-strip {
      background: var(--charcoal);
      border-bottom: 1px solid var(--border);
    }
    .intro-inner {
      max-width: 1200px;
      margin: 0 auto;
      padding: 64px 48px;
      display: grid;
      grid-template-columns: 1fr 2px 1fr 2px 1fr;
      gap: 0;
      align-items: center;
    }
    .intro-divider {
      width: 1px;
      height: 80px;
      background: var(--border);
      margin: 0 auto;
    }
    .intro-col { padding: 0 40px; text-align: center; }
    .intro-col i {
      font-size: 28px;
      color: var(--gold);
      display: block;
      margin-bottom: 12px;
    }
    .intro-col h4 {
      font-family: var(--font-display);
      font-size: 20px;
      font-weight: 400;
      color: var(--white);
      margin-bottom: 8px;
    }
    .intro-col p { font-size: 13px; color: rgba(255,255,255,0.5); line-height: 1.7; }

    /* ── OUR ROLE ──────────────────────────────────────────── */
    .role-section {
      padding: 100px 48px;
      max-width: 1200px;
      margin: 0 auto;
    }
    .role-header {
      text-align: center;
      margin-bottom: 72px;
    }
    .role-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2px;
    }
    .role-col {
      padding: 48px 40px;
      border: 1px solid var(--border);
      transition: var(--transition);
      position: relative;
      overflow: hidden;
    }
    .role-col::before {
      content: '';
      position: absolute;
      bottom: 0; left: 0; right: 0;
      height: 2px;
      background: var(--gold);
      transform: scaleX(0);
      transition: transform 0.4s ease;
    }
    .role-col:hover { border-color: rgba(201,168,76,0.4); }
    .role-col:hover::before { transform: scaleX(1); }

    .role-col-icon {
      width: 48px;
      height: 48px;
      border: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      color: var(--gold);
      margin-bottom: 24px;
    }
    .role-col h3 {
      font-family: var(--font-display);
      font-size: 26px;
      font-weight: 400;
      margin-bottom: 20px;
    }
    .role-list { list-style: none; }
    .role-list li {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      padding: 9px 0;
      border-bottom: 1px solid rgba(0,0,0,0.05);
      font-size: 13px;
      color: var(--mid);
    }
    .role-list li:last-child { border-bottom: none; }
    .role-list li i { color: var(--gold); font-size: 12px; margin-top: 3px; flex-shrink: 0; }

    /* ── EVENTS EDITORIAL ──────────────────────────────────── */
    .editorial-section {
      background: var(--charcoal);
      padding: 100px 0;
      overflow: hidden;
    }
    .editorial-header {
      text-align: center;
      padding: 0 48px;
      margin-bottom: 72px;
    }

    .editorial-grid {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 48px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2px;
    }

    .event-card {
      position: relative;
      overflow: hidden;
      height: 400px;
      cursor: pointer;
    }
    .event-card.tall { height: 500px; }
    .event-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.8s ease;
    }
    .event-card:hover img { transform: scale(1.06); }
    .event-card-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(26,24,20,0.90) 0%, rgba(26,24,20,0.15) 55%);
      transition: var(--transition);
    }
    .event-card:hover .event-card-overlay {
      background: linear-gradient(to top, rgba(26,24,20,0.92) 0%, rgba(26,24,20,0.35) 55%);
    }
    .event-card-content {
      position: absolute;
      bottom: 0; left: 0; right: 0;
      padding: 32px 28px;
    }
    .event-card-num {
      font-family: var(--font-display);
      font-size: 11px;
      letter-spacing: 3px;
      color: var(--gold);
      text-transform: uppercase;
      margin-bottom: 8px;
    }
    .event-card-content h3 {
      font-family: var(--font-display);
      font-size: 26px;
      font-weight: 400;
      color: var(--white);
      margin-bottom: 8px;
    }
    .event-card-content p {
      font-size: 13px;
      color: rgba(255,255,255,0.6);
      line-height: 1.65;
      transform: translateY(8px);
      opacity: 0;
      transition: var(--transition);
      margin-bottom: 16px;
    }
    .event-card:hover .event-card-content p { transform: translateY(0); opacity: 1; }
    .event-card-link {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--gold);
      text-decoration: none;
      transform: translateY(8px);
      opacity: 0;
      transition: var(--transition) 0.05s;
    }
    .event-card:hover .event-card-link { transform: translateY(0); opacity: 1; }

    /* Second row — 3 cards */
    .editorial-grid-3 {
      max-width: 1200px;
      margin: 2px auto 0;
      padding: 0 48px;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2px;
    }
    .editorial-grid-3 .event-card { height: 340px; }

    /* ── PACKAGES ──────────────────────────────────────────── */
    .packages-section {
      padding: 100px 48px;
      background: var(--ivory);
    }
    .packages-header {
      text-align: center;
      margin-bottom: 72px;
    }
    .packages-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 24px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .pkg-card {
      border: 1px solid rgba(0,0,0,0.1);
      background: var(--white);
      display: flex;
      flex-direction: column;
      position: relative;
      transition: var(--transition);
    }
    .pkg-card:hover {
      border-color: var(--gold);
      box-shadow: 0 12px 48px rgba(201,168,76,0.14);
      transform: translateY(-5px);
    }
    .pkg-card.featured {
      background: var(--charcoal);
      border-color: var(--gold);
    }

    .pkg-top-bar {
      height: 3px;
      background: rgba(0,0,0,0.06);
    }
    .pkg-card.silver  .pkg-top-bar { background: #b0b0b0; }
    .pkg-card.gold-p  .pkg-top-bar { background: var(--gold); }
    .pkg-card.platinum .pkg-top-bar { background: linear-gradient(90deg, #8c8c8c, #e8e8e8); }
    .pkg-card.luxury  .pkg-top-bar { background: linear-gradient(90deg, var(--gold-dim), var(--gold-light)); }

    .pkg-best-badge {
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
      white-space: nowrap;
    }

    .pkg-body {
      padding: 36px 28px 28px;
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .pkg-tier {
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: var(--gold);
      margin-bottom: 6px;
    }
    .pkg-name {
      font-family: var(--font-display);
      font-size: 28px;
      font-weight: 400;
      color: var(--charcoal);
      margin-bottom: 4px;
    }
    .pkg-card.featured .pkg-name { color: var(--white); }

    .pkg-tagline {
      font-size: 12px;
      color: var(--muted);
      margin-bottom: 24px;
      padding-bottom: 24px;
      border-bottom: 1px solid rgba(0,0,0,0.07);
    }
    .pkg-card.featured .pkg-tagline {
      color: rgba(255,255,255,0.45);
      border-color: var(--border);
    }

    .pkg-price {
      font-family: var(--font-display);
      font-size: 16px;
      font-weight: 300;
      color: var(--mid);
      margin-bottom: 24px;
    }
    .pkg-card.featured .pkg-price { color: rgba(255,255,255,0.6); }
    .pkg-price strong {
      display: block;
      font-size: 28px;
      font-weight: 600;
      color: var(--gold);
      margin-bottom: 2px;
    }

    .pkg-features {
      list-style: none;
      margin-bottom: 28px;
      flex: 1;
    }
    .pkg-features li {
      display: flex;
      align-items: flex-start;
      gap: 9px;
      padding: 8px 0;
      font-size: 13px;
      color: var(--mid);
      border-bottom: 1px solid rgba(0,0,0,0.04);
    }
    .pkg-features li:last-child { border-bottom: none; }
    .pkg-card.featured .pkg-features li {
      color: rgba(255,255,255,0.65);
      border-color: rgba(255,255,255,0.06);
    }
    .pkg-features li i {
      color: var(--gold);
      font-size: 12px;
      margin-top: 2px;
      flex-shrink: 0;
    }
    .pkg-note {
      font-size: 11px;
      color: var(--muted);
      font-style: italic;
      margin-bottom: 20px;
    }
    .pkg-card.featured .pkg-note { color: rgba(255,255,255,0.35); }

    /* ── PROCESS TIMELINE ──────────────────────────────────── */
    .process-section {
      background: var(--charcoal);
      padding: 100px 48px;
    }
    .process-inner {
      max-width: 1100px;
      margin: 0 auto;
    }
    .process-header { text-align: center; margin-bottom: 72px; }

    .process-timeline {
      position: relative;
      padding-left: 48px;
    }
    .process-timeline::before {
      content: '';
      position: absolute;
      left: 15px;
      top: 0; bottom: 0;
      width: 1px;
      background: linear-gradient(to bottom, var(--gold), transparent);
    }
    .pt-step {
      position: relative;
      margin-bottom: 52px;
      display: grid;
      grid-template-columns: 200px 1fr;
      gap: 40px;
      align-items: flex-start;
    }
    .pt-step:last-child { margin-bottom: 0; }
    .pt-dot {
      position: absolute;
      left: -45px;
      top: 4px;
      width: 14px;
      height: 14px;
      border-radius: 50%;
      background: var(--gold);
      border: 3px solid var(--charcoal);
      box-shadow: 0 0 0 1px var(--gold);
    }
    .pt-step-label {
      text-align: right;
    }
    .pt-step-num {
      font-family: var(--font-display);
      font-size: 52px;
      font-weight: 300;
      color: rgba(201,168,76,0.15);
      line-height: 1;
      display: block;
    }
    .pt-step-phase {
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      color: var(--gold);
    }
    .pt-step-body h4 {
      font-family: var(--font-display);
      font-size: 22px;
      font-weight: 400;
      color: var(--white);
      margin-bottom: 10px;
    }
    .pt-step-body p {
      font-size: 14px;
      color: rgba(255,255,255,0.55);
      line-height: 1.8;
      margin-bottom: 14px;
    }
    .pt-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
    }
    .pt-tag {
      font-size: 11px;
      padding: 4px 10px;
      border: 1px solid var(--border);
      color: rgba(255,255,255,0.5);
      border-radius: 2px;
    }

    /* ── FAQ SNIPPET ───────────────────────────────────────── */
    .faq-snippet {
      padding: 100px 48px;
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 1.4fr;
      gap: 80px;
      align-items: start;
    }
    .faq-left h2 {
      font-family: var(--font-display);
      font-size: 42px;
      font-weight: 300;
      margin-bottom: 16px;
    }
    .faq-left p {
      color: var(--muted);
      font-size: 14px;
      line-height: 1.8;
      margin-bottom: 28px;
    }
    .faq-item-s {
      border-bottom: 1px solid var(--border);
    }
    .faq-q-s {
      width: 100%;
      background: none;
      border: none;
      padding: 18px 0;
      text-align: left;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
      cursor: pointer;
      font-family: var(--font-body);
      font-size: 14px;
      font-weight: 400;
      color: var(--charcoal);
      transition: var(--transition);
    }
    .faq-q-s:hover { color: var(--gold-dim); }
    .faq-q-s span {
      font-size: 18px;
      color: var(--muted);
      transition: transform 0.3s;
      flex-shrink: 0;
    }
    .faq-item-s.open .faq-q-s span { transform: rotate(45deg); color: var(--gold); }
    .faq-a-s {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.4s ease;
    }
    .faq-item-s.open .faq-a-s { max-height: 300px; }
    .faq-a-s p {
      font-size: 13px;
      color: var(--muted);
      line-height: 1.8;
      padding-bottom: 18px;
    }

    /* ── CTA FORM ──────────────────────────────────────────── */
    .cta-form-section {
      position: relative;
      padding: 100px 48px;
      overflow: hidden;
      background: url('classy img/wed.jpg') center/cover no-repeat fixed;
    }
    .cta-form-section::before {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(26,24,20,0.82);
    }
    .cta-form-inner {
      position: relative;
      z-index: 1;
      max-width: 900px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 1.2fr;
      gap: 64px;
      align-items: center;
    }
    .cta-text h2 {
      font-family: var(--font-display);
      font-size: clamp(34px, 4vw, 52px);
      font-weight: 300;
      color: var(--white);
      margin-bottom: 14px;
      line-height: 1.2;
    }
    .cta-text p { color: rgba(255,255,255,0.6); font-size: 14px; line-height: 1.8; }

    .cta-contact-items { margin-top: 32px; }
    .cta-contact-item {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 12px;
      font-size: 13px;
      color: rgba(255,255,255,0.7);
    }
    .cta-contact-item i { color: var(--gold); font-size: 16px; }
    .cta-contact-item a { color: rgba(255,255,255,0.7); text-decoration: none; transition: var(--transition); }
    .cta-contact-item a:hover { color: var(--gold); }

    .cta-quick-form {
      background: rgba(255,255,255,0.04);
      border: 1px solid var(--border);
      backdrop-filter: blur(10px);
      padding: 36px;
    }
    .cta-quick-form h3 {
      font-family: var(--font-display);
      font-size: 24px;
      font-weight: 400;
      color: var(--white);
      margin-bottom: 24px;
    }
    .form-f {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }
    .form-f input,
    .form-f select {
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 2px;
      padding: 12px 14px;
      font-family: var(--font-body);
      font-size: 13px;
      color: rgba(255,255,255,0.85);
      outline: none;
      transition: var(--transition);
      width: 100%;
    }
    .form-f input::placeholder { color: rgba(255,255,255,0.35); }
    .form-f input:focus,
    .form-f select:focus { border-color: var(--gold); background: rgba(255,255,255,0.08); }
    .form-f select { cursor: pointer; }
    .form-f select option { background: var(--charcoal); color: var(--white); }
    .form-f .form-row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }

    /* ── TESTIMONIALS ──────────────────────────────────────── */
    .testimonials-strip {
      background: var(--charcoal);
      border-top: 1px solid var(--border);
      padding: 80px 48px;
    }
    .testimonials-strip-inner {
      max-width: 1200px;
      margin: 0 auto;
    }
    .testimonial-cards-row {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
      margin-top: 56px;
    }
    .t-card {
      padding: 36px;
      border: 1px solid var(--border);
      transition: var(--transition);
    }
    .t-card:hover { border-color: var(--gold); }
    .t-stars { color: var(--gold); font-size: 13px; margin-bottom: 16px; }
    .t-quote {
      font-family: var(--font-display);
      font-size: 16px;
      font-style: italic;
      font-weight: 300;
      color: rgba(255,255,255,0.8);
      line-height: 1.75;
      margin-bottom: 24px;
    }
    .t-quote::before { content: '\201C'; color: var(--gold); font-size: 32px; line-height: 0; vertical-align: -10px; margin-right: 2px; }
    .t-author strong {
      display: block;
      font-family: var(--font-display);
      font-size: 16px;
      font-weight: 400;
      color: var(--white);
      margin-bottom: 3px;
    }
    .t-author span {
      font-size: 10px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--gold);
    }

    /* ── RESPONSIVE ────────────────────────────────────────── */
    @media (max-width: 1100px) {
      .packages-grid { grid-template-columns: repeat(2, 1fr); }
      .editorial-grid-3 { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 960px) {
      .cta-form-inner { grid-template-columns: 1fr; }
      .faq-snippet { grid-template-columns: 1fr; gap: 48px; }
      .pt-step { grid-template-columns: 120px 1fr; gap: 24px; }
      .testimonial-cards-row { grid-template-columns: 1fr; }
    }
    @media (max-width: 900px) {
      .intro-inner { grid-template-columns: 1fr; gap: 0; padding: 48px 24px; }
      .intro-divider { display: none; }
      .intro-col { padding: 24px 0; border-bottom: 1px solid var(--border); }
      .intro-col:last-child { border-bottom: none; }
      .role-section { padding: 80px 24px; }
      .role-grid { grid-template-columns: 1fr; }
      .editorial-section { padding: 80px 0; }
      .editorial-header { padding: 0 24px; }
      .editorial-grid,
      .editorial-grid-3 { padding: 0 24px; grid-template-columns: 1fr; }
      .event-card, .event-card.tall { height: 300px; }
      .packages-section { padding: 80px 24px; }
      .packages-grid { grid-template-columns: 1fr; }
      .process-section { padding: 80px 24px; }
      .pt-step { grid-template-columns: 1fr; gap: 8px; }
      .pt-step-label { text-align: left; }
      .faq-snippet { padding: 80px 24px; }
      .cta-form-section { padding: 80px 24px; }
      .testimonials-strip { padding: 80px 24px; }
    }
    @media (max-width: 600px) {
      .services-hero { height: 80vh; }
      .form-f .form-row-2 { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<!-- ── NAVIGATION ─────────────────────────────────────────────── -->
<nav class="dwin-nav" id="mainNav">
  <a href="INDEX.php" class="nav-brand">DWIN EVENTS</a>

  <button class="nav-hamburger" id="hamburger" aria-label="Open menu">
    <span></span><span></span><span></span>
  </button>

  <div class="nav-menu" id="navMenu">
    <ul class="nav-links">
      <li><a href="INDEX.php" class="active">Home</a></li>
      <li><a href="About.php">About</a></li>
      <li class="nav-dropdown">
        <a href="Services.php" class="active">Services</a>
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

<!-- ── HERO ───────────────────────────────────────────────────── -->
<section class="services-hero">
  <!-- Video hero (falls back to img if video absent) -->
  <video class="hero-video" autoplay muted loop playsinline poster="classy img/wed.jpg">
    <source src="classy img/video3.mp4" type="video/mp4">
  </video>
  <img class="hero-img-fallback" src="classy img/wed.jpg" alt="DWIN Events Services" style="display:none;" id="heroFallback">

  <div class="hero-overlay"></div>

  <div class="hero-content">
    <span class="hero-eyebrow-tag">DWIN Events</span>
    <h1 class="hero-title">Our <em>Services</em></h1>
    <p class="hero-tagline">
      Thoughtfully planned. Elegantly coordinated.<br>
      Designed to make every moment truly unforgettable.
    </p>
    <div class="hero-buttons">
      <a href="#packages" class="btn-gold">View Packages</a>
      <a href="contact.html" class="btn-outline-white">Book Consultation</a>
    </div>
  </div>

  <div class="hero-scroll-hint">
    <i class="bi bi-chevron-down scroll-chevron"></i>
    <span>Scroll to explore</span>
  </div>
</section>

<!-- ── INTRO STRIP ─────────────────────────────────────────────── -->
<div class="intro-strip">
  <div class="intro-inner">
    <div class="intro-col">
      <i class="bi bi-heart-pulse"></i>
      <h4>Stress-Free Planning</h4>
      <p>From first consultation to final farewell — we handle every detail so you can be fully present on your big day.</p>
    </div>
    <div class="intro-divider"></div>
    <div class="intro-col">
      <i class="bi bi-wallet2"></i>
      <h4>Budget-Conscious</h4>
      <p>We deliver excellence within your budget. No hidden costs, no compromises — just smart, creative planning.</p>
    </div>
    <div class="intro-divider"></div>
    <div class="intro-col">
      <i class="bi bi-patch-check"></i>
      <h4>Trusted Vendors</h4>
      <p>We work with a vetted network of experienced local professionals who share our commitment to quality.</p>
    </div>
  </div>
</div>

<!-- ── OUR ROLE ────────────────────────────────────────────────── -->
<section class="role-section">
  <div class="role-header">
    <span class="section-eyebrow">What We Do For You</span>
    <h2 class="section-heading">Our Role in Your Event</h2>
    <span class="gold-rule" style="margin: 20px auto;"></span>
    <p style="color:var(--muted);max-width:520px;margin:0 auto;">
      From planning to execution, we make every detail count — acting as your expert partner at every stage.
    </p>
  </div>
  <div class="role-grid">
    <div class="role-col">
      <div class="role-col-icon"><i class="bi bi-lightbulb"></i></div>
      <h3>Plan</h3>
      <ul class="role-list">
        <li><i class="bi bi-check-lg"></i> Concept &amp; vision development</li>
        <li><i class="bi bi-check-lg"></i> Budget planning &amp; tracking</li>
        <li><i class="bi bi-check-lg"></i> Vendor research &amp; sourcing</li>
        <li><i class="bi bi-check-lg"></i> Venue selection support</li>
        <li><i class="bi bi-check-lg"></i> Logistics &amp; run-of-show planning</li>
        <li><i class="bi bi-check-lg"></i> Program &amp; schedule design</li>
      </ul>
    </div>
    <div class="role-col">
      <div class="role-col-icon"><i class="bi bi-palette"></i></div>
      <h3>Design</h3>
      <ul class="role-list">
        <li><i class="bi bi-check-lg"></i> Theme &amp; décor concept</li>
        <li><i class="bi bi-check-lg"></i> Colour palette &amp; styling</li>
        <li><i class="bi bi-check-lg"></i> Floral &amp; arrangement guidance</li>
        <li><i class="bi bi-check-lg"></i> Lighting &amp; ambiance planning</li>
        <li><i class="bi bi-check-lg"></i> Seating &amp; layout design</li>
        <li><i class="bi bi-check-lg"></i> Customised stationery &amp; signage</li>
      </ul>
    </div>
    <div class="role-col">
      <div class="role-col-icon"><i class="bi bi-diagram-3"></i></div>
      <h3>Coordinate</h3>
      <ul class="role-list">
        <li><i class="bi bi-check-lg"></i> Full on-site management</li>
        <li><i class="bi bi-check-lg"></i> Vendor supervision &amp; briefing</li>
        <li><i class="bi bi-check-lg"></i> Timeline execution &amp; calling</li>
        <li><i class="bi bi-check-lg"></i> Guest arrival &amp; flow management</li>
        <li><i class="bi bi-check-lg"></i> Problem-solving (discreetly)</li>
        <li><i class="bi bi-check-lg"></i> Setup, breakdown &amp; post-event wrap</li>
      </ul>
    </div>
  </div>
</section>

<!-- ── EVENTS WE HANDLE ────────────────────────────────────────── -->
<section class="editorial-section">
  <div class="editorial-header">
    <span class="section-eyebrow">Our Expertise</span>
    <h2 class="section-heading light">Events We Handle</h2>
    <span class="gold-rule" style="margin:20px auto;"></span>
    <p style="color:rgba(255,255,255,0.5);max-width:520px;margin:0 auto;">
      Thoughtfully planned experiences, tailored for every occasion — from intimate gatherings to grand celebrations.
    </p>
  </div>

  <!-- Row 1: 2 cards -->
  <div class="editorial-grid">
    <div class="event-card tall" id="weddings">
      <img src="MORE PICS/WhatsApp Image 2026-02-01 at 4.31.54 PM.jpeg" alt="Wedding Planning">
      <div class="event-card-overlay"></div>
      <div class="event-card-content">
        <div class="event-card-num">01 — Weddings</div>
        <h3>Wedding Ceremonies</h3>
        <p>Elegant, seamless weddings crafted with love and meticulous attention to every single detail — from the first petal to the final dance.</p>
        <a href="contact.html" class="event-card-link">Book Now <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
    <div class="event-card tall" id="introductions">
      <img src="Kefa's wedding/WhatsApp Image 2026-02-01 at 4.23.11 PM.jpeg" alt="Traditional Introduction Kwanjula">
      <div class="event-card-overlay"></div>
      <div class="event-card-content">
        <div class="event-card-num">02 — Introductions</div>
        <h3>Introductions &amp; Kwanjula</h3>
        <p>Beautifully coordinated traditional ceremonies that honour your culture and family, creating lasting impressions for every guest present.</p>
        <a href="contact.html" class="event-card-link">Book Now <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
  </div>

  <!-- Row 2: 3 cards -->
  <div class="editorial-grid-3" style="margin-top:2px;">
    <div class="event-card" id="birthdays">
      <img src="MORE PICS/KAR_4645.JPG" alt="Birthday Celebrations">
      <div class="event-card-overlay"></div>
      <div class="event-card-content">
        <div class="event-card-num">03 — Birthdays</div>
        <h3>Birthday Celebrations</h3>
        <p>From intimate dinners to grand parties, we turn birthdays into unforgettable milestones filled with joy.</p>
        <a href="contact.html" class="event-card-link">Book Now <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
    <div class="event-card" id="corporate">
      <img src="classy img/edwin-petrus-XpmdZfDE3pI-unsplash.jpg" alt="Corporate Events">
      <div class="event-card-overlay"></div>
      <div class="event-card-content">
        <div class="event-card-num">04 — Corporate</div>
        <h3>Corporate Events</h3>
        <p>Professional planning for conferences, product launches, galas, and corporate team celebrations.</p>
        <a href="contact.html" class="event-card-link">Book Now <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
    <div class="event-card" id="proposals">
      <img src="MORE PICS/KAR_4637.JPG" alt="Proposals and Romantic Setups">
      <div class="event-card-overlay"></div>
      <div class="event-card-content">
        <div class="event-card-num">05 — Proposals</div>
        <h3>Proposals &amp; Romantic Setups</h3>
        <p>Creative, intimate setups designed to create the perfect "YES" moment — beautifully styled and stress-free.</p>
        <a href="contact.html" class="event-card-link">Book Now <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
  </div>

  <!-- Row 3: 3 more -->
  <div class="editorial-grid-3" style="margin-top:2px;">
    <div class="event-card">
      <img src="MORE PICS/KAR_4641.JPG" alt="Baby Showers and Gender Reveals">
      <div class="event-card-overlay"></div>
      <div class="event-card-content">
        <div class="event-card-num">06 — Baby Showers</div>
        <h3>Baby Showers &amp; Gender Reveals</h3>
        <p>Warmly styled celebrations filled with elegance, fun, and precious memories for your growing family.</p>
        <a href="contact.html" class="event-card-link">Book Now <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
    <div class="event-card">
      <img src="MORE PICS/KAR_4638.JPG" alt="Anniversaries">
      <div class="event-card-overlay"></div>
      <div class="event-card-content">
        <div class="event-card-num">07 — Anniversaries</div>
        <h3>Anniversaries</h3>
        <p>Romantic, thoughtfully planned anniversary celebrations that honour your love story and create new memories.</p>
        <a href="contact.html" class="event-card-link">Book Now <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
    <div class="event-card">
      <img src="MORE PICS/KAR_4631.JPG" alt="Private Events">
      <div class="event-card-overlay"></div>
      <div class="event-card-content">
        <div class="event-card-num">08 — Private Events</div>
        <h3>Private &amp; Mini Events</h3>
        <p>Intimate gatherings, farewell parties, dinner celebrations — no event is too small for the DWIN touch.</p>
        <a href="contact.html" class="event-card-link">Book Now <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- ── PACKAGES ────────────────────────────────────────────────── -->
<section class="packages-section" id="packages">
  <div class="packages-header">
    <span class="section-eyebrow">Pricing</span>
    <h2 class="section-heading">Choose Your Package</h2>
    <span class="gold-rule" style="margin:20px auto;"></span>
    <p style="color:var(--muted);max-width:540px;margin:0 auto;">
      Every package is fully customizable to fit your vision and budget. Not sure which is right for you?
      <a href="contact.html" style="color:var(--gold);">Let's talk</a> — we'll guide you.
    </p>
  </div>

  <div class="packages-grid">

    <!-- Silver -->
    <div class="pkg-card silver">
      <div class="pkg-top-bar"></div>
      <div class="pkg-body">
        <div class="pkg-tier">Silver</div>
        <div class="pkg-name">Coordination</div>
        <div class="pkg-tagline">Coordination only — ideal when you've planned but need expert execution.</div>
        <div class="pkg-price">
          Starting from<strong>UGX 600,000</strong>
        </div>
        <ul class="pkg-features">
          <li><i class="bi bi-check-lg"></i> Full event timeline management</li>
          <li><i class="bi bi-check-lg"></i> Vendor coordination &amp; briefing</li>
          <li><i class="bi bi-check-lg"></i> On-day supervision</li>
          <li><i class="bi bi-check-lg"></i> Run-of-show calling</li>
          <li><i class="bi bi-check-lg"></i> Problem resolution on the day</li>
        </ul>
        <div class="pkg-note">Best for: clients who have planned their event and need a professional to execute it.</div>
        <a href="contact.html" class="btn-outline-gold" style="display:block;text-align:center;">Book This Package</a>
      </div>
    </div>

    <!-- Gold (featured) -->
    <div class="pkg-card gold-p featured">
      <div class="pkg-top-bar"></div>
      <div class="pkg-best-badge">Most Popular</div>
      <div class="pkg-body">
        <div class="pkg-tier">Gold</div>
        <div class="pkg-name">Partial Planning</div>
        <div class="pkg-tagline">Partial planning with vendor sourcing — the perfect balance of support and control.</div>
        <div class="pkg-price">
          Starting from<strong>UGX 1,200,000</strong>
        </div>
        <ul class="pkg-features">
          <li><i class="bi bi-check-lg"></i> Everything in Silver</li>
          <li><i class="bi bi-check-lg"></i> Vendor sourcing &amp; recommendations</li>
          <li><i class="bi bi-check-lg"></i> Event program design</li>
          <li><i class="bi bi-check-lg"></i> Guest coordination</li>
          <li><i class="bi bi-check-lg"></i> Budget tracking support</li>
          <li><i class="bi bi-check-lg"></i> Pre-event planning sessions</li>
        </ul>
        <div class="pkg-note">Best for: clients who want planning support alongside professional coordination.</div>
        <a href="contact.html" class="btn-gold" style="display:block;text-align:center;">Book This Package</a>
      </div>
    </div>

    <!-- Platinum -->
    <div class="pkg-card platinum">
      <div class="pkg-top-bar"></div>
      <div class="pkg-body">
        <div class="pkg-tier">Platinum</div>
        <div class="pkg-name">Full Planning</div>
        <div class="pkg-tagline">Complete end-to-end planning and coordination — fully stress-free from day one.</div>
        <div class="pkg-price">
          Starting from<strong>UGX 2,500,000</strong>
        </div>
        <ul class="pkg-features">
          <li><i class="bi bi-check-lg"></i> Everything in Gold</li>
          <li><i class="bi bi-check-lg"></i> Full event concept development</li>
          <li><i class="bi bi-check-lg"></i> Premium vendor sourcing</li>
          <li><i class="bi bi-check-lg"></i> Full on-day execution</li>
          <li><i class="bi bi-check-lg"></i> Décor &amp; styling guidance</li>
          <li><i class="bi bi-check-lg"></i> Post-event wrap-up &amp; feedback</li>
        </ul>
        <div class="pkg-note">Best for: clients who want a completely hands-off, beautifully managed experience.</div>
        <a href="contact.html" class="btn-outline-gold" style="display:block;text-align:center;">Book This Package</a>
      </div>
    </div>

    <!-- Luxury -->
    <div class="pkg-card luxury">
      <div class="pkg-top-bar"></div>
      <div class="pkg-body">
        <div class="pkg-tier">Luxury ⭐</div>
        <div class="pkg-name">White-Glove</div>
        <div class="pkg-tagline">Fully personalized, white-glove experience — the absolute pinnacle of event planning.</div>
        <div class="pkg-price">
          Bespoke<strong>Custom Pricing</strong>
        </div>
        <ul class="pkg-features">
          <li><i class="bi bi-check-lg"></i> Everything in Platinum</li>
          <li><i class="bi bi-check-lg"></i> Personalized event design &amp; styling</li>
          <li><i class="bi bi-check-lg"></i> Priority &amp; premium vendor access</li>
          <li><i class="bi bi-check-lg"></i> Dedicated on-site coordination team</li>
          <li><i class="bi bi-check-lg"></i> VIP guest experience management</li>
          <li><i class="bi bi-check-lg"></i> Extended event-day coverage</li>
        </ul>
        <div class="pkg-note">Best for: high-profile events and clients who want an absolutely flawless experience.</div>
        <a href="contact.html" class="btn-outline-gold" style="display:block;text-align:center;">Get a Custom Quote</a>
      </div>
    </div>

  </div>

  <p style="text-align:center;margin-top:36px;font-size:13px;color:var(--muted);">
    All packages are fully customizable. Vendor costs are quoted separately and included transparently in your proposal.
    A 50% deposit confirms your booking. Balance due 7 days before your event.
  </p>
</section>

<!-- ── PROCESS TIMELINE ────────────────────────────────────────── -->
<section class="process-section">
  <div class="process-inner">
    <div class="process-header">
      <span class="section-eyebrow">How We Work</span>
      <h2 class="section-heading light">From Inquiry to Celebration</h2>
      <span class="gold-rule" style="margin:20px auto;"></span>
      <p style="color:rgba(255,255,255,0.5);max-width:500px;margin:0 auto;">
        A clear, simple journey from your first message to a flawlessly executed event.
      </p>
    </div>

    <div class="process-timeline">

      <div class="pt-step">
        <div class="pt-dot"></div>
        <div class="pt-step-label">
          <span class="pt-step-num">01</span>
          <span class="pt-step-phase">Discovery</span>
        </div>
        <div class="pt-step-body">
          <h4>Free Consultation</h4>
          <p>You reach out via our inquiry form or WhatsApp. We schedule a free, no-obligation consultation — in person or virtually — to understand your vision, event goals, date, and budget. No commitment required.</p>
          <div class="pt-tags">
            <span class="pt-tag">Free &amp; obligation-free</span>
            <span class="pt-tag">In-person or virtual</span>
            <span class="pt-tag">Respond within 24hrs</span>
          </div>
        </div>
      </div>

      <div class="pt-step">
        <div class="pt-dot"></div>
        <div class="pt-step-label">
          <span class="pt-step-num">02</span>
          <span class="pt-step-phase">Proposal</span>
        </div>
        <div class="pt-step-body">
          <h4>Tailored Proposal &amp; Agreement</h4>
          <p>We prepare a detailed, itemized proposal outlining our recommended package, services, and transparent pricing. Once you're happy, we sign a service agreement and collect your 50% deposit to secure your date.</p>
          <div class="pt-tags">
            <span class="pt-tag">Itemized quotation</span>
            <span class="pt-tag">Service agreement</span>
            <span class="pt-tag">50% deposit to confirm</span>
          </div>
        </div>
      </div>

      <div class="pt-step">
        <div class="pt-dot"></div>
        <div class="pt-step-label">
          <span class="pt-step-num">03</span>
          <span class="pt-step-phase">Planning</span>
        </div>
        <div class="pt-step-body">
          <h4>Planning &amp; Design</h4>
          <p>We begin the planning work — sourcing and booking trusted vendors, designing the event program, building the timeline, and checking in with you regularly. We keep you informed and in control, without the stress.</p>
          <div class="pt-tags">
            <span class="pt-tag">Vendor sourcing &amp; booking</span>
            <span class="pt-tag">Program design</span>
            <span class="pt-tag">Regular check-ins</span>
          </div>
        </div>
      </div>

      <div class="pt-step">
        <div class="pt-dot"></div>
        <div class="pt-step-label">
          <span class="pt-step-num">04</span>
          <span class="pt-step-phase">Finalisation</span>
        </div>
        <div class="pt-step-body">
          <h4>Final Confirmation &amp; Briefing</h4>
          <p>In the week before your event, we confirm all vendors, finalize the run-of-show, collect the final balance, and brief every supplier. You receive a complete event-day briefing document so everyone knows the plan.</p>
          <div class="pt-tags">
            <span class="pt-tag">Vendor confirmation calls</span>
            <span class="pt-tag">Run-of-show document</span>
            <span class="pt-tag">Balance due 7 days before</span>
          </div>
        </div>
      </div>

      <div class="pt-step">
        <div class="pt-dot"></div>
        <div class="pt-step-label">
          <span class="pt-step-num">05</span>
          <span class="pt-step-phase">Event Day</span>
        </div>
        <div class="pt-step-body">
          <h4>Flawless Execution</h4>
          <p>Our team arrives early, oversees setup, manages vendor arrivals, directs guests, calls the programme, handles every issue discreetly, and ensures every moment runs exactly as planned — so you enjoy every second.</p>
          <div class="pt-tags">
            <span class="pt-tag">Early arrival &amp; setup oversight</span>
            <span class="pt-tag">Full on-day management</span>
            <span class="pt-tag">Post-event wrap-up</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ── FAQ SNIPPET ─────────────────────────────────────────────── -->
<section>
  <div class="faq-snippet">
    <div class="faq-left">
      <span class="section-eyebrow">Quick Answers</span>
      <h2>Common Questions</h2>
      <span class="gold-rule"></span>
      <p>
        Here are the questions we get asked most often. For a full list of FAQs, visit our dedicated page.
      </p>
      <a href="FAQ.HTML" class="btn-gold" style="margin-top:8px;">All FAQs</a>
    </div>
    <div class="faq-right">

      <div class="faq-item-s">
        <button class="faq-q-s">
          Do you offer both full and partial planning services?
          <span>+</span>
        </button>
        <div class="faq-a-s">
          <p>Yes. Our Silver Package is coordination-only, Gold offers partial planning support, Platinum is full end-to-end planning, and Luxury is our bespoke white-glove experience. All packages are customizable.</p>
        </div>
      </div>

      <div class="faq-item-s">
        <button class="faq-q-s">
          Can I use my own vendors?
          <span>+</span>
        </button>
        <div class="faq-a-s">
          <p>Absolutely. If you've already booked vendors, we'll coordinate seamlessly with them. We manage all communication and ensure they're aligned with your timeline and vision.</p>
        </div>
      </div>

      <div class="faq-item-s">
        <button class="faq-q-s">
          How far in advance should I book?
          <span>+</span>
        </button>
        <div class="faq-a-s">
          <p>We recommend 3–6 months ahead to secure top vendors and plan thoroughly. For weddings, 6–12 months is ideal. That said, we do work with shorter timelines — reach out and we'll see what's possible.</p>
        </div>
      </div>

      <div class="faq-item-s">
        <button class="faq-q-s">
          Are vendor costs included in your packages?
          <span>+</span>
        </button>
        <div class="faq-a-s">
          <p>Vendor costs (caterers, photographers, decorators, etc.) are quoted separately and included transparently in your itemized proposal. Our package fees cover our planning and coordination services.</p>
        </div>
      </div>

      <div class="faq-item-s">
        <button class="faq-q-s">
          What areas do you serve?
          <span>+</span>
        </button>
        <div class="faq-a-s">
          <p>We're based in Kampala and serve clients across Uganda — Entebbe, Jinja, Mukono, and beyond. Travel fees may apply for events outside Kampala, and are always disclosed in your quotation upfront.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ── CTA FORM ────────────────────────────────────────────────── -->
<section class="cta-form-section">
  <div class="cta-form-inner">
    <div class="cta-text">
      <span class="section-eyebrow">Start Today</span>
      <h2>Let's bring your <em style="font-style:italic;color:var(--gold-light)">vision</em> to life</h2>
      <p>
        Share a few details and we'll guide you through the next steps — completely stress-free
        and with no obligation.
      </p>
      <div class="cta-contact-items">
        <div class="cta-contact-item">
          <i class="bi bi-whatsapp"></i>
          <a href="https://wa.me/256766436695" target="_blank">Chat on WhatsApp — fast response</a>
        </div>
        <div class="cta-contact-item">
          <i class="bi bi-telephone"></i>
          <a href="tel:+256751282196">+256 751 282 196</a>
        </div>
        <div class="cta-contact-item">
          <i class="bi bi-envelope"></i>
          <a href="mailto:info@dwinevents.com">info@dwinevents.com</a>
        </div>
        <div class="cta-contact-item">
          <i class="bi bi-geo-alt"></i>
          <span>Kampala, Uganda</span>
        </div>
      </div>
    </div>

    <div class="cta-quick-form">
      <h3>Book a Free Consultation</h3>
      <form class="form-f" onsubmit="sendQuickInquiry(event)">
        <input type="text" id="qName" placeholder="Your Full Name *" required>
        <div class="form-row-2">
          <input type="tel" id="qPhone" placeholder="Phone Number *" required>
          <input type="date" id="qDate" required>
        </div>
        <select id="qEvent" required>
          <option value="">Select Event Type *</option>
          <option>Wedding Ceremony</option>
          <option>Introduction / Kwanjula</option>
          <option>Birthday Celebration</option>
          <option>Corporate Event / Conference</option>
          <option>Proposal / Romantic Setup</option>
          <option>Baby Shower / Gender Reveal</option>
          <option>Anniversary</option>
          <option>Private Party / Mini Event</option>
        </select>
        <select id="qPackage">
          <option value="">Interested package (optional)</option>
          <option>Silver — Coordination Only</option>
          <option>Gold — Partial Planning</option>
          <option>Platinum — Full Planning</option>
          <option>Luxury — White-Glove</option>
          <option>Not sure yet</option>
        </select>
        <button type="submit" class="btn-gold" style="width:100%;justify-content:center;">
          <i class="bi bi-whatsapp" style="margin-right:8px;"></i> Submit &amp; Chat on WhatsApp
        </button>
      </form>
    </div>
  </div>
</section>

<!-- ── TESTIMONIALS ────────────────────────────────────────────── -->
<section class="testimonials-strip">
  <div class="testimonials-strip-inner">
    <div style="text-align:center;">
      <span class="section-eyebrow">Client Stories</span>
      <h2 class="section-heading light">What Our Clients Say</h2>
    </div>
    <div class="testimonial-cards-row">
      <div class="t-card">
        <div class="t-stars">★★★★★</div>
        <p class="t-quote">Dwin Events made our wedding absolutely stress-free and beautiful. Every single detail was handled with elegance and professionalism. We couldn't have asked for more.</p>
        <div class="t-author">
          <strong>Kefa &amp; Mulungi</strong>
          <span>Wedding Ceremony, Kampala</span>
        </div>
      </div>
      <div class="t-card">
        <div class="t-stars">★★★★★</div>
        <p class="t-quote">From planning to execution, Dwin Events exceeded every expectation. The décor, coordination, and timing were absolutely perfect. My birthday was a dream come true.</p>
        <div class="t-author">
          <strong>Mary N.</strong>
          <span>Birthday Celebration</span>
        </div>
      </div>
      <div class="t-card">
        <div class="t-stars">★★★★★</div>
        <p class="t-quote">Professional, creative, and incredibly reliable. Both our introduction and wedding were flawlessly organized. Every guest complimented how smooth everything ran. Highly recommended!</p>
        <div class="t-author">
          <strong>Godwin &amp; Rose</strong>
          <span>Introduction &amp; Wedding</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── FOOTER ──────────────────────────────────────────────────── -->
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
        <li><a href="#weddings">Wedding Planning</a></li>
        <li><a href="#introductions">Introductions</a></li>
        <li><a href="#birthdays">Birthdays &amp; Anniversaries</a></li>
        <li><a href="#corporate">Corporate Events</a></li>
        <li><a href="#proposals">Proposals &amp; Mini Events</a></li>
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

<!-- ── SCRIPTS ─────────────────────────────────────────────────── -->
<script>
  // ── NAVBAR SCROLL ────────────────────────────────────────────
  const nav = document.getElementById('mainNav');
  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 40);
  });

  // ── HAMBURGER ────────────────────────────────────────────────
  document.getElementById('hamburger').addEventListener('click', () => {
    document.getElementById('navMenu').classList.toggle('open');
  });

  // ── VIDEO FALLBACK ───────────────────────────────────────────
  const video = document.querySelector('.hero-video');
  const fallback = document.getElementById('heroFallback');
  if (video) {
    video.addEventListener('error', () => {
      video.style.display = 'none';
      if (fallback) fallback.style.display = 'block';
    });
    // If video hasn't loaded after 2s, show image
    setTimeout(() => {
      if (video.readyState === 0) {
        video.style.display = 'none';
        if (fallback) fallback.style.display = 'block';
      }
    }, 2000);
  }

  // ── FAQ ACCORDION ────────────────────────────────────────────
  document.querySelectorAll('.faq-q-s').forEach(btn => {
    btn.addEventListener('click', () => {
      const item = btn.parentElement;
      const isOpen = item.classList.contains('open');
      // Close all
      document.querySelectorAll('.faq-item-s').forEach(i => {
        i.classList.remove('open');
        i.querySelector('.faq-q-s span').textContent = '+';
      });
      // Open clicked (toggle)
      if (!isOpen) {
        item.classList.add('open');
        btn.querySelector('span').textContent = '×';
      }
    });
  });

  // ── QUICK INQUIRY FORM → WHATSAPP ────────────────────────────
  function sendQuickInquiry(e) {
    e.preventDefault();
    const whatsappNumber = "256766436695";
    const name    = document.getElementById("qName").value;
    const phone   = document.getElementById("qPhone").value;
    const date    = document.getElementById("qDate").value;
    const event   = document.getElementById("qEvent").value;
    const pkg     = document.getElementById("qPackage").value;

    const message =
`✨ *NEW SERVICES INQUIRY — DWIN EVENTS*

*Name:* ${name}
*Phone:* ${phone}
*Event Type:* ${event}
*Event Date:* ${date}
*Package Interest:* ${pkg || 'Not specified'}

I'd like to book a free consultation. Please get in touch. Thank you!`;

    window.open(
      `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`,
      "_blank"
    );
  }
</script>

</body>
</html>
