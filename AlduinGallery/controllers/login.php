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
        $auth = \Lib\Authentication::get_instance();
        if (!empty($_POST['username']) && !empty($_POST['pass'])) {
            $username = $_POST['username'];
            $pass = $_POST['pass'];

            $is_logged = $auth->login($username, $pass);
            $logged_user=$auth->get_logged_user();
            $this->logged_user=$logged_user;
            var_dump($is_logged);
            var_dump($logged_user);
        }
        var_dump($_SESSION);
        $template_name = DX_ROOT_DIR . $this->views_dir . 'index.php';
        include_once($this->layout);
    }


}


?>