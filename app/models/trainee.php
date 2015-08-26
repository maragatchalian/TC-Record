<?php

class Trainee extends AppModel
{
    const MIN_EMPLOYEE_ID_LENGTH = 3;
    const MIN_FIRST_NAME_LENGTH = 1;
    const MIN_LAST_NAME_LENGTH = 1;
    const MIN_NICKNAME_LENGTH = 1;
    const MIN_SKILL_SET_LENGTH = 1;
    const MIN_TRAINING_STATUS_LENGTH = 1;
    const MIN_COURSE_STATUS_LENGTH = 1;
    const MIN_BATCH_YEAR_LENGTH = 2;
    const MIN_BATCH_TERM_LENGTH = 2;
    const MIN_HIRED_LENGTH = 10;
    const MIN_GRADUATED_LENGTH = 10;

    const MAX_EMPLOYEE_ID_LENGTH = 11;
    const MAX_FIRST_NAME_LENGTH = 30;
    const MAX_LAST_NAME_LENGTH = 30;
    const MAX_NICKNAME_LENGTH = 20;
    const MAX_SKILL_SET_LENGTH = 20;
    const MAX_TRAINING_STATUS_LENGTH = 20;
    const MAX_COURSE_STATUS_LENGTH = 20;
    const MAX_BATCH_YEAR_LENGTH = 4;
    const MAX_BATCH_TERM_LENGTH = 20;
    const MAX_HIRED_LENGTH = 10;
    const MAX_GRADUATED_LENGTH = 10;

    //Skill Set
    const PENDING = 1;
    const ANDROID = 2;
    const IOS = 3;
    const PHP = 4;
    const UNITY = 5;

    //Training Status
    const ON_TRAINING = 1;
    const GRADUATED = 2;
    const EOC = 3;

    public $validation = array(

        'employee_id' => array(
            'length' => array(
                'validate_between', self::MIN_EMPLOYEE_ID_LENGTH, self::MAX_EMPLOYEE_ID_LENGTH
            ),
            'valid' => array(
                'is_valid_employee_id'
            ),
            'exist' => array(
                'is_employee_exist'
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

        'nickname' => array(
            'length' => array(
                'validate_between', self::MIN_NICKNAME_LENGTH, self::MAX_NICKNAME_LENGTH
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
        
        'batch_year' => array(
            'length' => array(
                'validate_between', self::MIN_BATCH_YEAR_LENGTH, self::MAX_BATCH_YEAR_LENGTH
            )
        ),

        'batch_term' => array(
            'length' => array(
                'validate_between', self::MIN_BATCH_TERM_LENGTH, self::MAX_BATCH_TERM_LENGTH
            )
        ),

        'date_hired' => array(
            'valid' => array(
                'is_valid_date',
            )
        ),

        'date_graduated' => array(
            'valid' => array(
                'is_valid_date',
            )
        ),
    );

    public function is_employee_exist()
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
        
        $db = DB::conn(); 
        $params = array( 
            'employee_id' => $this->employee_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'nickname' => $this->nickname,
            'skill_set' => $this->skill_set,
            'course_status' => $this->course_status,
            'training_status' => $this->training_status,
            'batch_year' => $this->batch_year,
            'batch_term' => $this->batch_term,
            'date_hired' => $this->date_hired,
            'date_graduated' => $this->date_graduated
        );
        
        $db->insert('trainee', $params);
        $db->commit();
    }

    public static function delete($trainee_id)
    {
        $db = DB::conn();
        $db->query("DELETE FROM trainee WHERE id = ?", array($trainee_id));
    }

    public function edit($trainee_id)
    {
        if (!$this->validate()) {
            throw new ValidationException('Invalid Input');
        }
        $db = DB::conn();
        $params = array(
            'employee_id' => $this->new_employee_id,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'nickname' => $this->nickname,
            'skill_set' => $this->skill_set,
            'course_status' => $this->course_status,
            'training_status' => $this->training_status,
            'batch_year' => $this->batch_year,
            'batch_term' => $this->batch_term,
            'date_hired' => $this->date_hired,
            'date_graduated'=> $this->date_graduated,
        );

        $db->update('trainee', $params, array('id' => $this->trainee_id));
    }

    public static function getAll()
    {
        $trainees = array();

        $db = DB::conn();
        $rows = $db->rows("SELECT * FROM trainee ORDER BY date_hired desc");

        foreach ($rows as $row) {
            $trainees[] = new self($row);
        }
        return $trainees;
    }

    public static function getById($trainee_id)
    {
        $trainee = array();

        $db = DB::conn();
        $rows = $db->rows("SELECT * FROM trainee WHERE id = ?", array($trainee_id));

        foreach ($rows as $row) {
            $trainee[] = new self($row);
        }
        return $trainee;
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

    public static function getBySkillSet($trainee_id)
    {
        $db = DB::conn();
        $row = $db->row("SELECT skill_set FROM trainee WHERE skill_set = ?", array($trainee_id));        
        
        switch ($row['skill_set']) {
            case self::PENDING:
                $skill_set = "Pending";
                break;   
            case self::ANDROID:
                $skill_set = "Android";
                break;
            case self::IOS:
                $skill_set = "iOS";
                break;
            case self::PHP:
                $skill_set = "PHP";
                break;
            case self::UNITY:
                $skill_set = "Unity";
                break;
            default:
                throw new NotFoundException("{$trainee} is not found");
        }
        return $skill_set;
    }

    public static function getByBatchYear($batch_year)
    {
        $trainee = array();
        $db = DB::conn();

        $rows = $db->rows("SELECT * from trainee WHERE batch_year = ?", array($batch_year));

        foreach($rows as $row) {
            $trainee[] = new self($row);
        }
        return $trainee;
    }

    public static function getByBatchTerm($batch_term, $batch_year)
    {
        $trainee = array();
        $db = DB::conn();

        $rows = $db->rows("SELECT * FROM trainee WHERE batch_term = ? AND batch_year = ?", array($batch_term, $batch_year));

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

    public static function getTrainingStatus()
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

    public static function getBatchYear()
    {
        $db = DB::conn();
        $rows = $db->rows("SELECT DISTINCT batch_year FROM trainee");
        $batch_year = array();
        
        foreach ($rows as $row) {
            if (!empty($row['batch_year'])) {
                $batch_year[] = $row['batch_year'];
            }
        }
        return $batch_year;
    }

    public static function getBatchTerm()
    {
        $db = DB::conn();
        $rows = $db->rows("SELECT DISTINCT batch_term FROM trainee");
        $batch_term = array();
        
        foreach ($rows as $row) {
            if (!empty($row['batch_term'])) {
                $batch_term[] = $row['batch_term'];
            }
        }
        return $batch_term;
    }

    public static function getSkillSet()
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

    public static function getCourseStatus()
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

    public static function getCourses()
    {
        return Course::getByName();
    }
}