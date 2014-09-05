<?php
namespace Controllers;

class Login_Controller extends Master_Controller
{

    public function __construct()
    {
        parent::__construct(get_class($this),
            '/views/login/',
            'master');
    }

    public function index()
    {
//$logged_user = \Lib\Authentication::get_instance()->get_logged_user();
        $auth = \Lib\Authentication::get_instance();
        var_dump($_POST);
        if (!empty($_POST['username']) && !empty($_POST['pass'])) {
            $username = $_POST['username'];
            $pass = $_POST['pass'];

            $is_logged = $auth->login($username, $pass);
            var_dump($is_logged);
        }
        $template_name = DX_ROOT_DIR . $this->views_dir . 'index.php';
        include_once($this->layout);
    }


}


?>