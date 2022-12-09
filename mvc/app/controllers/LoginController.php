<?php

// LOGINCONTROLLER CLASS
class LoginController extends Framework
{
    // GET MODEL FROM FRAMEWORK MODEL METHOD
    public function __construct()
    {
        // OBJECT OF MODEL
        $this->model = $this->model("LoginModel");
        // INITALIZAE CSS AND JS
        $this->helper("css-js-links");
    }

    // DISPLAY LOGIN PAGE
    public function index()
    {
        $this->view("login");
    }

    // CHECK USER LOGIN
    public function checkUser()
    {
        $email = $this->input('email'); //USE INPUT METHOD FROM FRAMEWORK CLASS
        $pasword = $this->input('password');
        $submit = $this->input('submit');

        $result = $this->model->checkUser($email, $pasword, $submit);
        if ($result) {
            $this->setSession('email', $email);
            $this->redirect("HomeController/index");
        } else {
            $this->setMessage('error', "User Not Found");
            $this->redirect("LoginController/index");
        }
    }
}
