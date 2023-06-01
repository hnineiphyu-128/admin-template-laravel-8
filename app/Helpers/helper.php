<?php

namespace App\Helpers;

use App\Models\App;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class helper
{
    /**
     * Get app data by app id
     * @param int $app_id
     * @return collection
     */
    public static function getAppData($app_id)      
    {
        return "hello";
    }

    /**
     * Get child user name by auth user role
     * @return string
     */
    public static function getChildUserName()      
    {
        $child_name = '';
        $role = Auth::user()->roles ?? Auth::user()->roles[0]->title;
        if ($role == 'App Owner') {
            $child_name = 'Senior Agent';
        } else if ($role == 'Senior Agent') {
            $child_name = 'Master Agent';
        } else if ($role == 'Master Agent') {
            $child_name = 'Agent';
        } else if ($role == 'Agent') { 
            $child_name = 'End User';
        }
        return $child_name;
    }

    public static function isMainRole($role_id)
    {
        return ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 7) ? true : false;
    }
}