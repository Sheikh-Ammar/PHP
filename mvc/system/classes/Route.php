<?php

class Route
{
    protected $controller = "LoginController"; // BY DEFAULT CONTROLLER
    protected $methods = "index"; // BY DEFAULT METHOD
    protected $params = []; // BY DEFAULT PARAMETERS

    public function __construct()
    {
        // GET DIVIDE / URL
        $url = $this->url();

        // CHECK AND INCLUDE AND MAKE OBJECT OF THAT CONTROLLER CLASS
        if (!empty($url)) {
            if (file_exists("../app/controllers/" . $url[0] . ".php")) {
                $this->controller = $url[0];
                unset($url[0]);
            } else {
                echo "Sorry " . $url[0] . " controller not found";
            }
        }
        require_once "../app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;


        // CHECK METHOD IN CONTROLLER CLASS
        if (!empty($url[1]) && isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->methods = $url[1];
                unset($url[1]);
            } else {
                echo "Sorry " . $url[1] . " method not found";
            }
        }

        //  UNSET URL MEANS CONTROLLER/METHOD PART OUT NOW ONLY PARAMS LEFT SO
        if (isset($url)) {
            $this->params = $url;
        } else {
            $this->params = [];
        }

        // BUILT IN ARRAY METHOD THAT ACCET METHODS AND PARAMS 
        call_user_func_array([$this->controller, $this->methods], $this->params);
    }

    public function url()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = rtrim($url); // AVOID @,EMPTY SPACE ETC....
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url); // DIVIDE URL FROM controller/method/parameters

            return $url;
        }
    }
}
