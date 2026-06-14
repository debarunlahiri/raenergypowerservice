<?php
session_start();

require_once __DIR__ . '/includes/site-data.php';
require_once __DIR__ . '/includes/send-contact-email.php';

header('Content-Type: application/json');

// Basic rate limiting: allow 5 submissions per session
if (!isset($_SESSION['contact_submissions'])) {
    $_SESSION['contact_submissions'] = 0;
    $_SESSION['contact_first_submit'] = time();
}

$_SESSION['contact_submissions']++;

// Reset counter after 30 minutes
if (time() - $_SESSION['contact_first_submit'] > 1800) {
    $_SESSION['contact_submissions'] = 1;
    $_SESSION['contact_first_submit'] = time();
}

if ($_SESSION['contact_submissions'] > 5) {
    http_response_code(429);
    echo json_encode(['success' => false, 'message' => 'Too many submissions. Please try again later.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

// CSRF validation
$csrfToken = $_POST['csrf_token'] ?? '';
if (empty($csrfToken) || !hash_equals($_SESSION['csrf_token'] ?? '', $csrfToken)) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Invalid security token. Please refresh the page and try again.']);
    exit;
}

// Honeypot check: if "website" field is filled, it's a bot
if (!empty($_POST['website'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid submission.']);
    exit;
}

$name    = trim($_POST['name'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$email   = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

$fieldErrors = [];
$phoneRegex = '/^[\+]?[0-9\s\-\.\(\)xext]{7,50}$/i';
$emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';

// Name validation
if (empty($name)) {
    $fieldErrors['name'] = 'Please enter your name.';
} elseif (mb_strlen($name) < 2) {
    $fieldErrors['name'] = 'Name must be at least 2 characters.';
} elseif (mb_strlen($name) > 100) {
    $fieldErrors['name'] = 'Name must be less than 100 characters.';
}

// Phone validation
if (empty($phone)) {
    $fieldErrors['phone'] = 'Please enter your phone number.';
} else {
    $digitsOnly = preg_replace('/\D/', '', $phone);
    if (strlen($digitsOnly) < 10) {
        $fieldErrors['phone'] = 'Phone number must have at least 10 digits.';
    } elseif (!preg_match($phoneRegex, $phone)) {
        $fieldErrors['phone'] = 'Please enter a valid phone number.';
    }
}

// Email validation (optional field but must be valid if provided)
if (!empty($email)) {
    if (!preg_match($emailRegex, $email)) {
        $fieldErrors['email'] = 'Please enter a valid email address.';
    } elseif (strlen($email) > 255) {
        $fieldErrors['email'] = 'Email must be less than 255 characters.';
    }
}

// Message validation
if (empty($message)) {
    $fieldErrors['message'] = 'Please describe your requirement.';
} elseif (mb_strlen($message) < 10) {
    $fieldErrors['message'] = 'Requirement must be at least 10 characters.';
} elseif (mb_strlen($message) > 2000) {
    $fieldErrors['message'] = 'Requirement must be less than 2000 characters.';
}

if (!empty($fieldErrors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Please correct the errors below.', 'field_errors' => $fieldErrors]);
    exit;
}

// Clean inputs for email
$name    = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$phone   = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
$email   = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

$result = send_contact_email([
    'name'    => $name,
    'phone'   => $phone,
    'email'   => $email,
    'message' => $message,
]);

http_response_code($result['success'] ? 200 : 500);
echo json_encode($result);
