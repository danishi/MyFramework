<?php
namespace app\controller;

require_once dirname ( __FILE__ ) . '/../../vendor/autoload.php';
require_once dirname ( __FILE__ ) . '/../utility/utility.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Smarty;
use app\utility\utility;

/**
 * base controller
 *
 * @author danishi
 */
class controller
{
    private $name   = 'controller';

    protected function __construct(){
        // impossible new
    }

    public function __toString():string {
        return $this->name;
    }

    /**
     * logging
     * @param string $message
     * @param string $file_name
     */
    public function logging($message, string $file_name = 'app.log'){
        $Logger = new Logger('logger');
        $Logger->pushHandler(new StreamHandler(__DIR__ . '/../../logs/' . $file_name, Logger::INFO));
        $Logger->addInfo($message);
    }

    /**
     * build template
     * @param string $template
     * @param array  $param
     * @return string
     */
    public function view(string $template, array $param): string{

        header_register_callback(function(){
            header_remove('X-Powered-By');
        });

        $Smarty = new Smarty();
        $Smarty->template_dir = __DIR__ . '/../view/';
        $Smarty->compile_dir  = __DIR__ . '/../view/view_c/';
        $Smarty->escape_html  = true;
        $Smarty->assign([
            'cssUnCache'    => Utility::cssUnCache()
        ]);
        $Smarty->assign($param);
        return $Smarty->fetch($template . '.tpl');
    }

}
