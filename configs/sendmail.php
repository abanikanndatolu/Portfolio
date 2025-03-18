<?php
header("Content-Type: application/json"); // Ensure JSON response

// Check if config file exists
if (!file_exists('config.php')) {
    echo json_encode(["error" => "Configuration file missing."]);
    exit;
}

$config = include('config.php');

$apiKey = $config['brevo_api_key'] ?? null;
$recipientEmail = $config['recipient_email'] ?? null;
$recipientName = $config['recipient_name'] ?? null;

// Validate API key and recipient details
if (!$apiKey || !$recipientEmail || !$recipientName) {
    echo json_encode(["error" => "Missing API key or recipient details in config.php"]);
    exit;
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $message = htmlspecialchars($_POST['textarea'] ?? '');

    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(["error" => "Name, Email, and Message are required."]);
        exit;
    }

    $data = [
        "sender" => [
            "name" => "SENDER NAME HERE",
            "email" => "SENDER EMAIL HERE"
        ],
        "to" => [[
            "email" => $recipientEmail,
            "name" => $recipientName
        ]],
        "subject" => "New Contact Form Submission",
        "htmlContent" => "<html><body>
                            <p><strong>Name:</strong> $name</p>
                            <p><strong>Email:</strong> $email</p>
                            <p><strong>Phone:</strong> $phone</p>
                            <p><strong>Message:</strong> $message</p>
                           </body></html>"
    ];

    // cURL request to Brevo API
    $ch = curl_init("https://api.brevo.com/v3/smtp/email");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Accept: application/json",
        "api-key: $apiKey",
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($httpCode === 201) {
        json_encode(["status" => "success"]); // Return success flag
    } else {
        json_encode(["status" => "error", "response" => $response, "curlError" => $curlError]);
    }
} else {
   json_encode(["error" => "Invalid request method."]);
}
?>
