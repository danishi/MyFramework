<?php
namespace app\controller;

require_once 'controller.php';

require_once dirname ( __FILE__ ) . '/../model/mytable.php';

use app\model\mytable;

/**
 * sample controller
 *
 * @author danishi
 */
class sample extends controller
{
    private $name = 'sample';

    public function __construct(){
        parent::__construct();
    }

    public function index(){

        $message = 'index';

        $sample = new sample();
        $this->logging($sample);

        $mytable = new mytable();

        return $this->view($this->name, [
            'title'     => $this->name,
            'message'   => $message,
            'list'      => $mytable->getAll()
        ]);
    }

    public function post(){

        $message = 'post';

        // button register
        if(isset($_POST['add'])){

            $param = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $this->logging($param);

            $mytable = new mytable();

            $mytable->insert([
                'name'  => $param
            ]);
        }

        // button delete
        if(isset($_POST['delete'])){

            $item = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
            $this->logging(implode(',', $item));

            $mytable = new mytable();
            foreach($item as $id => $val){
                $mytable->delete([
                    'id'  => $id
                ]);
            }
        }

        return $this->view($this->name, [
            'title'     => $this->name,
            'message'   => $message,
            'list'      => $mytable->getAll()
        ]);
    }

    public function __toString():string {
        return $this->name;
    }
}
