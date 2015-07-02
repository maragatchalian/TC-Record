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

    public static function getAll()
    {
        $courses = array();

        $db = DB::conn();
        $rows = $db->rows("SELECT * FROM courses");

        foreach ($rows as $row) {
            $courses[] = new self($row);
        }
        return $courses;
    }
}