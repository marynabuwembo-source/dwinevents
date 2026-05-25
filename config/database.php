<?php
// ============================================================
//  DWIN EVENTS — Database Configuration
//  PDO connection + auto-create users table on first run
// ============================================================

define('DB_HOST', 'localhost');
define('DB_NAME', 'dwin_events');
define('DB_USER', 'root');     
define('DB_PASS', 'admin');           
define('DB_CHARSET', 'utf8mb4');

function getDB(): PDO {
    static $pdo = null;
    if ($pdo !== null) return $pdo;

    $dsn = sprintf(
        'mysql:host=%s;dbname=%s;charset=%s',
        DB_HOST, DB_NAME, DB_CHARSET
    );

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (PDOException $e) {
        // Show a clean error — never expose raw exception in production
        die('<div style="font-family:sans-serif;padding:40px;color:#c0392b;">
              <strong>Database connection failed.</strong><br>
              Please check your credentials in <code>config/database.php</code>.<br>
              <small>' . htmlspecialchars($e->getMessage()) . '</small>
             </div>');
    }

    // ── Auto-create tables on first run ───────────────────
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name          VARCHAR(120)  NOT NULL,
            email         VARCHAR(180)  NOT NULL UNIQUE,
            password_hash VARCHAR(255)  NOT NULL,
            role          ENUM('user','admin') NOT NULL DEFAULT 'user',
            created_at    DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");

    // ── Seed default admin if none exists ─────────────────
    $stmt = $pdo->query("SELECT COUNT(*) FROM users WHERE role = 'admin'");
    if ((int) $stmt->fetchColumn() === 0) {
        $hash = password_hash('Admin@2026', PASSWORD_BCRYPT);
        $pdo->prepare("
            INSERT INTO users (name, email, password_hash, role)
            VALUES (?, ?, ?, 'admin')
        ")->execute(['DWIN Admin', 'admin@dwinevents.com', $hash]);
    }

    return $pdo;
}
