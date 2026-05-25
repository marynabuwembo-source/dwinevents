<?php
// ============================================================
//  DWIN EVENTS — Auth Helper
//  Include at the top of any protected page.
//
//  Usage (public pages — logged-in users only):
//    require_once 'config/auth.php';
//    requireLogin();
//
//  Usage (admin-only pages like dashboard):
//    require_once 'config/auth.php';
//    requireAdmin();
// ============================================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ── Helpers ──────────────────────────────────────────────────

function isLoggedIn(): bool {
    return !empty($_SESSION['user_id']);
}

function isAdmin(): bool {
    return isLoggedIn() && ($_SESSION['user_role'] ?? '') === 'admin';
}

function requireLogin(string $redirect = 'login.php'): void {
    if (!isLoggedIn()) {
        header('Location: ' . $redirect);
        exit;
    }
}

function requireAdmin(string $redirect = 'login.php'): void {
    if (!isAdmin()) {
        // Logged in but not admin → send to public home
        if (isLoggedIn()) {
            header('Location: INDEX.php');
            exit;
        }
        header('Location: ' . $redirect);
        exit;
    }
}

function currentUser(): array {
    return [
        'id'    => $_SESSION['user_id']    ?? null,
        'name'  => $_SESSION['user_name']  ?? '',
        'email' => $_SESSION['user_email'] ?? '',
        'role'  => $_SESSION['user_role']  ?? 'user',
    ];
}
