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

    /**
     * getUrl
     * @return string
     */
    public static function getUrl(): string{
        $url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        return $url;
    }

    /**
     * getBaseUrl
     * @return string
     */
    public static function getBaseUrl(): string{
        $array_parse_uri = explode('/', $_SERVER['REQUEST_URI']);
        $last_uri        = end($array_parse_uri);
        $parse_uri       = str_replace($last_uri, '', $_SERVER['REQUEST_URI']);
        $url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'].$parse_uri;
        return $url;
    }
}
