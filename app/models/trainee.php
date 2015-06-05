<?php

class Trainee extends AppModel
{
    /*const MIN_EMPLOYEE_ID_LENGTH = 4;
    const MIN_FIRST_NAME_LENGTH = 2;
    const MIN_LAST_NAME_LENGTH = 2;
    const MIN_SKILL_SET_LENGTH = 5;
    const MIN_TRAINING_STATUS_LENGTH = 8;
    const MIN_BATCH_LENGTH = 8;
    const MIN_HIRED_LENGTH = 1;
    const MIN_GRADUATED_LENGTH = 1;

    const MAX_EMPLOYEE_ID_LENGTH = 20;
    const MAX_FIRST_NAME_LENGTH = 30;
    const MAX_LAST_NAME_LENGTH = 30;
    const MAX_SKILL_SET_LENGTH = 50;
    const MAX_TRAINING_STATUS_LENGTH = 20;
    const MAX_BATCH_LENGTH = 8;
    const MAX_HIRED_LENGTH = 20;
    const MAX_GRADUATED_LENGTH = 20;


  
    public $validation = array(

        'employee_id' => array(
            'length' => array(
                'validate_between', self::MIN_EMPLOYEE_ID_LENGTH, self::MAX_EMPLOYEE_ID_LENGTH
            ),
            'valid' => array(
                'is_valid_employee_id'
            ),
            'exist' => array(
                'is_employee_id_exist'
            ),
        ),

        'first_name' => array(
            'length' => array(
                'validate_between', self::MIN_FIRST_NAME_LENGTH, self::MAX_FIRST_NAME_LENGTH
            ),
            'valid' => array(
                'is_valid_name'
            ),
        ),
        
        'last_name' => array(
            'length' => array(
                'validate_between', self::MIN_LAST_NAME_LENGTH, self::MAX_LAST_NAME_LENGTH
            ),
            'valid' => array(
                'is_valid_name'
            ),
        ),

        'skill_set' => array(
            'length' => array(
                'validate_between', self::MIN_SKILL_SET_LENGTH, self::MAX_SKILL_SET_LENGTH
            )
        ),

        'training_status' => array(
            'length' => array(
                'validate_between', self::MIN_TRAINING_STATUS_LENGTH, self::MAX_TRAINING_STATUS_LENGTH
            )
        ),
        
        'batch' => array(
            'length' => array(
                'validate_between', self::MIN_BATCH_LENGTH, self::MAX_BATCH_LENGTH
            )
        ),

        'hired' => array(
            'length' => array(
                'validate_between', self::MIN_HIRED_LENGTH, self::MAX_HIRED_LENGTH
            )
        ),
    );

    public function is_employee_id_exist()
    {
        $db = DB::conn();
        $employee_id_exist = $db->row("SELECT employee_id FROM trainee where employee_id = ?", 
            array($this->employee_id));
        
        return (!$employee_id_exist);
    }*/

    public function add()
    {
        /*if (!$this->validate()) {
            throw new ValidationException('Invalid Input!');
        }*/

        try {
            $db = DB::conn(); 
            $db->begin();
            $params = array( 
                'employee_id' => $this->employee_id,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'skill_set' => $this->skill_set,
                'course_status' => $this->course_status,
                'training_status' => $this->training_status,
                'batch' => $this->batch,
                'hired' => $this->hired,
                'graduated' => $this->graduated
            );
            $db->insert('trainee', $params); 
            $db->commit();
        } catch(Exception $e) {
            $db->rollback();
            throw $e;
        }
    }
}