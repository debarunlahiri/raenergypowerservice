<?php
/**
 * Contact form email handler for RA Energy Power Service
 * Uses PHPMailer with SMTP to send via cPanel email account
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/PHPMailer/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/SMTP.php';
require_once __DIR__ . '/PHPMailer/Exception.php';
require_once __DIR__ . '/env.php';

// Load .env variables
load_env(__DIR__ . '/../.env');

function send_contact_email(array $data): array
{
    // SMTP Configuration from .env
    $smtpHost = env('SMTP_HOST', 'mail.raenergypowerservice.in');
    $smtpPort = (int) env('SMTP_PORT', '465');
    $smtpUser = env('SMTP_USER');
    $smtpPass = env('SMTP_PASS');
    
    $fromEmail = env('SMTP_FROM', 'contactus@raenergypowerservice.in');
    $fromName  = env('SMTP_FROM_NAME', 'RA Energy Power Service');
    
    $toEmail   = env('SMTP_TO', 'debarunlahiri2016@gmail.com');
    $ccEmail   = env('SMTP_CC', 'debarunlahiri2011@gmail.com');
    
    // Try multiple SMTP configurations (hosts + encryption + ports)
    $configs = [
        ['host' => $smtpHost, 'secure' => PHPMailer::ENCRYPTION_SMTPS, 'port' => $smtpPort],
        ['host' => 'raenergypowerservice.in', 'secure' => PHPMailer::ENCRYPTION_SMTPS, 'port' => $smtpPort],
        ['host' => $smtpHost, 'secure' => PHPMailer::ENCRYPTION_STARTTLS, 'port' => ($smtpPort === 465 ? 587 : $smtpPort)],
        ['host' => 'raenergypowerservice.in', 'secure' => PHPMailer::ENCRYPTION_STARTTLS, 'port' => ($smtpPort === 465 ? 587 : $smtpPort)],
    ];
    
    foreach ($configs as $config) {
        $mail = new PHPMailer(true);
        
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = $config['host'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $smtpUser;
            $mail->Password   = $smtpPass;
            $mail->SMTPSecure = $config['secure'];
            $mail->Port       = $config['port'];
            $mail->Timeout    = 15;
            $mail->SMTPKeepAlive = false;
            
            // Anti-spam / deliverability headers
            $mail->XMailer   = 'RA Energy Power Service Mailer';
            $mail->Priority  = 3; // Normal priority
            $mail->MessageID = '<' . uniqid('contact-', true) . '@raenergypowerservice.in>';
            
            // Set Return-Path to match From (SPF alignment)
            $mail->Sender = $fromEmail;
            
            // Recipients
            $mail->setFrom($fromEmail, $fromName);
            $mail->addAddress($toEmail);
            $mail->addCC($ccEmail);
            
            // Set Reply-To as the visitor's email so replies go directly to them
            if (!empty($data['email'])) {
                $mail->addReplyTo($data['email'], $data['name'] ?? '');
            }
            
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'New Contact Form Submission from ' . ($data['name'] ?? 'Website Visitor');
            
            // Build the HTML email
            $mail->Body    = build_email_html($data);
            $mail->AltBody = build_email_plain($data);
            
            // Additional headers for deliverability
            $mail->addCustomHeader('Precedence', 'normal');
            $mail->addCustomHeader('Auto-Submitted', 'auto-generated');
            
            $mail->send();
            
            return ['success' => true, 'message' => 'Thank you! Your message has been sent successfully.'];
        } catch (Exception $e) {
            continue; // Try next configuration
        }
    }
    
    // If we get here, all configurations failed
    return ['success' => false, 'message' => 'Sorry, there was an error sending your message. Please try again later.'];
}

function build_email_html(array $data): string
{
    $name    = htmlspecialchars($data['name'] ?? '', ENT_QUOTES, 'UTF-8');
    $phone   = htmlspecialchars($data['phone'] ?? '', ENT_QUOTES, 'UTF-8');
    $email   = htmlspecialchars($data['email'] ?? '', ENT_QUOTES, 'UTF-8');
    $message = nl2br(htmlspecialchars($data['message'] ?? '', ENT_QUOTES, 'UTF-8'));
    $date    = date('F j, Y \a\t g:i A');
    
    return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body { margin: 0; padding: 0; background-color: #f4f7fa; font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .wrapper { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        .header { background-color: #174ea6; padding: 32px 24px; text-align: center; }
        .header h1 { color: #ffffff; margin: 0; font-size: 22px; font-weight: 700; letter-spacing: 0.5px; }
        .header p { color: #d0e0ff; margin: 8px 0 0; font-size: 14px; }
        .content { padding: 32px 24px; }
        .field { margin-bottom: 24px; }
        .field-label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #5b6472; margin-bottom: 6px; }
        .field-value { font-size: 15px; color: #111827; line-height: 1.6; }
        .message-box { background-color: #f4f7fa; border-left: 4px solid #174ea6; padding: 16px; border-radius: 0 6px 6px 0; }
        .footer { background-color: #f4f7fa; padding: 20px 24px; text-align: center; font-size: 12px; color: #5b6472; }
        .footer a { color: #174ea6; text-decoration: none; }
        .divider { height: 1px; background-color: #d9e0e8; margin: 24px 0; }
        .meta { font-size: 12px; color: #8b949e; text-align: center; margin-top: 8px; }
    </style>
</head>
<body>
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td align="center" style="padding: 40px 16px;">
                <div class="wrapper">
                    <div class="header">
                        <h1>New Contact Form Submission</h1>
                        <p>RA Energy Power Service</p>
                    </div>
                    <div class="content">
                        <div class="field">
                            <div class="field-label">Name</div>
                            <div class="field-value">{$name}</div>
                        </div>
                        <div class="field">
                            <div class="field-label">Phone</div>
                            <div class="field-value">{$phone}</div>
                        </div>
                        <div class="field">
                            <div class="field-label">Email</div>
                            <div class="field-value">{$email}</div>
                        </div>
                        <div class="divider"></div>
                        <div class="field">
                            <div class="field-label">Requirement / Message</div>
                            <div class="message-box">
                                <div class="field-value">{$message}</div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <p>Submitted on {$date}</p>
                        <p style="margin-top: 8px;">This message was sent from the contact form on <a href="https://raenergypowerservice.in">raenergypowerservice.in</a></p>
                    </div>
                </div>
                <p class="meta">RA Energy Power Service &bull; Industrial Power Solutions</p>
            </td>
        </tr>
    </table>
</body>
</html>
HTML;
}

function build_email_plain(array $data): string
{
    $name    = $data['name'] ?? '';
    $phone   = $data['phone'] ?? '';
    $email   = $data['email'] ?? '';
    $message = $data['message'] ?? '';
    $date    = date('F j, Y \a\t g:i A');
    
    return <<<TEXT
NEW CONTACT FORM SUBMISSION
RA Energy Power Service

----------------------------
Name:    {$name}
Phone:   {$phone}
Email:   {$email}
----------------------------

Requirement / Message:
{$message}

----------------------------
Submitted on: {$date}
Sent from: https://raenergypowerservice.in
TEXT;
}
