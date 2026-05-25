<?php

session_start();
require_once 'config/database.php';

// Already logged in → redirect
if (!empty($_SESSION['user_id'])) {
    $dest = ($_SESSION['user_role'] === 'admin') ? 'dashboard.php' : 'INDEX.php';
    header('Location: ' . $dest);
    exit;
}

$errors     = [];
$nameValue  = '';
$emailValue = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nameValue  = trim($_POST['name']  ?? '');
    $emailValue = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '');
    $password   = $_POST['password']  ?? '';
    $confirm    = $_POST['confirm']   ?? '';

    // ── Validation ───────────────────────────────────────
    if ($nameValue === '') {
        $errors[] = 'Full name is required.';
    } elseif (strlen($nameValue) < 2 || strlen($nameValue) > 120) {
        $errors[] = 'Name must be between 2 and 120 characters.';
    }

    if ($emailValue === '' || !filter_var($emailValue, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'A valid email address is required.';
    }

    if (strlen($password) < 8) {
        $errors[] = 'Password must be at least 8 characters.';
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $errors[] = 'Password must contain at least one uppercase letter.';
    } elseif (!preg_match('/[0-9]/', $password)) {
        $errors[] = 'Password must contain at least one number.';
    }

    if ($password !== $confirm) {
        $errors[] = 'Passwords do not match.';
    }

    // ── Check duplicate email ────────────────────────────
    if (empty($errors)) {
        $db   = getDB();
        $stmt = $db->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$emailValue]);
        if ($stmt->fetch()) {
            $errors[] = 'An account with this email already exists.';
        }
    }

    // ── Create account ───────────────────────────────────
    if (empty($errors)) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $db->prepare("
            INSERT INTO users (name, email, password_hash, role)
            VALUES (?, ?, ?, 'user')
        ")->execute([$nameValue, $emailValue, $hash]);

        header('Location: login.php?registered=1');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DWIN Events — Create Account</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --gold:       #C9A84C;
      --gold-light: #E8C97E;
      --charcoal:   #1A1814;
      --charcoal-2: #221F1A;
      --charcoal-3: #2C2820;
      --muted:      #8C8478;
      --ivory:      #FAF6EE;
      --border:     rgba(201,168,76,0.18);
      --font-d:     'Cormorant Garamond', serif;
      --font-b:     'Jost', sans-serif;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background:
        linear-gradient(rgba(26,24,20,0.92), rgba(26,24,20,0.92)),
        url('https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?q=80&w=1600&auto=format&fit=crop') center/cover fixed;
      font-family: var(--font-b);
      padding: 24px 20px;
    }

    .auth-container { width: 100%; max-width: 460px; }

    .auth-card {
      background: var(--charcoal-2);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 48px 40px 40px;
      box-shadow: 0 20px 60px rgba(0,0,0,0.5);
    }

    .logo { text-align: center; margin-bottom: 32px; }
    .logo h1 {
      font-family: var(--font-d);
      color: var(--gold);
      font-size: 42px;
      font-weight: 600;
      letter-spacing: 3px;
      margin-bottom: 4px;
    }
    .logo p {
      color: var(--muted);
      font-size: 11px;
      letter-spacing: 3.5px;
      text-transform: uppercase;
    }

    .auth-title { text-align: center; margin-bottom: 26px; }
    .auth-title h2 {
      color: var(--ivory);
      font-family: var(--font-d);
      font-size: 26px;
      font-weight: 400;
      margin-bottom: 6px;
    }
    .auth-title span { color: var(--muted); font-size: 13px; }

    .alert-error {
      background: rgba(244,67,54,0.1);
      border: 1px solid rgba(244,67,54,0.28);
      border-radius: 6px;
      padding: 14px 16px;
      margin-bottom: 22px;
    }
    .alert-error ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }
    .alert-error ul li {
      color: #ffb3ae;
      font-size: 13px;
      padding: 2px 0;
    }
    .alert-error ul li::before { content: '• '; }

    .form-group { margin-bottom: 18px; }
    .form-group label {
      display: block;
      color: var(--muted);
      font-size: 10px;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      margin-bottom: 8px;
      font-weight: 600;
    }
    .form-group .hint {
      color: rgba(140,132,120,0.7);
      font-size: 11px;
      margin-top: 5px;
    }

    .input-wrap { position: relative; }
    .input-wrap i.icon {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--gold);
      font-size: 15px;
      pointer-events: none;
    }
    .input-wrap input {
      width: 100%;
      background: var(--charcoal-3);
      border: 1px solid var(--border);
      border-radius: 5px;
      padding: 13px 14px 13px 44px;
      color: #fff;
      font-size: 14px;
      font-family: var(--font-b);
      outline: none;
      transition: 0.3s;
    }
    .input-wrap input:focus {
      border-color: var(--gold);
      box-shadow: 0 0 0 3px rgba(201,168,76,0.1);
    }
    .input-wrap input.invalid { border-color: rgba(244,67,54,0.5); }
    .input-wrap input::placeholder { color: #666; }

    .pw-toggle {
      position: absolute;
      right: 13px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--muted);
      cursor: pointer;
      font-size: 16px;
      background: none;
      border: none;
      padding: 0;
    }
    .pw-toggle:hover { color: var(--gold); }

    /* Password strength bar */
    .pw-strength { margin-top: 8px; }
    .pw-strength-bar {
      height: 3px;
      border-radius: 2px;
      background: rgba(255,255,255,0.08);
      overflow: hidden;
    }
    .pw-strength-fill {
      height: 100%;
      border-radius: 2px;
      transition: width 0.3s, background 0.3s;
      width: 0;
    }
    .pw-strength-label { font-size: 11px; margin-top: 4px; color: var(--muted); }

    .btn-primary {
      width: 100%;
      background: var(--gold);
      color: var(--charcoal);
      border: none;
      padding: 14px;
      border-radius: 5px;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      cursor: pointer;
      font-family: var(--font-b);
      transition: 0.3s;
      margin-top: 10px;
    }
    .btn-primary:hover { background: var(--gold-light); transform: translateY(-1px); }

    .divider {
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 24px 0;
      color: var(--muted);
      font-size: 11px;
      letter-spacing: 1px;
      text-transform: uppercase;
    }
    .divider::before, .divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--border);
    }

    .auth-footer { text-align: center; color: var(--muted); font-size: 13px; }
    .auth-footer a { color: var(--gold); text-decoration: none; font-weight: 500; }
    .auth-footer a:hover { text-decoration: underline; }

    .copyright { text-align: center; color: var(--muted); font-size: 11px; margin-top: 28px; }

    @media (max-width: 480px) {
      .auth-card { padding: 36px 22px 28px; }
    }
  </style>
