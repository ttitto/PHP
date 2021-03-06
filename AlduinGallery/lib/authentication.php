<?php
namespace Lib;

class Authentication
{

    private static $is_logged = false;
    private static $logged_user = array();

    private function __construct()
    {
        session_set_cookie_params(1800, '/');
        session_start();

        if (!empty($_SESSION['username'])) {
            self::$is_logged = true;

            self::$logged_user = array(
                'id' => $_SESSION['userId'],
                'username' => $_SESSION['username']
            );
        }
    }

    /**Function to pass the currently existing instance of the Authentication class or to create new instance
     * @return null|static
     */
    public static function get_instance()
    {
        static $instance = null;
        if ( null===$instance) {
            $instance = new static();
        }
        return $instance;
    }

    /**Boolean to show if a user is currently logged
     * @return bool
     */
    public function is_logged()
    {
        if(isset($_SESSION['username'])){
            return true;
        }
        return false;
    }

    /**Gets the current logged user
     * @return array
     */
    public function get_logged_user()
    {
        if(!isset($_SESSION['username'])){
            return array();
        }
        return array(
            'username'=>$_SESSION['username'],
            'id'=>$_SESSION['userId']
        );
    }

    public function login($username, $pass)
    {
        $db_obj = Database::get_instance();
        $db = $db_obj->get_db();
        //TODO: Add password encryption
        $statement = $db->prepare("SELECT * FROM users WHERE UserName= ? AND Pass= ? LIMIT 1");
        $statement->bind_param('ss', $username, $pass);
        $statement->execute();
        $result_set = $statement->get_result();
        if ($row = $result_set->fetch_assoc()) {
            $_SESSION['username'] = $row['UserName'];
            $_SESSION['userId'] = $row['ID'];

            return true;
        }
        return false;
    }

    public function logout(){
        session_destroy();
    }

}

?>