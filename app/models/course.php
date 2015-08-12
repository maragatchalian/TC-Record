<?php

class Course extends AppModel
{
    const MIN_NAME_LENGTH = 2;
    const MIN_CATEGORY_LENGTH = 1;
    const MAX_CATEGORY_LENGTH = 20;
    const MAX_NAME_LENGTH = 20;

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
        
        $db = DB::conn();            
        $params = array( 
            'name' => $this->name,
            'category' => $this->category,
        );

        $db->insert('course', $params); 
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
            $db->update('course', $params, $course_id);
            
        } catch(Exception $e) {
            throw $e;
        }
    }

    public static function delete($course_id)
    {
        try {
            $db = DB::conn();
            $db->begin();

            $db->query("DELETE FROM course WHERE id = ?", array($course_id));
            $db->commit();
        
        } catch (Exception $e) {
            $db->rollback();
        }
    }

    public static function getCategory()
    {
        $db = DB::conn();
        $rows = $db->rows("SELECT DISTINCT category FROM course order by category");
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

        $rows = $db->rows("SELECT * FROM course WHERE category = ?", array($category));
            
        foreach($rows as $row) {
            $course[] = new self($row);
        }
        return $course;
    }

    public static function getById($course_id)
    {
        $db = DB::conn();
        $row = $db->row("SELECT * FROM course WHERE id = ?", array($course_id));
        
        return $row;
    }

    public static function getByName()
    {
        $db = DB::conn();
        $rows = $db->rows("SELECT DISTINCT name FROM course");
        $courses = array();
        
        foreach ($rows as $row) {
            if (!empty($row['name'])) {
                $courses[] = $row['name'];
            }
        }
        return $courses;
    }
}