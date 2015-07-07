<?php

class Exam extends AppModel
{
    const MIN_COURSE_NAME = 1;
    const MIN_ITEMS = 1;
    const MIN_SCORE = 1;
    const MIN_MAKEUP_SCORE = 1;
    const MIN_STATUS = 3;
    const MIN_MAKEUP_STATUS = 3;
    const MIN_DATE_TAKEN = 3;

    const MAX_COURSE_NAME = 20;
    const MAX_ITEMS = 5;
    const MAX_SCORE = 5;
    const MAX_MAKEUP_SCORE = 10;
    const MAX_STATUS = 10;
    const MAX_MAKEUP_STATUS = 10;
    const MAX_DATE_TAKEN = 10;

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

        try {
            $db = DB::conn(); 
            $db->begin();
            
            $trainee_id = Param::get('trainee_id');
            $params = array( 
                'trainee_id' => $trainee_id,
                'course_name' => $this->course_name,
                'items' => $this->items,
                'score' => $this->score,
                'status' => $this->status,
                'makeup_score' => $this->makeup_score,
                'makeup_status' => $this->makeup_status,
                'date_taken' => $this->date_taken
            );

            $db->insert('exam', $params); 
            $db->commit();

        } catch(Exception $e) {
            $db->rollback();
            throw $e;
        }
    }

    public static function getAllTrainee($trainee_id)
    {
        return new self(object_to_array(Trainee::getById($trainee_id)));
    }

    public static function getAllByTraineeId($trainee_id)
    {
        $exam = array();

        $db = DB::conn();
        $rows = $db->rows("SELECT * FROM exam where trainee_id = ?", array($trainee_id));

        foreach ($rows as $row) {
            $exam[] = new self($row);
        }
        return $exam;
    }
}