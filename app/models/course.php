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
}