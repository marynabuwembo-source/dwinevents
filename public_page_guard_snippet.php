<?php
// ============================================================
//  DWIN EVENTS — Public Page Guard
//  Add this block at the very top of:
//  INDEX.php, About.php, Services.php, portfolio.php,
//  contact.php, FAQ.php
//
//  It requires any visitor to be logged in (user OR admin).
//  If not logged in → sent to login.php
// ============================================================
require_once 'config/auth.php';
requireLogin(); // Any logged-in user (user or admin) may view this page

$user = currentUser(); // Available to use in nav: $user['name'], $user['role']
?>
