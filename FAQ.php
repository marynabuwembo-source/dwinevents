<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQs — DWIN Events | Frequently Asked Questions</title>
  <meta name="description" content="Frequently asked questions about DWIN Events — Uganda's premier event planning and coordination company. Find answers about our services, packages, and process.">
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
      background: radial-gradient(ellipse at 30% 50%, rgba(201,168,76,0.1) 0%, transparent 60%);
    }
    .page-hero-content { position: relative; z-index: 1; }
    .page-hero-content h1 {
      font-family: var(--font-display);
      font-size: clamp(44px, 6vw, 76px);
      font-weight: 300;
      color: var(--white);
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
    .breadcrumb span { color: var(--gold); }

    /* ── FAQ SECTION ─────────────────────────────────────── */
    .faq-section {
      padding: 100px 48px;
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 280px 1fr;
      gap: 72px;
      align-items: start;
    }

    /* Sidebar */
    .faq-sidebar {
      position: sticky;
      top: 96px;
    }
    .faq-sidebar h3 {
      font-family: var(--font-display);
      font-size: 24px;
      font-weight: 300;
      margin-bottom: 8px;
    }
    .faq-sidebar > p {
      font-size: 13px;
      color: var(--muted);
      line-height: 1.7;
      margin-bottom: 28px;
    }
    .faq-cats {
      list-style: none;
      margin-bottom: 36px;
    }
    .faq-cats li {
      margin-bottom: 2px;
    }
    .faq-cats button {
      width: 100%;
      text-align: left;
      background: none;
      border: 1px solid transparent;
      padding: 10px 14px;
      font-family: var(--font-body);
      font-size: 12px;
      font-weight: 500;
      letter-spacing: 1px;
      color: var(--mid);
      cursor: pointer;
      border-radius: 2px;
      transition: var(--transition);
    }
    .faq-cats button:hover,
    .faq-cats button.active {
      border-color: var(--gold);
      color: var(--gold-dim);
      background: rgba(201,168,76,0.06);
    }

    .faq-contact-box {
      background: var(--charcoal);
      border: 1px solid var(--border);
      padding: 24px;
      text-align: center;
    }
    .faq-contact-box p {
      font-size: 13px;
      color: rgba(255,255,255,0.6);
      margin-bottom: 16px;
      line-height: 1.7;
    }

    /* Accordion */
    .faq-main {}
    .faq-category-label {
      font-family: var(--font-body);
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: var(--gold);
      margin-bottom: 16px;
      margin-top: 48px;
    }
    .faq-category-label:first-child { margin-top: 0; }

    .faq-item {
      border: 1px solid var(--border);
      margin-bottom: 4px;
      transition: var(--transition);
    }
    .faq-item.open {
      border-color: var(--gold);
    }
    .faq-question {
      width: 100%;
      background: none;
      border: none;
      padding: 20px 24px;
      text-align: left;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      cursor: pointer;
      font-family: var(--font-body);
      font-size: 15px;
      font-weight: 400;
      color: var(--charcoal);
      transition: var(--transition);
    }
    .faq-question:hover { color: var(--gold-dim); }
    .faq-item.open .faq-question { color: var(--gold-dim); }
    .faq-icon {
      width: 28px;
      height: 28px;
      border: 1px solid var(--border);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
      flex-shrink: 0;
      color: var(--muted);
      transition: var(--transition);
    }
    .faq-item.open .faq-icon {
      border-color: var(--gold);
      color: var(--gold);
      transform: rotate(45deg);
    }
    .faq-answer {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.4s ease, padding 0.3s ease;
    }
    .faq-item.open .faq-answer {
      max-height: 400px;
    }
    .faq-answer-inner {
      padding: 0 24px 22px;
      font-size: 14px;
      color: var(--mid);
      line-height: 1.85;
      border-top: 1px solid var(--border);
      padding-top: 18px;
    }

    /* ── STILL HAVE QUESTIONS ────────────────────────────── */
    .faq-cta {
      background: var(--charcoal);
      padding: 80px 48px;
      text-align: center;
    }
    .faq-cta h2 {
      font-family: var(--font-display);
      font-size: clamp(32px, 4vw, 52px);
      font-weight: 300;
      color: var(--white);
      margin-bottom: 14px;
    }
    .faq-cta p { color: rgba(255,255,255,0.6); font-size: 15px; margin-bottom: 36px; }
    .faq-cta-btns { display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; }

    @media (max-width: 900px) {
      .faq-section { grid-template-columns: 1fr; gap: 40px; padding: 80px 24px; }
      .faq-sidebar { position: static; }
      .faq-cta { padding: 80px 24px; }
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
      <li><a href="contact.php">Contact</a></li>
      <li><a href="FAQ.php" class="active">FAQs</a></li>
      <li><a href="dashboard.php" class="nav-account-icon" title="Dashboard" aria-label="Dashboard"><i class="bi bi-person-circle"></i></a></li>
    </ul>
    <a href="contact.php" class="nav-cta nav-links">Book Now</a>
  </div>
</nav>

<!-- ── PAGE HERO ──────────────────────────────────────────────── -->
<section class="page-hero">
  <div class="page-hero-content">
    <span class="section-eyebrow">We Have Answers</span>
    <h1>Frequently Asked Questions</h1>
    <div class="breadcrumb">
      <a href="INDEX.php">Home</a>
      <i class="bi bi-chevron-right" style="color:rgba(255,255,255,0.35);font-size:9px;"></i>
      <span>FAQs</span>
    </div>
  </div>
</section>

<!-- ── FAQ CONTENT ───────────────────────────────────────────── -->
<section>
  <div class="faq-section">

    <!-- Sidebar -->
    <div class="faq-sidebar">
      <span class="section-eyebrow">Browse by Topic</span>
      <h3>Find Your Answer</h3>
      <p>Browse our most frequently asked questions below. Can't find what you're looking for? Reach out directly.</p>

      <ul class="faq-cats">
        <li><button class="active" onclick="filterFaq('all', this)"><i class="bi bi-grid-3x3-gap" style="margin-right:8px;"></i> All Questions</button></li>
        <li><button onclick="filterFaq('getting-started', this)"><i class="bi bi-play-circle" style="margin-right:8px;"></i> Getting Started</button></li>
        <li><button onclick="filterFaq('services', this)"><i class="bi bi-calendar-event" style="margin-right:8px;"></i> Our Services</button></li>
        <li><button onclick="filterFaq('packages', this)"><i class="bi bi-box" style="margin-right:8px;"></i> Packages &amp; Pricing</button></li>
        <li><button onclick="filterFaq('process', this)"><i class="bi bi-diagram-3" style="margin-right:8px;"></i> Process &amp; Logistics</button></li>
        <li><button onclick="filterFaq('payment', this)"><i class="bi bi-credit-card" style="margin-right:8px;"></i> Booking &amp; Payment</button></li>
      </ul>

      <div class="faq-contact-box">
        <p>Still have questions? We're happy to help you directly.</p>
        <a href="https://wa.me/256766436695" target="_blank" class="btn-gold" style="font-size:10px;display:block;margin-bottom:10px;">
          <i class="bi bi-whatsapp" style="margin-right:6px;"></i> WhatsApp Us
        </a>
        <a href="contact.html" class="btn-outline-gold" style="font-size:10px;display:block;">
          Send an Inquiry
        </a>
      </div>
    </div>

    <!-- Accordion -->
    <div class="faq-main" id="faqMain">

      <!-- Getting Started -->
      <div class="faq-category-label" data-cat="getting-started">Getting Started</div>

      <div class="faq-item" data-cat="getting-started">
        <button class="faq-question">
          Why should I hire a professional event coordinator?
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            Hiring a professional coordinator ensures expert planning, smooth vendor communication, and stress-free execution. A coordinator handles all the details so you can be fully present and enjoy your special day — without managing logistics, chasing vendors, or troubleshooting problems. The investment pays for itself in peace of mind alone.
          </div>
        </div>
      </div>

      <div class="faq-item" data-cat="getting-started">
        <button class="faq-question">
          How early should I book DWIN Events?
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            We recommend booking at least 3–6 months before your event date. This allows enough time to secure your preferred vendors, plan every detail thoughtfully, and avoid the last-minute rush. For large events like weddings, booking 6–12 months in advance is ideal. That said, we do accommodate shorter timelines — reach out and we'll see what's possible.
          </div>
        </div>
      </div>

      <div class="faq-item" data-cat="getting-started">
        <button class="faq-question">
          Is the initial consultation free?
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            Yes — your first consultation is completely free and comes with no obligation. We use this time to understand your vision, event goals, and budget. From there, we'll prepare a tailored proposal for your review. We want you to be confident in your choice before any commitment is made.
          </div>
        </div>
      </div>

      <!-- Services -->
      <div class="faq-category-label" data-cat="services">Our Services</div>

      <div class="faq-item" data-cat="services">
        <button class="faq-question">
          What types of events do you plan and coordinate?
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            We specialize in a wide range of events including: Weddings, Traditional Introductions / Kwanjula, Birthday Celebrations, Corporate Events &amp; Conferences, Proposals &amp; Romantic Setups, Anniversaries, Baby Showers &amp; Gender Reveals, and Private / Mini Events. If your event isn't listed, contact us — we're flexible and love unique challenges.
          </div>
        </div>
      </div>

      <div class="faq-item" data-cat="services">
        <button class="faq-question">
          Can you plan my event if I already have my own vendors?
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            Absolutely. If you've already secured vendors, we'll work seamlessly with them. We coordinate schedules, manage communications, and ensure every vendor is aligned with your timeline and vision. This is part of our coordination-only service (Silver Package) — perfect for clients who need execution, not sourcing.
          </div>
        </div>
      </div>

      <div class="faq-item" data-cat="services">
        <button class="faq-question">
          What areas do you serve?
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            We are based in Kampala, Uganda and primarily serve clients across the Greater Kampala Metropolitan Area. We also regularly coordinate events in other parts of Uganda, including Entebbe, Jinja, Mukono, and beyond. Travel fees may apply for events outside Kampala — we'll include this transparently in your quotation.
          </div>
        </div>
      </div>

      <div class="faq-item" data-cat="services">
        <button class="faq-question">
          What do you coordinate on a wedding or introduction day?
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            On the event day, we manage everything: vendor arrivals and setup, event timeline execution, guest welcome and seating, program management, vendor supervision throughout, problem-solving (so you never have to), and post-event wrap-up. Our team is your backstage crew — invisible to guests but essential to everything running perfectly.
          </div>
        </div>
      </div>

      <!-- Packages & Pricing -->
      <div class="faq-category-label" data-cat="packages">Packages &amp; Pricing</div>

      <div class="faq-item" data-cat="packages">
        <button class="faq-question">
          Do you offer full and partial planning services?
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            Yes — we offer both. Our Silver Package covers coordination-only (ideal if you've done the planning but need expert day-of management). Our Gold and Platinum packages include varying levels of planning support. The Luxury Package is our fully comprehensive, white-glove experience. All packages are also customizable to your needs.
          </div>
        </div>
      </div>

      <div class="faq-item" data-cat="packages">
        <button class="faq-question">
          Can I customise a package to fit my specific needs?
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            Yes — all our packages are flexible and can be tailored to your vision, event type, and budget. We understand that no two events are the same. During your consultation, we'll discuss what services matter most to you and build a custom plan accordingly. You only pay for what you actually need.
          </div>
        </div>
      </div>

      <div class="faq-item" data-cat="packages">
        <button class="faq-question">
          Are vendor costs included in your package prices?
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            Vendor costs (caterers, photographers, decorators, DJs, etc.) are billed separately unless specifically stated in your package agreement. Our package fees cover our planning and coordination services. We provide you with a transparent, itemized quotation so you always know exactly what you're paying for — no surprises.
          </div>
        </div>
      </div>

      <!-- Process -->
      <div class="faq-category-label" data-cat="process">Process &amp; Logistics</div>

      <div class="faq-item" data-cat="process">
        <button class="faq-question">
          What are event vendors and why do they matter?
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            Event vendors are the service providers who contribute to your event: caterers, photographers, videographers, florists, decorators, DJs, lighting specialists, sound engineers, and more. Their quality and coordination directly impact your event's success. We work with a vetted network of trusted, experienced vendors — and we manage all communication with them on your behalf.
          </div>
        </div>
      </div>

      <div class="faq-item" data-cat="process">
        <button class="faq-question">
          Do you have a network of trusted vendors?
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            Yes. Over the years, we have built strong relationships with a carefully vetted network of professional vendors across Kampala and Uganda — including photographers, caterers, florists, decorators, entertainment providers, and more. We recommend vendors who match your style, budget, and event needs, saving you hours of research and the risk of unreliable suppliers.
          </div>
        </div>
      </div>

      <!-- Booking & Payment -->
      <div class="faq-category-label" data-cat="payment">Booking &amp; Payment</div>

      <div class="faq-item" data-cat="payment">
        <button class="faq-question">
          How do I officially book DWIN Events?
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            The booking process is simple: (1) Submit an inquiry via our contact form or WhatsApp. (2) We schedule a free consultation to understand your event. (3) We prepare and send you a detailed proposal and service agreement. (4) You review and sign the agreement. (5) A 50% deposit secures your date and starts the planning process. It's that simple.
          </div>
        </div>
      </div>

      <div class="faq-item" data-cat="payment">
        <button class="faq-question">
          What are your payment terms?
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            We require a 50% deposit upon signing the service agreement to confirm your booking and secure your event date. The remaining 50% balance is due 7 days before your event. Additional services requested after the initial agreement are billed separately. All payment methods and terms are clearly outlined in your service agreement.
          </div>
        </div>
      </div>

      <div class="faq-item" data-cat="payment">
        <button class="faq-question">
          What is your cancellation or rescheduling policy?
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            We understand that circumstances can change. Our cancellation and rescheduling policy is outlined in detail in your service agreement before you sign. Generally, deposits are non-refundable but can be applied toward a rescheduled event date (subject to availability). We recommend reaching out as early as possible if your plans change — we'll always work to find the best solution for you.
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ── CTA ────────────────────────────────────────────────────── -->
<section class="faq-cta">
  <span class="section-eyebrow">Still Have Questions?</span>
  <h2>We're here to help</h2>
  <p>Can't find the answer you're looking for? Reach out directly — we respond quickly and love to chat about your event.</p>
  <div class="faq-cta-btns">
    <a href="contact.html" class="btn-gold">Send an Inquiry</a>
    <a href="https://wa.me/256766436695" target="_blank" class="btn-outline-gold">
      <i class="bi bi-whatsapp"></i> Chat on WhatsApp
    </a>
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

// Accordion
document.querySelectorAll('.faq-question').forEach(btn => {
  btn.addEventListener('click', () => {
    const item = btn.parentElement;
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(i => {
      i.classList.remove('open');
      i.querySelector('.faq-icon').textContent = '+';
    });
    if (!isOpen) {
      item.classList.add('open');
      btn.querySelector('.faq-icon').textContent = '×';
    }
  });
});

// Filter
function filterFaq(cat, btn) {
  document.querySelectorAll('.faq-cats button').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');

  document.querySelectorAll('.faq-item, .faq-category-label').forEach(el => {
    if (cat === 'all') {
      el.style.display = '';
    } else {
      el.style.display = el.dataset.cat === cat ? '' : 'none';
    }
  });
}
</script>
</body>
</html>
