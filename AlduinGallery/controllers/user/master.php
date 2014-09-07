<?php

namespace User\Controllers;

class User_Controller extends \Controllers\Master_Controller
{


    public function __construct()
    {
        parent::__construct(
            get_class($this),
            "views/user/master/",
            'master');

        $auth = \Lib\Authentication::get_instance();
        $logged_user = $auth->get_logged_user();
        if (empty($logged_user)) {
            die("No access here!");
        }
    }
}