<?php

class Exam extends AppModel
{
    const MIN_COURSE_NAME = 1;
    const MIN_ITEMS = 1;
    const MIN_SCORE = 1;
    const MIN_MAKEUP_SCORE = 1;
    const MIN_STATUS = 1;
    const MIN_MAKEUP_STATUS = 3;
    const MIN_DATE_TAKEN = 3;

    const MAX_COURSE_NAME = 20;
    const MAX_ITEMS = 5;
    const MAX_SCORE = 5;
    const MAX_MAKEUP_SCORE = 10;
    const MAX_STATUS = 1;
    const MAX_MAKEUP_STATUS = 10;
    const MAX_DATE_TAKEN = 10;

    //Exam Status
    const PASSED = 1;
    const FAILED = 2;
    const PENDING = 3;
    const NONE = 4;

    public $validation = array(

        'course_name' => array(
            'length' => array(
                'validate_between', self::MIN_COURSE_NAME, self::MAX_COURSE_NAME
            )
        ),

        'items' => array(
            'length' => array(
                'validate_between', self::MIN_ITEMS, self::MAX_ITEMS
            )
        ),

        'score' => array(
            'length' => array(
                'validate_between', self::MIN_SCORE, self::MAX_SCORE
            )
        ),

        'makeup_score' => array(
            'length' => array(
                'validate_between', self::MIN_MAKEUP_SCORE, self::MAX_MAKEUP_SCORE
            )
        ),

        'status' => array(
            'length' => array(
                'validate_between', self::MIN_STATUS, self::MAX_STATUS
            )
        ),
        
        'makeup_status' => array(
            'length' => array(
                'validate_between', self::MIN_MAKEUP_STATUS, self::MAX_MAKEUP_STATUS
            )
        ),

        'date_taken' => array(
            'valid' => array(
                'is_valid_date',
            )
        ),
    );

    public function add()
    {    
        if (!$this->validate()) {
            throw new ValidationException('Invalid Input!');
        }

        $db = DB::conn(); 
            $params = array( 
                'course_name' => $this->course_name,
                'course_type' => $this->course_type,
                'exam_type' => $this->exam_type,
                'items' => $this->items,
                'score' => $this->score,
                'status' => $this->status,
                'date_taken' => $this->date_taken,
                'trainee_id' => $this->trainee_id
            );

        $db->insert('exam', $params);
    }

    public static function getByStatus($exam_id)
    {
        $db = DB::conn();
        $row = $db->row('SELECT status FROM exam WHERE id = ?', array($exam_id));
        
        switch ($row['status']) {
            case self::PASSED:
                $status = "PASSED";
                break;
            case self::FAILED:
                $status = "FAILED";
                break;
            case self::PENDING:
                $status = "PENDING";
                break;
            case self::NONE:
                $status = "NONE";
                break;
            default:
                throw new NotFoundException("{$status} is not found");
                break;
        }
        return $status;
    }

    public function edit($exam_id)
    {        
        if (!$this->validate()) {
            throw new ValidationException('Invalid Input');
        }
    
        try {
            $db = DB::conn();
            $params = array(
                'course_name' => $this->course_name,
                'course_type' => $this->course_type,
                'exam_type' => $this->exam_type,
                'items' => $this->items,
                'score' => $this->score,
                'status' => $this->status,
                'date_taken' => $this->date_taken
            );
        
            $db->update('exam', $params, array('id' => $this->exam_id));
            
        } catch(Exception $e) {
            throw $e;
        }
    }

    public static function getTraineeInfo($trainee_id)
    {
        return new self(object_to_array(Trainee::getById($trainee_id)));
    }

    public static function getByTraineeId($trainee_id)
    {
        $exam = array();

        $db = DB::conn();
        $rows = $db->rows("SELECT * FROM exam WHERE trainee_id = ?", array($trainee_id));

        foreach ($rows as $row) {
            $exam[] = new self($row);
        }
        return $exam;
    }

    public static function getByExamId($exam_id)
    {
        $exam = array();

        $db = DB::conn();
        $rows = $db->rows("SELECT * FROM exam WHERE id = ?", array($exam_id));

        foreach ($rows as $row) {
            $exam[] = new self($row);
        }
        return $exam;
    }

    public static function getById($exam_id)
    {
        $db = DB::conn();
        $row = $db->row("SELECT * FROM exam WHERE id = ?", array($exam_id));
        
        return $row;
    }
}