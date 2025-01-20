<?php
if (!function_exists('load')) {
    function load() {
        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $page = (!$page) ? 'pages/home.php' : "pages/{$page}.php";

        if (!file_exists($page)) {
            // $page = 'pages/404.php';
            throw new \Exception("Página não encontrada");
        }

        return $page;
    }
}
?>