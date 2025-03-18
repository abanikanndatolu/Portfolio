# Portfolio Website - README

## 📌 Overview
This is my personal portfolio website, designed using **HTML, CSS, Bootstrap, and Mobirise**. It showcases my skills, projects, and professional background, along with a functional **contact form** powered by a PHP backend that integrates with the **Brevo API** for email notifications.

## 🚀 Features
- Responsive and modern design built with **Bootstrap & Mobirise**
- Dynamic **contact form** with AJAX-based validation
- **PHP backend** for handling form submissions securely
- Integration with **Brevo API** for sending emails
- Fully mobile-friendly layout

## 🛠️ Tech Stack
- **Frontend:** HTML, CSS, Bootstrap, Mobirise
- **Backend:** PHP, AJAX, cURL (for Brevo API integration)
- **Database:** None (Emails are sent directly via Brevo API)

## 📂 Project Structure
```
portfolio-website/
├── assets/                  # Static assets (CSS, JS, images)
│   ├── sendmail.php         # PHP backend for handling form submissions
│   ├── config.php           # Configuration file for API keys & recipient details
├── index.html               # Main landing page with about me section, contact form.
├── README.md                # This documentation file
```

## 📌 Backend Setup Guide

### 1️⃣ **Requirements**
Ensure your server supports:
- PHP 7.4 or later
- cURL enabled (for Brevo API requests)
- A web server (Apache/Nginx) or local server (XAMPP/LAMP/WAMP)

### 2️⃣ **Configuration**
1. Open `config.php` and update with your details:
    ```php
    return [
        'brevo_api_key' => 'your-api-key-here',
        'recipient_email' => 'your-email@example.com',
        'recipient_name' => 'Your Name'
    ];
    ```
2. Ensure `sendmail.php` is in the correct directory (`/configs/sendmail.php`).

### 3️⃣ **Deployment**
- Upload all files to your hosting server.
- Ensure `sendmail.php` has correct file permissions (755 recommended).
- Test the contact form by submitting a message.

### 4️⃣ **Troubleshooting**
If emails are not sending:
- Check the Brevo API key in `config.php`.
- Ensure your server allows **outgoing requests** via cURL.
- Inspect the browser console (F12 > Console) for AJAX errors.
- Debug `sendmail.php` by logging responses using `error_log()`.

## 🚫 Image Copyright Notice
All images of me featured on this website **are copyrighted and cannot be copied, reused, modified, or sold without my explicit permission**. Unauthorized use will be subject to legal action.

## 📞 Contact
For any inquiries or issues, reach out v+2348148226089(whatsapp) or AbanikanndaTolu(facebook,ig,twitter,linkedin).

---
© 2025 Tolulope Abanikannda. All rights reserved.

