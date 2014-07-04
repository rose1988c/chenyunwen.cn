<?php
## defined
defined('USER_ROLE_SUPER_ADMIN') or define('USER_ROLE_SUPER_ADMIN', 127);
defined('USER_ROLE_ADMIN') or define('USER_ROLE_ADMIN', 126);
defined('USER_ROLE_USER') or define('USER_ROLE_USER', 2);

function is_super_admin()
{
    if (Auth::check() && Auth::user()->getAuthRoleId() == USER_ROLE_SUPER_ADMIN){
        return true;
    }
    return false;
}