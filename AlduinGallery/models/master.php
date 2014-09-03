<?php
namespace Models;

class Master_Model
{
    protected $table;
    protected $limit;
    protected $db;

    public function __construct($args = array())
    {
        $defaults = array(
            'limit' => 0
        );
        $args = array_merge($defaults, $args);

        if (!isset($args['table'])) {
            die ('DB Table not defined');
        }
        $this->table = $args['table'];
        if (isset($args['limit'])) {
            $this->limit = $args['limit'];
        }


        $db_object = \Lib\Database::get_instance();
        $this->db = $db_object::get_db();
    }

    public function find($args = array())
    {
        $defaults = array(
            'table' => $this->table,
            'limit' => $this->limit,
            'where' => '',
            'columns' => '*'

        );

        $args = array_merge($defaults, $args);

        $q = "SELECT {$args['columns']} FROM {$args['table']}";
        if (!empty($args['where'])) {
            $q .= " WHERE {$args['where']}";
        }
        if (!empty($args['limit'])) {
            $q .= " LIMIT {$args['limit']}";
        }

        $result_set = $this->db->query($q);
        $results = $this->process_results($result_set);
        return $results;
    }

    public function get($id){
        return $this->find(array('where'=>"ID={$id}"));
    }

    /**Converts the results from a query to a useful array, where each element is a row from the query results
     * @param $result_set
     * @return array
     */
    protected function process_results($result_set)
    {
        $results = array();
        if (!empty($result_set) && $result_set->num_rows > 0) {
            while ($row = $result_set->fetch_assoc()) {
                $results[] = $row;
            }
        }
        return $results;
    }

}