<?php
namespace Models;
include_once('master.php');

class Category_Model extends Master_Model
{

    public function __construct($args = array())
    {
        parent::__construct(array('table' => 'categories'));
    }

    public function get_albums_byCategory($categoryID)
    {
        return $this->find(array('table'=>'imgalbums as al join categories as c on al.CategoryId=c.ID',
            'where'=>"al.CategoryId={$categoryID}"));
    }
}