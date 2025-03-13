<?php
    class Auth {
        public function __construct($permission) {
            session_start();

            if(!($this->isLoggedIn() && $this->hasPermission($permission))){
                echo "<script>
                alert('No permission to access this page :/');
                window.location = 'login.php';
                </script>";
            }
        }

        public function isLoggedIn() {
            if(isset($_SESSION["email"])){
                return true;
            }
            
            return false;
        }

        public function hasPermission($permission) {
            return $_SESSION["role"] == $permission;
        }
    }
?>
