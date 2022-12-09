<?php

// LOGINMODEL CLASS
class LoginModel extends Database
{
    // CHECK USER
    public function checkUser($email, $password, $submit)
    {
        if (isset($submit)) {
            if ($this->Query("SELECT email, password FROM users WHERE email = ? AND password = ?", [$email, $password])) {
                if ($this->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
}
