
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DWIN Events — Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Jost:wght@300;400;500;600&display=swap');

    :root {
      --gold:        #C9A84C;
      --gold-light:  #E8C97E;
      --gold-dim:    #7a5e20;
      --charcoal:    #1A1814;
      --charcoal-2:  #221F1A;
      --charcoal-3:  #2C2820;
      --mid:         #4A4540;
      --muted:       #8C8478;
      --ivory:       #FAF6EE;
      --border:      rgba(201,168,76,0.18);
      --sidebar-w:   260px;
      --font-d:      'Cormorant Garamond', serif;
      --font-b:      'Jost', sans-serif;
      --success:     #4CAF50;
      --warning:     #FF9800;
      --danger:      #F44336;
      --info:        #2196F3;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { font-size: 14px; }

    body {
      font-family: var(--font-b);
      background: var(--charcoal);
      color: rgba(255,255,255,0.85);
      display: flex;
      min-height: 100vh;
      overflow-x: hidden;
    }

    /* ── TOAST ───────────────────────────────────────────── */
    #toast-container {
      position: fixed;
      bottom: 32px;
      right: 32px;
      z-index: 9999;
      display: flex;
      flex-direction: column;
      gap: 10px;
      pointer-events: none;
    }
    .toast {
      background: var(--charcoal-3);
      border: 1px solid var(--border);
      border-left: 3px solid var(--gold);
      border-radius: 4px;
      padding: 14px 20px 14px 16px;
      min-width: 300px;
      max-width: 380px;
      display: flex;
      align-items: flex-start;
      gap: 12px;
      pointer-events: all;
      box-shadow: 0 8px 32px rgba(0,0,0,0.4);
      animation: toastIn 0.35s ease forwards;
    }
    .toast.toast-success { border-left-color: var(--success); }
    .toast.toast-error   { border-left-color: var(--danger); }
    .toast.toast-info    { border-left-color: var(--info); }
    .toast.toast-out     { animation: toastOut 0.3s ease forwards; }
    .toast-icon { font-size: 18px; margin-top: 1px; flex-shrink: 0; }
    .toast.toast-success .toast-icon { color: var(--success); }
    .toast.toast-error .toast-icon   { color: var(--danger); }
    .toast.toast-info .toast-icon    { color: var(--info); }
    .toast-title { font-size: 13px; font-weight: 600; margin-bottom: 3px; color: rgba(255,255,255,0.95); }
    .toast-msg   { font-size: 12px; color: rgba(255,255,255,0.6); line-height: 1.5; }
    @keyframes toastIn  { from { opacity:0; transform:translateX(20px); } to { opacity:1; transform:translateX(0); } }
    @keyframes toastOut { from { opacity:1; transform:translateX(0); } to { opacity:0; transform:translateX(20px); } }

    /* ── SIDEBAR ─────────────────────────────────────────── */
    .sidebar {
      position: fixed;
      top: 0; left: 0; bottom: 0;
      width: var(--sidebar-w);
      background: var(--charcoal-2);
      border-right: 1px solid var(--border);
      display: flex;
      flex-direction: column;
      z-index: 100;
      transition: transform 0.3s ease;
    }

    .sidebar-brand {
      padding: 28px 24px;
      border-bottom: 1px solid var(--border);
    }
    .sidebar-brand h1 {
      font-family: var(--font-d);
      font-size: 22px;
      font-weight: 600;
      color: var(--gold);
      letter-spacing: 1px;
    }
    .sidebar-brand span {
      font-size: 10px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--muted);
    }

    .sidebar-nav {
      flex: 1;
      padding: 20px 0;
      overflow-y: auto;
    }

    .nav-section-label {
      font-size: 9px;
      font-weight: 600;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: var(--muted);
      padding: 16px 24px 8px;
    }

    .nav-item {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 11px 24px;
      color: rgba(255,255,255,0.55);
      text-decoration: none;
      font-size: 13px;
      font-weight: 400;
      cursor: pointer;
      transition: all 0.2s;
      border-left: 2px solid transparent;
      border-right: none;
      background: none;
      width: 100%;
      text-align: left;
    }
    .nav-item:hover { color: rgba(255,255,255,0.85); background: rgba(255,255,255,0.03); }
    .nav-item.active {
      color: var(--gold);
      background: rgba(201,168,76,0.08);
      border-left-color: var(--gold);
    }
    .nav-item i { font-size: 16px; width: 20px; }

    .nav-badge {
      margin-left: auto;
      background: var(--gold);
      color: var(--charcoal);
      font-size: 10px;
      font-weight: 700;
      padding: 2px 7px;
      border-radius: 10px;
    }
    .nav-badge.badge-red {
      background: var(--danger);
      color: #fff;
    }

    .sidebar-footer {
      padding: 20px 24px;
      border-top: 1px solid var(--border);
    }
    .user-chip {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .user-avatar {
      width: 36px; height: 36px;
      background: var(--gold-dim);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: var(--font-d);
      font-size: 16px;
      color: var(--gold-light);
      flex-shrink: 0;
    }
    .user-info strong { display: block; font-size: 13px; font-weight: 500; }
    .user-info span { font-size: 11px; color: var(--muted); }

    /* ── MAIN ────────────────────────────────────────────── */
    .main {
      margin-left: var(--sidebar-w);
      flex: 1;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* ── TOPBAR ──────────────────────────────────────────── */
    .topbar {
      height: 64px;
      background: var(--charcoal-2);
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 32px;
      position: sticky;
      top: 0;
      z-index: 50;
    }

    .topbar-left h2 { font-family: var(--font-d); font-size: 20px; font-weight: 300; }
    .topbar-left span { font-size: 11px; color: var(--muted); }

    .topbar-right {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .topbar-search {
      display: flex;
      align-items: center;
      gap: 8px;
      background: rgba(255,255,255,0.04);
      border: 1px solid var(--border);
      border-radius: 4px;
      padding: 8px 14px;
    }
    .topbar-search input {
      background: none;
      border: none;
      outline: none;
      color: rgba(255,255,255,0.8);
      font-family: var(--font-b);
      font-size: 12px;
      width: 180px;
    }
    .topbar-search input::placeholder { color: var(--muted); }
    .topbar-search i { color: var(--muted); font-size: 14px; }

    .topbar-btn {
      width: 36px; height: 36px;
      background: rgba(255,255,255,0.04);
      border: 1px solid var(--border);
      border-radius: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      color: rgba(255,255,255,0.6);
      font-size: 16px;
      transition: all 0.2s;
      position: relative;
    }
    .topbar-btn:hover { border-color: var(--gold); color: var(--gold); }
    .topbar-notif .notif-dot {
      position: absolute;
      top: 6px; right: 6px;
      width: 7px; height: 7px;
      background: var(--danger);
      border-radius: 50%;
      border: 2px solid var(--charcoal-2);
      display: none;
    }
    .topbar-notif .notif-dot.active { display: block; }

    /* ── CONTENT ─────────────────────────────────────────── */
    .content { padding: 32px; flex: 1; }

    /* Panels */
    .panel { display: none; }
    .panel.active { display: block; }

    /* ── STAT CARDS ──────────────────────────────────────── */
    .stats-row {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      margin-bottom: 28px;
    }
    .stat-card {
      background: var(--charcoal-3);
      border: 1px solid var(--border);
      padding: 24px;
      border-radius: 4px;
      transition: all 0.25s;
    }
    .stat-card:hover { border-color: var(--gold); transform: translateY(-2px); }
    .stat-card-top {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 16px;
    }
    .stat-icon {
      width: 40px; height: 40px;
      border: 1px solid var(--border);
      border-radius: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      color: var(--gold);
    }
    .stat-badge {
      font-size: 11px;
      font-weight: 500;
      padding: 3px 8px;
      border-radius: 10px;
    }
    .badge-up   { background: rgba(76,175,80,0.15);  color: var(--success); }
    .badge-down { background: rgba(244,67,54,0.15);  color: var(--danger); }
    .stat-num {
      font-family: var(--font-d);
      font-size: 36px;
      font-weight: 300;
      color: var(--ivory);
      line-height: 1;
      margin-bottom: 4px;
    }
    .stat-label {
      font-size: 11px;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: var(--muted);
    }

    /* ── GRID LAYOUT ─────────────────────────────────────── */
    .grid-2 {
      display: grid;
      grid-template-columns: 1.6fr 1fr;
      gap: 20px;
      margin-bottom: 20px;
    }
    .grid-3 {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 20px;
    }

    /* ── CARD ────────────────────────────────────────────── */
    .card {
      background: var(--charcoal-3);
      border: 1px solid var(--border);
      border-radius: 4px;
      overflow: hidden;
    }
    .card-header {
      padding: 18px 24px;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .card-title {
      font-family: var(--font-d);
      font-size: 17px;
      font-weight: 400;
    }
    .card-action {
      font-size: 11px;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: var(--gold);
      cursor: pointer;
      background: none;
      border: none;
      font-family: var(--font-b);
    }
    .card-body { padding: 24px; }

    /* ── EVENTS TABLE ────────────────────────────────────── */
    .events-table { width: 100%; border-collapse: collapse; }
    .events-table th {
      font-size: 9px;
      font-weight: 600;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      color: var(--muted);
      text-align: left;
      padding: 0 12px 14px 0;
      border-bottom: 1px solid var(--border);
    }
    .events-table td {
      padding: 14px 12px 14px 0;
      border-bottom: 1px solid rgba(255,255,255,0.04);
      font-size: 13px;
      color: rgba(255,255,255,0.8);
      vertical-align: middle;
    }
    .events-table tr:last-child td { border-bottom: none; }
    .events-table tr:hover td { background: rgba(255,255,255,0.015); }

    .event-client { display: flex; align-items: center; gap: 10px; }
    .client-avatar {
      width: 30px; height: 30px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--gold-dim), var(--gold));
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      font-weight: 600;
      color: var(--charcoal);
      flex-shrink: 0;
    }

    .status-pill {
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 1px;
      padding: 3px 10px;
      border-radius: 20px;
      white-space: nowrap;
    }
    .status-confirmed  { background: rgba(76,175,80,0.12);  color: #4CAF50; }
    .status-pending    { background: rgba(255,152,0,0.12);  color: #FF9800; }
    .status-planning   { background: rgba(33,150,243,0.12); color: #2196F3; }
    .status-completed  { background: rgba(201,168,76,0.12); color: var(--gold); }
    .status-cancelled  { background: rgba(244,67,54,0.12);  color: #F44336; }
    .status-new        { background: rgba(156,39,176,0.12); color: #CE93D8; }

    .action-icon {
      background: none;
      border: 1px solid var(--border);
      color: rgba(255,255,255,0.5);
      width: 28px; height: 28px;
      border-radius: 3px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      font-size: 13px;
      transition: all 0.2s;
      margin-right: 3px;
    }
    .action-icon:hover { border-color: var(--gold); color: var(--gold); }

    /* ── CHART BARS ──────────────────────────────────────── */
    .chart-wrap {
      display: flex;
      align-items: flex-end;
      gap: 8px;
      height: 140px;
      margin-bottom: 12px;
    }
    .bar-col {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 4px;
      height: 100%;
      justify-content: flex-end;
    }
    .bar {
      width: 100%;
      border-radius: 2px 2px 0 0;
      background: rgba(201,168,76,0.25);
      transition: height 0.8s ease, background 0.2s;
      cursor: pointer;
    }
    .bar:hover { background: var(--gold); }
    .bar-label { font-size: 10px; color: var(--muted); margin-top: 8px; }
    .bar-val   { font-size: 10px; color: var(--gold); font-weight: 500; }

    /* ── DONUT CHART ─────────────────────────────────────── */
    .donut-wrap { display: flex; align-items: center; gap: 24px; }
    .donut-svg { flex-shrink: 0; }
    .donut-legend { flex: 1; }
    .legend-item {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 10px;
      font-size: 12px;
    }
    .legend-dot { width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0; }
    .legend-item span:last-child { margin-left: auto; font-weight: 600; color: rgba(255,255,255,0.8); }

    /* ── TIMELINE ────────────────────────────────────────── */
    .timeline { list-style: none; }
    .timeline-item {
      display: flex;
      gap: 16px;
      margin-bottom: 20px;
      position: relative;
    }
    .timeline-item::before {
      content: '';
      position: absolute;
      left: 17px; top: 36px; bottom: -20px;
      width: 1px;
      background: var(--border);
    }
    .timeline-item:last-child::before { display: none; }
    .tl-dot {
      width: 34px; height: 34px;
      border-radius: 50%;
      border: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 14px;
      flex-shrink: 0;
      background: var(--charcoal);
    }
    .tl-dot.gold  { border-color: var(--gold);  color: var(--gold); }
    .tl-dot.blue  { border-color: #2196F3; color: #2196F3; }
    .tl-dot.green { border-color: #4CAF50; color: #4CAF50; }
    .tl-name  { font-size: 13px; font-weight: 500; margin-bottom: 3px; }
    .tl-meta  { font-size: 11px; color: var(--muted); }
    .tl-date  { margin-left: auto; font-size: 11px; color: var(--gold); white-space: nowrap; }

    /* ── TASKS ───────────────────────────────────────────── */
    .task-item {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px 0;
      border-bottom: 1px solid rgba(255,255,255,0.04);
    }
    .task-item:last-child { border-bottom: none; }
    .task-check {
      width: 18px; height: 18px;
      border: 1px solid var(--border);
      border-radius: 3px;
      flex-shrink: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.2s;
    }
    .task-check:hover { border-color: var(--gold); }
    .task-check.done { background: var(--gold); border-color: var(--gold); }
    .task-check.done i { color: var(--charcoal); font-size: 11px; }
    .task-text { flex: 1; font-size: 13px; }
    .task-text.done-text { text-decoration: line-through; color: var(--muted); }
    .task-event { font-size: 11px; color: var(--muted); margin-top: 2px; }
    .task-priority { font-size: 10px; padding: 2px 7px; border-radius: 10px; }
    .pri-high   { background: rgba(244,67,54,0.12);  color: #F44336; }
    .pri-medium { background: rgba(255,152,0,0.12);  color: #FF9800; }
    .pri-low    { background: rgba(76,175,80,0.12);  color: #4CAF50; }

    /* ── QUICK ACTIONS ───────────────────────────────────── */
    .quick-actions {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
    }
    .qa-btn {
      background: rgba(255,255,255,0.03);
      border: 1px solid var(--border);
      border-radius: 4px;
      padding: 16px;
      display: flex;
      align-items: center;
      gap: 12px;
      cursor: pointer;
      transition: all 0.2s;
      text-decoration: none;
    }
    .qa-btn:hover { border-color: var(--gold); background: rgba(201,168,76,0.06); }
    .qa-btn i { font-size: 20px; color: var(--gold); }
    .qa-btn span { font-size: 12px; font-weight: 500; color: rgba(255,255,255,0.8); }

    /* ── REVENUE BAR ─────────────────────────────────────── */
    .revenue-row { display: flex; align-items: center; gap: 12px; margin-bottom: 14px; }
    .revenue-label { width: 80px; font-size: 12px; color: var(--muted); }
    .revenue-bar-wrap { flex: 1; background: rgba(255,255,255,0.06); border-radius: 2px; height: 8px; }
    .revenue-bar-fill { height: 100%; border-radius: 2px; background: var(--gold); }
    .revenue-amount { font-size: 12px; font-weight: 500; color: rgba(255,255,255,0.8); width: 90px; text-align: right; }

    /* ── CLIENTS PANEL ───────────────────────────────────── */
    .client-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
    }
    .client-card {
      background: var(--charcoal-3);
      border: 1px solid var(--border);
      border-radius: 4px;
      padding: 24px;
      text-align: center;
      transition: all 0.2s;
    }
    .client-card:hover { border-color: var(--gold); }
    .client-card-avatar {
      width: 56px; height: 56px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--gold-dim), var(--gold));
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: var(--font-d);
      font-size: 24px;
      color: var(--charcoal);
      margin: 0 auto 14px;
    }
    .client-card-name { font-family: var(--font-d); font-size: 18px; font-weight: 400; margin-bottom: 4px; }
    .client-card-event { font-size: 11px; color: var(--gold); letter-spacing: 1px; }
    .client-card-date { font-size: 12px; color: var(--muted); margin: 8px 0 14px; }
    .client-card-actions { display: flex; gap: 8px; justify-content: center; }

    /* ── FORM PANEL ──────────────────────────────────────── */
    .booking-form .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      margin-bottom: 16px;
    }
    .form-group label {
      display: block;
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--muted);
      margin-bottom: 6px;
    }
    .form-group input,
    .form-group select,
    .form-group textarea {
      width: 100%;
      background: rgba(255,255,255,0.04);
      border: 1px solid var(--border);
      border-radius: 3px;
      padding: 10px 14px;
      color: rgba(255,255,255,0.85);
      font-family: var(--font-b);
      font-size: 13px;
      outline: none;
      transition: border-color 0.2s;
    }
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus { border-color: var(--gold); }
    .form-group select option { background: var(--charcoal-3); }
    .form-group textarea { resize: vertical; min-height: 100px; }

    .btn-primary-dash {
      background: var(--gold);
      color: var(--charcoal);
      border: none;
      padding: 11px 24px;
      font-family: var(--font-b);
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 2px;
      text-transform: uppercase;
      border-radius: 3px;
      cursor: pointer;
      transition: all 0.2s;
    }
    .btn-primary-dash:hover { background: var(--gold-light); }
    .btn-secondary-dash {
      background: transparent;
      color: rgba(255,255,255,0.6);
      border: 1px solid var(--border);
      padding: 11px 20px;
      font-family: var(--font-b);
      font-size: 11px;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      border-radius: 3px;
      cursor: pointer;
      transition: all 0.2s;
    }
    .btn-secondary-dash:hover { border-color: rgba(255,255,255,0.3); color: rgba(255,255,255,0.8); }
    .btn-whatsapp-dash {
      background: #25D366;
      color: #fff;
      border: none;
      padding: 11px 20px;
      font-family: var(--font-b);
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      border-radius: 3px;
      cursor: pointer;
      transition: all 0.2s;
      display: inline-flex;
      align-items: center;
      gap: 7px;
    }
    .btn-whatsapp-dash:hover { background: #1da851; }

    /* ── BOOKINGS FILTER BAR ─────────────────────────────── */
    .filter-bar {
      display: flex;
      gap: 8px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }
    .filter-pill {
      font-size: 11px;
      font-weight: 500;
      letter-spacing: 1px;
      padding: 6px 14px;
      border-radius: 20px;
      border: 1px solid var(--border);
      background: transparent;
      color: rgba(255,255,255,0.55);
      cursor: pointer;
      transition: all 0.2s;
      font-family: var(--font-b);
    }
    .filter-pill:hover { border-color: var(--gold); color: var(--gold); }
    .filter-pill.active { background: var(--gold); color: var(--charcoal); border-color: var(--gold); font-weight: 700; }

    /* ── INQUIRIES PANEL ─────────────────────────────────── */
    .inquiry-card {
      background: var(--charcoal-3);
      border: 1px solid var(--border);
      border-radius: 4px;
      padding: 20px 24px;
      margin-bottom: 14px;
      display: flex;
      gap: 20px;
      align-items: flex-start;
      transition: all 0.2s;
    }
    .inquiry-card:hover { border-color: var(--gold); }
    .inquiry-card.inquiry-new { border-left: 3px solid #CE93D8; }
    .inquiry-card.inquiry-conflict { border-left: 3px solid #FF6B6B; background: rgba(255,107,107,0.06); }
    .inquiry-avatar {
      width: 44px; height: 44px;
      border-radius: 50%;
      background: linear-gradient(135deg, #4a3a8a, #7c5cbf);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: var(--font-d);
      font-size: 18px;
      color: #CE93D8;
      flex-shrink: 0;
    }
    .inquiry-body { flex: 1; min-width: 0; }
    .inquiry-name { font-size: 14px; font-weight: 600; margin-bottom: 4px; }
    .inquiry-meta { font-size: 12px; color: var(--muted); margin-bottom: 8px; display: flex; gap: 16px; flex-wrap: wrap; }
    .inquiry-detail { font-size: 12px; color: rgba(255,255,255,0.55); line-height: 1.6; }
    .inquiry-actions { display: flex; gap: 8px; margin-top: 12px; }
    .inquiry-time { font-size: 11px; color: var(--muted); white-space: nowrap; }
    .inquiry-empty {
      text-align: center;
      padding: 64px 24px;
      color: var(--muted);
    }
    .inquiry-empty i { font-size: 40px; display: block; margin-bottom: 12px; color: var(--border); }

    /* ── MOBILE ──────────────────────────────────────────── */
    @media (max-width: 1100px) {
      .stats-row { grid-template-columns: repeat(2, 1fr); }
      .grid-2 { grid-template-columns: 1fr; }
      .grid-3 { grid-template-columns: 1fr; }
      .client-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 768px) {
      .sidebar { transform: translateX(-100%); }
      .sidebar.open { transform: translateX(0); }
      .main { margin-left: 0; }
      .stats-row { grid-template-columns: 1fr; }
      .client-grid { grid-template-columns: 1fr; }
      .booking-form .form-row { grid-template-columns: 1fr; }
      #toast-container { bottom: 16px; right: 16px; left: 16px; }
      .toast { min-width: unset; }
    }
  </style>
</head>
<body>

<!-- ── TOAST CONTAINER ───────────────────────────────────────── -->
<div id="toast-container"></div>

<!-- ── SIDEBAR ───────────────────────────────────────────────── -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-brand">
    <h1>DWIN</h1>
    <span>Events Admin Panel</span>
  </div>

  <nav class="sidebar-nav">
    <div class="nav-section-label">Overview</div>
    <button class="nav-item active" onclick="showPanel('dashboard', this)">
      <i class="bi bi-grid-1x2"></i> Dashboard
    </button>
    <button class="nav-item" onclick="showPanel('bookings', this)">
      <i class="bi bi-calendar-event"></i> Bookings
      <span class="nav-badge" id="bookingsBadge">6</span>
    </button>

    <div class="nav-section-label">Management</div>
    <button class="nav-item" onclick="showPanel('clients', this)">
      <i class="bi bi-people"></i> Clients
    </button>
    <button class="nav-item" onclick="showPanel('new-booking', this)">
      <i class="bi bi-plus-circle"></i> New Booking
    </button>
    <button class="nav-item" onclick="showPanel('inquiries', this)">
      <i class="bi bi-inbox"></i> Inquiries
      <span class="nav-badge badge-red" id="inquiriesBadge" style="display:none;">0</span>
    </button>
    <button class="nav-item" onclick="showPanel('tasks', this)">
      <i class="bi bi-check2-square"></i> Tasks &amp; To-Dos
    </button>

    <div class="nav-section-label">Business</div>
    <button class="nav-item" onclick="showPanel('revenue', this)">
      <i class="bi bi-graph-up"></i> Revenue
    </button>
    <button class="nav-item" onclick="showPanel('vendors', this)">
      <i class="bi bi-shop"></i> Vendors
    </button>

    <div class="nav-section-label">Tools</div>
    <a class="nav-item" href="INDEX.php" target="_blank">
      <i class="bi bi-box-arrow-up-right"></i> View Website
    </a>
    <a class="nav-item" href="https://wa.me/256766436695" target="_blank">
      <i class="bi bi-whatsapp"></i> WhatsApp Inbox
    </a>
  </nav>

  <div class="sidebar-footer">
    <div class="user-chip">
      <div class="user-avatar">D</div>
      <div class="user-info">
        <strong>DWIN Events</strong>
        <span>Administrator</span>
      </div>
    </div>
  </div>
</aside>

<!-- ── MAIN ──────────────────────────────────────────────────── -->
<div class="main">

  <!-- Topbar -->
  <div class="topbar">
    <div class="topbar-left">
      <h2 id="panelTitle">Dashboard</h2>
      <span id="panelSub">Overview — May 2026</span>
    </div>
    <div class="topbar-right">
      <div class="topbar-search">
        <i class="bi bi-search"></i>
        <input id="searchInput" type="text" placeholder="Search clients, events...">
      </div>
      <button class="topbar-btn topbar-notif" onclick="showPanel('inquiries', null)" title="New Inquiries">
        <i class="bi bi-bell"></i>
        <span class="notif-dot" id="notifDot"></span>
      </button>
      <button class="topbar-btn" id="sidebarToggle"><i class="bi bi-list"></i></button>
    </div>
  </div>

  <div class="content">

    <!-- ══════ DASHBOARD PANEL ══════ -->
    <div class="panel active" id="panel-dashboard">

      <div class="stats-row">
        <div class="stat-card">
          <div class="stat-card-top">
            <div class="stat-icon"><i class="bi bi-calendar-check"></i></div>
            <span class="stat-badge badge-up">↑ 12%</span>
          </div>
          <div class="stat-num" id="statEvents">24</div>
          <div class="stat-label">Events This Year</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-top">
            <div class="stat-icon"><i class="bi bi-hourglass-split"></i></div>
            <span class="stat-badge badge-up">↑ 3</span>
          </div>
          <div class="stat-num" id="statUpcoming">7</div>
          <div class="stat-label">Upcoming Events</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-top">
            <div class="stat-icon"><i class="bi bi-people"></i></div>
            <span class="stat-badge badge-up">↑ 8%</span>
          </div>
          <div class="stat-num" id="statClients">38</div>
          <div class="stat-label">Total Clients</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-top">
            <div class="stat-icon"><i class="bi bi-cash-coin"></i></div>
            <span class="stat-badge badge-up">↑ 22%</span>
          </div>
          <div class="stat-num">42M</div>
          <div class="stat-label">Revenue YTD (UGX)</div>
        </div>
      </div>

      <div class="grid-2">
        <div class="card">
          <div class="card-header">
            <span class="card-title">Upcoming Events</span>
            <button class="card-action" onclick="showPanel('bookings', document.querySelector('[onclick*=bookings]'))">View All</button>
          </div>
          <div class="card-body" style="padding:0 24px;">
            <table class="events-table">
              <thead>
                <tr>
                  <th>Client</th>
                  <th>Event</th>
                  <th>Date</th>
                  <th>Package</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
                  <tbody id="upcomingEventsBody"></tbody>
            </table>
          </div>
        </div>

        <div style="display:flex;flex-direction:column;gap:20px;">
          <div class="card">
            <div class="card-header"><span class="card-title">This Week</span></div>
            <div class="card-body">
              <ul class="timeline">
                <li class="timeline-item">
                  <div class="tl-dot gold"><i class="bi bi-gem"></i></div>
                  <div class="tl-content">
                    <div class="tl-name">Agnes Introduction</div>
                    <div class="tl-meta">Venue: Speke Resort</div>
                  </div>
                  <div class="tl-date">Jun 14</div>
                </li>
                <li class="timeline-item">
                  <div class="tl-dot blue"><i class="bi bi-telephone"></i></div>
                  <div class="tl-content">
                    <div class="tl-name">Kefa — Final Call</div>
                    <div class="tl-meta">Vendor confirmation</div>
                  </div>
                  <div class="tl-date">Jun 16</div>
                </li>
                <li class="timeline-item">
                  <div class="tl-dot green"><i class="bi bi-briefcase"></i></div>
                  <div class="tl-content">
                    <div class="tl-name">David Corporate</div>
                    <div class="tl-meta">Contract signing</div>
                  </div>
                  <div class="tl-date">Jun 19</div>
                </li>
              </ul>
            </div>
          </div>

          <div class="card">
            <div class="card-header"><span class="card-title">Quick Actions</span></div>
            <div class="card-body">
              <div class="quick-actions">
                <button class="qa-btn" onclick="showPanel('new-booking', null)">
                  <i class="bi bi-plus-circle"></i>
                  <span>New Booking</span>
                </button>
                <a class="qa-btn" href="https://wa.me/256766436695" target="_blank">
                  <i class="bi bi-whatsapp"></i>
                  <span>WhatsApp</span>
                </a>
                <button class="qa-btn" onclick="showPanel('clients', null)">
                  <i class="bi bi-person-plus"></i>
                  <span>Clients</span>
                </button>
                <button class="qa-btn" onclick="showPanel('inquiries', null)">
                  <i class="bi bi-inbox"></i>
                  <span>Inquiries</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="grid-3">
        <div class="card">
          <div class="card-header"><span class="card-title">Monthly Revenue (UGX)</span></div>
          <div class="card-body">
            <div class="chart-wrap" id="revenueChart"></div>
            <div style="display:flex;justify-content:space-between;font-size:11px;color:var(--muted);">
              <span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span><span>May</span><span>Jun</span>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header"><span class="card-title">Events by Type</span></div>
          <div class="card-body">
            <div class="donut-wrap">
              <svg class="donut-svg" width="100" height="100" viewBox="0 0 100 100" id="donutChart">
                <circle cx="50" cy="50" r="38" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="14"/>
              </svg>
              <div class="donut-legend" id="donutLegend"></div>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <span class="card-title">Open Tasks</span>
            <button class="card-action" onclick="showPanel('tasks', null)">All Tasks</button>
          </div>
          <div class="card-body" style="padding:16px 24px;">
            <div class="task-item">
              <div class="task-check" onclick="toggleTask(this)"><i class="bi bi-check2"></i></div>
              <div><div class="task-text">Confirm photographer — Kefa Wedding</div><div class="task-event">Due Jun 18</div></div>
              <span class="task-priority pri-high">High</span>
            </div>
            <div class="task-item">
              <div class="task-check done" onclick="toggleTask(this)"><i class="bi bi-check2"></i></div>
              <div><div class="task-text done-text">Send quotation — Agnes</div><div class="task-event">Done</div></div>
              <span class="task-priority pri-medium">Med</span>
            </div>
            <div class="task-item">
              <div class="task-check" onclick="toggleTask(this)"><i class="bi bi-check2"></i></div>
              <div><div class="task-text">Finalize menu — David Corp</div><div class="task-event">Due Jun 22</div></div>
              <span class="task-priority pri-medium">Med</span>
            </div>
            <div class="task-item">
              <div class="task-check" onclick="toggleTask(this)"><i class="bi bi-check2"></i></div>
              <div><div class="task-text">Site visit — Godwin &amp; Rose</div><div class="task-event">Due Jun 30</div></div>
              <span class="task-priority pri-low">Low</span>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /dashboard -->

    <!-- ══════ BOOKINGS PANEL ══════ -->
    <div class="panel" id="panel-bookings">
      <div class="filter-bar">
        <button class="filter-pill active" onclick="filterBookings('all', this)">All</button>
        <button class="filter-pill" onclick="filterBookings('Confirmed', this)">Confirmed</button>
        <button class="filter-pill" onclick="filterBookings('Pending', this)">Pending</button>
        <button class="filter-pill" onclick="filterBookings('Planning', this)">Planning</button>
        <button class="filter-pill" onclick="filterBookings('Completed', this)">Completed</button>
        <button class="filter-pill" onclick="filterBookings('Cancelled', this)">Cancelled</button>
      </div>
      <div class="card">
        <div class="card-header">
          <span class="card-title">All Bookings</span>
          <button class="btn-primary-dash" onclick="showPanel('new-booking', null)">+ New Booking</button>
        </div>
        <div class="card-body" style="padding:0 24px; overflow-x:auto;">
          <table class="events-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Client</th>
                <th>Event Type</th>
                <th>Event Date</th>
                <th>Venue</th>
                <th>Package</th>
                <th>Amount (UGX)</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="bookingsTableBody">
              <tr data-status="Confirmed">
                <td>#001</td>
                <td><div class="event-client"><div class="client-avatar">KM</div>Kefa &amp; Mulungi</div></td>
                <td>Wedding</td>
                <td>Jun 21, 2026</td>
                <td>Speke Resort</td>
                <td>Platinum</td>
                <td>3,500,000</td>
                <td><span class="status-pill status-confirmed">Confirmed</span></td>
                <td>
                  <button class="action-icon" onclick="openWhatsApp('256700000000','Kefa & Mulungi','Wedding','Jun 21, 2026')" title="WhatsApp"><i class="bi bi-whatsapp"></i></button>
                  <button class="action-icon"><i class="bi bi-pencil"></i></button>
                  <button class="action-icon" style="color:#F44336;" onclick="deleteRow(this)"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              <tr data-status="Planning">
                <td>#002</td>
                <td><div class="event-client"><div class="client-avatar">AN</div>Agnes N.</div></td>
                <td>Introduction</td>
                <td>Jun 14, 2026</td>
                <td>Munyonyo Resort</td>
                <td>Gold</td>
                <td>1,800,000</td>
                <td><span class="status-pill status-planning">Planning</span></td>
                <td>
                  <button class="action-icon" onclick="openWhatsApp('256711111111','Agnes N.','Introduction','Jun 14, 2026')" title="WhatsApp"><i class="bi bi-whatsapp"></i></button>
                  <button class="action-icon"><i class="bi bi-pencil"></i></button>
                  <button class="action-icon" style="color:#F44336;" onclick="deleteRow(this)"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              <tr data-status="Pending">
                <td>#003</td>
                <td><div class="event-client"><div class="client-avatar">DK</div>David K.</div></td>
                <td>Corporate</td>
                <td>Jun 28, 2026</td>
                <td>Imperial Royale</td>
                <td>Silver</td>
                <td>900,000</td>
                <td><span class="status-pill status-pending">Pending</span></td>
                <td>
                  <button class="action-icon" onclick="openWhatsApp('256722222222','David K.','Corporate','Jun 28, 2026')" title="WhatsApp"><i class="bi bi-whatsapp"></i></button>
                  <button class="action-icon"><i class="bi bi-pencil"></i></button>
                  <button class="action-icon" style="color:#F44336;" onclick="deleteRow(this)"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              <tr data-status="Confirmed">
                <td>#004</td>
                <td><div class="event-client"><div class="client-avatar">GR</div>Godwin &amp; Rose</div></td>
                <td>Wedding</td>
                <td>Jul 5, 2026</td>
                <td>Lake Victoria Serena</td>
                <td>Luxury</td>
                <td>6,000,000</td>
                <td><span class="status-pill status-confirmed">Confirmed</span></td>
                <td>
                  <button class="action-icon" onclick="openWhatsApp('256733333333','Godwin & Rose','Wedding','Jul 5, 2026')" title="WhatsApp"><i class="bi bi-whatsapp"></i></button>
                  <button class="action-icon"><i class="bi bi-pencil"></i></button>
                  <button class="action-icon" style="color:#F44336;" onclick="deleteRow(this)"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              <tr data-status="Planning">
                <td>#005</td>
                <td><div class="event-client"><div class="client-avatar">MN</div>Mary N.</div></td>
                <td>Birthday</td>
                <td>Jul 12, 2026</td>
                <td>TBD</td>
                <td>Gold</td>
                <td>1,200,000</td>
                <td><span class="status-pill status-planning">Planning</span></td>
                <td>
                  <button class="action-icon" onclick="openWhatsApp('256744444444','Mary N.','Birthday','Jul 12, 2026')" title="WhatsApp"><i class="bi bi-whatsapp"></i></button>
                  <button class="action-icon"><i class="bi bi-pencil"></i></button>
                  <button class="action-icon" style="color:#F44336;" onclick="deleteRow(this)"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              <tr data-status="Completed">
                <td>#006</td>
                <td><div class="event-client"><div class="client-avatar">PO</div>Peter O.</div></td>
                <td>Anniversary</td>
                <td>May 5, 2026</td>
                <td>Sheraton Hotel</td>
                <td>Silver</td>
                <td>750,000</td>
                <td><span class="status-pill status-completed">Completed</span></td>
                <td>
                  <button class="action-icon" onclick="openWhatsApp('256755555555','Peter O.','Anniversary','May 5, 2026')" title="WhatsApp"><i class="bi bi-whatsapp"></i></button>
                  <button class="action-icon"><i class="bi bi-pencil"></i></button>
                  <button class="action-icon" style="color:#F44336;" onclick="deleteRow(this)"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- ══════ CLIENTS PANEL ══════ -->
    <div class="panel" id="panel-clients">
      <div class="client-grid" id="clientGrid"></div>
    </div>

    <!-- ══════ NEW BOOKING PANEL ══════ -->
    <div class="panel" id="panel-new-booking">
      <div class="card">
        <div class="card-header">
          <span class="card-title">Add New Booking</span>
        </div>
        <div class="card-body booking-form">
          <div class="form-row">
            <div class="form-group">
              <label>Client First Name *</label>
              <input type="text" id="bf-firstName" placeholder="First name">
            </div>
            <div class="form-group">
              <label>Client Last Name *</label>
              <input type="text" id="bf-lastName" placeholder="Last name">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Phone Number *</label>
              <input type="tel" id="bf-phone" placeholder="+256 700 000 000">
            </div>
            <div class="form-group">
              <label>Email Address</label>
              <input type="email" id="bf-email" placeholder="client@email.com">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Event Type *</label>
              <select id="bf-eventType">
                <option>Wedding Ceremony</option>
                <option>Introduction / Kwanjula</option>
                <option>Birthday Celebration</option>
                <option>Corporate Event</option>
                <option>Proposal / Romantic Setup</option>
                <option>Baby Shower / Gender Reveal</option>
                <option>Anniversary</option>
                <option>Private Party / Mini Event</option>
              </select>
            </div>
            <div class="form-group">
              <label>Event Date *</label>
              <input type="date" id="bf-date">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Package</label>
              <select id="bf-package">
                <option value="Silver">Silver — Coordination Only</option>
                <option value="Gold">Gold — Partial Planning</option>
                <option value="Platinum">Platinum — Full Planning</option>
                <option value="Luxury">Luxury — White-Glove</option>
              </select>
            </div>
            <div class="form-group">
              <label>Agreed Amount (UGX)</label>
              <input type="number" id="bf-amount" placeholder="e.g. 1200000">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Venue / Location</label>
              <input type="text" id="bf-venue" placeholder="e.g. Speke Resort, Munyonyo">
            </div>
            <div class="form-group">
              <label>Status</label>
              <select id="bf-status">
                <option>Pending</option>
                <option>Confirmed</option>
                <option>Planning</option>
                <option>Completed</option>
                <option>Cancelled</option>
              </select>
            </div>
          </div>
          <div class="form-group" style="margin-bottom:24px;">
            <label>Event Notes</label>
            <textarea id="bf-notes" placeholder="Special requests, theme, requirements, vendor preferences..."></textarea>
          </div>
          <div style="display:flex;gap:12px;flex-wrap:wrap;">
            <button class="btn-primary-dash" id="saveBookingBtn">Save Booking</button>
            <button class="btn-whatsapp-dash" id="saveAndWhatsappBtn"><i class="bi bi-whatsapp"></i> Save &amp; Notify via WhatsApp</button>
            <button class="btn-secondary-dash" onclick="showPanel('bookings', null)">Cancel</button>
          </div>
        </div>
      </div>
    </div>

    <!-- ══════ INQUIRIES PANEL ══════ -->
    <div class="panel" id="panel-inquiries">
      <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
        <div>
          <h3 style="font-family:var(--font-d);font-size:22px;font-weight:300;margin-bottom:4px;">Website Inquiries</h3>
          <p style="font-size:12px;color:var(--muted);">Submissions from your contact &amp; booking form</p>
        </div>
        <button class="btn-secondary-dash" onclick="markAllInquiriesRead()">Mark All as Read</button>
      </div>
      <div id="inquiriesContainer">
        <!-- Populated by JS from localStorage -->
      </div>
    </div>

    <!-- ══════ TASKS PANEL ══════ -->
    <div class="panel" id="panel-tasks">
      <div class="grid-2">
        <div class="card">
          <div class="card-header">
            <span class="card-title">Open Tasks</span>
            <button class="card-action" onclick="addTask()">+ Add Task</button>
          </div>
          <div class="card-body" style="padding:16px 24px;" id="openTasksList">
            <div class="task-item">
              <div class="task-check" onclick="toggleTask(this)"><i class="bi bi-check2"></i></div>
              <div><div class="task-text">Confirm photographer — Kefa Wedding</div><div class="task-event">Kefa &amp; Mulungi Wedding · Due Jun 18</div></div>
              <span class="task-priority pri-high">High</span>
            </div>
            <div class="task-item">
              <div class="task-check" onclick="toggleTask(this)"><i class="bi bi-check2"></i></div>
              <div><div class="task-text">Follow up on deposit — David K.</div><div class="task-event">Corporate Event · Due Jun 15</div></div>
              <span class="task-priority pri-high">High</span>
            </div>
            <div class="task-item">
              <div class="task-check" onclick="toggleTask(this)"><i class="bi bi-check2"></i></div>
              <div><div class="task-text">Finalize menu with caterer — David Corp</div><div class="task-event">David K. Corporate · Due Jun 22</div></div>
              <span class="task-priority pri-medium">Med</span>
            </div>
            <div class="task-item">
              <div class="task-check" onclick="toggleTask(this)"><i class="bi bi-check2"></i></div>
              <div><div class="task-text">Venue site visit — Godwin &amp; Rose</div><div class="task-event">Godwin &amp; Rose Wedding · Due Jun 30</div></div>
              <span class="task-priority pri-medium">Med</span>
            </div>
            <div class="task-item">
              <div class="task-check" onclick="toggleTask(this)"><i class="bi bi-check2"></i></div>
              <div><div class="task-text">Create run-of-show — Agnes Intro</div><div class="task-event">Agnes Nakato · Due Jun 12</div></div>
              <span class="task-priority pri-high">High</span>
            </div>
            <div class="task-item">
              <div class="task-check" onclick="toggleTask(this)"><i class="bi bi-check2"></i></div>
              <div><div class="task-text">Order table flowers — Mary Birthday</div><div class="task-event">Mary Namaganda · Due Jul 8</div></div>
              <span class="task-priority pri-low">Low</span>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header"><span class="card-title">Completed Tasks</span></div>
          <div class="card-body" style="padding:16px 24px;">
            <div class="task-item">
              <div class="task-check done" onclick="toggleTask(this)"><i class="bi bi-check2"></i></div>
              <div><div class="task-text done-text">Send quotation to Agnes</div><div class="task-event">Completed May 30</div></div>
              <span class="task-priority pri-medium">Med</span>
            </div>
            <div class="task-item">
              <div class="task-check done" onclick="toggleTask(this)"><i class="bi bi-check2"></i></div>
              <div><div class="task-text done-text">Sign contract — Kefa Wedding</div><div class="task-event">Completed Jun 2</div></div>
              <span class="task-priority pri-high">High</span>
            </div>
            <div class="task-item">
              <div class="task-check done" onclick="toggleTask(this)"><i class="bi bi-check2"></i></div>
              <div><div class="task-text done-text">Collect deposit — Godwin &amp; Rose</div><div class="task-event">Completed Jun 5</div></div>
              <span class="task-priority pri-high">High</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ══════ REVENUE PANEL ══════ -->
    <div class="panel" id="panel-revenue">
      <div class="stats-row">
        <div class="stat-card">
          <div class="stat-card-top"><div class="stat-icon"><i class="bi bi-cash-stack"></i></div><span class="stat-badge badge-up">↑ 22%</span></div>
          <div class="stat-num">42M</div>
          <div class="stat-label">Total Revenue YTD</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-top"><div class="stat-icon"><i class="bi bi-receipt"></i></div><span class="stat-badge badge-up">↑ 4</span></div>
          <div class="stat-num">6</div>
          <div class="stat-label">Paid Bookings</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-top"><div class="stat-icon"><i class="bi bi-hourglass"></i></div></div>
          <div class="stat-num">2.7M</div>
          <div class="stat-label">Pending Payments</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-top"><div class="stat-icon"><i class="bi bi-bar-chart"></i></div><span class="stat-badge badge-up">↑ 18%</span></div>
          <div class="stat-num">7M</div>
          <div class="stat-label">Avg Event Value</div>
        </div>
      </div>
      <div class="card">
        <div class="card-header"><span class="card-title">Revenue by Package Type (UGX)</span></div>
        <div class="card-body">
          <div class="revenue-row">
            <div class="revenue-label">Luxury</div>
            <div class="revenue-bar-wrap"><div class="revenue-bar-fill" style="width:85%;"></div></div>
            <div class="revenue-amount">18,000,000</div>
          </div>
          <div class="revenue-row">
            <div class="revenue-label">Platinum</div>
            <div class="revenue-bar-wrap"><div class="revenue-bar-fill" style="width:60%;"></div></div>
            <div class="revenue-amount">12,500,000</div>
          </div>
          <div class="revenue-row">
            <div class="revenue-label">Gold</div>
            <div class="revenue-bar-wrap"><div class="revenue-bar-fill" style="width:40%;"></div></div>
            <div class="revenue-amount">7,800,000</div>
          </div>
          <div class="revenue-row">
            <div class="revenue-label">Silver</div>
            <div class="revenue-bar-wrap"><div class="revenue-bar-fill" style="width:18%;"></div></div>
            <div class="revenue-amount">3,200,000</div>
          </div>
        </div>
      </div>
    </div>

    <!-- ══════ VENDORS PANEL ══════ -->
    <div class="panel" id="panel-vendors">
      <div class="card">
        <div class="card-header">
          <span class="card-title">Trusted Vendor Network</span>
          <button class="card-action" onclick="toggleVendorForm()">+ Add Vendor</button>
        </div>
        <div id="vendorFormCard" class="card" style="display:none; margin:16px 24px 0;">
          <div class="card-header"><span class="card-title">Add New Vendor</span></div>
          <div class="card-body booking-form" style="padding:24px;">
            <div class="form-row">
              <div class="form-group">
                <label>Vendor Name *</label>
                <input type="text" id="vendorName" placeholder="e.g. Elegant Drapes & Lighting">
              </div>
              <div class="form-group">
                <label>Category *</label>
                <input type="text" id="vendorCategory" placeholder="e.g. Florals & Décor">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>Contact *</label>
                <input type="tel" id="vendorContact" placeholder="+256 700 000 000">
              </div>
              <div class="form-group">
                <label>Rating (0–5)</label>
                <input type="number" id="vendorRating" min="0" max="5" step="0.1" placeholder="4.8">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>Events Used *</label>
                <input type="number" id="vendorEvents" min="0" placeholder="e.g. 10">
              </div>
              <div class="form-group">
                <label>Status</label>
                <select id="vendorStatus">
                  <option>Active</option>
                  <option>Occasional</option>
                  <option>Inactive</option>
                </select>
              </div>
            </div>
            <div style="display:flex;gap:12px; margin-top:16px;">
              <button class="btn-primary-dash" id="saveVendorBtn">Add Vendor</button>
              <button type="button" class="btn-secondary-dash" onclick="toggleVendorForm()">Cancel</button>
            </div>
          </div>
        </div>
        <div class="card-body" style="padding:0 24px; overflow-x:auto;">
          <table class="events-table">
            <thead>
              <tr>
                <th>Vendor Name</th>
                <th>Category</th>
                <th>Contact</th>
                <th>Rating</th>
                <th>Events Used</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="vendorsTableBody">
              <tr>
                <td>Gracious Photography</td>
                <td>Photography &amp; Video</td>
                <td>+256 700 111 222</td>
                <td>⭐ 4.9</td>
                <td>12</td>
                <td><span class="status-pill status-confirmed">Active</span></td>
                <td>
                  <button class="action-icon" onclick="openWhatsApp('256700111222','Gracious Photography')" title="WhatsApp"><i class="bi bi-whatsapp"></i></button>
                  <button class="action-icon"><i class="bi bi-pencil"></i></button>
                  <button class="action-icon" style="color:#F44336;" onclick="deleteRow(this)"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>Bloom Flowers UG</td>
                <td>Florals &amp; Décor</td>
                <td>+256 700 333 444</td>
                <td>⭐ 4.7</td>
                <td>18</td>
                <td><span class="status-pill status-confirmed">Active</span></td>
                <td>
                  <button class="action-icon" onclick="openWhatsApp('256700333444','Bloom Flowers UG')" title="WhatsApp"><i class="bi bi-whatsapp"></i></button>
                  <button class="action-icon"><i class="bi bi-pencil"></i></button>
                  <button class="action-icon" style="color:#F44336;" onclick="deleteRow(this)"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>Royal Catering Kampala</td>
                <td>Catering</td>
                <td>+256 700 555 666</td>
                <td>⭐ 4.8</td>
                <td>9</td>
                <td><span class="status-pill status-confirmed">Active</span></td>
                <td>
                  <button class="action-icon" onclick="openWhatsApp('256700555666','Royal Catering Kampala')" title="WhatsApp"><i class="bi bi-whatsapp"></i></button>
                  <button class="action-icon"><i class="bi bi-pencil"></i></button>
                  <button class="action-icon" style="color:#F44336;" onclick="deleteRow(this)"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>SoundWave DJ &amp; Events</td>
                <td>Entertainment / DJ</td>
                <td>+256 700 777 888</td>
                <td>⭐ 4.6</td>
                <td>14</td>
                <td><span class="status-pill status-confirmed">Active</span></td>
                <td>
                  <button class="action-icon" onclick="openWhatsApp('256700777888','SoundWave DJ')" title="WhatsApp"><i class="bi bi-whatsapp"></i></button>
                  <button class="action-icon"><i class="bi bi-pencil"></i></button>
                  <button class="action-icon" style="color:#F44336;" onclick="deleteRow(this)"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>Elegant Drapes &amp; Lighting</td>
                <td>Lighting &amp; Draping</td>
                <td>+256 700 999 000</td>
                <td>⭐ 4.5</td>
                <td>7</td>
                <td><span class="status-pill status-planning">Occasional</span></td>
                <td>
                  <button class="action-icon" onclick="openWhatsApp('256700999000','Elegant Drapes')" title="WhatsApp"><i class="bi bi-whatsapp"></i></button>
                  <button class="action-icon"><i class="bi bi-pencil"></i></button>
                  <button class="action-icon" style="color:#F44336;" onclick="deleteRow(this)"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div><!-- /content -->
</div><!-- /main -->

<script>
// ════════════════════════════════════════════════════════════
//  TOAST NOTIFICATIONS
// ════════════════════════════════════════════════════════════
function showToast(title, msg, type = 'success', duration = 4000) {
  const container = document.getElementById('toast-container');
  const icons = { success: 'bi-check-circle-fill', error: 'bi-x-circle-fill', info: 'bi-info-circle-fill' };
  const toast = document.createElement('div');
  toast.className = `toast toast-${type}`;
  toast.innerHTML = `
    <i class="bi ${icons[type] || icons.success} toast-icon"></i>
    <div>
      <div class="toast-title">${title}</div>
      <div class="toast-msg">${msg}</div>
    </div>
  `;
  container.appendChild(toast);
  setTimeout(() => {
    toast.classList.add('toast-out');
    setTimeout(() => toast.remove(), 350);
  }, duration);
}

// ════════════════════════════════════════════════════════════
//  DATA MANAGEMENT — CLIENTS
// ════════════════════════════════════════════════════════════
let clients = [];

function saveClientsToStorage() {
  localStorage.setItem('dwin_clients', JSON.stringify(clients));
}

function loadClientsFromStorage() {
  const stored = localStorage.getItem('dwin_clients');
  if (stored) {
    clients = JSON.parse(stored);
  } else {
    clients = [
      { avatar:'KM', name:'Kefa & Mulungi',  eventType:'Wedding',      date:'Jun 21, 2026', package:'Platinum', phone:'256700000000', email:'kefa.mulungi@example.com' },
      { avatar:'AN', name:'Agnes N.',         eventType:'Introduction', date:'Jun 14, 2026', package:'Gold',     phone:'256711111111', email:'agnes.n@example.com' },
      { avatar:'DK', name:'David K.',         eventType:'Corporate',    date:'Jun 28, 2026', package:'Silver',   phone:'256722222222', email:'david.k@example.com' },
      { avatar:'GR', name:'Godwin & Rose',    eventType:'Wedding',      date:'Jul 5, 2026',  package:'Luxury',   phone:'256733333333', email:'godwin.rose@example.com' },
      { avatar:'MN', name:'Mary N.',          eventType:'Birthday',     date:'Jul 12, 2026', package:'Gold',     phone:'256744444444', email:'mary.n@example.com' },
      { avatar:'PO', name:'Peter O.',         eventType:'Anniversary',  date:'May 5, 2026',  package:'Silver',   phone:'256755555555', email:'peter.o@example.com' },
    ];
    saveClientsToStorage();
  }
}

function renderClients() {
  const grid = document.getElementById('clientGrid');
  if (!grid) return;
  grid.innerHTML = '';
  clients.forEach(c => {
    const card = document.createElement('div');
    card.className = 'client-card';
    card.innerHTML = `
      <div class="client-card-avatar">${c.avatar}</div>
      <div class="client-card-name">${c.name}</div>
      <div class="client-card-event">${c.eventType}</div>
      <div class="client-card-date">📅 ${c.date} &nbsp;|&nbsp; ${c.package}</div>
      <div class="client-card-actions">
        <button class="action-icon" onclick="openWhatsApp('${c.phone}','${c.name}','${c.eventType}','${c.date}')" title="WhatsApp"><i class="bi bi-whatsapp"></i></button>
        <button class="action-icon" onclick="window.open('mailto:${c.email}')" title="Email"><i class="bi bi-envelope"></i></button>
        <button class="action-icon" onclick="editClient(this)" data-client-name="${c.name}" title="Edit Client"><i class="bi bi-pencil"></i></button>
        <button class="action-icon" onclick="deleteClient(this)" data-client-name="${c.name}" title="Delete Client"><i class="bi bi-trash"></i></button>
      </div>
    `;
    grid.appendChild(card);
  });
  // Update stat
  const statEl = document.getElementById('statClients');
  if (statEl) statEl.textContent = clients.length;
}

function addClientFromBooking(clientData) {
  clients.push(clientData);
  saveClientsToStorage();
  const grid = document.getElementById('clientGrid');
  if (!grid) return;
  const card = document.createElement('div');
  card.className = 'client-card';
  card.innerHTML = `
    <div class="client-card-avatar">${clientData.avatar}</div>
    <div class="client-card-name">${clientData.name}</div>
    <div class="client-card-event">${clientData.eventType}</div>
    <div class="client-card-date">📅 ${clientData.date} &nbsp;|&nbsp; ${clientData.package}</div>
    <div class="client-card-actions">
      <button class="action-icon" onclick="openWhatsApp('${clientData.phone}','${clientData.name}','${clientData.eventType}','${clientData.date}')" title="WhatsApp"><i class="bi bi-whatsapp"></i></button>
      <button class="action-icon" onclick="window.open('mailto:${clientData.email}')" title="Email"><i class="bi bi-envelope"></i></button>
      <button class="action-icon" title="Edit"><i class="bi bi-pencil"></i></button>
      <button class="action-icon" onclick="deleteClient(this)" data-client-name="${clientData.name}" title="Delete"><i class="bi bi-trash"></i></button>
    </div>
  `;
  grid.appendChild(card);
  const statEl = document.getElementById('statClients');
  if (statEl) statEl.textContent = clients.length;
}

function deleteClient(btn) {
  const name = btn.dataset.clientName;
  if (!name) return;
  if (!confirm(`Delete client card for ${name}? This will remove only the client card and will not delete the booking record.`)) return;
  clients = clients.filter(c => c.name !== name);
  saveClientsToStorage();
  renderClients();
  showToast('Deleted', 'Client card removed. Booking remains intact.', 'info');
}

function editClient(btn) {
  const name = btn.dataset.clientName;
  if (!name) return;
  const client = clients.find(c => c.name === name);
  if (!client) return;

  const updatedName = prompt('Client full name:', client.name) || client.name;
  const updatedEvent = prompt('Event type:', client.eventType) || client.eventType;
  const updatedDate = prompt('Event date:', client.date) || client.date;
  const updatedPackage = prompt('Package:', client.package) || client.package;
  const updatedPhone = prompt('Phone number:', client.phone) || client.phone;
  const updatedEmail = prompt('Email address:', client.email) || client.email;

  client.name = updatedName.trim() || client.name;
  client.eventType = updatedEvent.trim() || client.eventType;
  client.date = updatedDate.trim() || client.date;
  client.package = updatedPackage.trim() || client.package;
  client.phone = updatedPhone.trim() || client.phone;
  client.email = updatedEmail.trim() || client.email;
  client.avatar = client.name.split(' ').map(p => p[0]).join('').slice(0,2).toUpperCase();

  saveClientsToStorage();
  renderClients();
  showToast('Updated', 'Client card updated successfully.', 'success');
}

// ════════════════════════════════════════════════════════════
//  DATA MANAGEMENT — BOOKINGS
// ════════════════════════════════════════════════════════════
let bookings = [];

function loadBookings() {
  const stored = localStorage.getItem('dwin_bookings');
  bookings = stored ? JSON.parse(stored) : [
    { id:'#001', firstName:'Kefa', lastName:'Mulungi', phone:'256700000000', email:'kefa@example.com', eventType:'Wedding', date:'2026-06-21', venue:'Speke Resort', package:'Platinum', amount:'3500000', status:'Confirmed', notes:'Wedding ceremony' },
    { id:'#002', firstName:'Agnes', lastName:'Nakato', phone:'256711111111', email:'agnes@example.com', eventType:'Introduction', date:'2026-06-14', venue:'Munyonyo Resort', package:'Gold', amount:'1800000', status:'Planning', notes:'Kwanjula event' },
    { id:'#003', firstName:'David', lastName:'Katende', phone:'256722222222', email:'david@example.com', eventType:'Corporate', date:'2026-06-28', venue:'Imperial Royale', package:'Silver', amount:'900000', status:'Pending', notes:'Corporate event' },
    { id:'#004', firstName:'Godwin', lastName:'Rose', phone:'256733333333', email:'godwin@example.com', eventType:'Wedding', date:'2026-07-05', venue:'Lake Victoria Serena', package:'Luxury', amount:'6000000', status:'Confirmed', notes:'Wedding' },
    { id:'#005', firstName:'Mary', lastName:'Namaganda', phone:'256744444444', email:'mary@example.com', eventType:'Birthday', date:'2026-07-12', venue:'TBD', package:'Gold', amount:'1200000', status:'Planning', notes:'Birthday party' },
    { id:'#006', firstName:'Peter', lastName:'Okello', phone:'256755555555', email:'peter@example.com', eventType:'Anniversary', date:'2026-05-05', venue:'Sheraton Hotel', package:'Silver', amount:'750000', status:'Completed', notes:'Anniversary' },
  ];
  saveBookings();
}

function saveBookings() {
  localStorage.setItem('dwin_bookings', JSON.stringify(bookings));
}

function isDateBooked(dateString) {
  return bookings.some(b => b.date === dateString);
}

function getBookedDates() {
  return bookings.map(b => b.date);
}

// ════════════════════════════════════════════════════════════
//  DATA MANAGEMENT — INQUIRIES
// ════════════════════════════════════════════════════════════
let inquiries = [];

function loadInquiries() {
  const stored = localStorage.getItem('dwin_inquiries');
  inquiries = stored ? JSON.parse(stored) : [];
}

function saveInquiries() {
  localStorage.setItem('dwin_inquiries', JSON.stringify(inquiries));
}

function renderInquiries() {
  const container = document.getElementById('inquiriesContainer');
  if (!container) return;
  if (inquiries.length === 0) {
    container.innerHTML = `
      <div class="inquiry-empty">
        <i class="bi bi-inbox"></i>
        <p style="font-size:15px;margin-bottom:6px;">No inquiries yet</p>
        <p style="font-size:12px;">When clients submit the contact form, they'll appear here.</p>
      </div>`;
    return;
  }
  container.innerHTML = '';
  // Newest first
  [...inquiries].reverse().forEach((inq, idx) => {
    const realIdx = inquiries.length - 1 - idx;
    const isNew = !inq.read;
    const initials = ((inq.firstName||'')[0]||'') + ((inq.lastName||'')[0]||'');
    const timeStr = inq.time ? new Date(inq.time).toLocaleString('en-UG', { day:'numeric', month:'short', hour:'2-digit', minute:'2-digit' }) : '';
    const dateBooked = inq.eventDate && isDateBooked(inq.eventDate);
    const card = document.createElement('div');
    card.className = 'inquiry-card' + (isNew ? ' inquiry-new' : '') + (dateBooked ? ' inquiry-conflict' : '');
    card.innerHTML = `
      <div class="inquiry-avatar">${initials.toUpperCase()}</div>
      <div class="inquiry-body">
        <div style="display:flex;align-items:center;gap:10px;margin-bottom:4px;">
          <div class="inquiry-name">${inq.firstName} ${inq.lastName}</div>
          ${isNew ? '<span class="status-pill status-new" style="font-size:9px;padding:2px 8px;">NEW</span>' : ''}
          ${dateBooked ? '<span class="status-pill status-cancelled" style="font-size:9px;padding:2px 8px;">⚠️ DATE BOOKED</span>' : ''}
        </div>
        <div class="inquiry-meta">
          <span><i class="bi bi-telephone" style="color:var(--gold);"></i> ${inq.phone}</span>
          <span><i class="bi bi-envelope" style="color:var(--gold);"></i> ${inq.email}</span>
          <span><i class="bi bi-calendar3" style="color:var(--gold);"></i> ${inq.eventDate||'Date TBD'}</span>
          <span><i class="bi bi-box" style="color:var(--gold);"></i> ${inq.eventType||'—'}</span>
        </div>
        <div class="inquiry-detail">
          ${inq.details ? `<em style="color:rgba(255,255,255,0.5);">"${inq.details.substring(0,140)}${inq.details.length>140?'...':''}"</em>` : ''}
          ${inq.budget ? `<br><span style="margin-top:4px;display:inline-block;"><strong style="color:var(--gold);">Budget:</strong> ${inq.budget}</span>` : ''}
          ${inq.guests ? `&nbsp;&nbsp;<strong style="color:var(--gold);">Guests:</strong> ${inq.guests}` : ''}
          ${inq.venue  ? `&nbsp;&nbsp;<strong style="color:var(--gold);">Venue:</strong> ${inq.venue}` : ''}
        </div>
        <div class="inquiry-actions">
          <button class="btn-whatsapp-dash" style="padding:7px 14px;font-size:10px;" onclick="replyInquiryWhatsApp(${realIdx})"><i class="bi bi-whatsapp"></i> Reply on WhatsApp</button>
          <button class="btn-primary-dash" style="padding:7px 14px;font-size:10px;" onclick="convertInquiryToBooking(${realIdx})">+ Add as Booking</button>
          ${isNew ? `<button class="btn-secondary-dash" style="padding:7px 14px;font-size:10px;" onclick="markInquiryRead(${realIdx})">Mark Read</button>` : ''}
          <button class="action-icon" style="margin-left:auto;" onclick="deleteInquiry(${realIdx})" title="Delete"><i class="bi bi-trash" style="color:#F44336;"></i></button>
        </div>
      </div>
      <div class="inquiry-time">${timeStr}</div>
    `;
    container.appendChild(card);
  });
}

function updateInquiryBadge() {
  const unread = inquiries.filter(i => !i.read).length;
  const badge = document.getElementById('inquiriesBadge');
  const dot   = document.getElementById('notifDot');
  if (badge) {
    badge.textContent = unread;
    badge.style.display = unread > 0 ? 'inline-block' : 'none';
  }
  if (dot) dot.classList.toggle('active', unread > 0);
}

function markInquiryRead(idx) {
  if (inquiries[idx]) { inquiries[idx].read = true; saveInquiries(); renderInquiries(); updateInquiryBadge(); }
}

function markAllInquiriesRead() {
  inquiries.forEach(i => i.read = true);
  saveInquiries();
  renderInquiries();
  updateInquiryBadge();
  showToast('Done', 'All inquiries marked as read.', 'info');
}

function deleteInquiry(idx) {
  if (!confirm('Remove this inquiry?')) return;
  inquiries.splice(idx, 1);
  saveInquiries();
  renderInquiries();
  updateInquiryBadge();
  showToast('Deleted', 'Inquiry removed.', 'info');
}

function replyInquiryWhatsApp(idx) {
  const inq = inquiries[idx];
  if (!inq) return;
  const phone = (inq.phone || '').replace(/\D/g, '');
  const msg = `Hi ${inq.firstName}! 👋 Thank you for reaching out to DWIN Events.\n\nWe received your inquiry for *${inq.eventType||'your event'}* on ${inq.eventDate||'the requested date'}.\n\nWe'd love to help you plan something beautiful. Let's schedule a free consultation! 🎉\n\n— DWIN Events Team`;
  window.open(`https://wa.me/${phone}?text=${encodeURIComponent(msg)}`, '_blank');
  markInquiryRead(idx);
}

function convertInquiryToBooking(idx) {
  const inq = inquiries[idx];
  if (!inq) return;
  
  // Check if date is already booked
  if (inq.eventDate && isDateBooked(inq.eventDate)) {
    const existingBooking = bookings.find(b => b.date === inq.eventDate);
    showToast('Date Already Booked ⚠️', `The date ${inq.eventDate} is already booked by ${existingBooking.firstName} ${existingBooking.lastName}. Please suggest an alternative date to the client via WhatsApp.`, 'error', 7000);
    replyInquiryWhatsApp(idx);
    return;
  }
  
  // Pre-fill new booking form
  document.getElementById('bf-firstName').value = inq.firstName || '';
  document.getElementById('bf-lastName').value  = inq.lastName  || '';
  document.getElementById('bf-phone').value     = inq.phone     || '';
  document.getElementById('bf-email').value     = inq.email     || '';
  document.getElementById('bf-date').value      = inq.eventDate || '';
  document.getElementById('bf-venue').value     = inq.venue     || '';
  document.getElementById('bf-amount').value    = inq.budget ? inq.budget.replace(/[^\d]/g, '') : '';
  document.getElementById('bf-notes').value     = inq.details   || '';
  
  // Match event type if possible
  const etSelect = document.getElementById('bf-eventType');
  if (inq.eventType) {
    for (let opt of etSelect.options) {
      if (opt.value.toLowerCase().includes(inq.eventType.toLowerCase().split(' ')[0])) {
        etSelect.value = opt.value; break;
      }
    }
  }

  const packageSelect = document.getElementById('bf-package');
  if (inq.package && packageSelect) {
    for (let opt of packageSelect.options) {
      if (opt.value.toLowerCase().includes(inq.package.toLowerCase().split(' ')[0]) || opt.textContent.toLowerCase().includes(inq.package.toLowerCase().split(' ')[0])) {
        packageSelect.value = opt.value; break;
      }
    }
  }

  markInquiryRead(idx);
  showPanel('new-booking', null);
  showToast('Form Pre-filled', `Inquiry from ${inq.firstName} ${inq.lastName} loaded into booking form.`, 'info', 5000);
}

// ════════════════════════════════════════════════════════════
//  PANEL NAVIGATION
// ════════════════════════════════════════════════════════════
const panelTitles = {
  'dashboard':   ['Dashboard',            'Overview — May 2026'],
  'bookings':    ['Bookings',             'All event bookings'],
  'clients':     ['Clients',              'Client directory'],
  'new-booking': ['New Booking',          'Add a booking manually'],
  'inquiries':   ['Website Inquiries',    'Submissions from your contact form'],
  'tasks':       ['Tasks & To-Dos',       'Open and completed tasks'],
  'revenue':     ['Revenue',              'Financial overview'],
  'vendors':     ['Vendors',              'Trusted vendor network'],
};

function showPanel(id, btn) {
  document.querySelectorAll('.panel').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
  const panel = document.getElementById('panel-' + id);
  if (panel) panel.classList.add('active');
  if (btn) btn.classList.add('active');
  const titles = panelTitles[id] || [id, ''];
  document.getElementById('panelTitle').textContent = titles[0];
  document.getElementById('panelSub').textContent   = titles[1];
  if (window.innerWidth <= 768) document.getElementById('sidebar').classList.remove('open');
  const query = document.getElementById('searchInput')?.value || '';
  applySearchFilter(query);
  if (id === 'inquiries') { renderInquiries(); markAllInquiriesRead(); }
}

// ════════════════════════════════════════════════════════════
//  SEARCH FILTER
// ════════════════════════════════════════════════════════════
const searchInput = document.getElementById('searchInput');

function applySearchFilter(query) {
  const activePanel = document.querySelector('.panel.active');
  if (!activePanel) return;
  const filterText = query.trim().toLowerCase();
  activePanel.querySelectorAll('.events-table tbody tr').forEach(row => {
    row.style.display = row.textContent.toLowerCase().includes(filterText) ? '' : 'none';
  });
  activePanel.querySelectorAll('.client-card').forEach(card => {
    card.style.display = card.textContent.toLowerCase().includes(filterText) ? '' : 'none';
  });
  activePanel.querySelectorAll('.task-item').forEach(task => {
    task.style.display = task.textContent.toLowerCase().includes(filterText) ? '' : 'none';
  });
  activePanel.querySelectorAll('.inquiry-card').forEach(card => {
    card.style.display = card.textContent.toLowerCase().includes(filterText) ? '' : 'none';
  });
}

if (searchInput) searchInput.addEventListener('input', () => applySearchFilter(searchInput.value));

// ════════════════════════════════════════════════════════════
//  BOOKINGS FILTER
// ════════════════════════════════════════════════════════════
function filterBookings(status, btn) {
  document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
  if (btn) btn.classList.add('active');
  document.querySelectorAll('#bookingsTableBody tr').forEach(row => {
    if (status === 'all') {
      row.style.display = '';
    } else {
      row.style.display = (row.dataset.status || '').toLowerCase() === status.toLowerCase() ? '' : 'none';
    }
  });
}

// ════════════════════════════════════════════════════════════
//  WHATSAPP HELPERS
// ════════════════════════════════════════════════════════════
function openWhatsApp(phone, name, eventType, eventDate) {
  const cleaned = (phone || '').replace(/\D/g, '');
  let msg;
  if (eventType && eventDate) {
    msg = `Hi ${name}! 👋 This is DWIN Events.\n\nWe're following up about your *${eventType}* scheduled for *${eventDate}*.\n\nPlease let us know if you have any updates or questions. We're happy to help! 🎉\n\n— DWIN Events`;
  } else {
    msg = `Hi ${name}! 👋 This is DWIN Events. We'd love to connect with you. How can we assist today?\n\n— DWIN Events`;
  }
  window.open(`https://wa.me/${cleaned}?text=${encodeURIComponent(msg)}`, '_blank');
}

function buildBookingWhatsAppMsg(data) {
  return `✨ *NEW BOOKING CONFIRMED — DWIN EVENTS* ✨

*Client Details*
Name: ${data.clientName}
Phone: ${data.phone}
Email: ${data.email || 'N/A'}

*Event Details*
Event Type: ${data.eventType}
Event Date: ${data.date}
Venue: ${data.venue || 'TBD'}
Package: ${data.package}
Amount (UGX): ${data.amount}
Status: ${data.status}

${data.notes ? `*Notes:*\n${data.notes}` : ''}

_Booking added via DWIN Admin Dashboard_`;
}

// ════════════════════════════════════════════════════════════
//  UTILITY
// ════════════════════════════════════════════════════════════
function mapStatusClass(status) {
  return {
    pending: 'status-pending', confirmed: 'status-confirmed',
    planning: 'status-planning', completed: 'status-completed', cancelled: 'status-cancelled',
  }[status.toLowerCase()] || 'status-pending';
}

function refreshBookingBadge() {
  const count = document.querySelectorAll('#bookingsTableBody tr').length;
  const badge = document.getElementById('bookingsBadge');
  if (badge) badge.textContent = count;
  updateDashboardStats();
  renderUpcomingEvents();
}

function updateDashboardStats() {
  const now = new Date();
  const upcomingEvents = bookings.filter(b => {
    const eventDate = new Date(`${b.date}T00:00:00`);
    const status = (b.status || '').toLowerCase();
    return eventDate >= new Date(now.getFullYear(), now.getMonth(), now.getDate()) && status !== 'completed' && status !== 'cancelled';
  });
  const upcomingCount = upcomingEvents.length;
  const totalCount = bookings.length;

  const statUpcoming = document.getElementById('statUpcoming');
  if (statUpcoming) statUpcoming.textContent = upcomingCount;

  const statEvents = document.getElementById('statEvents');
  if (statEvents) statEvents.textContent = totalCount;
}

function renderUpcomingEvents() {
  const tbody = document.getElementById('upcomingEventsBody');
  if (!tbody) return;
  tbody.innerHTML = '';
  const now = new Date();
  const upcoming = bookings
    .slice()
    .sort((a, b) => new Date(`${a.date}T00:00:00`) - new Date(`${b.date}T00:00:00`))
    .filter(b => {
      const eventDate = new Date(`${b.date}T00:00:00`);
      const status = (b.status || '').toLowerCase();
      return eventDate >= new Date(now.getFullYear(), now.getMonth(), now.getDate()) && status !== 'completed' && status !== 'cancelled';
    })
    .slice(0, 6);

  if (!upcoming.length) {
    tbody.innerHTML = '<tr><td colspan="6" style="color:rgba(255,255,255,0.6);text-align:center;padding:24px;">No upcoming events yet.</td></tr>';
    return;
  }

  upcoming.forEach(b => {
    const row = document.createElement('tr');
    const initials = `${b.firstName[0] || ''}${b.lastName[0] || ''}`.toUpperCase();
    row.innerHTML = `
      <td><div class="event-client"><div class="client-avatar">${initials}</div>${b.firstName} ${b.lastName}</div></td>
      <td>${b.eventType}</td>
      <td>${new Date(`${b.date}T00:00:00`).toLocaleDateString('en-US', { month:'short', day:'numeric' })}</td>
      <td>${b.package}</td>
      <td><span class="status-pill ${mapStatusClass(b.status)}">${b.status}</span></td>
      <td><button class="action-icon" onclick="editBooking('${b.id}')" title="Edit"><i class="bi bi-pencil"></i></button></td>
    `;
    tbody.appendChild(row);
  });
}

function createBookingRow(data) {
  const row = document.createElement('tr');
  row.setAttribute('data-status', data.status);
  row.innerHTML = `
    <td>${data.id}</td>
    <td><div class="event-client"><div class="client-avatar">${data.initials}</div>${data.clientName}</div></td>
    <td>${data.eventType}</td>
    <td>${data.date}</td>
    <td>${data.venue || 'TBD'}</td>
    <td>${data.package}</td>
    <td>${Number(data.amount).toLocaleString('en-UG')}</td>
    <td><span class="status-pill ${data.statusClass}">${data.status}</span></td>
    <td>
      <button class="action-icon" onclick="openWhatsApp('${data.phone}','${data.clientName}','${data.eventType}','${data.date}')" title="WhatsApp"><i class="bi bi-whatsapp"></i></button>
      <button class="action-icon" onclick="editBooking('${data.id}')" title="Edit"><i class="bi bi-pencil"></i></button>
      <button class="action-icon" style="color:#F44336;" onclick="deleteRow(this)"><i class="bi bi-trash"></i></button>
    </td>
  `;
  return row;
}

// ════════════════════════════════════════════════════════════
//  SAVE BOOKING
// ════════════════════════════════════════════════════════════
function getBookingFormData() {
  return {
    firstName: document.getElementById('bf-firstName')?.value.trim(),
    lastName:  document.getElementById('bf-lastName')?.value.trim(),
    phone:     document.getElementById('bf-phone')?.value.trim(),
    email:     document.getElementById('bf-email')?.value.trim(),
    eventType: document.getElementById('bf-eventType')?.value,
    dateValue: document.getElementById('bf-date')?.value,
    package:   document.getElementById('bf-package')?.value || 'Silver',
    amount:    document.getElementById('bf-amount')?.value || '0',
    venue:     document.getElementById('bf-venue')?.value.trim() || 'TBD',
    status:    document.getElementById('bf-status')?.value || 'Pending',
    notes:     document.getElementById('bf-notes')?.value.trim(),
  };
}

function validateBookingForm(d) {
  if (!d.firstName || !d.lastName || !d.phone || !d.dateValue) {
    showToast('Missing Fields', 'Please fill in First Name, Last Name, Phone and Event Date.', 'error');
    return false;
  }
  
  // Check for date conflict
  if (isDateBooked(d.dateValue)) {
    const existingBooking = bookings.find(b => b.date === d.dateValue);
    const conflictMsg = `The date ${d.dateValue} is already booked by ${existingBooking.firstName} ${existingBooking.lastName} for their ${existingBooking.eventType}. Please choose a different date.`;
    showToast('Date Already Booked! ⚠️', conflictMsg, 'error', 6000);
    return false;
  }
  
  return true;
}

function processBookingSave(sendWhatsApp) {
  const d = getBookingFormData();
  if (!validateBookingForm(d)) return;

  const tbody = document.getElementById('bookingsTableBody');
  const nextId = bookings.length + 1;
  const initials = ((d.firstName[0]||'') + (d.lastName[0]||'')).toUpperCase();
  const pkg = d.package.split(' ')[0]; // "Gold", "Silver", etc.

  // Create booking object
  const newBooking = {
    id: `#${String(nextId).padStart(3,'0')}`,
    firstName: d.firstName,
    lastName: d.lastName,
    phone: d.phone.replace(/\D/g,''),
    email: d.email,
    eventType: d.eventType,
    date: d.dateValue,
    venue: d.venue,
    package: pkg,
    amount: d.amount,
    status: d.status,
    notes: d.notes,
    createdAt: new Date().toISOString(),
  };

  // Add to bookings storage
  bookings.push(newBooking);
  saveBookings();

  const formattedDate = new Date(d.dateValue).toLocaleDateString('en-US', { month:'short', day:'numeric', year:'numeric' });

  const bookingData = {
    id: newBooking.id,
    initials,
    clientName: `${d.firstName} ${d.lastName}`,
    eventType: d.eventType,
    date: formattedDate,
    venue: d.venue,
    package: pkg,
    amount: d.amount,
    status: d.status,
    statusClass: mapStatusClass(d.status),
    phone: d.phone,
    email: d.email,
    notes: d.notes,
  };

  // Add to bookings table
  if (tbody) tbody.appendChild(createBookingRow(bookingData));

  // Add to clients
  addClientFromBooking({
    avatar: initials,
    name: bookingData.clientName,
    eventType: bookingData.eventType,
    date: bookingData.date,
    package: pkg,
    phone: d.phone.replace(/\D/g,''),
    email: d.email || '',
  });

  refreshBookingBadge();

  // Send WhatsApp to DWIN admin number with booking details
  if (sendWhatsApp) {
    const msg = buildBookingWhatsAppMsg(bookingData);
    window.open(`https://wa.me/256766436695?text=${encodeURIComponent(msg)}`, '_blank');
  }

  // Also send to client
  const clientMsg = `Hi ${d.firstName}! 👋\n\nYour booking has been confirmed! 🎉\n\nEvent: ${d.eventType}\nDate: ${formattedDate}\nPackage: ${pkg}\n\nWe'll be in touch shortly with next steps. Thank you for choosing DWIN Events!\n\n— DWIN Events Team`;
  window.open(`https://wa.me/${d.phone.replace(/\D/g,'')}?text=${encodeURIComponent(clientMsg)}`, '_blank');

  // Reset form
  ['bf-firstName','bf-lastName','bf-phone','bf-email','bf-date','bf-amount','bf-venue','bf-notes']
    .forEach(id => { const el = document.getElementById(id); if(el) el.value = ''; });

  showToast('Booking Saved! 🎉', `${bookingData.clientName}'s booking has been added to Bookings & Clients.`, 'success', 5000);
  showPanel('bookings', document.querySelector('[onclick*="bookings"]'));
}

// ════════════════════════════════════════════════════════════
//  EDIT BOOKING
// ════════════════════════════════════════════════════════════
function editBooking(bookingId) {
  const booking = bookings.find(b => b.id === bookingId);
  if (!booking) return;
  
  // Pre-fill the form
  document.getElementById('bf-firstName').value = booking.firstName;
  document.getElementById('bf-lastName').value = booking.lastName;
  document.getElementById('bf-phone').value = booking.phone;
  document.getElementById('bf-email').value = booking.email;
  document.getElementById('bf-eventType').value = booking.eventType;
  document.getElementById('bf-date').value = booking.date;
  document.getElementById('bf-package').value = booking.package;
  document.getElementById('bf-amount').value = booking.amount;
  document.getElementById('bf-venue').value = booking.venue;
  document.getElementById('bf-status').value = booking.status;
  document.getElementById('bf-notes').value = booking.notes;
  
  // Mark for editing
  window.editingBookingId = bookingId;
  
  showPanel('new-booking', null);
  document.querySelector('.card-header span.card-title').textContent = 'Edit Booking';
  showToast('Edit Mode', `Editing booking for ${booking.firstName} ${booking.lastName}. Update and save.`, 'info', 5000);
}

// Override save button to handle edit
document.getElementById('saveBookingBtn').addEventListener('click', e => {
  e.preventDefault();
  if (window.editingBookingId) {
    // Update existing booking
    const d = getBookingFormData();
    if (!d.firstName || !d.lastName || !d.phone || !d.dateValue) {
      showToast('Missing Fields', 'Please fill in all required fields.', 'error');
      return;
    }
    
    const bookingIdx = bookings.findIndex(b => b.id === window.editingBookingId);
    if (bookingIdx >= 0) {
      bookings[bookingIdx] = {
        ...bookings[bookingIdx],
        firstName: d.firstName,
        lastName: d.lastName,
        phone: d.phone.replace(/\D/g,''),
        email: d.email,
        eventType: d.eventType,
        date: d.dateValue,
        venue: d.venue,
        package: d.package.split(' ')[0],
        amount: d.amount,
        status: d.status,
        notes: d.notes,
      };
      saveBookings();
      
      // Refresh the bookings table
      location.reload();
      showToast('Updated!', 'Booking has been updated.', 'success');
    }
    window.editingBookingId = null;
  } else {
    processBookingSave(false);
  }
});

document.getElementById('saveAndWhatsappBtn').addEventListener('click', e => {
  e.preventDefault();
  processBookingSave(true);
});

// Add date validation to prevent selecting booked dates
const dateInput = document.getElementById('bf-date');
if (dateInput) {
  dateInput.addEventListener('change', () => {
    if (dateInput.value && isDateBooked(dateInput.value)) {
      const existingBooking = bookings.find(b => b.date === dateInput.value);
      showToast('Date Conflict ⚠️', `${dateInput.value} is already booked by ${existingBooking.firstName} ${existingBooking.lastName}. Please select a different date.`, 'error', 5000);
      dateInput.style.borderColor = '#F44336';
    } else {
      dateInput.style.borderColor = '';
    }
  });
}

// ════════════════════════════════════════════════════════════
//  VENDOR FORM
// ════════════════════════════════════════════════════════════
function toggleVendorForm() {
  const fc = document.getElementById('vendorFormCard');
  if (fc) fc.style.display = fc.style.display === 'block' ? 'none' : 'block';
}

document.getElementById('saveVendorBtn').addEventListener('click', e => {
  e.preventDefault();
  const name      = document.getElementById('vendorName')?.value.trim();
  const category  = document.getElementById('vendorCategory')?.value.trim();
  const contact   = document.getElementById('vendorContact')?.value.trim();
  const rating    = parseFloat(document.getElementById('vendorRating')?.value || '0').toFixed(1);
  const eventsUsed= document.getElementById('vendorEvents')?.value.trim();
  const status    = document.getElementById('vendorStatus')?.value || 'Active';

  if (!name || !category || !contact || !eventsUsed) {
    showToast('Missing Fields', 'Please fill in all required vendor fields.', 'error');
    return;
  }

  const tbody = document.querySelector('#vendorsTableBody');
  const row = document.createElement('tr');
  const statusClass = status === 'Active' ? 'status-confirmed' : status === 'Occasional' ? 'status-planning' : 'status-cancelled';
  const cleanPhone = contact.replace(/\D/g,'');
  row.innerHTML = `
    <td>${name}</td>
    <td>${category}</td>
    <td>${contact}</td>
    <td>⭐ ${rating}</td>
    <td>${eventsUsed}</td>
    <td><span class="status-pill ${statusClass}">${status}</span></td>
    <td>
      <button class="action-icon" onclick="openWhatsApp('${cleanPhone}','${name}')" title="WhatsApp"><i class="bi bi-whatsapp"></i></button>
      <button class="action-icon"><i class="bi bi-pencil"></i></button>
      <button class="action-icon" style="color:#F44336;" onclick="deleteRow(this)"><i class="bi bi-trash"></i></button>
    </td>
  `;
  if (tbody) tbody.appendChild(row);
  toggleVendorForm();
  ['vendorName','vendorCategory','vendorContact','vendorRating','vendorEvents'].forEach(id => {
    const el = document.getElementById(id); if(el) el.value = '';
  });
  document.getElementById('vendorStatus').value = 'Active';
  showToast('Vendor Added', `${name} has been added to your vendor network.`, 'success');
});

// ════════════════════════════════════════════════════════════
//  SIDEBAR TOGGLE
// ════════════════════════════════════════════════════════════
document.getElementById('sidebarToggle').addEventListener('click', () => {
  document.getElementById('sidebar').classList.toggle('open');
});

// ════════════════════════════════════════════════════════════
//  TASK TOGGLE
// ════════════════════════════════════════════════════════════
function toggleTask(el) {
  el.classList.toggle('done');
  const text = el.parentElement.querySelector('.task-text');
  if (text) text.classList.toggle('done-text');
}

// ════════════════════════════════════════════════════════════
//  ADD TASK (simple)
// ════════════════════════════════════════════════════════════
function addTask() {
  const taskText = prompt('Enter task description:');
  if (!taskText) return;
  const priority = prompt('Priority? (High / Med / Low)', 'Med') || 'Med';
  const priMap = { high:'pri-high', med:'pri-medium', low:'pri-low' };
  const priClass = priMap[priority.toLowerCase()] || 'pri-medium';
  const list = document.getElementById('openTasksList');
  if (!list) return;
  const div = document.createElement('div');
  div.className = 'task-item';
  div.innerHTML = `
    <div class="task-check" onclick="toggleTask(this)"><i class="bi bi-check2"></i></div>
    <div><div class="task-text">${taskText}</div><div class="task-event">Added today</div></div>
    <span class="task-priority ${priClass}">${priority.charAt(0).toUpperCase()+priority.slice(1).toLowerCase()}</span>
  `;
  list.appendChild(div);
  showToast('Task Added', taskText, 'success');
}

// ════════════════════════════════════════════════════════════
//  DELETE ROW
// ════════════════════════════════════════════════════════════
function deleteRow(btn) {
  if (!confirm('Remove this booking and client card?')) return;
  const row = btn.closest('tr');
  const bookingId = row.querySelector('td:first-child')?.textContent || '';
  const clientNameElement = row.querySelector('.event-client')?.textContent || '';
  const clientName = clientNameElement.trim();
  
  // Find and remove from bookings storage
  const bookingToDelete = bookings.find(b => b.id === bookingId);
  if (bookingToDelete) {
    bookings = bookings.filter(b => b.id !== bookingId);
    saveBookings();
    
    // Also remove matching client card
    const fullName = `${bookingToDelete.firstName} ${bookingToDelete.lastName}`;
    clients = clients.filter(c => c.name !== fullName);
    saveClientsToStorage();
    
    // Re-render clients grid
    renderClients();
  }
  
  row.remove();
  refreshBookingBadge();
  showToast('Deleted', 'Booking and client card removed.', 'info');
}

// ════════════════════════════════════════════════════════════
//  REVENUE CHART (bars)
// ════════════════════════════════════════════════════════════
const months  = ['Jan','Feb','Mar','Apr','May','Jun'];
const amounts = [4.2, 5.8, 6.1, 7.3, 9.5, 8.8];
const maxAmt  = Math.max(...amounts);
const wrap    = document.getElementById('revenueChart');
if (wrap) {
  amounts.forEach((v, i) => {
    const col = document.createElement('div');
    col.className = 'bar-col';
    const pct = (v / maxAmt * 100).toFixed(0);
    col.innerHTML = `
      <span class="bar-val">${v}M</span>
      <div class="bar" style="height:${pct}%" title="UGX ${v}M"></div>
      <span class="bar-label">${months[i]}</span>
    `;
    wrap.appendChild(col);
  });
}

// ════════════════════════════════════════════════════════════
//  DONUT CHART
// ════════════════════════════════════════════════════════════
const donutData = [
  { label:'Weddings',       value:35, color:'#C9A84C' },
  { label:'Introductions',  value:20, color:'#E8C97E' },
  { label:'Birthdays',      value:18, color:'#4CAF50' },
  { label:'Corporate',      value:15, color:'#2196F3' },
  { label:'Other',          value:12, color:'#9C6B26' },
];
const svgEl  = document.getElementById('donutChart');
const legend = document.getElementById('donutLegend');
if (svgEl && legend) {
  const total = donutData.reduce((a, d) => a + d.value, 0);
  const r = 38, cx = 50, cy = 50;
  let offset = -90;
  donutData.forEach(d => {
    const pct = d.value / total;
    const deg = pct * 360;
    const r1  = offset * Math.PI / 180;
    const r2  = (offset + deg) * Math.PI / 180;
    const x1  = cx + r * Math.cos(r1);
    const y1  = cy + r * Math.sin(r1);
    const x2  = cx + r * Math.cos(r2);
    const y2  = cy + r * Math.sin(r2);
    const lg  = deg > 180 ? 1 : 0;
    const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
    path.setAttribute('d', `M ${cx} ${cy} L ${x1} ${y1} A ${r} ${r} 0 ${lg} 1 ${x2} ${y2} Z`);
    path.setAttribute('fill', d.color);
    path.setAttribute('opacity', '0.85');
    svgEl.appendChild(path);
    offset += deg;
    legend.innerHTML += `
      <div class="legend-item">
        <div class="legend-dot" style="background:${d.color}"></div>
        <span style="color:rgba(255,255,255,0.7)">${d.label}</span>
        <span>${d.value}%</span>
      </div>
    `;
  });
  const hole = document.createElementNS('http://www.w3.org/2000/svg','circle');
  hole.setAttribute('cx','50'); hole.setAttribute('cy','50');
  hole.setAttribute('r','24'); hole.setAttribute('fill','#2C2820');
  svgEl.appendChild(hole);
}

// ════════════════════════════════════════════════════════════
//  INITIALIZE
// ════════════════════════════════════════════════════════════
document.addEventListener('DOMContentLoaded', () => {
  loadBookings();
  loadClientsFromStorage();
  renderClients();
  loadInquiries();
  renderInquiries();
  updateInquiryBadge();
  refreshBookingBadge();
  updateDashboardStats();
  renderUpcomingEvents();
  
  // Render initial bookings table
  const tbody = document.getElementById('bookingsTableBody');
  if (tbody && bookings.length > 0) {
    // Clear default rows and populate from storage
    tbody.innerHTML = '';
    bookings.forEach(b => {
      const formattedDate = new Date(b.date + 'T00:00:00').toLocaleDateString('en-US', { month:'short', day:'numeric', year:'numeric' });
      const initials = (b.firstName[0] + b.lastName[0]).toUpperCase();
      const row = createBookingRow({
        id: b.id,
        initials: initials,
        clientName: `${b.firstName} ${b.lastName}`,
        eventType: b.eventType,
        date: formattedDate,
        venue: b.venue,
        package: b.package,
        amount: b.amount,
        status: b.status,
        statusClass: mapStatusClass(b.status),
        phone: b.phone,
        email: b.email,
        notes: b.notes,
      });
      tbody.appendChild(row);
    });
  }
});
</script>
</body>
</html>
