<?php
namespace Controllers;

class Master_Controller
{
    protected $layout;
    protected $views_dir;
    protected $class_name;
    protected $model;

    public function __construct($class_name='\Controllers\Master_Controller',
                                $views_dir='/views/master/',
                                $model='master')
    {
        $this->layout = DX_ROOT_DIR . 'views/layouts/default.php';
        $this->views_dir=$views_dir;
        $this->class_name=$class_name;
        include_once(DX_ROOT_DIR."models/{$model}.php");
        $model_class='\Models\\'.ucfirst($model)."_Model";
       $this->model=new $model_class(array('table'=>'none'));
    }

    public function index(){
        $template_name=DX_ROOT_DIR.$this->views_dir.'index.php';
        include_once $this->layout;
    }
}