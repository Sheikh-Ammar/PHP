<?php

class HomeController extends Framework
{

    public function __construct()
    {
        // INITALIZAE CSS AND JS
        $this->helper("css-js-links");
    }

    public function index()
    {
        $this->view("home");
    }
}
