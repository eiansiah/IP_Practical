<?php
class Authentication
{

    private $valid_username = "admin";
    private $valid_password;

    public function __construct()
    {
        $this->valid_password = password_hash("admin123", PASSWORD_BCRYPT);
    }

    // Start a login session
    private function startSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }


    // Validate User's Login Credentials
    public function authenticateUser($username, $password)
    {

        if ($username !== $this->valid_username || !password_verify($password, $this->valid_password)) {
            return false;
        }

        $this->startSession();
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        $this->regenerateSession();

        return true;
    }


    public function verifySessionLogin()
    {
        return isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;
    }

    // Regenerate session ID to prevent fixation attacks
    private function regenerateSession()
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_regenerate_id(true);
        }
    }


    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        setcookie(session_name(), '', time() - 3600, '/');
    }
}
