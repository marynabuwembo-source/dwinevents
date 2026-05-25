<?php
// ============================================================
//  DWIN EVENTS — Login Page
// ============================================================
session_start();
require_once 'config/database.php';

// Already logged in?
if (!empty($_SESSION['user_id'])) {
    $dest = ($_SESSION['user_role'] === 'admin') ? 'dashboard.php' : 'INDEX.php';
    header('Location: ' . $dest);
    exit;
}

$error      = '';
$emailValue = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailValue = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '');
    $password   = $_POST['password'] ?? '';

    if ($emailValue === '' || $password === '') {
        $error = 'Please fill in all fields.';
    } else {
        $db   = getDB();
        $stmt = $db->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$emailValue]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            // Regenerate session ID to prevent fixation
            session_regenerate_id(true);

            $_SESSION['user_id']    = $user['id'];
            $_SESSION['user_name']  = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role']  = $user['role'];

            $dest = ($user['role'] === 'admin') ? 'dashboard.php' : 'INDEX.php';
            header('Location: ' . $dest);
            exit;
        }

        $error = 'Invalid email or password. Please try again.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DWIN Events — Login</title>
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
        url('https://images.unsplash.com/photo-1519167758481-83f550bb49b3?q=80&w=1600&auto=format&fit=crop') center/cover fixed;
      font-family: var(--font-b);
      padding: 20px;
    }

    .auth-container {
      width: 100%;
      max-width: 440px;
    }

    .auth-card {
      background: var(--charcoal-2);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 50px 40px 40px;
      box-shadow: 0 20px 60px rgba(0,0,0,0.5);
    }

    .logo {
      text-align: center;
      margin-bottom: 36px;
    }
    .logo h1 {
      font-family: var(--font-d);
      color: var(--gold);
      font-size: 44px;
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

    .auth-title {
      text-align: center;
      margin-bottom: 28px;
    }
    .auth-title h2 {
      color: var(--ivory);
      font-family: var(--font-d);
      font-size: 26px;
      font-weight: 400;
      margin-bottom: 6px;
    }
    .auth-title span {
      color: var(--muted);
      font-size: 13px;
    }

    .alert {
      border-radius: 6px;
      padding: 13px 16px;
      margin-bottom: 22px;
      font-size: 13px;
      text-align: center;
    }
    .alert-error {
      background: rgba(244,67,54,0.12);
      border: 1px solid rgba(244,67,54,0.3);
      color: #ffb3ae;
    }
    .alert-success {
      background: rgba(201,168,76,0.12);
      border: 1px solid var(--border);
      color: var(--ivory);
    }

    .form-group { margin-bottom: 20px; }
    .form-group label {
      display: block;
      color: var(--muted);
      font-size: 10px;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      margin-bottom: 8px;
      font-weight: 600;
    }

    .input-wrap { position: relative; }
    .input-wrap i {
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
    .input-wrap input::placeholder { color: #666; }

    /* Password toggle */
    .input-wrap .pw-toggle {
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
    .input-wrap .pw-toggle:hover { color: var(--gold); }
    .input-wrap input.has-toggle { padding-right: 44px; }

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
      margin-top: 8px;
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

    .auth-footer {
      text-align: center;
      color: var(--muted);
      font-size: 13px;
    }
    .auth-footer a { color: var(--gold); text-decoration: none; font-weight: 500; }
    .auth-footer a:hover { text-decoration: underline; }

    .copyright {
      text-align: center;
      color: var(--muted);
      font-size: 11px;
      margin-top: 28px;
    }

    @media (max-width: 480px) {
      .auth-card { padding: 36px 24px 30px; }
      .logo h1 { font-size: 36px; }
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
      <h2>Welcome Back</h2>
      <span>Sign in to your account</span>
    </div>

    <?php if ($error): ?>
      <div class="alert alert-error">
        <i class="bi bi-exclamation-circle"></i>
        <?php echo htmlspecialchars($error); ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($_GET['registered'])): ?>
      <div class="alert alert-success">
        <i class="bi bi-check-circle"></i>
        Account created! You can now log in.
      </div>
    <?php endif; ?>

    <?php if (!empty($_GET['logout'])): ?>
      <div class="alert alert-success">
        <i class="bi bi-box-arrow-left"></i>
        You have been signed out successfully.
      </div>
    <?php endif; ?>

    <form action="login.php" method="POST" novalidate>

      <div class="form-group">
        <label for="email">Email Address</label>
        <div class="input-wrap">
          <i class="bi bi-envelope"></i>
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
          <i class="bi bi-lock"></i>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter your password"
            autocomplete="current-password"
            class="has-toggle"
            required
          >
          <button type="button" class="pw-toggle" onclick="togglePw('password', this)" tabindex="-1">
            <i class="bi bi-eye"></i>
          </button>
        </div>
      </div>

      <button type="submit" class="btn-primary">Sign In</button>

    </form>

    <div class="divider">or</div>

    <div class="auth-footer">
      Don't have an account? <a href="register.php">Create one</a>
    </div>

    <div class="copyright">© 2026 DWIN Events. All Rights Reserved.</div>

  </div>
</div>

<script>
function togglePw(id, btn) {
  const input = document.getElementById(id);
  const icon  = btn.querySelector('i');
  if (input.type === 'password') {
    input.type = 'text';
    icon.className = 'bi bi-eye-slash';
  } else {
    input.type = 'password';
    icon.className = 'bi bi-eye';
  }
}
</script>

</body>
</html>
