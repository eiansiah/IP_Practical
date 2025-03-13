<?php
class Security {
    private $encryption_key = 'your_secret_key';

    // Input Validation
    public function validateInput($data) {
        return htmlspecialchars(strip_tags(trim($data)));
        // Strips out malicious scripts 
        // Trims unnecessary spaces (clean input)
    }

    // Data Protection (Basic Encryption for Email Storage)
    public function encryptData($data) {
        return openssl_encrypt($data, 'AES-128-ECB', $this->encryption_key);
    }

    public function decryptData($data) {
        return openssl_decrypt($data, 'AES-128-ECB', $this->encryption_key);
    }

    // Dummy Email System (Logs Emails Instead of Sending)
    // Communication Security ensures that sensitive data (like email notifications) is transmitted securely.
    public function sendEmail($recipient, $subject, $message) {
        $logEntry = date('Y-m-d H:i:s') . " | To: $recipient | Subject: $subject | Message: $message\n";
        file_put_contents('email_log.txt', $logEntry, FILE_APPEND);
    }
}

?>