</head>
<body>

<div class="auth-container">
  <div class="auth-card">

    <div class="logo">
      <h1>DWIN</h1>
      <p>Events</p>
    </div>

    <div class="auth-title">
      <h2>Create Account</h2>
      <span>Join DWIN Events today</span>
    </div>

    <?php if (!empty($errors)): ?>
      <div class="alert-error">
        <ul>
          <?php foreach ($errors as $e): ?>
            <li><?php echo htmlspecialchars($e); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="register.php" method="POST" novalidate id="regForm">

      <div class="form-group">
        <label for="name">Full Name</label>
        <div class="input-wrap">
          <i class="bi bi-person icon"></i>
          <input
            type="text"
            id="name"
            name="name"
            placeholder="Your full name"
            value="<?php echo htmlspecialchars($nameValue); ?>"
            autocomplete="name"
            required
          >
        </div>
      </div>

      <div class="form-group">
        <label for="email">Email Address</label>
        <div class="input-wrap">
          <i class="bi bi-envelope icon"></i>
          <input
            type="email"
            id="email"
            name="email"
            placeholder="you@example.com"
            value="<?php echo htmlspecialchars($emailValue); ?>"
            autocomplete="email"
            required
          >
        </div>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <div class="input-wrap">
          <i class="bi bi-lock icon"></i>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Min. 8 characters"
            autocomplete="new-password"
            oninput="checkStrength(this.value)"
            style="padding-right:44px;"
            required
          >
          <button type="button" class="pw-toggle" onclick="togglePw('password', this)" tabindex="-1">
            <i class="bi bi-eye"></i>
          </button>
        </div>
        <div class="pw-strength">
          <div class="pw-strength-bar"><div class="pw-strength-fill" id="strengthFill"></div></div>
          <div class="pw-strength-label" id="strengthLabel"></div>
        </div>
      </div>

      <div class="form-group">
        <label for="confirm">Confirm Password</label>
        <div class="input-wrap">
          <i class="bi bi-lock-fill icon"></i>
          <input
            type="password"
            id="confirm"
            name="confirm"
            placeholder="Re-enter your password"
            autocomplete="new-password"
            style="padding-right:44px;"
            required
          >
          <button type="button" class="pw-toggle" onclick="togglePw('confirm', this)" tabindex="-1">
            <i class="bi bi-eye"></i>
          </button>
        </div>
      </div>

      <button type="submit" class="btn-primary">Create Account</button>

    </form>

    <div class="divider">or</div>

    <div class="auth-footer">
      Already have an account? <a href="login.php">Sign in</a>
    </div>

    <div class="copyright">© 2026 DWIN Events. All Rights Reserved.</div>

  </div>
</div>

<script>
function togglePw(id, btn) {
  const input = document.getElementById(id);
  const icon  = btn.querySelector('i');
  input.type  = input.type === 'password' ? 'text' : 'password';
  icon.className = input.type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
}

function checkStrength(val) {
  const fill  = document.getElementById('strengthFill');
  const label = document.getElementById('strengthLabel');
  let score = 0;
  if (val.length >= 8)          score++;
  if (/[A-Z]/.test(val))        score++;
  if (/[0-9]/.test(val))        score++;
  if (/[^A-Za-z0-9]/.test(val)) score++;

  const levels = [
    { w: '0%',   bg: 'transparent', text: '' },
    { w: '25%',  bg: '#F44336',    text: 'Weak' },
    { w: '50%',  bg: '#FF9800',    text: 'Fair' },
    { w: '75%',  bg: '#C9A84C',    text: 'Good' },
    { w: '100%', bg: '#4CAF50',    text: 'Strong' },
  ];
  const l = levels[score] || levels[0];
  fill.style.width      = val ? l.w  : '0%';
  fill.style.background = l.bg;
  label.textContent     = val ? l.text : '';
  label.style.color     = l.bg || 'var(--muted)';
}
</script>

</body>
</html>
