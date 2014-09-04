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
    var $students = array();

    public function __construct()
    {
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
    //Ascending by ID
    private static   function sort_by_id_asc($a,$b){
        if($a->id==$b->id)return 0;
        return (($a->id)<($b->id))?-1:1;
    }
    public  function asc_sort_id(){
       usort($this->students,'self::sort_by_id_asc');
    }
    //Descending by ID
    private static function sort_by_id_desc($a, $b){
        if($a->id==$b->id) return 0;
        return (($a->id)>($b->id))?-1:1;
    }
    public function desc_sort_id(){
        usort($this->students,'self::sort_by_id_desc');
    }
    //Ascending by result
    private static function sort_by_result_asc($a, $b){
        if(($a->result)===($b->result)){
            if($a->id==$b->id)return 0;
            return (($a->id)<($b->id))?-1:1;
        }else{
            return (($a->result)<($b->result))?-1:1;
        }
    }
    public function asc_sort_result(){
        usort($this->students,"self::sort_by_result_asc");
    }
    //Descending by result
    private static function sort_by_result_desc($a, $b){
        if(($a->result)===($b->result)){
            if($a->id==$b->id)return 0;
            return (($a->id)>($b->id))?-1:1;
        }else{
            return (($a->result)>($b->result))?-1:1;
        }
    }
    public function desc_sort_result(){
        usort($this->students,"self::sort_by_result_desc");
    }
    //Ascending by username
    private static function sort_by_username_asc($a, $b){
        if(($a->username)===($b->username)){
            if($a->id==$b->id)return 0;
            return (($a->id)<($b->id))?-1:1;
        }else{
            return (($a->username)<($b->username))?-1:1;
        }
    }
    public function asc_sort_username(){
        usort($this->students,"self::sort_by_username_asc");
    }
    //Descending by username
    private static function sort_by_username_desc($a, $b){
        if(($a->username)===($b->username)){
            if($a->id==$b->id)return 0;
            return (($a->id)>($b->id))?-1:1;
        }else{
            return (($a->username)>($b->username))?-1:1;
        }
    }
    public function desc_sort_username(){
        usort($this->students,"self::sort_by_username_desc");
    }

}


$studentsList = new StudentList();
$order=trim($_GET['order']);
var_dump($order);
switch(trim($_GET['column'])){

    case 'id':
        if($order=='ascending'){$studentsList->asc_sort_id();}
        if($order=='descending'){$studentsList->desc_sort_id();}
        break;
    case 'result':
        if($order=='ascending'){$studentsList->asc_sort_result();}
        if($order=='descending'){$studentsList->desc_sort_result();}
        break;
    case 'username':
        if($order=='ascending'){$studentsList->asc_sort_username();}
        if($order=='descending'){$studentsList->desc_sort_username();}
        break;
}

//var_dump($studentsList->students);
$result="<table>";
foreach ($studentsList->students as $stud) {
    var_dump($stud);
    $result.="<tr><td>".$stud->id."</td><td>".$stud->username."</td><td>".$stud->email."</td><td>".$stud->type."</td><td>".$stud->result."</td></tr>";
}
$result.="</table>";

echo $result;

?>