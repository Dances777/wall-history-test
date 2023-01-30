<?php

namespace app\helpers;

class IPHideHelper
{

    public static function hide($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return preg_replace("~(?!\d{1,3}\.\d{1,3}\.)\d~", "*", $ip);
        }
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $matches = explode(":", $ip);
            //$matches = array_merge($matches, preg_replace("~.~", "*", array_slice($matches, -4)));

            return implode(":", $matches);
        }

        return null;
    }

    protected function replace($ip, $pattern, $limit = -1)
    {
        return preg_replace($pattern, '*', $ip, $limit);
    }


}