<?php
if (isset($_GET["route"])) {
    $route = $_GET["route"];

    if ($route == "pdfmed") {
        include_once "view/components/tables/nutrimed/pdfmed.php";
    }

    // Handle logout route
    if ($route == "home/logout") {
        session_destroy();
        echo "<script>window.location.href='/healthmate/login'</script>";
        exit();
    }

    // Default route (login)
    if ($route == "" || $route == "/" || $route == "login") {
        include "view/auth/login.php";
    }
    // Auth routes
    else if ($route == "register") {
        include "view/auth/register.php";
    }
    // Home routes
    else if (
        $route == "home" ||
        $route == "home/dashboard" ||

        $route == "home/nutriplanner" ||
        $route == "home/searchfood" ||
        $route == "home/nutrifood" ||

        $route == "home/nutrimed" ||
        $route == "home/addmed" ||
        $route == "home/updatemed" ||
        $route == "home/deletemed" ||
        $route == "home/pdfmed" ||

        $route == "home/profile"
    ) {
        renderPage(ucfirst($route));
    }
    // Invalid route (404)
    else {
        include "view/error/404.php";
    }
} else {
    // No route specified, redirect to login
    echo "<script>window.location.href='/healthmate/login'</script>";
    exit();
}

function renderPage($title) {
    include "view/home.php";
}
