<?php

class Course extends AppModel
{
    const MIN_NAME_LENGTH = 2;
    const MAX_NAME_LENGTH = 20;

    const MIN_CATEGORY_LENGTH = 1;
    const MAX_CATEGORY_LENGTH = 20;

    public $validation = array(

        'name' => array(
            'length' => array(
                'validate_between', self::MIN_NAME_LENGTH, self::MAX_NAME_LENGTH
            ),
            'valid' => array(
                'is_valid_name'
            ),
        ),
        
        'category' => array(
            'length' => array(
                'validate_between', self::MIN_CATEGORY_LENGTH, self::MAX_CATEGORY_LENGTH
            )
        )
    );

    public function add()
    {
        if (!$this->validate()) {
            throw new ValidationException('Invalid Input!');
        }

        try {
            $db = DB::conn(); 
            $db->begin();
            $params = array( 
                'name' => $this->name,
                'category' => $this->category,
            );
            $db->insert('courses', $params); 
            $db->commit();
        } catch(Exception $e) {
            $db->rollback();
            throw $e;
        }
    }

    public static function getDistinctCategory()
    {
        $db = DB::conn();
        $rows = $db->rows("SELECT DISTINCT category FROM courses");
        $categories = array();
        
        foreach ($rows as $row) {
            if (!empty($row['category'])) {
                $categories[] = $row['category'];
            }
        }
        return $categories;
    }

    public static function getByCategory($category) 
    {
        $course = array();
        $db = DB::conn();

        $rows = $db->rows("SELECT * FROM courses WHERE category = ?", array($category));
            
        foreach($rows as $row) {
            $course[] = new self($row);
        }
        return $course;
    }

    public static function getById($course_id)
    {
        $db = DB::conn();
        $row = $db->row("SELECT * FROM courses WHERE id = ?", array($course_id));
        
        return $row;
    } 

    public function edit($course_id)
    {
        if (!$this->validate()) {
            throw new ValidationException('Invalid Input');
        }
    
        try {
            $db = DB::conn();
            $params = array(
                'category' => $this->category,
                'name' => $this->name
            );
        
            $course_id = array('id' => $this->course_id);
            $db->update('courses', $params, $course_id);
            
        } catch(Exception $e) {
            throw $e;
        }
    }
}