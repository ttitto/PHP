<?php

class Student
{
    var $id = 0;
    var $username = '';
    var $email = '';
    var $type = '';
    var $result =0;

    public function __construct($id, $username, $email, $type, $result)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->type = $type;
        $this->result = $result;
    }
}

class StudentList
{
    var $column = '';
    var $order = '';
    var $students = array();

    public function __construct($column, $order)
    {
        $this->column = $column;
        $this->order = $order;
        $this->students = $this->getStudents($_GET['students']);
    }

   private function getStudents($text)
    {
        $strStudents = explode("\n", $text);
        $studentsArr = array();
        $id = 0;
        foreach ($strStudents as $stud) {
            $id++;
            $props = array_diff(explode(', ', $stud), array(''));
            $currentStud = new Student($id, $props[0], $props[1], $props[2],intval( $props[3]));
            $studentsArr[] = $currentStud;
        }
        return $studentsArr;
    }
    private   function sort_by_id_asc($a,$b){
        if($a->id==$b->id)return 0;
        return (($a->id)>($b->id))?-1:1;
    }
    public  function asc_sort_id(){
       usort($this->students,'sort_by_id_asc');
    }

}

$students = new StudentList($_GET['column'], $_GET['order']);
$students->asc_sort_id();
var_dump($students->students);


?>