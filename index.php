<?php

namespace movieloader;

require_once 'Session.php';
Session::start();

/* Class loadings */
require_once 'credentials.php';
require_once 'Http.php';
require_once 'Yts.php';
require_once 'Tmdb.php';


/* Routes */
$url = parse_url($_SERVER['REQUEST_URI']);
switch ($url['path']) {
    case '/':
    case '/home':
        include 'home.php';
        break;
    case '/last':
        include 'yts-last.php';
        break;
    case '/search':
        include 'yts-search.php';
        break;
    case '/watchlist':
        include 'tmdb-watchlist.php';
        break;
}
