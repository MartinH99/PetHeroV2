<?php

namespace Utils;

abstract class Session
{
    public static function Init()
    {
        session_start();
    }

    public static function Set(string $key, mixed $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function Get(string $key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return null;
    }


    public static function VerifySession(string $key){
        return isset($_SESSION[$key]);
    }

    public static function LogOut(){
        session_destroy();
        require_once(VIEWS_PATH."index.html");
    }
}