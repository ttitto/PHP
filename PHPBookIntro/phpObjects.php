<?php



$my_first_user = new User("CECO", "Fool");
$my_second_user = new User('Pesho', 'pass');
print_r($my_first_user);
print_r(($my_second_user));

$my_first_user->name = 'Gosho';
$my_first_user->password = 'passw';
$my_first_user->save_user();
print_r($my_first_user);

echo "CLONING EXAMPLE" . PHP_EOL;
$my_second_user = clone $my_first_user;
$my_second_user->name = 'Pesho';
print_r($my_first_user);
print_r($my_second_user);

//call a static method
echo "CALL A STATIC METHOD" . PHP_EOL;
User::prompt_pwd();

//INHERITANCE
echo 'INHERITANCE' . PHP_EOL;
$stud_obj = new Student('Stud', "st_pass", 9807044);
print_r($stud_obj);
echo Student::RABATT . PHP_EOL;
echo Student::prompt_pwd() . PHP_EOL;
echo $stud_obj -> save_user();

class User
{
//read here for multiple constructors: http://stackoverflow.com/questions/1699796/best-way-to-do-multiple-constructors-in-php
    public function __construct($n, $pass)
    {
        $this->name = $n;
        $this->password = $pass;
    }

    public $name, $password;
    const RABATT = false;

     function save_user()
    {
        echo "user $this->name saved!" . PHP_EOL;
    }

    static function prompt_pwd()
    {
        echo "Please, enter your password!" . PHP_EOL;
    }
}

class Student extends User
{
    public function __construct($n, $pass, $fn)
    {
        parent::__construct($n, $pass);
        $this->fac_num = $fn;
    }

    public $fac_num;
    const RABATT = true;

}