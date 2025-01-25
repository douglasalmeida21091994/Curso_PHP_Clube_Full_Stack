<?php

if (!function_exists('dd')) {
    function dd($data) {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die();
    }
}

function request() {
    return $_REQUEST;
}

function redirect($url) {
    return header('Location:/?page=' . $url);
}

function redirectToHome() {
    return header('Location:/');
}

?>