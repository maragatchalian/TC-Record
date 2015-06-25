<?php

class Trainee extends AppModel
{
    const MIN_EMPLOYEE_ID_LENGTH = 3;
    const MIN_FIRST_NAME_LENGTH = 1;
    const MIN_LAST_NAME_LENGTH = 1;
    const MIN_SKILL_SET_LENGTH = 1;
    const MIN_TRAINING_STATUS_LENGTH = 1;
    const MIN_COURSE_STATUS_LENGTH = 1;
    const MIN_BATCH_LENGTH = 1;
    const MIN_HIRED_LENGTH = 10;
    const MIN_GRADUATED_LENGTH = 10;

    const MAX_EMPLOYEE_ID_LENGTH = 11;
    const MAX_FIRST_NAME_LENGTH = 30;
    const MAX_LAST_NAME_LENGTH = 30;
    const MAX_SKILL_SET_LENGTH = 20;
    const MAX_TRAINING_STATUS_LENGTH = 20;
    const MAX_COURSE_STATUS_LENGTH = 20;
    const MAX_BATCH_LENGTH = 20;
    const MAX_HIRED_LENGTH = 10;
    const MAX_GRADUATED_LENGTH = 10;

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

        'course_status' => array(
            'length' => array(
                'validate_between', self::MIN_COURSE_STATUS_LENGTH, self::MAX_COURSE_STATUS_LENGTH
            )
        ),
        
        'batch' => array(
            'length' => array(
                'validate_between', self::MIN_BATCH_LENGTH, self::MAX_BATCH_LENGTH
            )
        ),

        'hired' => array(
            'valid' => array(
                'is_valid_date',
            )
        ),

        'graduated' => array(
            'valid' => array(
                'is_valid_date',
            )
        ),
    );

    public function is_employee_id_exist()
    {
        $db = DB::conn();
        $employee_id_exist = $db->row("SELECT employee_id FROM trainee WHERE employee_id = ?", array($this->employee_id));
        
        return (!$employee_id_exist);
    }

    public function add()
    {
        if (!$this->validate()) {
            throw new ValidationException('Invalid Input!');
        }

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

    public function edit($trainee_id)
    {
        if (!$this->validate()) {
            throw new ValidationException('Invalid Input');
        }
    
        try {
            $db = DB::conn();
            $params = array(
                'employee_id' => $this->new_employee_id,
                'last_name' => $this->last_name,
                'first_name' => $this->first_name,
                'skill_set' => $this->skill_set,
                'course_status' => $this->course_status,
                'training_status' => $this->training_status,
                'batch' => $this->batch,
                'hired' => $this->hired,
                'graduated'=> $this->graduated
            );
        
            $trainee_id = array('id' => $this->trainee_id);
            $db->update('trainee', $params, $trainee_id);
            
        } catch(Exception $e) {
            throw $e;
        }
    }

    public static function getAll()
    {
        $trainees = array();

        $db = DB::conn();
        $rows = $db->rows("SELECT * FROM trainee ORDER BY hired desc");

        foreach ($rows as $row) {
            $trainees[] = new self($row);
        }
        return $trainees;
    }

    public static function getById($trainee_id)
    {
        
        $db = DB::conn();
        $row = $db->row("SELECT * FROM trainee WHERE id = ?", array($trainee_id));
        
        return $row;
    } 

    public static function getByTrainingStatus($training_status) 
    {
        $trainee = array();
        $db = DB::conn();

        $rows = $db->rows("SELECT * FROM trainee WHERE training_status = ?", array($training_status));
            
        foreach($rows as $row) {
            $trainee[] = new self($row);
        }
        return $trainee;
    }

    public static function getBySkillSet($skill_set) 
    {
        $trainee = array();
        $db = DB::conn();

        $rows = $db->rows("SELECT * FROM trainee WHERE skill_set = ?", array($skill_set));
            
        foreach($rows as $row) {
            $trainee[] = new self($row);
        }
        return $trainee;
    }

    public static function getByBatch($batch) 
    {
        $trainee = array();
        $db = DB::conn();

        $rows = $db->rows("SELECT * FROM trainee WHERE batch = ?", array($batch));
            
        foreach($rows as $row) {
            $trainee[] = new self($row);
        }
        return $trainee;
    }

    public static function getByCourseStatus($course_status) 
    {
        $trainee = array();
        $db = DB::conn();

        $rows = $db->rows("SELECT * FROM trainee WHERE course_status = ?", array($course_status));
            
        foreach($rows as $row) {
            $trainee[] = new self($row);
        }
        return $trainee;
    }

    public static function getDistinctTrainingStatus()
    {
        $db = DB::conn();
        $rows = $db->rows("SELECT DISTINCT training_status FROM trainee");
        $training_status = array();
        
        foreach ($rows as $row) {
            if (!empty($row['training_status'])) {
                $training_status[] = $row['training_status'];
            }
        }
        return $training_status;
    }

    public static function getDistinctSkillSet()
    {
        $db = DB::conn();
        $rows = $db->rows("SELECT DISTINCT skill_set FROM trainee");
        $skill_set = array();
        
        foreach ($rows as $row) {
            if (!empty($row['skill_set'])) {
                $skill_set[] = $row['skill_set'];
            }
        }
        return $skill_set;
    }

    public static function getDistinctCourseStatus()
    {
        $db = DB::conn();
        $rows = $db->rows("SELECT DISTINCT course_status FROM trainee");
        $course_status = array();
        
        foreach ($rows as $row) {
            if (!empty($row['course_status'])) {
                $course_status[] = $row['course_status'];
            }
        }
        return $course_status;
    }

    public static function getDistinctBatch()
    {
        $db = DB::conn();
        $rows = $db->rows("SELECT DISTINCT batch FROM trainee");
        $batch = array();
        
        foreach ($rows as $row) {
            if (!empty($row['batch'])) {
                $batch[] = $row['batch'];
            }
        }
        return $batch;
    }
}