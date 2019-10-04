<?php


namespace movieloader;


class Session
{
    public static function start()
    {
        session_start();
    }

    const AccessToken = 'access_token';
    const RequestToken = 'request_token';
    const AccountId = 'account_id';
    const NewWindow = 'new_window';

    public static function get($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function rem($key) {
        unset($_SESSION[$key]);
    }
}