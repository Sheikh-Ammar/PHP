<?php


class Framework
{
    // INCLUDE VIEW FILE IF EXISTS
    public function view($view, $data = [])
    {
        if (file_exists("../app/views/" . $view . ".php")) {
            require_once "../app/views/$view.php";
        } else {
            echo "Sorry " . $view . " File not found";
        }
    }

    // INCLUDE MODEL FILE IF EXISTS AND CRAETE MODEL CALSS OBJECT
    public function model($model)
    {
        if (file_exists("../app/models/" . $model . ".php")) {
            require_once "../app/models/$model.php";
            return new $model;
        } else {
            echo "Sorry " . $model . " model not found";
        }
    }

    // CHECK REQUEST  IF POST THEN
    public function input($input)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'post') {
            return trim(strip_tags($_POST[$input])); // CLEAN DATA AND PREVENT FROM SQL INJECTION
        } else if ($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'get') {
            return trim(strip_tags($_GET[$input]));
        }
    }

    // FOR LINKS EXTRA FILES WHICH ARE IN HELPER DIRECTORY
    public function helper($helper)
    {
        if (file_exists("../system/helpers/" . $helper . ".php")) {
            require_once "../system/helpers/" . $helper . ".php";
        } else {
            echo "Sorry " . $helper . " helper file not found";
        }
    }

    // SET SESSION
    public function setSession($sessionName, $sessionValue)
    {
        if (!empty($sessionName) && !empty($sessionValue)) {
            $_SESSION[$sessionName] = $sessionValue;
        }
    }

    // GET SESSION
    public function getSession($sessionName)
    {
        if (!empty($sessionName)) {
            return $_SESSION[$sessionName];
        }
    }

    // UNSET SESSION
    public function unsetSession($sessionName)
    {
        if (!empty($sessionName)) {
            unset($_SESSION[$sessionName]);
        }
    }

    // DESTROY SESSION
    public function destroySessions()
    {
        session_unset();
        session_destroy();
    }

    // SET ANY MESSAGESS
    public function setMessage($sessionName, $message)
    {
        if (!empty($sessionName) && !empty($message)) {
            $_SESSION[$sessionName] = $message;
        }
    }

    // SHOW SET MESSAGES
    public function getMessages($sessionName, $className)
    {
        if (!empty($sessionName) && !empty($className) && isset($_SESSION[$sessionName])) {
            $message = $_SESSION[$sessionName];
            echo "<div class='$className'>$message</div>";
            unset($_SESSION[$sessionName]);
        }
    }

    // REDIRECT METHOD FROM PATH T OTHER PATH
    public function redirect($path)
    {
        header("location:" . BASEURL . "/" . $path);
    }
}
