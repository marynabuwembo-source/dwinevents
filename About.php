<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us — DWIN Events | Kampala Event Planners</title>
  <meta name="description" content="Learn about DWIN Events — Kampala's trusted event planning and coordination company. Our story, mission, and the team behind your perfect event.">
  <link rel="stylesheet" href="dwin-core.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    /* ── PAGE HERO ───────────────────────────────────────── */
    .page-hero {
      position: relative;
      height: 55vh;
      min-height: 400px;
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
    }
    .page-hero::after {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(26,24,20,0.65);
    }
    .page-hero-content {
      position: relative;
      z-index: 1;
    }
    .page-hero-content h1 {
      font-family: var(--font-display);
      font-size: clamp(48px, 7vw, 80px);
      font-weight: 300;
      color: var(--white);
      line-height: 1.1;
    }
    .breadcrumb {
      display: flex;
      align-items: center;
      gap: 8px;
      justify-content: center;
      margin-top: 16px;
      font-size: 11px;
      letter-spacing: 2px;
      text-transform: uppercase;
    }
    .breadcrumb a { color: rgba(255,255,255,0.6); text-decoration: none; }
    .breadcrumb a:hover { color: var(--gold); }
    .breadcrumb span { color: var(--gold); }

    /* ── ABOUT MAIN ──────────────────────────────────────── */
    .about-main {
      max-width: 1200px;
      margin: 0 auto;
      padding: 100px 48px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 80px;
      align-items: center;
    }
    .about-main-image {
      position: relative;
    }
    .about-main-image img {
      width: 100%;
      height: 580px;
      object-fit: cover;
      display: block;
    }
    .about-main-image::before {
      content: '';
      position: absolute;
      top: -16px;
      left: -16px;
      right: 16px;
      bottom: 16px;
      border: 1px solid var(--border);
      z-index: -1;
    }
    .about-main-text p {
      color: var(--mid);
      font-size: 15px;
      line-height: 1.85;
      margin-bottom: 20px;
    }

    /* ── MISSION / VISION ────────────────────────────────── */
    .mission-section {
      background: var(--charcoal);
      padding: 100px 48px;
    }
    .mission-grid {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 48px;
    }
    .mission-card {
      padding: 40px 36px;
      border: 1px solid var(--border);
      transition: var(--transition);
    }
    .mission-card:hover {
      border-color: var(--gold);
      background: rgba(201,168,76,0.04);
    }
    .mission-icon {
      font-size: 32px;
      color: var(--gold);
      margin-bottom: 20px;
      display: block;
    }
    .mission-card h3 {
      font-family: var(--font-display);
      font-size: 24px;
      font-weight: 400;
      color: var(--white);
      margin-bottom: 14px;
    }
    .mission-card p {
      font-size: 14px;
      color: rgba(255,255,255,0.6);
      line-height: 1.8;
    }

    /* ── VALUES ──────────────────────────────────────────── */
    .values-section {
      padding: 100px 48px;
      max-width: 1200px;
      margin: 0 auto;
    }
    .values-header { margin-bottom: 64px; }
    .values-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 2px;
    }
    .value-item {
      padding: 40px 28px;
      border: 1px solid var(--border);
      transition: var(--transition);
      text-align: center;
    }
    .value-item:hover { border-color: var(--gold); transform: translateY(-4px); box-shadow: var(--shadow-gold); }
    .value-item i {
      font-size: 28px;
      color: var(--gold);
      display: block;
      margin-bottom: 16px;
    }
    .value-item h4 {
      font-family: var(--font-display);
      font-size: 19px;
      font-weight: 400;
      margin-bottom: 10px;
    }
    .value-item p { font-size: 13px; color: var(--muted); line-height: 1.7; }

    /* ── PROCESS DETAIL ──────────────────────────────────── */
    .process-detail {
      background: var(--charcoal);
      padding: 100px 48px;
    }
    .process-detail-inner {
      max-width: 1200px;
      margin: 0 auto;
    }
    .process-detail-header { text-align: center; margin-bottom: 72px; }
    .process-cards {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 24px;
    }
    .process-card {
      padding: 36px;
      border: 1px solid var(--border);
      display: flex;
      gap: 24px;
      transition: var(--transition);
    }
    .process-card:hover { border-color: var(--gold); }
    .process-card-num {
      font-family: var(--font-display);
      font-size: 52px;
      font-weight: 300;
      color: rgba(201,168,76,0.25);
      line-height: 1;
      flex-shrink: 0;
    }
    .process-card h4 {
      font-family: var(--font-display);
      font-size: 20px;
      font-weight: 400;
      color: var(--white);
      margin-bottom: 10px;
    }
    .process-card p { font-size: 13px; color: rgba(255,255,255,0.55); line-height: 1.75; }

    /* ── EVENTS WE HANDLE ────────────────────────────────── */
    .events-list-section {
      padding: 100px 48px;
      max-width: 1200px;
      margin: 0 auto;
    }
    .events-list-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 48px;
      align-items: center;
      margin-top: 64px;
    }
    .events-list ul {
      list-style: none;
    }
    .events-list ul li {
      display: flex;
      align-items: center;
      gap: 16px;
      padding: 16px 0;
      border-bottom: 1px solid var(--border);
      font-size: 15px;
      transition: var(--transition);
    }
    .events-list ul li:hover { padding-left: 8px; color: var(--gold-dim); }
    .events-list ul li i { color: var(--gold); font-size: 16px; }
    .events-img img { width: 100%; height: 440px; object-fit: cover; }

    /* ── CTA ─────────────────────────────────────────────── */
    .about-cta {
      background: var(--ivory);
      padding: 80px 48px;
      text-align: center;
      border-top: 1px solid var(--border);
    }
    .about-cta h2 {
      font-family: var(--font-display);
      font-size: clamp(32px, 4vw, 52px);
      font-weight: 300;
      margin-bottom: 16px;
    }
    .about-cta p { color: var(--muted); font-size: 16px; margin-bottom: 36px; }
    .about-cta-btns { display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; }

    @media (max-width: 900px) {
      .about-main { grid-template-columns: 1fr; gap: 48px; padding: 80px 24px; }
      .mission-section { padding: 80px 24px; }
      .mission-grid { grid-template-columns: 1fr; gap: 24px; }
      .values-section { padding: 80px 24px; }
      .values-grid { grid-template-columns: repeat(2, 1fr); }
      .process-detail { padding: 80px 24px; }
      .process-cards { grid-template-columns: 1fr; }
      .events-list-section { padding: 80px 24px; }
      .events-list-grid { grid-template-columns: 1fr; }
    }
    @media (max-width: 580px) {
      .values-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<nav class="dwin-nav" id="mainNav">
  <a href="INDEX.php" class="nav-brand">DWIN EVENTS</a>
  <button class="nav-hamburger" id="hamburger"><span></span><span></span><span></span></button>
  <div class="nav-menu" id="navMenu">
    <ul class="nav-links">
      <li><a href="INDEX.php">Home</a></li>
      <li><a href="About.php" class="active">About</a></li>
      <li class="nav-dropdown">
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

<!-- ── PAGE HERO ──────────────────────────────────────────────── -->
<section class="page-hero">
  <img src="MORE PICS/KAR_4631.JPG" alt="DWIN Events">
  <div class="page-hero-content">
    <span class="section-eyebrow">Who We Are</span>
    <h1>About DWIN Events</h1>
    <div class="breadcrumb">
      <a href="INDEX.php">Home</a>
      <i class="bi bi-chevron-right" style="color:rgba(255,255,255,0.35);font-size:9px;"></i>
      <span>About</span>
    </div>
  </div>
</section>

<!-- ── ABOUT MAIN ─────────────────────────────────────────────── -->
<section>
  <div class="about-main">
    <div class="about-main-image">
      <img src="MORE PICS/KAR_4631.JPG" alt="DWIN Events team">
    </div>
    <div class="about-main-text">
      <span class="section-eyebrow">Our Story</span>
      <h2 class="section-heading">Creating <em style="font-style:italic;color:var(--gold)">extraordinary</em> events</h2>
      <span class="gold-rule"></span>
      <p>
        DWIN Events is a professional event planning and coordination company committed to
        creating unforgettable experiences with elegance and precision. Founded in Kampala, Uganda,
        we have grown into one of the region's most trusted names in event management.
      </p>
      <p>
        We work closely with every client to deeply understand their vision, culture, and expectations —
        then plan meticulously within their budget, ensuring every detail is thoughtfully considered
        without ever compromising quality.
      </p>
      <p>
        We collaborate with a carefully vetted network of experienced service providers to deliver
        seamless, well-organized events. From concept development to full event-day coordination,
        we take care of every detail, allowing you to relax and truly enjoy your special occasion.
      </p>
      <p>
        Whether it's a wedding, traditional ceremony, corporate conference, or intimate gathering —
        our goal is to exceed expectations and transform meaningful moments into lasting memories.
      </p>
      <div style="margin-top:36px;display:flex;gap:16px;flex-wrap:wrap;">
        <a href="contact.html" class="btn-gold">Book a Consultation</a>
        <a href="Services.html" class="btn-outline-gold">Our Services</a>
      </div>
    </div>
  </div>
</section>

<!-- ── MISSION / VISION / VALUES ─────────────────────────────── -->
<section class="mission-section">
  <div style="text-align:center;margin-bottom:64px;">
    <span class="section-eyebrow">What Drives Us</span>
    <h2 class="section-heading light">Mission, Vision &amp; Promise</h2>
  </div>
  <div class="mission-grid">
    <div class="mission-card">
      <i class="bi bi-bullseye mission-icon"></i>
      <h3>Our Mission</h3>
      <p>To turn your special moments into extraordinary experiences. We focus on precision, creativity, and personalized planning — ensuring every detail reflects your unique style, personality, and vision.</p>
    </div>
    <div class="mission-card">
      <i class="bi bi-eye mission-icon"></i>
      <h3>Our Vision</h3>
      <p>To be East Africa's most trusted and celebrated event planning company — known for transforming dreams into reality with warmth, elegance, and impeccable execution for every client we serve.</p>
    </div>
    <div class="mission-card">
      <i class="bi bi-shield-check mission-icon"></i>
      <h3>Our Promise</h3>
      <p>We promise a stress-free planning journey and a flawlessly executed event day. Your satisfaction is our measure of success, and we never rest until your celebration exceeds every expectation.</p>
    </div>
  </div>
</section>

<!-- ── VALUES ────────────────────────────────────────────────── -->
<section class="values-section">
  <div class="values-header">
    <span class="section-eyebrow">Our Core Values</span>
    <h2 class="section-heading">What We Stand For</h2>
    <span class="gold-rule"></span>
  </div>
  <div class="values-grid">
    <div class="value-item">
      <i class="bi bi-stars"></i>
      <h4>Excellence</h4>
      <p>We pursue the highest standards in every detail, from the first consultation to the final farewell.</p>
    </div>
    <div class="value-item">
      <i class="bi bi-people"></i>
      <h4>Personalization</h4>
      <p>Every event is unique. We listen deeply and tailor every element to reflect your individual story.</p>
    </div>
    <div class="value-item">
      <i class="bi bi-lock"></i>
      <h4>Integrity</h4>
      <p>We are honest, transparent, and reliable. You can trust us with your most important moments.</p>
    </div>
    <div class="value-item">
      <i class="bi bi-lightbulb"></i>
      <h4>Creativity</h4>
      <p>We bring fresh ideas and creative solutions to make your event stand out and be truly memorable.</p>
    </div>
  </div>
</section>

<!-- ── PROCESS ───────────────────────────────────────────────── -->
<section class="process-detail">
  <div class="process-detail-inner">
    <div class="process-detail-header">
      <span class="section-eyebrow">How It Works</span>
      <h2 class="section-heading light">The DWIN Experience</h2>
      <span class="gold-rule" style="margin:20px auto;"></span>
      <p style="color:rgba(255,255,255,0.55);max-width:500px;margin:0 auto;">From your first conversation to the final celebration, here's how we bring your event to life.</p>
    </div>
    <div class="process-cards">
      <div class="process-card">
        <div class="process-card-num">01</div>
        <div>
          <h4>Timeline Management</h4>
          <p>We plan and manage your complete event schedule with precision, ensuring every moment runs on time so you can be fully present and enjoy every second without worry.</p>
        </div>
      </div>
      <div class="process-card">
        <div class="process-card-num">02</div>
        <div>
          <h4>Guest Management</h4>
          <p>From arrival to departure, we handle guest coordination, registration, seating arrangements, and overall comfort — ensuring every person feels welcomed and valued.</p>
        </div>
      </div>
      <div class="process-card">
        <div class="process-card-num">03</div>
        <div>
          <h4>Vendor Coordination</h4>
          <p>We work with our trusted network of experienced service providers — caterers, photographers, decorators, DJs — coordinating every detail so everything integrates seamlessly.</p>
        </div>
      </div>
      <div class="process-card">
        <div class="process-card-num">04</div>
        <div>
          <h4>Event-Day Coordination</h4>
          <p>Our dedicated team manages everything on your event day. From setup to teardown, we are your backstage crew ensuring every element is executed exactly as planned.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── EVENTS WE HANDLE ───────────────────────────────────────── -->
<section class="events-list-section">
  <div>
    <span class="section-eyebrow">Our Expertise</span>
    <h2 class="section-heading">Events We Handle</h2>
    <span class="gold-rule"></span>
    <p style="color:var(--muted);margin-top:4px;">We specialize in a wide range of celebrations — each one planned with the same dedication to excellence.</p>
  </div>
  <div class="events-list-grid">
    <div class="events-list">
      <ul>
        <li><i class="bi bi-gem"></i> Wedding Ceremonies</li>
        <li><i class="bi bi-house-heart"></i> Introductions / Kwanjula</li>
        <li><i class="bi bi-briefcase"></i> Corporate Events &amp; Conferences</li>
        <li><i class="bi bi-balloon"></i> Birthday Celebrations</li>
        <li><i class="bi bi-heart"></i> Anniversaries</li>
        <li><i class="bi bi-stars"></i> Proposals &amp; Romantic Setups</li>
        <li><i class="bi bi-gift"></i> Baby Showers &amp; Gender Reveals</li>
        <li><i class="bi bi-people"></i> Private Parties &amp; Mini Events</li>
      </ul>
    </div>
    <div class="events-img">
      <img src="MORE PICS/KAR_4638.JPG" alt="Events we handle">
    </div>
  </div>
</section>

<!-- ── WHY CHOOSE US ──────────────────────────────────────────── -->
<section style="background:var(--charcoal);padding:80px 48px;">
  <div style="max-width:1200px;margin:0 auto;text-align:center;margin-bottom:56px;">
    <span class="section-eyebrow">Why DWIN Events</span>
    <h2 class="section-heading light">What Sets Us Apart</h2>
  </div>
  <div style="max-width:1200px;margin:0 auto;display:grid;grid-template-columns:repeat(3,1fr);gap:32px;">
    <div style="display:flex;gap:20px;align-items:flex-start;">
      <div style="width:44px;height:44px;border:1px solid var(--gold);border-radius:2px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
        <i class="bi bi-wallet2" style="color:var(--gold);font-size:18px;"></i>
      </div>
      <div>
        <h4 style="font-family:var(--font-display);font-size:18px;font-weight:400;color:var(--white);margin-bottom:8px;">Budget-Conscious Planning</h4>
        <p style="font-size:13px;color:rgba(255,255,255,0.55);line-height:1.75;">We plan within your budget without compromising quality, finding creative solutions at every step.</p>
      </div>
    </div>
    <div style="display:flex;gap:20px;align-items:flex-start;">
      <div style="width:44px;height:44px;border:1px solid var(--gold);border-radius:2px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
        <i class="bi bi-patch-check" style="color:var(--gold);font-size:18px;"></i>
      </div>
      <div>
        <h4 style="font-family:var(--font-display);font-size:18px;font-weight:400;color:var(--white);margin-bottom:8px;">Trusted Vendor Network</h4>
        <p style="font-size:13px;color:rgba(255,255,255,0.55);line-height:1.75;">We work with vetted, reliable service providers who share our commitment to excellence and professionalism.</p>
      </div>
    </div>
    <div style="display:flex;gap:20px;align-items:flex-start;">
      <div style="width:44px;height:44px;border:1px solid var(--gold);border-radius:2px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
        <i class="bi bi-emoji-smile" style="color:var(--gold);font-size:18px;"></i>
      </div>
      <div>
        <h4 style="font-family:var(--font-display);font-size:18px;font-weight:400;color:var(--white);margin-bottom:8px;">Stress-Free Experience</h4>
        <p style="font-size:13px;color:rgba(255,255,255,0.55);line-height:1.75;">From concept to close, we handle every detail so you enjoy every moment fully and worry-free.</p>
      </div>
    </div>
  </div>
</section>

<!-- ── CTA ────────────────────────────────────────────────────── -->
<section class="about-cta">
  <span class="section-eyebrow">Ready to Begin?</span>
  <h2>Let's plan something <em style="font-style:italic;color:var(--gold)">beautiful</em> together</h2>
  <p>Book a free, no-obligation consultation and let's start turning your vision into reality.</p>
  <div class="about-cta-btns">
    <a href="contact.html" class="btn-gold">Book a Consultation</a>
    <a href="Services.html" class="btn-outline-gold">View Our Services</a>
  </div>
</section>

<!-- ── FOOTER ─────────────────────────────────────────────────── -->
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
      <div class="footer-socials" style="margin-top:16px;">
        <a href="https://instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
        <a href="https://twitter.com" target="_blank"><i class="bi bi-twitter-x"></i></a>
        <a href="https://wa.me/256751282196" target="_blank"><i class="bi bi-whatsapp"></i></a>
        <a href="https://facebook.com/dwineventsuganda" target="_blank"><i class="bi bi-facebook"></i></a>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <p>© 2026 DWIN Events. All rights reserved. Kampala, Uganda.</p>
    <p>Keeping it simple, within budget.</p>
  </div>
</footer>

<script>
const nav = document.getElementById('mainNav');
window.addEventListener('scroll', () => nav.classList.toggle('scrolled', window.scrollY > 40));
document.getElementById('hamburger').addEventListener('click', () => {
  document.getElementById('navMenu').classList.toggle('open');
});
</script>
</body>
</html>
