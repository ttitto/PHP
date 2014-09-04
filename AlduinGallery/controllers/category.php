<?php
namespace Controllers;

class Category_Controller extends Master_Controller
{
    public function __construct()
    {
        parent::__construct(get_class($this), 'views/category/', 'category');

    }

    public function index()
    {
        $categories = $this->model->find();

        $template_name = DX_ROOT_DIR . $this->views_dir . 'index.php';
        include_once $this->layout;
    }

    public function album($id)
    {
        $categories = $this->model->get($id);
        $albums=$this->model->get_albums_byCategory($id);
        $template_name = DX_ROOT_DIR . $this->views_dir . 'imgCategoryView.php';
        include_once $this->layout;
    }
}