<?php defined('SYSPATH') or die('No direct script access.');

class Model_Test extends ORM 
{
    protected $_has_many = array(
        'tasks' => array(
            'model' => 'Task',
            'foreign_key' => 'test_id',
        ),
    );
    
    protected $_belongs_to = array(
        'section' => array(
            'model' => 'Section',
            'foreign_key' => 'section_id',
        ),
	'audience' => array(
            'model' => 'Audiencetype',
            'foreign_key' => 'audience_id',
        ),
    );

}
/*
class Model_Test extends Model
{
    protected $_tableTests = 'tests';
    protected $_tableTasks = 'tasks';
    protected $_tableCathegories = 'cathegories';


    public function get_all()
    {
        $sql = "SELECT tests.id,  tests.name, tests.creation_date, tests.author, tests.description, categories.name as category_name
FROM tests INNER JOIN categories ON tests.category = categories.id";


        return DB::query(Database::SELECT, $sql)
            ->execute();
    }

    public function get_test($id = '')
    {
        $sql = "SELECT * FROM ". $this->_tableTasks ." WHERE `test_id` = :id";

        $query = DB::query(Database::SELECT, $sql, FALSE)
            ->param(':id', (int)$id)
            ->execute();

        $result = $query->as_array();

        if($result)
            return $result;
        else
            return FALSE;
    }
}
 */
