<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact &amp; Book — DWIN Events | Kampala Uganda</title>
  <meta name="description" content="Book DWIN Events for your next event. Fill our inquiry form and we'll get back to you within 24 hours. Weddings, birthdays, corporate events and more in Kampala, Uganda.">
  <link rel="stylesheet" href="dwin-core.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    .page-hero {
      position: relative;
      height: 45vh;
      min-height: 360px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      margin-top: 72px;
      overflow: hidden;
      background: var(--charcoal);
    }
    .page-hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background: radial-gradient(ellipse at center, rgba(201,168,76,0.12) 0%, transparent 70%);
    }
    .page-hero-content { position: relative; z-index: 1; }
    .page-hero-content h1 {
      font-family: var(--font-display);
      font-size: clamp(44px, 6vw, 76px);
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
    .breadcrumb a { color: rgba(255,255,255,0.5); text-decoration: none; }
    .breadcrumb a:hover { color: var(--gold); }
    .breadcrumb span { color: var(--gold); }

    /* ── CONTACT LAYOUT ──────────────────────────────────── */
    .contact-section {
      padding: 100px 48px;
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 1.5fr;
      gap: 80px;
      align-items: start;
    }

    /* Info Side */
    .contact-info h2 {
      font-family: var(--font-display);
      font-size: 36px;
      font-weight: 300;
      margin-bottom: 12px;
    }
    .contact-info > p {
      color: var(--muted);
      font-size: 15px;
      line-height: 1.8;
      margin-bottom: 40px;
    }

    .contact-card {
      border: 1px solid var(--border);
      padding: 24px;
      margin-bottom: 16px;
      display: flex;
      gap: 20px;
      align-items: flex-start;
      transition: var(--transition);
    }
    .contact-card:hover { border-color: var(--gold); }
    .contact-card-icon {
      width: 44px;
      height: 44px;
      border: 1px solid var(--gold);
      border-radius: 2px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--gold);
      font-size: 18px;
      flex-shrink: 0;
    }
    .contact-card h4 {
      font-family: var(--font-body);
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--muted);
      margin-bottom: 4px;
    }
    .contact-card p {
      font-size: 14px;
      color: var(--charcoal);
    }
    .contact-card a {
      color: var(--charcoal);
      text-decoration: none;
      transition: var(--transition);
    }
    .contact-card a:hover { color: var(--gold); }

    .contact-hours {
      margin-top: 32px;
      padding: 24px;
      background: var(--charcoal);
      border: 1px solid var(--border);
    }
    .contact-hours h4 {
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      color: var(--gold);
      margin-bottom: 16px;
    }
    .hours-row {
      display: flex;
      justify-content: space-between;
      padding: 8px 0;
      border-bottom: 1px solid rgba(255,255,255,0.06);
      font-size: 13px;
      color: rgba(255,255,255,0.65);
    }
    .hours-row:last-child { border-bottom: none; }
    .hours-row span:last-child { color: var(--gold-light); }

    /* Form Side */
    .inquiry-form-wrap {
      background: var(--white);
      border: 1px solid var(--border);
      padding: 48px;
      box-shadow: var(--shadow);
    }
    .inquiry-form-wrap h2 {
      font-family: var(--font-display);
      font-size: 32px;
      font-weight: 300;
      margin-bottom: 6px;
    }
    .inquiry-form-wrap > p {
      color: var(--muted);
      font-size: 13px;
      margin-bottom: 32px;
    }

    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      margin-bottom: 16px;
    }
    .form-field {
      display: flex;
      flex-direction: column;
      gap: 6px;
      margin-bottom: 16px;
    }
    .form-field label {
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--mid);
    }
    .form-field input,
    .form-field select,
    .form-field textarea {
      border: 1px solid #DDD;
      border-radius: 2px;
      padding: 12px 14px;
      font-family: var(--font-body);
      font-size: 14px;
      color: var(--charcoal);
      background: var(--ivory);
      outline: none;
      transition: var(--transition);
      width: 100%;
    }
    .form-field input:focus,
    .form-field select:focus,
    .form-field textarea:focus {
      border-color: var(--gold);
      background: var(--white);
      box-shadow: 0 0 0 3px rgba(201,168,76,0.1);
    }
    .form-field textarea { resize: vertical; min-height: 120px; }
    .form-field select { cursor: pointer; }

    .form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

    .form-note {
      font-size: 12px;
      color: var(--muted);
      margin-bottom: 24px;
      padding: 12px 16px;
      background: rgba(201,168,76,0.06);
      border-left: 2px solid var(--gold);
    }

    .form-submit-row {
      display: flex;
      gap: 12px;
      align-items: center;
      flex-wrap: wrap;
    }

    .btn-whatsapp {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #25D366;
      color: white;
      padding: 14px 24px;
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      border: none;
      border-radius: 2px;
      cursor: pointer;
      text-decoration: none;
      transition: var(--transition);
    }
    .btn-whatsapp:hover { background: #1da851; }

    /* ── WHY BOOK ────────────────────────────────────────── */
    .why-book {
      background: var(--charcoal);
      padding: 80px 48px;
    }
    .why-book-inner {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 40px;
    }
    .why-item {
      display: flex;
      gap: 16px;
      align-items: flex-start;
    }
    .why-item i {
      font-size: 24px;
      color: var(--gold);
      flex-shrink: 0;
      margin-top: 2px;
    }
    .why-item h4 {
      font-family: var(--font-display);
      font-size: 18px;
      font-weight: 400;
      color: var(--white);
      margin-bottom: 6px;
    }
    .why-item p { font-size: 13px; color: rgba(255,255,255,0.55); line-height: 1.7; }

    @media (max-width: 960px) {
      .contact-section { grid-template-columns: 1fr; padding: 80px 24px; gap: 48px; }
      .why-book { padding: 80px 24px; }
      .why-book-inner { grid-template-columns: 1fr; }
    }
    @media (max-width: 600px) {
      .form-row { grid-template-columns: 1fr; }
      .form-grid-2 { grid-template-columns: 1fr; }
      .inquiry-form-wrap { padding: 28px; }
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
      <li><a href="About.php">About</a></li>
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
      <li><a href="contact.php" class="active">Contact</a></li>
      <li><a href="FAQ.php">FAQs</a></li>
      <li><a href="dashboard.php" class="nav-account-icon" title="Dashboard" aria-label="Dashboard"><i class="bi bi-person-circle"></i></a></li>
    </ul>
    <a href="contact.php" class="nav-cta nav-links">Book Now</a>
  </div>
</nav>

<!-- ── PAGE HERO ──────────────────────────────────────────────── -->
<section class="page-hero">
  <div class="page-hero-content">
    <span class="section-eyebrow">Get In Touch</span>
    <h1>Contact &amp; Book</h1>
    <div class="breadcrumb">
      <a href="INDEX.php">Home</a>
      <i class="bi bi-chevron-right" style="color:rgba(255,255,255,0.35);font-size:9px;"></i>
      <span>Contact</span>
    </div>
  </div>
</section>

<!-- ── CONTACT SECTION ───────────────────────────────────────── -->
<section>
  <div class="contact-section">

    <!-- Info Column -->
    <div class="contact-info">
      <span class="section-eyebrow">Reach Out</span>
      <h2>Let's plan your <em style="font-style:italic;color:var(--gold)">perfect</em> event</h2>
      <span class="gold-rule"></span>
      <p>
        Fill in the inquiry form and we'll get back to you within 24 hours to discuss your event,
        answer questions, and schedule a free consultation. You can also reach us directly via
        WhatsApp for a faster response.
      </p>

      <div class="contact-card">
        <div class="contact-card-icon"><i class="bi bi-telephone"></i></div>
        <div>
          <h4>Phone &amp; WhatsApp</h4>
          <p><a href="tel:+256751282196">+256 751 282 196</a></p>
          <p><a href="https://wa.me/256766436695" target="_blank" style="color:var(--gold);">Chat on WhatsApp →</a></p>
        </div>
      </div>

      <div class="contact-card">
        <div class="contact-card-icon"><i class="bi bi-envelope"></i></div>
        <div>
          <h4>Email</h4>
          <p><a href="mailto:info@dwinevents.com">info@dwinevents.com</a></p>
          <p style="font-size:12px;color:var(--muted);margin-top:4px;">We respond within 24 hours</p>
        </div>
      </div>

      <div class="contact-card">
        <div class="contact-card-icon"><i class="bi bi-geo-alt"></i></div>
        <div>
          <h4>Location</h4>
          <p>Kampala, Uganda</p>
          <p style="font-size:12px;color:var(--muted);margin-top:4px;">Serving clients across Uganda &amp; beyond</p>
        </div>
      </div>

      <div class="contact-hours">
        <h4>Business Hours</h4>
        <div class="hours-row"><span>Monday – Friday</span><span>8:00 AM – 6:00 PM</span></div>
        <div class="hours-row"><span>Saturday</span><span>9:00 AM – 5:00 PM</span></div>
        <div class="hours-row"><span>Sunday</span><span>By appointment</span></div>
        <div class="hours-row"><span>WhatsApp</span><span>Available anytime</span></div>
      </div>
    </div>

    <!-- Form Column -->
    <div class="inquiry-form-wrap">
      <span class="section-eyebrow">Inquiry Form</span>
      <h2>Tell us about your event</h2>
      <p>Complete the form below and we'll prepare a personalized proposal for you.</p>

      <form id="eventForm">
        <div class="form-grid-2">
          <div class="form-field">
            <label>First Name *</label>
            <input type="text" id="firstName" placeholder="e.g. Sarah" required>
          </div>
          <div class="form-field">
            <label>Last Name *</label>
            <input type="text" id="lastName" placeholder="e.g. Nakato" required>
          </div>
        </div>

        <div class="form-grid-2">
          <div class="form-field">
            <label>Email Address *</label>
            <input type="email" id="email" placeholder="your@email.com" required>
          </div>
          <div class="form-field">
            <label>Phone Number *</label>
            <input type="tel" id="phone" placeholder="+256 700 000 000" required>
          </div>
        </div>

        <div class="form-grid-2">
          <div class="form-field">
            <label>Event Type *</label>
            <select id="eventType" required>
              <option value="">Select event type</option>
              <option>Wedding Ceremony</option>
              <option>Introduction / Kwanjula</option>
              <option>Birthday Celebration</option>
              <option>Corporate Event / Conference</option>
              <option>Proposal / Romantic Setup</option>
              <option>Baby Shower / Gender Reveal</option>
              <option>Anniversary</option>
              <option>Private Party / Mini Event</option>
              <option>Other</option>
            </select>
          </div>
          <div class="form-field">
            <label>Fiancé's Name (if applicable)</label>
            <input type="text" id="fiance" placeholder="Partner's name">
          </div>
        </div>

        <div class="form-grid-2">
          <div class="form-field">
            <label>Estimated Guest Count *</label>
            <input type="number" id="guests" placeholder="e.g. 150" required min="1">
          </div>
          <div class="form-field">
            <label>Estimated Budget (UGX)</label>
            <input type="text" id="budget" placeholder="e.g. UGX 5,000,000">
          </div>
        </div>

        <div class="form-grid-2">
          <div class="form-field">
            <label>Event Date *</label>
            <input type="date" id="eventDate" required>
          </div>
          <div class="form-field">
            <label>Package Interested In</label>
            <select id="package">
              <option value="">Select a package</option>
              <option>Silver — Coordination Only (from UGX 600,000)</option>
              <option>Gold — Partial Planning (from UGX 1,200,000)</option>
              <option>Platinum — Full Planning (from UGX 2,500,000)</option>
              <option>Luxury — White-Glove (Custom Pricing)</option>
              <option>Not sure yet — need guidance</option>
            </select>
          </div>
        </div>

        <div class="form-field">
          <label>Event Venue / Location</label>
          <input type="text" id="address" placeholder="e.g. Kampala Serena Hotel or to be decided">
        </div>

        <div class="form-field">
          <label>Tell Us About Your Event</label>
          <textarea id="details" placeholder="Share your vision, theme, special requirements, or any details that will help us plan the perfect event for you..."></textarea>
        </div>

        <div class="form-note">
          <strong style="color:var(--gold-dim);">How we respond:</strong> After submission, you'll be redirected to WhatsApp where your details will be pre-filled. We'll review and reply within 24 hours with a personalized plan. Consultations are free and obligation-free.
        </div>

        <div class="form-submit-row">
          <button type="submit" class="btn-gold" style="font-size:11px;padding:15px 28px;">
            Submit Inquiry
          </button>
          <a href="https://wa.me/256766436695" target="_blank" class="btn-whatsapp">
            <i class="bi bi-whatsapp"></i> Chat Directly
          </a>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- ── WHY BOOK ───────────────────────────────────────────────── -->
<section class="why-book">
  <div style="text-align:center;margin-bottom:56px;">
    <span class="section-eyebrow">Why Choose Us</span>
    <h2 class="section-heading light">Booking with Confidence</h2>
  </div>
  <div class="why-book-inner">
    <div class="why-item">
      <i class="bi bi-chat-dots"></i>
      <div>
        <h4>Free Consultation</h4>
        <p>Your first consultation is completely free with no obligation. We'll understand your vision before you commit to anything.</p>
      </div>
    </div>
    <div class="why-item">
      <i class="bi bi-shield-check"></i>
      <div>
        <h4>Transparent Pricing</h4>
        <p>No hidden costs. We provide a clear, detailed quotation before any agreement — so you always know exactly what you're paying for.</p>
      </div>
    </div>
    <div class="why-item">
      <i class="bi bi-calendar-check"></i>
      <div>
        <h4>Secure Your Date</h4>
        <p>A 50% deposit secures your event date. The balance is due 7 days before your event — simple and stress-free.</p>
      </div>
    </div>
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
      <form class="footer-newsletter" onsubmit="return false;">
        <input type="email" placeholder="Your email address">
        <button type="submit">Subscribe</button>
      </form>
      <div class="footer-socials">
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

<style>
  /* ── SUCCESS OVERLAY ──────────────────────────────────── */
  .success-overlay {
    position: fixed;
    inset: 0;
    background: rgba(26,24,20,0.88);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.4s ease;
    backdrop-filter: blur(6px);
  }
  .success-overlay.show {
    opacity: 1;
    pointer-events: all;
  }
  .success-box {
    background: #FAF6EE;
    border: 1px solid rgba(201,168,76,0.4);
    border-top: 4px solid #C9A84C;
    padding: 56px 48px;
    text-align: center;
    max-width: 480px;
    width: 90%;
    border-radius: 4px;
    box-shadow: 0 24px 80px rgba(0,0,0,0.5);
    transform: translateY(20px);
    transition: transform 0.4s ease;
  }
  .success-overlay.show .success-box {
    transform: translateY(0);
  }
  .success-check {
    width: 68px;
    height: 68px;
    background: linear-gradient(135deg, #7a5e20, #C9A84C);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    font-size: 28px;
    color: #fff;
  }
  .success-box h2 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 32px;
    font-weight: 300;
    color: #1A1814;
    margin-bottom: 10px;
  }
  .success-box p {
    font-size: 14px;
    color: #8C8478;
    line-height: 1.7;
    margin-bottom: 28px;
  }
  .success-box .btn-gold-sm {
    display: inline-block;
    background: #C9A84C;
    color: #1A1814;
    font-family: 'Jost', sans-serif;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    padding: 13px 28px;
    border-radius: 2px;
    text-decoration: none;
    cursor: pointer;
    border: none;
    transition: background 0.3s;
  }
  .success-box .btn-gold-sm:hover { background: #E8C97E; }
  .success-note {
    font-size: 11px;
    color: #8C8478;
    margin-top: 16px;
  }
  .success-note i { color: #25D366; }
</style>

<!-- ── SUCCESS OVERLAY (hidden by default) ───────────────────── -->
<div class="success-overlay" id="successOverlay">
  <div class="success-box">
    <div class="success-check"><i class="bi bi-check-lg"></i></div>
    <h2>Message Sent!</h2>
    <p>
      Thank you for reaching out to <strong>DWIN Events</strong>. Your inquiry has been received and we'll get back to you within 24 hours with a personalised plan.<br><br>
      A WhatsApp conversation will also open so we can respond to you directly.
    </p>
    <button class="btn-gold-sm" onclick="closeSuccess()">Back to Home</button>
    <p class="success-note"><i class="bi bi-whatsapp"></i> &nbsp;Opening WhatsApp for you…</p>
  </div>
</div>

<script>
const nav = document.getElementById('mainNav');
window.addEventListener('scroll', () => nav.classList.toggle('scrolled', window.scrollY > 40));
document.getElementById('hamburger').addEventListener('click', () => {
  document.getElementById('navMenu').classList.toggle('open');
});

function closeSuccess() {
  document.getElementById('successOverlay').classList.remove('show');
}

function saveInquiryToStorage(data) {
  try {
    const existing = JSON.parse(localStorage.getItem('dwin_inquiries') || '[]');
    existing.push({ ...data, read: false, time: new Date().toISOString() });
    localStorage.setItem('dwin_inquiries', JSON.stringify(existing));
  } catch(e) {
    console.warn('Could not save inquiry to storage:', e);
  }
}

document.getElementById("eventForm").addEventListener("submit", function(e) {
  e.preventDefault();

  const whatsappNumber = "256766436695";
  const firstName = document.getElementById("firstName").value.trim();
  const lastName  = document.getElementById("lastName").value.trim();
  const email     = document.getElementById("email").value.trim();
  const phone     = document.getElementById("phone").value.trim();
  const eventType = document.getElementById("eventType").value;
  const fiance    = document.getElementById("fiance").value.trim();
  const guests    = document.getElementById("guests").value.trim();
  const budget    = document.getElementById("budget").value.trim();
  const eventDate = document.getElementById("eventDate").value;
  const pkg       = document.getElementById("package").value;
  const venue     = document.getElementById("address").value.trim();
  const details   = document.getElementById("details").value.trim();

  // 1 — Save inquiry to localStorage so dashboard can pick it up
  saveInquiryToStorage({
    firstName, lastName, email, phone,
    eventType, guests, budget,
    eventDate, venue, details,
    fiance, // Optional field
  });

  // 2 — Build WhatsApp message
  const message =
`✨ *NEW EVENT INQUIRY — DWIN EVENTS* ✨

*Client Details*
Name: ${firstName} ${lastName}
Email: ${email}
Phone: ${phone}

*Event Details*
Event Type: ${eventType}${fiance ? `\nPartner/Fiancé: ${fiance}` : ''}
Event Date: ${eventDate}
Guest Count: ${guests}
Budget: ${budget}
Venue: ${venue}
Package Interest: ${pkg}

*About the Event:*
${details}

_Submitted via dwinevents.com contact form_`;

  // 3 — Show success overlay first
  document.getElementById('successOverlay').classList.add('show');

  // 4 — Open WhatsApp after short delay (so overlay is visible)
  setTimeout(() => {
    window.open(`https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`, '_blank');
  }, 1200);

  // 5 — Reset form
  this.reset();
});
</script>
</body>
</html>
