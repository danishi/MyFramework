<?php
namespace app\model;

require_once dirname ( __FILE__ ) . '/../../vendor/autoload.php';
require_once dirname ( __FILE__ ) . '/../utility/utility.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PDO;
use app\utility\utility;

/**
 * base model
 *
 * @author danishi
 */
abstract class model
{
    private $name   = 'model';
    public $pdo;

    public function __construct($dbms){
        try{
            switch(strtoupper($dbms)){
                case 'MYSQL':
                    $dsn       = 'mysql:dbname=' . Utility::getIniValue('MYSQL', 'DB_NAME')
                               . ';host=' . Utility::getIniValue('MYSQL', 'HOST_NAME');
                    $user      = Utility::getIniValue('MYSQL', 'USER');
                    $password  = Utility::getIniValue('MYSQL', 'PASSWORD');
                    $this->pdo = new PDO($dsn, $user, $password);
                    break;

                case 'SQLITE':
                    $db_file   = 'sample.db';
                    $db_path   = __DIR__ . '/sqlite/' . $db_file;
                    $this->pdo = new PDO('sqlite:' . $db_path);
                    break;
            }

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(Exception $e){
            $this->logging($e->getMessage());
        }
    }

    public function __toString():string {
        return $this->name;
    }

    /**
     * Logging
     * @param string $message
     * @param string $file_name
     */
    public function logging(string $message, string $file_name = 'pdo.log'){
        $Logger = new Logger('logger');
        $Logger->pushHandler(new StreamHandler(__DIR__ . '/../../logs/' . $file_name, Logger::INFO));
        $Logger->addInfo($message);
    }
}
