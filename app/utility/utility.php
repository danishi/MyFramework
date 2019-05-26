<?php
namespace app\utility;

/**
 * @author danishi
 */
final class Utility{

    protected function __construct(){

    }

    /**
     * ini file read
     * @param  string $key
     * @param  string $sub_key
     * @return string
     */
    public static function getIniValue(string $key, string $sub_key = null): string{
        $array_ini_file = parse_ini_file(__DIR__ . "/../app.ini", true);
        $value = $array_ini_file[$key];
        if(is_array($value) && !empty($sub_key)){
            $value = $value[$sub_key];
        }
        return $value;
    }

    /**
     * usage <link rel="stylesheet" href="css/style.css?<?=Utility::cssUnCache()?>">
     * @param  bool
     * @return string
     */
    public static function cssUnCache(bool $localhostOnly=true): string
    {
        $whitelist = array(
            '127.0.0.1',
            '::1'
        );

        if(in_array($_SERVER['REMOTE_ADDR'], $whitelist) && $localhostOnly){
            return '?'.date('YmdHis');
        }else{
            return '';
        }
    }
}
