<?php

class Controller
{
    public function redirect($location)
    {
        header("Location: $location");
    }

    public function from_get($param)
    {
        return isset($_GET[$param]) ? $_GET[$param] : NULL;
    }

    public function from_post($param)
    {
        return isset($_POST[$param]) ? $_POST[$param] : NULL;
    }

    public function showError($title, $message)
    {
        include __DIR__ . '/../view/error.php';
    }
}