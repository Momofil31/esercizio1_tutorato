<?php

class func
{
    public static function checkLoginState()
    {
        if (isset($_COOKIE['userid'])) {
            return true;
        } else {
            return false;
        }
    }
    public static function createCookie($user_username, $user_id)
    {
        setcookie('userid', $user_id, time() + (86400) * 30, "/");
        setcookie('username', $user_username, time() + (86400) * 30, "/");
    }

    public static function deleteCookie()
    {
        setcookie('userid', '', time() - 1, "/");
        setcookie('username', '', time() - 1, "/");
    }
}