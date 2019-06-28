<?php

function view($template, $data = [])
{
    $path = __DIR__ . "/../views/" . $template . ".php";
    if (file_exists($path)) {
        extract($data);
        require($path);
    }
}

function render($template, $data = [])
{
    $path = __DIR__ . "/../templates/" . $template . ".php";
    if (file_exists($path)) {
        extract($data);
        require($path);
    }
}

function controller($controller, $data = [])
{
    $path = __DIR__ . "/../controllers/" . $controller . ".php";
    if (file_exists($path)) {
        extract($data);
        require($path);
    }
}
