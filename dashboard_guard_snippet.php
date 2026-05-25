<?php
// ============================================================
//  DWIN EVENTS — Dashboard (Admin Only)
//  Replace the existing session_start() block at the top of
//  your dashboard.php with this block.
// ============================================================
require_once 'config/auth.php';
requireAdmin(); // Redirects non-admins to login.php

// $user is now available throughout the page
$user = currentUser();
?>
