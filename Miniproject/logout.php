<?php
                // Start the session
                session_start();

                // Unset all session variables
                $_SESSION = array();

                // Destroy the session
                session_destroy();

                // Redirect to a different page after ending the session
                header("Location: login.php");
                exit();
?>