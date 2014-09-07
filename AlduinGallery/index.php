<?php

define("DX_ROOT_DIR",dirname(__FILE__)."/"); //C:\xampp\htdocs\alduin\
define("DX_ROOT_PATH",basename(dirname((__FILE__)))."/"); //alduin/

$request=$_SERVER['REQUEST_URI'];
$request_home="/".DX_ROOT_PATH;

//default controller, method and arguments to use if request doesn't include them
$controller='master';
$method='index';
$params=array();
$user_routing=false;

include_once('config/db.php');
include_once('lib/database.php');
include_once('lib/authentication.php');
include_once('controllers/master.php');
include_once('models/master.php');

if(!empty($request)){
    if(0===strpos($request,$request_home)){
        $request= substr($request,strlen($request_home));

        if(0===strpos($request, 'user/')){
            $request=substr($request,strlen('user/'));
            $user_routing=true;
            include_once('controllers/user/master.php');
        }
        var_dump($request);

        $components=explode("/",$request,3);
        //assign controller and method from URI
        if(1<count($components)){
            list($controller, $method)=$components;
        }
        //include the controller's php file
        $user_folder=$user_routing?"user/":"";
        include_once ('controllers/'.$user_folder.$controller.'.php');
        if(isset($components[2])){
            $params=$components[2];
        }
    }
}

$user_namespace=$user_routing?"\\User":"";
$controller_class= $user_namespace.'\Controllers\\'.ucfirst($controller).'_Controller';
$instance=new $controller_class();

if(method_exists($instance,$method)){
    call_user_func_array(array($instance, $method),array($params));
}

//create database object and connection
$db_object=\Lib\Database::get_instance();
$db_conn= $db_object::get_db();

